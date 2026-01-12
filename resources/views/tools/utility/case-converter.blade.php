@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Hero Section --}}
        <x-tool-hero :tool="$tool" />

        {{-- Tool Section --}}
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('case-converter', 'editor.label_input') !!}</label>
                    <textarea id="inputText" rows="8"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                        placeholder="{!! __tool('case-converter', 'editor.ph_input') !!}"></textarea>
                </div>
                <div>
                    <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">{!! __tool('case-converter', 'editor.label_output') !!}</label>
                    <textarea id="outputText" rows="8" readonly
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                        placeholder="{!! __tool('case-converter', 'editor.label_output') !!}..."></textarea>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mt-6 justify-center">
                <button onclick="convertCase('upper')"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all font-semibold shadow-lg hover:shadow-xl uppercase tracking-wide">
                    {!! __tool('case-converter', 'editor.btn_upper') !!}
                </button>
                <button onclick="convertCase('lower')"
                    class="px-6 py-3 bg-pink-600 text-white rounded-xl hover:bg-pink-700 transition-all font-semibold shadow-lg hover:shadow-xl lowercase tracking-wide">
                    {!! __tool('case-converter', 'editor.btn_lower') !!}
                </button>
                <button onclick="convertCase('title')"
                    class="px-6 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-xl capitalize tracking-wide">
                    {!! __tool('case-converter', 'editor.btn_title') !!}
                </button>
                <button onclick="convertCase('sentence')"
                    class="px-6 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 transition-all font-semibold shadow-lg hover:shadow-xl first-letter:uppercase tracking-wide">
                    {!! __tool('case-converter', 'editor.btn_sentence') !!}
                </button>
            </div>

            <div class="flex justify-center mt-6">
                <button onclick="copyOutput()"
                    class="px-8 py-3 bg-gray-800 text-white rounded-xl hover:bg-gray-900 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>{!! __tool('case-converter', 'editor.btn_copy') !!}</span>
                </button>
            </div>
            
            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center max-w-md mx-auto"></div>
        </div>

        {{-- SEO Content --}}
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl p-8 md:p-12 border-2 border-indigo-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129">
                        </path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{!! __tool('case-converter', 'content.hero_title') !!}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{!! __tool('case-converter', 'content.hero_subtitle') !!}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {!! __tool('case-converter', 'content.p1') !!}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('case-converter', 'content.types_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('case-converter', 'content.types.upper.title') !!}</h4>
                    <p class="text-gray-600 text-sm mb-2">{!! __tool('case-converter', 'content.types.upper.desc') !!}</p>
                    <code class="bg-gray-100 p-1 rounded text-xs block">{!! __tool('case-converter', 'content.types.upper.example') !!}</code>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('case-converter', 'content.types.lower.title') !!}</h4>
                    <p class="text-gray-600 text-sm mb-2">{!! __tool('case-converter', 'content.types.lower.desc') !!}</p>
                    <code class="bg-gray-100 p-1 rounded text-xs block">{!! __tool('case-converter', 'content.types.lower.example') !!}</code>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('case-converter', 'content.types.title.title') !!}</h4>
                    <p class="text-gray-600 text-sm mb-2">{!! __tool('case-converter', 'content.types.title.desc') !!}</p>
                    <code class="bg-gray-100 p-1 rounded text-xs block">{!! __tool('case-converter', 'content.types.title.example') !!}</code>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <h4 class="font-bold text-gray-900 mb-2">{!! __tool('case-converter', 'content.types.sentence.title') !!}</h4>
                    <p class="text-gray-600 text-sm mb-2">{!! __tool('case-converter', 'content.types.sentence.desc') !!}</p>
                    <code class="bg-gray-100 p-1 rounded text-xs block">{!! __tool('case-converter', 'content.types.sentence.example') !!}</code>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('case-converter', 'content.uses_title') !!}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('case-converter', 'content.uses.caps.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.uses.caps.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('case-converter', 'content.uses.docs.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.uses.docs.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('case-converter', 'content.uses.social.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.uses.social.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('case-converter', 'content.uses.email.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.uses.email.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('case-converter', 'content.uses.content.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.uses.content.desc') !!}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{!! __tool('case-converter', 'content.uses.data.title') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.uses.data.desc') !!}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('case-converter', 'content.tips_title') !!}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-indigo-500">➜</span>
                        <span>{!! __tool('case-converter', 'content.tips_list.1') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-indigo-500">➜</span>
                        <span>{!! __tool('case-converter', 'content.tips_list.2') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-indigo-500">➜</span>
                        <span>{!! __tool('case-converter', 'content.tips_list.3') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-indigo-500">➜</span>
                        <span>{!! __tool('case-converter', 'content.tips_list.4') !!}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-indigo-500">➜</span>
                        <span>{!! __tool('case-converter', 'content.tips_list.5') !!}</span>
                    </li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{!! __tool('case-converter', 'content.faq_title') !!}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('case-converter', 'content.faq.q1') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.faq.a1') !!}</p>
                </div>
                 <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('case-converter', 'content.faq.q2') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.faq.a2') !!}</p>
                </div>
                 <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('case-converter', 'content.faq.q3') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.faq.a3') !!}</p>
                </div>
                 <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('case-converter', 'content.faq.q4') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.faq.a4') !!}</p>
                </div>
                 <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{!! __tool('case-converter', 'content.faq.q5') !!}</h4>
                    <p class="text-gray-700 leading-relaxed">{!! __tool('case-converter', 'content.faq.a5') !!}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const caseMsgs = {
            empty: "{!! __tool('case-converter', 'js.error_empty') !!}",
            noCopy: "{!! __tool('case-converter', 'js.no_copy') !!}",
            copied: "{!! __tool('case-converter', 'js.copied') !!}"
        };

        function convertCase(type) {
            const input = document.getElementById('inputText').value;
            const output = document.getElementById('outputText');

            if (!input.trim()) {
                showStatus(caseMsgs.empty, 'error');
                return;
            }

            let result = '';

            switch (type) {
                case 'upper':
                    result = input.toUpperCase();
                    break;
                case 'lower':
                    result = input.toLowerCase();
                    break;
                case 'title':
                    result = input.replace(/\w\S*/g, (txt) => {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                    });
                    break;
                case 'sentence':
                    result = input.replace(/(^\s*\w|[\.\!\?]\s*\w)/g, (c) => {
                        return c.toUpperCase();
                    });
                    break;
            }

            output.value = result;
        }

        function copyOutput() {
            const output = document.getElementById('outputText');

            if (!output.value.trim()) {
                showStatus(caseMsgs.noCopy, 'error');
                return;
            }

            output.select();
            document.execCommand('copy');
            showStatus(caseMsgs.copied, 'success');
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
            
            statusMessage.classList.remove('hidden');
        }
    </script>
    @endpush
@endsection