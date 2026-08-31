<?php

namespace App\Http\Controllers;

use App\Support\RegistrantLocator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrantAuthController extends Controller
{
    public function showLogin(): View
    {
        return view('market.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $match = RegistrantLocator::findByEmail($validated['email']);

        if (! $match || ! Hash::check($validated['password'], $match['registrant']->password)) {
            return back()->withInput(['email' => $validated['email']])->with('error', 'Those credentials do not match a registration.');
        }

        $request->session()->put('registrant_type', $match['type']);
        $request->session()->put('registrant_id', $match['registrant']->id);
        $request->session()->regenerate();

        return redirect()->route('market.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['registrant_type', 'registrant_id']);
        $request->session()->regenerate();

        return redirect()->route('market.home');
    }
}
