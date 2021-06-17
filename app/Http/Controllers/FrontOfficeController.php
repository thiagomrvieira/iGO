<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    public function showHomePage() {
        return view('frontoffice.home');
    }

    public function showAboutPage() {
        return view('frontoffice.about');
    }

    public function showFaqPage() {
        return view('frontoffice.faq');
    }

    public function showConditionsPage() {
        return view('frontoffice.conditions');
    }
    
}
