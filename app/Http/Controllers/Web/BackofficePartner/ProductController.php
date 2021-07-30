<?php

namespace App\Http\Controllers\Web\BackofficePartner;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ImagesTrait;
use App\Http\Requests\ProductDataRequest;


use App\Models\Partner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Extra;


class ProductController extends Controller
{
    use ImagesTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductData()
    {
        $partner = Auth::user()->partner;
        $partnerCategory = $partner->mainCategory;

        $categories = Category::where('active', 1)->where('parent_id', $partnerCategory->id )->get() ?? [];
        return view('backoffice-partner.product-data')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductData(ProductDataRequest $request)
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

        // return redirect()->route('partner.dashboard');

    }
}
