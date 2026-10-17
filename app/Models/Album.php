<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;


class Album extends Model
{
    use HasFactory;
    use AsPivot;

    protected $fillable = ['band_id', 'title', 'label', 'year', 'format', 'path'];

    public function bands(): BelongsTo
    {
        return $this->belongsTo(Band::class, 'band_id', 'band_id');
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

     public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            CategoryMap::class,         // The target model
            'album_categories',      // The name of the junction/pivot table
            'albums_id',              // The foreign key on the pivot table pointing to this model
            'category_id'            // The foreign key on the pivot table pointing to the target model
        );
    }

}
