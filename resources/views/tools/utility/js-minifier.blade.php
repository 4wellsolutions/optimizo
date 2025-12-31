@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-yellow-500 via-orange-500 to-red-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    JavaScript Minifier
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Minify JavaScript to reduce file size or beautify JS for better readability - 100% free and secure!
                </p>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="mb-6">
                <label for="jsInput" class="block text-sm font-semibold text-gray-700 mb-2">JavaScript Input</label>
                <textarea id="jsInput"
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-500 font-mono text-sm"
                    placeholder="Paste your JavaScript code here..."></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processJS('minify')"
                    class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 font-semibold">Minify
                    JS</button>
                <button onclick="processJS('beautify')"
                    class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Beautify JS</button>
                <button onclick="clearJS()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Clear</button>
                <button onclick="copyJS()" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Copy
                    Output</button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl"></div>

            <div id="outputSection" class="hidden">
                <label for="jsOutput" class="block text-sm font-semibold text-gray-700 mb-2">JavaScript Output</label>
                <textarea id="jsOutput" readonly
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl bg-gray-50 font-mono text-sm"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is a JavaScript Minifier?</h2>
            <p class="text-gray-700 mb-4">
                A JavaScript Minifier is a tool that compresses JavaScript code by removing unnecessary characters like
                whitespace, comments, and line breaks without changing functionality. Minified JavaScript files are
                significantly smaller, leading to faster page load times and improved website performance. Our free online
                JS minifier also includes a beautify feature to format JavaScript with proper indentation for better
                readability during development.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Minify JavaScript?</h2>
            <p class="text-gray-700 mb-4">
                Minifying JavaScript is essential for web performance optimization. Smaller JS files mean faster downloads,
                reduced bandwidth usage, and improved page load times. This is especially important for mobile users and
                users with slower internet connections. Minified JavaScript reduces server load and improves user
                experience. For production websites, minification is a standard best practice that can significantly improve
                Core Web Vitals scores.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Features</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Minify JavaScript:</strong> Remove whitespace and comments to reduce file size</li>
                <li><strong>Beautify JavaScript:</strong> Format JS with proper indentation</li>
                <li><strong>Instant Results:</strong> Process JavaScript in real-time</li>
                <li><strong>Copy Output:</strong> Easily copy minified JavaScript</li>
                <li><strong>Secure & Private:</strong> All processing in browser</li>
                <li><strong>Free to Use:</strong> No registration required</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Paste your JavaScript code into the input field</li>
                <li>Click "Minify JS" to compress the code</li>
                <li>Click "Beautify JS" to format with indentation</li>
                <li>Copy the output using "Copy Output" button</li>
            </ol>
        </div>

        <!-- FAQ -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is this JavaScript minifier free?</h3>
                    <p class="text-gray-700">Yes, completely free with no limitations or registration required.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is my JavaScript code stored?</h3>
                    <p class="text-gray-700">No, all processing happens in your browser. Your code is never sent to our
                        servers.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How much smaller will my JS be?</h3>
                    <p class="text-gray-700">Typically 30-50% smaller depending on formatting and comments in original code.
                    </p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I unminify JavaScript?</h3>
                    <p class="text-gray-700">Yes, use the "Beautify JS" button to format minified JavaScript with proper
                        indentation.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Does minifying affect JavaScript functionality?</h3>
                    <p class="text-gray-700">No, minification only removes unnecessary characters. The JavaScript works
                        exactly the same.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const jsInput = document.getElementById('jsInput');
        const jsOutput = document.getElementById('jsOutput');
        const statusMessage = document.getElementById('statusMessage');
        const outputSection = document.getElementById('outputSection');

        function showMessage(message, type) {
            statusMessage.className = `mb-6 p-4 rounded-xl ${type === 'success' ? 'bg-green-100 text-green-800 border-2 border-green-300' : 'bg-red-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden');
        }

        function processJS(action) {
            const js = jsInput.value.trim();
            if (!js) {
                showMessage('Please enter JavaScript code', 'error');
                return;
            }

            if (action === 'minify') {
                const minified = js.replace(/\/\/.*?\n/g, '\n')
                    .replace(/\/\*.*?\*\//gs, '')
                    .replace(/\s+/g, ' ')
                    .replace(/\s*([{}:;,=<>+\-*\/()[\]])\s*/g, '$1')
                    .trim();
                jsOutput.value = minified;
                showMessage('✓ JavaScript minified successfully!', 'success');
            } else {
                const beautified = js.replace(/\{/g, ' {\n  ')
                    .replace(/\}/g, '\n}\n')
                    .replace(/;/g, ';\n  ')
                    .replace(/\n\s+\n/g, '\n')
                    .trim();
                jsOutput.value = beautified;
                showMessage('✓ JavaScript beautified successfully!', 'success');
            }
            outputSection.classList.remove('hidden');
        }

        function clearJS() {
            jsInput.value = '';
            jsOutput.value = '';
            statusMessage.classList.add('hidden');
            outputSection.classList.add('hidden');
        }

        function copyJS() {
            if (!jsOutput.value) {
                showMessage('No output to copy', 'error');
                return;
            }
            jsOutput.select();
            document.execCommand('copy');
            showMessage('✓ Copied to clipboard!', 'success');
        }
    </script>
@endsection