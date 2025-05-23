<?php

use App\Models\Lesson;
use App\Models\User;

if (!function_exists('getArabicOrdinal')) {
    function getArabicOrdinal($number) {
        $ordinals = [
            1 => 'الأول', 2 => 'الثاني', 3 => 'الثالث', 4 => 'الرابع',
            5 => 'الخامس', 6 => 'السادس', 7 => 'السابع', 8 => 'الثامن',
            9 => 'التاسع', 10 => 'العاشر', 11 => 'الحادي عشر',
            12 => 'الثاني عشر', 13 => 'الثالث عشر', 14 => 'الرابع عشر',
            15 => 'الخامس عشر', 16 => 'السادس عشر', 17 => 'السابع عشر',
            18 => 'الثامن عشر', 19 => 'التاسع عشر', 20 => 'العشرون'
        ];
    
        return $ordinals[$number] ?? $number;
    }
}

if(!function_exists('getNumOfPassedLessons'))
{
    function getNumOfPassedLessons($user_id)
    { 
        $user = User::findOrFail($user_id);

        $current_user_lesson = $user->lessons()->orderBy('created_at', 'DESC')->first();

        if($current_user_lesson)
        {
            $current_user_lesson_id = $current_user_lesson->id;
            $num_of_passed_lessons = Lesson::where('id', '<=', $current_user_lesson_id)->count();
        }
        else 
        {
            $num_of_passed_lessons = 0;
        }
        
        return $num_of_passed_lessons;
    }
}
