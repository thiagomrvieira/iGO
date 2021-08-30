<?php

namespace App\Http\Controllers\Web;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Featured;

class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backoffice-admin.featured.products', [
            'productFeatured' => Featured::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $deliveryMan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Featured $featured)
    {
        if($featured) {
            $featured->delete();
        }
        return redirect()->route('featured.index');
    }
}
