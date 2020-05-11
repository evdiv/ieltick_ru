<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $guarded = [];


    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }
}
