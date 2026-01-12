@extends('layouts.app')

@section('title', __tool('json-parser', 'meta.h1'))
@section('meta_description', __tool('json-parser', 'meta.subtitle'))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="json-parser" :title="__tool('json-parser', 'meta.h1')"
            :subtitle="__tool('json-parser', 'meta.subtitle')" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-purple-200 mb-8">
            <!-- JSON Input -->
            <div class="mb-6">
                <label for="jsonInput"
                    class="form-label text-base">{{ __tool('json-parser', 'editor.label_input') }}</label>
                <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder='{{ __tool('json-parser', 'editor.ph_input') }}'></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="parseJSON()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __tool('json-parser', 'editor.btn_parse') }}</span>
                </button>
                <button onclick="beautifyJSON()" class="btn-secondary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                    <span>{{ __tool('json-parser', 'editor.btn_beautify') }}</span>
                </button>
                <button onclick="minifyJSON()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span>{{ __tool('json-parser', 'editor.btn_minify') }}</span>
                </button>
                <button onclick="clearJSON()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('json-parser', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="loadSample()"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span>{{ __tool('json-parser', 'editor.btn_load') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Tree View -->
            <div id="treeView" class="hidden">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('json-parser', 'editor.title_tree') }}</h3>
                <div id="treeContent"
                    class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200 font-mono text-sm overflow-auto max-h-96">
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 md:p-12 border-2 border-purple-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('json-parser', 'content.hero_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('json-parser', 'content.hero_subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('json-parser', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-parser', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('json-parser', 'content.what_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-parser', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <!-- Validate -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✅</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-parser', 'content.features.validate.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-parser', 'content.features.validate.desc') }}</p>
                </div>
                <!-- Beautify -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-parser', 'content.features.beautify.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-parser', 'content.features.beautify.desc') }}</p>
                </div>
                <!-- Minify -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📦</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-parser', 'content.features.minify.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-parser', 'content.features.minify.desc') }}</p>
                </div>
                <!-- Tree -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌳</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-parser', 'content.features.tree.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-parser', 'content.features.tree.desc') }}</p>
                </div>
                <!-- Privacy -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-parser', 'content.features.privacy.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-parser', 'content.features.privacy.desc') }}</p>
                </div>
                <!-- Instant -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-parser', 'content.features.instant.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-parser', 'content.features.instant.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-parser', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <!-- API -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-parser', 'content.uses.api.title') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-parser', 'content.uses.api.desc') }}</p>
                </div>
                <!-- Config -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('json-parser', 'content.uses.config.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-parser', 'content.uses.config.desc') }}</p>
                </div>
                <!-- Analysis -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('json-parser', 'content.uses.analysis.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-parser', 'content.uses.analysis.desc') }}</p>
                </div>
                <!-- Debug -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-parser', 'content.uses.debug.title') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-parser', 'content.uses.debug.desc') }}</p>
                </div>
                <!-- Docs -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-parser', 'content.uses.docs.title') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-parser', 'content.uses.docs.desc') }}</p>
                </div>
                <!-- Migration -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('json-parser', 'content.uses.migration.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-parser', 'content.uses.migration.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-parser', 'content.how_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    @foreach(__('tools.utilities.json-parser.content.how_steps') as $step)
                        <li class="flex items-start gap-3">
                            <span class="font-bold text-purple-600 text-lg">{{ $loop->iteration }}.</span>
                            <span>{!! $step !!}</span>
                        </li>
                    @endforeach
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-parser', 'content.tips_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    @foreach(__('tools.utilities.json-parser.content.tips_list') as $tip)
                        <li class="flex items-start gap-3">
                            <span class="text-green-600 font-bold text-xl">✓</span>
                            <span>{!! $tip !!}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-parser', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                @foreach(__('tools.utilities.json-parser.content.faq') as $key => $value)
                    @if(str_starts_with($key, 'q'))
                        <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                            <p class="text-gray-700 leading-relaxed">
                                {{ __('tools.utilities.json-parser.content.faq.a' . substr($key, 1)) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function parseJSON() {
                const input = document.getElementById('jsonInput').value.trim();
                const statusMessage = document.getElementById('statusMessage');
                const treeView = document.getElementById('treeView');
                const treeContent = document.getElementById('treeContent');

                if (!input) {
                    showStatus("{{ __tool('json-parser', 'js.error_empty_parse') }}", 'error');
                    return;
                }

                try {
                    const parsed = JSON.parse(input);
                    showStatus("{{ __tool('json-parser', 'js.success_valid') }}", 'success');
                    treeView.classList.remove('hidden');
                    treeContent.innerHTML = syntaxHighlight(JSON.stringify(parsed, null, 2));
                } catch (error) {
                    showStatus("{{ __tool('json-parser', 'js.error_invalid') }}" + error.message, 'error');
                    treeView.classList.add('hidden');
                }
            }

            function beautifyJSON() {
                const input = document.getElementById('jsonInput').value.trim();
                if (!input) {
                    showStatus("{{ __tool('json-parser', 'js.error_empty_beautify') }}", 'error');
                    return;
                }

                try {
                    const parsed = JSON.parse(input);
                    document.getElementById('jsonInput').value = JSON.stringify(parsed, null, 2);
                    showStatus("{{ __tool('json-parser', 'js.success_beautify') }}", 'success');
                } catch (error) {
                    showStatus("{{ __tool('json-parser', 'js.error_beautify') }}" + error.message, 'error');
                }
            }

            function minifyJSON() {
                const input = document.getElementById('jsonInput').value.trim();
                if (!input) {
                    showStatus("{{ __tool('json-parser', 'js.error_empty_minify') }}", 'error');
                    return;
                }

                try {
                    const parsed = JSON.parse(input);
                    document.getElementById('jsonInput').value = JSON.stringify(parsed);
                    showStatus("{{ __tool('json-parser', 'js.success_minify') }}", 'success');
                } catch (error) {
                    showStatus("{{ __tool('json-parser', 'js.error_minify') }}" + error.message, 'error');
                }
            }

            function clearJSON() {
                document.getElementById('jsonInput').value = '';
                document.getElementById('treeView').classList.add('hidden');
                document.getElementById('statusMessage').classList.add('hidden');
            }

            function loadSample() {
                const sample = {
                    "user": {
                        "id": 12345,
                        "name": "John Doe",
                        "email": "john.doe@example.com",
                        "isActive": true,
                        "roles": ["admin", "user"],
                        "profile": {
                            "age": 30,
                            "city": "New York",
                            "country": "USA"
                        }
                    }
                };
                document.getElementById('jsonInput').value = JSON.stringify(sample, null, 2);
                showStatus("{{ __tool('json-parser', 'js.success_load') }}", 'success');
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

            function syntaxHighlight(json) {
                json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                    let cls = 'text-orange-600';
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'text-blue-600 font-semibold';
                        } else {
                            cls = 'text-green-600';
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'text-purple-600 font-semibold';
                    } else if (/null/.test(match)) {
                        cls = 'text-gray-500 font-semibold';
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                });
            }
        </script>
    @endpush
@endsection