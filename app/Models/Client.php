<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'birth_date',
        'mobile_phone_number',
        'active',
        'profile_image',
    ];
    
    /**
     * Get the user that owns the Client profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user's favorite partners.
     */
    public function favorites()
    {
        return $this->belongsToMany(Partner::class, 'client_partner', 'client_id', 'partner_id');
    }

    public function getBirthDateAttribute($value){
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $value == null ? 
            null : 
            $date->format('Y-m-d H:i:s');
    }

    public function getActiveAttribute($value){
        return (boolean) $value;
    }
            
    public function lastUsedAddress()
    {
        // return $this->user->addresses->pluck('id') ;

        return  AddressTax::whereIn( 
                    'address_id', $this->user->addresses->pluck('id') 
                )->orderBy('created_at', 'desc')->first();
    }

}
