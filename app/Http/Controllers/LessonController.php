<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonStoreRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lessons = Lesson::all();

        return view('lesson.index', compact('lessons'));
    }

    /**
     * @param \App\Http\Requests\LessonStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonStoreRequest $request)
    {
        $lesson = Lesson::create($request->validated());

        $request->session()->flash('lesson.title', $lesson->title);

        return redirect()->route('lesson.index');
    }
}
