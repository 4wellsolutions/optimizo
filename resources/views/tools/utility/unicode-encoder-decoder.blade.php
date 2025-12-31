@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Unicode Encoder & Decoder
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Encode and decode Unicode escape sequences instantly - 100% free, secure, and fast!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Encode Unicode
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    Decode Unicode
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="unicodeInput" class="form-label text-base" id="inputLabel">Enter Text to Encode</label>
                <textarea id="unicodeInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="Hello 世界"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processURL()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">Encode Unicode</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>Copy</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="unicodeOutput" class="form-label text-base" id="outputLabel">Encoded Unicode</label>
                <textarea id="unicodeOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="Processed Unicode will appear here..."></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Unicode Encoder & Decoder</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Encode and decode Unicode escape sequences for JavaScript
                    and JSON</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free URL Encoder & Decoder tool helps you encode special characters in URLs for safe transmission over
                the internet, or decode encoded URLs back to their original format. Perfect for developers, SEO
                professionals, and anyone working with web URLs. 100% free, client-side processing ensures your data stays
                private.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔗 What is URL Encoding?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                URL encoding (also called percent-encoding) converts special characters in URLs into a format that can be
                transmitted over the internet. Spaces become %20, special characters like & become %26, and so on. This
                ensures URLs work correctly across all browsers and systems.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Encode or decode URLs in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bidirectional</h4>
                    <p class="text-gray-600 text-sm">Encode to URL format or decode back to original</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">One-Click Copy</h4>
                    <p class="text-gray-600 text-sm">Copy encoded/decoded URLs instantly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration required</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Universal Support</h4>
                    <p class="text-gray-600 text-sm">Works with all URL formats and characters</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔗 Query Parameters</h4>
                    <p class="text-gray-700 leading-relaxed">Encode special characters in URL query strings for API calls
                        and web requests</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 Analytics Tracking</h4>
                    <p class="text-gray-700 leading-relaxed">Encode UTM parameters and tracking URLs for marketing campaigns
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔐 Authentication</h4>
                    <p class="text-gray-700 leading-relaxed">Encode credentials and tokens in OAuth and API authentication
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌍 Internationalization</h4>
                    <p class="text-gray-700 leading-relaxed">Encode non-ASCII characters in URLs for global compatibility
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔍 SEO & Redirects</h4>
                    <p class="text-gray-700 leading-relaxed">Create properly encoded redirect URLs and canonical links</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📧 Email Links</h4>
                    <p class="text-gray-700 leading-relaxed">Encode mailto links with subject lines and body content</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Choose Mode:</strong> Select "Encode URL" or "Decode URL" based on your need</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Enter URL:</strong> Paste your URL or text in the input field</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>Process:</strong> Click "Encode URL" or "Decode URL" button</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Copy Result:</strong> Click "Copy" to copy the processed URL to clipboard</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Use Anywhere:</strong> Paste the encoded/decoded URL in your application</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 URL Encoding Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Space Character:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "Hello World" → Encoded:
                            "Hello%20World"</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Special Characters:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "name=John&age=30" →
                            Encoded: "name%3DJohn%26age%3D30"</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Full URL:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original:
                            "https://example.com/search?q=hello world" → Encoded:
                            "https%3A%2F%2Fexample.com%2Fsearch%3Fq%3Dhello%20world"</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I encode URLs?</h4>
                    <p class="text-gray-700 leading-relaxed">Encode URLs when passing them as query parameters, storing them
                        in databases, or when they contain special characters like spaces, &, =, ?, or non-ASCII characters.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What characters need encoding?</h4>
                    <p class="text-gray-700 leading-relaxed">Reserved characters like : / ? # [ ] @ ! $ & ' ( ) * + , ; =
                        and unsafe characters like spaces, <,>, ", {, }, |, \, ^, `, and non-ASCII characters must be
                            encoded.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is URL encoding the same as Base64?</h4>
                    <p class="text-gray-700 leading-relaxed">No. URL encoding converts specific characters to %XX format,
                        while Base64 encodes entire data into a different character set. They serve different purposes.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I encode entire URLs?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, but typically you only encode the query string portion.
                        Encoding the entire URL including protocol (https://) is less common and may cause issues.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All encoding and decoding happens entirely in your browser
                        using JavaScript. Your URLs never leave your device or get sent to any server.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentMode = 'encode';

        function setMode(mode) {
            currentMode = mode;
            const encodeBtn = document.getElementById('encodeBtn');
            const decodeBtn = document.getElementById('decodeBtn');
            const inputLabel = document.getElementById('inputLabel');
            const outputLabel = document.getElementById('outputLabel');
            const processBtn = document.getElementById('processBtn');

            if (mode === 'encode') {
                encodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                encodeBtn.classList.add('bg-blue-600', 'text-white');
                decodeBtn.classList.remove('bg-blue-600', 'text-white');
                decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter Text to Encode';
                outputLabel.textContent = 'Encoded Unicode';
                processBtn.textContent = 'Encode Unicode';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter Unicode to Decode';
                outputLabel.textContent = 'Decoded Text';
                processBtn.textContent = 'Decode Unicode';
            }
            clearAll();
        }

        function processURL() {
            const input = document.getElementById('unicodeInput').value.trim();
            const output = document.getElementById('unicodeOutput');

            if (!input) {
                showStatus('Please enter text to process', 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    let encoded = '';
                    for (let i = 0; i < input.length; i++) {
                        const code = input.charCodeAt(i);
                        if (code > 127) {
                            encoded += '\\u' + ('0000' + code.toString(16)).slice(-4);
                        } else {
                            encoded += input.charAt(i);
                        }
                    }
                    output.value = encoded;
                    showStatus('✓ Unicode encoded successfully', 'success');
                } else {
                    output.value = input.replace(/\\u([0-9a-fA-F]{4})/g, (match, grp) => {
                        return String.fromCharCode(parseInt(grp, 16));
                    });
                    showStatus('✓ Unicode decoded successfully', 'success');
                }
            } catch (error) {
                showStatus('✗ Error processing Unicode: ' + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('unicodeInput').value = '';
            document.getElementById('unicodeOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('unicodeOutput');
            if (!output.value) {
                showStatus('No output to copy', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard', 'success');
        }

        function showStatus(message, type) {
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300');

            if (type === 'success') {
                statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300');
            } else {
                statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300');
            }
        }

        // Allow Enter key to process
        document.getElementById('unicodeInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processURL();
            }
        });
    </script>
@endsection