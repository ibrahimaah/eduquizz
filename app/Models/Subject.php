<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Subject extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    // public function chapters()
    // {
    //     return $this->hasMany(Chapter::class);
    // }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }


}
