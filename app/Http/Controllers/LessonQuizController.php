<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;

class LessonQuizController extends Controller
{
    public function result(Lesson $lesson,$score)
    {  
        return view('site.quiz.result', compact(['lesson','score']));
    }

    public function quiz(Lesson $lesson)
    {
        $questions = Question::where('lesson_id', $lesson->id)->with('options')->orderBy('question_number')->get();
        
        return view('site.quiz.index', compact('lesson', 'questions'));
    }

    public function submit(Request $request, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $questions = Question::where('lesson_id', $lessonId)->get();

        $correctAnswers = 0;
        $totalQuestions = $questions->count();

        foreach ($questions as $question) {
            $userAnswer = $request->input("answers.{$question->id}");
            
            if ($question->type == 'multiple_choice') {
                $correctOption = $question->options()->where('is_correct', true)->first();
                if ($correctOption && $correctOption->id == $userAnswer) {
                    $correctAnswers++;
                }
            } elseif ($question->type == 'true_false' && $userAnswer == $question->correct_answer) {
                $correctAnswers++;
            }
        }

        $score = round(($correctAnswers / $totalQuestions) * 100);

        return redirect()->route('quiz.result', ['lesson' => $lessonId, 'score' => $score]);
    }

}
