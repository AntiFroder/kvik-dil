<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class TaskFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'status' => ['bail', 'nullable', new EnumValue(TaskStatusEnum::class)],
            'created_date' => ['bail', 'nullable', 'string']
        ];
    }
}
