<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Page Hero eligible pages
    |--------------------------------------------------------------------------
    |
    | Route name => admin-facing label, grouped by brand. This is the
    | allow-list the "Page Heroes" Filament resource's page_key Select
    | draws from — it exists so admins pick from a known, working set of
    | routes rather than free-typing a route name that no page ever reads.
    |
    | 'group.home' is intentionally absent: its hero is a decorative shape,
    | not photo content. 'festival.home' is intentionally absent: it keeps
    | its own FestivalEdition::hero_image field, tied to the edition
    | lifecycle. Dynamic per-record pages (market.media.show,
    | market.ticket.show, festival.films.show, festival.news.show) are
    | excluded — a PageHero applies to a whole listing page, not one record.
    |
    */

    'keys' => [

        'group' => [
            'about' => 'About',
            'companies' => 'Companies',
            'contact' => 'Contact',
            'gallery' => 'Gallery',
            'partners' => 'Partners',
        ],

        'academy' => [
            'academy.home' => 'Home',
            'academy.about' => 'About',
            'academy.services' => 'Services',
            'academy.admissions' => 'Admissions',
            'academy.contact' => 'Contact',
            'academy.apply' => 'Apply',
            'academy.gallery' => 'Gallery',
            'academy.partners' => 'Partners',
        ],

        'market' => [
            'market.home' => 'Home',
            'market.about' => 'About',
            'market.events' => 'Events',
            'market.program' => 'Program',
            'market.delegation' => 'Delegation',
            'market.calendar' => 'Calendar',
            'market.tours' => 'Tours',
            'market.media' => 'Media',
            'market.faq' => 'FAQ',
            'market.exhibition' => 'Exhibition (coming soon)',
            'market.conference' => 'Conference (coming soon)',
            'market.workshop' => 'Workshop (coming soon)',
            'market.pitching' => 'Pitching (coming soon)',
            'market.gallery' => 'Gallery',
            'market.partners' => 'Partners',
        ],

        'festival' => [
            'festival.films' => 'Films',
            'festival.schedule' => 'Schedule',
            'festival.venues' => 'Venues',
            'festival.program' => 'Program',
            'festival.awards' => 'Awards',
            'festival.guests' => 'Guests',
            'festival.news' => 'News',
            'festival.submit' => 'Submit',
            'festival.archive' => 'Archive',
            'festival.visit' => 'Visit',
            'festival.gallery' => 'Gallery',
            'festival.partners' => 'Partners',
        ],

    ],

];
