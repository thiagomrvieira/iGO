<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use App\Http\Traits\AddressTrait;
use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerStoreFromHomeRequest;

class PartnerController extends Controller
{
    use AddressTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $partners = (count(Partner::all()) > 0 ) ? Partner::all() : [];
        $partnerCategories = (count(PartnerCategory::where('active', 1)->get()) > 0 ) ? PartnerCategory::where('active', 1)->get() : [];
        
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
    public function store(PartnerStoreRequest $request)
    {
        $partner = Partner::create($request->all());
        return redirect()->route('partner.edit', ['partner' => $partner])
                         ->with(['message' => 'Aderente criado com sucesso!', 'alert' => 'alert-success']);
    }

    /**
     * Store a newly (from home) resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPartnerFromHome(PartnerStoreFromHomeRequest $request)
    {
        $partner = Partner::create($request->resource);
        return response()->json(['resource' => $partner], 201); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {

        $partnerCategories = (count(PartnerCategory::where('active', 1)->get()) > 0 ) ? 
                                    PartnerCategory::where('active', 1)->get() : [];
                                    
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
        if (!is_null($request->addressData)) { 
            $address = $this->getAddressRequest($request, $partner->address_id); 
            $partner->address_id = $address->id;
            $partner->save();
        }
        return back()->with(['message' => 'Aderente editado com sucesso!', 'alert' => 'alert-success']);
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
