<div>
    {{-- View Toggle Controls --}}
    <div class="flex items-center space-x-2">
        <div class="mb-6 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <!-- View Toggle -->
                <div class="flex bg-gray-100 rounded-lg p-1">
                    <!-- Grid View Button -->
                    <button wire:click="setViewMode('grid')" class="hover:cursor-pointer flex items-center px-3 py-1 rounded-md text-sm {{ $viewMode === 'grid' ? 'bg-white shadow-sm text-gray-700' : 'text-gray-500' }}">
                        <!-- Grid Icon -->
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z" />
                        </svg>
                        Grid
                    </button>

                    <!-- List View Button -->
                    <button wire:click="setViewMode('list')" class="hover:cursor-pointer flex items-center px-3 py-1 rounded-md text-sm {{ $viewMode === 'list' ? 'bg-white shadow-sm text-gray-700' : 'text-gray-500' }}">
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
        </div>
    </div>
    {{-- Success Message --}}
    @if ($successMessage)
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 2500)" 
            x-show="show" 
            x-transition:leave="transition ease-in duration-300" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0" 
            class="fixed top-6 right-6 z-50 flex items-center px-5 py-3 bg-green-500 text-white rounded-lg shadow-lg space-x-3"
            style="min-width: 220px;"
        >
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span class="font-medium">{{ $successMessage }}</span>
            <button @click="show = false" class="ml-2 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
    {{-- Bookmarks Display --}}
    {{-- Grid View --}}
    @if ($viewMode === 'grid')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($bookmarks as $bookmark)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <!-- Bookmark Header -->
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3 flex-1 min-w-0">
                            <img src="https://react.dev/favicon.ico" alt="Favicon" class="h-6 w-6 rounded-sm flex-shrink-0"
                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                            <h3 class="text-lg font-semibold text-gray-900 truncate">
                                {{ $bookmark->title }}
                            </h3>
                        </div>
                        <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" title="Open in new tab">
                            <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7m0 0v7m0-7L10 14M5 10v11h11" />
                            </svg>
                        </a>
                    </div>

                    <!-- URL -->
                    <p class="text-sm text-blue-600 mb-2 truncate">
                        {{ $bookmark->url }}
                    </p>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $bookmark->description }}
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @forelse ($bookmark->tags as $tag)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $tag->name }}
                            </span>
                        @empty
                            <span class="text-xs text-gray-400">No tags</span>
                        @endforelse
                    </div>

                    
                    <!-- Date and More Button -->
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-gray-500">
                            Saved on {{ $bookmark->created_at }}
                        </p>
                        <button class="p-1 rounded-full hover:bg-gray-100 transition-colors duration-200" type="button">
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
            @endforeach
        </div>
    @endif

    {{-- List View --}}
    @if ($viewMode === 'list')
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            @foreach ($bookmarks as $bookmark)
            <div class="p-6 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200 {{ $loop->last ? 'border-b-0' : '' }}">
                <div class="flex items-start space-x-4">
                    <img src="https://react.dev/favicon.ico" alt="Favicon"
                        class="h-8 w-8 rounded-sm flex-shrink-0 mt-1"
                        onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900 truncate">
                                    {{ $bookmark->title }}
                                </h3>
                                <p class="text-sm text-blue-600 truncate mb-2">
                                    {{ $bookmark->url }}
                                </p>
                                <p class="text-gray-600 text-sm mb-3">
                                    {{ $bookmark->description }}
                                </p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    @forelse ($bookmark->tags as $tag)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $tag->name }}
                                        </span>
                                    @empty
                                        <span class="text-xs text-gray-400">No tags</span>
                                    @endforelse
                                </div>
                                <p class="text-xs text-gray-500">Saved on {{ $bookmark->created_at }}</p>
                            </div>
                            <div class="flex items-center space-x-2 ml-4">
                                <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" title="Open in new tab">
                                    <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7m0 0v7m0-7L10 14M5 10v11h11" />
                                    </svg>
                                </a>
                                <button class="p-1 rounded-full hover:bg-gray-100 transition-colors duration-200" type="button">
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
            </div>
            @endforeach
        </div>
    @endif
    
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
</div>