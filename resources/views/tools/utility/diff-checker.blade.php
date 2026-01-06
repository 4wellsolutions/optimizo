@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-7xl mx-auto">
        <x-tool-hero :tool="$tool" icon="diff-checker" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="grid md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="text1" class="block text-sm font-semibold text-gray-700 mb-2">Original Text</label>
                    <textarea id="text1" rows="12"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all font-mono text-sm resize-none"
                        placeholder="Paste original text..."></textarea>
                </div>
                <div>
                    <label for="text2" class="block text-sm font-semibold text-gray-700 mb-2">Modified Text</label>
                    <textarea id="text2" rows="12"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all font-mono text-sm resize-none"
                        placeholder="Paste modified text..."></textarea>
                </div>
            </div>

            <div class="flex justify-center mb-6">
                <button onclick="computeDiff()"
                    class="px-10 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span>Compare Differences</span>
                </button>
            </div>

            <div id="diffOutput" class="hidden mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Difference Result</label>
                <div id="diffResult"
                    class="w-full border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm overflow-x-auto"></div>
            </div>
        </div>
    </div>

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

    <script>
        function computeDiff() {
            const text1 = document.getElementById('text1').value;
            const text2 = document.getElementById('text2').value;
            const resultDiv = document.getElementById('diffResult');
            const outputContainer = document.getElementById('diffOutput');

            if (!text1 && !text2) return;

            // Simple line-based diff
            const lines1 = text1.split('\n');
            const lines2 = text2.split('\n');

            // This is a naive diff implementation (LCS based ideally, but strict index for simplicity or a simple greedy match)
            // For a robust diff, we'd need a library like diff-match-patch. 
            // Since we are strictly vanilla JS with no external deps asked, I'll implement a simple comparison.
            // Actually, I can use a simple LCS algorithm for lines.

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
@endsection