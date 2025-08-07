<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col">
            <div class="flex flex-col flex-grow bg-white border-r border-gray-200">

                <!-- Logo Section -->
                <div class="flex items-center px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <!-- Replace with actual SVG icon -->
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-5 7 5V5H5z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-semibold text-gray-900">Bookmark Manager</h1>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-4 space-y-1">
                    <!-- Bookmarks -->
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'bg-blue-50 border-r-2 border-blue-600 text-blue-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-sm font-medium rounded-l-md">
                        <!-- Bookmark icon -->
                        <svg class="{{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-400' }} mr-3 h-5 w-5" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-5 7 5V5H5z" />
                        </svg>
                        Bookmarks
                    </a>
                    
                    <!-- Folders -->
                    <a href="{{ route('dashboard.folder') }}"
                        class="{{ request()->routeIs('dashboard.folder') ? 'bg-blue-50 border-r-2 border-blue-600 text-blue-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-2 py-2 text-sm font-medium rounded-l-md">
                        <!-- Folder icon -->
                        <svg class="{{ request()->routeIs('dashboard.folder') ? 'text-blue-500' : 'text-gray-400' }} mr-3 h-5 w-5"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2 2h10v10H3z" />
                        </svg>
                        Folders
                    </a>

                    <!-- Tags -->
                    <a href="{{ route('dashboard.tag') }}"
                        class="text-gray-700 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Tag icon -->
                        <svg class="text-gray-400 mr-3 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 7h.01M3 11l7-7 11 11-7 7L3 11z" />
                        </svg>
                        Tags
                    </a>

                    <!-- Settings -->
                    <div class="pt-4">
                        <a href="/settings"
                            class="text-gray-700 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Settings icon -->
                            <svg class="text-gray-400 mr-3 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Settings
                        </a>
                    </div>
                </nav>


                <!-- User Profile Section - Bottom of Sidebar -->
                <div class="relative border-t border-gray-200 p-4" x-data="{ open: false }">
                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute bottom-16 left-1/2 -translate-x-1/2 w-56 bg-white border border-gray-200 rounded-xl shadow-lg z-50 transform"
                        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
                        <a href="#"
                            class="flex items-center gap-3 px-5 py-3 text-gray-900 hover:bg-gray-50 rounded-t-xl transition-colors font-medium text-base">
                            <!-- User icon (Heroicons outline) -->
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zm-11.25 9a6.75 6.75 0 0113.5 0v.75A2.25 2.25 0 0115.75 19.5h-7.5A2.25 2.25 0 016 17.25v-.75z" />
                            </svg>
                            View Profile
                        </a>
                        <div class="border-t border-gray-200"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-3 px-5 py-3 text-gray-900 hover:bg-gray-50 rounded-b-xl transition-colors font-medium text-base w-full text-left">
                                <!-- Logout icon (Heroicons outline) -->
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                                </svg>
                                Logout
                            </button>
                        </form>                        
                    </div>
                
                    <!-- Trigger Button -->
                    <button type="button" @click="open = !open"
                        class="flex items-center space-x-3 w-full hover:bg-gray-50 rounded-lg px-2 py-2 transition-colors"
                        :aria-expanded="open">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User Avatar" />
                        <div class="flex-1 text-left">
                            <p class="text-base font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <!-- ChevronDown Icon (Heroicons) -->
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu button - would need JS to toggle -->
        <div class="lg:hidden fixed top-4 left-4 z-50">
            <button class="bg-white p-2 rounded-md shadow-md border border-gray-200">
                <!-- Hamburger/Menu icon -->
                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        {{-- Toast Messages - Fixed to top right --}}
        <x-flash-notification/>
        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Header --}}
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <x-page-title />
                    </div>
                </div>
            </header>

            {{-- Main Content Area --}}
            <main class="flex-1 overflow-y-auto bg-gray-50">
                @yield('main-content')
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>