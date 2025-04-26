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

    public function about()
    {  
        return view('about');
    }

    public function contact()
    {  
        return view('contact');
    }
}
