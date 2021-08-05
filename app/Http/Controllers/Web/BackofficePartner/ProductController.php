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

        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
        return view('backoffice-partner.product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDataRequest $request)
    {
        
        $product = Product::create([
            'partner_id'  => $request->partner_id,
            'image'       => $this->UploadProductImage($request),
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'available'   => $request->available,
            'note'        => $request->note,
        ]);

        if ($request->extraName) {
            $extra = Extra::create([
                'product_id' => $product->id,
                'name'       => $request->extraName,
                'price'      => $request->extraPrice,
            ]);
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

        $categories = PartnerCategory::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
        return view('backoffice-partner.product.create', [
            'categories' => $categories,
            'product' => $product
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
        $product->update($request->all());

        if ($request->image) {
            $product->update(['image' => $this->UploadProductImage($request)]);
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


}
