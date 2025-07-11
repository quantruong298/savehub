@extends('layouts.dashboard')

@section('main-content')
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
            <input type="text" placeholder="Search folders..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none" />
        </div>

        {{-- View Toggle and Sort Controls --}}
        <div class="flex justify-between items-center">
            {{-- Add Bookmark Component --}}
            <livewire:folder.create/>
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
    {{-- Read Components --}}
    <livewire:folder.read/>

    {{-- Update Components --}}
    <livewire:folder.update/>

    {{-- Delete Components --}}
    <livewire:folder.delete/>
</div>
@endsection