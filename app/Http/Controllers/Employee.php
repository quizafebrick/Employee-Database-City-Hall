<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Support\Str;
use App\Models\DetailedOffice;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Employee as ModelEmployee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\EmployeeFormValidation;
use App\Http\Requests\SearchEmployeeRequest;

class Employee extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // VIEW AND GET THE LIST OF OFFICE AND DETAILED OFFICE TABLE
        // ===================================================================================== //
        // GET THE OFFICE & DETAILED OFFICE TABLE AND FETCH ALL THE NAME(FIELD) OF EACH RESPECTED TABLE
        $offices = Office::orderBy('name', 'asc')->get();
        $detailedOffices = DetailedOffice::orderBy('name', 'asc')->get();

        return view('create.add-employee', compact('offices', 'detailedOffices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormValidation $request, ModelEmployee $employees)
    {
        // SAVE & REDIRECT TO CREATE VIEW
        // =============================================================================== //
        // ALREADY VALIDATED AT EmployeeFormValidation
        $requests = $request->validated();

        // THIS WILL SAVE A RANDOMIZED ALPHANUMERIC WITHOUT THE USERS INPUT
        // =============================================================================== //
        // AFTER, IT WILL SAVE
        // IF MIDDLENAME IS NOT N/A(CHECKING THE CHECKBOX) CREATE EMPLOYEE, ELSE RETURNS NULL OR EMPTY ON DATABASE
        if (!$requests['middlename'] == "—")
        {
            Employee::create($requests);

            return back()->route('create.add-employee')->with('error', 'Failed to Add Employee');
        }
        $requests['emp_token'] = Str::random(25);
        $requests['link_token'] = Str::random(50);
        $requests['middlename'] = "";

        // ELSE, MIDDLENAME IS NOT EMPTY OR NOT EQUAL TO "—"
        // THEN SAVE
        $save = $employees->create($requests);

        // IF FAILED TO SAVE RETURN BACK TO THE FORM
        if (!$save)
        {
            return back()->route('create.add-employee')->with('error', 'Failed to Add Employee');
        }
        // ELSE, SUCCESSFULLY ADDED.
        $request->session()->put('employeeToken', $save->emp_token);
        $request->session()->put('linkToken', $save->link_token);
        // THIS WILL MAKE A DYNAMIC ADDRESS, AND THIS WILL TAKE ONLY FOR ABOUT 1 MINUTE
        // =============================================================================== //
        // NOTE: ADD VALIDATESIGNATURE CLASS IN THE KERNEL TO MAKE THIS CODE WORK
        $temporaryAddress = URL::temporarySignedRoute('create.code-employee', now()->addMinute(1), ['linkToken' => $save->link_token]);

        // AND REDIRECT TO THE LINK WITH THE TEMPORARY ADDRESS WITH A MESSAGE
        return redirect($temporaryAddress)->with('success', 'Added Successfully!');
    }

    // SHOW THE TOKEN; VALID ONLY FOR 1 MINUTE
    public function codeView()
    {
        // THIS PAGE WILL LOAD AFTER THE USER SUBMITTED THE FORM
        // =============================================================================== //
        // IT WILL GIVE YOU 1 MINUTE, AFTER THAT, THE PAGE WILL LOAD (403)
        // $linkToken = ['linkToken' => ModelEmployee::where('link_token', '=', session('linkToken'))->first()];
        $employeeToken = ['employeeToken' => ModelEmployee::where('emp_token', '=', session('employeeToken'))->first()];

        return view('create.code-employee', $employeeToken);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // GET THE EMPLOYEE TOKEN TO THE codeView FUNCTION
    public function show($employeeToken)
    {
        // LOAD ALL THE INFORMATION THE SPECIFIC EMPLOYEE WITH THEIR RANDOMIZED TOKEN
        // =============================================================================== //
        // TO GET THE VALUE OF ID OF THE OFFICE_ID & DETAILED OFFICE (FOREIGN KEYS), GO TO THE MODEL
        $employees = ModelEmployee::where('emp_token', '=', $employeeToken)->first();

        return view('create.view-employee', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelEmployee $employees, $linkToken, $id)
    {
        // MODEL BINDING $EMPLOYEES OBJECT
        $employees->find($linkToken, $id);
        $offices = Office::get();
        $detailedOffices = DetailedOffice::get();

        return view('superadmin.edit-employee', compact('employees', 'offices', 'detailedOffices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, ModelEmployee $employees, $linkToken, $id)
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

        return redirect()->route('superadmin.index')->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // NOTE: THIS WILL NOT DELETE PERMANENTLY SINCE THE MODEL USES SOFT DELETES. TO SEE IT VIEW THE MODEL(EMPLOYEE).
        // IT WILL SAVE TIMESTAMPS AT DELETED_AT COLUMN(EMPLOYEE) IN THE DATABASE
        // FIND THE ID FIRST AND THEN DELETE
        $employee = ModelEmployee::findOrFail($id);
        $employee->delete();

        return redirect()->route('superadmin.index')->with('success', "Remove Successfull! It moves to Archive.");
    }

    public function restore($id)
    {
        // FIND THE ID FIRST AND THEN RESTORE SINCE IT HASN'T DELETED PERMANENTLY BY USING SOFT DELETE
        $employee = ModelEmployee::onlyTrashed()->findorFail($id);
        $employee->restore();

        return redirect()->route('superadmin.index')->with('success', "Restore Successfully!");
    }

    public function forceDelete($id)
    {
        // NOW THIS WILL DELETE PERMANENTLY BY USING FORCE DELETE
        $employee = ModelEmployee::onlyTrashed()->findorFail($id);
        $employee->forceDelete();

        return redirect()->route('superadmin.index')->with('success', "Deleted Forever Successfull!");
    }

    public function viewSearch()
    {
        return view('create.search-employee');
    }

    public function searched(SearchEmployeeRequest $request, ModelEmployee $employee)
    {
        // ALREADY VALIDATED AT SearchEmployeeRequest
        $requests = $request->validated();

        // IF NOT EMPTY THE INPUT FIELD(MIDDLENAME), FIND THE VALUE OF FNAME, MNAME, LNAME & BIRTHDAY
        if (!empty($request['middlename']))
        {
            // GRAB THE EMPLOYEE NO.(AT 'first()') OF THE SEARCHING EMPLOYEE TO PASS IT IN THE PARAMETER "emp_num" FOR DISPLAYING PURPOSES
            $search = $employee->where('firstname', '=', $requests['firstname'])
                            ->where('middlename', '=', $requests['middlename'])
                            ->where('lastname', '=', $requests['lastname'])
                            ->where('birthday', '=', $requests['birthday'])
                            ->first(['employee_no']);

            // IF NOT EXISTS THE FOUR OR ONE OF THEM(FNAME, MNAME, LNAME & BIRTHDAY)
            // IT RETURN FALSE TO THE AJAX FUNCTION(TO SEE THAT GO TO THE SEARCH-EMPLOYEE BLADE)
            if (!$search)
            {
                return response()->json(array("exists" => false));
            }

            // THEN RETURN TRUE IF EXISTING AND PASS THE PARAMETER "emp_num" TO THE AJAX FUNCTION
            // THEN DISPLAY THE RESPECTED EMPLOYEE NUMBER BASED ON THE SEARCHING FUNCTION
            return response()->json(array("exists" => true, "emp_num" => $search['employee_no']));
        }
        // ELSE, IF THE MIDDLENAME IS EMPTY SINCE IT IS NULLABLE IN THE REQUEST
        // FIND THE VALUE OF INPUT FIELD AGAIN(FNAME, LNAME & BIRTHDAY) EXCLUDED THE MNAME
        // THESE ARE THE REQUIRED FIELDS
        // GRAB THE EMPLOYEE NO.(AT 'first()') OF THE SEARCHING EMPLOYEE TO PASS IT IN THE PARAMETER "emp_num" FOR DISPLAYING PURPOSES
        $search = $employee->where('firstname', '=', $requests['firstname'])
                        ->where('lastname', '=', $requests['lastname'])
                        ->where('birthday', '=',  $requests['birthday'])
                        ->first(['employee_no']);

        // IF NOT EXISTS THE THREE OR ONE OF THEM(FNAME, LNAME & BIRTHDAY)
        // IT RETURN FALSE TO THE AJAX FUNCTION(TO SEE THAT GO TO THE SEARCH-EMPLOYEE BLADE)
        if (!$search)
        {
            return response()->json(array("exists" => false));
        }
        // THEN RETURN TRUE IF EXISTING AND PASS THE PARAMETER "emp_num" TO THE AJAX FUNCTION
        // THEN DISPLAY THE RESPECTED EMPLOYEE NUMBER BASED ON THE SEARCHING FUNCTION
        return response()->json(array("exists" => true, "emp_num" => $search['employee_no']));
    }
}
