<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Correct validation rule for image field
        ]);

        $subject = new Subject();
        $subject->title = $validatedData['title']; 
        $subject->description = $validatedData['description'] ?? null;
        $subject->save();

        if ($request->hasFile('img')) {
            $subject->addMediaFromRequest('img')->toMediaCollection('subjects');
        }

        return redirect()->route('admin.subjects')->with('success', 'تمت إضافة المادة بنجاح!');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', 
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Correct validation rule for image field
        ]);

        $subject = Subject::findOrFail($id);
        $subject->title = $validatedData['title']; 
        $subject->description = $validatedData['description'] ?? null;
        $subject->save();

        if ($request->hasFile('img')) {
            $subject->clearMediaCollection('subjects'); // Remove old img
            $subject->addMediaFromRequest('img')->toMediaCollection('subjects');
        }

        return redirect()->route('admin.subjects.edit', $subject->id)->with('success', 'تم تعديل بيانات المادة بنجاح!');
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->clearMediaCollection('subjects'); // Remove img
        $subject->delete();

        return redirect()->route('admin.subjects')->with('success', 'تم حذف المادة بنجاح!');
    }
}
