<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\MuscleGroupController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
});

//Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

//Statute
Route::get('/regulamin', function () {
    return view('auth.regulamin'); 
});

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');


Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->get('/profil', [ProfileController::class, 'index'])->name('profile');

Route::post('/logout', function () {Auth::logout(); return redirect('/');})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');

Route::get('/news', [NewsController::class, 'index'])->name('news.search');

// Strona główna z kategoriami
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/trainings/{category:name}', [TrainingController::class, 'index'])->name('trainings.index');

Route::get('/training/create', [TrainingController::class, 'create'])->name('training.create');
Route::post('/training/store', [TrainingController::class, 'store'])->name('training.store');

// routes/web.php
Route::resource('trainings', TrainingController::class)->middleware('auth');

Route::get('/training/{id}/edit', [TrainingController::class, 'edit'])->name('training.edit');
Route::put('/training/{id}/edit', [TrainingController::class, 'update'])->name('training.update');
Route::delete('/training/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');

Route::get('/training/{id}', [TrainingController::class, 'show'])->name('training.show');

Route::get('/muscle-groups', [MuscleGroupController::class, 'showMuscleGroups']);
Route::get('/muscle-group/{id}/exercises', [ExerciseController::class, 'showExercisesByMuscleGroup'])->name('muscle-group.exercises');