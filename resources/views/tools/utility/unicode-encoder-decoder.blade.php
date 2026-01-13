@extends('layouts.app')

@section('title', __tool('unicode-encoder-decoder', 'meta.h1'))
@section('meta_description', __tool('unicode-encoder-decoder', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="unicode-encoder-decoder" />

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
                    {{ __tool('unicode-encoder-decoder', 'editor.btn_encode', 'Encode Unicode') }}
                </button>
                <button onclick="setMode('decode')" id="decodeBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                    {{ __tool('unicode-encoder-decoder', 'editor.btn_decode', 'Decode Unicode') }}
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="unicodeInput" class="form-label text-base" id="inputLabel">
                    {{ __tool('unicode-encoder-decoder', 'editor.label_input_encode', 'Enter Text to Encode') }}
                </label>
                <textarea id="unicodeInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="{{ __tool('unicode-encoder-decoder', 'editor.ph_input', 'Hello 世界') }}"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processURL()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">{{ __tool('unicode-encoder-decoder', 'editor.btn_process_encode', 'Encode Unicode') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('unicode-encoder-decoder', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('unicode-encoder-decoder', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Output -->
            <div class="mb-6">
                <label for="unicodeOutput" class="form-label text-base" id="outputLabel">
                    {{ __tool('unicode-encoder-decoder', 'editor.label_output_encoded', 'Encoded Unicode') }}
                </label>
                <textarea id="unicodeOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="{{ __tool('unicode-encoder-decoder', 'editor.ph_output', 'Processed Unicode will appear here...') }}"></textarea>
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
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('unicode-encoder-decoder', 'meta.h1', 'Free Unicode Encoder & Decoder') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('unicode-encoder-decoder', 'meta.subtitle', 'Encode and decode Unicode escape sequences for JavaScript and JSON') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('unicode-encoder-decoder', 'content.p1', 'Our free Unicode Encoder & Decoder tool helps you encode text into Unicode escape sequences (e.g., \u0041) for safe use in JavaScript, JSON, and other programming contexts, or decode them back to readable text. Perfect for developers, data analysts, and anyone dealing with international character sets. 100% free, client-side processing ensures your data stays private.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔗 {{ __tool('unicode-encoder-decoder', 'content.what_title', 'What is Unicode Encoding?') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('unicode-encoder-decoder', 'content.what_desc', 'Unicode encoding converts characters into their corresponding Unicode code points, often represented as escape sequences like \uXXXX. This ensures that text containing special characters, emojis, or non-Latin scripts can be safely represented in environments that typically support only ASCII, such as source code files or JSON data.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('unicode-encoder-decoder', 'content.features_title', 'Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.features.instant.title', 'Instant Conversion') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder-decoder', 'content.features.instant.desc', 'Encode or decode Unicode in milliseconds') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.features.bidirectional.title', 'Bidirectional') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder-decoder', 'content.features.bidirectional.desc', 'Encode to Unicode format or decode back to original') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.features.privacy.title', 'Privacy First') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder-decoder', 'content.features.privacy.desc', 'All processing happens in your browser') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.features.copy.title', 'One-Click Copy') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder-decoder', 'content.features.copy.desc', 'Copy encoded/decoded text instantly') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.features.free.title', '100% Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder-decoder', 'content.features.free.desc', 'No limits, no registration required') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.features.universal.title', 'Universal Support') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('unicode-encoder-decoder', 'content.features.universal.desc', 'Works with all Unicode characters and scripts') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('unicode-encoder-decoder', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔗 {{ __tool('unicode-encoder-decoder', 'content.uses.programming.title', 'Programming') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.uses.programming.desc', 'Embed special characters in JavaScript or Java source code safely') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📊 {{ __tool('unicode-encoder-decoder', 'content.uses.data.title', 'Data Serialization') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.uses.data.desc', 'Ensure safe transmission of non-ASCII characters in JSON') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌍 {{ __tool('unicode-encoder-decoder', 'content.uses.international.title', 'Internationalization') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.uses.international.desc', 'Debug and display text in various languages and scripts') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔐 {{ __tool('unicode-encoder-decoder', 'content.uses.security.title', 'Security') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.uses.security.desc', 'Analyze obfuscated code or data containing Unicode escapes') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 {{ __tool('unicode-encoder-decoder', 'content.how_to_title', 'How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>{{ __tool('unicode-encoder-decoder', 'content.how_to.step1.title', 'Choose Mode') }}:</strong> {{ __tool('unicode-encoder-decoder', 'content.how_to.step1.desc', 'Select "Encode Unicode" or "Decode Unicode" based on your need') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>{{ __tool('unicode-encoder-decoder', 'content.how_to.step2.title', 'Enter Text') }}:</strong> {{ __tool('unicode-encoder-decoder', 'content.how_to.step2.desc', 'Paste your text or Unicode escapes in the input field') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>{{ __tool('unicode-encoder-decoder', 'content.how_to.step3.title', 'Process') }}:</strong> {{ __tool('unicode-encoder-decoder', 'content.how_to.step3.desc', 'Click the encode or decode button') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>{{ __tool('unicode-encoder-decoder', 'content.how_to.step4.title', 'Copy Result') }}:</strong> {{ __tool('unicode-encoder-decoder', 'content.how_to.step4.desc', 'Click "Copy" to copy the processed text to clipboard') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>{{ __tool('unicode-encoder-decoder', 'content.how_to.step5.title', 'Use Anywhere') }}:</strong> {{ __tool('unicode-encoder-decoder', 'content.how_to.step5.desc', 'Paste the result in your code or application') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('unicode-encoder-decoder', 'content.examples_title', 'Unicode Examples') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.examples.simple.title', 'Simple/ASCII:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('unicode-encoder-decoder', 'content.examples.simple.desc', 'Original: "A" → Encoded: "\\u0041"') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.examples.special.title', 'Special Characters:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('unicode-encoder-decoder', 'content.examples.special.desc', 'Original: "©" → Encoded: "\\u00A9"') }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">{{ __tool('unicode-encoder-decoder', 'content.examples.emoji.title', 'Emojis/Multi-byte:') }}</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">{{ __tool('unicode-encoder-decoder', 'content.examples.emoji.desc', 'Original: "🌟" → Encoded: "\\uD83C\\uDF1F" (surrogate pairs) or "\\u2B50" depending on representation') }}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('unicode-encoder-decoder', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('unicode-encoder-decoder', 'content.faq.q1', 'Why use Unicode escape sequences?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.faq.a1', 'They allow you to represent any character using only ASCII characters, which ensures compatibility across different systems, encodings, and file transfers that might not handle raw Unicode correctly.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('unicode-encoder-decoder', 'content.faq.q2', 'What format is used?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.faq.a2', 'This tool typically uses the JavaScript/JSON style \uXXXX format for Basic Multilingual Plane characters.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('unicode-encoder-decoder', 'content.faq.q3', 'Is this different from URL encoding?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.faq.a3', 'Yes. URL encoding uses %XX hex values mainly for URLs. Unicode escaping uses \uXXXX and is used in strings in programming languages like JavaScript, Java, and Python.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('unicode-encoder-decoder', 'content.faq.q4', 'Is my data secure?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('unicode-encoder-decoder', 'content.faq.a4', 'Yes! All encoding and decoding happens entirely in your browser using JavaScript. Your text never leaves your device.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let currentMode = 'encode'; // Default mode

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
                inputLabel.textContent = "{{ __tool('unicode-encoder-decoder', 'editor.label_input_encode', 'Enter Text to Encode') }}";
                outputLabel.textContent = "{{ __tool('unicode-encoder-decoder', 'editor.label_output_encoded', 'Encoded Unicode') }}";
                processBtn.textContent = "{{ __tool('unicode-encoder-decoder', 'editor.btn_process_encode', 'Encode Unicode') }}";
            } else {
                decodeBtn.classList.remove('bg-gray-200', 'text-gray-700');
                decodeBtn.classList.add('bg-blue-600', 'text-white');
                encodeBtn.classList.remove('bg-blue-600', 'text-white');
                encodeBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = "{{ __tool('unicode-encoder-decoder', 'editor.label_input_decode', 'Enter Unicode to Decode') }}";
                outputLabel.textContent = "{{ __tool('unicode-encoder-decoder', 'editor.label_output_decoded', 'Decoded Text') }}";
                processBtn.textContent = "{{ __tool('unicode-encoder-decoder', 'editor.btn_process_decode', 'Decode Unicode') }}";
            }
            clearAll();
        }

        function processURL() {
            const input = document.getElementById('unicodeInput').value.trim();
            const output = document.getElementById('unicodeOutput');

            if (!input) {
                showStatus("{{ __tool('unicode-encoder-decoder', 'js.error_empty', 'Please enter text to process') }}", 'error');
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
                    showStatus("{{ __tool('unicode-encoder-decoder', 'js.success_encode', '✓ Unicode encoded successfully') }}", 'success');
                } else {
                    output.value = input.replace(/\\u([0-9a-fA-F]{4})/g, (match, grp) => {
                        return String.fromCharCode(parseInt(grp, 16));
                    });
                    showStatus("{{ __tool('unicode-encoder-decoder', 'js.success_decode', '✓ Unicode decoded successfully') }}", 'success');
                }
            } catch (error) {
                showStatus("{{ __tool('unicode-encoder-decoder', 'js.error_process', '✗ Error processing Unicode: ') }}" + error.message, 'error');
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
                showStatus("{{ __tool('unicode-encoder-decoder', 'js.error_no_copy', 'No output to copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('unicode-encoder-decoder', 'js.success_copy', '✓ Copied to clipboard') }}", 'success');
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
    @endpush
@endsection