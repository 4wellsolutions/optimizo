@extends('layouts.app')

@section('title', __tool('tsv-to-csv', 'meta.h1'))
@section('meta_description', __tool('tsv-to-csv', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="tsv-csv-converter" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-amber-200 mb-8">
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('tsv-to-csv', 'editor.btn_convert') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('tsv-to-csv', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('tsv-to-csv', 'editor.btn_copy') }}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('tsv-to-csv', 'editor.btn_example') }}</span>
                </button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="tsvInput"
                        class="form-label text-base">{{ __tool('tsv-to-csv', 'editor.label_input') }}</label>
                    <textarea id="tsvInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder="{{ __tool('tsv-to-csv', 'editor.ph_input') }}"></textarea>
                </div>
                <div>
                    <label for="csvOutput"
                        class="form-label text-base">{{ __tool('tsv-to-csv', 'editor.label_output') }}</label>
                    <textarea id="csvOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="{{ __tool('tsv-to-csv', 'editor.ph_output') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-3xl p-8 md:p-12 border-2 border-amber-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('tsv-to-csv', 'meta.h1') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('tsv-to-csv', 'meta.subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('tsv-to-csv', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔐 {{ __tool('tsv-to-csv', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ __tool('tsv-to-csv', 'content.what_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('tsv-to-csv', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                @foreach(__tool('tsv-to-csv', 'content.features') as $feature)
                    <div
                        class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-amber-300 transition-all shadow-lg hover:shadow-xl">
                        <div class="text-3xl mb-3">
                            @if($loop->index == 0) ⚡
                            @elseif($loop->index == 1) 🔒
                            @elseif($loop->index == 2) 📋
                            @elseif($loop->index == 3) 🎯
                            @elseif($loop->index == 4) 🆓
                            @else 📊
                            @endif
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h4>
                        <p class="text-gray-600 text-sm">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('tsv-to-csv', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                @foreach(__tool('tsv-to-csv', 'content.uses') as $use)
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                        <h4 class="font-bold text-lg text-gray-900 mb-3">
                            @if($loop->index == 0) 📊
                            @elseif($loop->index == 1) 🗄️
                            @elseif($loop->index == 2) 📈
                            @elseif($loop->index == 3) 🔄
                            @elseif($loop->index == 4) 📄
                            @else 🔧
                            @endif
                            {{ $use['title'] }}
                        </h4>
                        <p class="text-gray-700 leading-relaxed">{{ $use['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📝 {{ __tool('tsv-to-csv', 'content.how_to_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    @foreach(__tool('tsv-to-csv', 'content.how_to') as $step)
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 bg-amber-600 text-white rounded-full flex items-center justify-center font-bold mr-3">{{ $loop->iteration }}</span>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">{{ $step['title'] }}</p>
                                <p class="text-gray-700">{{ $step['desc'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 {{ __tool('tsv-to-csv', 'content.examples_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">
                            {{ __tool('tsv-to-csv', 'content.examples.input') }}</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>name	age	city
        John	30	New York</code></pre>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">
                            {{ __tool('tsv-to-csv', 'content.examples.output') }}</p>
                        <pre class="bg-gray-50 p-3 rounded text-sm overflow-x-auto"><code>name,age,city
        John,30,New York</code></pre>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('tsv-to-csv', 'content.faq_title') }}</h3>
            <div class="space-y-4 mb-8">
                @foreach(__tool('tsv-to-csv', 'content.faq') as $key => $value)
                    @if(str_starts_with($key, 'q'))
                        <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                            <p class="text-gray-700 leading-relaxed">
                                {{ __tool('tsv-to-csv', 'content.faq.' . str_replace('q', 'a', $key)) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎓 {{ __tool('tsv-to-csv', 'content.best_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    @foreach(__tool('tsv-to-csv', 'content.best') as $practice)
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700"><strong>{{ $practice['title'] }}</strong> {{ $practice['desc'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convert() {
                const input = document.getElementById('tsvInput').value;
                if (!input.trim()) {
                    showStatus("{{ __tool('tsv-to-csv', 'js.error_empty') }}", 'error');
                    return;
                }
                try {
                    // Simple TSV to CSV: wrap in quotes if contains comma, join with commas
                    const csv = input.split('\n').map(line =>
                        line.split('\t').map(cell => {
                            // Check for quotes or commas and escape/quote as needed is better, but existing logic was simple join.
                            // However, to be robust like PapaParse:
                            if (cell.includes(',') || cell.includes('"') || cell.includes('\n')) {
                                return '"' + cell.replace(/"/g, '""') + '"';
                            }
                            return cell;
                        }).join(',')
                    ).join('\n');
                    document.getElementById('csvOutput').value = csv;
                    showStatus("{{ __tool('tsv-to-csv', 'js.success_convert') }}", 'success');
                } catch (error) {
                    showStatus("{{ __tool('tsv-to-csv', 'js.error_general') }}" + error.message, 'error');
                }
            }
            function clearAll() {
                document.getElementById('tsvInput').value = '';
                document.getElementById('csvOutput').value = '';
                document.getElementById('statusMessage').classList.add('hidden');
            }
            function copyOutput() {
                const output = document.getElementById('csvOutput');
                if (!output.value) {
                    showStatus("{{ __tool('tsv-to-csv', 'js.error_no_copy') }}", 'error');
                    return;
                }
                output.select();
                document.execCommand('copy');
                showStatus("{{ __tool('tsv-to-csv', 'js.success_copy') }}", 'success');
            }
            function loadExample() {
                document.getElementById('tsvInput').value = "name\tage\tcity\nJohn Doe\t30\tNew York\nJane Smith\t25\tLondon";
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