<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    { 
        $subjects = Subject::all();
        return view('home',compact('subjects'));
    }
}
