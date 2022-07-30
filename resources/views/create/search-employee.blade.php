@include('partial-front.header')

<section>
    {{-- SUCCESS MESSAGE --}}
    @if (session()->has('success'))
        <div class="fixed px-4 py-3 mt-1 ml-4 text-white bg-green-600 border-t-4 shadow-md text-md rounded-xl" id="success" role="alert" style="z-index: 99">
            <div class="flex">
                <div class="py-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="py-1 font-bold">&nbsp; {{ session()->get('success') }}</p>
                </div>
            </div>
        </div>
    @endif
    {{-- ERROR MESSAGE --}}
    @if (session()->has('error'))
    <div class="fixed px-4 py-3 mt-1 ml-4 text-white bg-red-600 border-t-4 shadow-md text-md rounded-xl" id="error" role="alert" style="z-index: 99">
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
        <div class="w-full p-0 py-8 mt-2 rounded-lg md:mt-20 md:p-10">
            <div class="p-10 mx-4 rounded-lg shadow-lg md:p-16 md:mx-14 bg-slate-300">
                <h3 class="text-3xl font-medium text-center text-black underline md:text-5xl ">Employee's Information</h3>
                {{-- HORIZONTAL LINE: SEPARATOR --}}
                <div class="sm:block" aria-hidden="true">
                    <div class="py-2 pb-5 mt-6">
                        <div class="border-b-2 border-slate-400"></div>
                    </div>
                </div>
                <form id="searchForm" onsubmit="onSubmits(event)">
                    <div class="flex items-center justify-center">
                        <h2 class="text-md font-bold text-black">
                            Required fields are marked "<span class="text-red-600 text-md">*</span>".
                        </h2> <br><br>
                    </div><br>
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-8 sm:col-span-1 text-center">
                            <label for="firstname" class="text-sm font-medium text-black">
                                <span class="text-red-600 text-md ">*</span> First name :
                            </label>
                            <input type="text" name="firstname" id="firstname" class="py-1 block w-full font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('firstname') }}" onkeyup="this.value = this.value.toUpperCase()">
                            <span class="py-1 text-sm font-medium text-red-600 errorFirstName2 ">@error('firstname') {{ $message }} @enderror</span>
                            {{-- MESSAGE VALIDATION --}}
                            <span class="py-1 text-sm font-medium text-red-600 errorFirstName" id="errorFirstName"></span>
                            <span class="py-1 text-sm font-medium text-green-600 successFirstName" id="successFirstName"></span>
                        </div>
                        <div class="col-span-8 sm:col-span-1 text-center">
                            <label for="middlename"class="block text-sm font-medium text-black">
                                Middle name :
                            </label>
                            <input type="text" name="middlename" id="middlename" class="mt-1 py-1 block w-full font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('middlename') }}" onkeyup="this.value = this.value.toUpperCase()">
                            <span class="py-1 text-sm font-medium text-red-600 errorFirstName2 ">@error('middlename') {{ $message }} @enderror</span>
                            {{-- ERROR MESSAGE --}}
                            <span class="text-sm font-medium text-red-600 errorMiddleName2 ">@error('middlename') {{ $message }} @enderror</span>
                            {{-- CHECKBOX --}}
                            {{-- MESSAGE VALIDATION --}}
                            <span class="mt-1 text-sm font-medium text-red-600 errorMiddleName" id="errorMiddleName"></span>
                            <span class="text-sm font-medium text-green-600 successMiddleName" id="successMiddleName"></span>
                        </div>
                        <div class="col-span-8 sm:col-span-1 text-center">
                            <label for="lastname" class="block text-sm font-medium text-black">
                                <span class="text-red-600 text-md">*</span> Last name :
                            </label>
                            <input type="text" name="lastname" id="lastname" class="mt-1 py-1 block w-full font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('lastname') }}" onkeyup="this.value = this.value.toUpperCase()">
                            <span class="py-1 text-sm font-medium text-red-600 errorLastName2 ">@error('lastname') {{ $message }} @enderror</span>
                            {{-- MESSAGE VALIDATION --}}
                            <span class="py-1 text-sm font-medium text-red-600 errorLastName" id="errorLastName"></span>
                            <span class="py-1 text-sm font-medium text-green-600 successLastName" id="successLastName"></span>
                        </div>
                        <div class="col-span-8 sm:col-span-1 text-center">
                            <label for="birthday" class="block text-sm font-medium text-black">
                                <span class="text-red-600 text-md">*</span> Birthday :
                            </label>
                            <input type="text" name="birthday" id="birthday" class="mt-1 py-1 block w-full font-medium text-black border-2 border-solid rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('birthday') }}" placeholder="MM/DD/YYYY">
                            <span class="py-1 text-sm font-medium text-red-600 errorBirthday2 ">@error('birthday') {{ $message }} @enderror</span>
                            {{-- MESSAGE VALIDATION --}}
                            <span class="py-1 text-sm font-medium text-red-600 errorLastName" id="errorBirthday"></span>
                            <span class="py-1 text-sm font-medium text-green-600 successLastName" id="successBirthday"></span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-5">
                        <button type="submit" name="search" id="search" class="justify-center px-5 py-4 mt-2 mb-2 font-medium text-center text-white rounded-md shadow-sm text-lg bg-secondary hover:bg-hovered" style="cursor: pointer">Search Employee</button>
                    </div>
                </form>
                {{-- HORIZONTAL LINE: SEPARATOR --}}
                <div class="sm:block" aria-hidden="true">
                    <div class="py-2 mt-3">
                        <div class="border-b-2 border-slate-400"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- BACKGROUND IMAGE --}}
        {{-- <img src="{{ asset('img/chall_bg10.jpg') }}" alt="City_Hall_Logo" class="hidden object-cover w-full max-h-fit md:flex"> --}}
