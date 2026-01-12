@extends('layouts.app')

@section('title', __tool('url-encoder', 'meta.h1'))
@section('meta_description', __tool('url-encoder', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="url-encoder" />

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
                    {{ __tool('url-encoder', 'editor.btn_encode', 'Encode URL') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('url-encoder', 'editor.btn_decode', 'Decode URL') }}
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="urlInput" class="form-label text-base" id="inputLabel">{{ __tool('url-encoder', 'editor.label_input_encode', 'Enter URL to Encode') }}</label>
                <textarea id="urlInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="{{ __tool('url-encoder', 'editor.ph_input', 'https://example.com/search?name=John Doe&age=30') }}"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processURL()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('url-encoder', 'editor.btn_process_encode', 'Encode URL') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('url-encoder', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('url-encoder', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="urlOutput" class="form-label text-base" id="outputLabel">{{ __tool('url-encoder', 'editor.label_output_encoded', 'Encoded URL') }}</label>
                <textarea id="urlOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="{{ __tool('url-encoder', 'editor.ph_output', 'Processed URL will appear here...') }}"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('url-encoder', 'meta.h1', 'Free URL Encoder & Decoder') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('url-encoder', 'meta.subtitle', 'Encode and decode URLs for safe web transmission') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('url-encoder', 'content.p1', 'Our free URL Encoder & Decoder tool helps you encode special characters in URLs for safe transmission over the internet, or decode encoded URLs back to their original format. Perfect for developers, SEO professionals, and anyone working with web URLs. 100% free, client-side processing ensures your data stays private.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔗 {{ __tool('url-encoder', 'content.what_title', 'What is URL Encoding?') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('url-encoder', 'content.what_desc', 'URL encoding (also called percent-encoding) converts special characters in URLs into a format that can be transmitted over the internet. Spaces become %20, special characters like & become %26, and so on. This ensures URLs work correctly across all browsers and systems.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('url-encoder', 'content.features_title', 'Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.features.instant.title', 'Instant Conversion') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('url-encoder', 'content.features.instant.desc', 'Encode or decode URLs in milliseconds') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.features.bidirectional.title', 'Bidirectional') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('url-encoder', 'content.features.bidirectional.desc', 'Encode to URL format or decode back to original') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.features.privacy.title', 'Privacy First') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('url-encoder', 'content.features.privacy.desc', 'All processing happens in your browser') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.features.copy.title', 'One-Click Copy') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('url-encoder', 'content.features.copy.desc', 'Copy encoded/decoded URLs instantly') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.features.free.title', '100% Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('url-encoder', 'content.features.free.desc', 'No limits, no registration required') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.features.universal.title', 'Universal Support') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('url-encoder', 'content.features.universal.desc', 'Works with all URL formats and characters') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('url-encoder', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔗 {{ __tool('url-encoder', 'content.uses.query.title', 'Query Parameters') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.uses.query.desc', 'Encode special characters in URL query strings for API calls and web requests') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 {{ __tool('url-encoder', 'content.uses.analytics.title', 'Analytics Tracking') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.uses.analytics.desc', 'Encode UTM parameters and tracking URLs for marketing campaigns') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔐 {{ __tool('url-encoder', 'content.uses.auth.title', 'Authentication') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.uses.auth.desc', 'Encode credentials and tokens in OAuth and API authentication') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌍 {{ __tool('url-encoder', 'content.uses.i18n.title', 'Internationalization') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.uses.i18n.desc', 'Encode non-ASCII characters in URLs for global compatibility') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔍 {{ __tool('url-encoder', 'content.uses.seo.title', 'SEO & Redirects') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.uses.seo.desc', 'Create properly encoded redirect URLs and canonical links') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📧 {{ __tool('url-encoder', 'content.uses.email.title', 'Email Links') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.uses.email.desc', 'Encode mailto links with subject lines and body content') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 {{ __tool('url-encoder', 'content.how_to_title', 'How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>{{ __tool('url-encoder', 'content.how_to.step1.title', 'Choose Mode') }}:</strong> {{ __tool('url-encoder', 'content.how_to.step1.desc', 'Select "Encode URL" or "Decode URL" based on your need') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>{{ __tool('url-encoder', 'content.how_to.step2.title', 'Enter URL') }}:</strong> {{ __tool('url-encoder', 'content.how_to.step2.desc', 'Paste your URL or text in the input field') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>{{ __tool('url-encoder', 'content.how_to.step3.title', 'Process') }}:</strong> {{ __tool('url-encoder', 'content.how_to.step3.desc', 'Click the encode or decode button') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>{{ __tool('url-encoder', 'content.how_to.step4.title', 'Copy Result') }}:</strong> {{ __tool('url-encoder', 'content.how_to.step4.desc', 'Click "Copy" to copy the processed URL to clipboard') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>{{ __tool('url-encoder', 'content.how_to.step5.title', 'Use Anywhere') }}:</strong> {{ __tool('url-encoder', 'content.how_to.step5.desc', 'Paste the encoded/decoded URL in your application') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('url-encoder', 'content.examples_title', 'URL Encoding Examples') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.examples.space.title', 'Space Character:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('url-encoder', 'content.examples.space.desc', 'Original: "Hello World" → Encoded: "Hello%20World"') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.examples.special.title', 'Special Characters:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('url-encoder', 'content.examples.special.desc', 'Original: "name=John&age=30" → Encoded: "name%3DJohn%26age%3D30"') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('url-encoder', 'content.examples.full.title', 'Full URL:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('url-encoder', 'content.examples.full.desc', 'Original: "https://example.com/search?q=hello world" → Encoded: "https%3A%2F%2Fexample.com%2Fsearch%3Fq%3Dhello%20world"') }}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('url-encoder', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('url-encoder', 'content.faq.q1', 'When should I encode URLs?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.faq.a1', 'Encode URLs when passing them as query parameters, storing them in databases, or when they contain special characters like spaces, &, =, ?, or non-ASCII characters.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('url-encoder', 'content.faq.q2', 'What characters need encoding?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.faq.a2', 'Reserved characters like : / ? # [ ] @ ! $ & \' ( ) * + , ; = and unsafe characters like spaces, <, >, ", {, }, |, \\, ^, `, and non-ASCII characters must be encoded.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('url-encoder', 'content.faq.q3', 'Is URL encoding the same as Base64?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.faq.a3', 'No. URL encoding converts specific characters to %XX format, while Base64 encodes entire data into a different character set. They serve different purposes.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('url-encoder', 'content.faq.q4', 'Can I encode entire URLs?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.faq.a4', 'Yes, but typically you only encode the query string portion. Encoding the entire URL including protocol (https://) is less common and may cause issues.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('url-encoder', 'content.faq.q5', 'Is my data secure?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('url-encoder', 'content.faq.a5', 'Yes! All encoding and decoding happens entirely in your browser using JavaScript. Your URLs never leave your device or get sent to any server.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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
                inputLabel.textContent = "{{ __tool('url-encoder', 'editor.label_input_encode', 'Enter URL to Encode') }}";
                outputLabel.textContent = "{{ __tool('url-encoder', 'editor.label_output_encoded', 'Encoded URL') }}";
                processBtn.textContent = "{{ __tool('url-encoder', 'editor.btn_process_encode', 'Encode URL') }}";
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('url-encoder', 'editor.label_input_decode', 'Enter URL to Decode') }}";
                outputLabel.textContent = "{{ __tool('url-encoder', 'editor.label_output_decoded', 'Decoded URL') }}";
                processBtn.textContent = "{{ __tool('url-encoder', 'editor.btn_process_decode', 'Decode URL') }}";
            }
            clearAll();
        }

        function processURL() {
            const input = document.getElementById('urlInput').value.trim();
            const output = document.getElementById('urlOutput');

            if (!input) {
                showStatus("{{ __tool('url-encoder', 'js.error_empty', 'Please enter a URL to process') }}", 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    output.value = encodeURIComponent(input);
                    showStatus("{{ __tool('url-encoder', 'js.success_encode', '✓ URL encoded successfully') }}", 'success');
                } else {
                    output.value = decodeURIComponent(input);
                    showStatus("{{ __tool('url-encoder', 'js.success_decode', '✓ URL decoded successfully') }}", 'success');
                }
            } catch (error) {
                showStatus("{{ __tool('url-encoder', 'js.error_process', '✗ Error processing URL: ') }}" + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('urlInput').value = '';
            document.getElementById('urlOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('urlOutput');
            if (!output.value) {
                showStatus("{{ __tool('url-encoder', 'js.error_no_copy', 'No output to copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('url-encoder', 'js.success_copy', '✓ Copied to clipboard') }}", 'success');
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
        document.getElementById('urlInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processURL();
            }
        });
    </script>
    @endpush
@endsection