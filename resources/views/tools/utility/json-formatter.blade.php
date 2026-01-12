@extends('layouts.app')

@section('title', __tool('json-formatter', 'meta.h1'))
@section('meta_description', __tool('json-formatter', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- SEO-Optimized Header with Gradient Background -->
        <x-tool-hero :tool="$tool" icon="json-formatter" :title="__tool('json-formatter', 'meta.h1')"
            :subtitle="__tool('json-formatter', 'meta.subtitle')" />

        <!-- JSON Formatter Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('json-formatter', 'editor.title') }}
            </h2>
            <form id="jsonForm">
                @csrf
                <div class="mb-6">
                    <label for="json"
                        class="form-label text-base">{{ __tool('json-formatter', 'editor.label_input') }}</label>
                    <textarea id="json" name="json" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{{ __tool('json-formatter', 'editor.ph_input') }}'></textarea>
                    <p class="text-sm text-gray-500 mt-2">{{ __tool('json-formatter', 'editor.help_text') }}</p>
                </div>

                <div class="flex flex-col md:flex-row gap-3">
                    <button type="button" onclick="formatJSON()" class="btn-primary flex-1 justify-center text-lg py-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                        <span id="formatBtnText">{{ __tool('json-formatter', 'editor.btn_format') }}</span>
                    </button>
                    <button type="button" onclick="minifyJSON()" class="btn-secondary flex-1 justify-center text-lg py-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <span id="minifyBtnText">{{ __tool('json-formatter', 'editor.btn_minify') }}</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Error Message -->
        <div id="errorMessage" class="hidden bg-red-50 border-2 border-red-200 rounded-2xl p-6 mb-8">
            <p class="text-red-800 font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <span id="errorText"></span>
            </p>
        </div>

        <!-- Results Section -->
        <div id="resultsSection" class="hidden">
            <div class="result-card">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">{{ __tool('json-formatter', 'editor.label_results') }}</h2>
                    <button onclick="copyJSON()" class="btn-secondary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        {{ __tool('json-formatter', 'editor.btn_copy') }}
                    </button>
                </div>
                <div class="bg-gray-900 rounded-xl p-6 overflow-x-auto">
                    <pre id="formattedJSON" class="text-sm text-green-400 font-mono"></pre>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content Section -->
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-indigo-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('json-formatter', 'content.why_title') }}</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                {{ __tool('json-formatter', 'content.why_desc') }}
            </p>
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <!-- Instant Formatting -->
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-indigo-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-indigo-600 mb-2 text-lg">
                        {{ __tool('json-formatter', 'content.features.instant.title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __tool('json-formatter', 'content.features.instant.desc') }}</p>
                </div>
                <!-- Error Detection -->
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-purple-200">
                    <div class="text-4xl mb-3">✅</div>
                    <h3 class="font-bold text-purple-600 mb-2 text-lg">
                        {{ __tool('json-formatter', 'content.features.error.title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __tool('json-formatter', 'content.features.error.desc') }}</p>
                </div>
                <!-- Privacy -->
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-pink-200">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-pink-600 mb-2 text-lg">
                        {{ __tool('json-formatter', 'content.features.privacy.title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __tool('json-formatter', 'content.features.privacy.desc') }}</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- How to Use Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('json-formatter', 'content.how_title') }}</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center p-4 rounded-xl bg-indigo-50 border-2 border-indigo-200">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg mb-4">
                        1</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.how_steps.1.title') }}</h3>
                    <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.how_steps.1.desc') }}</p>
                </div>
                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg mb-4">
                        2</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.how_steps.2.title') }}</h3>
                    <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.how_steps.2.desc') }}</p>
                </div>
                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center p-4 rounded-xl bg-pink-50 border-2 border-pink-200">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-pink-600 to-red-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg mb-4">
                        3</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.how_steps.3.title') }}</h3>
                    <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.how_steps.3.desc') }}</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Use Cases Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-formatter', 'content.uses_title') }}</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- API -->
                <div class="flex items-start gap-4 p-4 rounded-xl bg-blue-50 border-2 border-blue-200">
                    <div class="flex-shrink-0 text-3xl">🔌</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-formatter', 'content.uses.api.title') }}</h3>
                        <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.uses.api.desc') }}</p>
                    </div>
                </div>
                <!-- Config -->
                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border-2 border-green-200">
                    <div class="flex-shrink-0 text-3xl">⚙️</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-formatter', 'content.uses.config.title') }}</h3>
                        <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.uses.config.desc') }}</p>
                    </div>
                </div>
                <!-- Database -->
                <div class="flex items-start gap-4 p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div class="flex-shrink-0 text-3xl">💾</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-formatter', 'content.uses.db.title') }}</h3>
                        <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.uses.db.desc') }}</p>
                    </div>
                </div>
                <!-- Export -->
                <div class="flex items-start gap-4 p-4 rounded-xl bg-orange-50 border-2 border-orange-200">
                    <div class="flex-shrink-0 text-3xl">📦</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {{ __tool('json-formatter', 'content.uses.export.title') }}</h3>
                        <p class="text-gray-700 text-sm">{{ __tool('json-formatter', 'content.uses.export.desc') }}</p>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Best Practices Section -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 md:p-8 mt-8 border-2 border-blue-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-formatter', 'content.tips_title') }}</h2>
            <div class="space-y-4">
                <!-- Validate -->
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-green-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.tips.validate.title') }}</h3>
                    <p class="text-gray-700">{{ __tool('json-formatter', 'content.tips.validate.desc') }}</p>
                </div>
                <!-- Indent -->
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-blue-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.tips.indent.title') }}</h3>
                    <p class="text-gray-700">{{ __tool('json-formatter', 'content.tips.indent.desc') }}</p>
                </div>
                <!-- Minify -->
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-purple-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.tips.minify.title') }}</h3>
                    <p class="text-gray-700">{{ __tool('json-formatter', 'content.tips.minify.desc') }}</p>
                </div>
                <!-- Naming -->
                <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-orange-500">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                        {{ __tool('json-formatter', 'content.tips.naming.title') }}</h3>
                    <p class="text-gray-700">{{ __tool('json-formatter', 'content.tips.naming.desc') }}</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">
                {{ __tool('json-formatter', 'content.faq_title') }}</h2>
            <div class="space-y-4">
                @foreach(__('tools.utilities.json-formatter.content.faq') as $key => $value)
                    @if(str_starts_with($key, 'q'))
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $value }}</h3>
                            <p class="text-gray-700">{{ __('tools.utilities.json-formatter.content.faq.a' . substr($key, 1)) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function formatJSON() {
                const jsonInput = $('#json').val().trim();

                if (!jsonInput) {
                    showError("{{ __tool('json-formatter', 'js.error_empty_format') }}");
                    return;
                }

                try {
                    // Parse and format JSON
                    const parsed = JSON.parse(jsonInput);
                    const formatted = JSON.stringify(parsed, null, 2);

                    // Display result
                    $('#formattedJSON').text(formatted);
                    $('#resultsSection').removeClass('hidden');
                    $('#errorMessage').addClass('hidden');

                    // Scroll to results
                    setTimeout(() => {
                        $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                } catch (error) {
                    showError("{{ __tool('json-formatter', 'js.error_invalid') }}" + error.message);
                }
            }

            function minifyJSON() {
                const jsonInput = $('#json').val().trim();

                if (!jsonInput) {
                    showError("{{ __tool('json-formatter', 'js.error_empty_minify') }}");
                    return;
                }

                try {
                    // Parse and minify JSON
                    const parsed = JSON.parse(jsonInput);
                    const minified = JSON.stringify(parsed);

                    // Display result
                    $('#formattedJSON').text(minified);
                    $('#resultsSection').removeClass('hidden');
                    $('#errorMessage').addClass('hidden');

                    // Scroll to results
                    setTimeout(() => {
                        $('#resultsSection')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                } catch (error) {
                    showError("{{ __tool('json-formatter', 'js.error_invalid') }}" + error.message);
                }
            }

            function copyJSON() {
                const json = $('#formattedJSON').text();
                navigator.clipboard.writeText(json).then(() => {
                    const btn = event.target.closest('button');
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __tool('json-formatter', 'js.success_copy') }}';
                    btn.classList.add('bg-green-600', 'text-white', 'border-green-600');

                    setTimeout(() => {
                        btn.innerHTML = originalHTML;
                        btn.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                    }, 2000);
                }).catch(err => {
                    showError("{{ __tool('json-formatter', 'js.error_copy') }}");
                });
            }

            function showError(message) {
                $('#errorText').text(message);
                $('#errorMessage').removeClass('hidden');
                $('#resultsSection').addClass('hidden');
                setTimeout(() => {
                    $('#errorMessage')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            }
        </script>
    @endpush
@endsection