<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class CategoryController extends Controller
{
   
        public function index(): View
    {
        $results = DB::table('category_map')
            ->select(
                DB::raw('categories.name as categories_name'),
                DB::raw('category_map.item_type'),
                DB::raw("COALESCE(albums.title, paintings.name, comicbooks.title, tabletalks.title) as item_id")
            )
            ->join('categories', 'category_map.categories_id', '=', 'categories.id')
            ->leftJoin('albums', 'category_map.item_id', '=', 'albums.id')
            ->leftJoin('paintings', 'category_map.item_id', '=', 'paintings.id') // assuming 'p' is projects table
            ->leftJoin('comicbooks', 'category_map.item_id', '=', 'comicbooks.id') // assuming 'cb' is content_blocks table
            ->leftJoin('tabletalks', 'category_map.item_id', '=', 'tabletalks.id') // assuming 'm' is media table
            ->select(
                    'categories.name as categories_name',
                    'category_map.item_type',
                    DB::raw("
                        CASE 
                            WHEN category_map.item_type = 'albums' THEN albums.title
                            WHEN category_map.item_type = 'paintings' THEN paintings.name
                            WHEN category_map.item_type = 'comicbooks' THEN comicbooks.title
                            WHEN category_map.item_type = 'tabletalks' THEN tabletalks.title
                        END as item_type
                    ")
                )
            
            ->get();

        return view('categories.index', ['items' => $results]);
    }
}