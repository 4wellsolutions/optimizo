@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-purple-500 via-pink-500 to-red-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Redirect & HTTP Status Checker
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Analyze redirects, check HTTP status codes, detect loops, and verify canonical domains!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Enter URL(s) to Check (One per line, max 10)
                </label>
                <textarea id="urlInput" rows="6"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent font-mono text-sm"
                    placeholder="https://example.com&#10;https://another-site.com&#10;https://third-site.com"></textarea>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xs text-gray-500" id="urlCount">0 / 10 URLs</span>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="checkCanonical"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-700">Also check domain canonical (www vs non-www)</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        User Agent
                    </div>
                </label>
                <div class="relative">
                    <select id="userAgent"
                        class="appearance-none w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm bg-white pr-10 cursor-pointer hover:border-purple-300 transition-colors">
                        <option value="">Default (Browser)</option>
                        <option value="Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)">Googlebot
                            (Google)</option>
                        <option value="Mozilla/5.0 (compatible; Bingbot/2.0; +http://www.bing.com/bingbot.htm)">Bingbot
                            (Bing)</option>
                        <option value="facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)">Facebook
                            Crawler</option>
                        <option
                            value="Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1">
                            iPhone (Safari)</option>
                        <option
                            value="Mozilla/5.0 (Linux; Android 10; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Mobile Safari/537.36">
                            Android (Chrome)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-purple-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <button onclick="checkURLs()" class="btn-primary w-full px-8 py-3 mb-8 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span>Check URLs</span>
            </button>

            <!-- Loading State -->
            <div id="loading" class="hidden text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-purple-600"></div>
                <p class="mt-4 text-gray-600" id="loadingText">Analyzing URL...</p>
                <div id="bulkProgress" class="hidden mt-4">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="progressBar" class="bg-purple-600 h-2 rounded-full transition-all" style="width: 0%"></div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2" id="progressText">0 / 0 URLs checked</p>
                </div>
            </div>

            <!-- Results Container -->
            <div id="resultsContainer" class="hidden space-y-4 mt-8">
                <!-- Results will be injected here -->
            </div>

            <!-- Bulk Results (Hidden by default, used for export logic mostly, but we render directly to resultsContainer now) -->
            <div id="bulkResults" class="hidden"></div>

            @include('components.hero-actions')
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Redirect & HTTP Status Checker Tool</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Complete URL analysis with redirect tracing, status
                    code checking, and loop detection</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Analyze HTTP status codes, trace redirect chains, detect 301 and 302 redirects, identify broken links, and
                find redirect loops with our comprehensive free tool. Essential for SEO optimization, website debugging,
                migration planning, and ensuring proper URL structure. Check any URL instantly to see the complete redirect
                path, response codes, and potential issues.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Key Features</h3>
            <div class="grid md:grid-cols-2 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bulk URL Checking</h4>
                    <p class="text-gray-600 text-sm">Check up to 10 URLs simultaneously with progress tracking</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Canonical Domain Check</h4>
                    <p class="text-gray-600 text-sm">Verify www vs non-www consistency for SEO</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">Loop Detection</h4>
                    <p class="text-gray-600 text-sm">Visual diagram showing exact redirect loop patterns</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Complete Chain Analysis</h4>
                    <p class="text-gray-600 text-sm">Trace full redirect paths with status codes and timing</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">What Are HTTP Redirects?</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                HTTP redirects are server responses that tell browsers and search engines that a requested URL has moved to
                a
                different location. When you visit a URL that redirects, your browser automatically follows the redirect
                chain
                until it reaches the final destination. Redirects are essential for website maintenance, URL restructuring,
                and SEO preservation during site migrations.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Understanding HTTP Status Codes</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-green-200">
                    <h4 class="font-bold text-green-900 mb-2">✅ 2xx Success Codes</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>200 OK:</strong> Request successful, page loaded</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>201 Created:</strong> Resource successfully created</p>
                    <p class="text-gray-700 text-sm">These indicate successful requests with no issues</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-blue-200">
                    <h4 class="font-bold text-blue-900 mb-2">🔄 3xx Redirect Codes</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>301:</strong> Permanent redirect (SEO-friendly)</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>302:</strong> Temporary redirect</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>307/308:</strong> Temporary/Permanent (method preserved)
                    </p>
                    <p class="text-gray-700 text-sm">URL has moved to a new location</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-yellow-200">
                    <h4 class="font-bold text-yellow-900 mb-2">⚠️ 4xx Client Error Codes</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>404 Not Found:</strong> Page doesn't exist</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>403 Forbidden:</strong> Access denied</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>410 Gone:</strong> Permanently removed</p>
                    <p class="text-gray-700 text-sm">Request error on client side</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-red-200">
                    <h4 class="font-bold text-red-900 mb-2">❌ 5xx Server Error Codes</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>500 Internal Server Error:</strong> Server crashed</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>502 Bad Gateway:</strong> Invalid response</p>
                    <p class="text-gray-700 text-sm mb-2"><strong>503 Service Unavailable:</strong> Server overloaded</p>
                    <p class="text-gray-700 text-sm">Server-side errors</p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">301 vs 302 Redirects: Which to Use?</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-purple-200">
                    <h4 class="font-bold text-purple-900 mb-2">🔗 301 Permanent Redirect</h4>
                    <p class="text-gray-700 text-sm mb-3">
                        <strong>When to use:</strong> Content permanently moved to a new URL
                    </p>
                    <ul class="text-gray-700 text-sm space-y-1 mb-3">
                        <li>• Passes 90-99% of link equity (SEO value)</li>
                        <li>• Search engines update their index</li>
                        <li>• Browsers cache the redirect</li>
                        <li>• Best for site migrations and URL changes</li>
                    </ul>
                    <p class="text-gray-700 text-sm">
                        <strong>SEO Impact:</strong> Positive - preserves rankings
                    </p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-pink-200">
                    <h4 class="font-bold text-pink-900 mb-2">🔄 302 Temporary Redirect</h4>
                    <p class="text-gray-700 text-sm mb-3">
                        <strong>When to use:</strong> Content temporarily at different URL
                    </p>
                    <ul class="text-gray-700 text-sm space-y-1 mb-3">
                        <li>• Does NOT pass full link equity</li>
                        <li>• Search engines keep original URL indexed</li>
                        <li>• Not cached by browsers</li>
                        <li>• Use for A/B testing, maintenance pages</li>
                    </ul>
                    <p class="text-gray-700 text-sm">
                        <strong>SEO Impact:</strong> Neutral - temporary change
                    </p>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Check Redirects?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>SEO Optimization:</strong> Ensure redirects pass link equity and don't harm rankings</li>
                <li><strong>Site Migrations:</strong> Verify all old URLs properly redirect to new locations</li>
                <li><strong>Broken Link Detection:</strong> Find 404 errors and broken redirect chains</li>
                <li><strong>Performance Issues:</strong> Identify excessive redirect chains slowing page load</li>
                <li><strong>Redirect Loop Detection:</strong> Catch circular redirects causing infinite loops</li>
                <li><strong>Security Audits:</strong> Verify redirect destinations and prevent malicious redirects</li>
                <li><strong>User Experience:</strong> Ensure visitors reach intended content quickly</li>
                <li><strong>Analytics Accuracy:</strong> Confirm tracking codes work through redirect chains</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">What Are Redirect Chains?</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                A redirect chain occurs when a URL redirects to another URL, which then redirects to another, and so on. For
                example: URL A → URL B → URL C → Final URL. Each hop in the chain adds latency and dilutes SEO value. Best
                practice is to redirect directly to the final destination (URL A → Final URL) to minimize load time and
                preserve maximum link equity.
            </p>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <p class="text-gray-700 leading-relaxed mb-2">
                    <strong>Recommended:</strong> 0-1 redirects (direct or single hop)
                </p>
                <p class="text-gray-700 leading-relaxed mb-2">
                    <strong>Acceptable:</strong> 2-3 redirects (minor performance impact)
                </p>
                <p class="text-gray-700 leading-relaxed">
                    <strong>Problematic:</strong> 4+ redirects (significant SEO and speed issues)
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">What Are Redirect Loops?</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                A redirect loop happens when URL A redirects to URL B, which redirects back to URL A, creating an infinite
                cycle. Browsers detect this and show an error like "Too many redirects" or "Redirect loop detected." Common
                causes include misconfigured .htaccess rules, conflicting redirect plugins, incorrect server settings, or
                HTTPS/HTTP redirect conflicts. Our tool detects these loops instantly.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Common Redirect Issues & Solutions</h3>
            <div class="space-y-3 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🔴 Redirect Chain Too Long</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Problem:</strong> Multiple redirects slow page load and
                        hurt SEO</p>
                    <p class="text-gray-700 text-sm"><strong>Solution:</strong> Update redirects to point directly to final
                        destination</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🔴 Mixed 301 and 302 Redirects</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Problem:</strong> Inconsistent redirect types confuse
                        search engines</p>
                    <p class="text-gray-700 text-sm"><strong>Solution:</strong> Use 301 for permanent moves, 302 only for
                        temporary</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🔴 Redirect to 404 Error</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Problem:</strong> Redirect points to non-existent page</p>
                    <p class="text-gray-700 text-sm"><strong>Solution:</strong> Update redirect to valid destination or
                        remove it</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">🔴 HTTPS/HTTP Redirect Loop</h4>
                    <p class="text-gray-700 text-sm mb-2"><strong>Problem:</strong> Site redirects between HTTP and HTTPS
                        infinitely</p>
                    <p class="text-gray-700 text-sm"><strong>Solution:</strong> Fix SSL configuration and .htaccess rules
                    </p>
                </div>
            </div>

            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-yellow-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    SEO Best Practices for Redirects
                </h4>
                <ul class="text-yellow-800 text-sm leading-relaxed space-y-2">
                    <li>• Always use 301 redirects for permanent URL changes to preserve SEO value</li>
                    <li>• Minimize redirect chains - redirect directly to final destination when possible</li>
                    <li>• Avoid redirect loops at all costs - they break user experience and SEO</li>
                    <li>• Update internal links instead of relying on redirects</li>
                    <li>• Monitor redirect performance regularly with tools like this</li>
                    <li>• Keep redirects active for at least 1 year after URL changes</li>
                    <li>• Use 302 redirects sparingly and only for truly temporary situations</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How many redirects are too many?</h4>
                    <p class="text-gray-700 leading-relaxed">Google recommends keeping redirect chains to a maximum of 3-5
                        hops, but ideally you should have 0-1 redirects. Each redirect adds latency (typically 100-300ms)
                        and
                        dilutes link equity by approximately 10-15% per hop.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do redirects hurt SEO?</h4>
                    <p class="text-gray-700 leading-relaxed">301 redirects are SEO-friendly and pass 90-99% of link equity
                        to
                        the destination URL. However, long redirect chains, redirect loops, and excessive 302 redirects can
                        harm SEO by slowing page load and confusing search engines.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What causes redirect loops?</h4>
                    <p class="text-gray-700 leading-relaxed">Common causes include misconfigured .htaccess or nginx rules,
                        conflicting WordPress plugins, incorrect HTTPS redirects, CDN configuration errors, or circular
                        redirect rules where URL A points to URL B which points back to URL A.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Should I use 301 or 302 for site maintenance?</h4>
                    <p class="text-gray-700 leading-relaxed">Use 302 (or 503 Service Unavailable) for temporary maintenance
                        pages. This tells search engines the change is temporary and they should keep the original URL
                        indexed.
                        Never use 301 for maintenance as it signals permanent removal.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How do I fix a broken redirect chain?</h4>
                    <p class="text-gray-700 leading-relaxed">Identify the broken link in the chain (usually a 404 or 500
                        error), then update the redirect rule to skip the broken URL and point directly to a working
                        destination. Test the entire chain after making changes.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .tab-btn {
            border-bottom-color: transparent;
            color: #6b7280;
            transition: all 0.2s;
        }

        .tab-btn:hover {
            color: #9333ea;
            border-bottom-color: #e9d5ff;
        }

        .tab-btn.active {
            color: #9333ea;
            border-bottom-color: #9333ea;
        }
    </style>

    <script>
        // Global data storage
        let resultsStore = [];

        // Updated helper to get status badge class
        function getStatusBadgeClass(hop) {
            const status = hop.status;
            if (status === 'Loop' || status === 'LOOP') return 'bg-red-500 text-white';
            if (status >= 200 && status < 300) return 'bg-green-600 text-white';
            if (status >= 300 && status < 400) return 'bg-yellow-500 text-white';
            if (status >= 400 && status < 600) return 'bg-red-500 text-white';
            return 'bg-gray-500 text-white';
        }

        // Updated helper for icon
        function getStatusIconSVG(hop) {
            if (hop.isRedirect) return `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>`; // Shuffle/Redirect icon
            if (hop.isSuccess) return `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>`; // Check icon
            if (hop.isBroken || hop.isLoop) return `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>`; // X icon
            return '';
        }

        async function checkURLs() {
            const input = document.getElementById('urlInput').value.trim();
            let urls = input.split('\n').filter(url => url.trim());
            const canonicalCheck = document.getElementById('checkCanonical').checked;

            if (urls.length === 0) {
                alert('Please enter at least one URL');
                return;
            }

            // Limit to 10
            urls = urls.slice(0, 10);

            // Show loading
            document.getElementById('loading').classList.remove('hidden');
            document.getElementById('resultsContainer').classList.add('hidden');
            document.getElementById('resultsContainer').innerHTML = ''; // Clear previous
            resultsStore = [];

            // Determine check mode
            if (canonicalCheck) {
                // Canonical Check Mode - check all 4 versions for each URL
                document.getElementById('bulkProgress').classList.remove('hidden');
                let totalChecks = 0;
                const totalUrls = urls.length;

                for (const url of urls) {
                    await runCanonicalCheck(url);
                    totalChecks++;
                    const progress = (totalChecks / totalUrls) * 100;
                    document.getElementById('progressBar').style.width = progress + '%';
                    document.getElementById('progressText').textContent = `${totalChecks} / ${totalUrls} domains checked`;
                }

                document.getElementById('loading').classList.add('hidden');
                renderResults();
            } else {
                // Normal Check Mode (Single or Bulk)
                await runBulkCheck(urls);
            }
        }

        async function runCanonicalCheck(url) {
            try {
                const response = await fetch('{{ route('network.redirect-checker.canonical') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        url: url,
                        user_agent: document.getElementById('userAgent').value
                    })
                });

                if (!response.ok) throw new Error('Investigation failed');
                const data = await response.json();

                // data.versions is array of check results (now with full chains)
                // Append to resultsStore instead of replacing
                
                // Extract base domain for grouping
                const parsedUrl = new URL(url.startsWith('http') ? url : 'https://' + url);
                const baseDomain = parsedUrl.hostname.replace(/^www\./, '');

                const newResults = data.versions.map(v => ({
                    originalUrl: v.url,
                    chain: v.chain,
                    error: v.error,
                    isCanonical: true,
                    baseDomain: baseDomain
                }));


                resultsStore.push(...newResults);

            } catch (e) {
                console.error(e);
                alert('Error checking canonical versions for: ' + url);
            }
        }

        async function runBulkCheck(urls) {
            let completed = 0;
            // Show progress bar
            document.getElementById('bulkProgress').classList.remove('hidden');

            for (const url of urls) {
                try {
                    // Normalize URL
                    let checkUrl = url.trim();
                    if (!checkUrl.match(/^https?:\/\//i)) checkUrl = 'https://' + checkUrl;

                    // Call standard check API
                    const response = await fetch('{{ route('network.redirect-checker.check') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            url: checkUrl,
                            user_agent: document.getElementById('userAgent').value
                        })
                    });

                    if (!response.ok) throw new Error('Failed');
                    const data = await response.json();

                    resultsStore.push({
                        originalUrl: url,
                        chain: data.chain,
                        // ... stats
                    });

                } catch (e) {
                    resultsStore.push({
                        originalUrl: url,
                        error: e.message
                    });
                }

                completed++;
                const progress = (completed / urls.length) * 100;
                document.getElementById('progressBar').style.width = progress + '%';
                document.getElementById('progressText').textContent = `${completed} / ${urls.length} URLs checked`;
            }

            document.getElementById('loading').classList.add('hidden');
            renderResults();
        }

        function renderResults() {
            const container = document.getElementById('resultsContainer');
            container.innerHTML = '';
            container.classList.remove('hidden');

            let lastBaseDomain = null;

            resultsStore.forEach((result, index) => {
                // Check if we need a domain header (for canonical checks)
                if (result.isCanonical && result.baseDomain !== lastBaseDomain) {
                    const headerEl = document.createElement('div');
                    headerEl.className = 'mt-6 mb-3 flex items-center gap-2 px-1';
                    headerEl.innerHTML = `
                        <div class="h-px bg-gray-200 flex-grow"></div>
                        <span class="text-sm font-bold text-gray-500 uppercase tracking-wider bg-gray-50 px-3 rounded-full border border-gray-200">
                            ${result.baseDomain}
                        </span>
                        <div class="h-px bg-gray-200 flex-grow"></div>
                    `;
                    container.appendChild(headerEl);
                    lastBaseDomain = result.baseDomain;
                }

                // Determine display data
                let finalStatus = 'Unknown';
                let finalStatusClass = 'bg-gray-500';
                let chain = [];

                if (result.error) {
                    finalStatus = 'Error';
                    finalStatusClass = 'bg-red-500 text-white';
                } else if (result.chain) {
                    chain = result.chain;
                    const finalHop = chain[chain.length - 1];
                    finalStatus = finalHop.status;
                    finalStatusClass = getStatusBadgeClass(finalHop);
                }

                const resultEl = document.createElement('div');
                resultEl.className = 'bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden';

                // Header Row
                const displayUrl = result.originalUrl || (chain[0] ? chain[0].url : 'Unknown URL');
                const hasChain = chain.length > 1;

                resultEl.innerHTML = `
                                        <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition-colors" onclick="toggleChain(${index})">
                                            <div class="flex items-center gap-3 overflow-hidden">
                                                <div class="text-gray-400">
                                                    ${hasChain ? '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>' : ''}
                                                </div>
                                                <div class="font-mono text-sm text-gray-700 truncate pr-4">${displayUrl}</div>
                                            </div>
                                            <div class="flex items-center gap-3 shrink-0">
                                                ${hasChain ? `<button class="text-gray-400 hover:text-purple-600 transition-transform duration-200" id="chevron-${index}">
                                                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                                </button>` : ''}
                                                <span class="px-2.5 py-1 rounded text-xs font-bold ${finalStatusClass}">${finalStatus}</span>
                                                <button onclick="copyToClipboard('${displayUrl}', event)" class="text-gray-400 hover:text-gray-600" title="Copy URL">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                                </button>
                                            </div>
                                        </div>

                                        ${hasChain ? `
                                        <div id="chain-${index}" class="hidden bg-gray-50 border-t border-gray-100">
                                            ${renderChainSteps(chain)}
                                        </div>
                                        ` : ''}
                                    `;

                container.appendChild(resultEl);
            });
        }

        function renderChainSteps(chain) {
            return chain.map((hop, i) => `
                                    <div class="p-3 pl-8 border-b border-gray-100 last:border-0 flex items-center justify-between hover:bg-gray-100 transition-colors">
                                        <div class="flex items-center gap-3 overflow-hidden">
                                            <div class="${hop.isRedirect ? 'text-blue-500' : (hop.isSuccess ? 'text-green-500' : 'text-gray-400')}">
                                                 ${getStatusIconSVG(hop)}
                                            </div>
                                            <div class="font-mono text-xs text-gray-600 truncate">${hop.url}</div>
                                        </div>
                                        ${hop.status !== '???' ? `<span class="px-2 py-0.5 rounded text-[10px] font-bold ${getStatusBadgeClass(hop)}">${hop.status}</span>` : ''}
                                    </div>
                                `).join('');
        }

        function toggleChain(index) {
            const chainEl = document.getElementById(`chain-${index}`);
            const chevron = document.getElementById(`chevron-${index}`);
            if (chainEl) {
                chainEl.classList.toggle('hidden');
                if (chevron) {
                    chevron.classList.toggle('rotate-180');
                }
            }
        }

        function copyToClipboard(text, e) {
            e.stopPropagation();
            navigator.clipboard.writeText(text);
            // Could show a toast
        }

        // Allow Enter key to trigger check (Ctrl+Enter for multi-line input)
        document.getElementById('urlInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                e.preventDefault();
                checkURLs();
            }
        });

        // Restore URL Counter
        const urlInput = document.getElementById('urlInput');
        if (urlInput) {
            urlInput.addEventListener('input', function () {
                const urls = this.value.trim().split('\n').filter(url => url.trim());
                const count = Math.min(urls.length, 10);
                document.getElementById('urlCount').textContent = `${count} / 10 URLs`;
            });
        }
    </script>
@endsection