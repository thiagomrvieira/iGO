<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebContentTranslation extends Model
{
    use HasFactory;

    protected $fillable   = ['title', 'content', 'active'];
    public    $timestamps = false;
    protected $table      = 'webcontent_translations';

}
