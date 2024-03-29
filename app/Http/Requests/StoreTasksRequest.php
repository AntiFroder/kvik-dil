<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class StoreTasksRequest extends FormRequest
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
            'name' => 'bail|required|string|max:255',
            'status' => ['bail', 'required', 'numeric', new EnumValue(TaskStatusEnum::class)],
            'created_date' => 'bail|date',
        ];
    }
}
