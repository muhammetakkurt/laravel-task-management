<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskStatusResource;
use App\Models\TaskStatus;

class TaskStatusController extends Controller
{
    public function index()
    {
        return TaskStatusResource::collection(TaskStatus::all());
    }
}
