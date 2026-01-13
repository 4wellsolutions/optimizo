@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="duplicate-line-remover" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="inputText"
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('duplicate-line-remover', 'editor.label_input') !!}</label>
                    <textarea id="inputText" rows="12"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 transition-all font-mono text-sm resize-none"
                        placeholder="{!! __tool('duplicate-line-remover', 'editor.ph_input') !!}"></textarea>
                    <div class="text-right text-xs text-gray-500 mt-1">
                        {!! __tool('duplicate-line-remover', 'editor.lines_count') !!} <span id="inputCount">0</span>
                    </div>
                </div>
                <div>
                    <label for="outputText"
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('duplicate-line-remover', 'editor.label_output') !!}</label>
                    <textarea id="outputText" rows="12" readonly
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none focus:outline-none"></textarea>
                    <div class="text-right text-xs text-gray-500 mt-1">
                        {!! __tool('duplicate-line-remover', 'editor.lines_count') !!} <span id="outputCount">0</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="removeDuplicates()"
                    class="px-8 py-3 bg-orange-600 text-white rounded-xl hover:bg-orange-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>{!! __tool('duplicate-line-remover', 'editor.btn_remove') !!}</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('duplicate-line-remover', 'editor.btn_copy') !!}</span>
                </button>
                <div class="flex items-center ml-auto">
                    <label class="inline-flex items-center text-gray-700 text-sm cursor-pointer">
                        <input type="checkbox" id="tempSensitive"
                            class="w-4 h-4 rounded border-gray-300 text-orange-600 focus:ring-orange-500">
                        <span class="ml-2">{!! __tool('duplicate-line-remover', 'editor.label_sensitive') !!}</span>
                    </label>
                </div>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>


    </div>

    @push('scripts')
        <script>
            const inputText = document.getElementById('inputText');
            const outputText = document.getElementById('outputText');
            const inputCount = document.getElementById('inputCount');
            const outputCount = document.getElementById('outputCount');

            inputText.addEventListener('input', () => {
                inputCount.textContent = inputText.value.split('\n').filter(l => l).length;
            });

            function removeDuplicates() {
                if (!inputText.value) return;

                const text = inputText.value;
                const lines = text.split('\n');
                const caseSensitive = document.getElementById('tempSensitive').checked;

                let uniqueLines;

                if (caseSensitive) {
                    uniqueLines = [...new Set(lines)];
                } else {
                    // To preserve original casing of the *first* occurrence
                    const seen = new Set();
                    uniqueLines = lines.filter(line => {
                        const lower = line.toLowerCase();
                        if (seen.has(lower)) return false;
                        seen.add(lower);
                        return true;
                    });
                }

                const result = uniqueLines.join('\n');
                outputText.value = result;
                outputCount.textContent = uniqueLines.filter(l => l).length;

                const removed = lines.length - uniqueLines.length;
                const msg = "{!! __tool('duplicate-line-remover', 'js.removed_msg') !!}".replace(':count', removed);
                showStatus(msg, 'success');
            }

            function copyOutput() {
                if (!outputText.value) return;
                outputText.select();
                document.execCommand('copy');
                showStatus("{!! __tool('duplicate-line-remover', 'js.copied') !!}", 'success');
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
        </script>
    @endpush
@endsection