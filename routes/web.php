<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
            
    return view('index',[
        'tasks' => Task::paginate(50),
    ]);
});

Route::resource('tasks', TaskController::class);
Route::get('taks-marked',[TaskController::class, 'marked'])->name('marked');
Route::get('task-info',[TaskController::class, 'info'])->name('info');
Route::get('taks-marked-all-delete',[TaskController::class, 'marked_all'])->name('marked.delete');
Route::get('mark-as-{task}-toggle',[TaskController::class, 'marked_toggle'])->name('marked.toggle');
