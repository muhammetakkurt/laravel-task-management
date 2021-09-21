<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class ShowTasks extends Component
{
    public $q;

    public $readyToLoad = false;

    public $taskStatuses = [];

    public $selectedUser = [];

    public $selectedStatus;

    public $users;

    public function mount(){
        $this->taskStatuses = config('enums.task_statuses');
        $this->users = $users = User::whereHas('tasks')->get();
    }

    public function loadTasks(){
        $this->readyToLoad = true;
    }

    public function resetFilters()
    {
        $this->q = null;
        $this->selectedUser = [];
        $this->selectedStatus = null;
    }

    public function render()
    {
        if($this->readyToLoad)
        {
            $taskGroups = Task::when($this->q, function ($query) {
                                return $query->where('title', 'like' , '%'.$this->q.'%');
                            })->when($this->selectedStatus, function ($query) {
                                return $query->where('status', $this->selectedStatus);
                            })->when($this->selectedUser, function ($query) {
                                return $query->whereIn('user_id', $this->selectedUser);
                            })->get()->groupBy('status');
        }else{
            $taskGroups = [];
        }

        return view('livewire.dashboard.show-tasks' , compact('taskGroups'));
    }
}
