@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="text-to-binary" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertTextToBinary()"
                    class="px-6 py-2.5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Convert
                </button>
                <button onclick="copyBinary()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Copy Binary
                </button>
                <button onclick="downloadBinary()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Example
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Text Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Text Input</label>
                    <textarea id="textInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all"
                        placeholder="Enter your text here..."></textarea>
                </div>

                <!-- Binary Output -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Binary Output (8-bit)</label>
                    <textarea id="binaryOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all"
                        placeholder="Binary code will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">🔄 About Text to Binary Converter</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    Convert text to binary code (8-bit representation) instantly with our free online text to binary
                    converter. Perfect for learning binary encoding, computer science education, and data representation.
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">✨ Key Features</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>✅ <strong>8-bit Encoding:</strong> Standard binary representation</li>
                    <li>✅ <strong>UTF-8 Support:</strong> Handles all Unicode characters</li>
                    <li>✅ <strong>Instant Conversion:</strong> Real-time text to binary</li>
                    <li>✅ <strong>Space Separated:</strong> Easy-to-read binary output</li>
                    <li>✅ <strong>Educational Tool:</strong> Learn binary encoding</li>
                    <li>✅ <strong>100% Free:</strong> No limitations or registration</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">🎯 Common Use Cases</h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-xl p-5 border-2 border-cyan-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">🎓 Education</h4>
                        <p class="text-gray-700 text-sm">Learn how computers represent text in binary format.</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border-2 border-blue-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">💻 Programming</h4>
                        <p class="text-gray-700 text-sm">Understand character encoding and binary data representation.</p>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-5 border-2 border-indigo-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">🔐 Encoding</h4>
                        <p class="text-gray-700 text-sm">Convert messages to binary for encoding exercises.</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border-2 border-purple-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">📚 Learning</h4>
                        <p class="text-gray-700 text-sm">Study binary number system and ASCII encoding.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">💡 How Binary Encoding Works</h3>
                <p class="text-gray-700 mb-4">
                    Each character is converted to its ASCII or Unicode value, then represented as an 8-bit binary number.
                    For example, the letter 'A' has ASCII value 65, which is 01000001 in binary.
                </p>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">📚 How to Use Text to Binary Converter</h3>
        <ol class="space-y-3 text-gray-700 list-decimal list-inside pl-4 bg-gray-50 p-6 rounded-xl border border-gray-200">
            <li class="pl-2"><span class="font-semibold">Input Text:</span> Type or paste your text into the left input
                area.</li>
            <li class="pl-2"><span class="font-semibold">Convert:</span> The tool instantly translates each character into
                its 8-bit binary sequence.</li>
            <li class="pl-2"><span class="font-semibold">Result:</span> View the binary string in the output box, separated
                by spaces for readability.</li>
            <li class="pl-2"><span class="font-semibold">Export:</span> Copy the binary code to your clipboard or download
                it as a text file.</li>
        </ol>

        <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">❓ Frequently Asked Questions</h3>
        <div class="space-y-4">
            <div class="border-l-4 border-cyan-500 pl-4 py-2 bg-gray-50 rounded-r-lg">
                <h4 class="font-bold text-gray-900">What encoding is used?</h4>
                <p class="text-gray-700 text-sm mt-1">This tool uses standard UTF-8 encoding, converting each character to
                    its corresponding 8-bit binary representation.</p>
            </div>
            <div class="border-l-4 border-cyan-500 pl-4 py-2 bg-gray-50 rounded-r-lg">
                <h4 class="font-bold text-gray-900">Can I convert back to text?</h4>
                <p class="text-gray-700 text-sm mt-1">Yes! You can use our Binary to Text converter to reverse the process.
                </p>
            </div>
            <div class="border-l-4 border-cyan-500 pl-4 py-2 bg-gray-50 rounded-r-lg">
                <h4 class="font-bold text-gray-900">Is the conversion accurate?</h4>
                <p class="text-gray-700 text-sm mt-1">Yes, the conversion is mathematically precise based on ASCII and
                    Unicode standards.</p>
            </div>
        </div>
    </div>
    </div>

    <script>
        function convertTextToBinary() {
            const text = document.getElementById('textInput').value;
            if (!text.trim()) {
                showError('Please enter some text to convert.');
                return;
            }

            try {
                const binary = text.split('').map(char => {
                    return char.charCodeAt(0).toString(2).padStart(8, '0');
                }).join(' ');

                document.getElementById('binaryOutput').value = binary;
            } catch (error) {
                showError('Error converting text: ' + error.message);
            }
        }

        function copyBinary() {
            const output = document.getElementById('binaryOutput');
            if (!output.value.trim()) {
                showError('No binary to copy. Please convert text first.');
                return;
            }

            output.select();
            document.execCommand('copy');
            showSuccess('Binary copied to clipboard!');
        }

        function downloadBinary() {
            const binary = document.getElementById('binaryOutput').value;
            if (!binary.trim()) {
                showError('No binary to download. Please convert text first.');
                return;
            }

            const blob = new Blob([binary], {
                type: 'text/plain'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'binary.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        function clearAll() {
            document.getElementById('textInput').value = '';
            document.getElementById('binaryOutput').value = '';
        }

        function loadExample() {
            const example = 'Hello World!';
            document.getElementById('textInput').value = example;
            convertTextToBinary();
        }

        // Auto-convert on input (debounced)
        let debounceTimer;
        document.getElementById('textInput').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (this.value.trim()) {
                    convertTextToBinary();
                }
            }, 500);
        });
    </script>
@endsection