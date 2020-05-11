<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function phrases()
    {
        return $this->hasMany(Phrase::class)->select(['id', 'phrase', 'interval'])->where('active', 1);
    }

    public function nouns()
    {
        return $this->hasMany(Noun::class)->select(['id', 'noun', 'start', 'stop'])->where('active', 1);
    }

    public function verbs()
    {
        return $this->hasMany(Verb::class)->select(['id', 'verb', 'start', 'stop'])->where('active', 1);
    }

    public function adjectives()
    {
        return $this->hasMany(Adjective::class)->select(['id', 'adjective', 'start', 'stop'])->where('active', 1);
    }

    public function idioms()
    {
        return $this->hasMany(Idiom::class)->select(['id', 'idiom', 'start', 'stop'])->where('active', 1);
    }


}
