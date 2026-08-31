<?php

namespace App\Http\Middleware;

use App\Models\FestivalEdition;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetBrand
{
    public function handle(Request $request, Closure $next, string $brand): Response
    {
        $config = config("brands.{$brand}");

        abort_if($config === null, 404, "Unknown brand [{$brand}]");

        if ($brand === 'festival') {
            $config['cta'] = FestivalEdition::current()?->currentCta() ?? $config['cta'];
        }

        app()->instance('brand', $config);
        View::share('brand', $config);

        return $next($request);
    }
}
