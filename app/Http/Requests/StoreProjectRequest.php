<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
            'priority_id' => ['required', 'integer', 'exists:priorities,id'],
            'client_name' => ['required', 'string', 'max:255'],
            'project_name' => ['required', 'string', 'max:255'],
            'desc' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'due_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }
}
