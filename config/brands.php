<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shared accent
    |--------------------------------------------------------------------------
    |
    | One accent color shared across all three sites for interactive roles:
    | primary CTAs, links, active nav state, hover states, small highlights.
    | This is the exact orange already in use before this token existed
    | (Group's "Culture Forward" headline gradient and stats-card numerals,
    | Academy's "Only 50 Spots Available" urgency badge) — Tailwind's
    | orange-500 (#f97316). It was already the de facto shared color; this
    | just gives it one name so it can't drift into three different oranges.
    |
    | Decision: this is a GROUP-level (umbrella) accent, not Market's brand
    | color. Market's own identity color is yellow (#f9d200, its historical
    | brand color) and Academy's is purple (#7c3aed, used in its hero
    | gradients) — both kept below as `colors.accent` for brand-specific
    | decorative use (gradients, hero flourishes). The shared accent below
    | is what drives *interactive* elements (buttons, links, active nav,
    | hover) everywhere, so those roles read as one system across brands
    | instead of each brand's decorative color leaking into UI chrome.
    | Market in particular had almost no color before this — its CTAs and
    | active nav state now pick up the shared orange rather than staying
    | all-black-and-white.
    |
    */
    'accent' => '#f97316',

    'group' => [
        'key' => 'group',
        'name' => 'Mashariki Group',
        'short_name' => 'Group',
        'tagline' => 'Building African Brands That Move',
        'description' => 'Mashariki Group is a multi-sector holding company operating at the intersection of mobility, film, creative education, content markets, and advertising across Africa.',
        'host' => env('BRAND_GROUP_HOST', 'mashariki-group.test'),
        'colors' => [
            'primary' => '#111111',
            'accent' => '#f97316',
            'bg' => '#eef0f2',
        ],
        'nav' => [
            ['label' => 'Home', 'route' => 'home'],
            ['label' => 'About', 'route' => 'about'],
            [
                'label' => 'Companies',
                'route' => 'companies',
                'children' => [
                    ['label' => 'Mashariki Arts Academy', 'route' => 'academy.home'],
                    ['label' => 'Masharket', 'route' => 'market.home'],
                    ['label' => 'Mashariki African Film Festival', 'route' => 'festival.home'],
                    ['label' => 'All Companies', 'route' => 'companies'],
                ],
            ],
            ['label' => 'Gallery', 'route' => 'gallery'],
            ['label' => 'Partners', 'route' => 'partners'],
            ['label' => 'Contact', 'route' => 'contact'],
        ],
        'cta' => ['label' => 'Get in touch', 'route' => 'contact'],
        'socials' => [
            'linkedin' => '#',
            'instagram' => '#',
            'twitter' => '#',
        ],
    ],

    'academy' => [
        'key' => 'academy',
        'name' => 'Mashariki Arts Academy',
        'short_name' => 'Arts Academy',
        'tagline' => "Empowering Africa's Next Generation of Storytellers",
        'description' => 'Mashariki Arts Academy is a professional film and creative training institution dedicated to nurturing Africa\'s next generation of storytellers.',
        'host' => env('BRAND_ACADEMY_HOST', 'mashariki-academy.test'),
        // Navbar logo: 'wordmark' replaces the text lockup, 'icon' sits beside it.
        'logo' => ['src' => 'images/masharikiacademy_black.png', 'type' => 'wordmark'],
        'colors' => [
            'primary' => '#111111',
            'accent' => '#7c3aed',
            'bg' => '#f7f5fb',
        ],
        'nav' => [
            ['label' => 'Home', 'route' => 'academy.home'],
            ['label' => 'About', 'route' => 'academy.about'],
            ['label' => 'Programs', 'route' => 'academy.services'],
            ['label' => 'Admissions', 'route' => 'academy.admissions'],
            [
                'label' => 'Community',
                'route' => 'academy.gallery',
                'children' => [
                    ['label' => 'Gallery', 'route' => 'academy.gallery'],
                    ['label' => 'Partners', 'route' => 'academy.partners'],
                ],
            ],
            ['label' => 'Contact', 'route' => 'academy.contact'],
        ],
        'cta' => ['label' => 'Get in touch', 'route' => 'academy.contact'],
        'socials' => [
            'linkedin' => '#',
            'instagram' => '#',
            'twitter' => '#',
        ],
    ],

    'market' => [
        'key' => 'market',
        'name' => 'Masharket',
        'short_name' => 'Masharket',
        'tagline' => 'Connecting African Creatives Through Commerce & Culture',
        'description' => 'Masharket is a digital marketplace connecting African creatives, entrepreneurs and consumers through commerce, storytelling and culture-driven products.',
        'host' => env('BRAND_MARKET_HOST', 'masharket.test'),
        'logo' => ['src' => 'images/masharket.svg', 'type' => 'icon', 'prefix' => 'Masharket', 'text' => 'Content Market'],
        // Accent matches the navbar "Register" CTA (shared group orange, #f97316)
        // instead of the old #f9d200 yellow, which clashed with the current logo.
        'colors' => [
            'primary' => '#111111',
            'accent' => '#f97316',
            'bg' => '#f4f7fb',
        ],
        'nav' => [
            ['label' => 'Home', 'route' => 'market.home'],
            ['label' => 'About', 'route' => 'market.about'],
            [
                'label' => 'Program',
                'route' => 'market.program',
                'children' => [
                    ['label' => 'Events', 'route' => 'market.events'],
                    ['label' => 'Program & Schedule', 'route' => 'market.program'],
                    ['label' => 'Calendar', 'route' => 'market.calendar'],
                ],
            ],
            [
                'label' => 'Participate',
                'route' => 'market.delegation',
                'children' => [
                    ['label' => 'Delegates', 'route' => 'market.delegation'],
                    ['label' => 'Tours', 'route' => 'market.tours'],
                    ['label' => 'Register', 'route' => 'market.exhibitors.create'],
                ],
            ],
            [
                'label' => 'Media',
                'route' => 'market.media',
                'children' => [
                    ['label' => 'Media', 'route' => 'market.media'],
                    ['label' => 'Gallery', 'route' => 'market.gallery'],
                    ['label' => 'Partners', 'route' => 'market.partners'],
                ],
            ],
            ['label' => 'FAQs', 'route' => 'market.faq'],
        ],
        'secondary' => ['label' => 'Login', 'route' => 'market.login'],
        'cta' => ['label' => 'Register', 'route' => 'market.exhibitors.create'],
        'socials' => [
            'linkedin' => 'https://www.linkedin.com/company/masharket-kigali-international-content-market',
            'instagram' => '#',
            'twitter' => '#',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Festival — STAGING ONLY
    |--------------------------------------------------------------------------
    |
    | Built as the eventual canonical site for the festival, but this brand
    | is not live: `host` points at a local/staging hostname only, and no
    | DNS or redirect from the existing WordPress site happens until an
    | owner-approved cutover. See README for the cutover checklist.
    |
    | Canonical naming: "Mashariki African Film Festival" / "MAAFF" — this
    | pairing is the one that shows up repeatedly in this app's own archived
    | (real, contemporaneous) press coverage, so it's treated as the org's
    | actual convention rather than a guess. Use this pairing everywhere;
    | do not reintroduce "Mashariki Africa Film Festival" as a variant.
    |
    */
    'festival' => [
        'key' => 'festival',
        'name' => 'Mashariki African Film Festival',
        'short_name' => 'Film Festival',
        'acronym' => 'MAAFF',
        'tagline' => "Africa's Stories, On Screen",
        'description' => 'The Mashariki African Film Festival (MAAFF) is an annual celebration of African cinema in Kigali, Rwanda — screenings, panels, masterclasses, and premieres.',
        'host' => env('BRAND_FESTIVAL_HOST', 'mashariki-festival.test'),
        'logo' => ['src' => 'images/masharikifilmfestival.png', 'type' => 'icon'],
        'colors' => [
            'primary' => '#111111',
            'accent' => '#dc2626',
            'bg' => '#fbf7f2',
        ],
        'nav' => [
            ['label' => 'Home', 'route' => 'festival.home'],
            [
                'label' => 'Films',
                'route' => 'festival.films',
                'children' => [
                    ['label' => 'Film Catalogue', 'route' => 'festival.films'],
                    ['label' => 'Schedule', 'route' => 'festival.schedule'],
                    ['label' => 'Venues', 'route' => 'festival.venues'],
                    ['label' => 'Gallery', 'route' => 'festival.gallery'],
                ],
            ],
            [
                'label' => 'Program',
                'route' => 'festival.program',
                'children' => [
                    ['label' => 'Program', 'route' => 'festival.program'],
                    ['label' => 'Guests', 'route' => 'festival.guests'],
                    ['label' => 'Juries & Awards', 'route' => 'festival.awards'],
                    ['label' => 'Partners', 'route' => 'festival.partners'],
                ],
            ],
            ['label' => 'News', 'route' => 'festival.news'],
        ],
        // Fallback only — SetBrand middleware overrides this per-request from
        // the current FestivalEdition's phase (submissions vs program
        // published). This default assumes submissions are open. The
        // festival is free: this CTA never leads to a ticket/RSVP flow.
        'cta' => ['label' => 'Submit Your Film', 'route' => 'festival.submit'],
        'socials' => [
            'linkedin' => '#',
            'instagram' => '#',
            'twitter' => '#',
        ],
    ],

];
