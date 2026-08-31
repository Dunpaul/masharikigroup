<?php

namespace App\Http\Controllers;

use App\Models\MarketSubscriber;
use Illuminate\Http\Request;

class MarketSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $subscriber = MarketSubscriber::where('email', $validated['email'])->first();

        if ($subscriber) {
            return back()->with('error', "You're already subscribed!");
        }

        MarketSubscriber::create($validated);

        return back()->with('success', 'Thanks for subscribing! We\'ll keep you posted.');
    }
}
