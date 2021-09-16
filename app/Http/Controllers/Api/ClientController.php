<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Favorite a partner
     *
     * @param  Partner $partner
     * @return Response
     */
    public function favoritePartner(Partner $partner)
    {
        Auth::user()->favorites()->attach($partner->id);

        return response()->json(['success' => 'Partner favoritado'], 200);
    }

    /**
     * Unfavorite a Partner
     *
     * @param  Partner $partner
     * @return Response
     */
    public function unFavoritePartner(Partner $partner)
    {
        Auth::user()->favorites()->detach($partner->id);

        return back();
    }
}
