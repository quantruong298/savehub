<div 
    x-data="{ show: false, message: '' }"
    x-on:notify.window="
        message = $event.detail.message;
        show = true;
        setTimeout(() => show = false, 2500);
    "
    x-show="show"
    x-transition:leave="transition ease-in duration-300" 
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-2 right-4 z-50 space-y-2">
    <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg max-w-sm">
        <div class="flex items-center justify-between">
            <span class="font-medium" x-text="message"></span>

            <button @click="show = false" class="ml-2 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
