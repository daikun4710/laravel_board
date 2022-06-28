<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThreadController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('threads', function(){
//     return view('threads.index');
// })->name('threads');
//コントローラーに処理させる↓
Route::get('/threads',[ThreadController::class, 'index'])->name('threads');

Route::get('threads/create', [ThreadController::class, 'create'])->name('threads.create');
Route::post('/threads/create', [ThreadController::class, 'store']);

Route::get('/threads/{thread}', [ThreadController::class, 'show'])->name('threads.show');

Route::post('/threads/{thread}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::delete('/comments/{comment}', [CommentController::class, 'comment_destroy'])->name('comments.destroy');

Route::delete('threads/{thread}', [ThreadController::class, 'thread_destroy'])->name('threads.destroy');

require __DIR__.'/auth.php';
