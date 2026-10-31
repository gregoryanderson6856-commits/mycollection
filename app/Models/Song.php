<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $song_id
 * @property int|null $album_id
 * @property string $title
 * @property string|null $songwriter
 * @property string|null $duration
 * @property int $side
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Album|null $albums
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereSongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereSongwriter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Song extends Model
{
    protected $fillable = [
        'album_id',
        'title',
        'songwriter',
        'duration',
        'side',
    ];

    public function albums(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
