<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebContentTranslation extends Model
{
    use HasFactory;

    protected $fillable   = ['title', 'content', 'active'];
    public    $timestamps = false;
    protected $table      = 'webcontent_translations';

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
