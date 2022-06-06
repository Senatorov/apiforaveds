<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_email' => 'required|email',
            'employee_name' => 'required|string|min:3|max:35',
            'employee_age' => 'required|integer|numeric',
            'employee_experience' => 'required|integer|numeric',
            'employee_salary' => 'required|integer|numeric',
            'employee_photo' => 'required|image:jpg, jpeg, png',
        ];
    }
}
