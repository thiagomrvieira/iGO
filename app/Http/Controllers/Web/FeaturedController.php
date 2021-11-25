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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Featured $featured)
    {
        // dd($request->all());
        #   Update the featured 
        $featured->update($request->all());
        return back()->with(['message' => 'Destaque ativado com sucesso!', 'alert' => 'alert-success']);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function destroy(Featured $featured)
    {
        if($featured) {
            $featured->delete();
        }
        return back()->with(['message' => 'Destaque removido com sucesso', 'alert' => 'alert-success']);
    }
}
