<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Task extends Component
{
    public $task;
    public $taskStatus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
        switch ($this->task->status) {
            case 'in_review':
                $this->taskStatus = 'bg-gray-200 text-black';
                break;
            case 'open':
                $this->taskStatus = 'bg-indigo-300 text-white';
                break;
            case 'in_progress':
                $this->taskStatus = 'bg-blue-500 text-gray-200';
                break;
            case 'completed':
                $this->taskStatus = 'bg-green-500 text-gray-200';
                break;

            default:
                # code...
                break;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.task');
    }
}
