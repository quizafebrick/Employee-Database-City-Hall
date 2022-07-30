<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\URL;
use LivewireUI\Modal\ModalComponent;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EmployeeQrCode extends ModalComponent
{
    // VARIABLE TO CALL IN THE QUERY
    public $employee;

    public function mount($id)
    {
        // ID IS THE PARAMETER THAT WILL BE USED IN RENDER FUNCTION
        $this->employee = Employee::find($id);
    }

    public function render()
    {
        // GET THE USERNAME OF SUPERADMIN FIRST,
        $superAdmin = ['superAdminUsername' => SuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        // if (!$superAdmin)
        // {
        //     $qrCode = QrCode::size(350)->generate($this->employee->employee_no);
        // }
        // SIGNED ROUTE TO VIEW THE SPECIFIC EMPLOYEE'S INFORMATION WITH A DYNAMIC LINK,
        // EVERY TIME THAT THE QR CODE SCANNED, SIGNED ROUTE WILL GIVE YOU VARIOUS SIGNED TOKEN,
        // $url = URL::signedRoute('superadmin.view-qrCode', $this->employee->employee_no);
        // ===================================================================== //

        // AND TRANSFORM THE LINK INTO QR CODE.
        // THE QRCODE LIBRARY ALREADY INSTALLED.
        // A LITTLE CONFIGURATION TO USE THE QR CODE LIBRARY, YOU WILL SEE INSIDE THE CONFIG->APP.PHP('PROVIDERS' & 'ALIASES').
        $url = URL::signedRoute('superadmin.view-qrCode', $this->employee->employee_no);

        $qrCode = QrCode::size(350)->generate($this->employee->employee_no);
        // ===================================================================== //
        // TO GET THE FULL NAME OF SPECIFIC EMPLOYEE BY THEIR ID
        $employeeName = $this->employee;

        return view('livewire.employee-qr-code', $superAdmin,compact('qrCode','employeeName'));
    }
}
