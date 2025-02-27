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
        return view('admin.levels.lessons.index', compact('lessons', 'level'));
    }


    public function create(Level $level)
    { 
        return view('admin.levels.lessons.create', compact('level'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
            'chapter' => 'required|in:chapter_1,chapter_2',
            'order' => 'required|integer|min:1',
        ]);

        $lesson = Lesson::create($request->all());

        return redirect()->route('admin.lessons',['level'=>$lesson->level_id])->with('success', 'تمت إضافة الدرس بنجاح');
    }

    public function edit(Level $level,Lesson $lesson)
    {
        $levels = Level::all();  // Get all levels for the dropdown
        return view('admin.levels.lessons.edit', compact('lesson', 'levels'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
            'chapter' => 'required|in:chapter_1,chapter_2',
            'order' => 'required|integer|min:1',
        ]);

        $lesson->update($request->all());
        return redirect()->route('admin.lessons')->with('success', 'تم تعديل الدرس بنجاح');
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.lessons',['level'=>$lesson->level_id])->with('success', 'تم حذف الدرس بنجاح');
    }
}
