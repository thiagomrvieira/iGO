<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\PartnerCategory;

class FrontOfficeController extends Controller
{
    public function showHomePage() {
        $partnerCategories = (count(PartnerCategory::where('active', 1)->get()) > 0 ) ? PartnerCategory::where('active', 1)->get() : [];
        return view('frontoffice.guest.home')->with('partnerCategories', $partnerCategories);
    }

    public function showAboutPage() {
        $about = Content::where('content_area', 'about')->first() ?? [] ;
        return view('frontoffice.guest.about')->with('about', $about);
    }

    public function showFaqPage() {
        $content = Content::where('content_area', 'faq')->get() ?? [] ;
        return view('frontoffice.guest.faq')->with('content', $content);
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
