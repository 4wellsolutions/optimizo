@extends('layouts.app')

@section('title', __tool('html-minifier', 'meta.h1'))
@section('meta_description', __tool('html-minifier', 'meta.subtitle'))
@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <x-tool-hero :tool="$tool" icon="html-minifier" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="mb-6">
                <label for="htmlInput"
                    class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('html-minifier', 'editor.label_input') !!}</label>
                <textarea id="htmlInput"
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 font-mono text-sm"
                    placeholder="{!! __tool('html-minifier', 'editor.ph_input') !!}"></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processHTML('minify')"
                    class="px-6 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-semibold">{!! __tool('html-minifier', 'editor.btn_minify') !!}</button>
                <button onclick="processHTML('beautify')"
                    class="px-6 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700">{!! __tool('html-minifier', 'editor.btn_beautify') !!}</button>
                <button onclick="clearHTML()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">{!! __tool('html-minifier', 'editor.btn_clear') !!}</button>
                <button onclick="copyHTML()"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">{!! __tool('html-minifier', 'editor.btn_copy') !!}</button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl"></div>

            <div id="outputSection" class="hidden">
                <label for="htmlOutput"
                    class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('html-minifier', 'editor.label_output') !!}</label>
                <textarea id="htmlOutput" readonly
                    class="w-full h-64 p-4 border-2 border-gray-300 rounded-xl bg-gray-50 font-mono text-sm"></textarea>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{!! __tool('html-minifier', 'content.about_title') !!}</h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-minifier', 'content.about_desc') !!}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-minifier', 'content.why_title') !!}</h2>
            <p class="text-gray-700 mb-4">
                {!! __tool('html-minifier', 'content.why_desc') !!}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-minifier', 'content.features_title') !!}
            </h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('html-minifier', 'content.features_list.minify') !!}</li>
                <li>{!! __tool('html-minifier', 'content.features_list.beautify') !!}</li>
                <li>{!! __tool('html-minifier', 'content.features_list.instant') !!}</li>
                <li>{!! __tool('html-minifier', 'content.features_list.copy') !!}</li>
                <li>{!! __tool('html-minifier', 'content.features_list.secure') !!}</li>
                <li>{!! __tool('html-minifier', 'content.features_list.free') !!}</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{!! __tool('html-minifier', 'content.how_title') !!}</h2>
            <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('html-minifier', 'content.how_steps.1') !!}</li>
                <li>{!! __tool('html-minifier', 'content.how_steps.2') !!}</li>
                <li>{!! __tool('html-minifier', 'content.how_steps.3') !!}</li>
                <li>{!! __tool('html-minifier', 'content.how_steps.4') !!}</li>
            </ol>
        </div>

        <!-- FAQ -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{!! __tool('html-minifier', 'content.faq_title') !!}</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-minifier', 'content.faq.q1') !!}</h3>
                    <p class="text-gray-700">{!! __tool('html-minifier', 'content.faq.a1') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-minifier', 'content.faq.q2') !!}</h3>
                    <p class="text-gray-700">{!! __tool('html-minifier', 'content.faq.a2') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-minifier', 'content.faq.q3') !!}</h3>
                    <p class="text-gray-700">{!! __tool('html-minifier', 'content.faq.a3') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-minifier', 'content.faq.q4') !!}</h3>
                    <p class="text-gray-700">{!! __tool('html-minifier', 'content.faq.a4') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{!! __tool('html-minifier', 'content.faq.q5') !!}</h3>
                    <p class="text-gray-700">{!! __tool('html-minifier', 'content.faq.a5') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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
                    showMessage("{!! __tool('html-minifier', 'js.error_empty') !!}", 'error');
                    return;
                }

                if (action === 'minify') {
                    const minified = html.replace(/<!--(.|\s)*?-->/g, '')
                                                .replace(/>\s+</g, '><')
                        .replace(/\s+/g, ' ')
                        .trim();
                    htmlOutput.value = minified;
                    showMessage("{!! __tool('html-minifier', 'js.success_minify') !!}", 'success');
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
                    showMessage("{!! __tool('html-minifier', 'js.success_beautify') !!}", 'success');
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
                    showMessage("{!! __tool('html-minifier', 'js.error_no_copy') !!}", 'error');
                    return;
                }
                htmlOutput.select();
                document.execCommand('copy');
                showMessage("{!! __tool('html-minifier', 'js.success_copy') !!}", 'success');
            }
        </script>
    @endpush
@endsection