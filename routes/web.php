<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\AcademyRegistrationController;
use App\Http\Controllers\Admin\RegistrationsExportController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ExhibitorRegistrationController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MarketSubscriberController;
use App\Http\Controllers\NonExhibitorRegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrantAuthController;
use App\Http\Controllers\RegistrantDashboardController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VirtualAttendantRegistrationController;
use App\Http\Controllers\WaiverRedemptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Each Mashariki brand is served from its own domain but shares this one
| Laravel app, layout, and CMS. The `brand` middleware resolves which
| config/brands.php entry is active for the request and shares it with
| every view as $brand. See config/brands.php for host values — for local
| dev, point these hosts at 127.0.0.1 in /etc/hosts (see README).
|
*/
Route::domain(config('brands.group.host'))->middleware('brand:group')->group(function () {
    Route::get('/', [GroupController::class, 'home'])->name('home');
    Route::view('/about', 'pages.about')->name('about');
    Route::view('/companies', 'pages.companies')->name('companies');
    Route::view('/companies/academy', 'companies.academy')->name('companies.academy');
    Route::view('/companies/masharket', 'companies.masharket')->name('companies.masharket');
    Route::view('/companies/festival', 'companies.festival')->name('companies.festival');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/partners', [GroupController::class, 'partners'])->name('partners');

    Route::get('/admin-exports/registrations.csv', [RegistrationsExportController::class, 'csv'])
        ->middleware(\Filament\Http\Middleware\Authenticate::class)
        ->name('admin.exports.registrations');
});

Route::domain(config('brands.academy.host'))->middleware('brand:academy')->group(function () {
    Route::get('/', [AcademyController::class, 'home'])->name('academy.home');
    Route::get('/about', [AcademyController::class, 'about'])->name('academy.about');
    Route::get('/services', [AcademyController::class, 'services'])->name('academy.services');
    Route::get('/admissions', [AcademyController::class, 'admissions'])->name('academy.admissions');
    Route::get('/contact', [AcademyController::class, 'contact'])->name('academy.contact');
    Route::post('/contact', [AcademyController::class, 'submitContact'])->name('academy.contact.submit');
    Route::post('/application/submit', [ApplicationController::class, 'submit'])->name('application.submit');
    Route::get('/apply', [AcademyRegistrationController::class, 'create'])->name('academy.apply');
    Route::post('/apply', [AcademyRegistrationController::class, 'store'])->name('academy.apply.submit');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('academy.gallery');
    Route::get('/partners', [AcademyController::class, 'partners'])->name('academy.partners');
});

