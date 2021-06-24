<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class FrontOfficeController extends Controller
{
    public function showHomePage() {
        return view('frontoffice.guest.home');
    }

    public function showAboutPage() {
        $about = Content::where('content_area', 'about')->first() ?? [] ;
        return view('frontoffice.guest.about')->with('about', $about);
    }

    public function showFaqPage() {
        $faq = Content::where('content_area', 'faq')->first() ?? [] ;
        return view('frontoffice.guest.faq')->with('faq', $faq);
    }

    public function showConditionsPage() {
        $conditions = Content::where('content_area', 'conditions')->first() ?? [] ;
        return view('frontoffice.guest.conditions')->with('conditions', $conditions);
    }

    public function showContactsPage() {
        $contacts = Content::where('content_area', 'contacts')->first() ?? [] ;
        return view('frontoffice.guest.contacts')->with('contacts', $contacts);
    }
    
}
