<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use LivewireUI\Modal\ModalComponent;

class EmployeeRemoveConfirm extends ModalComponent
{
    public $employees;

    public function mount($id)
    {
        // ID IS THE PARAMETER THAT WILL BE USED IN RENDER FUNCTION
        $this->employees = Employee::find($id);
    }

    public function render()
    {
        // TO GET THE FULL NAME OF SPECIFIC EMPLOYEE BY THEIR ID
        $employeeDetails = $this->employees;

        return view('livewire.employee-remove-confirm', compact('employeeDetails'));
    }
}