Route::domain(config('brands.market.host'))->middleware('brand:market')->group(function () {
    Route::get('/', [MarketController::class, 'home'])->name('market.home');
    Route::get('/about', [MarketController::class, 'about'])->name('market.about');
    Route::get('/events', [MarketController::class, 'events'])->name('market.events');
    Route::get('/program', [MarketController::class, 'program'])->name('market.program');
    Route::get('/delegation', [MarketController::class, 'delegation'])->name('market.delegation');
    Route::get('/calendar', [MarketController::class, 'calendar'])->name('market.calendar');
    Route::get('/tours', [MarketController::class, 'tours'])->name('market.tours');
    Route::get('/media', [MarketController::class, 'media'])->name('market.media');
    Route::get('/media/{slug}', [MarketController::class, 'newsArticle'])->name('market.media.show');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('market.gallery');
    Route::get('/partners', [MarketController::class, 'partners'])->name('market.partners');
    Route::get('/faq', [MarketController::class, 'faq'])->name('market.faq');
    Route::get('/exhibition', fn () => app(MarketController::class)->comingSoon('Exhibition'))->name('market.exhibition');
    Route::get('/conference', fn () => app(MarketController::class)->comingSoon('Conference'))->name('market.conference');
    Route::get('/workshop', fn () => app(MarketController::class)->comingSoon('Workshop'))->name('market.workshop');
    Route::get('/pitching', fn () => app(MarketController::class)->comingSoon('Pitching'))->name('market.pitching');
    Route::get('/register/exhibitors', [ExhibitorRegistrationController::class, 'create'])->name('market.exhibitors.create');
    Route::post('/register/exhibitors', [ExhibitorRegistrationController::class, 'store'])->name('market.exhibitors.store');
    Route::get('/register/non-exhibitors', [NonExhibitorRegistrationController::class, 'create'])->name('market.non-exhibitors.create');
    Route::post('/register/non-exhibitors', [NonExhibitorRegistrationController::class, 'store'])->name('market.non-exhibitors.store');
    Route::get('/register/students', [StudentRegistrationController::class, 'create'])->name('market.students.create');
    Route::post('/register/students', [StudentRegistrationController::class, 'store'])->name('market.students.store');
    Route::get('/register/virtual-attendants', [VirtualAttendantRegistrationController::class, 'create'])->name('market.virtual-attendants.create');
    Route::post('/register/virtual-attendants', [VirtualAttendantRegistrationController::class, 'store'])->name('market.virtual-attendants.store');
    Route::get('/waiver', [WaiverRedemptionController::class, 'create'])->name('market.waiver.create');
    Route::post('/waiver', [WaiverRedemptionController::class, 'store'])->name('market.waiver.store');
    Route::get('/ticket/{type}/{registrationId}', [TicketController::class, 'show'])->name('market.ticket.show');
    Route::get('/payments/{type}/{registrationId}/pay', [PaymentController::class, 'initiate'])->name('market.payments.initiate');
    Route::get('/payments/callback', [PaymentController::class, 'callback'])->name('market.payments.callback');
    Route::post('/payments/webhook', [PaymentController::class, 'webhook'])->name('market.payments.webhook');
    Route::post('/subscribe', [MarketSubscriberController::class, 'store'])->name('market.subscribe');

    Route::get('/login', [RegistrantAuthController::class, 'showLogin'])->name('market.login');
    Route::post('/login', [RegistrantAuthController::class, 'login'])->name('market.login.submit');
    Route::post('/logout', [RegistrantAuthController::class, 'logout'])->name('market.logout');

    Route::middleware('registrant.auth')->group(function () {
        Route::get('/dashboard', [RegistrantDashboardController::class, 'show'])->name('market.dashboard');
        Route::post('/dashboard', [RegistrantDashboardController::class, 'update'])->name('market.dashboard.update');
    });
});

// Festival — STAGING ONLY. See config/brands.php for why this domain isn't public.
Route::domain(config('brands.festival.host'))->middleware('brand:festival')->group(function () {
    Route::get('/', [FestivalController::class, 'home'])->name('festival.home');
    Route::get('/films', [FestivalController::class, 'films'])->name('festival.films');
    Route::get('/films/{slug}', [FestivalController::class, 'filmShow'])->name('festival.films.show');
    Route::get('/schedule', [FestivalController::class, 'schedule'])->name('festival.schedule');
    Route::get('/venues', [FestivalController::class, 'venues'])->name('festival.venues');
    Route::get('/program', [FestivalController::class, 'program'])->name('festival.program');
    Route::get('/awards', [FestivalController::class, 'awards'])->name('festival.awards');
    Route::get('/guests', [FestivalController::class, 'guests'])->name('festival.guests');
    Route::get('/news', [FestivalController::class, 'news'])->name('festival.news');
    Route::get('/news/{slug}', [FestivalController::class, 'newsShow'])->name('festival.news.show');
    Route::get('/submit', [FestivalController::class, 'submit'])->name('festival.submit');
    Route::get('/archive', [FestivalController::class, 'archive'])->name('festival.archive');
    Route::get('/visit', [FestivalController::class, 'visit'])->name('festival.visit');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('festival.gallery');
    Route::get('/partners', [FestivalController::class, 'partners'])->name('festival.partners');
});
