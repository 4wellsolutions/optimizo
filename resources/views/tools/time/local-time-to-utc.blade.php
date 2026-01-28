@extends('layouts.app')

@section('title', __tool('local-time-to-utc', 'meta.title'))
@section('meta_description', __tool('local-time-to-utc', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto px-4">
        <x-tool-hero :tool="$tool" title="{{ __tool('local-time-to-utc', 'meta.h1') }}"
            description="{{ __tool('local-time-to-utc', 'meta.subtitle') }}" />

        {{-- Tool Editor --}}
        <div
            class="bg-white rounded-3xl shadow-xl border border-indigo-50 p-8 md:p-12 mb-12 relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-indigo-50 rounded-full mix-blend-multiply opacity-50 blur-3xl -mr-32 -mt-32 group-hover:scale-110 transition-transform duration-700">
            </div>

            <div class="relative z-10 max-w-3xl mx-auto">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-4 ml-1">
                            {{ __tool('local-time-to-utc', 'editor.label_input') }}
                        </label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Date Inputs --}}
                            <div class="space-y-4">
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">{{ __tool('local-time-to-utc', 'editor.ph_year') }}</label>
                                        <input type="number" id="year"
                                            class="w-full text-center font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-xl h-12 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    </div>
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">{{ __tool('local-time-to-utc', 'editor.ph_month') }}</label>
                                        <input type="number" id="month" min="1" max="12"
                                            class="w-full text-center font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-xl h-12 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    </div>
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">{{ __tool('local-time-to-utc', 'editor.ph_day') }}</label>
                                        <input type="number" id="day" min="1" max="31"
                                            class="w-full text-center font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-xl h-12 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    </div>
                                </div>
                            </div>

                            {{-- Time Inputs --}}
                            <div class="space-y-4">
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">{{ __tool('local-time-to-utc', 'editor.ph_hour') }}</label>
                                        <input type="number" id="hour" min="0" max="23"
                                            class="w-full text-center font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-xl h-12 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    </div>
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">{{ __tool('local-time-to-utc', 'editor.ph_minute') }}</label>
                                        <input type="number" id="minute" min="0" max="59"
                                            class="w-full text-center font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-xl h-12 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    </div>
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">{{ __tool('local-time-to-utc', 'editor.ph_second') }}</label>
                                        <input type="number" id="second" min="0" max="59"
                                            class="w-full text-center font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-xl h-12 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button onclick="convertToUtc()"
                        class="w-full py-5 px-8 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold text-xl shadow-xl hover:shadow-indigo-500/30 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 group/btn">
                        <span>{{ __tool('local-time-to-utc', 'editor.btn_convert') }}</span>
                        <svg class="w-6 h-6 group-hover/btn:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5-5 5M6 7l5 5-5 5"></path>
                        </svg>
                    </button>

                    <div id="utcResult" class="hidden pt-10 border-t border-gray-100 space-y-4 animate-fade-in-up">
                        <div class="p-6 bg-indigo-50 border border-indigo-100 rounded-2xl text-center">
                            <span
                                class="text-xs font-bold text-indigo-400 uppercase tracking-widest block mb-2">{{ __tool('local-time-to-utc', 'editor.result_label') }}</span>
                            <div id="resUtc" class="text-3xl font-mono font-black text-indigo-900 break-all"></div>
                        </div>
                        <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl text-center">
                            <span
                                class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">{{ __tool('local-time-to-utc', 'editor.result_iso') }}</span>
                            <div id="resIso" class="text-sm font-mono text-gray-600 break-all"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Info Section --}}
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('local-time-to-utc', 'content.what_is_title') }}
                </h2>
                <div class="prose prose-indigo text-gray-600">
                    <p>{{ __tool('local-time-to-utc', 'content.what_is_desc') }}</p>
                </div>
            </div>

            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex flex-col justify-center border-l-4 border-indigo-500">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Why UTC?</h3>
                <p class="text-gray-600 leading-relaxed">
                    Coordinated Universal Time (UTC) is the primary time standard by which the world regulates clocks and
                    time. It is not adjusted for daylight saving time, making it consistent year-round.
                </p>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function convertToUtc() {
                const y = document.getElementById('year').value;
                const m = document.getElementById('month').value - 1; // 0-indexed
                const d = document.getElementById('day').value;
                const h = document.getElementById('hour').value || 0;
                const min = document.getElementById('minute').value || 0;
                const s = document.getElementById('second').value || 0;

                if (!y || !d) return;

                const date = new Date(y, m, d, h, min, s);

                if (isNaN(date.getTime())) {
                    document.getElementById('resUtc').innerText = "Invalid Date";
                    document.getElementById('resIso').innerText = "-";
                    document.getElementById('utcResult').classList.remove('hidden');
                    return;
                }

                document.getElementById('resUtc').innerText = date.toUTCString();
                document.getElementById('resIso').innerText = date.toISOString();
                document.getElementById('utcResult').classList.remove('hidden');
            }

            // Init inputs with current date
            const now = new Date();
            document.getElementById('year').value = now.getFullYear();
            document.getElementById('month').value = now.getMonth() + 1;
            document.getElementById('day').value = now.getDate();
            document.getElementById('hour').value = now.getHours();
            document.getElementById('minute').value = now.getMinutes();
            document.getElementById('second').value = now.getSeconds();

            // Trigger on load
            window.addEventListener('load', convertToUtc);
        </script>
    @endpush
@endsection