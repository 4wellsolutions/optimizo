@extends('layouts.app')

@section('title', __tool('file-difference-checker', 'meta.title'))
@section('meta_description', __tool('file-difference-checker', 'meta.description'))
@section('content')
    <div class="max-w-7xl mx-auto">
        <x-tool-hero :tool="$tool" icon="file-difference-checker" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="grid md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="text1"
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('file-difference-checker', 'editor.original_text') !!}</label>
                    <textarea id="text1" rows="12"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all font-mono text-sm resize-none"
                        placeholder="{!! __tool('file-difference-checker', 'editor.ph_original') !!}"></textarea>
                </div>
                <div>
                    <label for="text2"
                        class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('file-difference-checker', 'editor.modified_text') !!}</label>
                    <textarea id="text2" rows="12"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all font-mono text-sm resize-none"
                        placeholder="{!! __tool('file-difference-checker', 'editor.ph_modified') !!}"></textarea>
                </div>
            </div>

            <div class="flex justify-center mb-6">
                <button onclick="computeDiff()"
                    class="px-10 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span>{!! __tool('file-difference-checker', 'editor.btn_compare') !!}</span>
                </button>
            </div>

            <div id="diffOutput" class="hidden mb-4">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('file-difference-checker', 'editor.result_label') !!}</label>
                <div id="diffResult"
                    class="w-full border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm overflow-x-auto"></div>
            </div>
        </div>

        {{-- SEO Content --}}
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('file-difference-checker', 'content.hero_title') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('file-difference-checker', 'content.hero_subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('file-difference-checker', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('file-difference-checker', 'content.features_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                @foreach(['visual', 'instant', 'privacy', 'unlimited', 'accurate', 'free'] as $key)
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('file-difference-checker', 'content.features.'.$key.'.title') !!}</h4>
                    <p class="text-gray-600 text-sm">{!! __tool('file-difference-checker', 'content.features.'.$key.'.desc') !!}</p>
                </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('file-difference-checker', 'content.uses_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach(['code', 'document', 'config', 'merge', 'backup', 'translation'] as $key)
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('file-difference-checker', 'content.uses.'.$key.'.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('file-difference-checker', 'content.uses.'.$key.'.desc') !!}</p>
                </div>
                @endforeach
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('file-difference-checker', 'content.how_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-4 text-gray-700">
                    @for($i = 1; $i <= 4; $i++)
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold">{{ $i }}</span>
                        <div>
                            <strong>{!! __tool('file-difference-checker', 'content.how_steps.'.$i.'.title') !!}</strong>
                            <span>{!! __tool('file-difference-checker', 'content.how_steps.'.$i.'.desc') !!}</span>
                        </div>
                    </li>
                    @endfor
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('file-difference-checker', 'content.faq_title') !!}</h3>
            <div class="space-y-4">
                @for($i = 1; $i <= 5; $i++)
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('file-difference-checker', 'content.faq.q'.$i) !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('file-difference-checker', 'content.faq.a'.$i) !!}</p>
                </div>
                @endfor
            </div>
        </div>

    </div>

    @push('styles')
        <style>
            .diff-line {
                padding: 2px 10px;
                white-space: pre-wrap;
                display: block;
                border-left: 4px solid transparent;
            }

            .diff-added {
                background-color: #d1fae5;
                border-left-color: #10b981;
                color: #064e3b;
            }

            .diff-removed {
                background-color: #fee2e2;
                border-left-color: #ef4444;
                color: #7f1d1d;
            }

            .diff-unchanged {
                color: #6b7280;
            }

            .diff-line-num {
                display: inline-block;
                width: 30px;
                color: #9ca3af;
                user-select: none;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function computeDiff() {
                const text1 = document.getElementById('text1').value;
                const text2 = document.getElementById('text2').value;
                const resultDiv = document.getElementById('diffResult');
                const outputContainer = document.getElementById('diffOutput');

                if (!text1 && !text2) {
                    alert("{!! __tool('file-difference-checker', 'js.error_empty') !!}");
                    return;
                }

                // Simple line-based diff
                const lines1 = text1.split('\n');
                const lines2 = text2.split('\n');

                const matrix = Array(lines1.length + 1).fill(null).map(() => Array(lines2.length + 1).fill(0));

                for (let i = 1; i <= lines1.length; i++) {
                    for (let j = 1; j <= lines2.length; j++) {
                        if (lines1[i - 1] === lines2[j - 1]) {
                            matrix[i][j] = matrix[i - 1][j - 1] + 1;
                        } else {
                            matrix[i][j] = Math.max(matrix[i - 1][j], matrix[i][j - 1]);
                        }
                    }
                }

                let i = lines1.length;
                let j = lines2.length;
                const diffs = [];

                while (i > 0 || j > 0) {
                    if (i > 0 && j > 0 && lines1[i - 1] === lines2[j - 1]) {
                        diffs.unshift({ type: 'equal', content: lines1[i - 1] });
                        i--;
                        j--;
                    } else if (j > 0 && (i === 0 || matrix[i][j - 1] >= matrix[i - 1][j])) {
                        diffs.unshift({ type: 'add', content: lines2[j - 1] });
                        j--;
                    } else if (i > 0 && (j === 0 || matrix[i][j - 1] < matrix[i - 1][j])) {
                        diffs.unshift({ type: 'remove', content: lines1[i - 1] });
                        i--;
                    }
                }

                // Render
                let html = '';
                diffs.forEach(part => {
                    if (part.type === 'equal') {
                        html += `<div class="diff-line diff-unchanged"> ${escapeHtml(part.content)}</div>`;
                    } else if (part.type === 'add') {
                        html += `<div class="diff-line diff-added">+ ${escapeHtml(part.content)}</div>`;
                    } else {
                        html += `<div class="diff-line diff-removed">- ${escapeHtml(part.content)}</div>`;
                    }
                });

                resultDiv.innerHTML = html;
                outputContainer.classList.remove('hidden');
            }

            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }
        </script>
    @endpush
@endsection