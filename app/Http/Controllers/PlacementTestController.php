<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlacementTestController extends Controller
{
    public function index()
    {
        // Load questions from the public folder
        $jsonPath = public_path('questions.json');
        $questions = json_decode(file_get_contents($jsonPath), true);

        return view('site.placement_test.index', compact('questions'));
    }

    public function init()  {
        
    }
}