</section>


{{-- NAVBAR TOGGLE JS --}}
<script src="{{ asset('js/navbar-menu.js') }}"></script>
{{-- LOADING ANIMATION --}}
<script src="{{ asset('js/loader.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/error-message.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/success-message.js') }}"></script>
{{-- EMPLOYEE REGEX VALIDATION --}}
{{-- <script src="{{ asset('js/employee-regex.js') }}"></script> --}}
{{-- BIRTHDAY FORMAT --}}
<script src="{{ asset('js/birthday-format.js') }}"></script>


<script>
    // PREVENT DEFAULT(RELOADING PAGE)
    var form = document.getElementById('searchForm');
    form.addEventListener("submit", onSubmits);
    function onSubmits(event) {
        event.preventDefault();
    }

    // SEARCH EMPLOYEE FUNCTION
    $('#search').on('click',function(){
        $.ajax({
            // NEED TO GET CSRF TOKEN IF THE METHOD IS POST
            // THEN PLACE THIS '<meta name="csrf-token" content="{{ csrf_token() }}">' IN THE HEADER TO AVOID MISMATCHING TOKEN ERROR
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'POST',
            url : "{{ route('searched-employee') }}",
            data : {
                firstname : $('#firstname').val(),
                middlename : $('#middlename').val(),
                lastname : $('#lastname').val(),
                birthday : $('#birthday').val(),
                employee_no : $('#employee_no').val(),
            },
            success: function (data) {
                // IF NOT EXISTS THE DATA INSIDE THE INPUT FIELDS(ALL VALUES INSIDE THE DATA) POP UP ERROR SWEET ALERT
                // THEN GET THE VARIABLE "exists" PASSING IN THE "return response()->json()" ARRAY
                if (!data.exists)
                {
                    // GETTING THE USER'S INPUT AND PLACED IT INSIDE THE SWEET ALERT LIBRARY
                    // SPACING BETWEEN FIELDS (' ')
                    var fullName =  $('#firstname').val() + ' ' + $('#middlename').val() + ' ' + $('#lastname').val();
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'No Record Found.',
                        text:  'Employee Name:' + ' ' + fullName,
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
                else
                {
                    // GETTING THE USER'S INPUT AND PLACED IT INSIDE THE SWEET ALERT LIBRARY
                    // SPACING BETWEEN FIELDS (' ')
                    // THEN GET THE PARAMETER "emp_num" PASSES FROM THE CONTROLLER(EMPLOYEE) IF IT EXISTS, THEN PLACED IT TO THE SUCCESS SWEET ALERT POP UP
                    // TO GET THE PARAMETER, USE THE VARIABLE "data" USES IN THE SUCCESS FUNCTION THEN GET THE VARIABLE "emp_num" PASSING IN THE "return response()->json()" ARRAY
                    // TO SEE THE VARIABLEN, GO BACK TO THE EMPLOYEE CONTROLLER(searched function)
                    var fullName =  $('#firstname').val() + ' ' + $('#middlename').val() + ' ' + $('#lastname').val();
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Verified Employee!',
                        text:  'Employee No | Employee Name:' + ' ' + data.emp_num + ' ' + '—' + ' ' + fullName,
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    text:  'Please make an input to the required fields.',
                    showConfirmButton: false,
                    timer: 4000
                });
            }
        });
        // $('#searchForm').preventDefault()
    });

    // // DATATABLE
    // $(document).ready(function() {
    //     $('#myTable').DataTable({
    //         paging: false,
    //         searching: false,
    //         info: false
    //     });
    // } );
</script>

@include('partial-front.footer')
