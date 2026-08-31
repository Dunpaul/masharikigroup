<?php

use App\Services\GalleryImageProcessor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // group, academy, market, festival
            $table->foreignId('festival_edition_id')->nullable()->constrained('festival_editions')->nullOnDelete();
            $table->unsignedSmallInteger('year')->nullable();
            $table->date('day')->nullable();
            $table->string('category')->nullable();
            $table->string('image_path');
            $table->string('thumb_path');
            $table->string('caption')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['brand', 'year']);
        });

        $editionYearsById = DB::table('festival_editions')->pluck('year', 'id');

        foreach (DB::table('festival_gallery_images')->get() as $row) {
            DB::table('gallery_images')->insert([
                'brand' => 'festival',
                'festival_edition_id' => $row->festival_edition_id,
                'year' => $editionYearsById[$row->festival_edition_id] ?? null,
                'day' => $row->day,
                'category' => $row->category,
                'image_path' => $row->image_path,
                'thumb_path' => $row->thumb_path,
                'caption' => $row->caption,
                'sort_order' => $row->sort_order,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        }

        // Market's old gallery only ever stored one uncompressed image per
        // row. Run each through the same WebP pipeline new uploads use, so
        // every brand's gallery is uniformly compressed going forward.
        $processor = app(GalleryImageProcessor::class);

        foreach (DB::table('market_gallery_images')->get() as $row) {
            try {
                [$fullPath, $thumbPath] = $processor->process($row->image_path, 'gallery/market', deleteOriginal: false);
            } catch (\Throwable) {
                $fullPath = $thumbPath = $row->image_path;
            }

            DB::table('gallery_images')->insert([
                'brand' => 'market',
                'festival_edition_id' => null,
                'year' => null,
                'day' => null,
                'category' => $row->category,
                'image_path' => $fullPath,
                'thumb_path' => $thumbPath,
                'caption' => $row->caption,
                'sort_order' => $row->sort_order,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        }

        Schema::dropIfExists('festival_gallery_images');
        Schema::dropIfExists('market_gallery_images');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
