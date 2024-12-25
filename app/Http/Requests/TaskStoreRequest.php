<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'assigned_to'=>['required'],
            'contact' =>['required', 'max:50','string'],
            'department' =>['required', 'max:255', 'string'],
            'problem_type' =>['required'],
            'description' =>['nullable','max:500']
        ];
    }
}
