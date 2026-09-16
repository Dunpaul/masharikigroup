<?php

namespace App\Filament\Resources\PageHeroes\Pages;

use App\Filament\Resources\PageHeroes\PageHeroResource;
use App\Models\PageHero;
use App\Services\GalleryImageProcessor;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class CreatePageHero extends CreateRecord
{
    protected static string $resource = PageHeroResource::class;

    /**
     * One create action shares a single Brand/Page (set once in the form)
     * but fans out into one PageHero row per uploaded image, each
     * compressed to full + thumbnail WebP by GalleryImageProcessor —
     * uploading several images seeds a carousel, one image makes a
     * static hero.
     */
    protected function handleRecordCreation(array $data): Model
    {
        $rawPaths = $data['uploads'] ?? [];

        if (empty($rawPaths)) {
            throw ValidationException::withMessages(['uploads' => 'Upload at least one image.']);
        }

        $processor = app(GalleryImageProcessor::class);
        $nextSort = (int) (PageHero::ofPage($data['brand'], $data['page_key'])->max('sort_order') ?? 0) + 1;
        $lastRecord = null;

        foreach ($rawPaths as $rawPath) {
            [$fullPath, $thumbPath] = $processor->process($rawPath, "page-heroes/{$data['brand']}/{$data['page_key']}");

            $lastRecord = PageHero::create([
                'brand' => $data['brand'],
                'page_key' => $data['page_key'],
                'image_path' => $fullPath,
                'thumb_path' => $thumbPath,
                'sort_order' => $nextSort++,
            ]);
        }

        return $lastRecord;
    }
}
