<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getIndex(){

        $taskGroups = Task::get()->groupBy('status');
        return view('dashboard', compact('taskGroups'));

    }
}
