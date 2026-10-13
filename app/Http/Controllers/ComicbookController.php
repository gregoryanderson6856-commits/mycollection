<?php

namespace App\Http\Controllers;


use App\Models\Comicbook;
use Illuminate\View\View;

class ComicbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $comics = Comicbook::latest()->paginate(12);

        return view('comicbooks.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('comicbooks.create');
    }

   

    /**
     * Display the specified resource.
     */
    public function show(Comicbook $comicbook): View
    {

        return view('comicbooks.show', compact('comicbook'));
    }

   

    
}

