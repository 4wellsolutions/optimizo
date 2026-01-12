@extends('layouts.app')

@section('title', __tool('text-to-binary', 'meta.h1'))
@section('meta_description', __tool('text-to-binary', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="text-to-binary" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertTextToBinary()"
                    class="px-6 py-2.5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>{!! __tool('text-to-binary', 'editor.btn_convert', 'Convert to Binary') !!}</span>
                </button>
                <button onclick="copyBinary()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('text-to-binary', 'editor.btn_copy', 'Copy') !!}</span>
                </button>
                <button onclick="downloadBinary()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>{!! __tool('text-to-binary', 'editor.btn_download', 'Download') !!}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{!! __tool('text-to-binary', 'editor.btn_example', 'Example') !!}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>{!! __tool('text-to-binary', 'editor.btn_clear', 'Clear') !!}</span>
                </button>
            </div>
            
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="textInput"
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'editor.label_input', 'Text Input') !!}</label>
                    <textarea id="textInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all text-sm resize-none"
                        placeholder="{!! __tool('text-to-binary', 'editor.ph_input', 'Enter text to convert to binary...') !!}"></textarea>
                </div>
                <div>
                    <label for="binaryOutput"
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'editor.label_output', 'Binary Output') !!}</label>
                    <textarea id="binaryOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all text-sm resize-none"
                        placeholder="{!! __tool('text-to-binary', 'editor.ph_output', 'Binary output will appear here...') !!}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-3xl p-8 md:p-12 border-2 border-cyan-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('text-to-binary', 'meta.h1', 'Free Text to Binary Converter') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('text-to-binary', 'meta.subtitle', 'Convert text to binary code instantly') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('text-to-binary', 'content.p1', 'Translate any text to binary code with our free online converter. Understand how computers store data by converting your text into a sequence of 0s and 1s. Perfect for learning about binary encoding, creating binary messages, or debugging.') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('utilities', 'features.title', 'Features') !!}</h3>
             <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔢</div>
                     <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.features.accurate.title', 'Accurate Conversion') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-to-binary', 'content.features.accurate.desc', 'Precise text to binary translation') !!}</p>
                </div>
                 <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                     <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.features.instant.title', 'Instant Results') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-to-binary', 'content.features.instant.desc', 'Convert text to binary in real-time') !!}</p>
                </div>
                 <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">💾</div>
                     <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.features.download.title', 'Download Support') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-to-binary', 'content.features.download.desc', 'Download binary output as a text file') !!}</p>
                </div>
                 <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                     <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.features.copy.title', 'Copy to Clipboard') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-to-binary', 'content.features.copy.desc', 'One-click copy for easy sharing') !!}</p>
                </div>
                 <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                     <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.features.utf8.title', 'UTF-8 Support') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-to-binary', 'content.features.utf8.desc', 'Supports all UTF-8 characters') !!}</p>
                </div>
                 <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                     <h4 class="font-bold text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.features.free.title', '100% Free') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('text-to-binary', 'content.features.free.desc', 'No hidden costs or limits') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-to-binary', 'content.uses_title', 'Common Use Cases') !!}</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.uses.edu.title', 'Education') !!}</h4>
                    <p class="text-gray-700 text-sm">{!! __tool('text-to-binary', 'content.uses.edu.desc', 'Learn how computers represent text in binary format.') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.uses.prog.title', 'Programming') !!}</h4>
                    <p class="text-gray-700 text-sm">{!! __tool('text-to-binary', 'content.uses.prog.desc', 'Understand character encoding and binary data representation.') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.uses.enc.title', 'Encoding') !!}</h4>
                    <p class="text-gray-700 text-sm">{!! __tool('text-to-binary', 'content.uses.enc.desc', 'Convert messages to binary for encoding exercises.') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-2">{!! __tool('text-to-binary', 'content.uses.learn.title', 'Learning') !!}</h4>
                    <p class="text-gray-700 text-sm">{!! __tool('text-to-binary', 'content.uses.learn.desc', 'Study binary number system and ASCII encoding.') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-to-binary', 'content.works.title', 'How Binary Encoding Works') !!}</h3>
            <p class="text-gray-700 mb-4 bg-white p-6 rounded-xl border border-gray-200">
                {!! __tool('text-to-binary', 'content.works.desc', 'Each character is converted to its ASCII or Unicode value, then represented as an 8-bit binary number. For example, the letter "A" has ASCII value 65, which is 01000001 in binary.') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-to-binary', 'content.how_to.title', 'How to Use Text to Binary Converter') !!}</h3>
            <ol class="space-y-3 text-gray-700 list-decimal list-inside pl-4 bg-white p-6 rounded-xl border border-gray-200">
                <li class="pl-2"><span class="font-semibold">{!! __tool('text-to-binary', 'content.how_to.step1', 'Input Text') !!}:</span> {!! __tool('text-to-binary', 'content.how_to.step1_desc', 'Type or paste your text into the left input area.') !!}</li>
                <li class="pl-2"><span class="font-semibold">{!! __tool('text-to-binary', 'content.how_to.step2', 'Convert') !!}:</span> {!! __tool('text-to-binary', 'content.how_to.step2_desc', 'The tool instantly translates each character into its 8-bit binary sequence.') !!}</li>
                <li class="pl-2"><span class="font-semibold">{!! __tool('text-to-binary', 'content.how_to.step3', 'Result') !!}:</span> {!! __tool('text-to-binary', 'content.how_to.step3_desc', 'View the binary string in the output box, separated by spaces for readability.') !!}</li>
                <li class="pl-2"><span class="font-semibold">{!! __tool('text-to-binary', 'content.how_to.step4', 'Export') !!}:</span> {!! __tool('text-to-binary', 'content.how_to.step4_desc', 'Copy the binary code to your clipboard or download it as a text file.') !!}</li>
            </ol>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('text-to-binary', 'content.faq_title', 'Frequently Asked Questions') !!}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-to-binary', 'content.faq.q1', 'What encoding is used?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed text-sm mt-1">{!! __tool('text-to-binary', 'content.faq.a1', 'This tool uses standard UTF-8 encoding, converting each character to its corresponding 8-bit binary representation.') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-to-binary', 'content.faq.q2', 'Can I convert back to text?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed text-sm mt-1">{!! __tool('text-to-binary', 'content.faq.a2', 'Yes! You can use our Binary to Text converter to reverse the process.') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('text-to-binary', 'content.faq.q3', 'Is the conversion accurate?') !!}</h4>
                    <p class="text-gray-700 leading-relaxed text-sm mt-1">{!! __tool('text-to-binary', 'content.faq.a3', 'Yes, the conversion is mathematically precise based on ASCII and Unicode standards.') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function convertTextToBinary() {
            const text = document.getElementById('textInput').value;
            if (!text.trim()) {
                showStatus('{!! __tool('text-to-binary', 'js.error_empty', 'Please enter some text') !!}', 'error');
                return;
            }

            try {
                const binary = text.split('').map(char => {
                    return char.charCodeAt(0).toString(2).padStart(8, '0');
                }).join(' ');

                document.getElementById('binaryOutput').value = binary;
                showStatus('{!! __tool('text-to-binary', 'js.success_convert', '✓ Text converted to binary successfully') !!}', 'success');
            } catch (error) {
                showStatus('{!! __tool('text-to-binary', 'js.error_convert', 'Error converting text: ') !!}' + error.message, 'error');
            }
        }

        function copyBinary() {
            const output = document.getElementById('binaryOutput');
            if (!output.value.trim()) {
                showStatus('{!! __tool('text-to-binary', 'js.error_no_copy', 'No binary output to copy') !!}', 'error');
                return;
            }

            output.select();
            document.execCommand('copy');
            showStatus('{!! __tool('text-to-binary', 'js.success_copy', '✓ Copied to clipboard') !!}', 'success');
        }

        function downloadBinary() {
            const binary = document.getElementById('binaryOutput').value;
            if (!binary.trim()) {
                showStatus('{!! __tool('text-to-binary', 'js.error_no_download', 'No binary output to download') !!}', 'error');
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
            showStatus('{!! __tool('text-to-binary', 'js.success_download', '✓ Download started') !!}', 'success');
        }

        function clearAll() {
            document.getElementById('textInput').value = '';
            document.getElementById('binaryOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function loadExample() {
            const example = 'Hello World!';
            document.getElementById('textInput').value = example;
            convertTextToBinary();
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
    @endpush
@endsection