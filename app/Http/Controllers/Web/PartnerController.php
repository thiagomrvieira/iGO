<?php

namespace App\Http\Controllers\Web;

use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use App\Http\Traits\AddressTrait;
use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerStoreFromHomeRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\UserTrait;
use Carbon\Carbon;

class PartnerController extends Controller
{
    use AddressTrait, UserTrait;
    
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $partners = (count(Partner::all()) > 0 ) ? Partner::orderby('id', 'desc')->simplePaginate(10) : [];
        $partnerCategories = (PartnerCategory::where('active', 1)->where('parent_id', null)->count() > 0 ) ? 
                                                                    PartnerCategory::where('active', 1)->where('parent_id', null)->get() : [];
        
        return view('backoffice-admin.partner.partner')->with('partners', $partners)
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
        # Set variable for resource creation 
        $resource = $request->resource;

        # Create user
        $user = $this->createUserFromHome($resource);

        # Get the user id and set value in array 
        $resource['user_id'] = $user->id ?? null;

        # Create Partner 
        $partner = Partner::create($resource);

        # Create address
        // dd($request->all());
        $address = $this->getAddressRequest($request->resource, $user->id); 
        
        
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

        $partnerCategories = (PartnerCategory::where('active', 1)->where('parent_id', null)->count() > 0 ) ? 
                                    PartnerCategory::where('active', 1)->where('parent_id', null)->get() : [];
                                    
        return view('backoffice-admin.partner.partner-edit')->with('partner', $partner)
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

        # Update partner values
        $partner->update($request->all());

        # Set user as Active/Inactive
        $partner->user()->update(array('active' => $request->active));

        if (!is_null($request->addressData)) { 
            $address = $this->getAddressRequest($request, $partner->user->id); 
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
