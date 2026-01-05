@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="w-full">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="html-viewer" />

        <!-- HTML Viewer Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- HTML Input -->
                <div>
                    <label for="htmlInput" class="block text-sm font-semibold text-gray-700 mb-2">
                        HTML Code
                    </label>
                    <textarea id="htmlInput"
                        class="w-full h-96 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent font-mono text-sm"
                        placeholder="Enter your HTML code here..."></textarea>
                    <div class="mt-4 flex gap-3">
                        <button onclick="clearHTML()"
                            class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            Clear
                        </button>
                        <button onclick="loadSample()"
                            class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 font-semibold">
                            Load Sample
                        </button>
                    </div>
                </div>

                <!-- HTML Preview -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            Live Preview
                        </label>
                        <button onclick="toggleFullscreen()"
                            class="px-3 py-1 bg-orange-600 text-white text-sm rounded-lg hover:bg-orange-700 font-semibold flex items-center gap-2">
                            <svg id="fullscreenIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                            </svg>
                            <span id="fullscreenText">Fullscreen</span>
                        </button>
                    </div>
                    <div id="previewContainer"
                        class="w-full h-96 p-4 border-2 border-gray-300 rounded-xl bg-white overflow-auto">
                        <iframe id="htmlPreview" class="w-full h-full border-0" sandbox="allow-same-origin"></iframe>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What is an HTML Viewer?</h2>
            <p class="text-gray-700 mb-4">
                An HTML Viewer is a powerful online tool that allows you to preview and visualize HTML code in real-time.
                Whether you're a web developer testing code snippets, a student learning HTML, or a designer reviewing
                markup, our HTML viewer provides instant visual feedback for your HTML code. Simply paste your HTML code
                into the editor, and see the rendered output immediately in the live preview pane.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Why Use Our HTML Viewer?</h2>
            <p class="text-gray-700 mb-4">
                Our free HTML viewer offers several advantages for developers and designers. First, it provides instant
                visual feedback without needing to create files or set up a development environment. Second, it's completely
                browser-based, meaning you can use it anywhere without installing software. Third, it's perfect for quick
                testing, debugging, and learning HTML. The side-by-side view lets you see your code and its output
                simultaneously, making it easier to understand how HTML elements render.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Key Features</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li><strong>Real-Time Preview:</strong> See your HTML rendered instantly as you type</li>
                <li><strong>Side-by-Side View:</strong> Code editor and preview pane displayed together</li>
                <li><strong>Syntax Highlighting:</strong> Easy-to-read code with color-coded syntax</li>
                <li><strong>Sample Code:</strong> Load example HTML to get started quickly</li>
                <li><strong>No Installation Required:</strong> Works directly in your browser</li>
                <li><strong>Free to Use:</strong> No registration or payment required</li>
                <li><strong>Secure:</strong> All processing happens in your browser</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">How to Use the HTML Viewer</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>Paste or type your HTML code in the left editor pane</li>
                <li>The preview will update automatically in the right pane</li>
                <li>Use the "Load Sample" button to see example HTML code</li>
                <li>Click "Clear" to start fresh with a blank editor</li>
                <li>Test different HTML elements and see how they render</li>
            </ol>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Common Use Cases</h2>
            <p class="text-gray-700 mb-4">
                HTML viewers are essential tools for various web development tasks. Developers use them to quickly test HTML
                snippets before integrating them into larger projects. Students learning HTML can experiment with different
                tags and attributes to understand their effects. Email marketers use HTML viewers to preview email templates
                before sending. Content creators can visualize how their HTML content will appear on websites. Designers can
                review markup structure and ensure proper rendering of HTML elements.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Understanding HTML Basics</h2>
            <p class="text-gray-700 mb-4">
                HTML (HyperText Markup Language) is the standard markup language for creating web pages. It consists of
                elements represented by tags, which tell browsers how to display content. Common HTML elements include
                headings (&lt;h1&gt; to &lt;h6&gt;), paragraphs (&lt;p&gt;), links (&lt;a&gt;), images (&lt;img&gt;), and
                divisions (&lt;div&gt;). Understanding these basic elements is crucial for web development, and our HTML
                viewer helps you visualize how they work together to create web pages.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">Best Practices for HTML</h2>
            <p class="text-gray-700 mb-4">
                When writing HTML, follow best practices to ensure clean, maintainable code. Always use semantic HTML
                elements that describe their content (like &lt;header&gt;, &lt;nav&gt;, &lt;article&gt;). Properly nest
                elements and close all tags. Use lowercase for tag names and attribute names. Add alt attributes to images
                for accessibility. Validate your HTML to catch errors early. Keep your code organized with proper
                indentation. These practices lead to better SEO, accessibility, and maintainability.
            </p>
        </div>

        <!-- FAQ Section -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is this HTML viewer free to use?</h3>
                    <p class="text-gray-700">
                        Yes, our HTML viewer is completely free to use. There are no hidden fees, registration requirements,
                        or usage limits. You can preview as much HTML code as you need, whenever you need it.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Does the HTML viewer support CSS and JavaScript?</h3>
                    <p class="text-gray-700">
                        The HTML viewer primarily focuses on HTML markup. While inline CSS styles will render, external CSS
                        and JavaScript are sandboxed for security. For full CSS and JavaScript support, consider using a
                        complete code editor or IDE.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Is my HTML code stored or saved?</h3>
                    <p class="text-gray-700">
                        No, all HTML processing happens entirely in your browser. Your code is never sent to our servers or
                        stored anywhere. When you close the page, your code is gone. This ensures complete privacy and
                        security for your HTML content.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I use this tool for learning HTML?</h3>
                    <p class="text-gray-700">
                        Absolutely! Our HTML viewer is perfect for learning HTML. You can experiment with different tags,
                        attributes, and structures to see how they render. The instant preview helps you understand the
                        relationship between HTML code and its visual output, making it an excellent educational tool.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">What's the difference between an HTML viewer and a code
                        editor?</h3>
                    <p class="text-gray-700">
                        An HTML viewer focuses on previewing and visualizing HTML code in real-time, while a code editor
                        provides advanced features like syntax highlighting, auto-completion, debugging, and file
                        management. HTML viewers are ideal for quick previews and testing, while code editors are better for
                        full-scale development projects.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const htmlInput = document.getElementById('htmlInput');
        const htmlPreview = document.getElementById('htmlPreview');

        // Update preview in real-time
        htmlInput.addEventListener('input', updatePreview);

        function updatePreview() {
            const html = htmlInput.value;
            const previewDocument = htmlPreview.contentDocument || htmlPreview.contentWindow.document;
            previewDocument.open();
            previewDocument.write(html);
            previewDocument.close();
        }

        function clearHTML() {
            htmlInput.value = '';
            updatePreview();
        }

        function loadSample() {
            htmlInput.value = `<!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Sample HTML Page</title>
                                    <style>
                                        body {
                                            font-family: Arial, sans-serif;
                                            max-width: 800px;
                                            margin: 0 auto;
                                            padding: 20px;
                                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                            color: white;
                                        }
                                        h1 {
                                            color: #fff;
                                            text-align: center;
                                        }
                                        .card {
                                            background: rgba(255, 255, 255, 0.1);
                                            border-radius: 10px;
                                            padding: 20px;
                                            margin: 20px 0;
                                            backdrop-filter: blur(10px);
                                        }
                                    </style>
                                </head>
                                <body>
                                    <h1>Welcome to HTML Viewer!</h1>
                                    <div class="card">
                                        <h2>About This Tool</h2>
                                        <p>This is a sample HTML page to demonstrate the HTML viewer. You can edit this code and see the changes in real-time!</p>
                                    </div>
                                    <div class="card">
                                        <h2>Features</h2>
                                        <ul>
                                            <li>Real-time preview</li>
                                            <li>Syntax highlighting</li>
                                            <li>Easy to use</li>
                                        </ul>
                                    </div>
                                </body>
                                </html>`;
            updatePreview();
        }

        // Load sample on page load
        window.addEventListener('load', loadSample);

        // Fullscreen toggle function
        function toggleFullscreen() {
            const container = document.getElementById('previewContainer');
            const icon = document.getElementById('fullscreenIcon');
            const text = document.getElementById('fullscreenText');

            if (!document.fullscreenElement) {
                container.requestFullscreen().then(() => {
                    // Change icon to exit fullscreen
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
                    text.textContent = 'Exit Fullscreen';
                }).catch(err => {
                    console.error('Error attempting to enable fullscreen:', err);
                });
            } else {
                document.exitFullscreen().then(() => {
                    // Change icon back to fullscreen
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>';
                    text.textContent = 'Fullscreen';
                });
            }
        }

        // Listen for fullscreen changes (e.g., ESC key)
        document.addEventListener('fullscreenchange', () => {
            const icon = document.getElementById('fullscreenIcon');
            const text = document.getElementById('fullscreenText');

            if (!document.fullscreenElement) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>';
                text.textContent = 'Fullscreen';
            }
        });
    </script>
@endsection