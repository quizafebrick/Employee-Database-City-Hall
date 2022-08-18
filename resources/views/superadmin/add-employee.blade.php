@include('superadmin.partial.header')

<main>
    <div class="relative w-full md:mx-auto">
        {{-- AT THE TOP OF BACKGROUND IMAGE --}}
        <div class="absolute top-0 left-0 w-full h-full bg-white opacity-[0.68] text-7xl"></div>

        {{-- ERROR MESSAGE --}}
        @if (session()->has('error'))
            <div class="fixed px-4 py-3 mt-1 ml-4 text-white bg-red-600 rounded-lg shadow-md text-md" id="error" role="alert" style="z-index: 99">
                <div class="flex">
                    <div class="py-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="py-1 font-bold">&nbsp; {{ session()->get('error') }}.</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="fixed px-4 py-3 mt-1 ml-4 text-white bg-red-600 rounded-lg shadow-md text-md" id="error" role="alert" style="z-index: 99; background-color:#7f1d1d">
                <div class="flex">
                    <div class="py-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="py-1 font-bold">&nbsp; Failed to Add Employee.</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- CONTAINER --}}
        <div class="flex justify-center object-cover w-full px-5 pt-5 pb-5 md:px-10">
            <div class="bg-containerColor outline outline-[2px] object-cover outline-slate-400 rounded-lg drop-shadow-2xl">
                <div class="px-10 py-4 text-right border-b-2 bg-slate-300 md:px-10 border-slate-400">
                    <h1 class="pt-5 text-4xl font-bold text-center underline font-robotoBold">Add Employee</h1>
                </div>
                {{-- ADD EMPLOYEE FORM --}}
                <form class="mt-6" id="add_employee" method="POST" action="{{ route('superadmin.save-employee') }}" autocomplete="off">
                    @csrf
                    {{-- FIRST FORM --}}
                    <div class="px-10 sm:mt-0">
                        <div class="pt-5 pb-5 md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-black">Personal Information:</h3>
                                    <p class="mt-1 text-sm text-gray-800">
                                        1. Make sure that all information are valid.
                                        <br>
                                        2. Make sure that all of it are accurate to avoid any trouble.
                                        <br>
                                        3. All required fields marked as ("<span class="text-red-600 text-md">*</span>").
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="overflow-hidden drop-shadow-xl sm:rounded-md">
                                    <div class="px-4 py-5 pb-3 bg-white rounded-t-lg sm:p-6">
                                        <div class="flex items-center justify-center col-span-3 formGroup sm:col-span-3">
                                            <label for="employee_no" class="block mt-1 font-medium text-black text-md">
                                                <span class="text-red-600 text-md">*</span> Employee No. :
                                            </label> &nbsp; &nbsp; &nbsp;
                                            <input type="text" name="employee_no" id="employee_no" class="block w-auto mt-1 text-sm font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('employee_no') }}" onkeyup="this.value = this.value.toUpperCase()">
                                        </div>
                                        <div class="flex items-center justify-center col-span-3 formGroup sm:col-span-3">
                                            <span class="block py-2 text-sm font-medium text-red-600 errorEmployeeNo2 ">@error('employee_no') {{ $message }} @enderror</span>
                                            {{-- MESSAGE VALIDATION --}}
                                            <span class="block py-2 text-sm font-medium text-red-600 errorEmployeeNo" id="errorEmployeeNo"></span>
                                            <span class="block py-2 text-sm font-medium text-green-600 successEmployeeNo" id="successEmployeeNo"></span>
                                        </div>

                                        <label for="full-name" class="block font-medium text-center text-black underline text-md">Full Name:
                                        </label>
                                        <br>
                                        {{-- 1ST COLUMN --}}
                                        <div class="grid grid-cols-9 gap-3 text-center">
                                            <div class="col-span-3 formGroup sm:col-span-3">
                                                <label for="firstname" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> First name :
                                                </label>
                                                <input type="text" name="firstname" id="firstname" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('firstname') }}" onkeyup="this.value = this.value.toUpperCase()">
                                                <span class="py-2 text-sm font-medium text-red-600 errorFirstName2 ">@error('firstname') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorFirstName" id="errorFirstName"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successFirstName" id="successFirstName"></span>
                                            </div>

                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="middlename"class="block text-sm font-medium text-black">
                                                    Middle name :
                                                </label>
                                                <input type="text" name="middlename" id="middlename" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('middlename') }}" onkeyup="this.value = this.value.toUpperCase()">
                                                {{-- ERROR MESSAGE --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorMiddleName2 ">@error('middlename') {{ $message }} @enderror</span>
                                                {{-- CHECKBOX --}}
                                                <div class="flex items-center justify-center">
                                                    <input id="checkBoxMiddlename" name="checkBoxMiddlename" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded cursor-pointer focus:ring-indigo-500" value="&mdash;">
                                                    <label for="remember-me" class="hidden ml-2 text-sm font-semibold text-red-600 font-robotoBold md:flex">
                                                        If Middle name is Not Applicable (N/A)
                                                    </label>
                                                    <label for="remember-me" class="flex ml-2 text-sm font-semibold text-red-600 font-robotoBold md:hidden">
                                                       Middlename N/A
                                                    </label>
                                                </div>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorMiddleName" id="errorMiddleName"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successMiddleName" id="successMiddleName"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="lastname" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Last name :
                                                </label>
                                                <input type="text" name="lastname" id="lastname" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('lastname') }}" onkeyup="this.value = this.value.toUpperCase()">
                                                <span class="py-2 text-sm font-medium text-red-600 errorLastName2 ">@error('lastname') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorLastName" id="errorLastName"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successLastName" id="successLastName"></span>
                                            </div>
                                        </div>
                                        <br>

                                        {{-- 2ND COLUMN --}}
                                        <div class="grid grid-cols-6 gap-3 text-center">
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="home_address" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span>Home Address :
                                                </label>
                                                <textarea type="text" name="home_address" id="home_address" class="block w-full py-3 mt-1 font-medium border-2 border-solid rounded-md shadow-sm resize-none sm:text-sm" onkeyup="this.value = this.value.toUpperCase()">{{ old('home_address') }}</textarea>
                                                <span class="py-2 text-sm font-medium text-red-600 errorHomeAddress2 ">@error('home_address') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorHomeAddress" id="errorHomeAddress"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successHomeAddress" id="successHomeAddress"></span>
                                            </div>
                                            <div class="col-span-12 pb-5 sm:col-span-3">
                                                <label for="birthday" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Birthday :
                                                </label>
                                                <input type="text" id="birthday" name="birthday" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm sm:text-sm" pattern="(\d{2})[/](\d{2})[/](\d{4})" value="{{ old('birthday') }}">
                                                <label class="py-2 text-sm font-medium text-red-600 birthdayLabel" id="birthdayLabel">Format: MM/DD/YYYY</label>
                                                <span class="py-2 text-sm font-medium text-red-600 errorBirthday2 "><br> @error('birthday') ({{ $message }}) @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorBirthday" id="errorBirthday"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successBirthday" id="successBirthday"></span>
                                            </div>
                                        </div>
                                        <br>

                                        {{-- 3RD COLUMN --}}
                                        <div class="grid grid-cols-9 gap-3 text-center">
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="contact_person"class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Contact Person :
                                                </label>
                                                <input type="text" name="contact_person" id="contact_person" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('contact_person') }}" onkeyup="this.value = this.value.toUpperCase()">
                                                <span class="py-2 text-sm font-medium text-red-600 errorContactPerson2 ">@error('contact_person') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorContactPerson" id="errorContactPerson"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successContactPerson" id="successContactPerson"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="contact_address" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Contact Address :
                                                </label>
                                                <textarea type="text" name="contact_address" id="contact_address" class="block w-full py-3 mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm resize-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onkeyup="this.value = this.value.toUpperCase()">{{ old('contact_address') }}</textarea>
                                                <span class="py-2 text-sm font-medium text-red-600 errorContactAddress2 ">@error('contact_address') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorContactAddress" id="errorContactAddress"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successContactAddress" id="successContactAddress"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="contact_no" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Contact No. :
                                                </label>
                                                <input type="text" name="contact_no" id="contact_no" class="block w-full mt-6 font-medium text-black border-2 border-solid rounded-md shadow-sm md:mt-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('contact_no') }}" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="py-2 text-sm font-medium text-red-600 errorContactNumber2 ">@error('contact_no') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorContactNumber" id="errorContactNumber"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successContactNumber" id="successContactNumber"></span>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- HORIZONTAL LINE: SEPARATOR --}}
                        <div class="sm:block" aria-hidden="true">
                            <div class="py-2">
                                <div class="border-b-2 border-slate-400"></div>
                            </div>
                        </div>

                        {{-- SECOND FORM --}}
                        <div class="pt-5 pb-2 md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-0">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-black">Other Information:</h3>
                                    <p class="mt-1 text-sm text-gray-800">
                                        1. Please double check all the fields before you sumbit.
                                        <br>
                                        2. Make sure that all of it are accurate.
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5 md:mt-0 md:col-span-2 ">
                                <div class="overflow-hidden drop-shadow-xl sm:rounded-md">
                                    <div class="px-4 py-5 pb-3 bg-white rounded-t-lg sm:p-6">
                                        {{-- 1ST COLUMN --}}
                                        <div class="grid grid-cols-9 gap-3 text-center">
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="applicant_no" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Applicant Mobile No.:
                                                </label>
                                                <input type="text" name="applicant_no" id="applicant_no" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm md:mt-0 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('applicant_no') }}" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="py-2 text-sm font-medium text-red-600 errorApplicantNumber2 ">@error('applicant_no') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorApplicantNumber" id="errorApplicantNumber"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successApplicantNumber" id="successApplicantNumber"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="position" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Position :
                                                </label>
                                                <input type="text" name="position" id="position" class="block w-full mt-6 font-medium text-black border-2 border-solid rounded-md shadow-sm md:mt-0 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('position') }}" onkeyup="this.value = this.value.toUpperCase()">
                                                <span class="py-2 text-sm font-medium text-red-600 errorPosition2 ">@error('position') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorPosition" id="errorPosition"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successPosition" id="successPosition"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="office_id" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Office :
                                                </label>
                                                <select name="office_id" id="office_id" class="block w-full mt-6 text-sm font-medium text-black border-2 border-solid rounded-md shadow-sm md:mt-0 focus:ring-indigo-500 focus:border-indigo-500" style="font-size: 14px">
                                                    <option disabled selected>-- Select Office --</option>
                                                    @foreach ($offices as $office)
                                                    <option value="{{ $office->id }}" {{(old('office_id') == $office->id)? 'selected' : ''}}>{{$office->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="py-2 text-sm font-medium text-red-600 errorOffice2 ">@error('office_id') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorOffice" id="errorOffice"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successOffice" id="successOffice"></span>
                                            </div>
                                        </div>
                                        <br>

                                        {{-- 2ND COLUMN --}}
                                        <div class="grid grid-cols-9 gap-3 text-center">
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="division" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Division :
                                                </label>
                                                <input type="text" name="division" id="division" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('division') }}" onkeyup="this.value = this.value.toUpperCase()">
                                                <span class="py-2 text-sm font-medium text-red-600 ">@error('division') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorDivision2 errorDivision" id="errorDivision"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successDivision" id="successDivision"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="gsis_no" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> GSIS No. :
                                                </label>
                                                <input type="text" name="gsis_no" id="gsis_no" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('gsis_no') }}" maxlength="12" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="py-2 text-sm font-medium text-red-600 errorGSIS2 ">@error('gsis_no') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorGSIS" id="errorGSIS"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successGSIS" id="successGSIS"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="tin_no" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> TIN :
                                                </label>
                                                <input type="text" name="tin_no" id="tin_no" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('tin_no') }}" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <label class="py-2 text-sm font-medium text-red-600 tinLabel" id="tinLabel">Format: 000-000-000-000</label>
                                                <span class="py-2 text-sm font-medium text-red-600 errorTinNum2 "><br> @error('tin_no') ({{ $message }}) @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorTinNum" id="errorTinNum"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 sucessTinNum" id="sucessTinNum"></span>
                                            </div>
                                        </div>
                                        <br>

                                        {{-- 3RD COLUMN --}}
                                        <div class="grid grid-cols-9 gap-3 pb-5 text-center">
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="philhealth" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> PhilHealth :
                                                </label>
                                                <input type="text" name="philhealth" id="philhealth" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('philhealth') }}" maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <label class="py-2 text-sm font-medium text-red-600 phLabel" id="phLabel">Format: 00-000000000-0</label>
                                                <span class="py-2 text-sm font-medium text-red-600 errorPH2 "><br> @error('philhealth') ({{ $message }}) @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorPH" id="errorPH"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successPH" id="successPH"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="blood_type" class="block text-sm font-medium text-black">
                                                    <span class="text-red-600 text-md">*</span> Blood Type :
                                                </label>
                                                <input type="text" name="blood_type" id="blood_type" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('blood_type') }}" onkeyup="this.value = this.value.toUpperCase()" oninput="this.value = this.value.replace(/[^aA, bB, oO,\-\+]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="py-2 text-sm font-medium text-red-600 errorBT2 "><br> @error('blood_type') ({{ $message }}) @enderror</span>
                                                <label class="py-2 text-sm font-medium text-red-600 bloodTypeLabel" id="bloodTypeLabel">(Optional)</label>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorBT" id="errorBT"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successBT" id="successBT"></span>
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="detailed_office_id" class="block font-medium text-black lg:text-sm md:text-sm text-[13px]">
                                                    <span class="text-red-600 text-md">*</span> Detailed Office:
                                                </label>
                                                <select name="detailed_office_id" id="detailed_office_id" class="block w-full mt-1 font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" style="font-size: 14px">
                                                    <option disabled selected>-- Select Detailed Office --</option>
                                                    @foreach ($detailedOffices as $detailedOffice)
                                                        <option value="{{ $detailedOffice->id }}" {{(old('detailed_office_id') == $detailedOffice->id)? 'selected' : ''}}>{{ $detailedOffice->name }}</option>
                                                     @endforeach
                                                </select>
                                                <span class="py-2 text-sm font-medium text-red-600 errorDO2 ">@error('detailed_office_id') {{ $message }} @enderror</span>
                                                {{-- MESSAGE VALIDATION --}}
                                                <span class="py-2 text-sm font-medium text-red-600 errorDO" id="errorDO"></span>
                                                <span class="py-2 text-sm font-medium text-green-600 successDO" id="successDO"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- SUBMIT --}}
                    <input type="hidden" class="emp_token">
                    <input type="hidden" class="link_token">
                    <div class="px-10 py-1 mt-5 text-right border-t-2 bg-slate-300 md:px-10 border-slate-400">
                        <button type="submit" name="submit" id="submit" class="justify-center px-5 py-2 mt-2 mb-2 font-medium text-center text-white rounded-md shadow-sm text-md bg-secondary hover:bg-hovered" style="cursor: pointer">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- BACKGROUND IMAGE --}}
        {{-- <img src="{{ asset('img/chall_bg7.jpg') }}" alt="City_Hall_Logo" class="hidden object-cover max-h-screen md:flex max-w-screen" width="100%"> --}}
        {{-- <img src="{{ asset('img/chall_bg9.jpg') }}" alt="City_Hall_Logo" class="object-cover max-h-screen hhidden md:flex max-w-screen" width="100%"> --}}
    </div>
