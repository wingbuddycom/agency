<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $locale = $request->input('locale');

        if (! in_array($locale, config('app.supported_locales'))) {
            $locale = config('app.fallback_locale');
        }

        Session::put('locale', $locale);

        /* ---------- build the new URL ---------- */
        $previous = url()->previous();                // e.g. https://site.test/en/login
        $supported = implode('|', config('app.supported_locales'));

        $url = preg_replace(
            "~/(?:$supported)(/|$)~",                // replace first segment if it’s a locale…
            "/{$locale}\$1",                         // …with the one just chosen
            $previous,
            1
        );

        return redirect($url);                       // /fr/login  ✅
    }
}
