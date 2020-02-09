<?php

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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/courses/{course}', "CourseController@index")->name('course.index');
// Route::get('/courses/{course}/lessons/{lesson}', "CourseController@index")->name('lesson.index');
// Route::get('/courses/{course}', "CourseController@index")->name('course.index');


// admin routes
Route::resource('/admin/students', 'StudentController', ['only' => [
    'index',
    'edit',
    'update',
    'destroy'
]])->middleware('is_admin');

Route::resource('/admin/courses', 'CourseController', ['only' => [
    'index', 
    'create', 
    'show', 
    'edit',
    'update',
    'destroy'
]])->middleware('is_admin');

Route::resource('/admin/lessons', 'LessonController', ['only' => [
    'create', 
    'edit',
    'update',
    'destroy'
]])->middleware('is_admin');
