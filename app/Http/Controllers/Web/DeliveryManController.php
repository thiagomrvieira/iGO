<?php

namespace App\Http\Controllers\Web;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use App\Http\Traits\AddressTrait;
use App\Http\Requests\DeliverymanStoreRequest;
use App\Http\Requests\DeliverymanStoreFromHomeRequest;
use App\Http\Controllers\Controller;


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
            $deliveryMen = DeliveryMan::orderby('id', 'desc')->simplePaginate(10);
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
    public function store(DeliverymanStoreRequest $request)
    {
        $deliveryman = DeliveryMan::create($request->all());
        return redirect()->route('deliveryman.edit', ['deliveryman' => $deliveryman])
                         ->with(['message' => 'Estafeta criado com sucesso!', 'alert' => 'alert-success']);
        
    }

    /**
     * Store a newly (from home) resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDelManFromHome(DeliverymanStoreFromHomeRequest $request)
    {
        $deliveryman = DeliveryMan::create($request->resource);
        return response()->json(['resource' => $deliveryman], 201); 
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
        return back()->with(['message' => 'Estafeta editado com sucesso!', 'alert' => 'alert-success']);
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
