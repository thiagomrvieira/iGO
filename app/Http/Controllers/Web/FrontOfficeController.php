<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\WebContent;
use App\Models\PartnerCategory;
use App\Http\Controllers\Controller;
use App\Models\County;

class FrontOfficeController extends Controller
{
    public function showHomePage() {
        return view('frontoffice.guest.home')->with('partnerCategories', PartnerCategory::where('active', 1)->where('parent_id', null)->get() ?? [])
                                             ->with('counties', County::all() ?? []);
    }

    public function showAboutPage() {
        $about = WebContent::where('content_area', 'about')->first() ?? [] ;
        return view('frontoffice.guest.about')->with('about', $about);
    }

    public function showFaqPage() {
        $content = WebContent::where('content_area', 'faq')->get() ?? [] ;
        return view('frontoffice.guest.faq')->with('content', $content);
    }

    public function showConditionsPage() {
        $conditions = WebContent::where('content_area', 'conditions')->first() ?? [] ;
        return view('frontoffice.guest.conditions')->with('conditions', $conditions);
    }

    public function showContactsPage() {
        $contacts = WebContent::where('content_area', 'contacts')->first() ?? [] ;
        return view('frontoffice.guest.contacts')->with('contacts', $contacts);
    }
    
}
