<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Optimizo'))</title>
    <meta name="description" content="@yield('meta_description', 'Professional online tools for creators')">
    @hasSection('meta_keywords')
        <meta name="keywords" content="@yield('meta_keywords')">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span
                        class="text-xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Optimizo</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                    <a href="{{ route('home') }}#youtube-tools" class="nav-link">YouTube Tools</a>
                    <a href="{{ route('home') }}#network-tools" class="nav-link">Network Tools</a>
                    <a href="{{ route('home') }}#seo-tools" class="nav-link">SEO Tools</a>
                    <a href="{{ route('home') }}#utility-tools" class="nav-link">Utilities</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors"
                    onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-gray-200 bg-white">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('home') }}" class="block nav-link">Home</a>
                <a href="{{ route('home') }}#youtube-tools" class="block nav-link">YouTube Tools</a>
                <a href="{{ route('home') }}#network-tools" class="block nav-link">Network Tools</a>
                <a href="{{ route('home') }}#seo-tools" class="block nav-link">SEO Tools</a>
                <a href="{{ route('home') }}#utility-tools" class="block nav-link">Utilities</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16 md:mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div
                            class="w-9 h-9 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-xl font-black">Optimizo</span>
                    </div>
                    <p class="text-gray-400 text-sm">Professional tools for creators and developers.</p>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-4">Tools</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}#youtube-tools"
                                class="hover:text-white transition-colors">YouTube Tools</a></li>
                        <li><a href="{{ route('home') }}#network-tools"
                                class="hover:text-white transition-colors">Network Tools</a></li>
                        <li><a href="{{ route('home') }}#seo-tools" class="hover:text-white transition-colors">SEO
                                Tools</a></li>
                        <li><a href="{{ route('home') }}#utility-tools"
                                class="hover:text-white transition-colors">Utilities</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-4">Company</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="{{ route('sponsors') }}" class="hover:text-white transition-colors">Sponsors</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-4">Legal</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms &
                                Conditions</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy
                                Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} Optimizo. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Smooth scroll for anchor links
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('a[href^="#"], a[href*="#"]');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    const hashIndex = href.indexOf('#');
                    if (hashIndex !== -1) {
                        const hash = href.substring(hashIndex + 1);
                        const target = document.getElementById(hash);
                        if (target) {
                            e.preventDefault();
                            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            // Close mobile menu if open
                            const mobileMenu = document.getElementById('mobileMenu');
                            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                                mobileMenu.classList.add('hidden');
                            }
                        }
                    }
                });
            });
        });
    </script>

    <!-- Global Paste Functionality -->
    <script src="{{ asset('js/paste-functionality.js') }}"></script>
</body>

</html>