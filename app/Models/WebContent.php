<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class WebContent extends Model implements TranslatableContract
{
    use Translatable; 
    
    public    $translatedAttributes = ['title', 'content', 'active'];
    protected $fillable             = ['content_area'];
    protected $table                = 'webcontents';
}