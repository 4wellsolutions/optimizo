@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@section('meta_keywords', $tool->meta_keywords)

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-teal-500 to-emerald-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <!-- Background Patterns -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Free Bing SERP Checker & Rank Tracker
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Check live rankings with our advanced <strong>Bing SERP Checker</strong>. Accurate <strong>Bing
                        position</strong> analysis for any location or country.
                </p>

                <div class="mt-4">
                    @include('components.hero-actions')
                </div>
            </div>
        </div>

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Live Bing SERP Check Simulation</h2>
                <div class="h-1 w-16 bg-gradient-to-r from-blue-600 to-teal-600 mx-auto rounded-full"></div>
            </div>

            <form id="serpForm" onsubmit="handleSearch(event)" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Keyword Input -->
                    <div>
                        <label for="keyword" class="block text-sm font-bold text-gray-700 mb-2">
                            Target Keyword
                        </label>
                        <input type="text" id="keyword" name="keyword" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent font-medium text-gray-900 placeholder-gray-400 text-base transition-colors hover:border-blue-300"
                            placeholder="e.g. digital marketing agency">
                    </div>

                    <!-- Location Input -->
                    <div class="relative">
                        <label for="locationInput" class="block text-sm font-bold text-gray-700 mb-2">
                            Location (City/Region)
                        </label>
                        <input type="text" id="locationInput" autocomplete="off"
                            class="no-paste w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent font-medium text-gray-900 placeholder-gray-400 text-base transition-colors hover:border-blue-300"
                            placeholder="Enter city or check 'Global'">
                        <input type="hidden" id="selectedLocation">
                        <!-- Using shared location logic -->
                        <div id="locationDropdown"
                            class="hidden absolute z-50 w-full mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 max-h-60 overflow-y-auto custom-scrollbar ring-1 ring-black/5">
                        </div>
                    </div>

                    <!-- Market Selector -->
                    <div>
                        <label for="market" class="block text-sm font-bold text-gray-700 mb-2">
                            Bing Market (Region)
                        </label>
                        <div class="relative">
                            <select id="market"
                                class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent font-medium text-gray-700 bg-white pr-10 cursor-pointer hover:border-blue-300 transition-colors">
                                <option value="en-US">United States (English)</option>
                                <option value="en-GB">United Kingdom (English)</option>
                                <option value="en-CA">Canada (English)</option>
                                <option value="en-AU">Australia (English)</option>
                                <option value="de-DE">Germany (German)</option>
                                <option value="fr-FR">France (French)</option>
                                <option value="es-ES">Spain (Spanish)</option>
                                <option value="it-IT">Italy (Italian)</option>
                                <option value="nl-NL">Netherlands (Dutch)</option>
                                <option value="pt-BR">Brazil (Portuguese)</option>
                                <option value="ja-JP">Japan (Japanese)</option>
                                <option value="en-IN">India (English)</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Device Type -->
                    <div>
                        <label for="deviceType" class="block text-sm font-bold text-gray-700 mb-2">
                            Device Type
                        </label>
                        <div class="relative">
                            <select id="deviceType"
                                class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent font-medium text-gray-700 bg-white pr-10 cursor-pointer hover:border-blue-300 transition-colors">
                                <option value="desktop">Desktop</option>
                                <option value="mobile">Mobile (Smartphone)</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="btn-primary w-full px-8 py-4 rounded-xl flex items-center justify-center gap-3 transform hover:-translate-y-0.5 transition-all shadow-lg hover:shadow-xl text-lg font-bold bg-blue-600 hover:bg-blue-700 text-white border-none">
                        <span>Check Bing Rankings</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                    <p class="text-center text-xs font-bold text-gray-400 mt-4 uppercase tracking-wider">
                        <span class="text-blue-600">✔</span> No Login Required &nbsp;•&nbsp; <span
                            class="text-blue-600">✔</span> Real-Time Results
                    </p>
                </div>
            </form>
        </div>

        <!-- SEO Content & Features -->
        <div class="bg-gradient-to-br from-blue-50 to-teal-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">

            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-teal-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Why Use Our Free Bing SERP Checker?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Optimize for the 2nd largest search engine. Our <span class="text-blue-600 font-bold">Bing Rank
                        Tracker</span> helps you uncover opportunities and track your <strong>Bing SEO</strong> performance
                    accurately.
                </p>
            </div>

            <!-- Feature Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Local Bing Results</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        See what users in "New York" or "London" see. We force Bing to simulate the location using
                        <strong>precise location parameters</strong> for local SEO accuracy.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-teal-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Bing Mobile View</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Check your mobile rankings on Bing. Essential for capturing mobile traffic from the Microsoft
                        ecosystem and mobile devices.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-emerald-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Global Markets</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Support for all major Bing markets including USA, UK, Canada, Australia, Germany, France, and more.
                        Truly global <strong>Bing position checker</strong>.
                    </p>
                </div>
            </div>

            <!-- SERP Features -->
            <div class="mb-16">
                <h3 class="text-2xl font-black text-gray-900 mb-8 border-b-2 border-blue-100 pb-4">Understanding Bing
                    SERP Features</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white/80 p-6 rounded-xl border border-blue-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-blue-500">★</span> Featured Snippets
                        </h4>
                        <p class="text-sm text-gray-600">
                            Bing often provides rich answers and "intelligent answers" at position zero. Check if your
                            content is capturing these high-visibility spots.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-blue-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-blue-500">📍</span> Bing Places
                        </h4>
                        <p class="text-sm text-gray-600">
                            Bing's equivalent of the Local Pack. Crucial for local businesses. Use our "Location" feature to
                            verify your <strong>Bing Places</strong> ranking.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-blue-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-blue-500">📷</span> Visual Search
                        </h4>
                        <p class="text-sm text-gray-600">
                            Bing heavily emphasizes visual search results. Monitor how your images appear in image-heavy
                            SERP layouts.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-blue-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-blue-500">ℹ️</span> Knowledge Cards
                        </h4>
                        <p class="text-sm text-gray-600">
                            Rich information panels on the right side. Check if Bing clearly understands your brand entity.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Deep Dive Content -->
            <div class="bg-white rounded-2xl p-8 mb-12 border-l-4 border-blue-500 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Why Check Bing Rankings?</h3>
                <p class="mb-6 text-gray-700 leading-relaxed">
                    While Google dominates, Bing still holds a significant market share, especially in enterprise
                    environments (default in Windows/Edge) and among older demographics. Ranking high on Bing can tap into a
                    valuable, often higher-income audience.
                </p>

                <h4 class="text-lg font-bold text-gray-900 mb-3">How accurate is this tool?</h4>
                <p class="mb-4 text-gray-700">
                    We use Bing's own `setmkt` (Set Market) and `loc` parameters to request results directly from
                    Microsoft's servers. This provides a clean, unbiased view of the SERP, free from your personal
                    browsing history or cookie bias.
                </p>
            </div>

            <!-- FAQ Section -->
            <div class="mb-8">
                <h3 class="text-3xl font-black text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Is this Bing SERP Tool Free?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-blue-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Yes! Our **bing rank checker** is completely free. You can check unlimited keywords to optimize
                            your presence on Microsoft's search engine without any cost.
                        </div>
                    </details>

                    <!-- FAQ Item 2 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Does Bing ranking affect Yahoo?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-blue-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Yes, generally. Yahoo Search is largely powered by Bing's index. Optimizing for Bing often leads
                            to improved rankings on Yahoo as well, giving you a "two-for-one" SEO benefit.
                        </div>
                    </details>

                    <!-- FAQ Item 3 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Can I check local rankings for a specific city?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-blue-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Absolutely. Enter your city in the "Location" field. We append specific location parameters to
                            the search query, allowing you to see the <strong>local bing results</strong> exactly as a user
                            in that city would see them.
                        </div>
                    </details>
                </div>
            </div>

        </div>
    </div>

    <!-- Hidden form implementation -->
    <script>
        // Initialize elements
        const locationInput = document.getElementById('locationInput');
        const locationDropdown = document.getElementById('locationDropdown');
        const selectedLocationInput = document.getElementById('selectedLocation');
        let searchTimeout;

        // Input handler with Debounce
        locationInput.addEventListener('input', function () {
            const query = this.value;
            locationDropdown.innerHTML = '';
            selectedLocationInput.value = query; // Default to what they type

            clearTimeout(searchTimeout);

            if (query.length < 2) {
                locationDropdown.classList.add('hidden');
                return;
            }

            searchTimeout = setTimeout(() => {
                fetch(`{{ route('seo.locations.search') }}?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(locations => {
                        locationDropdown.innerHTML = '';
                        if (locations.length > 0) {
                            locationDropdown.classList.remove('hidden');
                            locations.forEach(loc => {
                                const div = document.createElement('div');
                                div.className = 'px-4 py-3 hover:bg-blue-50 cursor-pointer text-sm font-medium text-gray-700 border-b border-gray-50 last:border-0 transition-colors pointer-events-auto';
                                div.textContent = loc.name;
                                div.onclick = () => {
                                    locationInput.value = loc.name;
                                    selectedLocationInput.value = loc.name; // Use full name for Bing 'loc' param
                                    locationDropdown.classList.add('hidden');
                                };
                                locationDropdown.appendChild(div);
                            });
                        } else {
                            locationDropdown.classList.add('hidden');
                        }
                    })
                    .catch(e => console.error(e));
            }, 300); // 300ms debounce
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (e.target !== locationInput && e.target !== locationDropdown) {
                locationDropdown.classList.add('hidden');
            }
        });

        function handleSearch(e) {
            e.preventDefault();
            const keyword = document.getElementById('keyword').value;
            const market = document.getElementById('market').value;
            const device = document.getElementById('deviceType').value;
            const location = document.getElementById('selectedLocation').value;

            // Bing URL construction
            // Base: https://www.bing.com/search?q=KEYWORD
            // Market: &setmkt=en-US
            // Location: Bing supports 'loc' parameter in query string "KEYWORD loc:City" or sometimes &loc=City in URL (less reliable).
            // Safest bet for Bing is "KEYWORD loc:LocationName" if a location is specified.

            let finalQuery = keyword;
            if (location && location.trim() !== '') {
                // Append location operator to query for precise local results if supported, 
                // or rely on market if no specific city.
                // Actually, "loc:" operator is quite standard for Bing.
                finalQuery += ` loc:${location}`;
            }

            let url = `https://www.bing.com/search?q=${encodeURIComponent(finalQuery)}&setmkt=${market}`;

            if (device === 'mobile') {
                // Open customized window for mobile simulation
                window.open(url, 'bing_serp_mobile', 'width=414,height=896,menubar=no,toolbar=no,location=yes,status=yes,scrollbars=yes,resizable=yes,left=100,top=100');
            } else {
                window.open(url, '_blank');
            }
        }
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #93c5fd;
            /* blue-300 */
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #60a5fa;
            /* blue-400 */
        }
    </style>
@endsection