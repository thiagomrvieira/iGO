<?php

namespace App\Http\Controllers\Web\BackofficePartner;

use App\Http\Controllers\Controller;

use App\Models\Partner;
use App\Models\Category;
use App\Models\SchedulePartner;

use App\Http\Traits\ImagesTrait;
use App\Http\Traits\BusinessDataTrait;
use App\Http\Requests\BusinessDataRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PartnerController extends Controller
{
    use ImagesTrait;
    use BusinessDataTrait;

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
        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;

        $categories = Category::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
        return view('backoffice-partner.business-data')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBusinessData(BusinessDataRequest $request)
    {   

        // Store subcategories 
        $this->storeSubcategories($request);

        // Store Schedule 
        $this->storeSchedule($request);
        
        // Store Average time 
        $this->storeAvgTime($request);       

        // Store Images 
        $this->UploadPartnerImage($request);   
        

        return redirect()->route('product.create');
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
