<?php

namespace Database\Seeders;

use App\Models\FestivalEdition;
use App\Models\FestivalGuest;
use App\Models\FestivalSection;
use App\Models\FestivalSettings;
use App\Models\FestivalVenue;
use Illuminate\Database\Seeder;

class FestivalContentSeeder extends Seeder
{
    /**
     * Seeds only what's already established as real elsewhere in this app
     * (venue names, real people named in the archived Market press
     * coverage) — no invented films, jury, or sponsors. Those need real
     * data from the festival organizers before they can go in; adding
     * placeholders here would mean publishing fabricated content, exactly
     * what this whole migration is trying to get away from.
     */
    public function run(): void
    {
        FestivalSettings::query()->firstOrCreate([], [
            'canonical_name' => 'Mashariki African Film Festival',
            'acronym' => 'MAAFF',
            'press_contact_email' => 'info@masharikifestival.org',
            'socials' => [
                'facebook' => '#',
                'instagram' => '#',
                'twitter' => '#',
            ],
        ]);

        $edition = FestivalEdition::query()->firstOrCreate(
            ['year' => 2026, 'edition_number' => 10],
            [
                'status' => 'current',
                'tagline' => "Africa's Stories, On Screen",
            ]
        );

        $venues = [
            ['name' => 'Kigali Conference and Exhibition Village', 'address' => 'Kigali, Rwanda', 'sort_order' => 1],
            ['name' => 'Century Cinema', 'address' => 'Kigali, Rwanda', 'sort_order' => 2],
        ];

        foreach ($venues as $venue) {
            FestivalVenue::query()->firstOrCreate(['name' => $venue['name']], $venue);
        }

        $sections = [
            ['name' => 'Competition', 'slug' => 'competition', 'sort_order' => 1],
            ['name' => 'Out of Competition', 'slug' => 'out-of-competition', 'sort_order' => 2],
            ['name' => 'Documentary', 'slug' => 'documentary', 'sort_order' => 3],
            ['name' => 'Short Films', 'slug' => 'shorts', 'sort_order' => 4],
        ];

        foreach ($sections as $section) {
            FestivalSection::query()->firstOrCreate(
                ['festival_edition_id' => $edition->id, 'slug' => $section['slug']],
                [...$section, 'festival_edition_id' => $edition->id]
            );
        }

        $guests = [
            ['name' => 'Trésor Senga', 'role' => 'Festival Director', 'sort_order' => 1],
            ['name' => 'Lionel Kayitare', 'role' => 'Festival Coordinator', 'sort_order' => 2],
        ];

        foreach ($guests as $guest) {
            FestivalGuest::query()->firstOrCreate(
                ['festival_edition_id' => $edition->id, 'name' => $guest['name']],
                [...$guest, 'festival_edition_id' => $edition->id]
            );
        }
    }
}
