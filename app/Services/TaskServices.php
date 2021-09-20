<?php

namespace App\Services;

class TaskServices {

    public function storeFileAndUpdateColumn($request, $task){
        if ($request->hasFile('image_path'))
        {
            $path = $request->file('image_path')->store('tasks' , ['disk' => 'public']);
            $task->update(['image_path' => $path]);
        }
    }
}
