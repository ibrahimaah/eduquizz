<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function index(Subject $subject) 
    { 
        /** @var User $user */
        $user = Auth::user();
        //if user does not have any lesson tracking , so redirect him to the placement test
        if (!$user->lessons()->exists()) 
        {
            return redirect()->route('placement_test');
        }
        else 
        {
            $levels = $subject->levels()->orderBy('order')->get();
            //The last lesson that current user has
            $user_current_lesson = $user->lessons()->latest('lesson_user.created_at')->first();
            
            return view('site.levels', compact('subject', 'levels', 'user_current_lesson'));
        }

    }
}
