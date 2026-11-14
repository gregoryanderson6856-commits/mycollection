<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

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

        protected static function booted(): void
    {
        // Runs automatically after a song is created OR updated
        static::saved(function (Song $song) {
            self::recalculateAlbumTime($song->album_id);

            // If the song was moved to a different album, update the old album too
            if ($song->wasChanged('album_id') && $song->getOriginal('album_id')) {
                self::recalculateAlbumTime($song->getOriginal('album_id'));
            }
        });

        // Runs automatically after a song is deleted
        static::deleted(function (Song $song) {
            self::recalculateAlbumTime($song->album_id);
        });
    }

    protected static function recalculateAlbumTime(?int $albumId): void
    {
        if (! $albumId) {
            return;
        }

        $totalSeconds = self::where('album_id', $albumId)
            ->sum(DB::raw('TIME_TO_SEC(duration)'));

        DB::table('album_time')->updateOrInsert(
            ['album_id' => $albumId],
            ['run_time' => gmdate('H:i:s', (int) $totalSeconds)]
        );
    }
}
