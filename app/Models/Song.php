<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    protected $fillable = [
        'album_id',
        'title',
        'songwriter',
        'duration',
        'side',
    ];

    public function albums(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