</main>

{{-- =========== SCRIPT FOR JAVASCRIPT/JQUERY VALIDATIONS, ERRORS & DROPDOWN/MENU =========== --}}
{{-- NAVBAR TOGGLE --}}
<script type="text/javascript" src="{{ asset('js/navbar-menu.js') }}"></script>
{{-- LOADER --}}
<script src="{{ asset('js/loader.js') }}"></script>
{{-- DATEPICKER --}}
<script src="{{ asset('js/datepicker.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/success-message.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/error-message.js') }}"></script>
{{-- EMPLOYEE REGEX VALIDATION --}}
<script src="{{ asset('js/employee-regex.js') }}"></script>
<script src="{{ asset('js/employeeNum-regex.js') }}"></script>
{{-- CHEKBOX AUTO DASH IF N/A --}}
<script src="{{ asset('js/checkBox-middlename.js') }}"></script>
{{-- PREVENT DOUBLE SPACE --}}
<script src="{{ asset('js/prevent-double-space.js') }}"></script>
{{-- PREVENT SPACES --}}
<script src="{{ asset('js/prevent-space.js') }}"></script>
{{-- AUTO DASH WHEN TYPING THE PHILHEALTH. AND TIN --}}
<script src="{{ asset('js/auto-dash.js') }}"></script>
{{-- DROPDOWN --}}
<script src="{{ asset('js/dropdown-menu.js') }}"></script>

@include('superadmin.partial.footer')
