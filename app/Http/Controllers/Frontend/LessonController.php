<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LessonService;
use App\Models\Lesson;
use Session;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->middleware('auth');
        $this->lessonService = $lessonService;
    }


    public function index()
    {
        if(!empty(request('InvId'))) {
            Session::flash('success', 'Спасибо за оплату. Подготовительные экзамены к IELTS Speaking добавлены в Ваш аккаунт!');
        }
        return view('frontend.lessons');
    }


    public function show(Lesson $lesson)
    {
        $this->authorize('view', $lesson);

        return view('frontend.lesson', compact('lesson'));
    }


    public function update(Lesson $lesson)
    {
        $this->authorize('view', $lesson);
        $lesson->update(request(['completed', 'voice']));

        if($lesson->completed) {
            $msg = "Exam has been completed. We saved your recordings, so now you can send it for evaluation.";
        } else {
            $msg = "Your recording has been deleted. Now you can take the Speaking Exam again.";
        }

        return redirect('/lessons')->with('success', $msg);
    }
}