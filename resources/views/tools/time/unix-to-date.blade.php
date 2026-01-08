@extends('layouts.app')

@section('title', __tool('unix-to-date', 'seo.title'))
@section('meta_description', __tool('unix-to-date', 'seo.description'))

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- CONVERTER SECTION --}}
    <div class="max-w-4xl mx-auto mb-16 px-4">
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8 md:p-12 overflow-hidden relative">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply opacity-50 blur-3xl -mr-32 -mt-32">
            </div>
            <div
                class="absolute bottom-0 left-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply opacity-50 blur-3xl -ml-32 -mb-32">
            </div>

            <div class="relative z-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                    <span class="flex items-center justify-center w-10 h-10 rounded-xl bg-green-100 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    {{ __tool('unix-to-date', 'form.title') }}
                </h2>

                <div class="space-y-6">
                    <div class="relative">
                        <input type="text" id="unixInput"
                            class="w-full text-xl font-mono border-2 border-gray-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all placeholder-gray-300"
                            placeholder="{{ __tool('unix-to-date', 'form.placeholder') }}" value="{{ time() }}">
                        <button onclick="setInputToNow()"
                            class="absolute right-3 top-3 px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg text-sm font-bold transition-colors">
                            {{ __tool('unix-to-date', 'form.button_now') }}
                        </button>
                    </div>

                    <button onclick="convertUnix()"
                        class="w-full py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                        {{ __tool('unix-to-date', 'form.button_convert') }}
                    </button>

                    <div id="resultContainer" class="hidden space-y-4 pt-8 border-t border-gray-100 animate-fade-in-up">
                        <div class="grid gap-4">
                            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">
                                    {{ __tool('unix-to-date', 'form.result_gmt') }}</div>
                                <div id="resGmt" class="font-mono text-lg text-gray-800 font-medium break-all"></div>
                            </div>
                            <div class="p-4 bg-green-50 rounded-xl border border-green-100">
                                <div class="text-xs font-bold text-green-600 uppercase tracking-widest mb-1">
                                    {{ __tool('unix-to-date', 'form.result_local') }}</div>
                                <div id="resLocal" class="font-mono text-lg text-green-900 font-bold break-all"></div>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">
                                    {{ __tool('unix-to-date', 'form.result_iso') }}</div>
                                <div id="resIso" class="font-mono text-lg text-gray-800 font-medium break-all"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <article class="max-w-4xl mx-auto prose prose-lg prose-green mb-20 px-4">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 font-display">
                {{ __tool('unix-to-date', 'content.hero_title') }}</h2>
            <p class="lead text-gray-600">{{ __tool('unix-to-date', 'content.hero_description') }}</p>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mt-12 mb-6">
                <span class="p-2 bg-green-100 rounded-lg text-green-600"><svg class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg></span>
                {{ __tool('unix-to-date', 'content.formats_title') }}
            </h3>

            <div class="space-y-6 not-prose mb-12">
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 hover:border-green-200 transition-colors">
                    <h4 class="font-bold text-gray-900 flex justify-between items-center mb-2">
                        <span>{{ __tool('unix-to-date', 'content.format_gmt_title') }}</span>
                        <span class="text-xs font-normal px-2 py-1 bg-gray-200 rounded text-gray-600">RFC 2822</span>
                    </h4>
                    <code
                        class="block bg-white border border-gray-200 rounded p-2 mb-2 text-sm text-green-700 font-mono">{{ __tool('unix-to-date', 'content.format_gmt_example') }}</code>
                    <p class="text-sm text-gray-600 mb-0">{{ __tool('unix-to-date', 'content.format_gmt_desc') }}</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 hover:border-green-200 transition-colors">
                    <h4 class="font-bold text-gray-900 flex justify-between items-center mb-2">
                        <span>{{ __tool('unix-to-date', 'content.format_iso_title') }}</span>
                        <span class="text-xs font-normal px-2 py-1 bg-gray-200 rounded text-gray-600">ISO 8601</span>
                    </h4>
                    <code
                        class="block bg-white border border-gray-200 rounded p-2 mb-2 text-sm text-green-700 font-mono">{{ __tool('unix-to-date', 'content.format_iso_example') }}</code>
                    <p class="text-sm text-gray-600 mb-0">{{ __tool('unix-to-date', 'content.format_iso_desc') }}</p>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 hover:border-green-200 transition-colors">
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('unix-to-date', 'content.format_local_title') }}</h4>
                    <code
                        class="block bg-white border border-gray-200 rounded p-2 mb-2 text-sm text-green-700 font-mono">{{ __tool('unix-to-date', 'content.format_local_example') }}</code>
                    <p class="text-sm text-gray-600 mb-0">{{ __tool('unix-to-date', 'content.format_local_desc') }}</p>
                </div>
            </div>

            <div
                class="bg-blue-50 rounded-2xl p-8 border border-blue-100 flex flex-col md:flex-row gap-6 items-center text-center md:text-left">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="mt-0 text-blue-900">{{ __tool('unix-to-date', 'content.reverse_title') }}</h3>
                    <p class="text-blue-800 mb-4">{{ __tool('unix-to-date', 'content.reverse_description') }}</p>
                    <a href="{{ route('tool.show', ['tool' => 'date-to-unix']) }}"
                        class="inline-block px-6 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors no-underline">
                        {{ __tool('unix-to-date', 'content.reverse_button') }} &rarr;
                    </a>
                </div>
            </div>

            <div class="mt-12 p-6 border-l-4 border-yellow-400 bg-yellow-50 rounded-r-xl">
                <h4 class="font-bold text-yellow-800 mt-0">{{ __tool('unix-to-date', 'content.tip_title') }}</h4>
                <p class="text-yellow-700 mb-0 leading-relaxed">{{ __tool('unix-to-date', 'content.tip_desc') }}</p>
            </div>
        </div>
    </article>

    @push('scripts')
        <script>
            function setInputToNow() {
                document.getElementById('unixInput').value = Math.floor(Date.now() / 1000);
                convertUnix();
            }

            function convertUnix() {
                let input = document.getElementById('unixInput').value.trim();
                if (!input) return;

                // Simple heuristic: if length > 11, assume ms and warn (or handle)
                // Using standard Date constructor
                let ts = parseInt(input);

                // If timestamp is likely seconds (less than 12 digits, around year 3000), multiply by 1000
                // Because JS Date uses milliseconds
                if (input.length <= 10) {
                    ts *= 1000;
                }

                const date = new Date(ts);

                if (isNaN(date.getTime())) {
                    alert('Invalid Timestamp');
                    return;
                }

                document.getElementById('resGmt').innerText = date.toUTCString();
                document.getElementById('resLocal').innerText = date.toLocaleString();
                document.getElementById('resIso').innerText = date.toISOString();

                document.getElementById('resultContainer').classList.remove('hidden');
            }
        </script>
    @endpush
@endsection