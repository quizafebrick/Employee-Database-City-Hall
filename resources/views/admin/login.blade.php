@include('partial-front.header')

<section>
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
    <div class="relative flex items-center justify-center ">
        {{-- AT THE TOP OF BACKGROUND IMAGE --}}
        <div class="absolute top-0 left-0 w-full h-full bg-black text-7xl opacity-90"></div>

        <div class="container absolute h-full px-10 py-0 mx-14">
            <div class="flex flex-wrap items-center justify-center h-full mx-10 text-gray-800 g-6">
                <div class="mb-0 md:w-8/12 lg:w-6/12 ">
                    <img src="{{ asset('img/Caloocan_City.png') }}" alt="">
                </div>
                <div class="mx-auto md:w-8/12 lg:w-5/12 lg:ml-20">
                    <form action="{{ route('admin.check') }}" method="POST">
                        @csrf
                        <div class="mb-5 text-center text-white font-robotoBold text-7xl">Login</div>
                        <!-- EMAIL INPUT -->
                        <div class="mb-6">
                            <input type="text" name="username" class="block w-full px-4 py-2 m-0 text-xl font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Email address" value="{{ old('username') }}">
                            <span class="py-2 font-medium text-red-600 text-md ">@error('username') {{ $message }} @enderror</span>
                        </div>

                        <!-- PASSWORD INPUT -->
                        <div class="mb-6">
                            <input type="password" name="password" class="block w-full px-4 py-2 m-0 text-xl font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Password" value="{{ old('password') }}">
                            <span class="py-2 font-medium text-red-600 text-md ">@error('password') {{ $message }} @enderror</span>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <button name="submit" id="submit"class="justify-center inline-block w-full px-5 py-2 mt-2 mb-2 text-lg font-medium text-center text-white duration-200 ease-in-out rounded-md shadow-sm text-md bg-secondary hover:bg-hovered" style="cursor: pointer">Login</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- BACKGROUND IMAGE --}}
        <img src="{{ asset('img/chall_bg3.jpg') }}" alt="City_Hall_Logo" class="object-cover max-h-screen min-h-screen">
    </div>
</section>


{{-- NAVBAR TOGGLE JS --}}
<script src="{{ asset('js/navbar-menu.js') }}"></script>
{{-- LOADING ANIMATION --}}
<script src="{{ asset('js/loader.js') }}"></script>
{{-- MESSAGE ANIMATED --}}
<script src="{{ asset('js/error-message.js') }}"></script>

@include('partial-front.footer')
