<?php

namespace App\Http\Controllers\Web\BackofficePartner;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ImagesTrait;
use App\Http\Traits\ProductTrait;

use App\Http\Requests\ProductDataRequest;


use App\Models\Partner;
use App\Models\PartnerCategory;
use App\Models\Product;
use App\Models\Extra;
use App\Models\ProductCategory;
use App\Models\Sauce;
use App\Models\Side;

class ProductController extends Controller
{
    use ImagesTrait, ProductTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        // dd($products->pluck('category.name'));
        return view ('backoffice-partner.product.products')->with('products', $products);
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
        $productCategories = ProductCategory::where('active', true)->get();
        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
        
        # Get Side products
        $sides = Side::where('category_id', $partnerCategory->id)
                     ->where('active', 1)->get();
        # Get Sauces
        $sauces = Sauce::where('category_id', $partnerCategory->id)
                       ->where('active', 1)->get();

        return view('backoffice-partner.product.create', [
            'categories'        => $categories,
            'productCategories' => $productCategories,
            'sides'             => $sides,
            'sauces'            => $sauces,
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
        $partner = Auth::user()->partner;
        $this->createProduct($request);

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
        
        # Get Side products
        $sides = Side::where('category_id', $partnerCategory->id)
                     ->where('active', 1)->get();
        # Get Sauces
        $sauces = Sauce::where('category_id', $partnerCategory->id)
                       ->where('active', 1)->get();

        return view('backoffice-partner.product.create', [
            'sides'             => $sides,
            'sauces'            => $sauces,
            'product'           => $product,
            'categories'        => $categories,
            'productCategories' => $productCategories,
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
        $this->updateProduct($request, $product);

        

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
