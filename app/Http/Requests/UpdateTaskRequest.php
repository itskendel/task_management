<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status_id' => ['sometimes', 'integer', 'exists:statuses,id'],
            'priority_id' => ['sometimes', 'integer', 'exists:priorities,id'],
            'client_name' => ['sometimes', 'string', 'max:255'],
            'project_name' => ['sometimes', 'string', 'max:255'],
            'desc' => ['sometimes', 'nullable', 'string'],
            'start_date' => ['sometimes', 'date'],
            'due_date' => ['sometimes', 'date', 'after_or_equal:start_date'],
        ];
    }
}
