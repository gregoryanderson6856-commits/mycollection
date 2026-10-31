<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @property int $id
 * @property string|null $name
 * @property string $sku
 * @property string|null $size
 * @property string $month
 * @property string $year
 * @property numeric $price
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $framed
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Database\Factories\PaintingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereFramed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereYear($value)
 * @mixin \Eloquent
 */
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
