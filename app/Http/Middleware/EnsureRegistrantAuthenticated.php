<?php

namespace App\Http\Middleware;

use App\Support\RegistrantLocator;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRegistrantAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $type = $request->session()->get('registrant_type');
        $id = $request->session()->get('registrant_id');

        if (! $type || ! $id || ! RegistrantLocator::find($type, $id)) {
            $request->session()->forget(['registrant_type', 'registrant_id']);

            return redirect()->route('market.login');
        }

        return $next($request);
    }
}
