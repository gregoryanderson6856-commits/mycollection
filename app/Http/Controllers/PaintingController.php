<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Painting::latest()->paginate(10);

        return view('paintings.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paintings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:250',
                'sku' => 'required|string|max:250|unique:paintings',
                'size' => 'required|string|max:250',
                'month' => 'required|string|max:250',
                'year' => 'required|string|max:250',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'framed' => 'string|max:20']);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/paintings'), $imageName);
        Painting::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'size' => $request->size,
            'month' => $request->month,
            'year' => $request->year,
            'image_path' => 'images/paintings/'.$imageName,
            'framed' => $request->framed]);

         return redirect()->route('paintings.index')
            ->withSuccess('New painting is added successfully.');
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

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'name' => 'string|max:250',
            'size' => 'string|max:250',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Save the image path to the database
        Painting::create([
            'name' => $request->name,
            'size' => $request->size,
            'image_path' => 'images/'.$imageName]);

        return back()->with('success', 'Image uploaded successfully.');
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
