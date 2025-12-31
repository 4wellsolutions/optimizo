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
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-cyan-500 to-teal-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    CSS Minifier
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Minify CSS to reduce file size or beautify CSS for better readability - 100% free and secure!
                </p>

                @include('components.hero-actions')

            </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="mb-6">
                <label for="cssInput" class="block text-sm font-semibold text-gray-700 mb-2">CSS Input</label>
                <textarea id="cssInput"
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 font-mono text-sm"
                    placeholder="Paste your CSS code here..."></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processCSS('minify')"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">Minify CSS</button>
                <button onclick="processCSS('beautify')"
                    class="px-6 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700">Beautify CSS</button>
                <button onclick="clearCSS()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Clear</button>
                <button onclick="copyCSS()" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Copy
                    Output</button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl"></div>

            <div id="outputSection" class="hidden">
                <label for="cssOutput" class="block text-sm font-semibold text-gray-700 mb-2">CSS Output</label>
                <textarea id="cssOutput" readonly
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl bg-gray-50 font-mono text-sm"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is a CSS Minifier?</h2>
            <p class="text-gray-700 mb-4">
                A CSS Minifier is a tool that compresses CSS code by removing unnecessary characters like whitespace,
                comments, and line breaks without changing functionality. Minified CSS files are significantly smaller,
                leading to faster page load times and improved website performance. Our free online CSS minifier also
                includes a beautify feature to format CSS with proper indentation for better readability during development.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Minify CSS?</h2>
            <p class="text-gray-700 mb-4">
                Minifying CSS is crucial for web performance optimization. Smaller CSS files mean faster downloads, reduced
                bandwidth usage, and improved page load times. Search engines like Google consider page speed as a ranking
                factor, so minified CSS can help improve SEO. For production websites, minified CSS reduces server load and
                improves user experience, especially on mobile devices with slower connections.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Features</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Minify CSS:</strong> Remove whitespace and comments to reduce file size</li>
                <li><strong>Beautify CSS:</strong> Format CSS with proper indentation</li>
                <li><strong>Instant Results:</strong> Process CSS in real-time</li>
                <li><strong>Copy Output:</strong> Easily copy minified CSS</li>
                <li><strong>Secure & Private:</strong> All processing in browser</li>
                <li><strong>Free to Use:</strong> No registration required</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Paste your CSS code into the input field</li>
                <li>Click "Minify CSS" to compress the code</li>
                <li>Click "Beautify CSS" to format with indentation</li>
                <li>Copy the output using "Copy Output" button</li>
            </ol>
        </div>

        <!-- FAQ -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is this CSS minifier free?</h3>
                    <p class="text-gray-700">Yes, completely free with no limitations or registration required.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is my CSS code stored?</h3>
                    <p class="text-gray-700">No, all processing happens in your browser. Your code is never sent to our
                        servers.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How much smaller will my CSS be?</h3>
                    <p class="text-gray-700">Typically 20-40% smaller depending on formatting and comments in original code.
                    </p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I unminify CSS?</h3>
                    <p class="text-gray-700">Yes, use the "Beautify CSS" button to format minified CSS with proper
                        indentation.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Does minifying affect CSS functionality?</h3>
                    <p class="text-gray-700">No, minification only removes unnecessary characters. The CSS works exactly the
                        same.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const cssInput = document.getElementById('cssInput');
        const cssOutput = document.getElementById('cssOutput');
        const statusMessage = document.getElementById('statusMessage');
        const outputSection = document.getElementById('outputSection');

        function showMessage(message, type) {
            statusMessage.className = `mb-6 p-4 rounded-xl ${type === 'success' ? 'bg-green-100 text-green-800 border-2 border-green-300' : 'bg-red-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden');
        }

        function processCSS(action) {
            const css = cssInput.value.trim();
            if (!css) {
                showMessage('Please enter CSS code', 'error');
                return;
            }

            if (action === 'minify') {
                const minified = css.replace(/\/\*[^*]*\*+([^/][^*]*\*+)*\//g, '')
                    .replace(/\s+/g, ' ')
                    .replace(/\s*([{}:;,>+~])\s*/g, '$1')
                    .replace(/;}/g, '}')
                    .trim();
                cssOutput.value = minified;
                showMessage('✓ CSS minified successfully!', 'success');
            } else {
                const beautified = css.replace(/\s+/g, ' ')
                    .replace(/\{/g, ' {\n  ')
                    .replace(/\}/g, '\n}\n')
                    .replace(/;/g, ';\n  ')
                    .replace(/\n\s+\n/g, '\n')
                    .trim();
                cssOutput.value = beautified;
                showMessage('✓ CSS beautified successfully!', 'success');
            }
            outputSection.classList.remove('hidden');
        }

        function clearCSS() {
            cssInput.value = '';
            cssOutput.value = '';
            statusMessage.classList.add('hidden');
            outputSection.classList.add('hidden');
        }

        function copyCSS() {
            if (!cssOutput.value) {
                showMessage('No output to copy', 'error');
                return;
            }
            cssOutput.select();
            document.execCommand('copy');
            showMessage('✓ Copied to clipboard!', 'success');
        }
    </script>
@endsection