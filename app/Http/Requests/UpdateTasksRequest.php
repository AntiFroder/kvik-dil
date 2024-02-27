<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|nullable|string|max:255',
            'status' => ['bail', 'nullable', 'numeric', new EnumValue(TaskStatusEnum::class)],
            'created_date' => 'bail|nullable|date',
        ];
    }
}
