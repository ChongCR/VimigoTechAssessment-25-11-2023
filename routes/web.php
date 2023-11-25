<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImportController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/index',[\App\Http\Controllers\StudentController::class,'backToIndex'])->name('students.backToIndex');
    Route::get('/index/studentManagement/lists',[\App\Http\Controllers\StudentController::class,'index'])->name('students.index');
    Route::get('/index/studentManagement/details/{student}',[\App\Http\Controllers\StudentController::class,'getStudentDetails'])->name('students.show');
    Route::get('/index/studentManagement/create', [\App\Http\Controllers\StudentController::class, 'createStudent'])->name('students.create');
    Route::post('/index/studentManagement/store', [\App\Http\Controllers\StudentController::class, 'storeStudent'])->name('students.store');
    Route::get('/index/studentManagement/edit/{student}', [\App\Http\Controllers\StudentController::class, 'editStudentDetails'])->name('students.edit');
    Route::put('/index/studentManagement/update/{student}',[\App\Http\Controllers\StudentController::class,'updateStudentDetails'])->name('students.update');
    Route::delete('/index/studentManagement/delete/{student}',[\App\Http\Controllers\StudentController::class,'deleteStudentDetails'])->name('students.delete');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/index/studentManagement/import',[ImportController::class,'index'])->name('import.index');
    Route::post('/index/studentManagement/import', [ImportController::class,'import'])->name('import.store');
    Route::get('/generate-excel', [\App\Http\Controllers\ExcelSampleGeneratorController::class, 'generateExcel'])->name('generate.excel');
    Route::get('/index/studentManagement/students/search',[\App\Http\Controllers\StudentController::class,'search'])->name('students.search');
});

Route::get('', function () {
    return view('auth.login');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('submit.login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class,'logout'])->name('logout');
