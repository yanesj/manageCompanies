<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function swap($lang)
    {
        // Almacenar el lenguaje en la session
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
