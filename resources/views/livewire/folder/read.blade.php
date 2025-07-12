<div>
    @if ($folders->isEmpty())
    <div class="flex flex-col items-center justify-center min-h-[60vh] text-center px-4">
        <!-- Icon -->
        <div class="mb-6">
            <div class="h-16 w-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <!-- Bookmark SVG icon (Heroicons outline version) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                </svg>                
            </div>
        </div>

        <!-- Message -->
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">
            No folders yet
        </h2>

        <!-- Description -->
        <p class="text-gray-600 mb-8 max-w-sm">
            Folders help you organize your bookmarks. Create your first folder to get started.
        </p>

        <!-- Button -->
        <button wire:click="sendRequestCreateFolder()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl flex items-center">
            <!-- Plus Icon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add your first folder
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
            <input type="text" placeholder="Search folders..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none" />
        </div>

        {{-- Add Button and Sort Controls --}}
        <div class="flex justify-between items-center">
            <!-- Add Folder Button -->
            <div class="flex items-center space-x-2"> 
                <button type="button" wire:click="sendRequestCreateFolder()"
                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white shadow-lg hover:shadow-xl transition-all duration-200 flex items-center px-4 py-2 rounded-lg font-semibold">
                    <!-- Plus Icon SVG (Heroicons outline) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create Folder
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
                                                        'Bookmark Count'
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
    {{-- Folder Display --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($folders as $folder)
        <div
            class="group hover:shadow-lg transition-all duration-200 border border-gray-200 hover:border-blue-300 rounded-xl overflow-hidden bg-white">
            <div class="p-4">
                <!-- Folder Icon and Info -->
                <div class="flex flex-col items-center text-center mb-4">
                    <div class="mb-2 p-4 bg-blue-50 rounded-full group-hover:bg-blue-100 transition-colors">
                        <!-- Folder Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7a2 2 0 012-2h3.586a1 1 0 01.707.293l1.414 1.414A1 1 0 0012.414 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2">
                        {{ $folder->name }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ $folder->bookmarks_count }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-2">
                    <!-- Open Button -->
                    <button type="button"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center px-4 py-2 rounded-lg font-semibold transition-colors">
                        <!-- FolderOpen Icon -->
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7a2 2 0 012-2h3.586a1 1 0 01.707.293l1.414 1.414A1 1 0 0012.414 7H19a2 2 0 012 2v5M5 21V7m0 0V5m0 2h14a2 2 0 012 2v9a2 2 0 01-2 2H5z" />
                        </svg> --}}
                        Open
                    </button>
                    <!-- Edit and Delete Buttons -->
                    <div class="flex gap-2">
                        <button type="button" wire:click="sendRequestToUpdateFolder({{ $folder->id }})"
                            class="flex-1 border border-gray-300 hover:bg-gray-50 flex items-center justify-center px-4 py-2 rounded-lg font-semibold transition-colors">
                            <!-- Edit Icon -->
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5h2m2 1v2m-1 2h2M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-7a2 2 0 00-2-2h-5.586a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 0010.586 5H6a2 2 0 00-2 2v7z" />
                            </svg> --}}
                            Edit
                        </button>
                        <button type="button" wire:click="sendRequestToDeleteFolder({{ $folder->id }})"
                            class="flex-1 border border-red-300 text-red-600 hover:bg-red-50 hover:border-red-400 flex items-center justify-center px-4 py-2 rounded-lg font-semibold transition-colors">
                            <!-- Trash Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 7v14h12V7M4 7V5a2 2 0 012-2h12a2 2 0 012 2v2M9 11v6m6-6v6" />
                            </svg>
                            Delete
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
            @if ($folders->onFirstPage())
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
            @for ($page = 1; $page <= $folders->lastPage(); $page++)
                @if ($page == $folders->currentPage())
                <span
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium border border-gray-300 rounded-md bg-white text-black font-semibold">
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
                @if ($folders->hasMorePages())
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