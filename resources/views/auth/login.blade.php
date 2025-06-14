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

<body>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 flex items-center justify-center px-4">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-6">
                <!-- ArrowLeft Icon -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to Home
            </a>
            <div class="flex justify-center items-center gap-3 mb-4">
                <div class="p-2 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl">
                <!-- Bookmark Icon -->
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 4v16l6-6 6 6V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Bookmark Manager</h1>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Welcome Back</h2>
            <p class="text-gray-500">Sign in to access your bookmarks</p>
            </div>

            <!-- Login Form Placeholder -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="space-y-6">
                <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input 
                    type="email" 
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all"
                />
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all"
                />
                </div>
                <button class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                Sign In
                </button>
            </div>
            
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                Don't have an account? 
                <a href="/register" class="text-blue-600 hover:text-blue-700 font-medium">
                    Sign up here
                </a>
                </p>
            </div>
            </div>
        </div>
    </div>

</body>

</html>