@extends('layouts.app')

@section('title', __tool('uuid-generator', 'meta.h1'))
@section('meta_description', __tool('uuid-generator', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="uuid-generator" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="mb-6 flex items-center gap-4">
                <div class="flex-1">
                    <label for="quantity"
                        class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('uuid-generator', 'editor.label_quantity', 'Quantity') }}</label>
                    <input type="number" id="quantity" value="1" min="1" max="500"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all">
                </div>
                <div class="flex-1">
                    <label for="version"
                        class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('uuid-generator', 'editor.label_version', 'Version') }}</label>
                    <select id="version" disabled
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-100 cursor-not-allowed">
                        <option value="v4" selected>{{ __tool('uuid-generator', 'editor.opt_v4', 'Version 4 (Random)') }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="generateUUIDs()"
                    class="px-8 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('uuid-generator', 'editor.btn_generate', 'Generate UUIDs') }}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{{ __tool('uuid-generator', 'editor.btn_copy', 'Copy') }}</span>
                </button>
            </div>

            <div class="mb-4">
                <label for="outputText"
                    class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('uuid-generator', 'editor.label_output', 'Generated UUIDs') }}</label>
                <textarea id="outputText" rows="10" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-y focus:outline-none"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <h2 class="text-3xl font-black text-gray-900 mb-4 text-center">
                {{ __tool('uuid-generator', 'content.about_title', 'About UUIDs (Version 4)') }}</h2>
            <p class="text-gray-700 text-center max-w-2xl mx-auto leading-relaxed">
                {{ __tool('uuid-generator', 'content.about_desc', 'A UUID (Universally Unique Identifier) is a 128-bit number used to identify information in computer systems. Version 4 UUIDs are generated using random or pseudo-random numbers. The probability of duplication is virtually zero.') }}
            </p>
        </div>
    </div>

    @push('scripts')
        <script>
            function generateUUIDs() {
                const count = parseInt(document.getElementById('quantity').value) || 1;
                let result = '';

                for (let i = 0; i < count; i++) {
                    result += self.crypto.randomUUID() + '\n';
                }

                document.getElementById('outputText').value = result.trim();
                const msg = "{{ __tool('uuid-generator', 'js.success_generated', 'Generated :count UUIDs!') }}".replace(':count', count);
                showStatus(msg, 'success');
            }

            function copyOutput() {
                const output = document.getElementById('outputText');
                if (!output.value) { return; }
                output.select();
                document.execCommand('copy');
                showStatus("{{ __tool('uuid-generator', 'js.success_copy', 'Copied to clipboard!') }}", 'success');
            }

            function showStatus(message, type) {
                const status = document.getElementById('statusMessage');
                status.textContent = message;
                status.className = type === 'success'
                    ? 'mb-6 p-4 rounded-xl font-semibold bg-green-100 text-green-800 border-2 border-green-300'
                    : 'mb-6 p-4 rounded-xl font-semibold bg-red-100 text-red-800 border-2 border-red-300';
                status.classList.remove('hidden');
                setTimeout(() => status.classList.add('hidden'), 3000);
            }

            // Init
            generateUUIDs();
        </script>
    @endpush
@endsection