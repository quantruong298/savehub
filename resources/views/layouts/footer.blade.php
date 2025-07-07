<footer class="w-full bg-gray-50 border-t border-gray-200 py-6 mt-auto">
    <div class="container mx-auto px-4">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4 text-sm text-gray-500">
                <span>© 2025 Bookmark Manager</span>
                <a href="/privacy" class="text-gray-500 hover:text-gray-700 underline transition-colors">
                    Privacy Policy
                </a>
            </div>
            @if(request()->routeIs('login') || request()->routeIs('register'))
                <a href="/" class="text-sm text-gray-500 hover:text-gray-700 underline transition-colors">
                    Back to Home
                </a>
            @endif
        </div>
    </div>
</footer>
  