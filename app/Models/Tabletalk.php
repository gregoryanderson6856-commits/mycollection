<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabletalk extends Model
{
     protected $fillable = [
        'title',
        'coverprice',
        'month',
        'year',
        'imagePath',
        
    ];
}
