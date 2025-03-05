<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PlacementTestSeeder extends Seeder
{
    public function run()
    {
        // Get the path of the JSON file in the public folder
        $json = File::get(public_path('questions.json'));

        // Decode JSON into an array
        $questions = json_decode($json, true);

        // Map the levels from the JSON to the enum values
        $levelMapping = [
            'الأساسيات' => 'easy',
            'متوسط' => 'medium',
            'متقدم' => 'hard',
        ];

        // Insert data into the placement_test_questions table
        foreach ($questions['levels'] as $level) {
            foreach ($level['questions'] as $question) {
                $questionRecord = DB::table('placement_test_questions')->insertGetId([
                    'question' => $question['question'],
                    'level' => $levelMapping[$level['name']],  // Map the level value
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Insert the options for each question
                foreach ($question['options'] as $option) {
                    DB::table('placement_test_options')->insert([
                        'question_id' => $questionRecord,
                        'option' => $option,
                        'is_correct' => $option === $question['answer'], // Mark as correct if it matches the answer
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}


