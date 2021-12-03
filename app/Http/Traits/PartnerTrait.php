<?php

namespace App\Http\Traits;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait PartnerTrait {
    
    #   Check if the Partner has the criteria to be activated
    public function canActivate(Partner $partner) 
    { 
        #   Check if the partner has Subcategories
        $canActivate = $partner->subCategories->count() < 1 ? false : true;
        #   Check if the partner has images
        $canActivate = is_null($partner->images)            ? false : true;
        #   Check if the partner has products
        $canActivate = $partner->products->count() < 1      ? false : true;
        #   Check if the partner has schedule
        $canActivate = $partner->schedule->count() < 1      ? false : true;
                   
        return $canActivate ?? false;
    }

   
    
}