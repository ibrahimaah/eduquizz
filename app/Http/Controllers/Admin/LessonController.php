<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Lesson;

class LessonController extends Controller
{
    // In LessonController.php

    public function index(Level $level)
    {
        // Fetch lessons associated with the specific level
        $lessons = $level->lessons; // Assuming you have a 'lessons' relationship defined on Level

        // Return the view with lessons and the level information
        return view('admin.subjects.levels.lessons.index', compact('lessons', 'level'));
    }


    public function create(Level $level)
    { 
        $lesson_order = Lesson::where('level_id',$level->id)->max('order') ?? 0;
        $lesson_order += 1; 

        return view('admin.subjects.levels.lessons.create', ['level' => $level,'lesson_order'=>$lesson_order]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tutorial_link' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id', 
            'order' => 'required|integer|min:1',
        ]);

        $lesson = Lesson::create($request->all());

        return redirect()->route('admin.lessons',['level'=>$lesson->level_id])->with('success', 'تمت إضافة الدرس بنجاح');
    }

    public function edit(Lesson $lesson)
    { 
        return view('admin.subjects.levels.lessons.edit', ['lesson' => $lesson]);
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tutorial_link' => 'required|string|max:255', 
        ]);

        $lesson->update($request->all());
        return redirect()->route('admin.lessons',['level'=>$lesson->level_id])->with('success', 'تم تعديل الدرس بنجاح');
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.lessons',['level'=>$lesson->level_id])->with('success', 'تم حذف الدرس بنجاح');
    }
}
