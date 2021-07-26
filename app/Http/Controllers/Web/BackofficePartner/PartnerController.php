<?php

namespace App\Http\Controllers\Web\BackofficePartner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PartnerController extends Controller
{
    /**
     * Display the login view for admin
     *
     * @return \Inertia\Response
     */
    public function login()
    {
        return view('backoffice-partner.partner.login');
    }
    
    /**
     * Check if its the first login
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->partner->first_login) {   
            return $this->welcome();
        }
        return $this->dashboard();
    }
    
    /**
     * Display the Dashboard view
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return 'Dashboard';
    }
    
    

    /**
     * Show the form for creating business data.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('backoffice-partner.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBusinessData()
    {
        // $pt = Partner::first();
        // dd($pt->user->name);
        // dd($pt->category->name);
        $partnerCategories = (count(PartnerCategory::where('active', 1)->get()) > 0 ) ? PartnerCategory::where('active', 1)->get() : [];
        
        return view('backoffice-partner.business-data')->with('partnerCategories', $partnerCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBusinessData(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
