<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Chapter extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = ['subject_id', 'title', 'description','order','video_url'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
