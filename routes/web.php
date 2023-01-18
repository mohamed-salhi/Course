<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\InstController;
use App\Http\Controllers\inst\CourseController;
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
Route::prefix('instructor')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('coach.index');
    })->name('instructor');
    Route::resource('Course',CourseController::class);

});

//admin
Route::prefix('admin')->middleware('auth:admin')->group(function (){
    Route::get('index', function () {
        return view('admin.index');
    });
    Route::get('requstinst',[AdminController::class,'requstinst'])->name('getrequstinst');
    Route::post('Accept',[AdminController::class,'Accept'])->name('Accept');
    Route::post('Cancel',[AdminController::class,'Cancel'])->name('Cancel');
    Route::resource('admin',AdminController::class)->except(['edit','show','create']);
    Route::resource('instructor',InstController::class)->only(['index','destroy']);
    Route::resource('Category',CategoryController::class);

});


