<?php

namespace App\Http\Controllers;

use App\Models\PlacementTestQuestion;
use Illuminate\Http\Request;
use App\Models\PlacementTestOption;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class PlacementTestController extends Controller
{
    // Load questions from the public folder

    // $jsonPath = public_path('questions.json');
    // $questions = json_decode(file_get_contents($jsonPath), true);

    private function redirect_if_already_pass()
    {
        //check if already pass the placement test
        /** @var User  $user */
        $user = Auth::user();

        if ($user->lessons()->exists()) 
        {
            return redirect()->route('home');
        }
        return null; // Allow further execution
    }
    public function index()
    {
        if ($redirect = $this->redirect_if_already_pass()) {
            return $redirect;
        }

        $questions = PlacementTestQuestion::all()->shuffle();

        // dd($questions);
        return view('site.placement_test.index', compact('questions'));
    }

    // public function init() {}

    public function submitTest(Request $request)
    {
        if ($redirect = $this->redirect_if_already_pass()) {
            return $redirect;
        }

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
        $student_level = "مبتدئ";

        if ($score >= 0 && $score <= 8) {
            $student_level = 'مبتدئ';
            Auth::user()->lessons()->attach(Subject::find(1)->levels[0]->lessons[0]->id);
        } elseif ($score >= 9 && $score <= 16) {
            $student_level = 'متوسط';
            Auth::user()->lessons()->attach(Subject::find(1)->levels[2]->lessons[0]->id);
        } else {
            $student_level = 'متقدم';
            Auth::user()->lessons()->attach(Subject::find(1)->levels[4]->lessons[0]->id);
        }


        // return view('site.placement_test.feedback', compact('results', 'score', 'totalQuestions', 'percentage'));
        return view('site.placement_test.feedback', compact('results', 'score', 'student_level'));
    }
}
