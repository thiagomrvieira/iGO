<?php

namespace App\Http\Controllers\Web\BackofficePartner;

use App\Http\Controllers\Controller;

use App\Models\Partner;
use App\Models\Product;
use App\Models\PartnerCategory;
use App\Models\SchedulePartner;

use App\Http\Traits\ImagesTrait;
use App\Http\Traits\AddressTrait;
use App\Http\Traits\BusinessDataTrait;
use App\Http\Requests\BusinessDataRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PartnerController extends Controller
{
    use ImagesTrait;
    use BusinessDataTrait;
    use AddressTrait;

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
        # Get the products that owns the partner
        $products = Product::where('partner_id', Auth::user()->partner->id);
        
        # Get total
        $totalProducts = $products->count();
        # Get last entry
        $lastProductEntry = $products->latest('created_at')->first();
        

        # Get all side dishes
        $sideDishes = $products->whereHas('category', function($q){
            $q->where('slug', 'entradas');
        });
        # Get total side dishes
        $totalSideDishes = $sideDishes->count();
        # Get the last Side Dish entry
        $lastSDEntry = $sideDishes->latest('created_at')->first();


        # Get all main dishes
        $mainDishes = $products->whereHas('category', function($q){
            $q->where('slug', 'pratos-principais');
        });
        # Get total side dishes
        $totalMainDishes = $mainDishes->count();
        # Get the last Main Dish entry
        $lastMainEntry = $mainDishes->latest('created_at')->first();


        # Get all Desserts
        $desserts = $products->whereHas('category', function($q){
            $q->where('slug', 'sobremesas');
        });
        # Get total Desserts
        $totalDesserts = $desserts->count();
        # Get the last Dessert entry
        $lastDessertEntry = $mainDishes->latest('created_at')->first();


        # Get all Drinks
        $drinks = $products->whereHas('category', function($q){
            $q->where('slug', 'bebidas');
        });
        # Get total Desserts
        $totalDrinks = $drinks->count();
        # Get the last Dessert entry
        $lastDrinkEntry = $drinks->latest('created_at')->first();

        
        return view('backoffice-partner.dashboard.dashboard', [
            'products'         => $products,
            'totalProducts'    => $totalProducts,
            'lastProductEntry' => $lastProductEntry,
            
            'sideDishes'       => $sideDishes,
            'totalSideDishes'  => $totalSideDishes,
            'lastSDEntry'      => $lastSDEntry,
            
            'mainDishes'       => $mainDishes,
            'lastMainEntry'    => $lastMainEntry,
            'totalMainDishes'  => $totalMainDishes,

            'desserts'         => $desserts,
            'lastDessertEntry' => $lastDessertEntry,
            'totalDesserts'    => $totalDesserts,
            
            'drinks'           => $drinks,
            'lastDrinkEntry'   => $lastDrinkEntry,
            'totalDrinks'      => $totalDrinks,
        ]);
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

        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
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

        //  dd($request->all());
        
        // Store subcategories 
        $this->storeSubcategories($request);

        // Store Schedule 
        $this->storeSchedule($request);
        
        // Store Average time 
        $this->storeAvgTime($request);       

        // Store Images 
        $this->UploadPartnerImage($request);   
        

        return redirect()->route('products.create');
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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $partner = Auth::user()->partner;
        return view('backoffice-partner.partner.profile', [
            'partner' => $partner,
        ]);
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
        # Get the first_login flag before update
        $itWastheFirstLogin = Auth::user()->partner->first_login;   

        $partner->update([
            'name'                => $request->name,
            'email'               => $request->email,
            'phone_number'        => $request->phone,
            'mobile_phone_number' => $request->mobile,
            'tax_number'          => $request->tax,
            'first_login'         => 0,
        ]);

        # Check in address inputs and call update method 
        if (!is_null($request->line_1) || !is_null($request->county) || !is_null($request->city) || !is_null($request->post_code)) { 
            $address = $this->getAddressRequest($request, $partner->user->id); 
        }

        # Check if input image has value
        if (!is_null($request->image_cover) ) { 
            $image = $this->UpdatePartnerCoverImage($request);   
        }

        # Check if first_login flag is true
        if ($itWastheFirstLogin == 1) {
            return redirect()->route('partner.dashboard');
        }

        return redirect()->route('partner.profile.edit');

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
