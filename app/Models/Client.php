<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'mobile_phone_number',
        'active',
    ];
    
    /**
     * Get the user that owns the Client profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
