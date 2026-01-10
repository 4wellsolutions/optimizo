@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="html-to-markdown-converter" />

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertHtmlToMarkdown()"
                    class="px-6 py-2.5 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Convert
                </button>
                <button onclick="copyMarkdown()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Copy Markdown
                </button>
                <button onclick="downloadMarkdown()"
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
                <!-- HTML Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">HTML Input</label>
                    <textarea id="htmlInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all"
                        placeholder="Paste your HTML code here..."></textarea>
                </div>

                <!-- Markdown Output -->
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Markdown Output</label>
                    <textarea id="markdownOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all"
                        placeholder="Converted Markdown will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">🔄 About HTML to Markdown Converter</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    Convert HTML code to clean, readable Markdown format instantly with our free online HTML to Markdown
                    converter. Perfect for developers, technical writers, and content creators who need to transform HTML
                    content into Markdown for documentation, README files, or content management systems.
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">✨ Key Features</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>✅ <strong>Instant Conversion:</strong> Convert HTML to Markdown in real-time</li>
                    <li>✅ <strong>Preserve Formatting:</strong> Maintains headings, lists, links, and emphasis</li>
                    <li>✅ <strong>Clean Output:</strong> Generates readable, well-formatted Markdown</li>
                    <li>✅ <strong>No Installation:</strong> Works directly in your browser</li>
                    <li>✅ <strong>Free Forever:</strong> 100% free with no limitations</li>
                    <li>✅ <strong>Privacy First:</strong> All conversion happens locally in your browser</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">🎯 Common Use Cases</h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-5 border-2 border-orange-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">📚 Documentation</h4>
                        <p class="text-gray-700 text-sm">Convert HTML documentation to Markdown for GitHub wikis, README
                            files, and technical docs.</p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl p-5 border-2 border-pink-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">✍️ Content Migration</h4>
                        <p class="text-gray-700 text-sm">Migrate content from HTML-based CMSs to Markdown-based platforms
                            like Jekyll or Hugo.</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-5 border-2 border-blue-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">💻 Email to Markdown</h4>
                        <p class="text-gray-700 text-sm">Convert HTML emails to Markdown format for easier editing and
                            version control.</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">📝 Blog Posts</h4>
                        <p class="text-gray-700 text-sm">Transform HTML blog posts to Markdown for static site generators
                            and modern CMSs.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">🔧 Supported HTML Elements</h3>
                <div class="grid md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 mb-3">Text Formatting</h4>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>✅ Headings (H1-H6)</li>
                            <li>✅ Paragraphs</li>
                            <li>✅ Bold & Strong</li>
                            <li>✅ Italic & Emphasis</li>
                            <li>✅ Code & Preformatted</li>
                            <li>✅ Blockquotes</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 mb-3">Lists & Links</h4>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>✅ Unordered Lists</li>
                            <li>✅ Ordered Lists</li>
                            <li>✅ Nested Lists</li>
                            <li>✅ Hyperlinks</li>
                            <li>✅ Images</li>
                            <li>✅ Line Breaks</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 mb-3">Advanced</h4>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>✅ Tables</li>
                            <li>✅ Horizontal Rules</li>
                            <li>✅ Inline Code</li>
                            <li>✅ Code Blocks</li>
                            <li>✅ Strikethrough</li>
                            <li>✅ Task Lists</li>
                        </ul>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">❓ Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">Is this HTML to Markdown converter free?</h4>
                        <p class="text-gray-700 text-sm">Yes! Our HTML to Markdown converter is 100% free with no
                            limitations, registration, or hidden costs.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">Does it work offline?</h4>
                        <p class="text-gray-700 text-sm">Yes, all conversion happens in your browser using JavaScript, so
                            your data never leaves your device.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">What HTML elements are supported?</h4>
                        <p class="text-gray-700 text-sm">We support all common HTML elements including headings,
                            paragraphs, lists, links, images, tables, code blocks, and more.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">Can I convert large HTML files?</h4>
                        <p class="text-gray-700 text-sm">Yes, there are no size limitations. However, very large files may
                            take a moment to process depending on your browser performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/turndown@7.1.2/dist/turndown.min.js"></script>
    <script>
        const turndownService = new TurndownService({
            headingStyle: 'atx',
            codeBlockStyle: 'fenced'
        });

        function convertHtmlToMarkdown() {
            const html = document.getElementById('htmlInput').value;
            if (!html.trim()) {
                showError('Please enter some HTML code to convert.');
                return;
            }

            try {
                const markdown = turndownService.turndown(html);
                document.getElementById('markdownOutput').value = markdown;
            } catch (error) {
                showError('Error converting HTML: ' + error.message);
            }
        }

        function copyMarkdown() {
            const output = document.getElementById('markdownOutput');
            if (!output.value.trim()) {
                showError('No Markdown to copy. Please convert HTML first.');
                return;
            }

            output.select();
            document.execCommand('copy');
            showSuccess('Markdown copied to clipboard!');
        }

        function downloadMarkdown() {
            const markdown = document.getElementById('markdownOutput').value;
            if (!markdown.trim()) {
                showError('No Markdown to download. Please convert HTML first.');
                return;
            }

            const blob = new Blob([markdown], {
                type: 'text/markdown'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'converted.md';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        function clearAll() {
            document.getElementById('htmlInput').value = '';
            document.getElementById('markdownOutput').value = '';
        }

        function loadExample() {
            const example = `<h1>Welcome to HTML</h1>

            <h2>This is a subheading</h2>

            <p>This is a paragraph with <strong>bold text</strong> and <em>italic text</em>.</p>

            <h3>Features</h3>

            <ul>
              <li>Easy to write</li>
              <li>Easy to read</li>
              <li>Converts to Markdown</li>
            </ul>

            <h3>Code Example</h3>

            <pre><code class="language-javascript">function hello() {
                console.log("Hello, World!");
            }
            </code></pre>

            <blockquote>
              <p>This is a blockquote</p>
            </blockquote>

            <p><a href="https://example.com">Visit our website</a></p>`;

            document.getElementById('htmlInput').value = example;
            convertHtmlToMarkdown();
        }

        // Auto-convert on input (debounced)
        let debounceTimer;
        document.getElementById('htmlInput').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (this.value.trim()) {
                    convertHtmlToMarkdown();
                }
            }, 500);
        });
    </script>
@endsection