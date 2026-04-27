<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Http\Resources\AttractionResource;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        // Get all attractions with their categories
        $attractions = Attraction::with('category')->get();
        
        return AttractionResource::collection($attractions)->additional([
            'message' => 'Attractions retrieved successfully'
        ]);
    }

    //when api/attractions/${id} is call return the attraction with 
    public function show(Attraction $attraction)
    {
        return (new AttractionResource($attraction))->additional([
            'message' => 'Attraction retrieved successfully'
        ]);
    }
}
