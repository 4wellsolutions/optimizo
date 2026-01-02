<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Optimizo') }} - Login</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="antialiased bg-gray-50 text-slate-800">

    <div class="flex min-h-screen">
        <!-- Left Side: Visual & Branding -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-indigo-900 overflow-hidden">
            <!-- Dynamic Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-700 to-indigo-900 opacity-90">
            </div>
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center mix-blend-overlay opacity-20">
            </div>

            <!-- Decorative Circles -->
            <div
                class="absolute -top-24 -left-24 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
            </div>
            <div
                class="absolute top-1/2 left-1/2 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
            </div>

            <div class="relative z-10 w-full flex flex-col justify-between p-12 text-white">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Optimizo.</h1>
                </div>

                <div class="mb-12">
                    <div class="block w-12 h-1 mb-6 bg-indigo-400"></div>
                    <h2 class="text-4xl font-bold mb-4 leading-tight">Professional SEO & <br>Web Tools Suite.</h2>
                    <p class="text-lg text-indigo-100 max-w-md">Optimize your workflow with our comprehensive collection
                        of developer, SEO, and utility tools.</p>
                </div>

                <div class="text-sm text-indigo-200">
                    &copy; {{ date('Y') }} Optimizo. All rights reserved.
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-white relative">
            <div class="w-full max-w-[420px] space-y-8">

                <!-- Mobile Logo (Visible only on small screens) -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold text-indigo-700 tracking-tight">Optimizo.</h1>
                </div>

                <div class="text-center lg:text-left">
                    <h2 class="mt-6 text-3xl font-bold tracking-tight text-slate-900">Welcome back!</h2>
                    <p class="mt-2 text-sm text-slate-500">Please enter your details to sign in.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700">Email address</label>
                        <div class="mt-1 relative">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}" autofocus
                                class="block w-full px-4 py-3 rounded-xl border border-gray-200 text-slate-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white"
                                placeholder="name@example.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="mt-1 relative">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full px-4 py-3 rounded-xl border border-gray-200 text-slate-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white"
                                placeholder="••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Remember Me & Actions -->
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="remember_me" class="ml-2 block text-sm text-slate-600 cursor-pointer">Remember for
                            30 days</label>
                    </div>

                    <button type="submit"
                        class="group relative flex w-full justify-center rounded-xl bg-indigo-600 px-4 py-3 text-sm font-bold text-white shadow-lg hover:bg-indigo-500 hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 transform hover:-translate-y-0.5">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-300 group-hover:text-indigo-100 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in to account
                    </button>

                </form>

                <div class="mt-6 text-center text-sm text-slate-500">
                    Not a member? <a href="{{ route('register') }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">Start a 14 day
                        free trial</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>