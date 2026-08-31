<?php

namespace App\Http\Controllers;

use App\Models\AcademyPartner;
use App\Models\AcademyProgram;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function home()
    {
        return view('academy.home', [
            'partners' => AcademyPartner::where('featured', true)->get(),
        ]);
    }

    public function partners()
    {
        return view('partners.index', [
            'partners' => AcademyPartner::all(),
        ]);
    }

    public function about()
    {
        return view('academy.about');
    }

    public function services()
    {
        $programs = AcademyProgram::all();

        return view('academy.services', compact('programs'));
    }

    public function contact()
    {
        return view('academy.contact');
    }

    public function admissions()
    {
        return view('academy.admissions');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return redirect()->route('academy.contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
