<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

class ShippingFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backoffice-admin.shippingfee.shippingfee', [
            'shippingFees' => ShippingFee::all(),
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ShippingFee = ShippingFee::find($id)->update($request->all());
        return back()->with(['message' => 'Valor da entrega alterado!', 
                             'alert'   => 'alert-success']);
    }


}
