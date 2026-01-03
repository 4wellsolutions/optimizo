@extends('layouts.app')

@section('title', 'Broken Links Checker - Check for Dead Links Instantly')
@section('meta_description', 'Scan your webpage for broken links (404 errors) to improve user experience and SEO rankings. Free online broken link checker tool.')
@section('meta_keywords', 'broken link checker, dead link checker, 404 checker, seo audit, link analyzer')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-orange-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <!-- Background Patterns (Simple circles like other tools) -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10">
                <!-- Icon and Title (Centered) -->
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                        <svg class="w-9 h-9 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </div>
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                        Broken Links Checker - Find Dead Links Instantly
                    </h1>
                    <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                        Scan your webpage for broken links (404 errors) to improve user experience and SEO rankings.
                    </p>
                </div>

                <!-- Social Share & Report Buttons (Bottom Row) -->
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <!-- Left: Share Buttons -->
                    <div class="flex items-center gap-3">
                        <span class="text-white/90 font-medium text-sm">Share:</span>

                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode('Check for broken links with this free tool!') }}" target="_blank"
                            class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                            title="Share on Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
                            class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                            title="Share on Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>

                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank"
                            class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                            title="Share on LinkedIn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>

                        <a href="https://wa.me/?text={{ urlencode('Check for broken links: ' . url()->current()) }}" target="_blank"
                            class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                            title="Share on WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Right: Report Button -->
                    <a href="mailto:support@optimizo.com?subject=Issue with Broken Links Checker&body=Please describe the issue:"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white text-sm font-semibold rounded-lg transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        Report
                    </a>
                </div>
            </div>
        </div>

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-100 mb-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-lg mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Scan Your Webpage</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Enter your webpage URL below to check for broken links and improve your SEO</p>
            </div>

            <form id="brokenLinksForm" class="max-w-3xl mx-auto">
                @csrf
                <div class="space-y-6">
                    <!-- URL Input -->
                    <div class="group">
                        <label for="urlInput"
                            class="block text-sm font-bold text-gray-600 uppercase tracking-wider mb-2 ml-1">
                            Webpage URL
                        </label>
                        <div class="relative transition-all duration-300 group-focus-within:-translate-y-1">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div>
                            <input type="url" name="url" id="urlInput" required placeholder="https://example.com/page"
                                class="w-full bg-gray-50 text-gray-900 placeholder-gray-400 border-2 border-gray-100 rounded-xl px-6 py-4 pl-14 outline-none focus:bg-white focus:border-red-500 focus:ring-4 focus:ring-red-500/10 transition-all font-semibold text-lg shadow-inner">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" id="submitBtn"
                            class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold text-xl rounded-xl px-8 py-5 shadow-xl shadow-gray-500/30 transform hover:scale-[1.01] active:scale-[0.99] transition-all duration-300 flex items-center justify-center gap-3">
                            <span id="btnText">Check for Broken Links</span>
                            <div id="btnLoading" class="hidden flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Scanning...
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Progress Section (Full Width) -->
        <div id="progressSection" class="hidden mb-8">
             <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-indigo-100">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-base font-bold text-gray-700" id="progressStatus">Extracting Links...</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-3xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent" id="progressPercent">0%</span>
                        <button id="stopBtn" class="hidden px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-bold rounded-lg transition-all shadow-md">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Stop
                        </button>
                    </div>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-6 overflow-hidden shadow-inner">
                    <div id="progressBar" class="bg-gradient-to-r from-indigo-600 to-purple-600 h-full w-0 transition-all duration-300 ease-out relative">
                        <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-3">
                    <div class="text-sm text-gray-500 font-medium">Processing links sequentially...</div>
                    <div class="text-sm font-bold text-gray-600">Processed <span id="processedCount" class="text-indigo-600">0</span> of <span id="totalCount" class="text-indigo-600">0</span> links</div>
                </div>
            </div>
        </div>

        <!-- Results Section -->
        <div id="resultsSection" class="hidden mb-12 scroll-mt-24">
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-md border-l-4 border-blue-500">
                    <div class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Total Links</div>
                    <div class="text-3xl font-black text-gray-800" id="statTotal">0</div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border-l-4 border-green-500">
                    <div class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Working (200)</div>
                    <div class="text-3xl font-black text-green-600" id="statWorking">0</div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border-l-4 border-yellow-500">
                    <div class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Redirects (3xx)</div>
                    <div class="text-3xl font-black text-yellow-600" id="statRedirects">0</div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border-l-4 border-red-500">
                    <div class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Broken (4xx/5xx)</div>
                    <div class="text-3xl font-black text-red-600" id="statBroken">0</div>
                </div>
            </div>

            <!-- Export Button (Hidden until done) -->
            <div id="actionArea" class="hidden flex justify-end mb-4">
                <button onclick="downloadCSV()"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-xl flex items-center shadow-lg transform hover:scale-105 transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download CSV Report
                </button>
            </div>

            <!-- Links Table -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 p-6 flex justify-between items-center bg-gray-50/50">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <div class="bg-red-100 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        Detailed Analysis
                    </h3>
                    <div class="flex space-x-2 text-xs">
                        <span class="flex items-center"><span class="w-2 h-2 rounded-full bg-green-500 mr-1"></span> 200
                            OK</span>
                        <span class="flex items-center"><span class="w-2 h-2 rounded-full bg-red-500 mr-1"></span>
                            404/Err</span>
                    </div>
                </div>
                <div class="max-h-[600px] overflow-y-auto">
                    <table class="w-full text-left border-collapse relative">
                        <thead class="sticky top-0 bg-gray-100 z-10 shadow-sm">
                            <tr class="text-gray-500 uppercase text-xs tracking-wider border-b border-gray-200">
                                <th class="p-4 font-bold w-32">Status</th>
                                <th class="p-4 font-bold">Link URL</th>
                                <th class="p-4 font-bold w-48">Anchor Text</th>
                                <th class="p-4 font-bold text-right w-24">Type</th>
                            </tr>
                        </thead>
                        <tbody id="linksTableBody" class="text-sm divide-y divide-gray-100">
                            <!-- Rows injected via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-red-100 shadow-2xl mb-12 mt-12">
            
            <!-- Introduction -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Why Check for Broken Links?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Broken links damage your website's credibility, user experience, and SEO performance. Our free broken link checker helps you identify and fix dead links before they hurt your rankings.
                </p>
            </div>

            <!-- Key Benefits Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-transparent hover:border-red-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-2xl mb-4">📉</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">User Experience</h3>
                    <p class="text-gray-600 leading-relaxed">Dead links frustrate users. When visitors click a link and see a 404 error, they lose trust in your site and are likely to leave immediately, increasing your bounce rate and reducing conversions.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-transparent hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-2xl mb-4">🤖</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">SEO Impact</h3>
                    <p class="text-gray-600 leading-relaxed">Search engines like Google view broken links as a sign of a neglected website. Too many dead links can negatively affect your crawl budget, page authority, and overall search rankings.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-transparent hover:border-green-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Site Maintenance</h3>
                    <p class="text-gray-600 leading-relaxed">Regular link checking helps maintain a professional website. Identify outdated content, removed pages, and external links that have changed or disappeared over time.</p>
                </div>
            </div>

            <!-- What is a Broken Link Checker -->
            <div class="bg-white rounded-2xl p-8 mb-12 border-l-4 border-red-500 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">What is a Broken Link Checker?</h3>
                <p class="mb-6 text-gray-700 leading-relaxed">
                    A <strong>broken link checker</strong> (also known as a <strong>dead link checker</strong> or <strong>link validator</strong>) is an essential SEO tool that scans your web pages to identify links that no longer work. These broken links typically return HTTP error codes like <strong>404 (Not Found)</strong>, <strong>410 (Gone)</strong>, or <strong>500 (Server Error)</strong>.
                </p>
                
                <h4 class="text-lg font-bold text-gray-900 mb-3">How Does It Work?</h4>
                <p class="mb-4 text-gray-700 leading-relaxed">
                    Our broken link checker tool works in three simple steps:
                </p>
                <ol class="list-decimal list-inside space-y-2 text-gray-700 mb-6 ml-4">
                    <li><strong>Extraction:</strong> We crawl your specified webpage and extract all hyperlinks (both internal and external)</li>
                    <li><strong>Validation:</strong> Each link is checked sequentially by sending HTTP requests to verify its status</li>
                    <li><strong>Reporting:</strong> Results are displayed in real-time with color-coded status indicators and exportable CSV reports</li>
                </ol>
                
                <div class="bg-red-50 p-4 rounded-lg">
                    <p class="text-sm text-red-900">
                        <strong>💡 Pro Tip:</strong> Run this checker regularly (monthly or quarterly) to catch broken links before they impact your SEO. Set up a maintenance schedule to keep your website healthy!
                    </p>
                </div>
            </div>

            <!-- Types of Broken Links -->
            <div class="mb-12">
                <h3 class="text-2xl font-black text-gray-900 mb-8 border-b-2 border-red-100 pb-4">Types of Broken Links</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white/80 p-6 rounded-xl border border-red-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-red-500">🔴</span> 404 Not Found
                        </h4>
                        <p class="text-sm text-gray-600">
                            The most common broken link error. The page existed before but has been deleted or moved without a proper redirect. This is the primary target of link checkers.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-red-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-orange-500">🟠</span> 410 Gone
                        </h4>
                        <p class="text-sm text-gray-600">
                            Similar to 404, but indicates the page was intentionally removed and won't be coming back. Search engines treat this differently than temporary 404s.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-red-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-yellow-500">🟡</span> 3xx Redirects
                        </h4>
                        <p class="text-sm text-gray-600">
                            While not "broken," redirect chains (multiple redirects) slow down page load times and can dilute link equity. Our tool identifies these for optimization.
                        </p>
                    </div>
                    <div class="bg-white/80 p-6 rounded-xl border border-red-50 hover:bg-white transition-colors">
                        <h4 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-purple-500">🟣</span> 500 Server Errors
                        </h4>
                        <p class="text-sm text-gray-600">
                            Indicates a problem with the destination server. These are often temporary but should be monitored as they create poor user experiences.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Common Causes -->
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-200 rounded-2xl p-8 mb-12">
                <h4 class="font-bold text-yellow-900 mb-4 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    Common Causes of Broken Links
                </h4>
                <ul class="text-yellow-800 leading-relaxed space-y-2">
                    <li>❌ <strong>Typos in URLs:</strong> Misspelled links during content creation or migration</li>
                    <li>❌ <strong>Deleted pages:</strong> Content removed without setting up 301 redirects</li>
                    <li>❌ <strong>Website restructuring:</strong> URL structure changes during redesigns</li>
                    <li>❌ <strong>External link rot:</strong> Third-party websites removing or moving their content</li>
                    <li>❌ <strong>Domain expiration:</strong> Linked websites going offline permanently</li>
                    <li>❌ <strong>Protocol changes:</strong> HTTP to HTTPS migrations without proper redirects</li>
                </ul>
            </div>

            <!-- Best Practices -->
            <div class="mb-12">
                <h3 class="text-3xl font-black text-gray-900 mb-8">Best Practices for Link Management</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">🔍</div>
                        <h4 class="font-bold text-gray-900 mb-2">Regular Audits</h4>
                        <p class="text-gray-600 text-sm">Schedule monthly or quarterly link checks to catch issues early. Set calendar reminders for consistent maintenance.</p>
                    </div>
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">↪️</div>
                        <h4 class="font-bold text-gray-900 mb-2">Use 301 Redirects</h4>
                        <p class="text-gray-600 text-sm">When moving or deleting pages, always implement proper 301 redirects to preserve link equity and user experience.</p>
                    </div>
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">📊</div>
                        <h4 class="font-bold text-gray-900 mb-2">Monitor External Links</h4>
                        <p class="text-gray-600 text-sm">Check external links more frequently as you have no control over third-party websites changing their content.</p>
                    </div>
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">📝</div>
                        <h4 class="font-bold text-gray-900 mb-2">Document Changes</h4>
                        <p class="text-gray-600 text-sm">Keep a log of broken links found and fixed to track patterns and prevent recurring issues.</p>
                    </div>
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">🔗</div>
                        <h4 class="font-bold text-gray-900 mb-2">Quality Over Quantity</h4>
                        <p class="text-gray-600 text-sm">Focus on linking to authoritative, stable sources. Avoid linking to low-quality sites that frequently change.</p>
                    </div>
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">⚙️</div>
                        <h4 class="font-bold text-gray-900 mb-2">Automate When Possible</h4>
                        <p class="text-gray-600 text-sm">Use tools and scripts to automatically check critical pages regularly and alert you to issues.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mb-8">
                <h3 class="text-3xl font-black text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
                        <summary class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>How often should I check for broken links?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-red-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            For most websites, checking for broken links <strong>monthly</strong> is sufficient. High-traffic sites or e-commerce platforms should check <strong>weekly</strong>. After major website updates, redesigns, or migrations, run an immediate check. Set up a regular schedule and stick to it!
                        </div>
                    </details>

                    <!-- FAQ Item 2 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
                        <summary class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Do broken links hurt my SEO rankings?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-red-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Yes, but indirectly. Google has stated that a few broken links won't directly harm rankings. However, <strong>many broken links</strong> signal poor site maintenance, which can:
                            <ul class="list-disc ml-6 mt-2 space-y-1">
                                <li>Increase bounce rates (a ranking factor)</li>
                                <li>Waste crawl budget on error pages</li>
                                <li>Reduce user trust and engagement</li>
                                <li>Break internal linking structure</li>
                            </ul>
                        </div>
                    </details>

                    <!-- FAQ Item 3 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
                        <summary class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>What's the difference between internal and external broken links?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-red-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            <strong>Internal broken links</strong> point to pages on your own domain and are fully under your control. These should be fixed immediately with redirects or updated links. <strong>External broken links</strong> point to other websites. You can't fix these directly, but you should either update them to working alternatives or remove them if no suitable replacement exists.
                        </div>
                    </details>

                    <!-- FAQ Item 4 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
                        <summary class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>Can I check broken links for my entire website?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-red-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            This tool checks <strong>one page at a time</strong> to provide fast, focused results. For full-site audits, you would need to check each important page individually or use enterprise SEO crawling tools. We recommend starting with your most important pages: homepage, top landing pages, and high-traffic content.
                        </div>
                    </details>

                    <!-- FAQ Item 5 -->
                    <details class="group bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">
                        <summary class="flex justify-between items-center font-bold text-gray-800 cursor-pointer list-none p-6 hover:bg-gray-50 transition-colors">
                            <span>What should I do when I find broken links?</span>
                            <span class="transition-transform duration-300 group-open:rotate-180 text-red-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="text-gray-600 p-6 pt-0 leading-relaxed">
                            Follow this priority order:
                            <ol class="list-decimal ml-6 mt-2 space-y-2">
                                <li><strong>Internal links:</strong> Set up 301 redirects to the new URL or update the link directly</li>
                                <li><strong>External links:</strong> Find an alternative working page or use archive.org to find the old content</li>
                                <li><strong>If no alternative:</strong> Remove the link and update surrounding content to maintain flow</li>
                                <li><strong>Document everything:</strong> Keep a log for future reference and pattern analysis</li>
                            </ol>
                        </div>
                    </details>
                </div>
            </div>

        </div>
    </div>

    <script>
        let allLinks = [];
        let processedCount = 0;

        document.getElementById('brokenLinksForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = this;
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnLoading = document.getElementById('btnLoading');
            const resultsSection = document.getElementById('resultsSection');
            const progressSection = document.getElementById('progressSection');
            const tbody = document.getElementById('linksTableBody');
            const actionArea = document.getElementById('actionArea');

            // Reset
            processedCount = 0;
            allLinks = [];
            tbody.innerHTML = '';
            document.getElementById('statTotal').innerText = '0';
            document.getElementById('statWorking').innerText = '0';
            document.getElementById('statRedirects').innerText = '0';
            document.getElementById('statBroken').innerText = '0';
            document.getElementById('progressPercent').innerText = '0%';
            document.getElementById('progressBar').style.width = '0%';
            document.getElementById('processedCount').innerText = '0';
            document.getElementById('totalCount').innerText = '0';
            document.getElementById('progressStatus').innerText = 'Extracting Links...';

            btn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            resultsSection.classList.add('hidden'); // Hide results until extraction done? No, maybe show empty structure
            progressSection.classList.remove('hidden');
            actionArea.classList.add('hidden');

            try {
                // Phase 1: Extract
                const formData = new FormData(form);
                const extractResponse = await fetch("{{ route('seo.broken-links.extract') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const extractData = await extractResponse.json();

                if (!extractResponse.ok) throw new Error(extractData.error || 'Extraction Failed');

                allLinks = extractData.links;
                const total = allLinks.length;

                document.getElementById('statTotal').innerText = total;
                document.getElementById('totalCount').innerText = total;
                document.getElementById('progressStatus').innerText = 'Checking Links...';
                
                // Show stop button
                const stopBtn = document.getElementById('stopBtn');
                stopBtn.classList.remove('hidden');
                let shouldStop = false;
                
                stopBtn.onclick = () => {
                    shouldStop = true;
                    stopBtn.disabled = true;
                    stopBtn.innerHTML = '<svg class="w-4 h-4 inline-block mr-1 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Stopping...';
                    document.getElementById('progressStatus').innerText = 'Stopping scan...';
                };

                // Render Initial Table (Pending Status)
                resultsSection.classList.remove('hidden');
                renderInitialRows(allLinks);

                // Phase 2: Check Links Sequentially (One at a time for resource efficiency)
                for (let i = 0; i < allLinks.length; i++) {
                    if (shouldStop) {
                        document.getElementById('progressStatus').innerText = 'Scan Stopped';
                        document.getElementById('progressBar').classList.remove('bg-gradient-to-r', 'from-indigo-600', 'to-purple-600');
                        document.getElementById('progressBar').classList.add('bg-yellow-500');
                        break;
                    }
                    
                    await checkLink(allLinks[i]);
                }

                // Phase 3: Done
                if (!shouldStop) {
                    document.getElementById('progressStatus').innerText = 'Scan Complete!';
                    document.getElementById('progressBar').classList.remove('bg-gradient-to-r', 'from-indigo-600', 'to-purple-600');
                    document.getElementById('progressBar').classList.add('bg-green-600');
                    actionArea.classList.remove('hidden');
                } else {
                    actionArea.classList.remove('hidden'); // Show export even if stopped
                }
                
                // Hide stop button
                stopBtn.classList.add('hidden');

            } catch (error) {
                console.error(error);
                alert('Error: ' + error.message);
            } finally {
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoading.classList.add('hidden');
                document.getElementById('stopBtn').classList.add('hidden');
            }
        });

        function renderInitialRows(links) {
            const tbody = document.getElementById('linksTableBody');
            let html = '';
            links.forEach((link, index) => {
                html += `
                        <tr id="row-${index}" class="hover:bg-gray-50/80 transition-colors border-b border-gray-100 last:border-0 opacity-60">
                            <td class="p-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-500 status-badge">
                                    <svg class="animate-spin -ml-1 mr-1 h-3 w-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg> Pending
                                </span>
                            </td>
                            <td class="p-4 max-w-xs truncate" title="${link.url}">
                                 <a href="${link.url}" target="_blank" class="text-gray-400 font-medium hover:underline pointer-events-none link-url">
                                    ${link.url}
                                </a>
                            </td>
                            <td class="p-4 text-gray-600 font-medium truncate">${link.text}</td>
                             <td class="p-4 text-right">
                                <span class="text-xs font-bold text-gray-500 bg-gray-100 px-3 py-1 rounded-full uppercase tracking-wide">
                                    ${link.is_internal ? 'Internal' : 'External'}
                                </span>
                            </td>
                        </tr>
                    `;
            });
            tbody.innerHTML = html;
        }

        async function checkLink(link) {
            // Find raw index in allLinks to update row
            const index = allLinks.indexOf(link);
            const row = document.getElementById(`row-${index}`);

            try {
                const response = await fetch("{{ route('seo.broken-links.status') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ url: link.url })
                });
                const data = await response.json();

                // Update Data Source
                allLinks[index].status = data.status;
                allLinks[index].health = data.health;

                // Update UI Row
                updateRow(row, data, link);
                updateStats();

            } catch (e) {
                console.error('Check failed', e);
                // Mark as error
                allLinks[index].status = 0;
                allLinks[index].health = 'broken';
                updateRow(row, { status: 0, health: 'broken' }, link);
                updateStats();
            }

            // Update Progress
            processedCount++;
            const percent = Math.round((processedCount / allLinks.length) * 100);
            document.getElementById('processedCount').innerText = processedCount;
            document.getElementById('progressPercent').innerText = percent + '%';
            document.getElementById('progressBar').style.width = percent + '%';
        }

        function updateRow(row, data, link) {
            row.classList.remove('opacity-60');
            const badgeCell = row.querySelector('.status-badge');
            const urlLink = row.querySelector('.link-url');

            let badgeClass = '';
            let icon = '';
            let statusText = data.status > 0 ? data.status : 'ERR';

            if (data.health === 'working') {
                badgeClass = 'bg-green-100 text-green-700 ring-1 ring-green-600/20';
                icon = '<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>';
            } else if (data.health === 'redirect') {
                badgeClass = 'bg-yellow-100 text-yellow-800 ring-1 ring-yellow-600/20';
                icon = '<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>';
            } else {
                badgeClass = 'bg-red-100 text-red-700 ring-1 ring-red-600/20 font-bold';
                icon = '<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            }

            badgeCell.className = `inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium status-badge ${badgeClass}`;
            badgeCell.innerHTML = `${icon} ${statusText}`;

            urlLink.classList.remove('text-gray-400', 'pointer-events-none');
            urlLink.classList.add('text-indigo-600');
        }

        function updateStats() {
            const working = allLinks.filter(l => l.health === 'working').length;
            const broken = allLinks.filter(l => l.health === 'broken').length;
            const redirects = allLinks.filter(l => l.health === 'redirect').length;

            document.getElementById('statWorking').innerText = working;
            document.getElementById('statBroken').innerText = broken;
            document.getElementById('statRedirects').innerText = redirects;
        }

        window.downloadCSV = function () {
            let csvContent = "data:text/csv;charset=utf-8,";
            csvContent += "URL,Text,Type,Status,Health\r\n";

            allLinks.forEach(function (link) {
                let row = [
                    `"${link.url}"`,
                    `"${link.text.replace(/"/g, '""')}"`,
                    link.is_internal ? 'Internal' : 'External',
                    link.status,
                    link.health
                ].join(",");
                csvContent += row + "\r\n";
            });

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "broken_links_report.csv");
            document.body.appendChild(link); // Required for FF
            link.click();
            document.body.removeChild(link);
        }
    </script>
@endsection