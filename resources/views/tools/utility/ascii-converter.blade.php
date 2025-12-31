@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-yellow-500 via-orange-500 to-red-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    ASCII Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Convert between text and ASCII codes instantly - 100% free and easy to use!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-yellow-200 mb-8">
            <!-- Mode Selector -->
            <div class="flex gap-3 mb-6">
                <button onclick="setMode('toAscii')" id="toAsciiBtn"
                    class="flex-1 px-6 py-3 bg-yellow-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                    Text to ASCII
                </button>
                <button onclick="setMode('toText')" id="toTextBtn"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                    ASCII to Text
                </button>
            </div>

            <!-- Input -->
            <div class="mb-6">
                <label for="asciiInput" class="form-label text-base" id="inputLabel">Enter Text</label>
                <textarea id="asciiInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="Hello World"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processASCII()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span id="processBtn">Convert to ASCII</span>
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
                <label for="asciiOutput" class="form-label text-base" id="outputLabel">ASCII Codes</label>
                <textarea id="asciiOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="Converted output will appear here..."></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl p-8 md:p-12 border-2 border-yellow-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free ASCII Converter Online</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert between text and ASCII codes instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free ASCII Converter tool allows you to convert text to ASCII codes and vice versa. Perfect for
                programming, data encoding, and understanding character representations in computers.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔤 What is ASCII?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                ASCII (American Standard Code for Information Interchange) is a character encoding standard that assigns
                numeric codes (0-127) to letters, numbers, and symbols. Each character has a unique ASCII code that
                computers use to represent text.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert text to ASCII and back in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bidirectional</h4>
                    <p class="text-gray-600 text-sm">Convert text to ASCII or ASCII to text</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">💻 Programming</h4>
                    <p class="text-gray-700 leading-relaxed">Work with character codes in programming and data processing
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📚 Learning</h4>
                    <p class="text-gray-700 leading-relaxed">Understand how computers represent text using numbers</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔐 Encoding</h4>
                    <p class="text-gray-700 leading-relaxed">Encode text data for transmission or storage</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🐛 Debugging</h4>
                    <p class="text-gray-700 leading-relaxed">Debug character encoding issues in applications</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 ASCII Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Letter 'A':</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 65</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Letter 'a':</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 97</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Number '0':</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 48</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Space Character:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">ASCII Code: 32</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is the ASCII code range?</h4>
                    <p class="text-gray-700 leading-relaxed">Standard ASCII uses codes 0-127. Extended ASCII uses 0-255.
                        This tool works with standard ASCII characters.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert special characters?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! This tool converts all ASCII characters including letters,
                        numbers, punctuation, and special symbols.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All conversions happen in your browser. Your text never
                        leaves your device.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentMode = 'toAscii';

        function setMode(mode) {
            currentMode = mode;
            const toAsciiBtn = document.getElementById('toAsciiBtn');
            const toTextBtn = document.getElementById('toTextBtn');
            const inputLabel = document.getElementById('inputLabel');
            const outputLabel = document.getElementById('outputLabel');
            const processBtn = document.getElementById('processBtn');

            if (mode === 'toAscii') {
                toAsciiBtn.classList.remove('bg-gray-200', 'text-gray-700');
                toAsciiBtn.classList.add('bg-yellow-600', 'text-white');
                toTextBtn.classList.remove('bg-yellow-600', 'text-white');
                toTextBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter Text';
                outputLabel.textContent = 'ASCII Codes';
                processBtn.textContent = 'Convert to ASCII';
            } else {
                toTextBtn.classList.remove('bg-gray-200', 'text-gray-700');
                toTextBtn.classList.add('bg-yellow-600', 'text-white');
                toAsciiBtn.classList.remove('bg-yellow-600', 'text-white');
                toAsciiBtn.classList.add('bg-gray-200', 'text-gray-700');
                inputLabel.textContent = 'Enter ASCII Codes (space-separated)';
                outputLabel.textContent = 'Converted Text';
                processBtn.textContent = 'Convert to Text';
            }
            clearAll();
        }

        function processASCII() {
            const input = document.getElementById('asciiInput').value.trim();
            const output = document.getElementById('asciiOutput');

            if (!input) {
                showStatus('Please enter text to convert', 'error');
                return;
            }

            try {
                if (currentMode === 'toAscii') {
                    // Text to ASCII
                    const codes = [];
                    for (let i = 0; i < input.length; i++) {
                        codes.push(input.charCodeAt(i));
                    }
                    output.value = codes.join(' ');
                    showStatus('✓ Text converted to ASCII codes successfully', 'success');
                } else {
                    // ASCII to Text
                    const codes = input.split(/\s+/).filter(code => code.trim());
                    let text = '';
                    for (let code of codes) {
                        const num = parseInt(code);
                        if (isNaN(num) || num < 0 || num > 127) {
                            showStatus('✗ Invalid ASCII code: ' + code, 'error');
                            return;
                        }
                        text += String.fromCharCode(num);
                    }
                    output.value = text;
                    showStatus('✓ ASCII codes converted to text successfully', 'success');
                }
            } catch (error) {
                showStatus('✗ Error converting: ' + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('asciiInput').value = '';
            document.getElementById('asciiOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('asciiOutput');
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
        document.getElementById('asciiInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                processASCII();
            }
        });
    </script>
@endsection