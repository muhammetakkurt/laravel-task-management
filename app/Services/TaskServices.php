<?php

namespace App\Services;

use App\Models\Task;

class TaskServices {

    /*
     * @param $request
     * @param $task
     * */
    public function storeFileAndUpdateColumn($request, $task){
        if ($request->hasFile('image_path'))
        {
            $path = $request->file('image_path')->store('tasks' , ['disk' => 'public']);
            $task->update(['image_path' => $path]);
        }
    }

    /*
     * Show tasks
     * @param $q
     * @param $user_id
     * @param $status
     * */
    public function searchByParams($q = null, $user_id = null, $task_status_id = null){
        return Task::with(['user','status'])
            ->where(function ($query) use ($q) {
                return $query->when($q, function ($query , $q){
                    return $query->where('title', 'like' , '%'.$q.'%')
                        ->orWhereRelation('user', 'name', 'like', '%'.$q.'%');
                });
            })->when($task_status_id, function ($query, $task_status_id) {
                return $query->where('task_status_id', $task_status_id);
            })->when($user_id, function ($query, $user_id) {
                return $query->whereIn('user_id', $user_id);
            })
            ->get()
            ->groupBy('task_status_id');
    }
}
