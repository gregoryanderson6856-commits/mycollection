<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;

/**
 * @property int $id
 * @property string|null $sku
 * @property string $title
 * @property string $story
 * @property numeric $price
 * @property string $month
 * @property string $year
 * @property string $version
 * @property string $imagePath
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereStory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereYear($value)
 * @mixin \Eloquent
 */
class Comicbook extends Model
{
    /** @use HasFactory*/
    use HasFactory;
  

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'story',
        'price',
        'month',
        'year',
        'version',
        'imagePath',
    ];

     public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,         // The target model
            'comicbooks_categories',      // The name of the junction/pivot table
            'comicbooks_id',              // The foreign key on the pivot table pointing to this model
            'category_id'            // The foreign key on the pivot table pointing to the target model
        );
    }
}

