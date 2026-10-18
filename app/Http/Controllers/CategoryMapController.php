<?php

namespace App\Http\Controllers;

use App\Models\CategoryMap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryMapController extends Controller
{
    /**
     * Display a listing of categories with their nested media relationships.
     */
    public function index(): JsonResponse
    {
        // Eager load all polymorphic targets via the channels
        $categories = CategoryMap::with(['albums', 'paintings', 'comicbooks', 'tabletalks'])->get();
    
        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    /**
     * Store a newly created category in the master table.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
          
        ]);

        $category = CategoryMap::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data' => $category
        ], 201);
    }

    /**
     * Display a single specified category with its dynamic items.
     */
    public function show($id): JsonResponse
    {
        $category = CategoryMap::with(['albums', 'paintings', 'comicbooks', 'magazines'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $category
        ], 200);
    }

    /**
     * Update an existing master category's attributes.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $category = CategoryMap::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $id . ',category_id',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category details updated successfully.',
            'data' => $category
        ], 200);
    }

    /**
     * Remove the specified category from the system.
     */
    public function destroy($id): JsonResponse
    {
        $category = CategoryMap::findOrFail($id);

        // Foreign keys automatically cascade and delete mappings inside 'category_maps'
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category and its catalog maps deleted successfully.'
        ], 200);
    }
}
