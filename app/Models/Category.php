<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    /*
    public function albums(): BelongsToMany { return $this->BelongsToMany(Album::class, 'item_id', 'item_type', 'categories_id'); }
    public function paintings(): BelongsToMany { return $this->BelongsToMany(Painting::class, 'item', 'category_maps', 'category_id'); }
    public function comicbooks(): BelongsToMany { return $this->BelongsToMany(Comicbook::class, 'item', 'category_maps', 'category_id'); }
    public function tabletalks(): BelongsToMany { return $this->BelongsToMany(Tabletalk::class, 'item', 'category_maps', 'category_id'); }
    */

     public function mappings(): HasMany
    {
        return $this->hasMany(CategoryMap::class);
    }
}