<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'priority_id' => 'required|exists:priorities,id',
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'due_date' => 'required|date'
        ];
    }

    public function withValidator(mixed $validator)
    {
        $validator->after(function ($validator) {
            $task = Task::find($this->task_id);

            if (!$task || !$this->due_date) {
                return;
            }

            if ($this->due_date >= $task->due_date) {
                $validator->errors()->add(
                    'due_date',
                    'The due date must be before the task due date.'
                );
            }
        });
    }
}
