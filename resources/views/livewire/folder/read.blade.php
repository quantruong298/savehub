<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($folders as $folder)
        <div
            class="group hover:shadow-lg transition-all duration-200 border border-gray-200 hover:border-blue-300 rounded-xl overflow-hidden bg-white">
            <div class="p-6">
                <!-- Folder Icon and Info -->
                <div class="flex flex-col items-center text-center mb-6">
                    <div class="mb-4 p-4 bg-blue-50 rounded-full group-hover:bg-blue-100 transition-colors">
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
                        <button type="button"
                            class="flex-1 border border-gray-300 hover:bg-gray-50 flex items-center justify-center px-4 py-2 rounded-lg font-semibold transition-colors">
                            <!-- Edit Icon -->
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5h2m2 1v2m-1 2h2M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-7a2 2 0 00-2-2h-5.586a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 0010.586 5H6a2 2 0 00-2 2v7z" />
                            </svg> --}}
                            Edit
                        </button>
                        <button type="button"
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
</div>