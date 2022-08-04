<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Models\DetailedOffice;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\EmployeeFormValidation;
use App\Http\Requests\SuperAdminLoginRequest;
use App\Models\SuperAdmin as ModelsSuperAdmin;
use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    public function loginView()
    {
        return view('superadmin.login');
    }

    public function checkUsers(SuperAdminLoginRequest $request)
    {
        // ALREADY VALIDATED AT 'SuperAdminLoginRequest'
        $requests = $request->validated();
        $superAdmin = ModelsSuperAdmin::where('username', $requests['username'])->first();

        // RETURN BACK WITH ERROR MESSAGE IF NOT AN ADMIN ACCOUNT
        if (!$superAdmin)
        {
            return back()->with('error', 'The user is not reflected to our database');
        }

        // CHECKING OF THE PASSWORD
        // REDIRECT AFTER
        if (!Hash::check($requests['password'], $superAdmin->password))
        {
            return back()->with('error', 'The password does not match.');
        }
        $request->session()->put('superAdminUsername', $superAdmin->id);

        return redirect()->route('superadmin.index');
    }

    public function logout()
    {
        // IF THE SUPERADMINUSERNAME IS TRUE(CURRENTLY IN THE SESSION)
        // IT WILL BE PULLED AND REDIRECT TO SUPERADMIN LOGIN
        if (session()->has('superAdminUsername'))
        {
            session()->pull('superAdminUsername');
            return redirect()->route('superadmin.login');
        }
    }

    public function superadmin()
    {
        // CURRENTLY USERNAME SESSION BY SUPERADMIN THEN GET THE EMPLOYEES TABLE DATA
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        $id = Employee::all();

        return view('superadmin.index', $superAdmin)->with('id', $id);
    }

    public function addEmployee()
    {
        // CURRENTLY USERNAME SESSION BY SUPERADMIN THEN ADD NEW EMPLOYEES
        // THEN GET THE OFFICES & DETAILED OFFICES IN ORDER
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        $offices = Office::orderBy('name', 'asc')->get();
        $detailedOffices = DetailedOffice::orderBy('name', 'asc')->get();

        return view('superadmin.add-employee', $superAdmin, compact('offices', 'detailedOffices'));
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
        if (!$requests['middlename'] == "—")
        {
            Employee::create($requests);

            return redirect()->route('superadmin.index')->with('success', 'Addedd Successfully!');
        }
        $requests['emp_token'] = Str::random(25);
        $requests['link_token'] = Str::random(50);

        // IF MIDDLENAME IS N/A(CHECKING THE CHECKBOX) RETURNS NULL OR EMPTY ON DATABASE
        if ($requests['middlename'] == "—")
        {
            $requests['middlename'] = "";
            Employee::create($requests);

            return redirect()->route('superadmin.index')->with('success', 'Addedd Successfully!');
        }
        // ELSE, MIDDLENAME IS NOT EMPTY OR NOT EQUAL TO "—"
        Employee::create($requests);

        return redirect()->route('superadmin.index')->with('success', 'Addedd Successfully!');
    }

    public function editEmployee($linkToken, $id)
    {
        // GET THE USERNAME OF SUPERADMIN FIRST,
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        // AND GET THE LINK TOKEN AND THE ID OF EMPLOYEE,
        // AND ALSO GET THE VALUE OF NAMES OF OFFICES AND DETAILED OFFICES TO PASS IN THE EDIT VIEW.
        $employees = Employee::where('link_token', '=', $linkToken)->where('id', '=', $id)->first();
        $offices = Office::get();
        $detailedOffices = DetailedOffice::get();

        return view('superadmin.edit-employee', $superAdmin, compact('employees', 'offices', 'detailedOffices'));
    }

    public function archive()
    {
        // CURRENTLY USERNAME SESSION BY SUPERADMIN THEN VIEW ALL THE EMPLOYEES THAT HAS BEEN MOVED TO ARCHIVE, USING SOFT DELETE
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];

        return view('superadmin.archive-employee', $superAdmin);
    }

    public function viewQrCode($employee_no)
    {
        // GET THE USERNAME OF SUPERADMIN FIRST,
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        // AND GET THE LINK TOKEN AND THE ID OF EMPLOYEE, THEN PASS IT TO THE VIEW
        $employees = Employee::where('employee_no', '=', $employee_no)->first();
        // $employees = Employee::get();

        return view('superadmin.view-qrcode', $superAdmin, compact('employees'));
    }

    public function scanQrCode()
    {
        // GET THE USERNAME OF SUPERADMIN FIRST,
        // $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];
        // AND GET THE LINK TOKEN AND THE ID OF EMPLOYEE, THEN PASS IT TO THE VIEW
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];


        return view('superadmin.scan-qr-code', $superAdmin);
    }

    public function scanned(Request $request)
    {
        $superAdmin = ['superAdminUsername' => ModelsSuperAdmin::where('id', '=', session('superAdminUsername'))->first()];

        $requests = $request->qr_code;
        $employees = Employee::where('employee_no', '=', $requests)->first();
        // dd($employees);

        if ($employees == null)
        {
           return back()->with('error', "There's no record with that QR Code");
        }

        if ($requests == false)
        {
            return response()->json(['status' => 400]);
        }

        return view('superadmin.view-qrcode', $superAdmin, compact('employees'));
    }
}
