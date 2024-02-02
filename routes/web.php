<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // menambah route student
    Route::get('/students', function () {
        return view('students');
    })->name('students');
    // menampilkan data
    Route::get('/students', [StudentsController::class, 'index'])->name('students');
    Route::get('/students/create', [StudentsController::class,  'create'])->name('students/create');
    // menjalankan perintah save yang ada pada method store di Student Controller
    Route::get('/store', [StudentsController::class, 'store'])->name('store');
    // menambhakan form edit
    Route::get('/students/edit/{idstudents}', [StudentsController::class, 'edit'])->name('students/edit');
    Route::get('/update/{idstudents}', [StudentsController::class, 'update'])->name('update');
});

require __DIR__.'/auth.php';
