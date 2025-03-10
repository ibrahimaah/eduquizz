<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonQuizController extends Controller
{
    // public function result(Request $request)
    // {  
    //     dd($request->all());
    //     $score = $request->score;
    //     $next_lesson = $request->next_lesson;
    //     $lesson = $request->lesson;
    //     $is_succeed = $request->is_succeed;
    //     return view('site.quiz.result', compact(['lesson','score','next_lesson','is_succeed']));
    // }

    public function quiz(Lesson $lesson)
    {
        $questions = Question::where('lesson_id', $lesson->id)->with('options')->orderBy('question_number')->get();
        
        return view('site.quiz.index', compact('lesson', 'questions'));
    }

    public function submit(Request $request, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $questions = $lesson->questions;

        if($questions->count() == 0)
        {
            dd("لم يتم إضافة أسئلة لهذا الدرس من قبل الأدمن");
        }
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

        $is_succeed = false;

        if($score > 80)
        {
            $is_succeed = true;
            
            $lastLessonId = Lesson::where('level_id', $lesson->level->id)->max('id');

            //check if it is last lesson in current level
            $isLastLesson = $lesson->id == $lastLessonId;

            if ($isLastLesson) 
            {
                $current_level = $lesson->level;

                $lastLevelId = Level::max('id');

                //check if it is last level 
                $isLastLevel = $current_level->id == $lastLevelId;

                if (!$isLastLevel) 
                {
                    $next_level = Level::where('id', '>', $current_level->id)->orderBy('id')->first();

                    if($next_level->lessons()->exists())
                    {
                        
                        $next_lesson = $next_level->lessons()->orderBy('id')->first();

                        if ($next_lesson) 
                        {
                            Auth::user()->lessons()->attach($next_lesson->id);
                        }
                        else 
                        {
                            $next_lesson = $lesson;
                        }
                    }
                    
                }
                else 
                {
                    $next_lesson = null;
                }
                
            }
            else
            {
                $next_lesson = Lesson::where('id', '>', $lessonId)->orderBy('id')->first();
                // dd($next_lesson);
                if ($next_lesson) 
                {
                    Auth::user()->lessons()->attach($next_lesson->id);
                    
                }
                else 
                {
                    $next_lesson = $lesson;
                }
            }
            
        }
        else 
        {
            $next_lesson = $lesson;
        }

      
        // dd($next_lesson);
        return view('site.quiz.result', ['lesson' => $lessonId, 
                                                 'score' => $score,
                                                 'next_lesson' => $is_succeed ? $next_lesson : null,
                                                 'is_succeed'=> $is_succeed]);

        // return redirect()->route('quiz.result', ['lesson' => $lessonId, 
        //                                          'score' => $score,
        //                                          'next_lesson' => $is_succeed ? $next_lesson : null,
        //                                          'is_succeed'=> $is_succeed]);
    }

}
