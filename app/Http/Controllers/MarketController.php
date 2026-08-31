<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\MarketCategory;
use App\Models\MarketFaq;
use App\Models\MarketNewsArticle;
use App\Models\MarketPartner;
use App\Models\MarketProgramSession;
use App\Models\MarketSettings;
use App\Models\MarketTeamMember;
use App\Models\NonExhibitor;
use App\Models\Student;
use App\Models\VirtualAttendant;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class MarketController extends Controller
{
    public function home(): View
    {
        return view('market.home', [
            'settings' => MarketSettings::current(),
            'categories' => MarketCategory::all(),
            'partners' => MarketPartner::where('featured', true)->get(),
        ]);
    }

    public function partners(): View
    {
        return view('partners.index', [
            'partners' => MarketPartner::all(),
        ]);
    }

    public function about(): View
    {
        return view('market.about', [
            'settings' => MarketSettings::current(),
            'team' => MarketTeamMember::all(),
        ]);
    }

    public function events(): View
    {
        return view('market.events', [
            'settings' => MarketSettings::current(),
        ]);
    }

    public function delegation(): View
    {
        $delegates = Collection::make()
            ->concat(Exhibitor::where('payment_status', 'paid')->get()->map(fn ($r) => $this->toDelegateRow($r, 'Exhibitor')))
            ->concat(NonExhibitor::where('payment_status', 'paid')->get()->map(fn ($r) => $this->toDelegateRow($r, 'Non-Exhibitor')))
            ->concat(Student::where('payment_status', 'paid')->get()->map(fn ($r) => $this->toDelegateRow($r, 'Student')))
            ->concat(VirtualAttendant::where('payment_status', 'paid')->get()->map(fn ($r) => $this->toDelegateRow($r, 'Virtual Attendant')))
            ->sortBy('first_name')
            ->values();

        return view('market.delegation', [
            'settings' => MarketSettings::current(),
            'delegates' => $delegates,
        ]);
    }

    protected function toDelegateRow($registrant, string $typeLabel): array
    {
        return [
            'first_name' => $registrant->company_contact_first_name,
            'last_name' => $registrant->company_contact_last_name,
            'organization' => $registrant->company_name ?? $registrant->school_name ?? '—',
            'designation' => $registrant->designation,
            'attending_as' => $registrant->attending_as,
            'type' => $typeLabel,
        ];
    }

    public function calendar(): View
    {
        return view('market.calendar');
    }

    public function tours(): View
    {
        return view('market.tours');
    }

    public function media(): View
    {
        return view('market.media', [
            'articles' => MarketNewsArticle::all(),
        ]);
    }

    public function newsArticle(string $slug): View
    {
        $article = MarketNewsArticle::where('slug', $slug)->firstOrFail();

        return view('market.news-article', ['article' => $article]);
    }

    public function faq(): View
    {
        return view('market.faq', [
            'faqs' => MarketFaq::all(),
        ]);
    }

    public function program(): View
    {
        $settings = MarketSettings::current();
        $sessions = MarketProgramSession::all()->groupBy('day_number');

        $dayLabels = [];
        foreach ($sessions->keys() as $dayNumber) {
            $dayLabels[$dayNumber] = $settings->start_date
                ? $settings->start_date->copy()->addDays($dayNumber - 1)->format('F jS, Y')
                : 'Date TBD';
        }

        return view('market.program', [
            'sessions' => $sessions,
            'dayLabels' => $dayLabels,
        ]);
    }

    public function comingSoon(string $title): View
    {
        return view('market.coming-soon', ['title' => $title]);
    }
}
