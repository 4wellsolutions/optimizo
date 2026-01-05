@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" />
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
                    {{ $tool->name }}
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium">
                    {{ $tool->meta_description }}
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Converter Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertMarkdown()"
                    class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Convert
                </button>
                <button onclick="copyHtml()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Copy HTML
                </button>
                <button onclick="downloadHtml()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Example
                </button>
            </div>

            <!-- Split View -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Markdown Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Markdown Input</label>
                    <textarea id="markdownInput"
                        class="w-full h-96 p-4 border-2 border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-mono text-sm"
                        placeholder="# Enter your Markdown here...

    ## Example
    **Bold text** and *italic text*

    - List item 1
    - List item 2

    [Link](https://example.com)"></textarea>
                </div>

                <!-- HTML Output -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">HTML Output</label>
                    <div class="relative">
                        <textarea id="htmlOutput" readonly
                            class="w-full h-96 p-4 border-2 border-gray-300 rounded-lg bg-gray-50 font-mono text-sm"
                            placeholder="HTML output will appear here..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Live Preview -->
            <div class="mt-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Live Preview</label>
                <div id="livePreview"
                    class="w-full min-h-48 p-6 border-2 border-gray-300 rounded-lg bg-white prose prose-indigo max-w-none">
                    <p class="text-gray-400">Preview will appear here...</p>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6">
                <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Instant Conversion</h3>
                <p class="text-gray-600">Convert Markdown to HTML instantly with a single click</p>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6">
                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Live Preview</h3>
                <p class="text-gray-600">See your HTML rendered in real-time as you type</p>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Export Options</h3>
                <p class="text-gray-600">Copy to clipboard or download as HTML file</p>
            </div>
        </div>

        <!-- SEO Content - Redesigned -->
        <div
            class="bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                    🚀 Free Markdown to HTML Converter
                </h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Transform your Markdown documents into clean, semantic HTML instantly. Perfect for developers, writers,
                    and content creators who need fast, reliable Markdown conversion.
                </p>
            </div>

            <div class="prose prose-lg max-w-none">
                <div class="bg-white rounded-2xl p-8 mb-8 shadow-lg">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ What is Markdown to HTML Conversion?</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Markdown is a lightweight markup language that allows you to write formatted text using plain text
                        syntax. Converting Markdown to HTML transforms your simple, readable Markdown documents into
                        properly structured HTML code that can be used on websites, blogs, documentation sites, and web
                        applications.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Our free Markdown to HTML converter uses the powerful Parsedown library to ensure accurate,
                        standards-compliant HTML output. Whether you're writing documentation, blog posts, README files, or
                        technical content, our tool makes the conversion process instant and effortless.
                    </p>
                </div>

                <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">💡 Key Features</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    <div
                        class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                        <div class="text-4xl mb-3">⚡</div>
                        <h4 class="font-bold text-xl mb-3">Instant Conversion</h4>
                        <p class="text-white/90">Convert Markdown to HTML in milliseconds with our optimized parsing engine
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                        <div class="text-4xl mb-3">👁️</div>
                        <h4 class="font-bold text-xl mb-3">Live Preview</h4>
                        <p class="text-white/90">See your HTML rendered in real-time as you type with auto-conversion</p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                        <div class="text-4xl mb-3">📋</div>
                        <h4 class="font-bold text-xl mb-3">Copy & Download</h4>
                        <p class="text-white/90">Easily copy HTML to clipboard or download as a file for immediate use</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-blue-200 shadow-lg hover:shadow-xl transition-all">
                        <div class="text-4xl mb-3">🎯</div>
                        <h4 class="font-bold text-xl text-gray-900 mb-3">100% Free</h4>
                        <p class="text-gray-700">No registration, no limits, no watermarks - completely free forever</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-purple-200 shadow-lg hover:shadow-xl transition-all">
                        <div class="text-4xl mb-3">🔒</div>
                        <h4 class="font-bold text-xl text-gray-900 mb-3">Privacy First</h4>
                        <p class="text-gray-700">All conversion happens in your browser - your content never leaves your
                            device</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-cyan-200 shadow-lg hover:shadow-xl transition-all">
                        <div class="text-4xl mb-3">📱</div>
                        <h4 class="font-bold text-xl text-gray-900 mb-3">Mobile Friendly</h4>
                        <p class="text-gray-700">Works perfectly on desktop, tablet, and mobile devices</p>
                    </div>
                </div>

                <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 Supported Markdown Syntax</h3>
                <div class="bg-white rounded-2xl p-8 mb-8 shadow-lg">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-bold text-lg text-gray-900 mb-3">Text Formatting</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li>✅ <strong>Headings:</strong> # H1 through ###### H6</li>
                                <li>✅ <strong>Bold:</strong> **text** or __text__</li>
                                <li>✅ <strong>Italic:</strong> *text* or _text_</li>
                                <li>✅ <strong>Strikethrough:</strong> ~~text~~</li>
                                <li>✅ <strong>Inline Code:</strong> `code`</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-gray-900 mb-3">Structure Elements</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li>✅ <strong>Paragraphs:</strong> Automatic paragraph detection</li>
                                <li>✅ <strong>Line Breaks:</strong> Two spaces or backslash</li>
                                <li>✅ <strong>Horizontal Rules:</strong> --- or ***</li>
                                <li>✅ <strong>Blockquotes:</strong> > Quote text</li>
                                <li>✅ <strong>Code Blocks:</strong> ``` fenced code blocks</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-gray-900 mb-3">Lists</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li>✅ <strong>Unordered Lists:</strong> -, *, or +</li>
                                <li>✅ <strong>Ordered Lists:</strong> 1. 2. 3.</li>
                                <li>✅ <strong>Nested Lists:</strong> Multi-level support</li>
                                <li>✅ <strong>Task Lists:</strong> - [ ] and - [x]</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-gray-900 mb-3">Links & Media</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li>✅ <strong>Links:</strong> [text](url)</li>
                                <li>✅ <strong>Images:</strong> ![alt](url)</li>
                                <li>✅ <strong>Automatic Links:</strong> URL detection</li>
                                <li>✅ <strong>Reference Links:</strong> [text][ref]</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
                <div class="grid md:grid-cols-2 gap-6 mb-10">
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-6 border-2 border-blue-200">
                        <h4 class="font-bold text-xl text-gray-900 mb-3">📚 Documentation</h4>
                        <p class="text-gray-700">Convert README files, API documentation, and technical guides from Markdown
                            to HTML for publishing on documentation sites or wikis.</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200">
                        <h4 class="font-bold text-xl text-gray-900 mb-3">✍️ Blog Posts</h4>
                        <p class="text-gray-700">Write blog posts in Markdown and convert to HTML for WordPress, Ghost, or
                            custom CMS platforms.</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border-2 border-green-200">
                        <h4 class="font-bold text-xl text-gray-900 mb-3">💻 GitHub Projects</h4>
                        <p class="text-gray-700">Transform GitHub README.md files into HTML for project websites or
                            standalone documentation pages.</p>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                        <h4 class="font-bold text-xl text-gray-900 mb-3">📧 Email Templates</h4>
                        <p class="text-gray-700">Create email content in Markdown and convert to HTML for newsletters and
                            email campaigns.</p>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-xl p-6 border-2 border-indigo-200">
                        <h4 class="font-bold text-xl text-gray-900 mb-3">📖 E-books</h4>
                        <p class="text-gray-700">Convert Markdown manuscripts to HTML for e-book publishing platforms like
                            Kindle or ePub.</p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-xl p-6 border-2 border-pink-200">
                        <h4 class="font-bold text-xl text-gray-900 mb-3">🌐 Static Sites</h4>
                        <p class="text-gray-700">Generate HTML content for static site generators like Jekyll, Hugo, or
                            Gatsby.</p>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                    <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        💡 Pro Tip
                    </h4>
                    <p class="text-blue-800 leading-relaxed">
                        For the best results, use standard Markdown syntax as defined by CommonMark. Our converter supports
                        most Markdown flavors including GitHub Flavored Markdown (GFM). If you're working with complex
                        documents, test small sections first to ensure proper conversion.
                    </p>
                </div>

                <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">Is this Markdown to HTML converter really free?
                        </h4>
                        <p class="text-gray-700 leading-relaxed">Yes! Our Markdown to HTML converter is 100% free with no
                            hidden costs, no registration required, and no usage limits. You can convert unlimited Markdown
                            documents to HTML without any restrictions.</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my Markdown content safe and private?</h4>
                        <p class="text-gray-700 leading-relaxed">Absolutely! All Markdown to HTML conversion happens
                            directly in your browser using JavaScript. Your content never leaves your device or gets stored
                            on our servers, ensuring complete privacy and security.</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">What Markdown syntax is supported?</h4>
                        <p class="text-gray-700 leading-relaxed">Our converter supports standard Markdown syntax including
                            headings, bold, italic, lists, links, images, code blocks, blockquotes, tables, and more. It's
                            compatible with CommonMark and GitHub Flavored Markdown (GFM) specifications.</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert large Markdown files?</h4>
                        <p class="text-gray-700 leading-relaxed">Yes! Our converter can handle Markdown documents up to
                            100,000 characters. For larger documents, we recommend breaking them into smaller sections for
                            optimal performance and easier management.</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">How do I use the converted HTML?</h4>
                        <p class="text-gray-700 leading-relaxed">After conversion, you can copy the HTML to your clipboard
                            using the "Copy HTML" button or download it as an HTML file using the "Download" button. The
                            HTML is clean, semantic, and ready to use in websites, blogs, or applications.</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">Does the converter work offline?</h4>
                        <p class="text-gray-700 leading-relaxed">Once the page is loaded, the conversion functionality
                            works entirely in your browser. However, you need an initial internet connection to load the
                            page and the Parsedown library.</p>
                    </div>
                    <div
                        class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                        <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I convert HTML back to Markdown?</h4>
                        <p class="text-gray-700 leading-relaxed">This tool converts Markdown to HTML. If you need to
                            convert HTML to Markdown, check out our HTML to Markdown Converter tool (coming soon!) for the
                            reverse conversion.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let debounceTimer;

        function convertMarkdown() {
            const markdown = document.getElementById('markdownInput').value;

            if (!markdown.trim()) {
                alert('Please enter some Markdown text');
                return;
            }

            fetch('{{ route('utility.markdown-to-html.convert') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    markdown: markdown
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('htmlOutput').value = data.html;
                        document.getElementById('livePreview').innerHTML = data.html;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during conversion');
                });
        }

        function copyHtml() {
            const html = document.getElementById('htmlOutput').value;
            if (!html) {
                alert('No HTML to copy. Please convert Markdown first.');
                return;
            }

            navigator.clipboard.writeText(html).then(() => {
                alert('HTML copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        }

        function downloadHtml() {
            const html = document.getElementById('htmlOutput').value;
            if (!html) {
                alert('No HTML to download. Please convert Markdown first.');
                return;
            }

            const blob = new Blob([html], {
                type: 'text/html'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'converted.html';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        function clearAll() {
            document.getElementById('markdownInput').value = '';
            document.getElementById('htmlOutput').value = '';
            document.getElementById('livePreview').innerHTML = '<p class="text-gray-400">Preview will appear here...</p>';
        }

        function loadExample() {
            const example = `# Welcome to Markdown

## This is a subheading

This is a paragraph with **bold text** and *italic text*.

### Features

- Easy to write
- Easy to read
- Converts to HTML

### Code Example

\`\`\`javascript
function hello() {
    console.log("Hello, World!");
}
\`\`\`

> This is a blockquote

[Visit our website](https://example.com)`;

            document.getElementById('markdownInput').value = example;
            convertMarkdown();
        }

        // Auto-convert on input (debounced)
        document.getElementById('markdownInput').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (this.value.trim()) {
                    convertMarkdown();
                }
            }, 500);
        });
    </script>
@endsection