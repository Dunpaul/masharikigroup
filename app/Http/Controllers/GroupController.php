<?php

namespace App\Http\Controllers;

use App\Models\GroupPartner;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'partners' => GroupPartner::where('featured', true)->get(),
        ]);
    }

    public function partners(): View
    {
        return view('partners.index', [
            'partners' => GroupPartner::all(),
        ]);
    }
}
