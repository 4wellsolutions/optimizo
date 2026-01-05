@extends('layouts.app')

@section('title', $tool->meta_title))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="html-encoder" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('encode')" id="encodeBtn"
                    class="flex-1 px-6 py-3 bg-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Encode HTML
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    Decode HTML
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="htmlInput" class="form-label text-base" id="inputLabel">Enter HTML to Encode</label>
                <textarea id="htmlInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="<div class='example'>Hello & Welcome!</div>"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processHTML()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">Encode HTML</span>
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
                <label for="htmlOutput" class="form-label text-base" id="outputLabel">Encoded HTML</label>
                <textarea id="htmlOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="Processed HTML will appear here..."></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-orange-50 to-red-50 rounded-3xl p-8 md:p-12 border-2 border-orange-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free HTML Encoder & Decoder</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Encode and decode HTML entities for safe web display</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free HTML Encoder & Decoder tool helps you convert special characters to HTML entities (encoding) or
                convert HTML entities back to regular characters (decoding). Essential for preventing XSS attacks,
                displaying code examples, and ensuring proper HTML rendering.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 What is HTML Encoding?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                HTML encoding converts special characters like <,>, &, and quotes into their HTML entity equivalents (&lt;,
                    &gt;, &amp;, etc.). This prevents browsers from interpreting them as HTML code and protects against XSS
                    (Cross-Site Scripting) attacks.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Encode or decode HTML in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bidirectional</h4>
                    <p class="text-gray-600 text-sm">Encode to entities or decode back to original</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">XSS Protection</h4>
                    <p class="text-gray-600 text-sm">Prevent cross-site scripting attacks</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">One-Click Copy</h4>
                    <p class="text-gray-600 text-sm">Copy encoded/decoded HTML instantly</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits, no registration required</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">All Characters</h4>
                    <p class="text-gray-600 text-sm">Handles all HTML special characters</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔒 Security</h4>
                    <p class="text-gray-700 leading-relaxed">Prevent XSS attacks by encoding user input before displaying on
                        web pages</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">💻 Code Display</h4>
                    <p class="text-gray-700 leading-relaxed">Display HTML code examples without them being rendered by the
                        browser</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📧 Email Templates</h4>
                    <p class="text-gray-700 leading-relaxed">Encode special characters in email HTML to ensure proper
                        rendering</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🗄️ Database Storage</h4>
                    <p class="text-gray-700 leading-relaxed">Safely store HTML content in databases without breaking queries
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 HTML Entity Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Less Than (<):< /p>
                                <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "<" →
                                        Encoded: "&lt;" </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Greater Than (>):</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: ">" → Encoded: "&gt;"
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Ampersand (&):</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: "&" → Encoded: "&amp;"
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Quote ("):</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">Original: '"' → Encoded: "&quot;"
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Why should I encode HTML?</h4>
                    <p class="text-gray-700 leading-relaxed">HTML encoding prevents browsers from interpreting special
                        characters as HTML code, protecting against XSS attacks and ensuring content displays correctly.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What characters need encoding?</h4>
                    <p class="text-gray-700 leading-relaxed">Characters like <,>, &, ", and ' should be encoded when
                            displaying user-generated content or code examples in HTML.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All encoding and decoding happens entirely in your browser
                        using JavaScript. Your HTML never leaves your device.</p>
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
                encodeBtn.classList.add('bg-orange-600', 'text-white');
                decodeBtn.classList.remove('bg-orange-600', 'text-white');
                decodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter HTML to Encode';
                outputLabel.textContent = 'Encoded HTML';
                processBtn.textContent = 'Encode HTML';
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-orange-600', 'text-white');
                encodeBtn.classList.remove('bg-orange-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter HTML to Decode';
                outputLabel.textContent = 'Decoded HTML';
                processBtn.textContent = 'Decode HTML';
            }
            clearAll();
        }

        function processHTML() {
            const input = document.getElementById('htmlInput').value.trim();
            const output = document.getElementById('htmlOutput');

            if (!input) {
                showStatus('Please enter HTML to process', 'error');
                return;
            }

            try {
                if (currentMode === 'encode') {
                    output.value = input
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#39;');
                    showStatus('✓ HTML encoded successfully', 'success');
                } else {
                    output.value = input
                        .replace(/&lt;/g, '<')
                        .replace(/&gt;/g, '>')
                        .replace(/&quot;/g, '"')
                        .replace(/&#39;/g, "'")
                        .replace(/&amp;/g, '&');
                    showStatus('✓ HTML decoded successfully', 'success');
                }
            } catch (error) {
                showStatus('✗ Error processing HTML: ' + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('htmlInput').value = '';
            document.getElementById('htmlOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('htmlOutput');
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
        document.getElementById('htmlInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processHTML();
            }
        });
    </script>
@endsection