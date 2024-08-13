<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //==============================dashboard============================
        Route::get('/dashboard', function () {
            return view('dashboard2');
        });


        //==============================Grades============================
        Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
        Route::post('/grades/store', [GradeController::class, 'store'])->name('grades.store');
        Route::patch('/grades/edit', [GradeController::class, 'update'])->name('grades.update');
        Route::delete('/grades/delete', [GradeController::class, 'destroy'])->name('grades.delete');


        //==============================Classrooms============================
        Route::get('/classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');
        Route::post('/classrooms/store', [ClassroomController::class, 'store'])->name('classrooms.store');
        Route::patch('/classrooms/edit', [ClassroomController::class, 'update'])->name('classrooms.update');
        Route::delete('/classrooms/delete', [ClassroomController::class, 'destroy'])->name('classrooms.delete');
    
    }
);


/*
Route::get('/dashboard0', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 */

require __DIR__ . '/auth.php';
