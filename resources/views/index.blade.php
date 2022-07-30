@include('partial-front.header')

    {{-- MAIN --}}
    <main class="content">
        <div class="relative w-full md:mx-auto">
            {{-- AT THE TOP OF BACKGROUND IMAGE --}}
            <div class="absolute top-0 left-0 w-full h-full bg-black text-7xl opacity-90"></div>
            <div class="absolute top-0 left-0 justify-center w-full h-full pt-64 text-4xl font-semibold text-center text-white md:flex md:pt-64 md:justify-center md:text-6xl lg:text-7xl">
                <div class="text-white brightness-100 font-robotoBold">Welcome to <span class="italic font-roboThin">Employee Database</span></div>
            </div>
            <div class="absolute top-0 left-0 flex w-full text-lg md:justify-center pt-96 md:pt-96">
                <a href="{{ route('create.add-employee') }}" class="h-20 p-6 m-auto text-xl font-bold text-center rounded-md hover:shadow-lg md:p-5 w-60 bg-secondary md:text-2xl hover:bg-hovered hover:shadow-secondary drop-shadow-xl">ADD EMPLOYEE</a>
            </div>
            {{-- BACKGROUND IMAGE --}}
            <img src="{{ asset('img/chall_bg3.jpg') }}" alt="City_Hall_Logo" class="object-cover max-h-screen min-h-screen">
        </div>
    </main>

{{-- NAVBAR TOGGLE JS --}}
<script src="{{ asset('js/navbar-menu.js') }}"></script>
{{-- LOADING ANIMATION --}}
<script src="{{ asset('js/loader.js') }}"></script>

@include('partial-front.footer')
