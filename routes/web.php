<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
})->name('home');*/

Route::get('/', [PageController::class, 'home'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/sluzby', [PageController::class, 'index'])->name('sluzby.index');

Route::get('/book/{token}', [PageController::class, 'show'])->name('book.show');
Route::post('/book/{token}', [PageController::class, 'store'])->name('book.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/settings', [UserDetailController::class, 'edit'])->name('user-details.edit');
    Route::post('/dashboard/settings', [UserDetailController::class, 'update'])->name('user-details.update');

    Route::get('/dashboard/books', [PageController::class, 'bookshow'])->name('book-details.show');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/clients', [AdminController::class, 'index'])->name('admin.clients');
    Route::post('/admin/clients/{id}', [AdminController::class, 'update'])->name('admin.clients.update');

    Route::get('/admin/posts', [AdminController::class, 'postshow'])->name('admin.posts');
    Route::get('/admin/posts/{id}', [AdminController::class, 'postshowdetail'])->name('admin.post-detail');
    Route::post('/admin/posts/{id}', [AdminController::class, 'postupdate'])->name('admin.post.update');

    Route::get('/admin/post-create', function () {return view('admin.post-create');})->name('admin.post.createshow');
    Route::post('/admin/post-create', [AdminController::class, 'postcreatestore'])->name('admin.posts.createstore');
});