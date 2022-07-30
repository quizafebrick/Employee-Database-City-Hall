@include('admin.partial.header')

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
        <div class="w-full p-0 py-8 mt-2 rounded-lg md:mt-20 md:p-16">
            <div class="p-10 mx-4 rounded-lg shadow-lg md:p-16 md:mx-10 bg-slate-300">
                <h3 class="text-3xl font-medium text-center text-black underline md:text-5xl ">Employee's Information</h3>
                {{-- HORIZONTAL LINE: SEPARATOR --}}
                <div class="sm:block" aria-hidden="true">
                    <div class="py-2 pb-5 mt-6">
                        <div class="border-b-2 border-slate-400"></div>
                    </div>
                </div>
                {{-- BUTTONS --}}
                <div class="flex items-center justify-center">
                    <a href="{{ route('admin.add-employee') }}" class="p-2 py-3 font-semibold text-white rounded-md font-robotoBold bg-primary hover:bg-secondary">Add Employee</a>
                </div>
                {{-- TABLE OF ALL EMPLOYEE --}}
                <livewire:admin-employee-table/>
                {{-- HORIZONTAL LINE: SEPARATOR --}}
                <div class="sm:block" aria-hidden="true">
                    <div class="py-2 mt-3">
                        <div class="border-b-2 border-slate-400"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- BACKGROUND IMAGE --}}
        {{-- <img src="{{ asset('img/chall_bg3.jpg') }}" alt="City_Hall_Logo" class="hidden object-cover max-h-screen md:flex"> --}}
    </div>
</section>


{{-- NAVBAR TOGGLE JS --}}
<script src="{{ asset('js/navbar-menu.js') }}"></script>
{{-- LOADING ANIMATION --}}
<script src="{{ asset('js/loader.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/error-message.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/success-message.js') }}"></script>
{{-- DROPDOWN --}}
<script src="{{ asset('js/dropdown-menu.js') }}"></script>

@include('admin.partial.footer')
