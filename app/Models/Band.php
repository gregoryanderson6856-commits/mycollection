<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'name',

    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function musicians()
    {
        return $this->hasMany(Musician::class);
    }
}
