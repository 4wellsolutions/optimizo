@extends('layouts.app')

@section('title', __tool('google-serp-checker', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('google-serp-checker', 'seo.description', $tool->meta_description))
@section('meta_keywords', __tool('google-serp-checker', 'seo.keywords', $tool->meta_keywords))

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Live SERP Check Simulation</h2>
                <div class="h-1 w-16 bg-gradient-to-r from-purple-600 to-red-600 mx-auto rounded-full"></div>
            </div>

            <form id="serpForm" onsubmit="handleSearch(event)" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Keyword Input -->
                    <div>
                        <label for="keyword" class="block text-sm font-bold text-gray-700 mb-2">
                            {{ __tool('google-serp-checker', 'form.keyword_label') }}
                        </label>
                        <input type="text" id="keyword" name="keyword" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent font-medium text-gray-900 placeholder-gray-400 text-base transition-colors hover:border-purple-300"
                            placeholder="e.g. coffee shop near me">
                    </div>

                    <!-- Location Input -->
                    <div class="relative">
                        <label for="locationInput" class="block text-sm font-bold text-gray-700 mb-2">
                            Location
                        </label>
                        <input type="text" id="locationInput" autocomplete="off"
                            class="no-paste w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent font-medium text-gray-900 placeholder-gray-400 text-base transition-colors hover:border-purple-300"
                            placeholder="Enter city, country, or zip">
                        <input type="hidden" id="selectedUULE">
                        <div id="locationDropdown"
                            class="hidden absolute z-50 w-full mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 max-h-60 overflow-y-auto custom-scrollbar ring-1 ring-black/5">
                        </div>
                    </div>

                    <!-- Google Domain -->
                    <div>
                        <label for="googleDomain" class="block text-sm font-bold text-gray-700 mb-2">
                            Google Domain
                        </label>
                        <div class="relative">
                            <select id="googleDomain"
                                class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent font-medium text-gray-700 bg-white pr-10 cursor-pointer hover:border-purple-300 transition-colors">
                                <option value="google.com">Google.com (Global/USA)</option>
                                <option value="google.co.uk">Google.co.uk (United Kingdom)</option>
                                <option value="google.ca">Google.ca (Canada)</option>
                                <option value="google.com.au">Google.com.au (Australia)</option>
                                <option value="google.de">Google.de (Germany)</option>
                                <option value="google.fr">Google.fr (France)</option>
                                <option value="google.es">Google.es (Spain)</option>
                                <option value="google.it">Google.it (Italy)</option>
                                <option value="google.nl">Google.nl (Netherlands)</option>
                                <option value="google.com.br">Google.com.br (Brazil)</option>
                                <option value="google.co.jp">Google.co.jp (Japan)</option>
                                <option value="google.co.in">Google.co.in (India)</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-purple-600">
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
                                class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent font-medium text-gray-700 bg-white pr-10 cursor-pointer hover:border-purple-300 transition-colors">
                                <option value="desktop">Desktop</option>
                                <option value="mobile">Mobile (Smartphone)</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-purple-600">
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
                        class="btn-primary w-full px-8 py-4 rounded-xl flex items-center justify-center gap-3 transform hover:-translate-y-0.5 transition-all shadow-lg hover:shadow-xl text-lg font-bold">
                        <span>{{ __tool('google-serp-checker', 'form.button') }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                    <p class="text-center text-xs font-bold text-gray-400 mt-4 uppercase tracking-wider">
                        <span class="text-purple-600">✔</span> No Login Required &nbsp;•&nbsp; <span
                            class="text-purple-600">✔</span> Real-Time Results
                    </p>
                </div>
            </form>
        </div>

        <!-- SEO Content & Features -->
        <div
            class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">

            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Why Use Our Free Google SERP Checker?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    In the world of SEO, <span class="text-purple-600 font-bold">accuracy is everything</span>. Our
                    <strong>SERP analyzer</strong>
                    bypasses personalization algorithms to show you the <strong>true SERP rankings</strong> of your website.
                </p>
            </div>

            <!-- Feature Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Hyper-Local SERP Position Accuracy</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Rank for "pizza in midtown manhattan". We use advanced <strong>Google UULE parameters</strong>
                        to simulate precise localized <strong>SERP checking</strong>.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Mobile SERP Finder & Analysis</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Verify your rankings on iPhone and Android. Don't let <strong>Mobile-First Indexing</strong>
                        catch you off guard. Comprehensive <strong>mobile SERP analysis</strong>.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-green-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Global Google SERP Tracker</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Expanding? Check rankings across 190+ countries. Toggle between <strong>Google.co.uk, Google.de
                            (Kostenlos SERP Checker), Google.jp</strong> and more.
                    </p>
                </div>
            </div>

            <!-- SERP Features -->
            <div class="mb-16">
                <h3 class="text-2xl font-black text-gray-900 mb-8 border-b-2 border-purple-100 pb-4">Understanding Google
                    SERP Features</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white/80 p-6 rounded-xl border border-purple-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-purple-500">★</span> Featured Snippets
                        </h4>
                        <p class="text-sm text-gray-600">
                            Also known as "answer boxes", these appear about 12% of search queries. Our tool helps you check
                            if you own this prime real estate.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-purple-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-purple-500">📍</span> Local Pack
                        </h4>
                        <p class="text-sm text-gray-600">
                            The map-based list of 3 local businesses. Crucial for brick-and-mortar stores. Use our
                            "Location" feature to verify your presence.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-purple-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-purple-500">❓</span> People Also Ask
                        </h4>
                        <p class="text-sm text-gray-600">
                            Accordion-style questions related to the user's query. Ranking here can drive significant
                            awareness traffic. Use our **serp keyword checker** to identify these opportunities.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-purple-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-purple-500">ℹ️</span> Knowledge Panel
                        </h4>
                        <p class="text-sm text-gray-600">
                            Information boxes that appear on the right side of desktop results. Essential for brand
                            authority and entity SEO.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Deep Dive Content -->
            <div class="bg-white rounded-2xl p-8 mb-12 border-l-4 border-purple-500 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">What is a SERP Checker & Analyzer?</h3>
                <p class="mb-6 text-gray-700 leading-relaxed">
                    A <strong>Search Engine Results Page (SERP) Checker</strong> is an essential diagnostic tool for
                    SEO professionals and business owners. It allows you to use a <strong>website SERP checker</strong> to
                    view the results for a specific keyword
                    as they would appear to a neutral user in a specific geographic location.
                </p>

                <h4 class="text-lg font-bold text-gray-900 mb-3">The "Google Bubble" Problem</h4>
                <p class="mb-4 text-gray-700">
                    If you simply go to Google.com and search for your own keywords, the results are heavily biased.
                    Google customizes results based on <strong>Your IP Address</strong>, <strong>Search History</strong>,
                    and <strong>Device Type</strong>. This makes it hard to answer "<strong>what is my serp</strong>"
                    accurately without a tool.
                </p>
                <p class="text-gray-700 bg-purple-50 p-4 rounded-lg">
                    Our <strong>Free Google SERP Checker</strong> bursts this bubble. By using the <strong>UULE
                        parameter</strong>,
                    we generate a specially encoded string that tells Google exactly where to simulate the <strong>online
                        SERP tracking</strong> from,
                    giving you 100% clean, unbiased data.
                </p>
            </div>

            <!-- FAQ Section -->
            <div class="mb-8">
                <h3 class="text-3xl font-black text-center text-gray-900 mb-10">Freqeuntly Asked Questions</h3>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Is this SERP Tool Free for unlimited searches?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-purple-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Yes! Our **serp tool free** of charge allows you to check as many keywords as you like without
                            creating an account or paying a subscription fee. We believe in providing accessible **online
                            serp rank checker** tools for everyone.
                        </div>
                    </details>

                    <!-- FAQ Item 2 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>How does the SERP Position Tool location feature work?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-purple-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            We use Google's official <strong>UULE (Universal URL Location Encoded)</strong> parameter. When
                            you enter a city, we find its precise GPS coordinates and encode them into the search request,
                            forcing Google to show results as if you were physically standing in that city.
                        </div>
                    </details>

                    <!-- FAQ Item 3 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Why does my SERP Google Ranking look different on Mobile?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-purple-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Google uses <strong>Mobile-First Indexing</strong>, meaning it predominantly uses the mobile
                            version of the content for indexing and ranking. Mobile search results also have different
                            layouts (more ads, different snippets). Use our "Device" selector to verify your mobile presence
                            specifically with this **google serps tracker**.
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
        const selectedUULEInput = document.getElementById('selectedUULE');
        let searchTimeout;

        // Generate UULE
        function generateUULE(canonicalName) {
            const length = canonicalName.length;
            const secretKey = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";
            const key = secretKey[length % 65];
            const encodedName = btoa(canonicalName).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
            return `w+CAIQICI${key}${encodedName}`;
        }

        // Input handler with Debounce
        locationInput.addEventListener('input', function () {
            const query = this.value;
            locationDropdown.innerHTML = '';

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
                                div.className = 'px-4 py-3 hover:bg-purple-50 cursor-pointer text-sm font-medium text-gray-700 border-b border-gray-50 last:border-0 transition-colors pointer-events-auto';
                                div.textContent = loc.name;
                                div.onclick = () => {
                                    locationInput.value = loc.name;
                                    selectedUULEInput.value = generateUULE(loc.name);
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
            const domain = document.getElementById('googleDomain').value;
            const device = document.getElementById('deviceType').value;
            const uule = document.getElementById('selectedUULE').value;
            const gl = domain.split('.').pop() === 'com' ? 'us' : domain.split('.').pop(); // Simple GL fallbacks

            let url = `https://www.${domain}/search?q=${encodeURIComponent(keyword)}&gl=${gl}`;

            if (uule) {
                url += `&uule=${uule}`;
            }

            if (device === 'mobile') {
                // Open customized window for mobile simulation
                window.open(url, 'google_serp_mobile', 'width=414,height=896,menubar=no,toolbar=no,location=yes,status=yes,scrollbars=yes,resizable=yes,left=100,top=100');
            } else {
                window.open(url, '_blank');
            }
        }
    </script>

    <style>
        @keyframes shine {
            100% {
                transform: translateX(100%);
            }
        }

        .animate-shine {
            animation: shine 2s infinite;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d8b4fe;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #c084fc;
        }
    </style>
@endsection