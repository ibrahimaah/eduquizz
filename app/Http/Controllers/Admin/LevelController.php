<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Subject;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::with('subject')->get();
        return view('admin.levels.index', compact('levels'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.levels.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'order' => 'required|integer|min:1',
        ]);

        Level::create($request->all());
        return redirect()->route('admin.levels')->with('success', 'تمت إضافة المستوى بنجاح');
    }

    public function edit(Level $level)
    {
        $subjects = Subject::all();
        return view('admin.levels.edit', compact('level', 'subjects'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'order' => 'required|integer|min:1',
        ]);

        $level->update($request->all());
        return redirect()->route('admin.levels')->with('success', 'تم تعديل المستوى بنجاح');
    }

    public function delete(Level $level)
    {
        $level->delete();
        return redirect()->route('admin.levels')->with('success', 'تم حذف المستوى بنجاح');
    }
}
