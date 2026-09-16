<?php

namespace Database\Seeders;

use App\Models\PageHero;
use App\Services\GalleryImageProcessor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

/**
 * One-time migration of Academy home's hardcoded hero carousel
 * (resources/views/academy/home.blade.php's old .hero-bg-slide images) into
 * admin-editable PageHero rows, so removing that hardcoded markup caused no
 * visual regression. Run once via `php artisan db:seed --class=PageHeroSeeder`.
 * Safe to re-run — it skips if academy.home already has rows. The 8th
 * original slide (an external Unsplash URL) was dropped rather than seeded,
 * since PageHero expects images to live on the public disk.
 */
class PageHeroSeeder extends Seeder
{
    protected const ACADEMY_HOME_IMAGES = [
        'academy/images/workshop1.jpg',
        'academy/images/workshop10.JPG',
        'academy/images/workshop22.jpg',
        'academy/images/workshop13.JPG',
        'academy/images/workshop15.JPG',
        'academy/images/workshop17.JPG',
        'academy/images/workshop8.jpg',
    ];

    public function run(): void
    {
        if (PageHero::ofPage('academy', 'academy.home')->exists()) {
            return;
        }

        $processor = app(GalleryImageProcessor::class);
        $sortOrder = 1;

        foreach (self::ACADEMY_HOME_IMAGES as $publicPath) {
            $tmpPath = 'tmp/'.basename($publicPath);
            Storage::disk('public')->put($tmpPath, file_get_contents(public_path($publicPath)));

            [$fullPath, $thumbPath] = $processor->process($tmpPath, 'page-heroes/academy/academy.home');

            PageHero::create([
                'brand' => 'academy',
                'page_key' => 'academy.home',
                'image_path' => $fullPath,
                'thumb_path' => $thumbPath,
                'sort_order' => $sortOrder++,
            ]);
        }
    }
}
