<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        // Get all attractions with their categories
        $attractions = Attraction::with('category')->get();
        
        return response()->json([
            'message' => 'Attractions retrieved successfully',
            'data' => $attractions,
        ], 200);
    }

    public function show(Attraction $attraction)
    {
        return response()->json([
            'message' => 'Attraction retrieved successfully',
            'data' => $attraction
        ], 200);
    }
}
