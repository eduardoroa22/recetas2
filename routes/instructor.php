<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseCpntroller;

Route::redirect('', 'instructor/courses');
Route::resource('curses', CourseCpntroller::class)->names('courses');