<?php

namespace App\Traits;

use App\Models\Album;
use App\Models\Musician;
use Illuminate\View\View;

trait MyTrait
{
    public function show(Album $album): View
    {

        $albums = Album::with(['bands', 'songs'])->get();

        $artists = Musician::join('album_artists', 'album_artists.musician_id', '=', 'musicians.id')
            ->select(
                'musicians.name',
                'album_artists.musician_id',
                'album_artists.album_id',
            )

            ->get();

        $musicians = Musician::join('band_members', 'band_members.musician_id', '=', 'musicians.id')
            ->select(
                'musicians.name',
                'band_members.musician_id',
                'band_members.band_id',
            )
            ->get();

        $duration = Album::join('album_time', 'album_time.album_id', '=', 'albums.id')
            ->select(

                'albums.id',
                'album_time.album_id',
                'album_time.run_time',

            )
            ->get();

        return view('music.show', compact('album', 'albums', 'duration', 'musicians', 'artists'));
    }
}
