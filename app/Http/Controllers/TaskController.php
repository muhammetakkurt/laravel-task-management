<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole(['admin' , 'editor'])) {
            $tasks = Task::paginate(10);
        }else{
            $tasks = auth()->user()->tasks()->paginate(10);
        }

        return view("tasks.list" , compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taskStatuses = config('enums.task_statuses');
        $users = User::all()->pluck('name','id');
        return view("tasks.create" , compact('users' , 'taskStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        $task = Task::create($request->validated());
        if ($request->hasFile('image_path'))
        {
            $path = $request->file('image_path')->store('tasks' , ['disk' => 'public']);
            $task->update(['image_path' => $path]);
        }
        return redirect()->route('tasks.index')->withSuccess('Task has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        $taskStatuses = config('enums.task_statuses');
        $users = User::all()->pluck('name','id');
        return view('tasks.edit' , compact('task','taskStatuses' , 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());
        if ($request->hasFile('image_path'))
        {
            $path = $request->file('image_path')->store('tasks' , ['disk' => 'public']);
            $task->update(['image_path' => $path]);
        }
        return redirect()->route('tasks.index')->withSuccess('Task has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->withSuccess('Task has been updated!');
    }
}
