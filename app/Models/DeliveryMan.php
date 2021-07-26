<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;
    
    protected $table = 'deliverymen';
    protected $fillable = [
       'id',
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
       'user_id',
       'approved_at',
       'active'
    ];
    protected $primaryKey = 'id';



    /**
     * Get the address associated with the deliveryman.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the user that owns the DeliveryMan profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
