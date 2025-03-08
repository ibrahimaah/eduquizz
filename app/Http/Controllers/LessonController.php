<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(Level $level) 
    { 
        /** @var User $user */
        $user = Auth::user();
        $user_current_lesson = $user->lessons()->latest('lesson_user.created_at')->first();

        if ($level->id > $user_current_lesson->level->id) 
        {
            abort(403, "عزيزي الطالب، عذرًا، لا يحق لك الوصول إلى الدروس في هذا المستوى.");
        }

        $lessons = $level->lessons()->orderBy('order')->get();
        
        return view('site.lessons', compact('lessons','level','user_current_lesson'));
    }
}
