@extends('layouts.app')

@section('title', __tool('json-to-sql', 'meta.h1'))
@section('meta_description', __tool('json-to-sql', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="json-to-sql" :title="__tool('json-to-sql', 'meta.h1')"
            :subtitle="__tool('json-to-sql', 'meta.subtitle')" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-rose-200 mb-8">
            <div class="mb-4">
                <label for="tableName"
                    class="form-label text-base">{{ __tool('json-to-sql', 'editor.label_tablename') }}</label>
                <input type="text" id="tableName" class="form-input"
                    placeholder="{{ __tool('json-to-sql', 'editor.ph_tablename') }}" value="users">
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convert()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('json-to-sql', 'editor.btn_convert') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('json-to-sql', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('json-to-sql', 'editor.btn_copy') }}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('json-to-sql', 'editor.btn_example') }}</span>
                </button>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="jsonInput"
                        class="form-label text-base">{{ __tool('json-to-sql', 'editor.label_input') }}</label>
                    <textarea id="jsonInput" class="form-input font-mono text-sm min-h-[400px]"
                        placeholder='{{ __tool('json-to-sql', 'editor.ph_input') }}'></textarea>
                </div>
                <div>
                    <label for="sqlOutput"
                        class="form-label text-base">{{ __tool('json-to-sql', 'editor.label_output') }}</label>
                    <textarea id="sqlOutput" class="form-input font-mono text-sm min-h-[400px]" readonly
                        placeholder="{{ __tool('json-to-sql', 'editor.ph_output') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-rose-50 to-pink-50 rounded-3xl p-8 md:p-12 border-2 border-rose-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('json-to-sql', 'content.hero_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('json-to-sql', 'content.hero_subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('json-to-sql', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-sql', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ __tool('json-to-sql', 'content.what_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-sql', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <!-- Fast -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-sql', 'content.features.fast.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-sql', 'content.features.fast.desc') }}</p>
                </div>
                <!-- Private -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-sql', 'content.features.private.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-sql', 'content.features.private.desc') }}</p>
                </div>
                <!-- Copy -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-sql', 'content.features.copy.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-sql', 'content.features.copy.desc') }}</p>
                </div>
                <!-- Smart -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-sql', 'content.features.smart.title') }}
                    </h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-sql', 'content.features.smart.desc') }}</p>
                </div>
                <!-- Free -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-sql', 'content.features.free.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-sql', 'content.features.free.desc') }}</p>
                </div>
                <!-- Database -->
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🗄️</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('json-to-sql', 'content.features.db.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('json-to-sql', 'content.features.db.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-sql', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <!-- Migration -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('json-to-sql', 'content.uses.migration.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-sql', 'content.uses.migration.desc') }}</p>
                </div>
                <!-- Import -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('json-to-sql', 'content.uses.import.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-sql', 'content.uses.import.desc') }}</p>
                </div>
                <!-- API -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-sql', 'content.uses.api.title') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-sql', 'content.uses.api.desc') }}</p>
                </div>
                <!-- Test -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-sql', 'content.uses.test.title') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-sql', 'content.uses.test.desc') }}</p>
                </div>
                <!-- Backup -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">
                        {{ __tool('json-to-sql', 'content.uses.backup.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-sql', 'content.uses.backup.desc') }}</p>
                </div>
                <!-- Dev -->
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('json-to-sql', 'content.uses.dev.title') }}
                    </h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('json-to-sql', 'content.uses.dev.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-sql', 'content.how_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8 shadow-lg">
                <ol class="space-y-4">
                    @foreach(__('tools.utilities.json-to-sql.content.how_steps') as $step)
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 bg-rose-600 text-white rounded-full flex items-center justify-center font-bold mr-3">{{ $loop->iteration }}</span>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">{!! $step['title'] ?? $step !!}</p>
                                @if(is_array($step) && isset($step['desc']))
                                    <p class="text-gray-700">{{ $step['desc'] }}</p>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            <!-- Example section omitted as it's hard to translate dynamically without structural changes, logic remains in JS example -->

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-sql', 'content.faq_title') }}</h3>
            <div class="space-y-4 mb-8">
                @foreach(__('tools.utilities.json-to-sql.content.faq') as $key => $value)
                    @if(str_starts_with($key, 'q'))
                        <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ $value }}</h4>
                            <p class="text-gray-700 leading-relaxed">
                                {{ __('tools.utilities.json-to-sql.content.faq.a' . substr($key, 1)) }}</p>
                        </div>
                    @endif
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('json-to-sql', 'content.tips_title') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 shadow-lg">
                <ul class="space-y-3">
                    @foreach(__('tools.utilities.json-to-sql.content.tips_list') as $tip)
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{!! $tip !!}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convert() {
                const input = document.getElementById('jsonInput').value.trim();
                const tableName = document.getElementById('tableName').value.trim() || 'table';
                if (!input) { showStatus("{{ __tool('json-to-sql', 'js.error_empty') }}", 'error'); return; }
                try {
                    const data = JSON.parse(input);
                    const array = Array.isArray(data) ? data : [data];
                    let sql = '';
                    array.forEach(obj => {
                        const columns = Object.keys(obj).map(key => `\`${key}\``).join(', '); // Added backticks for safety
                        const values = Object.values(obj).map(v => {
                            if (v === null) return 'NULL';
                            if (typeof v === 'string') return `'${v.replace(/'/g, "''")}'`; // Escape single quotes
                            return v;
                        }).join(', ');
                        sql += `INSERT INTO \`${tableName}\` (${columns}) VALUES (${values});\n`;
                    });
                    document.getElementById('sqlOutput').value = sql;
                    showStatus("{{ __tool('json-to-sql', 'js.success_convert') }}", 'success');
                } catch (error) { showStatus("{{ __tool('json-to-sql', 'js.error_convert') }}" + error.message, 'error'); }
            }
            function clearAll() { document.getElementById('jsonInput').value = ''; document.getElementById('sqlOutput').value = ''; document.getElementById('statusMessage').classList.add('hidden'); }
            function copyOutput() { const output = document.getElementById('sqlOutput'); if (!output.value) { showStatus("{{ __tool('json-to-sql', 'js.error_no_copy') }}", 'error'); return; } output.select(); document.execCommand('copy'); showStatus("{{ __tool('json-to-sql', 'js.success_copy') }}", 'success'); }
            function loadExample() { document.getElementById('jsonInput').value = JSON.stringify([{ "name": "John Doe", "age": 30, "city": "New York" }, { "name": "Jane Smith", "age": 25, "city": "London" }], null, 2); convert(); }
            function showStatus(message, type) { const statusMessage = document.getElementById('statusMessage'); statusMessage.textContent = message; statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300'); if (type === 'success') { statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300'); } else { statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300'); } }
        </script>
    @endpush
@endsection