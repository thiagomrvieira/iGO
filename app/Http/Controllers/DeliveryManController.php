<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use App\Http\Traits\AddressTrait;


class DeliveryManController extends Controller
{
    use AddressTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryMen = [];
        if ( count(DeliveryMan::all()) > 0 ) {
            $deliveryMen = DeliveryMan::all();
        }
        return view('backoffice.deliveryman.deliveryman')->with('deliveryMen', $deliveryMen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.deliveryman.deliveryman-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deliveryman = DeliveryMan::create($request->all());
        return redirect()->route('deliveryman.edit', ['deliveryman' => $deliveryman]);
        
    }

    /**
     * Store a newly (from home) resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDelManFromHome(Request $request)
    {
        $deliveryman = DeliveryMan::create($request->resource);
        // return response()->json([$request->all()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryMan  $deliveryMan
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryMan $deliveryman)
    {
        return view('backoffice.deliveryman.deliveryman-edit')->with('deliveryman', $deliveryman);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryMan  $deliveryman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryMan $deliveryman)
    {
        $deliveryman->update($request->all());
        if (!is_null($request->addressData)) { 
            $address = $this->getAddressRequest($request, $deliveryman->address_id); 
            $deliveryman->address_id = $address->id;
            $deliveryman->save();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryMan  $deliveryMan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryMan $deliveryman)
    {
        if($deliveryman) {
            $deliveryman->delete();
        }
        return redirect()->route('deliveryman.index');
    }
}
