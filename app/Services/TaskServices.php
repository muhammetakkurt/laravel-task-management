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
     * @param string $queryString
     * @param array $selectedUserIds
     * @param $status
     * @param $unassignedUsers
     * */
    public function searchByParams(string $queryString = null, array $userIds = null, int $taskStatusId = null, bool $unassignedUsers = null){
        $taskGroups = Task::with(['user','status'])
            ->where(function ($query) use ($queryString) {
                return $query->when($queryString, function ($query , $queryString){
                    return $query->where('title', 'like' , '%'.$queryString.'%')
                        ->orWhereRelation('user', 'name', 'like', '%'.$queryString.'%');
                });
            })->when($taskStatusId, function ($query, $taskStatusId) {
                return $query->where('task_status_id', $taskStatusId);
            })->when($userIds, function ($query, $userIds) {
                return $query->whereIn('user_id', $userIds);
            })->when($unassignedUsers, function ($query) {
                return $query->whereNull('user_id');
            })
            ->orderBy('task_status_id', 'ASC')
            ->orderBy('priority', 'DESC')
            ->get()
            ->groupBy('task_status_id');
        return $taskGroups;
    }
}
