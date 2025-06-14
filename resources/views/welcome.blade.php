<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="container mx-auto px-4 py-16">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <div class="flex justify-center items-center gap-3 mb-6">
            <div class="p-3 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl">
                <!-- Bookmark Icon -->
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 4v16l6-6 6 6V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2z"/></svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Bookmark Manager
            </h1>
            </div>
            <p class="text-xl md:text-2xl text-gray-600 font-medium mb-8">
            Save anything. Organize everything.
            </p>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
            Never lose track of interesting content again. Save bookmarks from any website, 
            social media post, or online resource. Organize them with custom tags and folders 
            for instant access whenever you need them.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-20">
            <a 
            href="/login"
            class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center"
            >
            Login to Your Account
            </a>
            <a 
            href="/register"
            class="w-full sm:w-auto px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl border-2 border-blue-600 hover:bg-blue-50 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center"
            >
            Create New Account
            </a>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <!-- Share Icon -->
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M8.59 13.51l6.83 3.98m0-11.01l-6.83 3.98"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Universal Saving</h3>
            <p class="text-gray-600">Save from any website, Facebook, Instagram, TikTok, and more using sharing URLs</p>
            </div>
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <!-- Tag Icon -->
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M5 7l7-7 7 7-7 7z"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Smart Tagging</h3>
            <p class="text-gray-600">Organize your bookmarks with custom tags for quick filtering and discovery</p>
            </div>
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <!-- Folder Icon -->
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Custom Folders</h3>
            <p class="text-gray-600">Create personalized folders to group related bookmarks and maintain perfect organization</p>
            </div>
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <!-- Zap Icon -->
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polygon points="13 2 2 22 15 22 11 12 22 12 13 2"/></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Lightning Fast</h3>
            <p class="text-gray-600">Find any bookmark instantly with powerful search and intelligent filtering</p>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-12">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8">
            <div class="relative">
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Save Anything</h3>
                <p class="text-gray-600">Copy any URL from websites, social media posts, or online content</p>
            </div>
            <div class="relative">
                <div class="w-12 h-12 bg-purple-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Organize Smart</h3>
                <p class="text-gray-600">Add tags and place bookmarks in custom folders for easy organization</p>
            </div>
            <div class="relative">
                <div class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Find Instantly</h3>
                <p class="text-gray-600">Search, filter, and access your saved content whenever you need it</p>
            </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl mb-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                Your Digital Life, Perfectly Organized
                </h2>
                <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <span class="text-gray-700">Works with all major social media platforms</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <span class="text-gray-700">Secure cloud storage for all your bookmarks</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <span class="text-gray-700">Access from any device, anywhere</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <span class="text-gray-700">Powerful search and filtering capabilities</span>
                </div>
                </div>
            </div>
            <div class="text-center">
                <div class="relative inline-block">
                <div class="w-48 h-48 bg-gradient-to-r from-blue-100 to-purple-100 rounded-3xl flex items-center justify-center mx-auto">
                    <div class="grid grid-cols-2 gap-4">
                    <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center">
                        <!-- Bookmark Icon -->
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 4v16l6-6 6 6V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2z"/></svg>
                    </div>
                    <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center">
                        <!-- Tag Icon -->
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M5 7l7-7 7 7-7 7z"/></svg>
                    </div>
                    <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center">
                        <!-- Folder Icon -->
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/></svg>
                    </div>
                    <div class="w-16 h-16 bg-orange-600 rounded-xl flex items-center justify-center">
                        <!-- Share Icon -->
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M8.59 13.51l6.83 3.98m0-11.01l-6.83 3.98"/></svg>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-8 md:p-12 text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Get Organized?</h2>
            <p class="text-xl mb-8 opacity-90">Join thousands of users who have already transformed their digital life</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a 
                href="/register"
                class="w-full sm:w-auto px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center"
            >
                Start Free Today
            </a>
            <a 
                href="/login"
                class="w-full sm:w-auto px-8 py-4 bg-transparent text-white font-semibold rounded-xl border-2 border-white hover:bg-white hover:text-blue-600 transition-all duration-200 text-center"
            >
                Already Have Account?
            </a>
            </div>
        </div>
        </div>
    </div>

</body>

</html>