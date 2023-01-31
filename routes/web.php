<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\InstController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\ChatGroupController;
use App\Http\Controllers\inst\CourseController;
use App\Http\Controllers\inst\LectureController;
use App\Http\Controllers\inst\QuizzeController;
use App\Http\Controllers\inst\SectionController;
use App\Http\Controllers\inst\StudentController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\user\RequstInstController;
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
//user
Route::middleware('auth')->group(function () {
    Route::get('/user', function () {
        return view('welcome');
    })->name('user');
    Route::post('requstinst',[RequstInstController::class,'requstinst'])->name('requstinst');
});

//inst
Route::prefix('instructor')->middleware(['auth','inst'])->group(function () {
    Route::get('/', function () {
        return view('coach.index');
    })->name('instructor');
    Route::resource('Course',CourseController::class);
    Route::resource('section',SectionController::class);
    Route::post('section/updatesection',[SectionController::class,'updatee'])->name('updatesection');
    Route::post('section/deletesection',[SectionController::class,'deletee'])->name('deletesection');

    Route::post('coursee/lecture/store',[LectureController::class,'store'])->name('lecturestore');
    Route::post('coursee/lecture/delete',[LectureController::class,'destroy'])->name('lecturedestroy');
    Route::post('coursee/lecture/edit/{id}',[LectureController::class,'update'])->name('editlecture');

    Route::resource('student',StudentController::class);


    Route::resource('quizze',QuizzeController::class);


    Route::post('quizze/qusation/{id}/truefalse',[QuizzeController::class,'truefalse'])->name('truefalse');
    Route::delete('quizze/qusation/truefalse/{id}',[QuizzeController::class,'deletetruefalse'])->name('deletetruefalse');
    Route::post('quizze/qusation/truefalse/edit',[QuizzeController::class,'edittruefalse'])->name('edittruefalse');


    Route::post('quizze/qusation/{id}/check',[QuizzeController::class,'check'])->name('check');
    Route::delete('quizze/qusation/check/{id}',[QuizzeController::class,'deletecheck'])->name('deletecheck');
    Route::post('quizze/qusation/check/edit',[QuizzeController::class,'editcheck'])->name('editcheck');




});

//admin
Route::prefix('admin')->middleware('auth:admin')->group(function (){
    Route::get('index', function () {
        return view('admin.index');
    });
    Route::get('requstinst',[AdminController::class,'requstinst'])->name('getrequstinst')->middleware('read');
    Route::post('Accept',[AdminController::class,'Accept'])->name('Accept');
    Route::post('Cancel',[AdminController::class,'Cancel'])->name('Cancel');
    Route::resource('admin',AdminController::class)->except(['edit','show','create']);
    Route::resource('instructor',InstController::class)->only(['index','destroy']);
    Route::resource('Category',CategoryController::class);
    Route::resource('role',RolesController::class);
    Route::get('chat_group',[ChatGroupController::class,'index'])->name('chat_group');
    Route::get('map',[MapController::class,'map'])->name('map');






});

//Route::get('userr', [ChatGroupController::class, 'loadMore']);
