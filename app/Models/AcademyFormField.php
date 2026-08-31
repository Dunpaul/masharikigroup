<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyFormField extends Model
{
    protected $fillable = [
        'key',
        'label',
        'type',
        'options',
        'multiple',
        'required',
        'sort_order',
        'system_key',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
            'multiple' => 'boolean',
            'required' => 'boolean',
        ];
    }

    /**
     * The 'program' system field's options always mirror the live Academy
     * program list rather than a static admin-entered list, so it can never
     * drift from the actual programs on offer.
     */
    public function resolvedOptions(): array
    {
        if ($this->system_key === 'program') {
            return AcademyProgram::query()->pluck('title', 'specialization_key')->all();
        }

        return collect($this->options ?? [])->mapWithKeys(fn ($option) => [$option => $option])->all();
    }

    public static function ordered()
    {
        return static::query()->orderBy('sort_order')->get();
    }
}
