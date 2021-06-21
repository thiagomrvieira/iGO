<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $partners = (count(Partner::all()) > 0 ) ? Partner::all() : [];
        $partnerCategories = (count(PartnerCategory::all()) > 0 ) ? PartnerCategory::all() : [];
        
        return view('backoffice.partner.partner')->with('partners', $partners)
                                                 ->with('partnerCategories', $partnerCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner = Partner::create($request->all());
        return redirect()->route('partner.edit', ['partner' => $partner]);
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
        $partnerCategories = (count(PartnerCategory::all()) > 0 ) ? PartnerCategory::all() : [];
        return view('backoffice.partner.partner-edit')->with('partner', $partner)
                                                      ->with('partnerCategories', $partnerCategories);
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
        $partner->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if($partner) {
            $partner->delete();
        }
        return redirect()->route('partner.index');
    }
}
