<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Models\Attraction;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::all();
        return response()->json($attractions);
    }

    public function show(Attraction $attraction)
    {
        return response()->json($attraction);
    }
}
