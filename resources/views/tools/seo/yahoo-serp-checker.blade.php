@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@section('meta_keywords', $tool->meta_keywords)

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-purple-700 via-indigo-600 to-blue-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <!-- Background Patterns -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Free Yahoo SERP Checker & Rank Tracker
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Check live rankings on <strong>Yahoo Search</strong>. Accurate <strong>Yahoo position</strong> tracking
                    from various global markets to boost your SEO strategy.
                </p>

                <div class="mt-4">
                    @include('components.hero-actions')
                </div>
            </div>
        </div>

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Live Yahoo Search Simulation</h2>
                <div class="h-1 w-16 bg-gradient-to-r from-purple-600 to-indigo-600 mx-auto rounded-full"></div>
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
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent font-medium text-gray-900 placeholder-gray-400 text-base transition-colors hover:border-indigo-300"
                            placeholder="e.g. best pizza recipe">
                    </div>

                    <!-- Location Input -->
                    <div class="relative">
                        <label for="locationInput" class="block text-sm font-bold text-gray-700 mb-2">
                            Location (City)
                        </label>
                        <input type="text" id="locationInput" autocomplete="off"
                            class="no-paste w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent font-medium text-gray-900 placeholder-gray-400 text-base transition-colors hover:border-indigo-300"
                            placeholder="Enter city (Optional)">
                        <!-- Yahoo location is less precise with parameters, but adding it to query helps -->
                        <div id="locationDropdown"
                            class="hidden absolute z-50 w-full mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 max-h-60 overflow-y-auto custom-scrollbar ring-1 ring-black/5">
                        </div>
                    </div>

                    <!-- Yahoo Domain/Market -->
                    <div>
                        <label for="yahooDomain" class="block text-sm font-bold text-gray-700 mb-2">
                            Yahoo Domain
                        </label>
                        <div class="relative">
                            <select id="yahooDomain"
                                class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent font-medium text-gray-700 bg-white pr-10 cursor-pointer hover:border-indigo-300 transition-colors">
                                <option value="search.yahoo.com" data-vc="us">Yahoo.com (USA/Global)</option>
                                <option value="uk.search.yahoo.com" data-vc="uk">Yahoo.co.uk (United Kingdom)</option>
                                <option value="ca.search.yahoo.com" data-vc="ca">Yahoo.ca (Canada)</option>
                                <option value="au.search.yahoo.com" data-vc="au">Yahoo.com.au (Australia)</option>
                                <option value="de.search.yahoo.com" data-vc="de">Yahoo.de (Germany)</option>
                                <option value="fr.search.yahoo.com" data-vc="fr">Yahoo.fr (France)</option>
                                <option value="it.search.yahoo.com" data-vc="it">Yahoo.it (Italy)</option>
                                <option value="es.search.yahoo.com" data-vc="es">Yahoo.es (Spain)</option>
                                <option value="br.search.yahoo.com" data-vc="br">Yahoo.com.br (Brazil)</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-indigo-600">
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
                                class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent font-medium text-gray-700 bg-white pr-10 cursor-pointer hover:border-indigo-300 transition-colors">
                                <option value="desktop">Desktop</option>
                                <option value="mobile">Mobile (Smartphone)</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-indigo-600">
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
                        class="btn-primary w-full px-8 py-4 rounded-xl flex items-center justify-center gap-3 transform hover:-translate-y-0.5 transition-all shadow-lg hover:shadow-xl text-lg font-bold bg-indigo-600 hover:bg-indigo-700 text-white border-none">
                        <span>Check Yahoo Rankings</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                    <p class="text-center text-xs font-bold text-gray-400 mt-4 uppercase tracking-wider">
                        <span class="text-indigo-600">✔</span> No Login Required &nbsp;•&nbsp; <span
                            class="text-indigo-600">✔</span> Real-Time Results
                    </p>
                </div>
            </form>
        </div>

        <!-- content blocks -->
        <div
            class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Why Use Our Free Yahoo SERP Checker?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Yahoo is powered by Bing but maintains its own unique audience layer. Our <span
                        class="text-indigo-600 font-bold">Yahoo Rank Tracker</span> is crucial for complete search
                    visibility.
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
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Targeted Local Search</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Simulate searches from "Miami" or "Chicago". We append location specific queries to help you see
                        what local users see on Yahoo.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Yahoo Mobile View</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Yahoo's mobile interface is distinct. Check your mobile rankings to ensure your site is optimized
                        for Yahoo's mobile users.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-2 border-transparent hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">International Yahoo</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Check results on Yahoo.co.uk, Yahoo.fr, Yahoo.jp and more. Full support for international Yahoo
                        domains.
                    </p>
                </div>
            </div>

            <!-- Deep Dive Content -->
            <div class="bg-white rounded-2xl p-8 mb-12 border-l-4 border-indigo-500 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Why Yahoo SEO Matters?</h3>
                <p class="mb-6 text-gray-700 leading-relaxed">
                    Yahoo remains a top traffic source for news, finance, and sports. Its user base is loyal and distinct
                    from Google's. ignoring Yahoo means leaving traffic on the table.
                </p>
                <h4 class="text-lg font-bold text-gray-900 mb-3">Is Yahoo the same as Bing?</h4>
                <p class="mb-4 text-gray-700">
                    Mostly, yes. Yahoo Search is powered by Bing's index. However, the <strong>user interface, ads, and
                        localized content</strong> wrapping the results are different. Our tool helps you verify the final
                    presentation.
                </p>
            </div>

            <!-- FAQ Section -->
            <div class="mb-8">
                <h3 class="text-3xl font-black text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-indigo-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Is this Yahoo SERP Checker Free?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-indigo-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Yes! Our **yahoo rank tracker** is 100% free. Check your rankings on Yahoo as often as you need
                            without any hidden fees or subscriptions.
                        </div>
                    </details>

                    <!-- FAQ Item 2 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-indigo-100 overflow-hidden">
                        <summary
                            class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>How do I improve my Yahoo Ranking?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-indigo-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Since Yahoo is powered by Bing, focus on Bing SEO best practices: clear technical SEO,
                            authoritative backlinks, and relevant content. Using this tool to monitor progress is a great
                            start.
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
        const yahooDomainSelect = document.getElementById('yahooDomain');
        let searchTimeout;

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
                                div.className = 'px-4 py-3 hover:bg-indigo-50 cursor-pointer text-sm font-medium text-gray-700 border-b border-gray-50 last:border-0 transition-colors pointer-events-auto';
                                div.textContent = loc.name;
                                div.onclick = () => {
                                    locationInput.value = loc.name;
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
            const domain = yahooDomainSelect.value;
            const selectedOption = yahooDomainSelect.options[yahooDomainSelect.selectedIndex];
            const vc = selectedOption.getAttribute('data-vc');
            const device = document.getElementById('deviceType').value;
            const location = locationInput.value;

            // Yahoo URL construction
            // https://search.yahoo.com/search?p=KEYWORD&vc=US

            let finalQuery = keyword;
            if (location && location.trim() !== '') {
                finalQuery += ` ${location}`; // Append location to query for Yahoo
            }

            let url = `https://${domain}/search?p=${encodeURIComponent(finalQuery)}`;
            if (vc) {
                url += `&vc=${vc}`;
            }

            if (device === 'mobile') {
                // Open customized window for mobile simulation
                window.open(url, 'yahoo_serp_mobile', 'width=414,height=896,menubar=no,toolbar=no,location=yes,status=yes,scrollbars=yes,resizable=yes,left=100,top=100');
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
            background: #a5b4fc;
            /* indigo-300 */
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #818cf8;
            /* indigo-400 */
        }
    </style>
@endsection