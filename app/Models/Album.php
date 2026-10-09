<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;

    #[Fillable(['band_id', 'title', 'label', 'year', 'format', 'path'])]
    public function bands(): BelongsTo
    {
        return $this->belongsTo(Band::class, 'band_id', 'band_id');
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
