<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Painting extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'name',
        'sku',
        'size',
        'month',
        'year',
        'price',
        'image_path',
        'framed',
    ];

     public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,         // The target model
            'paintings_categories',      // The name of the junction/pivot table
            'paintings_id',              // The foreign key on the pivot table pointing to this model
            'category_id'            // The foreign key on the pivot table pointing to the target model
        );
    }
}
