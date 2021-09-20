<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'address_name',
        'user_id',
        'address_type_id',
        'line_1',
        'line_2',
        'county',
        'city',
        'post_code',
        'country'
    ];

    /**
     * Get the Address owner.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the address type.
     */
    public function type()
    {
        return $this->belongsTo(AddressType::class, 'address_type_id', 'id');
    }
}
