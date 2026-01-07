<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- hreflang tags for SEO --}}
    @php
        $currentPath = request()->path();

        // Remove 'ru' or 'ru/' prefix if present
        if (str_starts_with($currentPath, 'ru/')) {
            $pathWithoutLocale = substr($currentPath, 3);
        } elseif ($currentPath === 'ru') {
            $pathWithoutLocale = '';
        } else {
            $pathWithoutLocale = $currentPath;
        }

        // Build full URLs
        $baseUrl = rtrim(url('/'), '/');

        if (empty($pathWithoutLocale)) {
            $enUrl = $baseUrl;
            $ruUrl = $baseUrl . '/ru';
        } else {
            $enUrl = $baseUrl . '/' . $pathWithoutLocale;
            $ruUrl = $baseUrl . '/ru/' . $pathWithoutLocale;
        }
    @endphp

    <link rel="alternate" hreflang="en" href="{{ $enUrl }}" />
    <link rel="alternate" hreflang="ru" href="{{ $ruUrl }}" />
    <link rel="alternate" hreflang="x-default" href="{{ $enUrl }}" />
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
                <a href="{{ localeRoute('home') }}" class="flex items-center space-x-2 group">
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

                <!-- Search Bar (Desktop/Tablet) -->
                <div class="hidden md:block relative w-full max-w-md mx-4 search-container">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                        class="tool-search-input block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:text-sm transition-all duration-200"
                        placeholder="Search for tools..." autocomplete="off">

                    <div
                        class="search-results absolute z-50 mt-2 w-full bg-white shadow-xl rounded-xl border border-gray-100 py-1 text-base overflow-auto max-h-96 sm:text-sm hidden">
                        <!-- Results injected via JS -->
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ localeRoute('home') }}" class="nav-link">{{ __('navigation.home') }}</a>
                    <a href="{{ localeRoute('category.youtube') }}"
                        class="nav-link">{{ __('navigation.youtube_tools') }}</a>
                    <a href="{{ localeRoute('category.seo') }}" class="nav-link">{{ __('navigation.seo_tools') }}</a>
                    <a href="{{ localeRoute('category.utility') }}"
                        class="nav-link">{{ __('navigation.utility_tools') }}</a>
                    <a href="{{ localeRoute('category.network') }}"
                        class="nav-link">{{ __('navigation.network_tools') }}</a>

                    <!-- Language Switcher -->
                    <div class="ml-2">
                        <x-language-switcher position="header" />
                    </div>
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
            <!-- Mobile Search -->
            <div class="px-4 pt-4 pb-2 search-container relative">
                <div class="absolute inset-y-0 left-0 pl-7 flex items-center pointer-events-none top-2">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text"
                    class="tool-search-input block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-base transition-all duration-200"
                    placeholder="Search for tools..." autocomplete="off">
                <div
                    class="search-results absolute z-50 mt-2 w-[calc(100%-2rem)] bg-white shadow-xl rounded-xl border border-gray-100 py-1 text-base overflow-auto max-h-60 hidden">
                    <!-- Results injected via JS -->
                </div>
            </div>

            <div class="px-4 py-3 space-y-1">
                <a href="{{ localeRoute('home') }}" class="block nav-link">{{ __('navigation.home') }}</a>
                <a href="{{ localeRoute('category.youtube') }}"
                    class="block nav-link">{{ __('navigation.youtube_tools') }}</a>
                <a href="{{ localeRoute('category.seo') }}" class="block nav-link">{{ __('navigation.seo_tools') }}</a>
                <a href="{{ localeRoute('category.utility') }}"
                    class="block nav-link">{{ __('navigation.utility_tools') }}</a>
                <a href="{{ localeRoute('category.network') }}"
                    class="block nav-link">{{ __('navigation.network_tools') }}</a>

                <!-- Language Switcher -->
                <div class="pt-2">
                    <x-language-switcher position="mobile" />
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
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
                    <p class="text-gray-400 text-sm">{{ __('navigation.footer_description') }}</p>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-4">{{ __('navigation.footer_tools_section') }}</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ localeRoute('category.youtube') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.youtube_tools') }}</a></li>
                        <li><a href="{{ localeRoute('category.seo') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.seo_tools') }}</a></li>
                        <li><a href="{{ localeRoute('category.utility') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.utility_tools') }}</a></li>
                        <li><a href="{{ localeRoute('category.network') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.network_tools') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-4">{{ __('navigation.footer_company_section') }}</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ localeRoute('about') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.about') }}</a></li>
                        <li><a href="{{ localeRoute('contact') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.contact') }}</a></li>
                        <li><a href="{{ localeRoute('sponsors') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.subscribe') }}</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-4">{{ __('navigation.footer_legal_section') }}</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ localeRoute('terms') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.terms') }}</a></li>
                        <li><a href="{{ localeRoute('privacy') }}"
                                class="hover:text-white transition-colors">{{ __('navigation.privacy') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} Optimizo. {{ __('navigation.all_rights_reserved') }}.</p>
            </div>
        </div>
    </footer>

    <script>
        // Make searchable tools available to JS
        window.searchableTools = @json($searchableTools ?? []);

        document.addEventListener('DOMContentLoaded', function () {
            // Initializing search for all search containers (desktop + mobile)
            const searchContainers = document.querySelectorAll('.search-container');

            searchContainers.forEach(container => {
                const searchInput = container.querySelector('.tool-search-input');
                const searchResults = container.querySelector('.search-results');
                let selectedIndex = -1;

                if (searchInput && searchResults) {
                    searchInput.addEventListener('input', function (e) {
                        const query = e.target.value.toLowerCase();
                        selectedIndex = -1;

                        if (query.length < 2) {
                            searchResults.classList.add('hidden');
                            return;
                        }

                        const filteredTools = window.searchableTools.filter(tool =>
                            tool.name.toLowerCase().includes(query) ||
                            tool.category.toLowerCase().includes(query)
                        ).slice(0, 8); // Limit to 8 results

                        if (filteredTools.length > 0) {
                            searchResults.innerHTML = filteredTools.map((tool, index) => `
                                <a href="${tool.url}" class="block px-4 py-3 hover:bg-indigo-50 transition-colors flex items-center group ${index === 0 ? 'bg-indigo-50/50' : ''}" data-index="${index}">
                                    <div class="bg-gray-100 text-gray-500 rounded-lg p-2 mr-3 group-hover:bg-indigo-100 group-hover:text-indigo-600 transition-colors">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-gray-900 font-medium">${tool.name}</div>
                                        <div class="text-xs text-gray-500 uppercase tracking-wider font-semibold">${tool.category} Tool</div>
                                    </div>
                                </a>
                            `).join('');
                            searchResults.classList.remove('hidden');
                        } else {
                            searchResults.innerHTML = `
                                <div class="px-4 py-3 text-sm text-gray-500 text-center">
                                    No tools found matching "${e.target.value}"
                                </div>
                            `;
                            searchResults.classList.remove('hidden');
                        }
                    });

                    // Handle clicking outside to close
                    document.addEventListener('click', function (e) {
                        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                            searchResults.classList.add('hidden');
                        }
                    });

                    // Handle keyboard navigation
                    searchInput.addEventListener('keydown', function (e) {
                        if (searchResults.classList.contains('hidden')) return;

                        const results = searchResults.querySelectorAll('a');

                        if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            selectedIndex = Math.min(selectedIndex + 1, results.length - 1);
                            updateSelection(results);
                        } else if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            selectedIndex = Math.max(selectedIndex - 1, -1);
                            updateSelection(results);
                        } else if (e.key === 'Enter') {
                            e.preventDefault();
                            if (selectedIndex >= 0 && results[selectedIndex]) {
                                results[selectedIndex].click();
                            } else if (results.length > 0) {
                                // Default to first result if none selected
                                results[0].click();
                            }
                        } else if (e.key === 'Escape') {
                            searchResults.classList.add('hidden');
                            searchInput.blur();
                        }
                    });

                    function updateSelection(results) {
                        results.forEach((el, idx) => {
                            if (idx === selectedIndex) {
                                el.classList.add('bg-indigo-50');
                            } else {
                                el.classList.remove('bg-indigo-50');
                            }
                        });
                    }
                }
            });
        });

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

    <!-- jQuery - Loaded globally for all tools -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('scripts')
</body>

</html>