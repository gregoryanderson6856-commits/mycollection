<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $band_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Album> $albums
 * @property-read int|null $albums_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Musician> $musicians
 * @property-read int|null $musicians_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Band extends Model
{
    protected $fillable = [
        'name',

    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function musicians()
    {
        return $this->hasMany(Musician::class);
    }
}
