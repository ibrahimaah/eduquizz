<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Subject;

class LevelController extends Controller
{
    public function index($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        $subject_levels = $subject->levels;
        return view('admin.subjects.levels.index', ['levels' => $subject_levels,
                                                    'subject' => $subject]);
    }

    public function create($subject_id)
    {    
        $subject = Subject::findOrFail($subject_id); 

        $level_order = Level::where('subject_id',$subject_id)->max('order') ?? 0;
        $level_order += 1; 

        return view('admin.subjects.levels.create', ['subject' => $subject,'level_order' => $level_order]);
    }

    public function store(Request $request,$lesson_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'order' => 'required|integer|min:1',
        ]);

        Level::create($request->all());
        return redirect()->route('admin.levels',['subject_id' => $request->subject_id])->with('success', 'تمت إضافة المستوى بنجاح');
    }

    public function edit(Level $level)
    { 
        return view('admin.subjects.levels.edit', ['level' => $level]);
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $level->update($request->all());
        return redirect()->route('admin.levels',['subject_id' => $level->subject_id])->with('success', 'تم تعديل المستوى بنجاح');
    }

    public function delete(Level $level)
    {
        $level->delete();
        return redirect()->route('admin.levels',['subject_id' => $level->subject_id])->with('success', 'تم حذف المستوى بنجاح');
    }
}
