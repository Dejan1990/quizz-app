<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('user', UserController::class);

    Route::get('/quiz/{id}/questions', [QuizController::class, 'question'])->name('quiz.question');

    Route::get('/exam/assign', [ExamController::class, 'create']);
    Route::post('/exam/assign', [ExamController::class, 'assignExam'])->name('exam.assign');
});


