<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','CourseController@index');

Route::resource('lecture', 'LectureController')->only('index', 'store');

Route::resource('lesson', 'LessonController')->only('index', 'store');

Route::resource('course', 'CourseController')->only('index', 'store');



