<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Task;
use App\Models\User;
use App\Services\TaskServices;
use Livewire\Component;

class ShowTasks extends Component
{
    public $q;

    public $taskStatuses = [];

    public $selectedUser = [];

    public $selectedStatus;

    public $users;

    public function mount(){
        $this->taskStatuses = config('enums.task_statuses');
        $this->users = User::with('activeTasks')->whereHas('tasks')->get();
    }

    public function resetFilters()
    {
        $this->q = null;
        $this->selectedUser = [];
        $this->selectedStatus = null;
    }

    public function render(TaskServices $taskServices)
    {
        $taskGroups = $taskServices->searchByParams($this->q, $this->selectedUser, $this->selectedStatus);
        return view('livewire.dashboard.show-tasks' , compact('taskGroups'));
    }
}
