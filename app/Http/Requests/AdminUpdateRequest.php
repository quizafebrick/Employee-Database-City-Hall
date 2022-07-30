<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
        // THE EMPLOYEE NO. IGNORES THE PRESENT EMPLOYEE NO.(WHEN EDITING)
        // BUT VALIDATING IF IT'S ALREADY EXISTING IN THE DATABASE (WHEN CHANGING),
        // AND HANDLING THE UNIQUENESS OF EMPLOYEE NO (WHEN REALLY NEED TO BE CHANGED OR HAVING A MISTAKE).
        return [
            'employee_no' => ['nullable', Rule::unique('employees', 'employee_no')->ignore($this->id)],
        ];
    }
}
