<?php

namespace Database\Seeders;

use App\Models\MarketCategory;
use App\Models\MarketPartner;
use App\Models\MarketSettings;
use App\Models\MarketTeamMember;
use Illuminate\Database\Seeder;

class MarketContentSeeder extends Seeder
{
    /**
     * Seeds the content that used to be hardcoded across masharket.com's PHP
     * templates. Event dates are intentionally left blank — the old site's
     * "7th to 9th November 2024" (and, elsewhere on the same page, "November
     * 28-30, 2023") were both stale/contradictory. Leaving them null forces
     * whoever edits this in Filament to set the real upcoming dates rather
     * than inheriting a fabricated one.
     */
    public function run(): void
    {
        MarketSettings::query()->firstOrCreate([], [
            'event_name' => 'Masharket - Kigali International Content Market',
            'theme' => 'Revolutionizing the Content Ecosystem',
            'venue_name' => 'Kigali Conference and Exhibition Village',
            'venue_address' => 'Kigali, Rwanda',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d249.3636450214468!2d0!3d0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca42b3fca47e3%3A0x6c258161eb1b5133!2sKigali%20Conference%20and%20Exhibition%20Village%20(KCEV)!5e0!3m2!1sen!2sus!4v1693478550312!5m2!1sen!2sus',
            'intro_paragraph_1' => 'Hosted under the auspices of the acclaimed Mashariki African Film Festival, Masharket is the first content market in Rwanda that aims to bring a wealth of knowledge and idea sharing to an already well-established hub for well calibrated events, both at a national and international level.',
            'intro_paragraph_2' => 'Masharket is a multi-day content market gathering film and media stakeholders from around the world, providing a platform for buying and selling audiovisual content and new media, and offering a comprehensive one-stop shop for industry professionals.',
            'contact_phone_1' => '+250 788 327 459',
            'contact_phone_2' => '+254 726 762 558',
            'contact_email' => 'info@masharket.com',
            'socials' => [
                'linkedin' => 'https://www.linkedin.com/company/masharket-kigali-international-content-market',
                'whatsapp' => 'https://wa.me/254726762558',
                'facebook' => 'https://www.facebook.com/profile.php?id=100094379964201',
                'youtube' => 'https://www.youtube.com/channel/UC4kgqtuqvEncVMvSqqHcefQ',
                'instagram' => 'https://www.instagram.com/masharket1/',
                'tiktok' => 'https://www.tiktok.com/@masharket2023',
                'twitter' => 'https://x.com/MashaRket',
            ],
        ]);

        $categories = [
            [
                'title' => 'Exhibitors',
                'description' => 'Unlock valuable opportunities for your content and services. Become an exhibitor at our content market and connect with potential buyers, distributors, and partners.',
                'cta_url' => route('market.exhibitors.create'),
                'sort_order' => 1,
            ],
            [
                'title' => 'Non Exhibitors',
                'description' => 'Explore content and collaboration opportunities for sellers, producers, and visitors. Stay updated on industry trends, network with leaders, and engage with the entertainment and media landscape.',
                'cta_url' => route('market.non-exhibitors.create'),
                'sort_order' => 2,
            ],
            [
                'title' => 'Students',
                'description' => "Are you a student ready to embark on a career in media? Get an insider's view of the entertainment industry, learn from experts, and kickstart your career in media and entertainment.",
                'cta_url' => route('market.students.create'),
                'sort_order' => 3,
            ],
            [
                'title' => 'Virtual Attendants',
                'description' => "Experience the content market from anywhere in the world. As a virtual attendee, you'll gain access to exclusive sessions, networking opportunities, and industry insights right from your screen.",
                'cta_url' => route('market.virtual-attendants.create'),
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            MarketCategory::query()->firstOrCreate(['title' => $category['title']], $category);
        }

        $partners = [
            ['name' => 'Igiche', 'logo_path' => 'market/partners/igiche.jpeg', 'sort_order' => 1],
            ['name' => 'StarTimes', 'logo_path' => 'market/partners/startimes.jpeg', 'sort_order' => 2],
            ['name' => 'Rwanda Broadcasting Agency', 'logo_path' => 'market/partners/rba.jpeg', 'sort_order' => 3],
        ];

        foreach ($partners as $partner) {
            MarketPartner::query()->firstOrCreate(['name' => $partner['name']], $partner);
        }

        $team = [
            ['name' => 'Trésor Senga', 'role' => 'C.E.O MAAF', 'photo_path' => 'market/team/IMG-20230731-WA0015.jpg', 'sort_order' => 1],
            ['name' => 'Lionel Kayitare', 'role' => 'Festival Coordinator', 'photo_path' => 'market/team/IMG-20230731-WA0014.jpg', 'sort_order' => 2],
            ['name' => 'Akeem Mutabazi', 'role' => 'Design & Programation', 'photo_path' => 'market/team/IMG-20230731-WA0016.jpg', 'sort_order' => 3],
            ['name' => 'Wangeci Murage', 'role' => 'Content Market Director', 'photo_path' => 'market/team/IMG-20230731-WA0010.jpg', 'sort_order' => 4],
            ['name' => 'Lucy Muthui', 'role' => 'Content Market Coordinator', 'photo_path' => 'market/team/IMG-20230731-WA0011.jpg', 'sort_order' => 5],
            ['name' => 'Dunpaul Maina', 'role' => 'Web Developer', 'photo_path' => 'market/team/IMG-20230731-WA0012.jpg', 'sort_order' => 6],
            ['name' => 'Shabula Shabz', 'role' => 'Graphics Designer', 'photo_path' => 'market/team/IMG-20230731-WA0009.jpg', 'sort_order' => 7],
            ['name' => 'Mercie Macharia', 'role' => 'Social Media Manager', 'photo_path' => 'market/team/IMG-20230731-WA0008.jpg', 'sort_order' => 8],
        ];

        foreach ($team as $member) {
            MarketTeamMember::query()->firstOrCreate(['name' => $member['name']], $member);
        }
    }
}
