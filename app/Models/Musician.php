<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $fillable = [
        'name',
    ];

    public function bands()
    {
        return $this->belongsTo(Band::class);
    }
}
