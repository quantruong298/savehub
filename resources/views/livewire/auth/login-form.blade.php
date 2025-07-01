<form class="space-y-6" wire:submit="login">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2" >
            Email Address
            <span class="text-red-600">*</span>
        </label>
        <input type="email" placeholder="Enter your email" wire:model="email" required
            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all" />
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Password
            <span class="text-red-600">*</span>
        </label>
        <input type="password" placeholder="Enter your password" wire:model="password" required
            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all" />
    </div>
    <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl">
        Sign In
    </button>
</form>