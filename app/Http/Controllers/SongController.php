<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Models\Song;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $songs = Song::latest()->paginate(10);

        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request): RedirectResponse
    {
        Song::create($request->validated());

        return redirect()->route('songs.index')
            ->withSuccess('New song is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
