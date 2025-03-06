<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(Subject $subject) 
    { 
        $levels = $subject->levels()->orderBy('order')->get();
        return view('site.levels', compact('subject', 'levels'));
    }
}
