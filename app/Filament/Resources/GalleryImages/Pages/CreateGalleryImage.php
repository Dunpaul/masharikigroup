<?php

namespace App\Filament\Resources\GalleryImages\Pages;

use App\Filament\Resources\GalleryImages\GalleryImageResource;
use App\Models\FestivalEdition;
use App\Models\GalleryImage;
use App\Services\GalleryImageProcessor;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class CreateGalleryImage extends CreateRecord
{
    protected static string $resource = GalleryImageResource::class;

    /**
     * One upload batch shares a single Section/Year/Day/Category (set once
     * in the form) but fans out into one GalleryImage row per photo, each
     * compressed to full + thumbnail WebP by GalleryImageProcessor.
     */
    protected function handleRecordCreation(array $data): Model
    {
        $rawPaths = $data['uploads'] ?? [];

        if (empty($rawPaths)) {
            throw ValidationException::withMessages(['uploads' => 'Upload at least one photo.']);
        }

        $year = $data['year'] ?? null;

        if ($data['brand'] === 'festival' && ! empty($data['festival_edition_id'])) {
            $year = FestivalEdition::find($data['festival_edition_id'])?->year;
        }

        $processor = app(GalleryImageProcessor::class);
        $nextSort = (int) (GalleryImage::max('sort_order') ?? 0) + 1;
        $lastRecord = null;

        foreach ($rawPaths as $rawPath) {
            [$fullPath, $thumbPath] = $processor->process($rawPath, 'gallery/'.$data['brand']);

            $lastRecord = GalleryImage::create([
                'brand' => $data['brand'],
                'festival_edition_id' => $data['brand'] === 'festival' ? ($data['festival_edition_id'] ?? null) : null,
                'year' => $year,
                'day' => $data['day'] ?? null,
                'category' => $data['category'] ?? null,
                'image_path' => $fullPath,
                'thumb_path' => $thumbPath,
                'sort_order' => $nextSort++,
            ]);
        }

        return $lastRecord;
    }
}
