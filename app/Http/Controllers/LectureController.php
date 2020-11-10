<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureStoreRequest;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lectures = Lecture::all();

        return view('lecture.index', compact('lectures'));
    }

    /**
     * @param \App\Http\Requests\LectureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectureStoreRequest $request)
    {
        $lecture = Lecture::create($request->validated());

        $request->session()->flash('lecture.title', $lecture->title);

        return redirect()->route('lecture.index');
    }
}
