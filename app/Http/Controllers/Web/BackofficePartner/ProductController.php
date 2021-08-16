<?php

namespace App\Http\Controllers\Web\BackofficePartner;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ImagesTrait;
use App\Http\Requests\ProductDataRequest;


use App\Models\Partner;
use App\Models\PartnerCategory;
use App\Models\Product;
use App\Models\Extra;
use App\Models\ProductCategory;
use App\Models\Side;

class ProductController extends Controller
{
    use ImagesTrait;

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
        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;

        $productCategories = ProductCategory::where('active', true)->get();
        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];

        $sides = Side::where('category_id', $partnerCategory->id)->get();

        return view('backoffice-partner.product.create', [
            'categories'        => $categories,
            'productCategories' => $productCategories,
            'sides'             => $sides,
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

        # Create a new Product
        $product = Product::create([
            'partner_id'  => $request->partner_id,
            'image'       => $this->UploadProductImage($request),
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'available'   => $request->available,
            'category_id' => $request->category_id,
            'note'        => $request->note,
        ]);
        
        # Check if input extras has value and Create extra model
        if ($request->extras) {
            foreach (json_decode($request->extras) as $extras) {
                $extra = Extra::create([
                    'product_id' => $product->id,
                    'name'       => $extras->name,
                    'price'      => $extras->price,
                ]);
            }
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

        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;

        $productCategories = ProductCategory::where('active', true)->get();

        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];

        return view('backoffice-partner.product.create', [
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
        # Update product values
        $product->update($request->all());

        # Check if input image has value and update
        if ($request->image) {
            $product->update(['image' => $this->UploadProductImage($request)]);
        }

        # Check if input extras has value and Update extra model
        if ($request->extras) {
            foreach (json_decode($request->extras) as $extras) {
                $extra = Extra::updateOrCreate([
                    'product_id' => $product->id,
                    'name'       => $extras->name,
                ],[
                    'product_id' => $product->id,
                    'name'       => $extras->name,
                    'price'      => $extras->price,
                ]);
            }
        }

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
