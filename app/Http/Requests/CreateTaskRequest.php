<?php

namespace App\Http\Requests;

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
            'user_id' => 'required|exists:App\Models\User,id',
            'title' => 'required|max:200',
            'content' => 'required',
            'status' => 'required',
            'velocity' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
