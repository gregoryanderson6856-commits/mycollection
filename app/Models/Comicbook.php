<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;

class Comicbook extends Model
{
    /** @use HasFactory*/
    use HasFactory;
    use AsPivot;

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

