<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;

class Tabletalk extends Model
{
    use AsPivot;

     protected $fillable = [
        'title',
        'coverprice',
        'month',
        'year',
        'imagePath',
        
    ];

     public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,         // The target model
            'tabletalks_categories',      // The name of the junction/pivot table
            'tabletalks_id',              // The foreign key on the pivot table pointing to this model
            'category_id'            // The foreign key on the pivot table pointing to the target model
        );
    }
}
