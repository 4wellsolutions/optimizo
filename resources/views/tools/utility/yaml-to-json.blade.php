@extends('layouts.app')

@section('title', __tool('yaml-to-json', 'meta.h1'))
@section('meta_description', __tool('yaml-to-json', 'meta.subtitle'))

@section('content')
    <div class="max-w-7xl mx-auto">
        <x-tool-hero :tool="$tool" icon="yaml-to-json" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <!-- Convert Button -->
                <button onclick="convertYaml()"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span>{{ __tool('yaml-to-json', 'editor.btn_convert', 'Convert') }}</span>
                </button>

                <!-- Copy JSON -->
                <button onclick="copyJson()"
                    class="px-6 py-3 bg-gray-700 text-white rounded-xl hover:bg-gray-800 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('yaml-to-json', 'editor.btn_copy', 'Copy JSON') }}</span>
                </button>

                <!-- Download -->
                <button onclick="downloadJson()"
                    class="px-6 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>{{ __tool('yaml-to-json', 'editor.btn_download', 'Download') }}</span>
                </button>

                <!-- Example -->
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span>{{ __tool('yaml-to-json', 'editor.btn_example', 'Example') }}</span>
                </button>

                <!-- Clear -->
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('yaml-to-json', 'editor.btn_clear', 'Clear') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Input -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="yamlInput" class="form-label text-base mb-0">{{ __tool('yaml-to-json', 'editor.label_input', 'YAML Input') }}</label>
                    </div>
                    <textarea id="yamlInput" class="form-input font-mono text-sm min-h-[500px]"
                        placeholder="{{ __tool('yaml-to-json', 'editor.ph_input', 'Paste your YAML data here...') }}"></textarea>
                </div>

                <!-- Output -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="jsonOutput" class="form-label text-base mb-0">{{ __tool('yaml-to-json', 'editor.label_output', 'JSON Output') }}</label>
                    </div>
                    <textarea id="jsonOutput" class="form-input font-mono text-sm min-h-[500px] bg-gray-50" readonly
                        placeholder="{{ __tool('yaml-to-json', 'editor.ph_output', 'Converted JSON will appear here...') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('yaml-to-json', 'meta.h1', 'YAML to JSON Converter') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('yaml-to-json', 'meta.subtitle', 'Convert YAML configuration files to JSON format instantly') }}</p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">ℹ️ {{ __tool('yaml-to-json', 'content.h2', 'About YAML to JSON Converter') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8 text-lg">
                {{ __tool('yaml-to-json', 'content.p1', 'Convert YAML configuration files to JSON format instantly with our free online YAML to JSON converter. Perfect for developers working with configuration files, CI/CD pipelines, and data transformation.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('yaml-to-json', 'content.features_title', 'Key Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <!-- Syntax Validation -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">✅</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('yaml-to-json', 'content.features.syntax.title', 'Syntax Validation') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('yaml-to-json', 'content.features.syntax.desc', 'Detects YAML syntax errors') }}</p>
                </div>
                <!-- Nested Structure -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌳</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('yaml-to-json', 'content.features.nested.title', 'Nested Structure') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('yaml-to-json', 'content.features.nested.desc', 'Preserves complex hierarchies') }}</p>
                </div>
                <!-- Array Support -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📚</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('yaml-to-json', 'content.features.array.title', 'Array Support') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('yaml-to-json', 'content.features.array.desc', 'Handles YAML lists and sequences') }}</p>
                </div>
                <!-- Pretty Formatting -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('yaml-to-json', 'content.features.pretty.title', 'Pretty Formatting') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('yaml-to-json', 'content.features.pretty.desc', 'Clean, readable JSON output') }}</p>
                </div>
                <!-- Instant Conversion -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('yaml-to-json', 'content.features.instant.title', 'Instant Conversion') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('yaml-to-json', 'content.features.instant.desc', 'Real-time transformation') }}</p>
                </div>
                <!-- Privacy First -->
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('yaml-to-json', 'content.features.privacy.title', 'Privacy First') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('yaml-to-json', 'content.features.privacy.desc', 'All processing in browser') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('yaml-to-json', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚙️ {{ __tool('yaml-to-json', 'content.uses.config.title', 'Config Files') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('yaml-to-json', 'content.uses.config.desc', 'Convert YAML configuration files to JSON for applications.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🚀 {{ __tool('yaml-to-json', 'content.uses.pipeline.title', 'CI/CD Pipelines') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('yaml-to-json', 'content.uses.pipeline.desc', 'Transform YAML pipeline configs to JSON format.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">☸️ {{ __tool('yaml-to-json', 'content.uses.k8s.title', 'Kubernetes') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('yaml-to-json', 'content.uses.k8s.desc', 'Convert Kubernetes YAML manifests to JSON.') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🐳 {{ __tool('yaml-to-json', 'content.uses.docker.title', 'Docker Compose') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('yaml-to-json', 'content.uses.docker.desc', 'Transform Docker Compose YAML to JSON.') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 {{ __tool('yaml-to-json', 'content.how_to_title', 'How to Use YAML to JSON Converter') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    @foreach(__tool('yaml-to-json', 'content.how_to_steps') as $step)
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">{{ $loop->iteration }}</span>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">{{ $step['title'] }}</p>
                                <p class="text-gray-700">{{ $step['desc'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('yaml-to-json', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                @foreach(__tool('yaml-to-json', 'content.faq') as $key => $value)
                    @if(str_starts_with($key, 'q'))
                        <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                            <p class="text-gray-700 leading-relaxed">{{ __tool('yaml-to-json', 'content.faq.a' . substr($key, 1)) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/js-yaml@4.1.0/dist/js-yaml.min.js"></script>
    <script>
        const input = document.getElementById('yamlInput');
        const output = document.getElementById('jsonOutput');

        input.addEventListener('input', () => { convertYaml(); });

        function convertYaml() {
            const yaml = input.value;
            if (!yaml.trim()) {
                output.value = '';
                document.getElementById('statusMessage').classList.add('hidden');
                return;
            }

            try {
                const obj = jsyaml.load(yaml);
                output.value = JSON.stringify(obj, null, 2);
                document.getElementById('statusMessage').classList.add('hidden');
            } catch (e) {
                showStatus("{{ __tool('yaml-to-json', 'js.error_process', 'Error converting YAML: ') }}" + e.message, 'error');
            }
        }

        function copyJson() {
            if (!output.value) {
                showStatus("{{ __tool('yaml-to-json', 'js.error_no_copy', 'No JSON to copy. Please convert YAML first.') }}", 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus("{{ __tool('yaml-to-json', 'js.success_copy', 'JSON copied to clipboard!') }}", 'success');
        }

        function downloadJson() {
            if (!output.value) {
                showStatus("{{ __tool('yaml-to-json', 'js.error_no_download', 'No JSON to download. Please convert YAML first.') }}", 'error');
                return;
            }
            const blob = new Blob([output.value], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'data.json';
            a.click();
        }

        function clearAll() {
            input.value = '';
            output.value = '';
            document.getElementById('statusMessage').classList.add('hidden');
            input.focus();
        }

        function loadExample() {
            input.value = "name: John Doe\nage: 30\nskills:\n  - PHP\n  - Laravel\n  - JavaScript";
            convertYaml();
        }

        function showStatus(message, type) {
            const status = document.getElementById('statusMessage');
            status.textContent = message;
            status.className = type === 'success'
                ? 'mb-6 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300'
                : 'mb-6 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300';
            status.classList.remove('hidden');
        }
    </script>
    @endpush
@endsection