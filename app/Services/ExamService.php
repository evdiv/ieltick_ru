<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ExamService
{

    public function getAvailable($user_id = null) 
    {
    	$user_id = isset($user_id) ? $user_id : auth()->id();
    	
        $exams = DB::select('SELECT id FROM Exams 
                                WHERE id > 1 
                                AND id NOT IN( SELECT exam_id FROM Lessons 
                                                    WHERE user_id = :user_id)', ['user_id' => $user_id]);
        return $exams;
    }

}