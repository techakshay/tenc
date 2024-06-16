<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\CourseController;
use \App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
    Route::post('/update-status', [UserController::class, 'updateStatus'])->name('update.status');
    Route::post('/delete-user', [UserController::class, 'deleteUser'])->name('delete.user');
    Route::get('/user', [AuthController::class, 'user'])->name('user.details');
    Route::get('/get-course-details', [CourseController::class, 'getCourseDetails'])->name('course.details');
    Route::get('/change-course-status', [CourseController::class, 'changeStatus'])->name('course.status');
});
