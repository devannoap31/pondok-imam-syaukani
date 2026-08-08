<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     * Reads the 'locale' from the session and sets Laravel's app locale.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['id', 'en'];
        $locale = Session::get('locale', config('app.locale', 'id'));

        if (!in_array($locale, $supportedLocales)) {
            $locale = 'id';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
