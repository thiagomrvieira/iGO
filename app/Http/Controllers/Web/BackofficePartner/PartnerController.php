<?php

namespace App\Http\Controllers\Web\BackofficePartner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Category;
use App\Models\SchedulePartner;
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
    public function storeBusinessData(Request $request)
    {
        
        // Store subcategories 
        $this->storeSubcategories($request);

        // Store Schedule 
        $this->storeSchedule($request);
        
        // Store Average time 
        $this->storeAvgTime($request);       
    }
    
    
    /**
     * Persist partner subcategories in pivot table.
     */
    public function storeSubcategories($request)
    {
        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;

        $categories = Category::where('active', 1)->where('parent_id', $partnerCategory->id )->get();
        $catSlugs = $categories->pluck('slug');

        # Check if the categories slug exists in $request and set array $catIdsForUpdate
        $catIdsForUpdate = [];
        foreach ($catSlugs as $slug) {
            if( $request->$slug){
                $catId = $categories->where('slug', $slug)->first();
                array_push($catIdsForUpdate, $catId->id);
            }
        }
        
        # Update categories in pivot table
        if ($catIdsForUpdate != []) {
            $partner->subCategories()->sync($catIdsForUpdate);
        }

        return true;
    }

    /**
     * Persist partner schedule in schedule_partners table.
     */
    public function storeSchedule($request)
    {
        
        $workDays = [ 
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday',
            'holiday',
        ];

        $workPeriods = [ 
            'morning',
            'afternoon',
            'evening',
        ];
        
        $partner = Auth::user()->partner;

        foreach ($workDays as $workDay) {
            if ($request->$workDay) {
                foreach ($workPeriods as $workPeriod) {
                    if ($request->{$workDay.ucfirst($workPeriod)}) {
                        ${"schedule".$workDay.ucfirst($workPeriod)} = SchedulePartner::updateOrCreate([
                            'day'        => $workDay,
                            'period'     => $workPeriod,
                            'partner_id' => $partner->id,
                        ],
                        [
                            'day'        => $workDay,
                            'period'     => $workPeriod,
                            'open'       => $request->{$workDay.ucfirst($workPeriod)."Opening"},
                            'close'      => $request->{$workDay.ucfirst($workPeriod)."Closing"},
                            'partner_id' => $partner->id,
                        ]);
                    }
                }
            }
        }

        return true;
    }

    /**
     * Persist average order time in database.
     */
    public function storeAvgTime($request)
    {

        if ($request->avgtime) {
            $partner = Partner::find(Auth::user()->partner->id);
            $partner->average_order_time = $request->avgtime;
            $partner->save();
        }

        return true;
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
