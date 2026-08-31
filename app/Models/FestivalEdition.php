<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FestivalEdition extends Model
{
    protected $fillable = [
        'year',
        'edition_number',
        'theme_name',
        'theme_statement',
        'start_date',
        'end_date',
        'tagline',
        'hero_image',
        'status',
        'cta_phase',
        'cta_label_override',
        'cta_url_override',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(FestivalSection::class);
    }

    public function films(): HasMany
    {
        return $this->hasMany(FestivalFilm::class);
    }

    public function guests(): HasMany
    {
        return $this->hasMany(FestivalGuest::class);
    }

    public function juryMembers(): HasMany
    {
        return $this->hasMany(FestivalJuryMember::class);
    }

    public function awards(): HasMany
    {
        return $this->hasMany(FestivalAward::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(FestivalProgram::class);
    }

    public function sponsors(): HasMany
    {
        return $this->hasMany(FestivalSponsor::class);
    }

    public function newsArticles(): HasMany
    {
        return $this->hasMany(FestivalNewsArticle::class);
    }

    public function submissionInfo(): HasMany
    {
        return $this->hasMany(FestivalSubmissionInfo::class);
    }

    public static function current(): ?self
    {
        return static::where('status', 'current')->first() ?? static::latest('year')->first();
    }

    /**
     * The festival is free — there is no ticketing/RSVP flow. This only
     * ever switches the wording/destination of the single primary CTA
     * between "Submit Your Film" (call-for-entries open) and "Plan Your
     * Visit" (an informational page once the program is published).
     * `cta_label_override` / `cta_url_override` let an editor change the
     * wording or point at an external URL (e.g. FilmFreeway directly)
     * without touching code — they do not add a booking destination.
     */
    public function currentCta(): array
    {
        if ($this->cta_label_override && $this->cta_url_override) {
            return ['label' => $this->cta_label_override, 'url' => $this->cta_url_override];
        }

        return match ($this->cta_phase) {
            'program_published' => ['label' => 'Plan Your Visit', 'route' => 'festival.visit'],
            default => ['label' => 'Submit Your Film', 'route' => 'festival.submit'],
        };
    }
}
