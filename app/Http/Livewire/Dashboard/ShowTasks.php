<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TaskStatus;
use App\Models\User;
use App\Services\TaskServices;
use Livewire\Component;

class ShowTasks extends Component
{
    public $queryString;

    public $taskStatuses = [];

    public $selectedUserIds = [];

    public $selectedTaskStatus = null;

    public $unassignedUsers = null;

    public $users;

    protected $rules = [
        'queryString' => 'nullable|string',
        'selectedUserIds' => 'nullable|array',
        'selectedTaskStatus' => 'nullable|int',
        'unassignedUsers' => 'nullable|bool'
    ];

    public function mount(){
        $this->taskStatuses = TaskStatus::all()->pluck('name' , 'id');
        $this->users = User::with('activeTasks')->whereHas('tasks')->get();
    }

    public function resetFilters()
    {
        $this->queryString = null;
        $this->selectedUserIds = [];
        $this->selectedTaskStatus = null;
        $this->unassignedUsers = null;
    }

    public function render(TaskServices $taskServices)
    {
        $taskGroups = TaskStatus::orderBy('order', 'asc')->get();
        $this->validate();
        $tasks = $taskServices->searchByParams($this->queryString, $this->selectedUserIds, $this->selectedTaskStatus , $this->unassignedUsers);
        return view('livewire.dashboard.show-tasks' , compact('taskGroups', 'tasks'));
    }
}
