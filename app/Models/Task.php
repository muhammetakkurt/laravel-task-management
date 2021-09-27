<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'task_status_id', 'title', 'content', 'velocity', 'priority', 'image_path'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id', 'id')->withDefault(['name' => 'Backlog', 'code' => 'backlog', 'color' => 'red', 'order' => 0]);
    }

    public function getFullImagePathAttribute()
    {
        if (!$this->image_path) {
            return null;
        }
        $config = config('filesystems.disks.public.url');

        return "$config/$this->image_path";
    }
}
