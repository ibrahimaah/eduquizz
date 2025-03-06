<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacementTestOption extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option', 'is_correct'];

    /**
     * Get the question that owns the option.
     */
    public function question()
    {
        return $this->belongsTo(PlacementTestQuestion::class, 'question_id');
    }
    
}
