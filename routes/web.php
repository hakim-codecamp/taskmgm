<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});



// Route::get('/dashboard', function () {
//     return view('tasks.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// Route::get('/task', [TaskController::class, 'index'])->name('index.task');




// Route::get('/', function () {
//     return view('create');
// });

Route::get('/create', [TaskController::class, 'create'])->name('create.task');

Route::post('/store', [TaskController::class, 'store'])->name('store.task');

Route::get('/index', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('edit.task');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('update.task');

Route::get('/task/show/{id}', [TaskController::class, 'show'])->name('show.task');

Route::delete('/task/delete/{id}', [TaskController::class, 'destroy'])->name('destroy.task');