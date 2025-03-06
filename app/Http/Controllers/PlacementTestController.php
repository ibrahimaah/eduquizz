<?php

namespace App\Http\Controllers;

use App\Models\PlacementTestQuestion;
use Illuminate\Http\Request; 
use App\Models\PlacementTestOption; 

class PlacementTestController extends Controller
{
    // Load questions from the public folder

    // $jsonPath = public_path('questions.json');
    // $questions = json_decode(file_get_contents($jsonPath), true);

    public function index()
    {
        $questions = PlacementTestQuestion::all();
        // dd($questions);
        return view('site.placement_test.index', compact('questions'));
    }

    public function init() {}

    public function submitTest(Request $request)
    {
        $userAnswers = $request->all(); // Get all submitted answers
        
        $results = [];
        $score = 0;
        // $totalQuestions = PlacementTestQuestion::count();

        foreach ($userAnswers as $key => $selectedOptionId) {
            if (str_starts_with($key, 'question_')) {
                $questionId = str_replace('question_', '', $key);
                $question = PlacementTestQuestion::find($questionId);

                if ($question) 
                {
                    $correctOption = $question->options()->where('is_correct', true)->first();
                    $isCorrect = $correctOption && $correctOption->id == $selectedOptionId;

                    if ($isCorrect) 
                    {
                        if ($question->level == 'easy') {
                            $score += 1;
                        } elseif ($question->level == 'medium') {
                            $score += 2;
                        } elseif ($question->level == 'hard') {
                            $score += 3;
                        }
                     
                    }

                    $results[] = [
                        'question' => $question->question,
                        'selected_option' => PlacementTestOption::find($selectedOptionId)?->option ?? 'No answer',
                        'correct_option' => $correctOption->option ?? 'No correct answer',
                        'is_correct' => $isCorrect,
                    ];
                }
            }
        }

        // $percentage = round(($score / $totalQuestions) * 100, 2);
 
        // Calculate the user level based on the score
        $student_level = "Beginner";
        
        if ($score >= 0 && $score <= 8) 
        {
            $student_level = 'Beginner';
        } 
        elseif ($score >= 9 && $score <= 16) 
        {
            $student_level = 'Intermediate';
        } 
        else 
        {
            $student_level = 'Advanced';
        }  
 

        // return view('site.placement_test.feedback', compact('results', 'score', 'totalQuestions', 'percentage'));
        return view('site.placement_test.feedback', compact('results', 'score','student_level'));
    }
}
