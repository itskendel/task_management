<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_id' => 'sometimes|exists:tasks,id',
            'user_id' => 'sometimes|exists:users,id',
            'status_id' => 'sometimes|exists:statuses,id',
            'priority_id' => 'sometimes|exists:priorities,id',
            'name' => 'sometimes|string|max:255',
            'desc' => 'sometimes|nullable|string',
            'due_date' => 'sometimes|date'
        ];
    }

    public function withValidator(mixed $validator)
    {
        $validator->after(function ($validator) {
            if (!isset($this->due_date)) {
                return;
            }

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
