<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index',[
            'tasks' => Task::paginate(50),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->long_description = $request->long_description;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('show',[
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit',[
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->title = $request->title;
        $task->description = $request->description;
        $task->long_description = $request->long_description;
        $task->save();
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    public function marked()
    {
        return view('marked',[
            'tasks' => Task::where('completed', true)->get(),
        ]);
    }
    function marked_all(){
        Task::where('completed', true)->delete();
        return redirect()->route('tasks.index')->with('success', 'All marked task deleted successfully');
    }
    function marked_toggle(Task $task){

        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back();
    }
    function info(){
        $lastRow = Task::orderBy('id', 'desc')->first();
        $last_id = $lastRow ? $lastRow->id : null;
        $completedTasksCount = Task::where('completed', true)->count();
        $incompleteTasksCount = Task::where('completed', false)->count();

        return view('info',[
            'total_id'=> $last_id,
            'completed' => $completedTasksCount,
            'not_completed' => $incompleteTasksCount
        ]);
    }
}
