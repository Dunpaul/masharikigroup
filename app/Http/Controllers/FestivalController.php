<?php

namespace App\Http\Controllers;

use App\Models\FestivalAward;
use App\Models\FestivalEdition;
use App\Models\FestivalFilm;
use App\Models\FestivalGuest;
use App\Models\FestivalJuryMember;
use App\Models\FestivalNewsArticle;
use App\Models\FestivalPartner;
use App\Models\FestivalProgram;
use App\Models\FestivalScreening;
use App\Models\FestivalSettings;
use App\Models\FestivalSponsor;
use App\Models\FestivalSubmissionInfo;
use App\Models\FestivalVenue;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FestivalController extends Controller
{
    protected function currentEdition(): ?FestivalEdition
    {
        return FestivalEdition::current();
    }

    public function home(): View
    {
        $edition = $this->currentEdition();

        return view('festival.home', [
            'edition' => $edition,
            'settings' => FestivalSettings::current(),
            'featuredFilms' => $edition ? $edition->films()->limit(6)->get() : collect(),
            'sponsors' => $edition ? $edition->sponsors()->get() : collect(),
            'partners' => FestivalPartner::where('featured', true)->get(),
        ]);
    }

    public function partners(): View
    {
        return view('partners.index', [
            'partners' => FestivalPartner::all(),
        ]);
    }

    public function films(Request $request): View
    {
        $edition = $this->currentEdition();

        $films = $edition
            ? $edition->films()
                ->when($request->filled('section'), fn ($q) => $q->where('festival_section_id', $request->query('section')))
                ->get()
            : collect();

        return view('festival.films', [
            'edition' => $edition,
            'films' => $films,
            'sections' => $edition ? $edition->sections()->get() : collect(),
            'activeSection' => $request->query('section'),
        ]);
    }

    public function filmShow(string $slug): View
    {
        $edition = $this->currentEdition();

        $film = FestivalFilm::where('festival_edition_id', $edition?->id)
            ->where('slug', $slug)
            ->with(['section', 'screenings.venue', 'guests'])
            ->firstOrFail();

        return view('festival.film-show', [
            'edition' => $edition,
            'film' => $film,
        ]);
    }

    public function schedule(Request $request): View
    {
        $edition = $this->currentEdition();

        $screenings = collect();

        if ($edition) {
            $screenings = FestivalScreening::whereHas('film', fn ($q) => $q->where('festival_edition_id', $edition->id))
                ->when($request->filled('day'), fn ($q) => $q->whereDate('screening_date', $request->query('day')))
                ->when($request->filled('venue'), fn ($q) => $q->where('festival_venue_id', $request->query('venue')))
                ->when($request->filled('section'), fn ($q) => $q->whereHas('film', fn ($fq) => $fq->where('festival_section_id', $request->query('section'))))
                ->with(['film.section', 'venue'])
                ->orderBy('screening_date')
                ->orderBy('start_time')
                ->get();
        }

        $days = $edition
            ? FestivalScreening::whereHas('film', fn ($q) => $q->where('festival_edition_id', $edition->id))
                ->selectRaw('DISTINCT screening_date')
                ->orderBy('screening_date')
                ->pluck('screening_date')
            : collect();

        return view('festival.schedule', [
            'edition' => $edition,
            'screenings' => $screenings,
            'days' => $days,
            'venues' => FestivalVenue::all(),
            'sections' => $edition ? $edition->sections()->get() : collect(),
            'filters' => $request->only(['day', 'venue', 'section']),
        ]);
    }

    public function venues(): View
    {
        return view('festival.venues', [
            'venues' => FestivalVenue::all(),
        ]);
    }

    public function program(): View
    {
        $edition = $this->currentEdition();

        return view('festival.program', [
            'edition' => $edition,
            'programs' => $edition ? $edition->programs()->with(['venue', 'speakers'])->get() : collect(),
        ]);
    }

    public function awards(): View
    {
        $edition = $this->currentEdition();

        return view('festival.awards', [
            'edition' => $edition,
            'juryMembers' => $edition ? $edition->juryMembers()->get() : collect(),
            'awards' => $edition ? $edition->awards()->with('winnerFilm')->get() : collect(),
        ]);
    }

    public function guests(): View
    {
        $edition = $this->currentEdition();

        return view('festival.guests', [
            'edition' => $edition,
            'guests' => $edition ? $edition->guests()->get() : collect(),
        ]);
    }

    public function news(): View
    {
        return view('festival.news', [
            'articles' => FestivalNewsArticle::all(),
        ]);
    }

    public function newsShow(string $slug): View
    {
        $article = FestivalNewsArticle::where('slug', $slug)->firstOrFail();

        return view('festival.news-show', ['article' => $article]);
    }

    public function submit(): View
    {
        $edition = $this->currentEdition();

        return view('festival.submit', [
            'submissionInfo' => $edition ? FestivalSubmissionInfo::where('festival_edition_id', $edition->id)->first() : null,
        ]);
    }

    public function archive(): View
    {
        return view('festival.archive', [
            'editions' => FestivalEdition::where('status', 'archived')->orderByDesc('year')->get(),
        ]);
    }


    /**
     * Informational only — no form, no reservation/RSVP logic. The festival
     * is free; this page just tells visitors when/where/how to show up.
     */
    public function visit(): View
    {
        $edition = $this->currentEdition();

        return view('festival.visit', [
            'edition' => $edition,
            'venues' => FestivalVenue::all(),
        ]);
    }
}
