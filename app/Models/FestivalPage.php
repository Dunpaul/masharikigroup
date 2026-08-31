<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestivalPage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'sort_order',
    ];
}
