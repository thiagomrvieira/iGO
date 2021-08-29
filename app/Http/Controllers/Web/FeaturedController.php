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
            'featured' => Featured::all(),
        ]);
    }
}
