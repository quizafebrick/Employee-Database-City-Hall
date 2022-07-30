<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Database</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- JQUERY UI --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    {{-- TAILWIND CSS --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- FONT NORMAL 100 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    @livewireStyles
    @powerGridStyles
</head>

<body class="bg-slate-200">

    {{-- LOADING EFFECT --}}
    <div class="loader_bg"></div>

    {{-- NAVBAR --}}
    <nav class="static py-2 bg-primary drop-shadow-lg">
        <div class="px-5 mx-auto md:max-w-7xl">
            <div class="flex justify-between">
                {{-- LOGO AND NAME --}}
                <div class="flex items-center mr-2 text-2xl font-semibold text-white">
                    <div>
                        <img src="{{ asset('img/Caloocan_City.png') }}" alt="" class="mr-2 space-x-3 h-14">
                    </div>
                    <a href="{{ route('superadmin.index') }}">Employee Database</a>
                </div>
                <div class="items-center hidden md:flex">
                    <button class="px-2 py-2 text-xl font-semibold text-white rounded bg-primary hasSubMenu">
                        {{ $superAdminUsername['username'] }}
                        <span class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <div class="relative mt-2">
                            <ul class="hidden text-sm text-white bg-primary subMenu">
                                <li><a href="{{ route('superadmin.logout') }}" class="block py-0 ml-3 rounded hover:bg-secondary">Logout</a></li>
                            </ul>
                        </div>
                    </button>
                </div>

                {{-- TOGGLER --}}
                <div class="flex items-center text-white md:hidden">
                    <button class="navbar-menu-button">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        {{-- TOGGLER ELEMENT --}}
        <div class="hidden p-2 py-2 mt-3 text-lg font-semibold text-center md:hidden hover:bg-secondary navbar-menu">
            <a href="{{ route('superadmin.logout') }}" class="text-white">Logout</a>
        </div>
    </nav>

