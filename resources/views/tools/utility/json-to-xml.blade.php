@extends('layouts.app')

@section('title', __tool('json-to-xml', 'meta.h1'))
@section('meta_description', __tool('json-to-xml', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="json-to-xml" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('json-to-xml', 'editor.btn_convert') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('json-to-xml', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('json-to-xml', 'editor.btn_copy') }}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('json-to-xml', 'editor.btn_example') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Two Column Layout for Input/Output -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Input Column -->
                <div>
                    <label for="jsonInput"
                        class="form-label text-base">{{ __tool('json-to-xml', 'editor.label_input') }}</label>
                    <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{{ __tool('json-to-xml', 'editor.ph_input') }}'></textarea>
                </div>

                <!-- Output Column -->
                <div>
                    <label for="xmlOutput"
                        class="form-label text-base">{{ __tool('json-to-xml', 'editor.label_output') }}</label>
                    <textarea id="xmlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="{{ __tool('json-to-xml', 'editor.ph_output') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.hero_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('json-to-xml', 'content.hero_subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('json-to-xml', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-xml', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ __tool('json-to-xml', 'content.what_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-xml', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-xml', 'content.features.instant.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-xml', 'content.features.instant.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-xml', 'content.features.privacy.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-xml', 'content.features.privacy.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-xml', 'content.features.copy.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-xml', 'content.features.copy.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-xml', 'content.features.format.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-xml', 'content.features.format.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-xml', 'content.features.free.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-xml', 'content.features.free.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🌐</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-xml', 'content.features.offline.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-xml', 'content.features.offline.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-xml', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.uses.migration.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.uses.migration.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.uses.integration.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.uses.integration.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.uses.config.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.uses.config.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.uses.enterprise.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.uses.enterprise.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.uses.docs.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.uses.docs.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-xml', 'content.uses.export.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.uses.export.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-xml', 'content.how_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('json-to-xml', 'content.how_steps.1.title') }}</p>
                            <p class="text-gray-700">{{ __tool('json-to-xml', 'content.how_steps.1.desc') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('json-to-xml', 'content.how_steps.2.title') }}</p>
                            <p class="text-gray-700">{{ __tool('json-to-xml', 'content.how_steps.2.desc') }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{{ __tool('json-to-xml', 'content.how_steps.3.title') }}</p>
                            <p class="text-gray-700">{{ __tool('json-to-xml', 'content.how_steps.3.desc') }}</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="space-y-6">
                    <div>
                        <p class="font-semibold text-gray-900 mb-3">Simple Object Conversion:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON Input:</p>
                                <pre
                                    class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"name": "John", "age": 30}</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">XML Output:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;root&gt;
      &lt;name&gt;John&lt;/name&gt;
      &lt;age&gt;30&lt;/age&gt;
    &lt;/root&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-3">Array Conversion:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON Input:</p>
                                <pre
                                    class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>{"users": ["Alice", "Bob"]}</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">XML Output:</p>
                                <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;root&gt;
      &lt;users&gt;
        &lt;item&gt;Alice&lt;/item&gt;
        &lt;item&gt;Bob&lt;/item&gt;
      &lt;/users&gt;
    &lt;/root&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-xml', 'content.faq_title') }}</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-xml', 'content.faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-xml', 'content.faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-xml', 'content.faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-xml', 'content.faq.q4') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-xml', 'content.faq.q5') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.faq.a5') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('json-to-xml', 'content.faq.q6') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-xml', 'content.faq.a6') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-xml', 'content.tips_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-xml', 'content.tips_list.1') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-xml', 'content.tips_list.2') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-xml', 'content.tips_list.3') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-xml', 'content.tips_list.4') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('json-to-xml', 'content.tips_list.5') !!}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convert() {
                const input = document.getElementById('jsonInput').value.trim();

                if (!input) {
                    showStatus("{{ __tool('json-to-xml', 'js.error_empty') }}", 'error');
                    return;
                }

                try {
                    const json = JSON.parse(input);
                    const xml = jsonToXml(json);
                    document.getElementById('xmlOutput').value = xml;
                    showStatus("{{ __tool('json-to-xml', 'js.success_convert') }}", 'success');
                } catch (error) {
                    showStatus("{{ __tool('json-to-xml', 'js.error_convert') }}" + error.message, 'error');
                }
            }

            function jsonToXml(obj, rootName = 'root') {
                let xml = '<' + '?xml version="1.0" encoding="UTF-8"?' + '>\n';
                xml += objectToXml(obj, rootName, 0);
                return xml;
            }

            function objectToXml(obj, name, indent) {
                const spaces = '  '.repeat(indent);
                let xml = '';

                if (Array.isArray(obj)) {
                    obj.forEach(item => {
                        xml += objectToXml(item, 'item', indent);
                    });
                } else if (typeof obj === 'object' && obj !== null) {
                    xml += spaces + '<' + name + '>\n';
                    for (let key in obj) {
                        xml += objectToXml(obj[key], key, indent + 1);
                    }
                    xml += spaces + '</' + name + '>\n';
                } else {
                    xml += spaces + '<' + name + '>' + escapeXml(String(obj)) + '</' + name + '>\n';
                }

                return xml;
            }

            function escapeXml(str) {
                return str.replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&apos;');
            }

            function clearAll() {
                document.getElementById('jsonInput').value = '';
                document.getElementById('xmlOutput').value = '';
                const statusMessage = document.getElementById('statusMessage');
                statusMessage.classList.add('hidden');
                statusMessage.textContent = '';
            }

            function copyOutput() {
                const output = document.getElementById('xmlOutput');
                if (!output.value) {
                    showStatus("{{ __tool('json-to-xml', 'js.error_no_copy') }}", 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus("{{ __tool('json-to-xml', 'js.success_copy') }}", 'success');
            }

            function loadExample() {
                document.getElementById('jsonInput').value = JSON.stringify({
                    "person": {
                        "name": "John Doe",
                        "age": 30,
                        "city": "New York",
                        "hobbies": ["reading", "coding", "gaming"]
                    }
                }, null, 2);
                convert();
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