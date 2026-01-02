@extends('layouts.app')

@section('title', $tool->meta_title))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-purple-500 via-indigo-500 to-blue-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    Unicode Encoder & Decoder
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Encode and decode Unicode escape sequences - Perfect for JavaScript and JSON!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-purple-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
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
                    placeholder="Hello 世界 🌍"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processUnicode()" class="btn-primary">
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
            class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Unicode Encoder & Decoder</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert text to Unicode escape sequences and back</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free Unicode Encoder & Decoder tool converts text to Unicode escape sequences (\uXXXX format) for use in
                JavaScript, JSON, and other programming contexts. Perfect for handling international characters and emojis
                in your code.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🌍 What is Unicode Encoding?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Unicode encoding converts characters to their \uXXXX escape sequence format, where XXXX is the hexadecimal
                code point. This allows you to represent any character using only ASCII characters, making it safe for
                JavaScript strings and JSON data.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Encode or decode Unicode in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">All Languages</h4>
                    <p class="text-gray-600 text-sm">Supports all Unicode characters and emojis</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">💻 JavaScript Strings</h4>
                    <p class="text-gray-700 leading-relaxed">Encode special characters for JavaScript string literals</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📄 JSON Data</h4>
                    <p class="text-gray-700 leading-relaxed">Safely include international characters in JSON files</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌍 Internationalization</h4>
                    <p class="text-gray-700 leading-relaxed">Handle multilingual text in web applications</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">😀 Emoji Support</h4>
                    <p class="text-gray-700 leading-relaxed">Encode emojis for cross-platform compatibility</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Unicode Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Chinese Character:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "世" → Encoded: "\u4e16"
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Emoji:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "🌍" → Encoded:
                            "\ud83c\udf0d"</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Accented Character:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "é" → Encoded: "\u00e9"
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I use Unicode encoding?</h4>
                    <p class="text-gray-700 leading-relaxed">Use Unicode encoding when you need to represent non-ASCII
                        characters in JavaScript strings, JSON data, or when working with internationalization.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What's the difference from URL encoding?</h4>
                    <p class="text-gray-700 leading-relaxed">Unicode encoding uses \uXXXX format for JavaScript/JSON, while
                        URL encoding uses %XX format for URLs. They serve different purposes.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All encoding and decoding happens in your browser. Your
                        text never leaves your device.</p>
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
                encodeBtn.classList.add('bg-purple-600', 'text-white');
                decodeBtn.classList.remove('bg-purple-600', 'text-white');
                decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter Text to Encode';
                outputLabel.textContent = 'Encoded Unicode';
                processBtn.textContent = 'Encode Unicode';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-purple-600', 'text-white');
                encodeBtn.classList.remove('bg-purple-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter Unicode to Decode';
                outputLabel.textContent = 'Decoded Text';
                processBtn.textContent = 'Decode Unicode';
            }
            clearAll();
        }

        function processUnicode() {
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
                            encoded += input[i];
                        }
                    }
                    output.value = encoded;
                    showStatus('✓ Text encoded to Unicode successfully', 'success');
                } else {
                    output.value = input.replace(/\\u[\dA-F]{4}/gi, function (match) {
                        return String.fromCharCode(parseInt(match.replace(/\\u/g, ''), 16));
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
                processUnicode();
            }
        });
    </script>
@endsection