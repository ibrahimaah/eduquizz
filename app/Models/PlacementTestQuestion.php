<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacementTestQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'level'];

    /**
     * Get the options for the question.
     */
    public function options()
    {
        return $this->hasMany(PlacementTestOption::class, 'question_id');
    }
    
}
