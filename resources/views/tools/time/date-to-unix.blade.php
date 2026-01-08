@extends('layouts.app')

@section('title', __tool('date-to-unix', 'seo.title'))
@section('meta_description', __tool('date-to-unix', 'seo.description'))

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- CONVERTER SECTION --}}
    <div class="max-w-4xl mx-auto mb-16 px-4">
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8 md:p-12 overflow-hidden relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-100 rounded-full mix-blend-multiply opacity-50 blur-3xl -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-100 rounded-full mix-blend-multiply opacity-50 blur-3xl -ml-32 -mb-32"></div>

            <div class="relative z-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                    <span class="flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </span>
                    {{ __tool('date-to-unix', 'form.title') }}
                </h2>

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                             <label class="block text-sm font-semibold text-gray-700">{{ __tool('date-to-unix', 'form.date_label') }}</label>
                             <input type="date" id="dateInput" class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4">
                        </div>
                        <div class="space-y-2">
                             <label class="block text-sm font-semibold text-gray-700">{{ __tool('date-to-unix', 'form.time_label') }}</label>
                             <div class="flex gap-2">
                                <input type="time" id="timeInput" step="1" class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4">
                             </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 p-4 bg-gray-50 rounded-xl">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="mode" value="local" checked class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <span class="font-medium text-gray-700">{{ __tool('date-to-unix', 'form.local_time') }}</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="mode" value="utc" class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                            <span class="font-medium text-gray-700">{{ __tool('date-to-unix', 'form.utc_mode') }}</span>
                        </label>
                    </div>

                    <button onclick="convertToUnix()" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                        {{ __tool('date-to-unix', 'form.button') }}
                    </button>

                    <div id="resultContainer" class="hidden pt-8 border-t border-gray-100 text-center animate-fade-in-up">
                        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">{{ __tool('date-to-unix', 'form.result_title') }}</p>
                        <div id="unixResult" class="text-5xl md:text-6xl font-black text-gray-900 font-mono tracking-tight mb-2 select-all cursor-pointer hover:text-indigo-600 transition-colors" title="{{ __tool('date-to-unix', 'click_to_copy') }}"></div>
                        <p class="text-gray-500">{{ __tool('date-to-unix', 'form.result_subtitle') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <article class="max-w-4xl mx-auto prose prose-lg prose-indigo mb-20 px-4">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 font-display">{{ __tool('date-to-unix', 'content.hero_title') }}</h2>
            <p class="lead text-gray-600">{{ __tool('date-to-unix', 'content.hero_description') }}</p>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mt-12 mb-6">
                <span class="p-2 bg-purple-100 rounded-lg text-purple-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                {{ __tool('date-to-unix', 'content.mode_title') }}
            </h3>

            <div class="grid md:grid-cols-2 gap-8 not-prose mb-12">
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                    <h4 class="font-bold text-indigo-700 mb-2">{{ __tool('date-to-unix', 'content.local_title') }}</h4>
                    <p class="text-sm text-gray-600">{{ __tool('date-to-unix', 'content.local_desc') }}</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                    <h4 class="font-bold text-purple-700 mb-2">{{ __tool('date-to-unix', 'content.utc_title') }}</h4>
                    <p class="text-sm text-gray-600">{{ __tool('date-to-unix', 'content.utc_desc') }}</p>
                </div>
            </div>

            <h3 class="font-bold text-gray-900">{{ __tool('date-to-unix', 'content.snippets_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm font-mono not-prose my-6">
                <div class="bg-gray-900 text-gray-300 p-4 rounded-xl">
                    <div class="text-xs text-gray-500 mb-1">PHP</div>
                    strtotime('2023-10-05 14:30:00');
                </div>
                <div class="bg-gray-900 text-gray-300 p-4 rounded-xl">
                    <div class="text-xs text-gray-500 mb-1">JavaScript</div>
                    Math.floor(new Date('2023-10-05').getTime() / 1000)
                </div>
                <div class="bg-gray-900 text-gray-300 p-4 rounded-xl">
                    <div class="text-xs text-gray-500 mb-1">Python</div>
                    int(datetime(2023, 10, 5, 14, 30).timestamp())
                </div>
                 <div class="bg-gray-900 text-gray-300 p-4 rounded-xl">
                    <div class="text-xs text-gray-500 mb-1">MySQL</div>
                    SELECT UNIX_TIMESTAMP('2023-10-05 14:30:00');
                </div>
            </div>

             <h3 class="font-bold text-gray-900 mt-12 mb-6">{{ __tool('date-to-unix', 'content.use_cases_title') }}</h3>
             <ul class="space-y-3 text-gray-600">
                <li class="flex gap-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ __tool('date-to-unix', 'content.use_case_1') }}</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ __tool('date-to-unix', 'content.use_case_2') }}</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ __tool('date-to-unix', 'content.use_case_3') }}</span>
                </li>
             </ul>
        </div>
    </article>

    @push('scripts')
        <script>
            // Set default to now
            const now = new Date();
            document.getElementById('dateInput').valueAsDate = now;
            document.getElementById('timeInput').value = now.toTimeString().slice(0, 8);

            function convertToUnix() {
                const datePart = document.getElementById('dateInput').value;
                const timePart = document.getElementById('timeInput').value;
                const mode = document.querySelector('input[name="mode"]:checked').value;

                if(!datePart || !timePart) return;

                const fullString = `${datePart}T${timePart}`;
                let dateObj;

                if (mode === 'utc') {
                    dateObj = new Date(fullString + 'Z');
                } else {
                    dateObj = new Date(fullString);
                }

                if (isNaN(dateObj.getTime())) {
                    alert('Invalid Date');
                    return;
                }

                const unix = Math.floor(dateObj.getTime() / 1000);
                document.getElementById('unixResult').innerText = unix;
                document.getElementById('resultContainer').classList.remove('hidden');
            }
        </script>
    @endpush
@endsection