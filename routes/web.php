<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('blog.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('blog.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//github login
Route::get('auth/github', [SocialAuthController::class, 'redirectToGithub'])->name('login.github');
Route::get('auth/github/callback', [SocialAuthController::class, 'handleGithubCallback']);


//Post Routes
Route::prefix('posts')->middleware('auth')->controller(PostController::class)
    ->group(function () {
        Route::get('/add', 'addPosts')->name('add.posts');
        Route::post('/save', 'savePost')->name('save.post');
        Route::get('/manage', 'managePost')->name('manage.post');
        Route::post('/status-change', 'changeStatus')->name('change.post.status');
    });

Route::controller(TagController::class)->group(function () {
    Route::get('get-tags', 'getTags')->name('get.tags');
});



require __DIR__ . '/auth.php';
