@include('../partial-front/header')

<main class="overscroll-auto">
    <div class="relative w-full md:mx-auto">
        {{-- AT THE TOP OF BACKGROUND IMAGE --}}
        <div class="absolute top-0 left-0 w-full h-full bg-white opacity-[0.68] text-7xl"></div>
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

        {{-- CONTAINER --}}
        <div class="absolute flex justify-center object-cover w-full px-10 mt-6 md:px-10">
            <div class="bg-containerColor outline outline-[2px] object-cover outline-slate-400 rounded-lg drop-shadow-2xl">
                <div class="px-10 py-4 text-right border-b-2 bg-slate-300 md:px-10 border-slate-400">
                    <h1 class="pt-5 text-4xl font-bold text-center text-black underline font-robotoBold">Employee's Information</h1>
                </div>
                <div class="px-10 py-5">
                    {{-- FETCH ALL THE INFORMATION OF THE EMPLOYEE --}}
                    <p class="text-lg font-semibold text-center text-black font-robotoBold">
                        Full Name: &nbsp; <span class="font-bold">{{ $employees->firstname }} {{ $employees->middlename }} {{ $employees->lastname }}</span> <br>
                        Home Address: &nbsp; <span class="font-bold">{{ $employees->home_address }}</span> <br>
                        Birthday: &nbsp; <span class="font-bold">{{ $employees->birthday }}</span> <br>
                        Contact Person: &nbsp; <span class="font-bold">{{ $employees->contact_person }}</span> <br>
                        Contact Address: &nbsp; <span class="font-bold">{{ $employees->contact_address }} </span> <br>
                        Contact No. : &nbsp; <span class="font-bold">{{ $employees->contact_no }}</span> <br>
                        Applicant No. : &nbsp; <span class="font-bold">{{ $employees->applicant_no }}</span> <br>
                        Position: &nbsp; <span class="font-bold">{{ $employees->position }}</span> <br>
                        Office: &nbsp; <span class="font-bold">{{ $employees->office->name }}</span> <br>
                        Division: &nbsp; <span class="font-bold">{{ $employees->division }}</span> <br>
                        GSIS No. : &nbsp; <span class="font-bold">{{ $employees->gsis_no }}</span> <br>
                        Tin No. : &nbsp; <span class="font-bold">{{ $employees->tin_no }}</span> <br>
                        PhilHealth: &nbsp; <span class="font-bold">{{ $employees->philhealth }}</span> <br>
                        Blood Type (Optional): &nbsp; <span class="font-bold">{{ $employees->blood_type }}</span> <br>
                        Detailed Office: &nbsp; <span class="font-bold">{{ $employees->detailed_office->name }}</span> <br>
                    </p>
                </div>
            </div>
        </div>

        {{-- BACKGROUND IMAGE --}}
        <img src="{{ asset('img/chall_bg7.jpg') }}" alt="City_Hall_Logo" class="hidden object-cover max-h-screen md:flex max-w-screen" width="100%">
    </div>
</main>

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

@include('../partial-front/footer')
