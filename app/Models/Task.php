<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "task_status_id", "title" , "content", "velocity" , 'image_path'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(TaskStatus::class , 'task_status_id' , 'id');
    }

    public function getFullNameImagePathAttribute(){
        if(!$this->image_path) return null;
        $config = config('filesystems.disks.public.url');
        return "$config/$this->image_path";
    }
}
