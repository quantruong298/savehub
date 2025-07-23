<!-- Modal Background -->
<div x-show="$wire.addModalVisible" x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm">
    <!-- Modal Content -->
    <div @click.away="$wire.closeAddModal()"
        class="bg-white rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-900">Add Bookmark</h2>
            <button wire:click="closeAddModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Footer Buttons (Centered) -->
        <div class="mt-6 flex flex-col sm:flex-row justify-center gap-2">
            <button type="button" wire:click=""
                class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Add Existing Bookmark
            </button>
            <button type="button" wire:click=""
                class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Create New Bookmark
            </button>
        </div>
    </div>
</div>