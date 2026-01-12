@extends('layouts.app')

@section('title', __tool('markdown-to-html', 'meta.h1'))
@section('meta_description', __tool('markdown-to-html', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" />
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
            {{ __tool('markdown-to-html', 'meta.h1') }}
        </h1>
        <p class="text-base md:text-lg text-white/90 font-medium">
            {{ __tool('markdown-to-html', 'meta.subtitle') }}
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
                {{ __tool('markdown-to-html', 'editor.btn_convert') }}
            </button>
            <button onclick="copyHtml()"
                class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                {{ __tool('markdown-to-html', 'editor.btn_copy') }}
            </button>
            <button onclick="downloadHtml()"
                class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                {{ __tool('markdown-to-html', 'editor.btn_download') }}
            </button>
            <button onclick="clearAll()"
                class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                {{ __tool('markdown-to-html', 'editor.btn_clear') }}
            </button>
            <button onclick="loadExample()"
                class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition-all">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                {{ __tool('markdown-to-html', 'editor.btn_example') }}
            </button>
        </div>

        <!-- Split View -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Markdown Input -->
            <div>
                <label
                    class="block text-sm font-bold text-gray-700 mb-2">{{ __tool('markdown-to-html', 'editor.label_input') }}</label>
                <textarea id="markdownInput"
                    class="w-full h-96 p-4 border-2 border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all font-mono text-sm"
                    placeholder="{{ __tool('markdown-to-html', 'editor.ph_input') }}"></textarea>
            </div>

            <!-- HTML Output -->
            <div>
                <label
                    class="block text-sm font-bold text-gray-700 mb-2">{{ __tool('markdown-to-html', 'editor.label_output') }}</label>
                <div class="relative">
                    <textarea id="htmlOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-300 rounded-lg bg-gray-50 font-mono text-sm"
                        placeholder="{{ __tool('markdown-to-html', 'editor.ph_output') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- Live Preview -->
        <div class="mt-6">
            <label
                class="block text-sm font-bold text-gray-700 mb-2">{{ __tool('markdown-to-html', 'editor.label_preview') }}</label>
            <div id="livePreview"
                class="w-full min-h-48 p-6 border-2 border-gray-300 rounded-lg bg-white prose prose-indigo max-w-none">
                <p class="text-gray-400">{{ __tool('markdown-to-html', 'editor.ph_preview') }}</p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6">
            <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
                {{ __tool('markdown-to-html', 'content.features.instant.title') }}
            </h3>
            <p class="text-gray-600">{{ __tool('markdown-to-html', 'content.features.instant.desc') }}</p>
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
            <h3 class="text-lg font-bold text-gray-900 mb-2">
                {{ __tool('markdown-to-html', 'content.features.preview.title') }}
            </h3>
            <p class="text-gray-600">{{ __tool('markdown-to-html', 'content.features.preview.desc') }}</p>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6">
            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
                {{ __tool('markdown-to-html', 'content.features.export.title') }}
            </h3>
            <p class="text-gray-600">{{ __tool('markdown-to-html', 'content.features.export.desc') }}</p>
        </div>
    </div>

    <!-- SEO Content - Redesigned -->
    <div
        class="bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-blue-100 shadow-2xl">
        <div class="text-center mb-8">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                {{ __tool('markdown-to-html', 'content.hero_title') }}
            </h2>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                {{ __tool('markdown-to-html', 'content.hero_subtitle') }}
            </p>
        </div>

        <div class="prose prose-lg max-w-none">
            <div class="bg-white rounded-2xl p-8 mb-8 shadow-lg">
                <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('markdown-to-html', 'content.what_title') }}
                </h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    {{ __tool('markdown-to-html', 'content.p1') }}
                </p>
                <p class="text-gray-700 leading-relaxed">
                    {{ __tool('markdown-to-html', 'content.what_desc') }}
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('markdown-to-html', 'content.features_title') }}
            </h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                    <div class="text-4xl mb-3">⚡</div>
                    <h4 class="font-bold text-xl mb-3">{{ __tool('markdown-to-html', 'content.features.instant.title') }}
                    </h4>
                    <p class="text-white/90">{{ __tool('markdown-to-html', 'content.features.instant.desc') }}
                    </p>
                </div>
                <div
                    class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                    <div class="text-4xl mb-3">👁️</div>
                    <h4 class="font-bold text-xl mb-3">{{ __tool('markdown-to-html', 'content.features.preview.title') }}
                    </h4>
                    <p class="text-white/90">{{ __tool('markdown-to-html', 'content.features.preview.desc') }}</p>
                </div>
                <div
                    class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                    <div class="text-4xl mb-3">📋</div>
                    <h4 class="font-bold text-xl mb-3">{{ __tool('markdown-to-html', 'content.features.export.title') }}
                    </h4>
                    <p class="text-white/90">{{ __tool('markdown-to-html', 'content.features.export.desc') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-blue-200 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-4xl mb-3">🎯</div>
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.features.free.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.features.free.desc') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-purple-200 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-4xl mb-3">🔒</div>
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.features.privacy.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.features.privacy.desc') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-cyan-200 shadow-lg hover:shadow-xl transition-all">
                    <div class="text-4xl mb-3">📱</div>
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.features.mobile.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.features.mobile.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('markdown-to-html', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-6 border-2 border-blue-200">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.uses.docs.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.uses.docs.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.uses.blog.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.uses.blog.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border-2 border-green-200">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.uses.github.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.uses.github.desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                    <h4 class="font-bold text-xl text-gray-900 mb-3">
                        {{ __tool('markdown-to-html', 'content.uses.email.title') }}
                    </h4>
                    <p class="text-gray-700">{{ __tool('markdown-to-html', 'content.uses.email.desc') }}</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('markdown-to-html', 'content.pro_tip.title') }}
                </h4>
                <p class="text-blue-800 leading-relaxed">
                    {{ __tool('markdown-to-html', 'content.pro_tip.desc') }}
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('markdown-to-html', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('markdown-to-html', 'content.faq.q1') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('markdown-to-html', 'content.faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('markdown-to-html', 'content.faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('markdown-to-html', 'content.faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('markdown-to-html', 'content.faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('markdown-to-html', 'content.faq.a3') }}</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script>
            let debounceTimer;

            function convertMarkdown() {
                const markdown = document.getElementById('markdownInput').value;

                if (!markdown.trim()) {
                    showError("{{ __tool('markdown-to-html', 'js.error_empty') }}");
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
                        showError("{{ __tool('markdown-to-html', 'js.error_general') }}");
                    });
            }

            function copyHtml() {
                const html = document.getElementById('htmlOutput').value;
                if (!html) {
                    showError("{{ __tool('markdown-to-html', 'js.error_no_copy') }}");
                    return;
                }

                navigator.clipboard.writeText(html).then(() => {
                    showSuccess("{{ __tool('markdown-to-html', 'js.success_copy') }}");
                }).catch(err => {
                    console.error('Failed to copy:', err);
                });
            }

            function downloadHtml() {
                const html = document.getElementById('htmlOutput').value;
                if (!html) {
                    showError("{{ __tool('markdown-to-html', 'js.error_no_download') }}");
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
                document.getElementById('livePreview').innerHTML = '<p class="text-gray-400">{{ __tool("markdown-to-html", "editor.ph_preview") }}</p>';
            }

            function loadExample() {
                const example = {!! json_encode(__tool('markdown-to-html', 'js.example')) !!};

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

            // Helper functions for consistent UI feedback if not defined globally
            function showError(message) {
                // Assuming a toast or alert. If not present in layout, fallback
                if (typeof window.showToast === 'function') {
                    window.showToast(message, 'error');
                } else {
                    alert(message);
                }
            }
            function showSuccess(message) {
                if (typeof window.showToast === 'function') {
                    window.showToast(message, 'success');
                } else {
                    alert(message);
                }
            }
        </script>
    @endpush
@endsection