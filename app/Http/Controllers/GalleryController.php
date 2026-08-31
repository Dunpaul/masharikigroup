<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * One shared gallery controller for all four brands — each domain's route
 * points here, and the active brand's `key` (already resolved by the
 * `brand` middleware) is all that's needed to scope the query.
 */
class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $brandKey = app('brand')['key'];

        $years = GalleryImage::where('brand', $brandKey)
            ->whereNotNull('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        $selectedYear = $request->filled('year')
            ? (int) $request->query('year')
            : $years->first();

        $days = collect();
        $images = collect();

        if ($selectedYear) {
            $days = GalleryImage::where('brand', $brandKey)
                ->where('year', $selectedYear)
                ->whereNotNull('day')
                ->distinct()
                ->orderBy('day')
                ->pluck('day');

            $images = GalleryImage::where('brand', $brandKey)
                ->where('year', $selectedYear)
                ->when($request->filled('day'), fn ($q) => $q->whereDate('day', $request->query('day')))
                ->orderBy('sort_order')
                ->get();
        } elseif ($years->isEmpty()) {
            // No year data at all yet — show everything ungrouped rather
            // than an empty page.
            $images = GalleryImage::where('brand', $brandKey)->orderBy('sort_order')->get();
        }

        return view('gallery.index', [
            'years' => $years,
            'selectedYear' => $selectedYear,
            'days' => $days,
            'images' => $images,
            'activeDay' => $request->query('day'),
        ]);
    }
}
