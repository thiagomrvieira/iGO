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
       'active',
       'first_login'
    ];

    /**
     * Get the Address associated with the partner.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the user that owns the Partner profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Category that owns the Partner profile.
     */
    public function category()
    {
        return $this->belongsTo(PartnerCategory::class);
    }
}
