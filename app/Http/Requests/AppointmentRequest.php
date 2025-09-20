<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'service_name' => 'required|string|max:150',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Patient name is required.',
            'service_name.required' => 'Service name is required.',
            'date.required' => 'Please select an appointment date.',
            'date.after_or_equal' => 'Appointment date cannot be in the past.',
            'time.required' => 'Please select an appointment time.',
            'time.date_format' => 'Appointment time must be in HH:MM format.',
        ];
    }
}
