<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'project_id' => 'required|exists:projects,id',
            'status_id' => 'required|exists:statuses,id',
            'priority_id' => 'required|exists:priorities,id',
            'name' => 'required|string|max:255',
            'desc' => 'nullable',
            'due_date' => 'required|date'
        ];
    }

    public function withValidator(mixed $validator)
    {
        $validator->after(function ($validator) {
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
