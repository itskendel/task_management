<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'project_id' => 'sometimes|exists:projects,id',
            'status_id' => 'sometimes|exists:statuses,id',
            'priority_id' => 'sometimes|exists:priorities,id',
            'name' => 'sometimes|string|max:255',
            'desc' => 'sometimes|nullable',
            'due_date' => 'sometimes|date'
        ];
    }

    public function withValidator(mixed $validator)
    {
        $validator->after(function ($validator) {
            if (!isset($this->due_date)) {
                return;
            }

            $project = Project::find($this->project_id);

            if (!$project || !$this->due_date) {
                return;
            }

            if ($this->due_date <= $project->start_date) {
                $validator->errors()->add(
                    'due_date',
                    'The due date must be after the project start date.'
                );
            }

            if ($this->due_date >= $project->due_date) {
                $validator->errors()->add(
                    'due_date',
                    'The due date must be before the project due date.'
                );
            }
        });
    }
}
