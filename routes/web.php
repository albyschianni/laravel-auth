<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MainController::class, 'home'])
    -> name('home');

Route::get('/project/show/{project}', [MainController::class, 'projectShow'])
    -> name('project.show');



Route :: post('/project/store', [MainController :: class, 'projectStore'])
    -> name('project.store');

Route :: post('/project/update/{project}', [MainController :: class, 'projectUpdate'])
    -> name('project.update');




Route::get('/dashboard', function () {
    return redirect() -> route('home');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    
    Route::get('/logged/project/delete/{project}', [MainController::class, 'projectDelete']) 
    -> name('project.delete');
    Route::get('/logged/project/edit/{project}', [MainController::class, 'projectEdit']) 
    -> name('project.edit');
    Route::get('/logged/project/create', [MainController::class, 'projectCreate']) 
    -> name('project.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
