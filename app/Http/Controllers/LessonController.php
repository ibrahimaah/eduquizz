<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Level $level) 
    { 
        $lessons = $level->lessons()->orderBy('order')->get();
        return view('site.lessons', compact('lessons','level'));
    }
}
