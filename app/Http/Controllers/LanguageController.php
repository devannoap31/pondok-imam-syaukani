<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language and redirect back.
     */
    public function switch(Request $request, string $locale)
    {
        $supported = ['id', 'en'];

        if (!in_array($locale, $supported)) {
            $locale = 'id';
        }

        Session::put('locale', $locale);

        $message = $locale === 'id' 
            ? 'Bahasa berhasil diubah ke Bahasa Indonesia 🇮🇩' 
            : 'Language successfully changed to English 🇬🇧';

        return redirect()->back()->with('lang_changed', $message);
    }
}
