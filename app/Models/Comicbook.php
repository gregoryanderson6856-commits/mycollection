<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comicbook extends Model
{
    /** @use HasFactory*/
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'story',
        'price',
        'month',
        'year',
        'version',
        'imagePath',
    ];
}

