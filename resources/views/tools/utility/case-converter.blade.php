@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-orange-500 via-red-500 to-pink-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
                    Case Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium">
                    Convert text between different cases instantly!
                </p>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="form-label text-base">Enter Text</label>
                <textarea id="inputText" rows="6" class="form-input" placeholder="Enter text to convert..."></textarea>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <button onclick="convertCase('upper')" class="btn-primary justify-center py-3">
                    UPPERCASE
                </button>
                <button onclick="convertCase('lower')" class="btn-primary justify-center py-3">
                    lowercase
                </button>
                <button onclick="convertCase('title')" class="btn-primary justify-center py-3">
                    Title Case
                </button>
                <button onclick="convertCase('sentence')" class="btn-primary justify-center py-3">
                    Sentence case
                </button>
            </div>

            <div>
                <label class="form-label text-base">Result</label>
                <textarea id="outputText" rows="6" readonly class="form-input bg-gray-50"></textarea>
                <button onclick="copyResult()" class="mt-3 btn-primary justify-center w-full py-3">
                    Copy Result
                </button>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content - Stunning Design -->
        <div
            class="bg-gradient-to-br from-orange-50 via-red-50 to-pink-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-orange-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Text Case Converter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert text between different cases instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Convert text between uppercase, lowercase, title case, and sentence case with one click using our free
                online case converter. Perfect for formatting text, fixing caps lock mistakes, preparing content for
                different platforms, and ensuring consistent text styling. All processing happens instantly in your browser
                - no data is sent to any server.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">📝 Available Case Types</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">🔠 UPPERCASE</h4>
                    <p class="text-white/90 mb-3">Converts all letters to capital letters</p>
                    <p class="text-white/80 text-sm">Example: "hello world" → "HELLO WORLD"</p>
                </div>
                <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">🔡 lowercase</h4>
                    <p class="text-white/90 mb-3">Converts all letters to small letters</p>
                    <p class="text-white/80 text-sm">Example: "HELLO WORLD" → "hello world"</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-orange-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">📖 Title Case</h4>
                    <p class="text-gray-700 mb-3">Capitalizes the first letter of each word</p>
                    <p class="text-gray-600 text-sm">Example: "hello world" → "Hello World"</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">✍️ Sentence case</h4>
                    <p class="text-gray-700 mb-3">Capitalizes the first letter of each sentence</p>
                    <p class="text-gray-600 text-sm">Example: "hello. world here." → "Hello. World here."</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⌨️</div>
                    <h4 class="font-bold text-gray-900 mb-2">Fix Caps Lock</h4>
                    <p class="text-gray-600 text-sm">Quickly fix text typed with caps lock accidentally enabled</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📄</div>
                    <h4 class="font-bold text-gray-900 mb-2">Format Documents</h4>
                    <p class="text-gray-600 text-sm">Ensure consistent capitalization in documents and reports</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📱</div>
                    <h4 class="font-bold text-gray-900 mb-2">Social Media</h4>
                    <p class="text-gray-600 text-sm">Format posts and captions for different platforms</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">💼</div>
                    <h4 class="font-bold text-gray-900 mb-2">Professional Emails</h4>
                    <p class="text-gray-600 text-sm">Ensure proper capitalization in business communications</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Content Writing</h4>
                    <p class="text-gray-600 text-sm">Format headings, titles, and body text consistently</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔤</div>
                    <h4 class="font-bold text-gray-900 mb-2">Data Cleaning</h4>
                    <p class="text-gray-600 text-sm">Standardize text data for databases and spreadsheets</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 Capitalization Best Practices
                </h4>
                <ul class="text-blue-800 leading-relaxed space-y-2">
                    <li>✅ Use sentence case for body text and paragraphs</li>
                    <li>✅ Use title case for headings, titles, and headlines</li>
                    <li>✅ Use uppercase sparingly - only for acronyms or emphasis</li>
                    <li>✅ Avoid mixing case styles within the same document</li>
                    <li>✅ Follow platform-specific guidelines (e.g., Twitter, LinkedIn)</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is the difference between title case and sentence
                        case?</h4>
                    <p class="text-gray-700 leading-relaxed">Title case capitalizes the first letter of every word (e.g.,
                        "Hello World"), while sentence case only capitalizes the first letter of each sentence (e.g., "Hello
                        world. This is great.").</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert multiple paragraphs at once?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Our case converter handles text of any length, including
                        multiple paragraphs, sentences, and even entire documents. Simply paste your text and convert.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does the tool preserve formatting and line breaks?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, the case converter preserves all formatting, line breaks,
                        and special characters. Only the letter case is changed - everything else remains intact.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my text sent to a server?</h4>
                    <p class="text-gray-700 leading-relaxed">No! All text conversion happens entirely in your browser using
                        JavaScript. Your text never leaves your device, ensuring complete privacy and security.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I use each case type?</h4>
                    <p class="text-gray-700 leading-relaxed">Use uppercase for acronyms and emphasis, lowercase for URLs and
                        code, title case for headings and titles, and sentence case for body text and natural writing.
                        Choose based on your content type and platform requirements.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function convertCase(type) {
            const input = document.getElementById('inputText').value;
            if (!input) {
                alert('Please enter some text');
                return;
            }

            let result = '';
            switch (type) {
                case 'upper':
                    result = input.toUpperCase();
                    break;
                case 'lower':
                    result = input.toLowerCase();
                    break;
                case 'title':
                    result = input.toLowerCase().replace(/\b\w/g, l => l.toUpperCase());
                    break;
                case 'sentence':
                    result = input.toLowerCase().replace(/(^\s*\w|[.!?]\s*\w)/g, l => l.toUpperCase());
                    break;
            }

            document.getElementById('outputText').value = result;
        }

        function copyResult() {
            const output = document.getElementById('outputText');
            if (!output.value) {
                alert('No text to copy');
                return;
            }
            output.select();
            document.execCommand('copy');

            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = 'Copied!';
            setTimeout(() => btn.textContent = originalText, 2000);
        }
    </script>
@endsection