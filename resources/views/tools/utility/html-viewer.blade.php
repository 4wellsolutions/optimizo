@extends('layouts.app')

@section('title', __tool('html-viewer', 'meta.h1'))
@section('meta_description', __tool('html-viewer', 'meta.subtitle'))
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
                        {!! __tool('html-viewer', 'editor.label_input') !!}
                    </label>
                    <textarea id="htmlInput"
                        class="w-full h-96 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent font-mono text-sm"
                        placeholder="{!! __tool('html-viewer', 'editor.ph_input') !!}"></textarea>
                    <div class="mt-4 flex gap-3">
                        <button onclick="clearHTML()"
                            class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold">
                            {!! __tool('html-viewer', 'editor.btn_clear') !!}
                        </button>
                        <button onclick="loadSample()"
                            class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 font-semibold">
                            {!! __tool('html-viewer', 'editor.btn_load_sample') !!}
                        </button>
                    </div>
                </div>

                <!-- HTML Preview -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            {!! __tool('html-viewer', 'editor.label_preview') !!}
                        </label>
                        <button onclick="toggleFullscreen()"
                            class="px-3 py-1 bg-orange-600 text-white text-sm rounded-lg hover:bg-orange-700 font-semibold flex items-center gap-2">
                            <svg id="fullscreenIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                            </svg>
                            <span id="fullscreenText">{!! __tool('html-viewer', 'editor.btn_fullscreen') !!}</span>
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
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{!! __tool('html-viewer', 'content.about_title') !!}</h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-viewer', 'content.about_desc') !!}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-viewer', 'content.why_title') !!}</h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-viewer', 'content.why_desc') !!}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-viewer', 'content.features_title') !!}
            </h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('html-viewer', 'content.features_list.preview') !!}</li>
                <li>{!! __tool('html-viewer', 'content.features_list.layout') !!}</li>
                <li>{!! __tool('html-viewer', 'content.features_list.syntax') !!}</li>
                <li>{!! __tool('html-viewer', 'content.features_list.sample') !!}</li>
                <li>{!! __tool('html-viewer', 'content.features_list.no_install') !!}</li>
                <li>{!! __tool('html-viewer', 'content.features_list.free') !!}</li>
                <li>{!! __tool('html-viewer', 'content.features_list.secure') !!}</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-viewer', 'content.how_title') !!}</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('html-viewer', 'content.how_steps.1') !!}</li>
                <li>{!! __tool('html-viewer', 'content.how_steps.2') !!}</li>
                <li>{!! __tool('html-viewer', 'content.how_steps.3') !!}</li>
                <li>{!! __tool('html-viewer', 'content.how_steps.4') !!}</li>
                <li>{!! __tool('html-viewer', 'content.how_steps.5') !!}</li>
            </ol>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-viewer', 'content.uses_title') !!}</h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-viewer', 'content.uses_desc') !!}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-viewer', 'content.basics_title') !!}
            </h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-viewer', 'content.basics_desc') !!}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-viewer', 'content.tips_title') !!}</h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-viewer', 'content.tips_desc') !!}
            </p>
        </div>

        <!-- FAQ Section -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{!! __tool('html-viewer', 'content.faq_title') !!}</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-viewer', 'content.faq.q1') !!}</h3>
                    <p class="text-gray-700">
                        {!! __tool('html-viewer', 'content.faq.a1') !!}
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-viewer', 'content.faq.q2') !!}</h3>
                    <p class="text-gray-700">
                        {!! __tool('html-viewer', 'content.faq.a2') !!}
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-viewer', 'content.faq.q3') !!}</h3>
                    <p class="text-gray-700">
                        {!! __tool('html-viewer', 'content.faq.a3') !!}
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-viewer', 'content.faq.q4') !!}</h3>
                    <p class="text-gray-700">
                        {!! __tool('html-viewer', 'content.faq.a4') !!}
                    </p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-viewer', 'content.faq.q5') !!}</h3>
                    <p class="text-gray-700">
                        {!! __tool('html-viewer', 'content.faq.a5') !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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
                        text.textContent = "{!! __tool('html-viewer', 'editor.btn_exit_fullscreen') !!}";
                    }).catch(err => {
                        console.error('Error attempting to enable fullscreen:', err);
                    });
                } else {
                    document.exitFullscreen().then(() => {
                        // Change icon back to fullscreen
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>';
                        text.textContent = "{!! __tool('html-viewer', 'editor.btn_fullscreen') !!}";
                    });
                }
            }

            // Listen for fullscreen changes (e.g., ESC key)
            document.addEventListener('fullscreenchange', () => {
                const icon = document.getElementById('fullscreenIcon');
                const text = document.getElementById('fullscreenText');

                if (!document.fullscreenElement) {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>';
                    text.textContent = "{!! __tool('html-viewer', 'editor.btn_fullscreen') !!}";
                }
            });
        </script>
    @endpush
@endsection