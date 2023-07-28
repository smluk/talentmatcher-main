<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
            'event_name' => 'required',
            'event_type' => 'required',
            'event_category' => 'required',
            'event_budget' => 'required',
            'event_description' => 'required',
            'event_location_text' => 'required',
            'event_start_datetime' => 'required',
            'event_end_datetime' => 'required',
            'event_max_participants' => 'required'
            //Rules for Event Creation
        ];
    }
}
