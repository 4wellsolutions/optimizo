@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="text-to-morse-converter" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">Input Text</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="SOS"></textarea>
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-cyan-600 text-white rounded-xl hover:bg-cyan-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert to Morse Code</span>
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
            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">Morse Code Output</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="... --- ..."></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div class="bg-gradient-to-br from-cyan-50 to-sky-50 rounded-3xl p-8 md:p-12 border-2 border-cyan-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-sky-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Text to Morse Code Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Encode text into Morse code</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">Convert text to Morse code instantly with our free online
                converter. Morse code uses dots (.) and dashes (-) to represent letters and numbers. Perfect for learning
                Morse code, emergency communication practice, or creating encoded messages.</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Standard Morse Code</h4>
                    <p class="text-gray-600 text-sm">Uses international Morse code standard</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-sky-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Encoding</h4>
                    <p class="text-gray-600 text-sm">Convert to Morse code in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy Protected</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bulk Processing</h4>
                    <p class="text-gray-600 text-sm">Convert multiple words at once</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Letters & Numbers</h4>
                    <p class="text-gray-600 text-sm">Supports A-Z and 0-9</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits or registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📚 Learning Morse Code</h4>
                    <p class="text-gray-700 leading-relaxed">Practice and learn Morse code by converting familiar words and
                        phrases</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🚨 Emergency Practice</h4>
                    <p class="text-gray-700 leading-relaxed">Learn SOS and other emergency signals in Morse code</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎮 Gaming & Puzzles</h4>
                    <p class="text-gray-700 leading-relaxed">Create encoded messages for games and escape rooms</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📡 Ham Radio</h4>
                    <p class="text-gray-700 leading-relaxed">Practice for amateur radio licensing and communication</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎓 Education</h4>
                    <p class="text-gray-700 leading-relaxed">Teach students about communication history and encoding</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔐 Secret Messages</h4>
                    <p class="text-gray-700 leading-relaxed">Create fun encoded messages for friends</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-cyan-600 text-lg">1.</span><span><strong>Enter Text:</strong> Type the
                            text you want to convert</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-cyan-600 text-lg">2.</span><span><strong>Click Convert:</strong> Press
                            "Convert to Morse Code"</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-cyan-600 text-lg">3.</span><span><strong>Review Output:</strong> Check the
                            Morse code result</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-cyan-600 text-lg">4.</span><span><strong>Copy Result:</strong> Click
                            "Copy" to copy to clipboard</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-cyan-600 text-lg">5.</span><span><strong>Use Morse Code:</strong> Share or
                            practice with the encoded message</span></li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">SOS Signal:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">SOS → ... --- ...</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Simple Word:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">HELLO → .... . .-.. .-.. ---</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Numbers:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">123 → .---- ..--- ...--</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Phrase:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">HI → .... ..</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is Morse code?</h4>
                    <p class="text-gray-700 leading-relaxed">Morse code is a method of encoding text using dots (.) and
                        dashes (-) to represent letters and numbers. It was invented in the 1830s for telegraph
                        communication.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What does SOS mean in Morse code?</h4>
                    <p class="text-gray-700 leading-relaxed">SOS is ... --- ... (three dots, three dashes, three dots). It's
                        the international distress signal.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert numbers?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! The tool supports numbers 0-9, each with its own Morse
                        code pattern.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is Morse code still used today?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! It's still used in aviation, maritime communication,
                        amateur radio, and as an accessibility tool.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is this tool free?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Completely free with no limits. All processing happens in
                        your browser for privacy.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const morseCode = {
            'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 'F': '..-.', 'G': '--.', 'H': '....', 'I': '..', 'J': '.---',
            'K': '-.-', 'L': '.-..', 'M': '--', 'N': '-.', 'O': '---', 'P': '.--.', 'Q': '--.-', 'R': '.-.', 'S': '...', 'T': '-',
            'U': '..-', 'V': '...-', 'W': '.--', 'X': '-..-', 'Y': '-.--', 'Z': '--..',
            '0': '-----', '1': '.----', '2': '..---', '3': '...--', '4': '....-', '5': '.....',
            '6': '-....', '7': '--...', '8': '---..', '9': '----.',
            ' ': '/'
        };

        function convertText() {
            const input = document.getElementById('inputText').value.toUpperCase();
            if (!input.trim()) {
                showStatus('Please enter some text to convert', 'error');
                return;
            }
            const output = input.split('').map(char => morseCode[char] || '').join(' ').replace(/\s+/g, ' ').trim();
            document.getElementById('outputText').value = output;
            showStatus('✓ Converted to Morse code successfully!', 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputText');
            if (!output.value) {
                showStatus('Nothing to copy! Please convert some text first.', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard!', 'success');
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
@endsection