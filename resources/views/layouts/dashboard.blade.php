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
                    <!-- All Bookmarks -->
                    <a href="{{ route('dashboard') }}"
                        class="bg-blue-50 border-r-2 border-blue-600 text-blue-700 group flex items-center px-2 py-2 text-sm font-medium rounded-l-md">
                        <!-- Bookmark icon -->
                        <svg class="text-blue-500 mr-3 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-5 7 5V5H5z" />
                        </svg>
                        All Bookmarks
                    </a>

                    <!-- Folders -->
                    <a href="{{ route('dashboard.folder') }}"
                        class="text-gray-700 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Folder icon -->
                        <svg class="text-gray-400 mr-3 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2 2h10v10H3z" />
                        </svg>
                        Folders
                    </a>

                    <!-- Tags -->
                    <a href="/tags"
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

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Header --}}
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">

                        <div classN="flex items-center">
                            <h1 class="text-2xl font-semibold text-gray-900">All Bookmarks</h1>
                        </div>

                        <!-- User Dropdown Menu with Alpine.js (proper positioning) -->
                        <div class="flex items-center space-x-3 relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false"
                                class="flex items-center space-x-2 hover:bg-gray-50 rounded-lg px-3 py-2 transition-colors focus:outline-none">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="User Avatar" />
                                <span class="text-sm font-medium text-gray-700 hidden sm:block">{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown menu aligned to bottom-right of avatar -->
                            <div x-show="open" x-transition
                                class="absolute right-0 top-full mt-2 w-56 bg-white border border-gray-200 rounded-md shadow-lg z-50"
                                style="display: none;">
                                <a href="/profile"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <!-- User icon -->
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.121 17.804A7.5 7.5 0 0112 15a7.5 7.5 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    View Profile
                                </a>
                                <hr class="border-gray-200 my-1" />
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 w-full text-left">
                                        <!-- Log out icon -->
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            {{-- Main Content Area --}}
            <main class="flex-1 overflow-y-auto bg-gray-50">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>