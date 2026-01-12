@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="csv-to-xml" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg><span>{!! __tool('csv-to-xml', 'editor.btn_convert') !!}</span></button>
                <button onclick="clearAll()" class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg><span>{!! __tool('csv-to-xml', 'editor.btn_clear') !!}</span></button>
                <button onclick="copyOutput()" class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg><span>{!! __tool('csv-to-xml', 'editor.btn_copy') !!}</span></button>
                <button onclick="loadExample()" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg><span>{!! __tool('csv-to-xml', 'editor.btn_example') !!}</span></button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
            <div class="grid md:grid-cols-2 gap-6"><div><label for="csvInput" class="form-label text-base">{!! __tool('csv-to-xml', 'editor.label_input') !!}</label><textarea id="csvInput" class="form-input font-mono text-sm min-h-[400px]" placeholder="{!! __tool('csv-to-xml', 'editor.ph_input') !!}"></textarea></div><div><label for="xmlOutput" class="form-label text-base">{!! __tool('csv-to-xml', 'editor.label_output') !!}</label><textarea id="xmlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly placeholder="{!! __tool('csv-to-xml', 'editor.ph_output') !!}"></textarea></div></div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.hero_title') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('csv-to-xml', 'content.hero_subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('csv-to-xml', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.what_title') !!}</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                {!! __tool('csv-to-xml', 'content.what_desc') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.features_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-xml', 'content.features.fast.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('csv-to-xml', 'content.features.fast.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-xml', 'content.features.secure.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('csv-to-xml', 'content.features.secure.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-xml', 'content.features.copy.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('csv-to-xml', 'content.features.copy.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-xml', 'content.features.smart.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('csv-to-xml', 'content.features.smart.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-xml', 'content.features.free.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('csv-to-xml', 'content.features.free.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('csv-to-xml', 'content.features.header.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('csv-to-xml', 'content.features.header.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.uses_title') !!}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.uses.migration.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.uses.migration.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.uses.api.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.uses.api.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.uses.bi.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.uses.bi.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.uses.enterprise.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.uses.enterprise.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.uses.doc.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.uses.doc.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('csv-to-xml', 'content.uses.db.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.uses.db.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.how_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold mr-3">1</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{!! __tool('csv-to-xml', 'content.how_steps.1.title') !!}</p>
                            <p class="text-gray-700">{!! __tool('csv-to-xml', 'content.how_steps.1.desc') !!}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold mr-3">2</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{!! __tool('csv-to-xml', 'content.how_steps.2.title') !!}</p>
                            <p class="text-gray-700">{!! __tool('csv-to-xml', 'content.how_steps.2.desc') !!}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold mr-3">3</span>
                        <div>
                            <p class="font-semibold text-gray-900 mb-1">{!! __tool('csv-to-xml', 'content.how_steps.3.title') !!}</p>
                            <p class="text-gray-700">{!! __tool('csv-to-xml', 'content.how_steps.3.desc') !!}</p>
                        </div>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.example_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">{!! __tool('csv-to-xml', 'content.example_input') !!}</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>name,age,city
John,30,New York
Jane,25,London</code></pre>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">{!! __tool('csv-to-xml', 'content.example_output') !!}</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>&lt;data&gt;
  &lt;row&gt;
    &lt;name&gt;John&lt;/name&gt;
    &lt;age&gt;30&lt;/age&gt;
    &lt;city&gt;New York&lt;/city&gt;
  &lt;/row&gt;
  &lt;row&gt;
    &lt;name&gt;Jane&lt;/name&gt;
    &lt;age&gt;25&lt;/age&gt;
    &lt;city&gt;London&lt;/city&gt;
  &lt;/row&gt;
&lt;/data&gt;</code></pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.faq_title') !!}</h3>
            <div class="space-y-4 mb-8">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('csv-to-xml', 'content.faq.q1') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.faq.a1') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('csv-to-xml', 'content.faq.q2') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.faq.a2') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('csv-to-xml', 'content.faq.q3') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.faq.a3') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('csv-to-xml', 'content.faq.q4') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.faq.a4') !!}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('csv-to-xml', 'content.faq.q5') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('csv-to-xml', 'content.faq.a5') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('csv-to-xml', 'content.tips_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('csv-to-xml', 'content.tips_list.1') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('csv-to-xml', 'content.tips_list.2') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('csv-to-xml', 'content.tips_list.3') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('csv-to-xml', 'content.tips_list.4') !!}</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">{!! __tool('csv-to-xml', 'content.tips_list.5') !!}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function convert() {
            const input = document.getElementById('csvInput').value.trim();
            if (!input) { showStatus("{!! __tool('csv-to-xml', 'js.error_empty') !!}", 'error'); return; }
            try {
                const lines = input.split('\n').filter(line => line.trim());
                const headers = lines[0].split(',').map(h => h.trim());
                let xml = '<' + '?xml version="1.0" encoding="UTF-8"?' + '>\n<data>\n';
                for (let i = 1; i < lines.length; i++) {
                    const values = lines[i].split(',').map(v => v.trim());
                    xml += '  <row>\n';
                    headers.forEach((header, index) => {
                        xml += `    <${header}>${values[index] || ''}</${header}>\n`;
                    });
                    xml += '  </row>\n';
                }
                xml += '</data>';
                document.getElementById('xmlOutput').value = xml;
                showStatus("{!! __tool('csv-to-xml', 'js.success_convert') !!}", 'success');
            } catch (error) { showStatus("{!! __tool('csv-to-xml', 'js.error_general') !!}" + error.message, 'error'); }
        }
        function clearAll() { document.getElementById('csvInput').value = ''; document.getElementById('xmlOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
        function copyOutput() { const output = document.getElementById('xmlOutput'); if (!output.value) { showStatus("{!! __tool('csv-to-xml', 'js.error_no_copy') !!}", 'error'); return; } output.select(); document.execCommand('copy'); showStatus("{!! __tool('csv-to-xml', 'js.success_copy') !!}", 'success'); }
        function loadExample() { document.getElementById('csvInput').value = 'name,age,city\nJohn Doe,30,New York\nJane Smith,25,London\nBob Johnson,35,Paris'; convert(); }
        function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
    </script>
    @endpush
@endsection
