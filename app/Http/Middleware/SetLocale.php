<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {

        $locale = session('locale', config('app.locale'));
        App::setLocale($locale);
        config(['app.locale' => $locale]);

        return $next($request);
    }
}
