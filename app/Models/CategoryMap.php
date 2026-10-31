<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryMap query()
 * @mixin \Eloquent
 */
class CategoryMap extends Model
{
     protected $fillable = ['categories_id', 'item_id', 'item_type'];


      /**
     * Link back directly to the parent Category structure.
     */
    /*
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id');
    }
      

     // Resolves to whichever item model (Album, Painting, etc.) owns this row
    public function item(): MorphTo
    {
        return $this->morphTo();
    }
        */
}
