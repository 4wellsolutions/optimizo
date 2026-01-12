@extends('layouts.app')

@section('title', __tool('number-base-converter', 'meta.h1'))
@section('meta_description', __tool('number-base-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="number-base-converter" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-emerald-200 mb-8">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="fromBase" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('number-base-converter', 'editor.label_from', 'From Base') }}</label>
                    <select id="fromBase" onchange="updatePlaceholders()" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 font-semibold text-lg bg-gray-50">
                        <option value="2">{{ __tool('number-base-converter', 'editor.bases.2') }}</option>
                        <option value="8">{{ __tool('number-base-converter', 'editor.bases.8') }}</option>
                        <option value="10" selected>{{ __tool('number-base-converter', 'editor.bases.10') }}</option>
                        <option value="16">{{ __tool('number-base-converter', 'editor.bases.16') }}</option>
                        @for ($i = 3; $i <= 36; $i++)
                            @if (!in_array($i, [2, 8, 10, 16]))
                                <option value="{{ $i }}">{{ str_replace(':base', $i, __tool('number-base-converter', 'editor.bases.generic')) }}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div>
                    <label for="toBase" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('number-base-converter', 'editor.label_to', 'To Base') }}</label>
                    <div class="flex gap-2">
                         <select id="toBase" onchange="updatePlaceholders()" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 font-semibold text-lg bg-gray-50">
                            <option value="2">{{ __tool('number-base-converter', 'editor.bases.2') }}</option>
                            <option value="8">{{ __tool('number-base-converter', 'editor.bases.8') }}</option>
                            <option value="10">{{ __tool('number-base-converter', 'editor.bases.10') }}</option>
                            <option value="16" selected>{{ __tool('number-base-converter', 'editor.bases.16') }}</option>
                            @for ($i = 3; $i <= 36; $i++)
                                @if (!in_array($i, [2, 8, 10, 16]))
                                    <option value="{{ $i }}">{{ str_replace(':base', $i, __tool('number-base-converter', 'editor.bases.generic')) }}</option>
                                @endif
                            @endfor
                        </select>
                        <button onclick="swapBases()" class="px-3 bg-gray-100 rounded-xl hover:bg-gray-200 border-2 border-gray-200 transition-all text-gray-600" title="{{ __tool('number-base-converter', 'editor.btn_swap', 'Swap Bases') }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 mb-6">
                <span class="text-sm font-semibold text-gray-500 py-2">{{ __tool('number-base-converter', 'editor.presets') }}</span>
                <button onclick="setDatabases(2, 10)" class="px-3 py-1 text-sm bg-emerald-50 text-emerald-700 rounded-lg hover:bg-emerald-100 border border-emerald-200 transition-all">{{ __tool('number-base-converter', 'editor.preset_labels.bin_dec') }}</button>
                <button onclick="setDatabases(10, 16)" class="px-3 py-1 text-sm bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 border border-purple-200 transition-all">{{ __tool('number-base-converter', 'editor.preset_labels.dec_hex') }}</button>
                <button onclick="setDatabases(16, 2)" class="px-3 py-1 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 border border-blue-200 transition-all">{{ __tool('number-base-converter', 'editor.preset_labels.hex_bin') }}</button>
                <button onclick="setDatabases(10, 8)" class="px-3 py-1 text-sm bg-orange-50 text-orange-700 rounded-lg hover:bg-orange-100 border border-orange-200 transition-all">{{ __tool('number-base-converter', 'editor.preset_labels.dec_oct') }}</button>
            </div>

            <div class="mb-6">
                 <label for="inputNumber" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('number-base-converter', 'editor.label_input', 'Enter Number') }}</label>
                <input type="text" id="inputNumber"
                    class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 text-xl font-mono"
                    placeholder="{{ __tool('number-base-converter', 'editor.ph_input', '255') }}">
            </div>

            <div class="mb-6">
                <label for="outputNumber" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('number-base-converter', 'editor.label_output', 'Result') }}</label>
                <div class="relative">
                    <input type="text" id="outputNumber" readonly
                        class="w-full px-4 py-4 border-2 border-emerald-100 rounded-xl bg-emerald-50 text-xl font-mono text-emerald-900"
                        placeholder="{{ __tool('number-base-converter', 'editor.ph_output', 'Result will appear here...') }}">
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertNumber()"
                    class="px-8 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('number-base-converter', 'editor.btn_convert', 'Convert Number') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('number-base-converter', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('number-base-converter', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>
             <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl p-8 md:p-12 border-2 border-emerald-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('number-base-converter', 'content.hero_title', 'Universal Number Base Converter') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('number-base-converter', 'content.hero_subtitle', 'Convert numbers between any base from 2 to 36') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">{{ __tool('number-base-converter', 'content.p1', 'Our free Universal Number Base Converter allows you to convert numbers between any base from 2 to 36. Whether you need to convert binary to hexadecimal, decimal to octal, or any other combination, this tool makes it instant and easy. Perfect for programmers, students, and anyone working with different number systems. 100% free with client-side processing for complete privacy.') }}</p>

            <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 mb-10 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('number-base-converter', 'content.what_title', 'What are Number Bases?') }}</h3>
                <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.what_desc', 'A number base (or radix) is the number of unique digits used to represent numbers in a positional numeral system. The most common bases are Binary (base 2), Octal (base 8), Decimal (base 10), and Hexadecimal (base 16). This converter supports all bases from 2 to 36, using digits 0-9 and letters A-Z for higher bases.') }}</p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('number-base-converter', 'content.features_title', 'Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('number-base-converter', 'content.features.instant.title', 'Instant Conversion') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('number-base-converter', 'content.features.instant.desc', 'Convert between any bases in milliseconds') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('number-base-converter', 'content.features.universal.title', 'Universal Support') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('number-base-converter', 'content.features.universal.desc', 'All bases from 2 to 36 supported') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔘</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('number-base-converter', 'content.features.presets.title', 'Quick Presets') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('number-base-converter', 'content.features.presets.desc', 'One-click presets for common conversions') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('number-base-converter', 'content.features.swap.title', 'Swap Bases') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('number-base-converter', 'content.features.swap.desc', 'Instantly swap from and to bases') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('number-base-converter', 'content.features.privacy.title', 'Privacy First') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('number-base-converter', 'content.features.privacy.desc', 'All processing happens in your browser') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('number-base-converter', 'content.features.free.title', '100% Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('number-base-converter', 'content.features.free.desc', 'No limits, no registration required') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('number-base-converter', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('number-base-converter', 'content.uses.programming.title', 'Programming') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.uses.programming.desc', 'Convert between number systems for low-level programming, bit manipulation, and memory addresses') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('number-base-converter', 'content.uses.education.title', 'Education') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.uses.education.desc', 'Learn and practice number system conversions for computer science courses') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('number-base-converter', 'content.uses.crypto.title', 'Cryptography') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.uses.crypto.desc', 'Work with hexadecimal representations of encrypted data and hashes') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('number-base-converter', 'content.uses.web.title', 'Web Development') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.uses.web.desc', 'Convert color codes, Unicode values, and other web-related numbers') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('number-base-converter', 'content.how_title', 'How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span class="font-bold text-emerald-600 text-lg">1.</span><span><strong>{{ __tool('number-base-converter', 'content.how_steps.1.title', 'Select Bases:') }}</strong> {{ __tool('number-base-converter', 'content.how_steps.1.desc', 'Choose your "From Base" and "To Base" from the dropdowns (2-36)') }}</span></li>
                    <li class="flex items-start gap-3"><span class="font-bold text-emerald-600 text-lg">2.</span><span><strong>{{ __tool('number-base-converter', 'content.how_steps.2.title', 'Use Presets:') }}</strong> {{ __tool('number-base-converter', 'content.how_steps.2.desc', 'Or click a quick preset button for common conversions') }}</span></li>
                    <li class="flex items-start gap-3"><span class="font-bold text-emerald-600 text-lg">3.</span><span><strong>{{ __tool('number-base-converter', 'content.how_steps.3.title', 'Enter Number:') }}</strong> {{ __tool('number-base-converter', 'content.how_steps.3.desc', 'Type your number in the input field') }}</span></li>
                    <li class="flex items-start gap-3"><span class="font-bold text-emerald-600 text-lg">4.</span><span><strong>{{ __tool('number-base-converter', 'content.how_steps.4.title', 'Convert:') }}</strong> {{ __tool('number-base-converter', 'content.how_steps.4.desc', 'Click "Convert Number" to see the result') }}</span></li>
                    <li class="flex items-start gap-3"><span class="font-bold text-emerald-600 text-lg">5.</span><span><strong>{{ __tool('number-base-converter', 'content.how_steps.5.title', 'Copy Result:') }}</strong> {{ __tool('number-base-converter', 'content.how_steps.5.desc', 'Click "Copy" to copy the converted number') }}</span></li>
                </ol>
            </div>

             <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('number-base-converter', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('number-base-converter', 'content.faq.q1', 'What is the highest base supported?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.faq.a1', 'This converter supports all bases from 2 to 36. Base 36 uses digits 0-9 and letters A-Z, providing 36 unique symbols.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('number-base-converter', 'content.faq.q2', 'How do bases higher than 10 work?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.faq.a2', 'Bases higher than 10 use letters A-Z to represent values 10-35. For example, in hexadecimal (base 16), A=10, B=11, C=12, D=13, E=14, F=15.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('number-base-converter', 'content.faq.q3', 'Can I convert negative numbers?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.faq.a3', 'Yes, the converter handles negative numbers. The negative sign is preserved during conversion.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('number-base-converter', 'content.faq.q4', 'Is my data secure?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('number-base-converter', 'content.faq.a4', 'Absolutely! All conversions happen entirely in your browser using JavaScript. Your numbers never leave your device or get sent to any server.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function updatePlaceholders() {
            const fromBase = document.getElementById('fromBase').value;
            const toBase = document.getElementById('toBase').value;
            
            // Example conversions
            let example = 255;
            let fromEx = example.toString(fromBase).toUpperCase();
            
            document.getElementById('inputNumber').placeholder = `e.g. ${fromEx}`;
        }

        function setDatabases(from, to) {
            document.getElementById('fromBase').value = from;
            document.getElementById('toBase').value = to;
            updatePlaceholders();
            
            // Automatically convert if there's input
            const input = document.getElementById('inputNumber').value;
            if (input) {
                convertNumber();
            }
        }

        function swapBases() {
            const fromBase = document.getElementById('fromBase').value;
            const toBase = document.getElementById('toBase').value;
            setDatabases(toBase, fromBase);
        }

        function convertNumber() {
            const inputStr = document.getElementById('inputNumber').value.trim().toUpperCase();
            const fromBase = parseInt(document.getElementById('fromBase').value);
            const toBase = parseInt(document.getElementById('toBase').value);
            
            if (!inputStr) {
                showStatus("{{ __tool('number-base-converter', 'js.error_empty', 'Please enter a number to convert') }}", 'error');
                return;
            }

            try {
                // Validate input characters for the fromBase
                const validChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ".substring(0, fromBase);
                // Allow negative sign at start
                const checkStr = inputStr.startsWith('-') ? inputStr.substring(1) : inputStr;
                
                for (let i = 0; i < checkStr.length; i++) {
                    if (!validChars.includes(checkStr[i]) && checkStr[i] !== '.') {
                         const errorMsg = "{{ __tool('number-base-converter', 'js.error_invalid', 'Invalid input for base :base. Only characters :chars are allowed.') }}";
                         showStatus(errorMsg.replace(':base', fromBase).replace(':chars', validChars), 'error');
                        return;
                    }
                }

                // Parse number
                let decimalValue;
                try {
                    decimalValue = parseInt(inputStr, fromBase);
                } catch (e) {
                     showStatus("{{ __tool('number-base-converter', 'js.error_format', 'Invalid number format') }}", 'error');
                    return;
                }

                if (isNaN(decimalValue)) {
                    showStatus("{{ __tool('number-base-converter', 'js.error_format', 'Invalid number format') }}", 'error');
                    return;
                }
                
                const result = decimalValue.toString(toBase).toUpperCase();
                document.getElementById('outputNumber').value = result;

                const successMsg = "{{ __tool('number-base-converter', 'js.success_convert', 'Converted from base :from to base :to successfully') }}";
                showStatus(successMsg.replace(':from', fromBase).replace(':to', toBase), 'success');

            } catch (err) {
                console.error(err);
                showStatus("{{ __tool('number-base-converter', 'js.error_general', 'Error: ') }}" + err.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('inputNumber').value = '';
            document.getElementById('outputNumber').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputNumber');
            if (!output.value) {
                showStatus("{{ __tool('number-base-converter', 'js.error_copy', 'No output to copy') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('number-base-converter', 'js.success_copy', 'Copied to clipboard') }}", 'success');
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

        // Initialize
        updatePlaceholders();
    </script>
    @endpush
@endsection