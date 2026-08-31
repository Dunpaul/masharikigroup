<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarketGallerySeeder extends Seeder
{
    /**
     * No-op. Market's gallery now lives in the shared `gallery_images`
     * table (see the 2026_08_31_182125 migration, which converted and
     * carried over the original seeded photos as real rows). Add photos via
     * the Filament Gallery resource — there's nothing left for this seeder
     * to do, and the original source files it referenced no longer exist on
     * disk (they were consumed by that migration's WebP conversion).
     */
    public function run(): void
    {
        //
    }
}
