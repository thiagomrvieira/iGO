<?php

namespace App\Http\Controllers\Web\BackofficePartner;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ImagesTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\FeaturedProductTrait;

use App\Http\Requests\ProductDataRequest;
use App\Models\Allergen;
use App\Models\Campaign;
use App\Models\Partner;
use App\Models\PartnerCategory;
use App\Models\Product;
use App\Models\Extra;
use App\Models\ProductCategory;
use App\Models\Sauce;
use App\Models\Side;

class ProductController extends Controller
{
    use ImagesTrait, ProductTrait , FeaturedProductTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('backoffice-partner.product.products', [
            'products' => Product::where('partner_id', Auth::user()->partner->id)->with('featured')->orderBy('created_at', 'DESC')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        # Get User/Partner and his main category
        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;

        # Get Product and Partner categories
        $productCategories = ProductCategory::where('partner_category_id', $partner->category_id)->where('active', true)->get();
        $categories        = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];

        if($partner->mainCategory->slug == 'restaurantes'){
            # Get Side products
            $sides = Side::where('category_id', $partnerCategory->id)->where('active', 1)->get();
            # Get Sauces
            $sauces = Sauce::where('category_id', $partnerCategory->id)->where('active', 1)->get();
            # Get Allergens
            $allergens = Allergen::where('category_id', $partnerCategory->id)->where('active', 1)->get();
        }

        # Get Campaigns
        $campaigns = Campaign::where('active', 1)->get();

        return view('backoffice-partner.product.create', [
            'categories'        => $categories,
            'productCategories' => $productCategories,
            'sides'             => $sides     ?? [],
            'sauces'            => $sauces    ?? [],
            'allergens'         => $allergens ?? [],
            'campaigns'         => $campaigns,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDataRequest $request)
    {
        # Get User/Partner
        $partner = Auth::user()->partner;
        
        # Create a new product
        $product = $this->createProduct($request);

        # Check if the partner wants to Feature the product
        if ($product && $request->featured == 1) {
            $featuredProduct = $this->createFeaturedProductRequest($product);
        }

        # Check if it's the first login and redirect to next step from 'welcome' flow
        if ($partner->first_login == 1) {
            return redirect()->route('partner.profile.edit');
        }

        return redirect()->route('products.index');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        # Get User/Partner and his main category
        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;
        
        # Get Product and Partner categories
        $productCategories = ProductCategory::where('active', true)->get();
        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
        
        if($partner->mainCategory->slug == 'restaurantes'){
            # Get Side products
            $sides = Side::where('category_id', $partnerCategory->id)->where('active', 1)->get();
            # Get Sauces
            $sauces = Sauce::where('category_id', $partnerCategory->id)->where('active', 1)->get();
            # Get Allergens
            $allergens = Allergen::where('category_id', $partnerCategory->id)->where('active', 1)->get();
        }
        
        $campaigns = Campaign::where('active', 1)->get();

        return view('backoffice-partner.product.create', [
            'sides'             => $sides     ?? [],
            'sauces'            => $sauces    ?? [],
            'allergens'         => $allergens ?? [],
            'product'           => $product,
            'categories'        => $categories,
            'productCategories' => $productCategories,
            'campaigns'         => $campaigns,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        #   Update the product
        $this->updateProduct($request, $product);
        #   Update the featured
        $this->updateFeaturedProductRequest($request, $product);
        
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $deliveryMan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product) {
            $product->delete();
        }
        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeExtra(Request $request)
    {
        $extra = '';
        if($extra = Extra::where('id', $request['id'])->where('product_id', $request['product_id'])->first()) {
            $extra->delete();
        }
        return $extra;
    }
}
