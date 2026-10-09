<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Models\Album;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Traits\MyTrait;

class AlbumController extends Controller
{
    use MyTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        $pageTitle = 'Album Page';
        $albums = Album::latest()->paginate(10);

        return view('albums.index', ['user' => $user], compact('albums', 'pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request): RedirectResponse
    {
        Album::create($request->validated());

        return redirect()->route('albums.index')
            ->withSuccess('New album is added successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album): View
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Album $album): RedirectResponse
    {
        $album->update($request->validated());

        return redirect()->back()
            ->withSuccess('Album is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album): RedirectResponse
    {
        $album->delete();

        return redirect()->route('albums.index')
            ->withSuccess('Album is deleted successfully.');
    }
}
