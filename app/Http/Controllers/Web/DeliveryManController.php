<?php

namespace App\Http\Controllers\Web;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use App\Http\Traits\AddressTrait;
use App\Http\Requests\DeliverymanStoreRequest;
use App\Http\Requests\DeliverymanStoreFromHomeRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\UserTrait;
use App\Mail\DeliverymanCreateAccount;
use Illuminate\Support\Facades\Mail;

class DeliveryManController extends Controller
{
    use AddressTrait, UserTrait;
    
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
        return view('backoffice-admin.deliveryman.deliveryman')->with('deliveryMen', $deliveryMen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice-admin.deliveryman.deliveryman-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliverymanStoreRequest $request)
    {
        # Create user
        $user = $this->createUser($request);

        # Get the user id and set value in array 
        $request['user_id'] = $user->id ?? null;

        $deliveryman = DeliveryMan::create($request->all());

        # Send email   
        Mail::to($user)->send(new DeliverymanCreateAccount($deliveryman));
        
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
        
        # Set variable for resource creation 
        $resource = $request->resource;

        # Create user
        $user = $this->createUserFromHome($resource);

        # Get the user id and set value in array 
        $resource['user_id'] = $user->id ?? null;

        # Create Deliveryman 
        $deliveryman = DeliveryMan::create($resource);

        # Send email   
        Mail::to($user)->send(new DeliverymanCreateAccount($deliveryman));
        
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
        return view('backoffice-admin.deliveryman.deliveryman-edit')->with('deliveryman', $deliveryman);
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
            $address = $this->getAddressRequest($request, $deliveryman->user->id); 
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
            $deliveryman->user->delete();
        }
        return redirect()->route('deliveryman.index');
    }
}
