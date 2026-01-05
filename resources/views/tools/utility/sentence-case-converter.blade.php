@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@section('meta_keywords', $tool->meta_keywords)

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />


        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            {{-- Input Section --}}
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">
                    Input Text
                </label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="Enter your text here. this tool will capitalize the first letter of each sentence. try it now!"></textarea>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert to Sentence Case</span>
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

            {{-- Output Section --}}
            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">
                    Output (Sentence Case)
                </label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="Converted text will appear here..."></textarea>
            </div>

            {{-- Status Message --}}
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>
    </div>

    {{-- SEO Content --}}
    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <h2 class="text-4xl font-black text-gray-900 mb-3">Free Sentence Case Converter Tool</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert text to proper sentence case format</p>
        </div>

        <p class="text-gray-700 leading-relaxed text-lg mb-8">
            Transform your text into proper sentence case format with our free online sentence case converter. This tool
            automatically capitalizes the first letter of each sentence while converting the rest to lowercase, ensuring
            your text follows standard grammatical rules. Perfect for fixing improperly formatted text, cleaning up
            all-caps content, or preparing professional documents.
        </p>

        <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🎯</div>
                <h4 class="font-bold text-gray-900 mb-2">Automatic Capitalization</h4>
                <p class="text-gray-600 text-sm">Intelligently detects sentence boundaries and capitalizes the first letter
                    of each sentence</p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">⚡</div>
                <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                <p class="text-gray-600 text-sm">Real-time processing with immediate results - no waiting required</p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🔒</div>
                <h4 class="font-bold text-gray-900 mb-2">Privacy Protected</h4>
                <p class="text-gray-600 text-sm">All conversions happen in your browser - your text never leaves your device
                </p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">📝</div>
                <h4 class="font-bold text-gray-900 mb-2">Bulk Processing</h4>
                <p class="text-gray-600 text-sm">Convert multiple paragraphs and long documents in one go</p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🎨</div>
                <h4 class="font-bold text-gray-900 mb-2">Clean Formatting</h4>
                <p class="text-gray-600 text-sm">Removes inconsistent capitalization and creates uniform, professional text
                </p>
            </div>
            <div
                class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                <div class="text-3xl mb-3">🆓</div>
                <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                <p class="text-gray-600 text-sm">No registration, no limits, no hidden fees - completely free to use</p>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">🎯 Common Use Cases</h3>
        <div class="grid md:grid-cols-2 gap-6 mb-12">
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">📧 Email Formatting</h4>
                <p class="text-gray-600 text-sm">Fix emails written in all caps or inconsistent capitalization for
                    professional communication</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">📄 Document Editing</h4>
                <p class="text-gray-600 text-sm">Clean up text copied from various sources before adding to your
                    documents</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">✍️ Content Writing</h4>
                <p class="text-gray-600 text-sm">Ensure proper sentence capitalization in blog posts, articles, and web
                    content</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">📱 Social Media Posts</h4>
                <p class="text-gray-600 text-sm">Format social media content with proper capitalization for better
                    readability</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">🎓 Academic Writing</h4>
                <p class="text-gray-600 text-sm">Maintain proper sentence structure in essays, research papers, and
                    assignments</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100 hover:border-purple-200 transition-colors">
                <h4 class="font-bold text-gray-900 mb-2">💼 Business Communication</h4>
                <p class="text-gray-600 text-sm">Create professional reports, proposals, and presentations with
                    consistent formatting</p>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">📖 How to Use the Sentence Case Converter</h3>
        <ol class="space-y-4 mb-12">
            <li class="flex gap-4">
                <span
                    class="flex-shrink-0 w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center font-bold">1</span>
                <div>
                    <strong class="text-gray-900">Paste Your Text:</strong>
                    <p class="text-gray-600 mt-1">Copy and paste the text you want to convert into the input box</p>
                </div>
            </li>
            <li class="flex gap-4">
                <span
                    class="flex-shrink-0 w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center font-bold">2</span>
                <div>
                    <strong class="text-gray-900">Click Convert:</strong>
                    <p class="text-gray-600 mt-1">Press the "Convert to Sentence Case" button to transform your text</p>
                </div>
            </li>
            <li class="flex gap-4">
                <span
                    class="flex-shrink-0 w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center font-bold">3</span>
                <div>
                    <strong class="text-gray-900">Review Output:</strong>
                    <p class="text-gray-600 mt-1">Check the converted text in the output box - first letter of each
                        sentence is capitalized</p>
                </div>
            </li>
            <li class="flex gap-4">
                <span
                    class="flex-shrink-0 w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center font-bold">4</span>
                <div>
                    <strong class="text-gray-900">Copy Result:</strong>
                    <p class="text-gray-600 mt-1">Click "Copy to Clipboard" to copy the formatted text</p>
                </div>
            </li>
            <li class="flex gap-4">
                <span
                    class="flex-shrink-0 w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center font-bold">5</span>
                <div>
                    <strong class="text-gray-900">Use Your Text:</strong>
                    <p class="text-gray-600 mt-1">Paste the properly formatted text wherever you need it</p>
                </div>
            </li>
        </ol>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">💡 Conversion Examples</h3>
        <div class="space-y-6 mb-12">
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <div class="mb-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase">Before:</span>
                    <p class="font-mono text-sm mt-2 text-gray-700">HELLO WORLD. THIS IS A TEST. WELCOME TO OUR TOOL.
                    </p>
                </div>
                <div>
                    <span class="text-sm font-semibold text-purple-600 uppercase">After:</span>
                    <p class="font-mono text-sm mt-2 text-gray-900">Hello world. This is a test. Welcome to our tool.
                    </p>
                </div>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <div class="mb-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase">Before:</span>
                    <p class="font-mono text-sm mt-2 text-gray-700">the quick brown fox jumps over the lazy dog. it was
                        amazing!</p>
                </div>
                <div>
                    <span class="text-sm font-semibold text-purple-600 uppercase">After:</span>
                    <p class="font-mono text-sm mt-2 text-gray-900">The quick brown fox jumps over the lazy dog. It was
                        amazing!</p>
                </div>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <div class="mb-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase">Before:</span>
                    <p class="font-mono text-sm mt-2 text-gray-700">wElCoMe To OuR wEbSiTe. pLeAsE eNjOy YoUr StAy.</p>
                </div>
                <div>
                    <span class="text-sm font-semibold text-purple-600 uppercase">After:</span>
                    <p class="text-gray-900 font-mono text-sm mt-2">Welcome to our website. Please enjoy your stay.</p>
                </div>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <div class="mb-3">
                    <span class="text-sm font-semibold text-gray-500 uppercase">Before:</span>
                    <p class="font-mono text-sm mt-2 text-gray-700">i love programming. it's my passion. coding is fun!
                    </p>
                </div>
                <div>
                    <span class="text-sm font-semibold text-purple-600 uppercase">After:</span>
                    <p class="font-mono text-sm mt-2 text-gray-900">I love programming. It's my passion. Coding is fun!
                    </p>
                </div>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6">❓ Frequently Asked Questions</h3>
        <div class="space-y-6 mb-12">
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100">
                <h4 class="font-bold text-gray-900 mb-2">What is sentence case?</h4>
                <p class="text-gray-600 text-sm">Sentence case is a capitalization style where only the first letter of
                    each sentence is capitalized, along with proper nouns. All other letters are lowercase. It's the
                    standard format for most written English.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100">
                <h4 class="font-bold text-gray-900 mb-2">Does this tool preserve proper nouns?</h4>
                <p class="text-gray-600 text-sm">The tool capitalizes the first letter of each sentence. For proper
                    nouns within sentences, you may need to manually adjust them after conversion, as automatic proper
                    noun detection would require complex language processing.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100">
                <h4 class="font-bold text-gray-900 mb-2">Can I convert large amounts of text?</h4>
                <p class="text-gray-600 text-sm">Yes! Our tool can handle large text blocks, including multiple
                    paragraphs and long documents. All processing happens instantly in your browser without any file
                    size limits.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100">
                <h4 class="font-bold text-gray-900 mb-2">Is my text data safe?</h4>
                <p class="text-gray-600 text-sm">Absolutely! All text conversion happens entirely in your browser using
                    JavaScript. Your text is never sent to any server, ensuring complete privacy and security.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border-2 border-gray-100">
                <h4 class="font-bold text-gray-900 mb-2">What punctuation marks end a sentence?</h4>
                <p class="text-gray-600 text-sm">The tool recognizes periods (.), exclamation marks (!), and question
                    marks (?) as sentence endings. The character following these punctuation marks will be capitalized
                    if it's a letter.</p>
            </div>
        </div>
    </div>
    </div>

    <script>
        function convertText() {
            const input = document.getElementById('inputText').value;

            if (!input.trim()) {
                showStatus('Please enter some text to convert', 'error');
                return;
            }

            // Convert to sentence case
            const output = input.toLowerCase().replace(/(^\s*\w|[.!?]\s*\w)/g, function (match) {
                return match.toUpperCase();
            });

            document.getElementById('outputText').value = output;
            showStatus('✓ Converted to sentence case successfully!', 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            hideStatus();
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
            const statusEl = document.getElementById('statusMessage');
            statusEl.textContent = message;
            statusEl.className = `mt-4 text-center text-sm font-medium ${type === 'success' ? 'text-green-600' : 'text-red-600'}`;
            statusEl.classList.remove('hidden');
        }

        function hideStatus() {
            document.getElementById('statusMessage').classList.add('hidden');
        }
    </script>
@endsection