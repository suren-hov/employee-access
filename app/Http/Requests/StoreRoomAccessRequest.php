<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\DayOfWeekEnum;
use Illuminate\Validation\Rule;

class StoreRoomAccessRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'exists:employees,id'],
            'room_id'     => ['required', 'exists:rooms,id'],
            'day_of_week' => ['required', Rule::in(DayOfWeekEnum::values())],
            'start_time'  => ['required', 'date_format:H:i'],
            'end_time'    => ['required', 'date_format:H:i', 'after:start_time'],
        ];
    }
}
