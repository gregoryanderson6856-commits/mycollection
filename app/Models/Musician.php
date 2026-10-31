<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Band|null $bands
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Musician extends Model
{
    protected $fillable = [
        'name',
    ];

    public function bands()
    {
        return $this->belongsTo(Band::class);
    }
}
