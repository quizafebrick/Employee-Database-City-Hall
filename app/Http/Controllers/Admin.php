<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Models\DetailedOffice;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminsLoginRequest;
use App\Http\Requests\AdminUpdateRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\EmployeeFormValidation;
use Illuminate\Support\Facades\URL;

class Admin extends Controller
{
    public function loginView()
    {
        return view('admin.login');
    }

    public function checkUsers(AdminsLoginRequest $request)
    {
        // ALREADY VALIDATED AT AdminsLoginRequest REQUEST
        $requests = $request->validated();
        $admin = ModelsAdmin::where('username', $requests['username'])->first();

        // RETURN BACK WITH ERROR MESSAGE IF NOT AN ADMIN ACCOUNT
        if (!$admin)
        {
            return back()->with('error', 'The user is not reflected to our database');
        }

        // CHECKING OF THE PASSWORD
        if (!Hash::check($requests['password'], $admin->password))
        {
            return back()->with('error', 'The password does not match.');
        }
        $request->session()->put('adminUsername', $admin->id);

        return redirect()->route('admin.index');
    }

    public function logout()
    {
        if (session()->has('adminUsername'))
        {
            session()->pull('adminUsername');

            return redirect('a/login');
        }
    }

    public function admin()
    {
        // CURRENTLY USERNAME SESSION BY ADMIN THEN GET THE EMPLOYEES TABLE DATA
        $admin = ['adminUsername' => ModelsAdmin::where('id', '=', session('adminUsername'))->first()];

        return view('admin.index', $admin);
    }

    public function addEmployee()
    {
        // CURRENTLY USERNAME SESSION BY SUPERADMIN THEN ADD NEW EMPLOYEES
        // THEN GET THE OFFICES & DETAILED OFFICES IN ORDER
        $admin = ['adminUsername' => ModelsAdmin::where('id', '=', session('adminUsername'))->first()];
        $offices = Office::orderBy('name', 'asc')->get();
        $detailedOffices = DetailedOffice::orderBy('name', 'asc')->get();

        return view('admin.add-employee', $admin, compact('offices', 'detailedOffices'));
    }

    public function storeEmployee(EmployeeFormValidation $request)
    {
        // SAVE & REDIRECT TO CREATE VIEW
        // ===================================================================================== //
        // ALREADY VALIDATED AT EmployeeFormValidation REQUEST
        $requests = $request->validated();

        // THIS WILL SAVE A RANDOMIZED ALPHANUMERIC WITHOUT THE USERS INPUT
        // ===================================================================================== //
        // AFTER, IT WILL SAVE
        $requests['emp_token'] = Str::random(25);
        $requests['link_token'] = Str::random(50);
        Employee::create($requests);

        return redirect()->route('admin.index')->with('success', 'Addedd Successfully!');
    }

    public function editEmployee($linkToken, $id)
    {
        // GET THE USERNAME OF SUPERADMIN FIRST,
        $admin = ['adminUsername' => ModelsAdmin::where('id', '=', session('adminUsername'))->first()];
        // AND GET THE LINK TOKEN AND THE ID OF EMPLOYEE,
        // AND ALSO GET THE VALUE OF NAMES OF OFFICES AND DETAILED OFFICES TO PASS IN THE EDIT VIEW.
        $employees = Employee::where('link_token', '=', $linkToken)->where('id', '=', $id)->first();
        $offices = Office::get();
        $detailedOffices = DetailedOffice::get();

        return view('admin.edit-employee', $admin, compact('employees', 'offices', 'detailedOffices'));
    }

    public function update(AdminUpdateRequest $request, Employee $employees, $linkToken, $id)
    {
        // VALIDATE THEN UPDATE
        // MODEL BINDING $employees OBJECT
        // THE ID PARAMETER IS ALREADY INSIDE IN THE 'UpdateEmployeeRequest'
        // TO SEE THE ID PARAMETER, VIEW THE REQUEST(UpdateEmployeeRequest) AND YOU WILL SEE IN THE RULE STATEMENT
        // =============================================================================== //
        // IGNORING THE PRESENT EMPLOYEE NO. TO UPDATE THE SPECIFIC EMPLOYEE INFORMATION
        // AVOIDS DUPLICATION WHEN EDITING THE EMPLOYEE NO., IT WILL REDIRECT YOU W/ ERROR MESSAGE 'ALREADY TAKEN' STATEMENT.
        $requests = $request->validated();
        $employees->where('link_token', '=', $linkToken)->update($requests);

        return redirect()->route('admin.index')->with('success', 'Updated Successfully!');
    }

    public function viewQrCode($id)
    {
        // GET THE USERNAME OF SUPERADMIN FIRST,
        // $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        // AND GET THE LINK TOKEN AND THE ID OF EMPLOYEE, THEN PASS IT TO THE VIEW
        $employees = Employee::where('id', '=', $id)->first();

        return view('admin.view-qrcode', compact('employees'));
    }
}
