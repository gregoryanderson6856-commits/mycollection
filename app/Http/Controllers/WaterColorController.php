<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use Illuminate\View\View;   

class WaterColorController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $watercolors = Painting::latest()->paginate(12);

        return view('watercolor.index', compact('watercolors'));
    }
}
