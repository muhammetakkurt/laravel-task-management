<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskServices;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public $guardName;

    public function __construct()
    {
        $this->guardName = config('auth.defaults.api_guard');
    }

    /*
     * List all tasks
     * */
    public function index(){
        return TaskResource::collection(Task::with('user')->get());
    }

    /*
     * Show one of task
     * */
    public function show(Task $task){
        return new TaskResource($task);
    }

    /*
     * Create a task
     * */
    public function store(CreateTaskRequest $request , TaskServices $taskServices){
        if( $request->user()->hasRole('Super Admin' ) === false &&
            $request->user()->hasPermissionTo('create tasks' , $this->guardName) === false)
            throw new \Exception('You do not have access to update this task.');

        $task = Task::create($request->validated());
        $taskServices->storeFileAndUpdateColumn($request, $task);
        return new TaskResource($task);
    }

    /*
     * Update task
     * @param App\Http\Requests\UpdateTaskRequest
     * */
    public function update(UpdateTaskRequest $request , Task $task , TaskServices $taskServices){
        if( $request->user()->hasRole('Super Admin' ) === false &&
            $request->user()->hasPermissionTo('delete tasks' , $this->guardName) === false)
            throw new \Exception('You do not have access to update this task.');

        $task->update($request->validated());
        $taskServices->storeFileAndUpdateColumn($request, $task);
        return new TaskResource($task);
    }

    /*
     * Destroy task
     * @param Request
     * @param $task
     * */
    public function destroy(Request $request, Task $task){
        if( $request->user()->hasRole('Super Admin' ) === false &&
            $request->user()->hasPermissionTo('delete tasks' , $this->guardName) === false)
            throw new \Exception('You do not have access to delete this task.');

        $task->delete();
        return response()->json(['message' => 'This task has been deleted.']);
    }
}
