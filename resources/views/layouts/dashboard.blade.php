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
                    <a href="/dashboard"
                        class="bg-blue-50 border-r-2 border-blue-600 text-blue-700 group flex items-center px-2 py-2 text-sm font-medium rounded-l-md">
                        <!-- Bookmark icon -->
                        <svg class="text-blue-500 mr-3 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-5 7 5V5H5z" />
                        </svg>
                        All Bookmarks
                    </a>

                    <!-- Folders -->
                    <a href="/folders"
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
                                <span class="text-sm font-medium text-gray-700 hidden sm:block">John Doe</span>
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
                <div class="px-4 sm:px-6 lg:px-8 py-6">
                    {{-- Search and Controls --}}
                    <div class="mb-6 space-y-4">
                        <!-- Search Bar -->
                        <div class="relative max-w-md">
                            <!-- Search Icon -->
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Search bookmarks..."
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none" />
                        </div>

                        {{-- View Toggle and Sort Controls --}}
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <!-- View Toggle -->
                                <div class="flex bg-gray-100 rounded-lg p-1">
                                    <!-- Grid View Button (active) -->
                                    <button
                                        class="flex items-center px-3 py-1 rounded-md text-sm bg-white shadow-sm text-gray-700">
                                        <!-- Grid Icon -->
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z" />
                                        </svg>
                                        Grid
                                    </button>

                                    <!-- List View Button (inactive) -->
                                    <button class="flex items-center px-3 py-1 rounded-md text-sm text-gray-500">
                                        <!-- List Icon -->
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                        List
                                    </button>
                                </div>
                            </div>
                            <!-- Sort Controls with Alpine.js -->
                            <div class="flex items-center space-x-2" x-data="{ open: false, selected: 'Most Recent' }">
                                <span class="text-sm text-gray-500">Sort by:</span>

                                <div class="relative w-[180px]">
                                    <!-- Trigger Button -->
                                    <button @click="open = !open" @click.away="open = false"
                                        class="w-full flex justify-between items-center bg-white border border-gray-300 rounded-md shadow-sm px-3 py-2 text-sm text-gray-700 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                                        <span x-text="selected"></span>
                                        <svg class="h-4 w-4 text-gray-400 ml-2" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown List -->
                                    <div x-show="open" x-transition
                                        class="absolute mt-2 w-full rounded-md shadow-lg bg-white border border-gray-200 divide-y divide-gray-100 text-sm text-gray-700 z-50">
                                        <template x-for="option in [
                                                                        'Most Recent',
                                                                        'Oldest',
                                                                        'Title (A-Z)',
                                                                        'Title (Z-A)',
                                                                        'Website (A-Z)',
                                                                        'Website (Z-A)'
                                                                    ]" :key="option">
                                            <button @click="selected = option; open = false"
                                                class="w-full text-left px-4 py-2 hover:bg-gray-50"
                                                x-text="option"></button>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bookmarks Display --}}
                    {{-- Render Bookmark Grid --}}
                    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div
                            class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <div class="p-6">
                                <!-- Bookmark Header -->
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                                        <img src="https://react.dev/favicon.ico" alt="Favicon"
                                            class="h-6 w-6 rounded-sm flex-shrink-0"
                                            onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                                            React Documentation
                                        </h3>
                                    </div>
                                    <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M18 13V19H6V13M12 3V15" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <!-- URL -->
                                <p class="text-sm text-blue-600 mb-2 truncate">
                                    https://react.dev
                                </p>

                                <!-- Description -->
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    The official React documentation with guides and API reference
                                </p>

                                <!-- Tags -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        React
                                    </span>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Documentation
                                    </span>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Frontend
                                    </span>
                                </div>

                                <!-- Date -->
                                <p class="text-xs text-gray-500">Saved on 2024-01-15</p>
                            </div>
                        </div>

                    </div> --}}
                    {{ $slot }}
                    {{-- Render Bookmark List --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" style="display: none;">
                        <div class="p-6 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <div class="flex items-start space-x-4">
                                <img src="https://react.dev/favicon.ico" alt="Favicon"
                                    class="h-8 w-8 rounded-sm flex-shrink-0 mt-1"
                                    onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-900 truncate">
                                                React Documentation
                                            </h3>
                                            <p class="text-sm text-blue-600 truncate mb-2">
                                                https://react.dev
                                            </p>
                                            <p class="text-gray-600 text-sm mb-3">
                                                The official React documentation with guides and API reference
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-2">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    React
                                                </span>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    Documentation
                                                </span>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    Frontend
                                                </span>
                                            </div>
                                            <p class="text-xs text-gray-500">Saved on 2024-01-15</p>
                                        </div>
                                        <svg class="h-5 w-5 text-gray-400 flex-shrink-0 ml-4" fill="none"
                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M18 13V19H6V13M12 3V15" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Pagination
                    <div class="mt-8 flex justify-center">
                        <nav class="flex items-center space-x-2" aria-label="Pagination">
                            <!-- Previous -->
                            <a href="#" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Previous
                            </a>
                    
                            <!-- Page 1 (active) -->
                            <a href="#"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium border border-gray-300 rounded-md bg-white text-black font-semibold">
                                1
                            </a>
                    
                            <!-- Page 2 -->
                            <a href="#"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-md">
                                2
                            </a>
                    
                            <!-- Next -->
                            <a href="#" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                                Next
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </nav>
                    </div> --}}
                </div>
            </main>
        </div>
        <livewire:bookmark.add/>
    </div>
    @livewireScripts
</body>

</html>