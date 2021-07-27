<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchedulePartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'period',
        'open',
        'close',
        'partner_id',
    ];
}
