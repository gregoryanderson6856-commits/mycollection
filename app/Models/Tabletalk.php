<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @property int $id
 * @property string $title
 * @property numeric $price
 * @property string $month
 * @property string $year
 * @property string $imagePath
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereYear($value)
 * @mixin \Eloquent
 */
class Tabletalk extends Model
{
    

     protected $fillable = [
        'title',
        'price',
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
