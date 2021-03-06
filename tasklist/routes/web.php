<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

Route::prefix('objetivo')->middleware(['auth'])->group(function () {
    Route::get('/novo', [TaskController::class, 'taskView'])->name('newTaskView');
    Route::get('/{id}', [TaskController::class, 'taskView'])->where('id', '[0-9]+')->name('editTaskView');
    Route::get('/todos', [TaskController::class, 'listTaskView'])->name('listTaskView');

    Route::post('/new', [TaskController::class, 'newTask'])->name('new');
    Route::put('/{id}/update', [TaskController::class, 'updateTask'])->where('id', '[0-9]+')->name('update');
    Route::put('/{id}/change', [TaskController::class, 'changeTask'])->where('id', '[0-9]+')->name('change');
    Route::delete('/{id}/delete', [TaskController::class, 'deleteTask'])->where('id', '[0-9]+')->name('delete');
});

Route::get('/', function () {
    return redirect('login');
});

require __DIR__.'/auth.php';
