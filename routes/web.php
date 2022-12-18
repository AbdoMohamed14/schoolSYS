<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\MyparentController;
use App\Http\Controllers\SessionTableController;
use App\Http\Controllers\StageClassController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Myparent;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::view('empty', 'empty' );


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth', 'verified' ]
    ], function(){ 
        
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('stages', StageController::class);

        Route::resource('stage_classes', StageClassController::class);

        Route::resource('classrooms', ClassroomController::class);

        Route::resource('parents', MyparentController::class);

        Route::resource('students', StudentController::class);

        Route::resource('teachers', TeacherController::class);

        Route::resource('subjects', SubjectController::class);

        Route::resource('lessons', LessonController::class);

        Route::resource('sessionTables', SessionTableController::class);

        Route::get('profile', [ProfileController::class, 'index'])->name('myProfile');

    });

    Route::get('test', function(){

         $id = Myparent::inRandomOrder()->take(1)->pluck('id');

         return $id;
    });


require __DIR__.'/auth.php';
