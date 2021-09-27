<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\TaskStatus;
use App\Models\User;
use App\Services\TaskServices;
use Livewire\Component;

class ShowTasks extends Component
{
    public $searchString;

    public $taskStatuses = [];

    public $selectedUserIds = [];

    public $selectedTaskStatus = null;

    public $unassignedUsers = null;

    public $users;

    protected $rules = [
        'searchString' => 'nullable|string',
        'selectedUserIds' => 'nullable|array',
        'selectedTaskStatus' => 'nullable|integer',
        'unassignedUsers' => 'nullable|bool',
    ];

    public function mount()
    {
        $this->taskStatuses = TaskStatus::all()->pluck('name', 'id');
        $this->users = User::with('activeTasks')->whereHas('tasks')->get();
    }

    public function resetFilters()
    {
        $this->searchString = null;
        $this->selectedUserIds = [];
        $this->selectedTaskStatus = null;
        $this->unassignedUsers = null;
    }

    public function render(TaskServices $taskServices)
    {
        $this->validate();
        $taskGroups = TaskStatus::orderBy('order', 'asc')->get();
        $tasks = $taskServices->searchByParams((string) $this->searchString, (array) $this->selectedUserIds, (int) $this->selectedTaskStatus, (bool) $this->unassignedUsers);

        return view('livewire.dashboard.show-tasks', compact('taskGroups', 'tasks'));
    }
}
