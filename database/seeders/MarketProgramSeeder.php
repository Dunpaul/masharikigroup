<?php

namespace Database\Seeders;

use App\Models\MarketProgramSession;
use Illuminate\Database\Seeder;

class MarketProgramSeeder extends Seeder
{
    /**
     * The old site hardcoded "November 7th, 2024" etc. directly into the
     * program tabs — stale the moment the calendar year rolled over. Here
     * sessions only store a day *number*; the actual date label is computed
     * from MarketSettings::start_date at render time, so it can never drift.
     */
    public function run(): void
    {
        $days = [
            1 => [
                ['time' => '9:00 AM TO 10:00 AM', 'title' => 'Arrival, Accreditation & Refreshments'],
                ['time' => '10:00 AM - 10:30 AM', 'title' => 'Brief Tour & Photo Ops of the Floorplan with Chief Guest and VIP Guests'],
                ['time' => '10:30 AM TO 11:00 AM', 'title' => 'Opening Ceremony & Speeches', 'description' => 'Open to all registered MAAFF and Masharket Delegates'],
                ['time' => '11:00 AM TO 12:00 PM', 'title' => 'Panel Discussion: Promoting Rwanda as Film Destination', 'description' => 'Exploring strategies and opportunities to become a sustainable filming destination'],
                ['time' => '12:00 PM TO 1:00 PM', 'title' => 'Panel Discussion: The Evolving Landscape of Intellectual Property Laws', 'description' => 'How to safeguard your content in a globalized world'],
                ['time' => '1:00 PM TO 3:00 PM', 'title' => 'Pitching Masterclass', 'description' => 'How to package a winning pitch to international investors and distributors. Mentor: Wangeci Murage. Open to all registered MAAFF and Masharket Delegates'],
                ['time' => '03:00 PM TILL NIGHT', 'title' => 'Film Screenings and Networking at Century Cinema'],
            ],
            2 => [
                ['time' => '9:00 AM TO 10:00 AM', 'title' => 'Registration, Networking & Refreshments'],
                ['time' => '10:00 AM TO 11:00 AM', 'title' => 'Panel Discussion: Content Marketing, Distribution & Monetization'],
                ['time' => '11:00 AM TO 12:00 PM', 'title' => 'Panel Discussion: The Role of Film Festivals in Strengthening the Economic Power of the Film Industry'],
                ['time' => '12:00 PM TO 1:30 PM', 'title' => 'Masterclass: Maximizing the Impact of Social Media', 'description' => 'As a tool for content creation, promotion and monetization'],
                ['time' => '1:30 PM TO 3:00 PM', 'title' => 'Animation Masterclass', 'description' => 'A deep dive into animation techniques and business'],
                ['time' => '03:00 PM TILL NIGHT', 'title' => 'Film Screenings and Networking at Century Cinema'],
            ],
            3 => [
                ['time' => '9:00 AM TO 10:00 AM', 'title' => 'Registration, Networking & Refreshments'],
                ['time' => '10:00 AM TO 11:00 AM', 'title' => 'Panel Discussion: Role of Adaptation in Content Development', 'description' => 'Reaching global audiences through dubbing, localization and subtitling'],
                ['time' => '11:00 AM TO 12:00 PM', 'title' => 'Panel Discussion: Film Financing and Funding Opportunities'],
                ['time' => '12:00 PM TO 1:30 PM', 'title' => 'Masterclass: Interactive Media and Artificial Intelligence in Content Production', 'description' => 'VR, AR, SFX'],
                ['time' => '2:00 PM TO 3:00 PM', 'title' => 'Networking Lunch', 'description' => 'By invite only'],
                ['time' => '03:00 PM TILL NIGHT', 'title' => 'Film Screenings and Networking at Century Cinema'],
            ],
        ];

        foreach ($days as $dayNumber => $sessions) {
            foreach ($sessions as $index => $session) {
                MarketProgramSession::query()->firstOrCreate([
                    'day_number' => $dayNumber,
                    'time_label' => $session['time'],
                    'title' => $session['title'],
                ], [
                    'description' => $session['description'] ?? null,
                    'sort_order' => $index,
                ]);
            }
        }
    }
}
