<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/legal',[PageController::class, 'legal'])->name('legal');

Route::get('/categories',[PageController::class, 'categories'])->name('categories');
Route::get('/categories/form',[PageController::class, 'formCategories'])->name('formCategories');
Route::post('/categories',[PageController::class, 'addCategorie'])->name('addCategorie');
Route::delete('/categories',[PageController::class, 'deleteCategorie'])->name('deleteCategorie');

Route::get('/addPost',[DashboardController::class, 'formPost'])->name('formPost');
Route::post('/addPost',[DashboardController::class, 'addPost'])->name('addPost');

Route::get('/mypost',[DashboardController::class, 'myPost'])->name('myPost');

Route::get('/users',[PageController::class, 'usersList'])->name('usersList');

Route::get('/dashboard', [DashboardController::class, 'getAll'])->middleware(['auth', 'verified'])->name('dashboard');
Route::delete('/dashboard', [DashboardController::class, 'delete'])->name('deletePost');
Route::put('/dashboard', [DashboardController::class, 'edit'])->name('editPost');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


