<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class FrontOfficeController extends Controller
{
    public function showHomePage() {
        return view('frontoffice.home');
    }

    public function showAboutPage() {
        $about = Content::where('content_area', 'about')->first() ?? [] ;
        return view('frontoffice.about')->with('about', $about);
    }

    public function showFaqPage() {
        $faq = Content::where('content_area', 'faq')->first() ?? [] ;
        return view('frontoffice.faq')->with('faq', $faq);
    }

    public function showConditionsPage() {
        $conditions = Content::where('content_area', 'conditions')->first() ?? [] ;
        return view('frontoffice.conditions')->with('conditions', $conditions);
    }
    
}
