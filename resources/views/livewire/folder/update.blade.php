<div x-data="{ isOpen: false }" @close-modal.window="isOpen = false" class="flex items-center space-x-2">
    <!-- Add Folder Button -->
    <div> 
       <button type="button" @click="isOpen = true"
           class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white shadow-lg hover:shadow-xl transition-all duration-200 flex items-center px-4 py-2 rounded-lg font-semibold">
           <!-- Plus Icon SVG (Heroicons outline) -->
           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
               stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
           </svg>
           Update Folder
       </button>
   </div>

   <!-- Modal Background -->
   <div x-show="$wire.showUpdateForm" x-transition
       class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm">
       <!-- Modal Content -->
       <div @click.away="isOpen = false"
           class="bg-white rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
           <!-- Modal Header -->
           <div class="flex justify-between items-center mb-4">
               <h2 class="text-xl font-semibold text-gray-900">Create Folder</h2>
               <button @click="isOpen = false" class="text-gray-400 hover:text-gray-600">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                   </svg>
               </button>
           </div>

           <!-- Form -->
           <form wire:submit.prevent="save" class="space-y-4">
               <!-- Error Messages -->
               @if ($errors->any())
                   <div class="bg-red-50 text-red-500 p-4 rounded-md mb-4">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif
               <!-- Folder Name -->
               <div>
                   <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Folder Name</label>
                   <input type="text" id="name" wire:model="name" placeholder="Enter folder name" required autofocus
                       class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
               </div>

               <!-- Footer Buttons -->
               <div class="mt-6 flex flex-col sm:flex-row justify-end gap-2">
                   <button type="button" @click="isOpen = false"
                       class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                       Cancel
                   </button>
                   <button type="submit"
                       class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                       Save Bookmark
                   </button>
               </div>
           </form>
       </div>
   </div>
</div>