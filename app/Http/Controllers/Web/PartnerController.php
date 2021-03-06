<?php

namespace App\Http\Controllers\Web;

use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;
use App\Http\Traits\AddressTrait;
use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerStoreFromHomeRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\PartnerTrait;
use App\Http\Traits\UserTrait;
use App\Mail\AdminActivateAccount;
use App\Mail\ApprovePartnerAccount;
use App\Mail\PartnerCreateAccount;
use App\Models\County;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PartnerController extends Controller
{
    use AddressTrait, UserTrait, PartnerTrait;
    
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
        $partnerCategories = (PartnerCategory::where('active', 1)->where('parent_id', null)->count() > 0 ) ? PartnerCategory::where('active', 1)->where('parent_id', null)->get() : [];
        
        return view('backoffice-admin.partner.partner')->with('partners', $partners)->with('partnerCategories', $partnerCategories);
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
        # Create user
        $user = $this->createUser($request);

        # Get the user id and set value in array 
        $request['user_id'] = $user->id ?? null;

        $partner = Partner::create($request->all());

        # Send Email
        Mail::to($user)->send(new PartnerCreateAccount($partner));

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
        $address = $this->getAddressRequest($request->resource, $user->id); 

        # Send Email
        Mail::to($user)->send(new PartnerCreateAccount($partner));

        
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
        return view('backoffice-admin.partner.partner-edit')
            ->with('partner', $partner)
            ->with('partnerCategories', PartnerCategory::where('active', 1)->where('parent_id', null)->get() ?? [])
            ->with('counties', County::all());
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
        
        # Set Partner as Active/Inactive
        if ($request->activate) 
        {
            if ($this->canActivate($partner)) 
            {
                $partner->update(array('active' => $request->activate));
                $partner->user()->update(array('active' => $request->activate));
                
                # Send Email
                Mail::to($partner->user)->send(new AdminActivateAccount($partner, $partner->user));

            }
            else 
            {
                $message = 'O aderente n??o possui os crit??rios para ser ativo'; 
                $alert   = 'alert-warning';
            }
        }

        # Update partner values
        $partner->update($request->all());

        # Send Email when account is approved
        if ($request->approved_at) {
            $partner->user()->update(array('active' => 1));
            Mail::to($partner->user)->send(new ApprovePartnerAccount($partner, $partner->user));
        }

        # Update Address
        if (!is_null($request->addressData)) 
        { 
            $address = $this->getAddressRequest($request, $partner->user->id); 
        }

        return back()->with(['message' => $message ?? 'Aderente editado com sucesso!', 'alert' => $alert ?? 'alert-success']);
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
            $partner->user->delete();
        }
        return redirect()->route('partner.index');
    }
}
