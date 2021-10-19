<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;
    
    protected $table = 'deliverymen';
    protected $fillable = [
       'id',
       'user_id',
       'name',
       'email',
       'mobile_phone_number',
       'address_id',
       'birth_date',
       'nacionality',
       'identity_card_number',
       'tax_number',
       'social_insurance_number',
       'driving_license_name',
       'driving_license_number',
       'bank_account_name',
       'bank_account_number',
       'approved_at',
       'active'
    ];
    protected $primaryKey = 'id';



    /**
     * Get the address associated with the deliveryman.
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'user_id', 'user_id');
    }

    /**
     * Get the user that owns the DeliveryMan profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBirthDateAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value){  
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i:s');
    }

    public function getActiveAttribute($value){
        return (boolean) $value;
    }
}
