<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;
    
    protected $table = 'delivery_man';
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
       'approved_at',
       'active'
    ];


}
