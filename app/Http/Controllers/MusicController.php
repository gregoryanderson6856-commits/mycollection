<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Traits\MyTrait;

class MusicController extends Controller
{
    use MyTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::paginate(12);

        return view('music.index', compact('albums'));
    }

}
