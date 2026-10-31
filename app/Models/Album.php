<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property int $id
 * @property int|null $band_id
 * @property string $title
 * @property string $label
 * @property string|null $year
 * @property numeric $price
 * @property string $format
 * @property string $path
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Band|null $bands
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Song> $songs
 * @property-read int|null $songs_count
 * @method static \Database\Factories\AlbumFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereYear($value)
 * @mixin \Eloquent
 */
class Album extends Model
{
    use HasFactory;
   

    protected $fillable = ['band_id', 'title', 'label', 'year', 'price', 'format', 'path'];

    public function bands(): BelongsTo
    {
        return $this->belongsTo(Band::class, 'band_id', 'band_id');
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

}
