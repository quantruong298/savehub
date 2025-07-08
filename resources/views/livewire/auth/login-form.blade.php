<form class="space-y-6" wire:submit="login">
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
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2" >
            Email Address
            <span class="text-red-600">*</span>
        </label>
        <input type="email" placeholder="Enter your email" wire:model="email" required autofocus
            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all" />
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Password
            <span class="text-red-600">*</span>
        </label>
        <div class="relative" x-data="{ show: false }">
            <input :type="show ? 'text' : 'password'" placeholder="Enter your password" wire:model="password" required 
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all" />
            <button type="button"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 transition-colors focus:outline-none cursor-pointer"
                tabindex="-1"
                @click="show = !show"
                :aria-label="show ? 'Hide password' : 'Show password'">
                <template x-if="!show">
                    <!-- Eye Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </template>
                <template x-if="show">
                    <!-- Eye Slash Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.174-3.362m2.735-2.322A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.103 5.527M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </template>
            </button>
        </div>    
    </div>

    <div class="flex items-center space-x-2" >
        <input id="remember-me" type="checkbox" wire:model="remember"
            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 checked:bg-blue-600 checked:border-blue-600 cursor-pointer" />
        <label for="remember-me" class="text-sm text-gray-600 cursor-pointer">
            Remember me
        </label>
    </div>
      
    <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl">
        Sign In
    </button>
</form>