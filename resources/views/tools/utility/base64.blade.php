@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif


@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-green-500 via-teal-500 to-blue-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Base64 Encoder & Decoder
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Encode text to Base64 or decode Base64 to text instantly - 100% free and secure!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Base64 Tool with Tabs -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="flex gap-2 mb-6 border-b-2 border-gray-200">
                <button onclick="switchTab('encode')" id="encodeTab" class="tab-btn active px-6 py-3 font-bold text-lg">
                    Encode to Base64
                </button>
                <button onclick="switchTab('decode')" id="decodeTab" class="tab-btn px-6 py-3 font-bold text-lg">
                    Decode from Base64
                </button>
            </div>

            <!-- Encode Tab -->
            <div id="encodePanel">
                <div class="mb-6">
                    <label for="encodeInput" class="form-label text-base">Enter Text to Encode</label>
                    <textarea id="encodeInput" class="form-input font-mono text-sm min-h-[350px]"
                        placeholder="Enter your text here..."></textarea>
                    <p class="text-sm text-gray-500 mt-2">Enter any text to convert it to Base64 format</p>
                </div>
                <button onclick="encodeBase64()" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Encode to Base64
                </button>
            </div>

            <!-- Decode Tab -->
            <div id="decodePanel" class="hidden">
                <div class="mb-6">
                    <label for="decodeInput" class="form-label text-base">Enter Base64 to Decode</label>
                    <textarea id="decodeInput" class="form-input font-mono text-sm min-h-[350px]"
                        placeholder="Enter Base64 encoded string..."></textarea>
                    <p class="text-sm text-gray-500 mt-2">Enter Base64 encoded text to decode it back to plain text</p>
                </div>
                <button onclick="decodeBase64()" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Decode from Base64
                </button>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- Error Message -->
        <div id="errorMessage" class="hidden bg-red-50 border-2 border-red-200 rounded-2xl p-6 mb-8">
            <p class="text-red-800 font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <span id="errorText"></span>
            </p>
        </div>

        <!-- Results Section -->
        <div id="resultsSection" class="hidden">
            <div class="result-card">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Result</h2>
                    <button onclick="copyResult()" class="btn-secondary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Copy Result
                    </button>
                </div>
                <div class="bg-gray-900 rounded-xl p-6 overflow-x-auto">
                    <pre id="resultText" class="text-sm text-green-400 font-mono break-all whitespace-pre-wrap"></pre>
                </div>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-green-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">What is Base64 Encoding?</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                Base64 is a binary-to-text encoding scheme that represents binary data in an ASCII string format. It's
                commonly used to encode data that needs to be stored or transferred over media designed to handle text.
                Our
                free Base64 encoder and decoder tool allows developers, data analysts, and IT professionals to quickly
                convert text to Base64 or decode Base64 strings back to readable text. Perfect for API development, data
                transmission, email attachments, embedding images in HTML/CSS, and handling binary data in JSON.
            </p>
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-green-200">
                    <div class="text-4xl mb-3">🔐</div>
                    <h3 class="font-bold text-green-600 mb-2 text-lg">Secure Encoding</h3>
                    <p class="text-sm text-gray-600">All processing happens in your browser - your data never leaves
                        your
                        computer</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-teal-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-teal-600 mb-2 text-lg">Instant Conversion</h3>
                    <p class="text-sm text-gray-600">Encode or decode Base64 data in milliseconds with client-side
                        processing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-blue-200">
                    <div class="text-4xl mb-3">🎯</div>
                    <h3 class="font-bold text-blue-600 mb-2 text-lg">Easy to Use</h3>
                    <p class="text-sm text-gray-600">Simple tabbed interface for encoding and decoding with one-click
                        copy
                    </p>
                </div>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- How to Use -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">How to Use Base64 Encoder/Decoder</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="p-6 rounded-xl bg-green-50 border-2 border-green-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold">1</span>
                        Encoding Text
                    </h3>
                    <ol class="space-y-2 text-gray-700">
                        <li>• Click the "Encode to Base64" tab</li>
                        <li>• Paste or type your text in the input area</li>
                        <li>• Click "Encode to Base64" button</li>
                        <li>• Copy the Base64 encoded result</li>
                    </ol>
                </div>
                <div class="p-6 rounded-xl bg-blue-50 border-2 border-blue-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold">2</span>
                        Decoding Base64
                    </h3>
                    <ol class="space-y-2 text-gray-700">
                        <li>• Click the "Decode from Base64" tab</li>
                        <li>• Paste your Base64 string in the input area</li>
                        <li>• Click "Decode from Base64" button</li>
                        <li>• Copy the decoded plain text result</li>
                    </ol>
                </div>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- Use Cases -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Common Base64 Use Cases</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div class="flex-shrink-0 text-3xl">🔌</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">API Authentication</h3>
                        <p class="text-gray-700 text-sm">Encode credentials for Basic Authentication in HTTP headers and
                            API
                            requests.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-blue-50 border-2 border-blue-200">
                    <div class="flex-shrink-0 text-3xl">🖼️</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Data URIs</h3>
                        <p class="text-gray-700 text-sm">Embed images, fonts, and files directly in HTML, CSS, or JSON
                            using
                            Base64 data URIs.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border-2 border-green-200">
                    <div class="flex-shrink-0 text-3xl">📧</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Email Attachments</h3>
                        <p class="text-gray-700 text-sm">Encode binary attachments in MIME email messages for safe
                            transmission.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-orange-50 border-2 border-orange-200">
                    <div class="flex-shrink-0 text-3xl">💾</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Data Storage</h3>
                        <p class="text-gray-700 text-sm">Store binary data in text-based formats like JSON, XML, or
                            databases.</p>
                    </div>
                </div>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- Comprehensive SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 via-teal-50 to-cyan-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Base64 Encoder & Decoder</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Encode and decode Base64 data instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Base64 is a binary-to-text encoding scheme that converts binary data into ASCII text format. Our free
                Base64
                Encoder & Decoder helps developers, system administrators, and IT professionals encode text to Base64 or
                decode Base64 back to readable text instantly. Perfect for API authentication, data URIs, email
                attachments,
                and secure data transmission. All processing happens in your browser for complete privacy.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">🔄 How Base64 Works</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📤 Encoding</h4>
                    <p class="text-white/90 mb-3">Converts binary data to ASCII text using 64 characters</p>
                    <p class="text-white/80 text-sm">A-Z, a-z, 0-9, +, / (and = for padding)</p>
                </div>
                <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📥 Decoding</h4>
                    <p class="text-white/90 mb-3">Converts Base64 text back to original binary data</p>
                    <p class="text-white/80 text-sm">Reverses the encoding process perfectly</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✅ Common Use Cases</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔐</div>
                    <h4 class="font-bold text-gray-900 mb-2">API Authentication</h4>
                    <p class="text-gray-600 text-sm">Encode credentials for Basic Auth in HTTP headers</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🖼️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Data URIs</h4>
                    <p class="text-gray-600 text-sm">Embed images and files directly in HTML/CSS</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📧</div>
                    <h4 class="font-bold text-gray-900 mb-2">Email Attachments</h4>
                    <p class="text-gray-600 text-sm">Encode binary files for email transmission</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔗</div>
                    <h4 class="font-bold text-gray-900 mb-2">URL Parameters</h4>
                    <p class="text-gray-600 text-sm">Safely pass binary data in URLs</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">💾</div>
                    <h4 class="font-bold text-gray-900 mb-2">Data Storage</h4>
                    <p class="text-gray-600 text-sm">Store binary data in text-only databases</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">Web Development</h4>
                    <p class="text-gray-600 text-sm">Encode JSON, XML, and configuration files</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Base64 Best Practices
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Base64 increases data size by approximately 33%</li>
                    <li>✅ Not suitable for encryption - use proper encryption algorithms</li>
                    <li>✅ Perfect for encoding binary data in text-only systems</li>
                    <li>✅ Always validate decoded data before using it</li>
                    <li>✅ Use URL-safe Base64 for URLs (replaces +/= with -_)</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is Base64 encoding secure?</h4>
                    <p class="text-gray-700 leading-relaxed">No! Base64 is NOT encryption - it's simply encoding. Anyone
                        can
                        decode Base64 data instantly. Never use Base64 alone for security. For encryption, use proper
                        cryptographic algorithms like AES, RSA, or TLS/SSL.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Why does Base64 increase file size?</h4>
                    <p class="text-gray-700 leading-relaxed">Base64 encoding increases data size by approximately 33%
                        because it represents 3 bytes of binary data using 4 ASCII characters. This overhead is the
                        trade-off for making binary data safe for text-only systems.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is Base64 used for?</h4>
                    <p class="text-gray-700 leading-relaxed">Base64 is used for encoding binary data (images, files,
                        credentials) into ASCII text for transmission over text-only systems like email, URLs, JSON,
                        XML,
                        and HTTP headers. It's essential for API authentication, data URIs, and email attachments.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data sent to a server?</h4>
                    <p class="text-gray-700 leading-relaxed">No! All Base64 encoding and decoding happens entirely in
                        your
                        browser using JavaScript. Your data never leaves your device and is not stored, transmitted, or
                        logged anywhere. Your privacy is completely protected.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I encode images to Base64?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! While our tool encodes text, you can encode images
                        using
                        specialized tools. Base64-encoded images can be embedded directly in HTML/CSS using data URIs
                        (data:image/png;base64,...). This is useful for small images but increases page size.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            if (tab === 'encode') {
                document.getElementById('encodePanel').classList.remove('hidden');
                document.getElementById('decodePanel').classList.add('hidden');
                document.getElementById('encodeTab').classList.add('active');
                document.getElementById('decodeTab').classList.remove('active');
            } else {
                document.getElementById('encodePanel').classList.add('hidden');
                document.getElementById('decodePanel').classList.remove('hidden');
                document.getElementById('encodeTab').classList.remove('active');
                document.getElementById('decodeTab').classList.add('active');
            }
            document.getElementById('resultsSection').classList.add('hidden');
            document.getElementById('errorMessage').classList.add('hidden');
        }

        function encodeBase64() {
            const input = document.getElementById('encodeInput').value;

            if (!input) {
                showError('Please enter text to encode');
                return;
            }

            try {
                const encoded = btoa(unescape(encodeURIComponent(input)));
                document.getElementById('resultText').textContent = encoded;
                document.getElementById('resultsSection').classList.remove('hidden');
                document.getElementById('errorMessage').classList.add('hidden');

                setTimeout(() => {
                    document.getElementById('resultsSection').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } catch (error) {
                showError('Error encoding text: ' + error.message);
            }
        }

        function decodeBase64() {
            const input = document.getElementById('decodeInput').value.trim();

            if (!input) {
                showError('Please enter Base64 string to decode');
                return;
            }

            try {
                const decoded = decodeURIComponent(escape(atob(input)));
                document.getElementById('resultText').textContent = decoded;
                document.getElementById('resultsSection').classList.remove('hidden');
                document.getElementById('errorMessage').classList.add('hidden');

                setTimeout(() => {
                    document.getElementById('resultsSection').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } catch (error) {
                showError('Invalid Base64 string. Please check your input.');
            }
        }

        function copyResult() {
            const result = document.getElementById('resultText').textContent;
            navigator.clipboard.writeText(result).then(() => {
                const btn = event.target.closest('button');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Copied!';
                btn.classList.add('bg-green-600', 'text-white', 'border-green-600');

                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                }, 2000);
            });
        }

        function showError(message) {
            document.getElementById('errorText').textContent = message;
            document.getElementById('errorMessage').classList.remove('hidden');
            document.getElementById('resultsSection').classList.add('hidden');
            setTimeout(() => {
                document.getElementById('errorMessage').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }
    </script>

    <style>
        .tab-btn {
            @apply text-gray-600 border-b-4 border-transparent transition-all duration-200;
        }

        .tab-btn.active {
            @apply text-green-600 border-green-600 font-bold;
        }

        .tab-btn:hover {
            @apply text-green-500;
        }
    </style>
@endsection