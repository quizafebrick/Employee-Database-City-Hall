<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use LivewireUI\Modal\ModalComponent;

class EmployeeRestoreConfirm extends ModalComponent
{

    public function mount($id)
    {
        // ID IS THE PARAMETER THAT WILL BE USED IN RENDER FUNCTION
        // IT ONLY GRAB THE EMPLOYEE THAT HAS BEEN TRASHED(FIELD: DELETED_AT != NULL)
        $this->employees = Employee::onlyTrashed()->findOrFail($id);
    }

    public function render()
    {
        // TO GET THE FULL NAME & EMPLOYEE NO. OF SPECIFIC EMPLOYEE BY THEIR ID
        $employeeDetails = $this->employees;

        return view('livewire.employee-restore-confirm', compact('employeeDetails'));
    }
}
