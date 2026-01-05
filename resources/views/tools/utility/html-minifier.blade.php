@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <x-tool-hero :tool="$tool" icon="html-minifier" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="mb-6">
                <label for="htmlInput" class="block text-sm font-semibold text-gray-700 mb-2">HTML Input</label>
                <textarea id="htmlInput"
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 font-mono text-sm"
                    placeholder="Paste your HTML code here..."></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processHTML('minify')"
                    class="px-6 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-semibold">Minify HTML</button>
                <button onclick="processHTML('beautify')"
                    class="px-6 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700">Beautify HTML</button>
                <button onclick="clearHTML()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Clear</button>
                <button onclick="copyHTML()" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Copy
                    Output</button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl"></div>

            <div id="outputSection" class="hidden">
                <label for="htmlOutput" class="block text-sm font-semibold text-gray-700 mb-2">HTML Output</label>
                <textarea id="htmlOutput" readonly
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl bg-gray-50 font-mono text-sm"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is an HTML Minifier?</h2>
            <p class="text-gray-700 mb-4">
                An HTML Minifier is a tool that compresses HTML code by removing unnecessary characters like whitespace,
                comments, and line breaks without changing functionality. Minified HTML files are significantly smaller,
                leading to faster page load times and improved website performance. Our free online HTML minifier also
                includes a beautify feature to format HTML with proper indentation for better readability during
                development.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Minify HTML?</h2>
            <p class="text-gray-700 mb-4">
                Minifying HTML is important for web performance optimization. Smaller HTML files mean faster downloads,
                reduced bandwidth usage, and improved page load times. This is especially beneficial for large websites with
                lots of HTML content. Minified HTML reduces server load and improves user experience. For production
                websites, HTML minification combined with CSS and JavaScript minification can significantly improve overall
                page performance.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Features</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Minify HTML:</strong> Remove whitespace and comments to reduce file size</li>
                <li><strong>Beautify HTML:</strong> Format HTML with proper indentation</li>
                <li><strong>Instant Results:</strong> Process HTML in real-time</li>
                <li><strong>Copy Output:</strong> Easily copy minified HTML</li>
                <li><strong>Secure & Private:</strong> All processing in browser</li>
                <li><strong>Free to Use:</strong> No registration required</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Paste your HTML code into the input field</li>
                <li>Click "Minify HTML" to compress the code</li>
                <li>Click "Beautify HTML" to format with indentation</li>
                <li>Copy the output using "Copy Output" button</li>
            </ol>
        </div>

        <!-- FAQ -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is this HTML minifier free?</h3>
                    <p class="text-gray-700">Yes, completely free with no limitations or registration required.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is my HTML code stored?</h3>
                    <p class="text-gray-700">No, all processing happens in your browser. Your code is never sent to our
                        servers.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">How much smaller will my HTML be?</h3>
                    <p class="text-gray-700">Typically 10-30% smaller depending on formatting and comments in original code.
                    </p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I unminify HTML?</h3>
                    <p class="text-gray-700">Yes, use the "Beautify HTML" button to format minified HTML with proper
                        indentation.</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Does minifying affect HTML functionality?</h3>
                    <p class="text-gray-700">No, minification only removes unnecessary characters. The HTML works exactly
                        the same.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const htmlInput = document.getElementById('htmlInput');
        const htmlOutput = document.getElementById('htmlOutput');
        const statusMessage = document.getElementById('statusMessage');
        const outputSection = document.getElementById('outputSection');

        function showMessage(message, type) {
            statusMessage.className = `mb-6 p-4 rounded-xl ${type === 'success' ? 'bg-green-100 text-green-800 border-2 border-green-300' : 'bg-red-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden');
        }

        function processHTML(action) {
            const html = htmlInput.value.trim();
            if (!html) {
                showMessage('Please enter HTML code', 'error');
                return;
            }

            if (action === 'minify') {
                const minified = html.replace(/<!--(.|\s)*?-->/g, '')
                                        .replace(/>\s+</g, '><')
                    .replace(/\s+/g, ' ')
                    .trim();
                htmlOutput.value = minified;
                showMessage('✓ HTML minified successfully!', 'success');
            } else {
                let formatted = html.replace(/>\s+</g, '><').replace(/></g, '>\n<');
                const lines = formatted.split('\n');
                let indent = 0;
                let result = '';

                lines.forEach(line => {
                    const trimmed = line.trim();
                    if (trimmed.match(/^<\//)) indent = Math.max(0, indent - 1);
                    result += '  '.repeat(indent) + trimmed + '\n';
                    if (trimmed.match(/^<[^\/]/) && !trimmed.match(/\/>$/)) {
                        if (!trimmed.match(/<(br|hr|img|input|meta|link)/i)) indent++;
                    }
                });

                htmlOutput.value = result.trim();
                showMessage('✓ HTML beautified successfully!', 'success');
            }
            outputSection.classList.remove('hidden');
        }

        function clearHTML() {
            htmlInput.value = '';
            htmlOutput.value = '';
            statusMessage.classList.add('hidden');
            outputSection.classList.add('hidden');
        }

        function copyHTML() {
            if (!htmlOutput.value) {
                showMessage('No output to copy', 'error');
                return;
            }
            htmlOutput.select();
            document.execCommand('copy');
            showMessage('✓ Copied to clipboard!', 'success');
        }
    </script>
@endsection