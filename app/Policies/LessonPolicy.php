<?php

namespace App\Policies;

use App\Models\Access\User\User;
use App\Models\Lesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Lesson $lesson)
    {
        return $user->id == $lesson->user_id;
    }

}
