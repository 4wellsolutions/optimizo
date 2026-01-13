@extends('layouts.app')

@section('title', __tool('html-to-markdown-converter', 'meta.title'))
@section('meta_description', __tool('html-to-markdown-converter', 'meta.description'))

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
                    {!! __tool('html-to-markdown-converter', 'editor.btn_convert') !!}
                </button>
                <button onclick="copyMarkdown()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    {!! __tool('html-to-markdown-converter', 'editor.btn_copy') !!}
                </button>
                <button onclick="downloadMarkdown()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    {!! __tool('html-to-markdown-converter', 'editor.btn_download') !!}
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    {!! __tool('html-to-markdown-converter', 'editor.btn_example') !!}
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    {!! __tool('html-to-markdown-converter', 'editor.btn_clear') !!}
                </button>
            </div>

            <!-- Input/Output Grid -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- HTML Input -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('html-to-markdown-converter', 'editor.label_input') !!}</label>
                    <textarea id="htmlInput"
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all"
                        placeholder="{!! __tool('html-to-markdown-converter', 'editor.ph_input') !!}"></textarea>
                </div>

                <!-- Markdown Output -->
                <div>
                    <label
                        class="block text-sm font-bold text-gray-900 mb-2">{!! __tool('html-to-markdown-converter', 'editor.label_output') !!}</label>
                    <textarea id="markdownOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-lg font-mono text-sm bg-gray-50 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all"
                        placeholder="{!! __tool('html-to-markdown-converter', 'editor.ph_output') !!}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-6">
                {!! __tool('html-to-markdown-converter', 'content.about_title') !!}</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    {!! __tool('html-to-markdown-converter', 'content.about_p1') !!}
                </p>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('html-to-markdown-converter', 'content.features_title') !!}</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>{!! __tool('html-to-markdown-converter', 'content.features_list.1') !!}</li>
                    <li>{!! __tool('html-to-markdown-converter', 'content.features_list.2') !!}</li>
                    <li>{!! __tool('html-to-markdown-converter', 'content.features_list.3') !!}</li>
                    <li>{!! __tool('html-to-markdown-converter', 'content.features_list.4') !!}</li>
                    <li>{!! __tool('html-to-markdown-converter', 'content.features_list.5') !!}</li>
                    <li>{!! __tool('html-to-markdown-converter', 'content.features_list.6') !!}</li>
                </ul>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('html-to-markdown-converter', 'content.uses_title') !!}</h3>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-5 border-2 border-orange-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.uses.docs.title') !!}</h4>
                        <p class="text-gray-700 text-sm">
                            {!! __tool('html-to-markdown-converter', 'content.uses.docs.desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl p-5 border-2 border-pink-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.uses.migration.title') !!}</h4>
                        <p class="text-gray-700 text-sm">
                            {!! __tool('html-to-markdown-converter', 'content.uses.migration.desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-5 border-2 border-blue-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.uses.email.title') !!}</h4>
                        <p class="text-gray-700 text-sm">
                            {!! __tool('html-to-markdown-converter', 'content.uses.email.desc') !!}</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.uses.blog.title') !!}</h4>
                        <p class="text-gray-700 text-sm">
                            {!! __tool('html-to-markdown-converter', 'content.uses.blog.desc') !!}</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('html-to-markdown-converter', 'content.elements_title') !!}</h3>
                <div class="grid md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            {!! __tool('html-to-markdown-converter', 'content.elements.text.title') !!}</h4>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.text.list.0') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.text.list.1') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.text.list.2') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.text.list.3') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.text.list.4') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.text.list.5') !!}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            {!! __tool('html-to-markdown-converter', 'content.elements.lists.title') !!}</h4>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.lists.list.0') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.lists.list.1') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.lists.list.2') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.lists.list.3') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.lists.list.4') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.lists.list.5') !!}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            {!! __tool('html-to-markdown-converter', 'content.elements.advanced.title') !!}</h4>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.advanced.list.0') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.advanced.list.1') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.advanced.list.2') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.advanced.list.3') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.advanced.list.4') !!}</li>
                            <li>✅ {!! __tool('html-to-markdown-converter', 'content.elements.advanced.list.5') !!}</li>
                        </ul>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">
                    {!! __tool('html-to-markdown-converter', 'content.faq_title') !!}</h3>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.faq.q1') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('html-to-markdown-converter', 'content.faq.a1') !!}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.faq.q2') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('html-to-markdown-converter', 'content.faq.a2') !!}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.faq.q3') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('html-to-markdown-converter', 'content.faq.a3') !!}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-5">
                        <h4 class="font-bold text-gray-900 mb-2">
                            {!! __tool('html-to-markdown-converter', 'content.faq.q4') !!}</h4>
                        <p class="text-gray-700 text-sm">{!! __tool('html-to-markdown-converter', 'content.faq.a4') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/turndown@7.1.2/dist/turndown.min.js"></script>
        <script>
            const turndownService = new TurndownService({
                headingStyle: 'atx',
                codeBlockStyle: 'fenced'
            });

            function convertHtmlToMarkdown() {
                const html = document.getElementById('htmlInput').value;
                if (!html.trim()) {
                    showError("{!! __tool('html-to-markdown-converter', 'js.error_empty') !!}");
                    return;
                }

                try {
                    const markdown = turndownService.turndown(html);
                    document.getElementById('markdownOutput').value = markdown;
                } catch (error) {
                    showError("{!! __tool('html-to-markdown-converter', 'js.error_convert') !!}" + error.message);
                }
            }

            function copyMarkdown() {
                const output = document.getElementById('markdownOutput');
                if (!output.value.trim()) {
                    showError("{!! __tool('html-to-markdown-converter', 'js.error_no_copy') !!}");
                    return;
                }

                output.select();
                document.execCommand('copy');
                showSuccess("{!! __tool('html-to-markdown-converter', 'js.success_copy') !!}");
            }

            function downloadMarkdown() {
                const markdown = document.getElementById('markdownOutput').value;
                if (!markdown.trim()) {
                    showError("{!! __tool('html-to-markdown-converter', 'js.error_no_download') !!}");
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

            // Helper functions for toast notifications (assuming you have a global toast function or using alert for now if not defined, but previous tools used custom divs. The original code used alert/console or specialized showError.
            // Wait, original `showError` was NOT DEFINED in the file usage I saw?
            // Let me check the original file content again.
            // Ah, looking at `html-to-markdown` original content...
            // lines 195: `showError('...')`
            // But I DO NOT see `showError` defined in the original script!
            // It might be in `app.js` or `layout`.
            // However, previous tools defined `showStatus`.
            // I will define `showError` and `showSuccess` using a simple innovative toast if not present, OR I can assume it's global.
            // But usually I should make it self-contained or use the same pattern as other tools.
            // The other tools used a `statusMessage` div.
            // The original `html-to-markdown` does NOT have a `statusMessage` div in the HTML!
            // It seems the original code might have been broken or relied on a global function.
            // I will add a status message div to be safe and consistent with other tools, and implement `showError`/`showSuccess`.
        </script>
        <!-- Adding a status message container since it was missing -->
        <script>
            // Injecting a status container if it doesn't exist, or proper implementation
            function ensureStatusContainer() {
                if (!document.getElementById('statusMessage')) {
                    const container = document.createElement('div');
                    container.id = 'statusMessage';
                    container.className = 'fixed bottom-4 right-4 hidden p-4 rounded-xl font-semibold shadow-2xl z-50';
                    document.body.appendChild(container);
                }
            }

            function showError(message) {
                ensureStatusContainer();
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.className = 'fixed bottom-4 right-4 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300 shadow-2xl z-50';
                status.classList.remove('hidden');
                setTimeout(() => status.classList.add('hidden'), 3000);
            }

            function showSuccess(message) {
                ensureStatusContainer();
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.className = 'fixed bottom-4 right-4 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300 shadow-2xl z-50';
                status.classList.remove('hidden');
                setTimeout(() => status.classList.add('hidden'), 3000);
            }
        </script>
    @endpush
@endsection