<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Services\TaskServices;
use Livewire\Component;

class ShowTasks extends Component
{
    public $q;

    public $taskStatuses = [];

    public $selectedUser = [];

    public $selectedTaskStatus;

    public $users;

    public function mount(){
        $this->taskStatuses = TaskStatus::all()->pluck('name' , 'id');
        $this->users = User::with('activeTasks')->whereHas('tasks')->get();
    }

    public function resetFilters()
    {
        $this->q = null;
        $this->selectedUser = [];
        $this->selectedTaskStatus = null;
    }

    public function render(TaskServices $taskServices)
    {
        $taskGroups = TaskStatus::orderBy('order', 'asc')->get();
        $tasks = $taskServices->searchByParams($this->q, $this->selectedUser, $this->selectedTaskStatus);
        return view('livewire.dashboard.show-tasks' , compact('taskGroups', 'tasks'));
    }
}
