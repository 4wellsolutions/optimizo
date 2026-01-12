@extends('layouts.app')

@section('title', __tool('morse-to-text-converter', 'meta.h1'))
@section('meta_description', __tool('morse-to-text-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="morse-to-text-converter" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-emerald-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('morse-to-text-converter', 'editor.label_input', 'Input Morse Code') }}</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="{{ __tool('morse-to-text-converter', 'editor.ph_input', '... --- ...') }}"></textarea>
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('morse-to-text-converter', 'editor.btn_decode', 'Decode to Text') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('morse-to-text-converter', 'editor.btn_clear', 'Clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('morse-to-text-converter', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>
            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('morse-to-text-converter', 'editor.label_output', 'Decoded Text') }}</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="{{ __tool('morse-to-text-converter', 'editor.ph_output', 'SOS') }}"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div
            class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl p-8 md:p-12 border-2 border-emerald-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.hero_title', 'Free Morse Code to Text Converter') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('morse-to-text-converter', 'content.hero_subtitle', 'Decode Morse code into readable text') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">{{ __tool('morse-to-text-converter', 'content.p1', 'Decode Morse code to text instantly with our free online converter. Simply enter dots (.) and dashes (-) separated by spaces, and get the decoded text immediately. Perfect for learning Morse code, decoding messages, or practicing communication skills.') }}</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('morse-to-text-converter', 'content.features_title', '✨ Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('morse-to-text-converter', 'content.features.standard.title', 'Standard Decoding') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('morse-to-text-converter', 'content.features.standard.desc', 'Uses international Morse code standard') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('morse-to-text-converter', 'content.features.instant.title', 'Instant Decoding') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('morse-to-text-converter', 'content.features.instant.desc', 'Convert Morse to text in milliseconds') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('morse-to-text-converter', 'content.features.privacy.title', 'Privacy Protected') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('morse-to-text-converter', 'content.features.privacy.desc', 'All processing happens in your browser') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('morse-to-text-converter', 'content.features.bulk.title', 'Bulk Decoding') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('morse-to-text-converter', 'content.features.bulk.desc', 'Decode multiple words at once') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('morse-to-text-converter', 'content.features.alphanum.title', 'Letters & Numbers') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('morse-to-text-converter', 'content.features.alphanum.desc', 'Decodes A-Z and 0-9') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('morse-to-text-converter', 'content.features.free.title', '100% Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('morse-to-text-converter', 'content.features.free.desc', 'No limits or registration required') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('morse-to-text-converter', 'content.uses_title', '🎯 Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.uses.learn.title', '📚 Learning Morse Code') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.uses.learn.desc', 'Practice decoding Morse code to improve your skills') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.uses.decode.title', '🔓 Decoding Messages') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.uses.decode.desc', 'Decode Morse code messages from friends or puzzles') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.uses.games.title', '🎮 Gaming & Puzzles') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.uses.games.desc', 'Solve Morse code puzzles in games and escape rooms') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.uses.radio.title', '📡 Ham Radio') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.uses.radio.desc', 'Decode amateur radio transmissions and practice CW') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.uses.edu.title', '🎓 Education') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.uses.edu.desc', 'Teach students about communication and encoding systems') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('morse-to-text-converter', 'content.uses.emergency.title', '🚨 Emergency Signals') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.uses.emergency.desc', 'Decode distress signals and emergency communications') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('morse-to-text-converter', 'content.how_title', '📚 How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-emerald-600 text-lg">1.</span><span><strong>{{ __tool('morse-to-text-converter', 'content.how_steps.1.title', 'Enter Morse Code:') }}</strong>
                            {{ __tool('morse-to-text-converter', 'content.how_steps.1.desc', 'Type dots (.) and dashes (-) separated by spaces') }}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-emerald-600 text-lg">2.</span><span><strong>{{ __tool('morse-to-text-converter', 'content.how_steps.2.title', 'Click Decode:') }}</strong>
                            {{ __tool('morse-to-text-converter', 'content.how_steps.2.desc', 'Press "Decode to Text" button') }}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-emerald-600 text-lg">3.</span><span><strong>{{ __tool('morse-to-text-converter', 'content.how_steps.3.title', 'Review Output:') }}</strong>
                            {{ __tool('morse-to-text-converter', 'content.how_steps.3.desc', 'Check the decoded text result') }}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-emerald-600 text-lg">4.</span><span><strong>{{ __tool('morse-to-text-converter', 'content.how_steps.4.title', 'Copy Result:') }}</strong>
                            {{ __tool('morse-to-text-converter', 'content.how_steps.4.desc', 'Click "Copy" to copy to clipboard') }}</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-emerald-600 text-lg">5.</span><span><strong>{{ __tool('morse-to-text-converter', 'content.how_steps.5.title', 'Use Text:') }}</strong>
                            {{ __tool('morse-to-text-converter', 'content.how_steps.5.desc', 'Use the decoded message') }}</span></li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 font-primary">{{ __tool('morse-to-text-converter', 'content.examples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    @foreach(__tool('morse-to-text-converter', 'content.samples') as $key => $sample)
                        <div>
                            <p class="font-semibold text-gray-900 mb-2">{{ $sample['title'] }}</p>
                            <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded shadow-sm">{{ $sample['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('morse-to-text-converter', 'content.faq_title', '❓ Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('morse-to-text-converter', 'content.faq.q1', 'How do I format Morse code input?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.faq.a1', 'Separate each letter with a space. Use / for word spaces. Example: "... --- ..." for SOS.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('morse-to-text-converter', 'content.faq.q2', 'What if I make a mistake?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.faq.a2', 'Invalid Morse code patterns will be skipped. Make sure dots and dashes are separated by spaces.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('morse-to-text-converter', 'content.faq.q3', 'Can I decode numbers?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.faq.a3', 'Yes! The tool decodes numbers 0-9 from their Morse code patterns.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('morse-to-text-converter', 'content.faq.q4', 'How do I separate words?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.faq.a4', 'Use a forward slash (/) to separate words in Morse code.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('morse-to-text-converter', 'content.faq.q5', 'Is this tool free?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('morse-to-text-converter', 'content.faq.a5', 'Yes! Completely free with no limits. All processing happens in your browser for privacy.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const morseToText = {
            '.-': 'A', '-...': 'B', '-.-.': 'C', '-..': 'D', '.': 'E', '..-.': 'F', '--.': 'G', '....': 'H', '..': 'I', '.---': 'J',
            '-.-': 'K', '.-..': 'L', '--': 'M', '-.': 'N', '---': 'O', '.--.': 'P', '--.-': 'Q', '.-.': 'R', '...': 'S', '-': 'T',
            '..-': 'U', '...-': 'V', '.--': 'W', '-..-': 'X', '-.--': 'Y', '--..': 'Z',
            '-----': '0', '.----': '1', '..---': '2', '...--': '3', '....-': '4', '.....': '5',
            '-....': '6', '--...': '7', '---..': '8', '----.': '9',
            '/': ' '
        };

        function convertText() {
            const input = document.getElementById('inputText').value.trim();
            if (!input) {
                showStatus("{{ __tool('morse-to-text-converter', 'js.error_empty', 'Please enter Morse code to decode') }}", 'error');
                return;
            }
            const output = input.split(' ').map(code => morseToText[code] || '').join('');
            document.getElementById('outputText').value = output;
            showStatus("{{ __tool('morse-to-text-converter', 'js.success_decode', 'Decoded Morse code successfully!') }}", 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputText');
            if (!output.value) {
                showStatus("{{ __tool('morse-to-text-converter', 'js.error_copy', 'Nothing to copy! Please decode some Morse code first.') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('morse-to-text-converter', 'js.success_copy', 'Copied to clipboard!') }}", 'success');
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
    </script>
    @endpush
@endsection