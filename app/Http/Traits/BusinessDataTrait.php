<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Partner;
use App\Models\SchedulePartner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


trait BusinessDataTrait {
    
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
}