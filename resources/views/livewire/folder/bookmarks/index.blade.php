<!-- Folder Context Subtitle Section (Header-aligned) -->
<div class="bg-white border-b border-gray-200">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-4 py-4">
            <!-- Back to Folders link -->
            <a href="{{ route('dashboard.folder') }}"
                class="flex items-center text-gray-600 hover:text-gray-900 transition-colors text-base font-medium">
                <!-- ArrowLeft icon (Heroicons) -->
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back to all folders
            </a>
            <!-- Folder Info -->
            <div class="flex items-center space-x-2">
                <!-- Folder icon -->
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7a2 2 0 012-2h3.586a1 1 0 01.707.293l1.414 1.414A1 1 0 0012.414 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                </svg>
                <span class="text-xl font-bold text-gray-800">Work Projects</span>
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600 ml-1">
                    8 bookmarks
                </span>
            </div>
        </div>
    </div>
</div>