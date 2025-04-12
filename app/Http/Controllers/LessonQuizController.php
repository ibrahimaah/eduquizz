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
         /** @var User $user */
         $user = Auth::user();
         $user_current_lesson = $user->lessons()->latest('lesson_user.created_at')->first();

        if ($lesson->level->id > $user_current_lesson->level->id) 
        {
            abort(403, "عزيزي الطالب، عذرًا، لا يحق لك الوصول إلى هذا المستوى.");
        }

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

        $successMessages = [
            "أحسنت! استمر في هذا التفوق!",
            "رائع! اجتهادك يؤتي ثماره!",
            "مبروك! لقد اجتزت هذا الاختبار بنجاح!",
            "عمل رائع! واصل تقدمك!"
        ];
        
        $failureMessages = [
            "لا بأس! المحاولة هي بداية النجاح.",
            "تعلم من الأخطاء، وستكون أقوى في المرة القادمة!",
            "الفشل مجرد خطوة في طريق النجاح، لا تستسلم!",
            "حاول مرة أخرى، فأنت قادر على تحقيق النجاح!"
        ];
        
        $progress = 0;
        $subject = $lesson->level->subject;
        $num_of_lessons = $subject->getNumOfLessons();
        /** @var \App\Models\User $current_user */
        $current_user = Auth::user();
        $num_of_passed_lessons = getNumOfPassedLessons($current_user->id);
        if($num_of_lessons == 0)
        {
            $progress = 0;
        }
        else 
        {
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $progress = ($num_of_passed_lessons / $num_of_lessons) * 100;
            $progress = number_format($progress, 2);
        }
        // dd($next_lesson);
        return view('site.quiz.result', ['lesson' => $lesson, 
                                                 'score' => $score,
                                                 'next_lesson' => $is_succeed ? $next_lesson : null,
                                                 'is_succeed'=> $is_succeed,
                                                'successMessages' => $successMessages,
                                                'failureMessages' => $failureMessages,
                                            'progress' => $progress]);

        // return redirect()->route('quiz.result', ['lesson' => $lessonId, 
        //                                          'score' => $score,
        //                                          'next_lesson' => $is_succeed ? $next_lesson : null,
        //                                          'is_succeed'=> $is_succeed]);
    }

}
