<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    // List all chapters for a specific subject
    public function index($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        $chapters = Chapter::where('subject_id', $subject_id)->get();

        return view('admin.chapters.index', compact('subject', 'chapters'));
    }

    // Show create chapter form
    public function create($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        return view('admin.chapters.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url', // Validate video_url as a valid URL
        ]);

        // Dynamically assign the order
        $maxOrder = Chapter::where('subject_id', $validatedData['subject_id'])->max('order');
        $newOrder = $maxOrder + 1;

        $chapter = new Chapter();
        $chapter->subject_id = $validatedData['subject_id'];
        $chapter->title = $validatedData['title'];
        $chapter->description = $validatedData['description'] ?? null;
        $chapter->order = $newOrder;

        // Store the video URL if provided
        if ($request->has('video_url')) {
            $chapter->video_url = $validatedData['video_url'];
        }

        $chapter->save();

        return redirect()->route('admin.chapters', ['subject_id' => $chapter->subject_id])
            ->with('success', 'تمت إضافة الفصل بنجاح!');
    }

    public function show($id)
    {
        // Retrieve the chapter by ID, along with the subject and any other necessary details
        $chapter = Chapter::with('subject')->findOrFail($id);

        return view('admin.chapters.show', compact('chapter'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chapter = Chapter::findOrFail($id);
        return view('admin.chapters.edit', compact('chapter'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $chapter = Chapter::findOrFail($id);
        $chapter->title = $validatedData['title'];
        $chapter->description = $validatedData['description'] ?? null;
        $chapter->save();

        return redirect()->route('admin.chapters.edit', $chapter->id)->with('success', 'تم تعديل بيانات الفصل بنجاح!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();

        return redirect()->route('admin.chapters', ['subject_id' => $chapter->subject_id])
            ->with('success', 'تم حذف الفصل بنجاح!');
    }
}
