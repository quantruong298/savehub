<!-- Delete Alert Modal -->
<div x-show="$wire.showConfirmDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">
        <!-- Header -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-900">Delete Bookmark</h2>
            <p class="mt-1 text-gray-600">
                Are you sure you want to delete <span class="font-semibold">"{{ $bookmark?->title ?? '' }}"</span>? This
                action cannot be undone.
            </p>
        </div>
        <!-- Footer Actions -->
        <div class="flex justify-end gap-2 mt-6">
            <button wire:click="closeModal" class="px-4 py-2 border border-gray-300 rounded-lg font-semibold hover:bg-gray-100">
                Cancel
            </button>
            <button wire:click="delete" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700">
                Delete
            </button>
        </div>
    </div>
</div>