<?php

namespace App\Http\Controllers;

use App\Models\Tabletalk;
use Illuminate\Http\Request;

class TabletalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tabletalks = Tabletalk::paginate(12);

        return view('tabletalks.index', compact('tabletalks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tabletalk $tabletalk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tabletalk $tabletalk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tabletalk $tabletalk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tabletalk $tabletalk)
    {
        //
    }
}
