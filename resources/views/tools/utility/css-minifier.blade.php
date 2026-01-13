@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="css-minifier" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="mb-6">
                <label for="cssInput" class="form-label text-base">{!! __tool('css-minifier', 'editor.label_input') !!}</label>
                <textarea id="cssInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="{!! __tool('css-minifier', 'editor.ph_input') !!}"></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processCSS('minify')" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span>{!! __tool('css-minifier', 'editor.btn_minify') !!}</span>
                </button>
                <button onclick="processCSS('beautify')" class="btn-secondary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                    <span>{!! __tool('css-minifier', 'editor.btn_beautify') !!}</span>
                </button>
                <button onclick="clearCSS()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{!! __tool('css-minifier', 'editor.btn_clear') !!}</span>
                </button>
                <button onclick="copyCSS()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('css-minifier', 'editor.btn_copy') !!}</span>
                </button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <div class="mb-6">
                <label for="cssOutput" class="form-label text-base">{!! __tool('css-minifier', 'editor.label_output') !!}</label>
                <textarea id="cssOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="{!! __tool('css-minifier', 'editor.ph_output') !!}"></textarea>
            </div>

            <div id="stats" class="hidden grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                    <div class="text-sm text-gray-600 mb-1">{!! __tool('css-minifier', 'editor.stats.original') !!}</div>
                    <div class="text-2xl font-black text-blue-600" id="originalSize">0</div>
                </div>
                <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-xl p-4 border-2 border-cyan-200">
                    <div class="text-sm text-gray-600 mb-1">{!! __tool('css-minifier', 'editor.stats.minified') !!}</div>
                    <div class="text-2xl font-black text-cyan-600" id="minifiedSize">0</div>
                </div>
                <div class="bg-gradient-to-br from-teal-50 to-green-50 rounded-xl p-4 border-2 border-teal-200">
                    <div class="text-sm text-gray-600 mb-1">{!! __tool('css-minifier', 'editor.stats.saved') !!}</div>
                    <div class="text-2xl font-black text-teal-600" id="savedSize">0</div>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border-2 border-green-200">
                    <div class="text-sm text-gray-600 mb-1">{!! __tool('css-minifier', 'editor.stats.compression') !!}</div>
                    <div class="text-2xl font-black text-green-600" id="compressionRate">0%</div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('css-minifier', 'content.hero_title') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('css-minifier', 'content.hero_subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('css-minifier', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('css-minifier', 'content.what_title') !!}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {!! __tool('css-minifier', 'content.what_desc') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('css-minifier', 'content.features_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📦</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('css-minifier', 'content.features.minify.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('css-minifier', 'content.features.minify.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('css-minifier', 'content.features.beautify.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('css-minifier', 'content.features.beautify.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('css-minifier', 'content.features.stats.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('css-minifier', 'content.features.stats.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('css-minifier', 'content.features.instant.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('css-minifier', 'content.features.instant.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('css-minifier', 'content.features.privacy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('css-minifier', 'content.features.privacy.desc') !!}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('css-minifier', 'content.features.copy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('css-minifier', 'content.features.copy.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('css-minifier', 'content.benefits_title') !!}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('css-minifier', 'content.benefits.speed.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.benefits.speed.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('css-minifier', 'content.benefits.bandwidth.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.benefits.bandwidth.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('css-minifier', 'content.benefits.seo.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.benefits.seo.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('css-minifier', 'content.benefits.performance.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.benefits.performance.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('css-minifier', 'content.benefits.mobile.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.benefits.mobile.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('css-minifier', 'content.benefits.production.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.benefits.production.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('css-minifier', 'content.how_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span>{!! __tool('css-minifier', 'content.how_steps.1') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span>{!! __tool('css-minifier', 'content.how_steps.2') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span>{!! __tool('css-minifier', 'content.how_steps.3') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span>{!! __tool('css-minifier', 'content.how_steps.4') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span>{!! __tool('css-minifier', 'content.how_steps.5') !!}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('css-minifier', 'content.best_practices_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span>{!! __tool('css-minifier', 'content.best_practices_list.1') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span>{!! __tool('css-minifier', 'content.best_practices_list.2') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span>{!! __tool('css-minifier', 'content.best_practices_list.3') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span>{!! __tool('css-minifier', 'content.best_practices_list.4') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span>{!! __tool('css-minifier', 'content.best_practices_list.5') !!}</span>
                    </li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('css-minifier', 'content.faq_title') !!}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('css-minifier', 'content.faq.q1') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.faq.a1') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('css-minifier', 'content.faq.q2') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.faq.a2') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('css-minifier', 'content.faq.q3') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.faq.a3') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('css-minifier', 'content.faq.q4') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.faq.a4') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('css-minifier', 'content.faq.q5') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('css-minifier', 'content.faq.a5') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function processCSS(action) {
            const input = document.getElementById('cssInput').value.trim();
            const output = document.getElementById('cssOutput');
            const statusMessage = document.getElementById('statusMessage');
            const stats = document.getElementById('stats');

            if (!input) {
                showStatus("{!! __tool('css-minifier', 'js.error_empty') !!}", 'error');
                return;
            }

            try {
                let processed;
                if (action === 'minify') {
                    processed = minifyCSS(input);
                    showStats(input, processed);
                    showStatus("{!! __tool('css-minifier', 'js.success_minify') !!}", 'success');
                } else {
                    processed = beautifyCSS(input);
                    stats.classList.add('hidden');
                    showStatus("{!! __tool('css-minifier', 'js.success_beautify') !!}", 'success');
                }
                output.value = processed;
            } catch (error) {
                showStatus("{!! __tool('css-minifier', 'js.error_process') !!}" + error.message, 'error');
            }
        }

        function minifyCSS(css) {
            return css
                .replace(/\/\*[\s\S]*?\*\//g, '') // Remove comments
                .replace(/\s+/g, ' ') // Replace multiple spaces with single space
                .replace(/\s*{\s*/g, '{') // Remove spaces around {
                .replace(/\s*}\s*/g, '}') // Remove spaces around }
                .replace(/\s*:\s*/g, ':') // Remove spaces around :
                .replace(/\s*;\s*/g, ';') // Remove spaces around ;
                .replace(/;\s*}/g, '}') // Remove last semicolon
                .replace(/,\s*/g, ',') // Remove spaces after commas
                .trim();
        }

        function beautifyCSS(css) {
            let formatted = css
                .replace(/\s+/g, ' ')
                .replace(/{\s*/g, ' {\n  ')
                .replace(/;\s*/g, ';\n  ')
                .replace(/}\s*/g, '\n}\n\n')
                .replace(/,\s*/g, ',\n  ')
                .trim();

            // Fix indentation
            let lines = formatted.split('\n');
            let indentLevel = 0;
            let result = [];

            lines.forEach(line => {
                line = line.trim();
                if (line.includes('}')) indentLevel--;
                result.push('  '.repeat(Math.max(0, indentLevel)) + line);
                if (line.includes('{')) indentLevel++;
            });

            return result.join('\n');
        }

        function showStats(original, minified) {
            const originalSize = new Blob([original]).size;
            const minifiedSize = new Blob([minified]).size;
            const saved = originalSize - minifiedSize;
            const compression = ((saved / originalSize) * 100).toFixed(1);

            document.getElementById('originalSize').textContent = formatBytes(originalSize);
            document.getElementById('minifiedSize').textContent = formatBytes(minifiedSize);
            document.getElementById('savedSize').textContent = formatBytes(saved);
            document.getElementById('compressionRate').textContent = compression + '%';
            document.getElementById('stats').classList.remove('hidden');
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }

        function clearCSS() {
            document.getElementById('cssInput').value = '';
            document.getElementById('cssOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
            document.getElementById('stats').classList.add('hidden');
        }

        function copyCSS() {
            const output = document.getElementById('cssOutput');
            if (!output.value) {
                showStatus("{!! __tool('css-minifier', 'js.no_copy') !!}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{!! __tool('css-minifier', 'js.success_copy') !!}", 'success');
        }

        function showStatus(message, type) {
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300');

            if (type === 'success') {
                statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300');
            } else {
                statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300');
            }
        }
    </script>
    @endpush
@endsection