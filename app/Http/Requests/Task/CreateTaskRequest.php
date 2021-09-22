<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'nullable|exists:App\Models\User,id',
            'task_status_id' => 'nullable|exists:App\Models\TaskStatus,id',
            'title' => 'required|max:200',
            'content' => 'required',
            'velocity' => 'required|numeric',
            'priority' => 'required|numeric',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
