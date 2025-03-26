<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Subject extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;


    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function getNumOfLessons()
    {
        $num_of_lessons = 0;
        $levels = $this->levels;
        foreach($levels as $level)
        {
            $num_of_lessons+=$level->lessons()->count();
        }
        return $num_of_lessons;
    }

}
