@include('../partial-front/header')

<main class="overscroll-auto ">
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
        <div class="absolute flex justify-center object-cover w-full px-10 mt-6 pb-5 md:px-10">
            <div class="bg-containerColor outline outline-[2px] object-cover outline-slate-400 rounded-lg drop-shadow-2xl">
                <div class="px-10 py-4 text-right border-b-2 bg-slate-300 md:px-10 border-slate-400">
                    <h1 class="pt-5 text-4xl font-bold text-center text-green-600 underline font-robotoBold">Employee's Information has been Added!</h1>
                </div>
                <div class="px-10 py-5">
                    <p class="text-lg font-semibold text-center text-black font-robotoBold">To view all the information, kindly click this token. So that it will redirect you on that page</p> <br>
                    <p class="text-lg font-semibold text-center text-black font-robotoBold">Your link is:
                        {{-- TO PASS THE EMPLOYEE TOKEN TO THE LINK GET THE (employeeToken) --}}
                        {{-- =========================================================================== --}}
                        {{-- THE LINK IS VALID FOR 15 MINUTES, FOR THE USERS WANTED TO CHECK THE INFORMATION --}}
                        <a href="{{ URL::temporarySignedRoute('create.view-employee', now()->addMinutes(15), ['employeeToken' => $employeeToken->emp_token]) }}" class="font-bold text-blue-600 hover:text-blue-900">
                            {{ $employeeToken->emp_token }}
                        </a>
                    </p>
                </div>
                <div class="px-10 py-5">
                    <p class="text-lg font-semibold text-center text-red-600 font-robotoBold">
                        <span class="font-bold">NOTE:</span>
                    </p>
                    <p class="text-lg font-semibold text-center text-red-600 font-robotoBold">
                        &bull; This page is valid for only 1 minute, please click your token to see all informations. <br>
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
