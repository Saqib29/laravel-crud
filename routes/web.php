<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('students', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');