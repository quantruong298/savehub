<div>
    @if ($bookmarks->isEmpty())
    <div class="flex flex-col items-center justify-center min-h-[60vh] text-center px-4">
        <!-- Icon -->
        <div class="mb-6">
            <div class="h-16 w-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <!-- Bookmark SVG icon (Heroicons outline version) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3-7 3V5z" />
                </svg>
            </div>
        </div>

        <!-- Message -->
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">
            No bookmarks yet
        </h2>

        <!-- Description -->
        <p class="text-gray-600 mb-8 max-w-sm">
            Start saving your favorite links and organize your digital life.
        </p>

        <!-- Button -->
        <button wire:click="sendRequestToAddBookmark()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl flex items-center">
            <!-- Plus Icon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add a bookmark to this folder
        </button>
    </div>
    @else
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

        {{-- Add Button and Sort Controls --}}
        <div class="flex justify-between items-center">
            <!-- Add Bookmark Button -->
            <div class="flex items-center space-x-2"> 
                <button type="button" wire:click="sendRequestToAddBookmark()"
                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white shadow-lg hover:shadow-xl transition-all duration-200 flex items-center px-4 py-2 rounded-lg font-semibold">
                    <!-- Plus Icon SVG (Heroicons outline) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Bookmark
                </button>
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($bookmarks as $bookmark)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
            <div class="p-6">
                <!-- Bookmark Header -->
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        @php
                        $domain = parse_url($bookmark->url, PHP_URL_HOST);
                        $faviconUrl = $domain
                        ? "https://www.google.com/s2/favicons?domain={$domain}&sz=64"
                        :
                        "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+";
                        @endphp
                        <img src="{{ $faviconUrl }}" alt="Favicon" class="h-6 w-6 rounded-sm flex-shrink-0"
                            onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                            {{ $bookmark->title }}
                        </h3>
                    </div>
                    <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" title="Open in new tab">
                        <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7m0 0v7m0-7L10 14M5 10v11h11" />
                        </svg>
                    </a>
                </div>

                <!-- URL -->
                <p class="text-sm text-blue-600 mb-2 truncate">
                    {{ $bookmark->url }}
                </p>

                <!-- Description -->
                <p class="text-sm mb-4 line-clamp-2 {{ $bookmark->description ? 'text-gray-600' : 'text-gray-400 italic' }}">
                    {{ $bookmark->description ?: '(No Description)' }}
                </p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-4">
                    @forelse ($bookmark->tags as $tag)
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $tag->name }}
                    </span>
                    @empty
                    <span class="text-xs text-gray-400 italic">(No tags)</span>
                    @endforelse
                </div>


                <!-- Date and More Button -->
                <div class="flex items-center justify-between">
                    <p class="text-xs text-gray-500">
                        Last updated: {{ $bookmark->updated_at->format('M d, Y') }}
                    </p>
                    <div class="flex items-center space-x-1">
                    <button title="Remove from Folder" wire:click="sendRequestToRemoveBookmark({{ $bookmark->id }})"
                        class="p-1 rounded-full hover:bg-red-50 hover:text-red-600 transition-colors duration-200">
                        <!-- X icon (Heroicons outline) -->
                        <svg class="h-4 w-4 text-gray-400 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <button wire:click="sendRequestToUpdateBookmark({{ $bookmark->id }})"
                        class="p-1 rounded-full hover:bg-gray-100 transition-colors duration-200" type="button">
                        <!-- Replace below with your MoreHorizontal SVG icon -->
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="5" cy="12" r="1.5" />
                            <circle cx="12" cy="12" r="1.5" />
                            <circle cx="19" cy="12" r="1.5" />
                        </svg>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-8 flex justify-center">
        <nav class="flex items-center space-x-2" aria-label="Pagination">
            {{-- Previous --}}
            @if ($bookmarks->onFirstPage())
                <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-300 cursor-not-allowed">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Previous
                </span>
            @else
                <button wire:click="previousPage" rel="prev"
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Previous
                </button>
            @endif

            {{-- Page Numbers --}}
            @for ($page = 1; $page <= $bookmarks->lastPage(); $page++)
                @if ($page == $bookmarks->currentPage())
                    <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium border border-gray-300 rounded-md bg-white text-black font-semibold">
                        {{ $page }}
                    </span>
                @else
                    <button wire:click="gotoPage({{ $page }})"
                        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-md">
                        {{ $page }}
                    </button>
                @endif
            @endfor

            {{-- Next --}}
            @if ($bookmarks->hasMorePages())
                <button wire:click="nextPage" rel="next"
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                    Next
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @else
                <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-300 cursor-not-allowed">
                    Next
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            @endif
        </nav>
    </div>
    @endif
</div>