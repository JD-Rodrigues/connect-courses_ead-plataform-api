<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Support;
use Illuminate\Validation\Rule;

class StoreSupportRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Support $support): array
    {
        return [
            'status_code' => ['required', Rule::in(array_keys($support->statusOptions))],
            'lesson_id' => ['required', 'exists:lessons,id'],
            'description' => ['required', 'min:10', 'max:10000']
        ];
    }
}
