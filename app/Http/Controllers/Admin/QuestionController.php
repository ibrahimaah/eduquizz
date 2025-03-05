<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Lesson $lesson)
    {
        $questions = $lesson->questions;
        return view('admin.questions.index', compact('lesson', 'questions'));
    }
    public function create(Lesson $lesson)
    {
        $question_number = Question::where('lesson_id', $lesson->id)->max('question_number') ?? 0;
        $question_number += 1;
        return view('admin.questions.create', ['lesson' => $lesson, 'question_number' => $question_number]);
    }

    public function store(Request $request, Lesson $lesson)
    {
        // dd($request->all());
        // Validation rules
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:multiple_choice,true_false', // Ensuring the question type is one of the two
            'question_number' => 'required|integer|min:1|unique:questions,question_number,NULL,id,lesson_id,' . $lesson->id, // Unique question_number per lesson
            'options' => 'required_if:type,multiple_choice|array', // Required if the question type is multiple choice
            'options.*' => 'required_if:type,multiple_choice|max:255', // Each option must be a string
            'correct_answer' => 'required_if:type,true_false|in:0,1', // Valid for true/false question types
            'is_correct' => 'required_if:type,multiple_choice|integer|in:0,1,2,3', // Ensuring is_correct is provided for multiple choice
        ]);
        
        DB::beginTransaction();
        // Create the question with validated data
        $question = Question::create([
            'lesson_id' => $lesson->id,
            'question_number' => $validated['question_number'], // Dynamically set the question number
            'question' => $validated['question'],
            'type' => $validated['type'],
            'correct_answer' => $validated['correct_answer'] ?? null, // Set the correct_answer if available
        ]);

        // Store options for multiple choice questions if applicable
        if ($validated['type'] === 'multiple_choice') {
            foreach ($validated['options'] as $index => $option) {
                $question->options()->create([
                    'option_text' => $option,
                    'is_correct' => ($validated['is_correct'] == $index) ? true : false, // Mark the correct option
                ]);
            }
        }
        DB::commit();

        return redirect()->route('admin.questions', $lesson->id)->with('success', 'تم إضافة السؤال بنجاح');
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', [
            'question' => $question
        ]);
    }

    public function update(Request $request, Question $question)
    {
        // Validation rules
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:multiple_choice,true_false', // Ensuring the question type is one of the two
            'question_number' => 'required|integer|min:1|unique:questions,question_number,' . $question->id . ',id,lesson_id,' . $question->lesson->id, // Unique question_number per lesson
            'options' => 'required_if:type,multiple_choice|array', // Required if the question type is multiple choice
            'options.*' => 'required_if:type,multiple_choice|max:255', // Each option must be a string
            'correct_answer' => 'required_if:type,true_false|in:0,1', // Valid for true/false question types
            'is_correct' => 'required_if:type,multiple_choice|integer|in:0,1,2,3', // Ensuring is_correct is provided for multiple choice
        ]);

        DB::beginTransaction();


        // Update the question
        $updateData = [
            'question' => $validated['question'],
            'type' => $validated['type'],
        ];

        if ($validated['type'] === 'multiple_choice') 
        {
            // Delete existing options before updating (if any)
            $question->options()->exists() && $question->options()->delete();

            // Update multiple-choice options
            foreach ($validated['options'] as $index => $option) 
            {
                $question->options()->create([
                    'option_text' => $option,
                    'is_correct' => $validated['is_correct'] == $index, // Mark the correct option
                ]);
            }
        } 
        else 
        {
            $question->options()->exists() && $question->options()->delete();
            $updateData['correct_answer'] = $validated['correct_answer'];
        }

        // Apply the update
        $question->update($updateData);


        DB::commit();

        return redirect()->route('admin.questions', $question->lesson->id)->with('success', 'تم تحديث السؤال بنجاح');
    }

    public function delete(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions', $question->lesson->id)->with('success', 'تم حذف السؤال بنجاح');
    }
}
