<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'size',
        'month',
        'year',
        'image_path',
        'framed',
    ];
}
