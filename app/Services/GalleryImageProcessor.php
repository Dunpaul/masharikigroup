<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

/**
 * Converts an uploaded image to two compressed WebP derivatives (a full-size
 * view and a small thumbnail for grid loading) and deletes the uncompressed
 * original. Disk space has been tight on this project before, so compression
 * is deliberately aggressive rather than "good enough".
 */
class GalleryImageProcessor
{
    protected const FULL_MAX_WIDTH = 2000;

    protected const FULL_QUALITY = 78;

    protected const THUMB_MAX_WIDTH = 480;

    protected const THUMB_QUALITY = 70;

    public function process(string $rawPath, string $directory, string $disk = 'public', bool $deleteOriginal = true): array
    {
        $storage = Storage::disk($disk);
        $manager = new ImageManager(new Driver());
        $image = $manager->read($storage->path($rawPath));

        $uuid = (string) Str::uuid();

        $fullPath = "{$directory}/full/{$uuid}.webp";
        $storage->put(
            $fullPath,
            (string) (clone $image)->scaleDown(width: self::FULL_MAX_WIDTH)->toWebp(self::FULL_QUALITY)
        );

        $thumbPath = "{$directory}/thumb/{$uuid}.webp";
        $storage->put(
            $thumbPath,
            (string) (clone $image)->scaleDown(width: self::THUMB_MAX_WIDTH)->toWebp(self::THUMB_QUALITY)
        );

        if ($deleteOriginal) {
            $storage->delete($rawPath);
        }

        return [$fullPath, $thumbPath];
    }
}
