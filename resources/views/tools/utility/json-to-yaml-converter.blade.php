@extends('layouts.app')

@section('title', __tool('json-to-yaml-converter', 'meta.h1'))
@section('meta_description', __tool('json-to-yaml-converter', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-cyan-500 via-blue-500 to-indigo-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    {{ __tool('json-to-yaml-converter', 'content.hero_title') }}
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto">
                    {{ __tool('json-to-yaml-converter', 'content.hero_subtitle') }}</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-cyan-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>{{ __tool('json-to-yaml-converter', 'editor.btn_convert') }}</span></button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg><span>{{ __tool('json-to-yaml-converter', 'editor.btn_clear') }}</span></button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg><span>{{ __tool('json-to-yaml-converter', 'editor.btn_copy') }}</span></button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg><span>{{ __tool('json-to-yaml-converter', 'editor.btn_example') }}</span></button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="jsonInput"
                        class="form-label text-base">{{ __tool('json-to-yaml-converter', 'editor.label_input') }}</label>
                    <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{{ __tool('json-to-yaml-converter', 'editor.ph_input') }}'></textarea>
                </div>
                <div>
                    <label for="yamlOutput"
                        class="form-label text-base">{{ __tool('json-to-yaml-converter', 'editor.label_output') }}</label>
                    <textarea id="yamlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="{{ __tool('json-to-yaml-converter', 'editor.ph_output') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-3xl p-8 md:p-12 border-2 border-cyan-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.hero_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('json-to-yaml-converter', 'content.hero_subtitle') }}
                </p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('json-to-yaml-converter', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-yaml-converter', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ __tool('json-to-yaml-converter', 'content.what_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-yaml-converter', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-yaml-converter', 'content.features.fast.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-yaml-converter', 'content.features.fast.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-yaml-converter', 'content.features.secure.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-yaml-converter', 'content.features.secure.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-yaml-converter', 'content.features.copy.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-yaml-converter', 'content.features.copy.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-yaml-converter', 'content.features.format.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-yaml-converter', 'content.features.format.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-yaml-converter', 'content.features.free.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-yaml-converter', 'content.features.free.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-yaml-converter', 'content.features.offline.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-yaml-converter', 'content.features.offline.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-yaml-converter', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.uses.docker.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.uses.docker.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.uses.config.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.uses.config.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.uses.cicd.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.uses.cicd.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.uses.cloud.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.uses.cloud.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.uses.data.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.uses.data.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-yaml-converter', 'content.uses.tools.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.uses.tools.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-yaml-converter', 'content.how_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-cyan-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('json-to-yaml-converter', 'content.how_steps.1.title') }}</p>
                            <p class="text-gray-700">{{ __tool('json-to-yaml-converter', 'content.how_steps.1.desc') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-cyan-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('json-to-yaml-converter', 'content.how_steps.2.title') }}</p>
                            <p class="text-gray-700">{{ __tool('json-to-yaml-converter', 'content.how_steps.2.desc') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-cyan-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('json-to-yaml-converter', 'content.how_steps.3.title') }}</p>
                            <p class="text-gray-700">{{ __tool('json-to-yaml-converter', 'content.how_steps.3.desc') }}</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 font-primary">{{ __tool('json-to-yaml-converter', 'content.samples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="space-y-6">
                    @foreach(__tool('json-to-yaml-converter', 'content.samples') as $key => $sample)
                        <div>
                            <p class="font-semibold text-gray-900 mb-3">{{ $sample['title'] }}</p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-700 mb-2">JSON:</p>
                                    <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{{ $sample['json'] }}</code></pre>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-700 mb-2">YAML:</p>
                                    <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{{ $sample['yaml'] }}</code></pre>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-yaml-converter', 'content.faq_title') }}</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-yaml-converter', 'content.faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-yaml-converter', 'content.faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-yaml-converter', 'content.faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-yaml-converter', 'content.faq.q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-yaml-converter',  'content.faq.q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-yaml-converter', 'content.faq.a5') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-yaml-converter', 'content.tips_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-yaml-converter', 'content.tips_list.1') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-yaml-converter', 'content.tips_list.2') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-yaml-converter', 'content.tips_list.3') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-yaml-converter', 'content.tips_list.4') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-yaml-converter', 'content.tips_list.5') !!}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convert() {
                const input = document.getElementById('jsonInput').value.trim();
                if (!input) { showStatus("{{ __tool('json-to-yaml-converter', 'js.error_empty') }}", 'error'); return; }
                try {
                    const json = JSON.parse(input);
                    const yaml = jsonToYaml(json);
                    document.getElementById('yamlOutput').value = yaml;
                    showStatus("{{ __tool('json-to-yaml-converter', 'js.success_convert') }}", 'success');
                } catch (error) { showStatus("{{ __tool('json-to-yaml-converter', 'js.error_convert') }}" + error.message, 'error'); }
            }

            function jsonToYaml(obj, indent = 0) {
                let yaml = '';
                const spaces = '  '.repeat(indent);
                if (Array.isArray(obj)) {
                    obj.forEach(item => {
                        if (typeof item === 'object' && item !== null) {
                            yaml += spaces + '-\n' + jsonToYaml(item, indent + 1);
                        } else {
                            yaml += spaces + '- ' + (typeof item === 'string' ? '"' + item + '"' : item) + '\n';
                        }
                    });
                } else if (typeof obj === 'object' && obj !== null) {
                    for (let key in obj) {
                        if (typeof obj[key] === 'object' && obj[key] !== null) {
                            yaml += spaces + key + ':\n' + jsonToYaml(obj[key], indent + 1);
                        } else {
                            yaml += spaces + key + ': ' + (typeof obj[key] === 'string' ? '"' + obj[key] + '"' : obj[key]) + '\n';
                        }
                    }
                }
                return yaml;
            }

            function clearAll() { document.getElementById('jsonInput').value = ''; document.getElementById('yamlOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
            function copyOutput() { const output = document.getElementById('yamlOutput'); if (!output.value) { showStatus("{{ __tool('json-to-yaml-converter', 'js.error_no_copy') }}", 'error'); return; } output.select(); document.execCommand('copy'); showStatus("{{ __tool('json-to-yaml-converter', 'js.success_copy') }}", 'success'); }
            function loadExample() { document.getElementById('jsonInput').value = JSON.stringify({ "database": { "host": "localhost", "port": 5432, "credentials": { "user": "admin", "password": "secret" } } }, null, 2); convert(); }
            function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
        </script>
    @endpush
@endsection