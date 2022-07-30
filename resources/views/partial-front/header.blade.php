<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- JQUERY UI --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    {{-- TAILWIND CSS --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- FONT NORMAL 100 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Employee Database</title>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    {{-- SWEETALERT V2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
</head>
<body class="overflow-auto">

{{-- LOADING EFFECT --}}
<div class="loader_bg" ></div>

{{-- NAVBAR --}}
<nav class="py-2 bg-primary drop-shadow-lg">
    <div class="px-5 mx-auto md:max-w-7xl">
        <div class="flex justify-between">
            {{-- LOGO AND NAME --}}
            <div class="flex items-center mr-2 text-2xl font-semibold text-white">
                <div>
                    <img src="{{ asset('img/Caloocan_City.png') }}" alt="" class="mr-2 space-x-3 h-14">
                </div>
                <a href="{{ route('index') }}">Employee Database</a>
            </div>
            <div class="items-center hidden md:flex">
                <a href="{{ route('search-employee') }}" class="px-3 py-2 text-xl font-semibold text-white rounded-md px-auto hover:bg-secondary">
                    Search
                </a>
                <a href="{{ route('admin.login') }}" class="px-2 py-2 text-xl font-semibold text-white rounded-md px-auto hover:bg-secondary">
                    Login
                </a>
            </div>

            {{-- TOGGLER --}}
            <div class="flex items-center text-white md:hidden">
                <button class="navbar-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    {{-- TOGGLER ELEMENT --}}
    <div class="hidden p-2 py-2 mt-3 text-lg font-semibold text-center md:hidden navbar-menu">
        <div class="hover:bg-secondary p-2 cursor-pointer">
            <a href="{{ route('search-employee') }}" class="text-white">Search</a>
        </div>
        <div class="hover:bg-secondary p-2 cursor-pointer">
            <a href="{{ route('admin.login') }}" class="text-white">Login</a>
        </div>
    </div>
</nav>
