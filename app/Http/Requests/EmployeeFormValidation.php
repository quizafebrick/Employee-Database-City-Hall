<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'employee_no' => 'nullable|unique:employees,employee_no|regex:/^[A-Z]+([-][0-9]+)+$/',
            '_token' => 'nullable',
            'emp_token' => 'string',
            'link_token' => 'string',
            'firstname' => 'required|regex:/^(?=.{2,25}$)[A-z]+(?: [A-z]+)?$/',
            'middlename' => 'required',
            'lastname' => 'required|regex:/^(?=.{2,25}$)[A-z]+(?: [A-z]+)?$/',
            'home_address' => 'required',
            'birthday' => 'required',
            'contact_person' => 'required|regex:/^[a-zA-Z\s]*$/',
            'contact_address' => 'required',
            'contact_no' => 'required|regex:/^[0-9]{11}$/',
            'applicant_no' => 'required|regex:/^[0-9]{11}$/',
            'position' => 'required|regex:/^[a-zA-Z\s]*$/',
            'office_id' => 'required',
            'division' => 'required|regex:/^[a-zA-Z\s]*$/',
            'gsis_no' => 'required',
            'tin_no' => 'required|regex:/^(\d{3})[-](\d{3})[-](\d{3})[-](\d{3})$/',
            'philhealth' => 'required|regex:/^(\d{2})[-](\d{9})[-](\d{1})$/',
            'blood_type' => 'nullable',
            'detailed_office_id' => 'required',
        ];
    }
}
