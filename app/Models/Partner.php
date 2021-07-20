<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $fillable = [
       'id',
       'name',
       'email',
       'phone_number',
       'mobile_phone_number',
       'address_id',
       'company_name',
       'tax_number',
       'category_id',
       'user_id',
       'active'
    ];

    /**
     * Get the address associated with the partner.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
