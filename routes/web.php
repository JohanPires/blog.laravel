<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleWare;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/filter', [PageController::class, 'filter'])->name('filter');
Route::delete('/', [PageController::class, 'deletePostWelcome'])->name('deletePostWelcome');
Route::get('/post/{id}', [PageController::class, 'showOne'])->name('showOne');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/legal',[PageController::class, 'legal'])->name('legal');

Route::get('dashboard/categories',[CategoryController::class, 'categories'])->middleware(['auth', 'verified',AdminMiddleWare::class])->name('categories');
Route::get('dashboard/categories/form',[CategoryController::class, 'formCategories'])->middleware(['auth', 'verified',AdminMiddleWare::class])->name('formCategories');
Route::post('dashboard/categories',[CategoryController::class, 'addCategorie'])->name('addCategorie');
Route::delete('dashboard/categories',[CategoryController::class, 'deleteCategorie'])->name('deleteCategorie');

Route::get('dashboard/addPost',[DashboardController::class, 'formPost'])->middleware(['auth', 'verified'])->name('formPost');
Route::post('dashboard/addPost',[DashboardController::class, 'addPost'])->name('addPost');


Route::get('dashboard/users',[UserController::class, 'usersList'])->middleware(['auth', 'verified',AdminMiddleWare::class])->name('usersList');
Route::put('dashboard/users',[UserController::class, 'changeRole'])->name('changeRole');
Route::delete('dashboard/users',[UserController::class, 'deleteUser'])->name('deleteUser');

Route::get('dashboard/mypost',[DashboardController::class, 'myPost'])->middleware(['auth', 'verified'])->name('myPost');
Route::get('/dashboard', [DashboardController::class, 'getAll'])->middleware(['auth', 'verified'])->name('dashboard');
Route::delete('/dashboard', [DashboardController::class, 'delete'])->name('deletePost');
Route::put('/dashboard', [DashboardController::class, 'edit'])->name('editPost');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/contact-us', ['App\Http\Controllers\ContactUsController', 'index'])->name('contact.index');
Route::post('/contact-us', ['App\Http\Controllers\ContactUsController', 'send'])->name('contact.send');
