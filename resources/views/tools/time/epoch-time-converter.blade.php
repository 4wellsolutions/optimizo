@extends('layouts.app')

@section('title', __tool('epoch-time-converter', 'seo.title'))
@section('meta_description', __tool('epoch-time-converter', 'seo.description'))

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- EPOCH CONVERTER SECTION --}}
    <div class="max-w-7xl mx-auto mb-16 px-4">
        {{-- Current Epoch Display --}}
        <div class="text-center mb-12 animate-fade-in-down">
            <h2 class="text-2xl font-bold text-gray-600 mb-2 tracking-wide uppercase">
                {{ __tool('epoch-time-converter', 'current_epoch.title') }}
            </h2>
            <div id="currentEpoch"
                class="text-6xl md:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 tracking-tighter mb-2 font-mono tabular-nums leading-none drop-shadow-sm select-all cursor-pointer hover:scale-105 transition-transform duration-200"
                title="{{ __tool('epoch-time-converter', 'click_to_copy') }}">
                {{ time() }}
            </div>
            <p class="text-gray-500 font-medium">{{ __tool('epoch-time-converter', 'current_epoch.subtitle') }}</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
            {{-- Timestamp to Date --}}
            <div class="group relative bg-white rounded-3xl shadow-xl border border-indigo-50 p-8 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="absolute top-0 right-0 w-40 h-40 bg-indigo-100 rounded-full mix-blend-multiply opacity-50 blur-3xl -mr-20 -mt-20 group-hover:scale-150 transition-transform duration-700"></div>
                
                <h3 class="flex items-center gap-3 text-2xl font-black text-gray-800 mb-6 relative z-10">
                    <span class="p-3 bg-indigo-600 rounded-xl text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    {{ __tool('epoch-time-converter', 'timestamp_to_date.title') }}
                </h3>

                <div class="space-y-5 relative z-10">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">
                            {{ __tool('epoch-time-converter', 'timestamp_to_date.label') }}
                        </label>
                        <input type="text" id="tsInput"
                            class="w-full text-xl font-mono text-indigo-700 bg-indigo-50/50 border-2 border-indigo-100 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-indigo-200"
                            placeholder="{{ __tool('epoch-time-converter', 'timestamp_to_date.placeholder') }}" value="{{ time() }}">
                    </div>
                    
                    <button onclick="convertTs()"
                        class="w-full py-4 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-indigo-500/30 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group/btn">
                        <span>{{ __tool('epoch-time-converter', 'timestamp_to_date.button') }}</span>
                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </button>

                    <div id="tsResult" class="hidden space-y-3 pt-4 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ __tool('epoch-time-converter', 'timestamp_to_date.result_gmt') }}</span>
                            <span id="resGmt" class="font-mono text-gray-800 font-medium text-right sm:text-left"></span>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-3 rounded-lg hover:bg-gray-50 transition-colors bg-indigo-50/50">
                            <span class="text-xs font-bold text-indigo-500 uppercase tracking-wider">{{ __tool('epoch-time-converter', 'timestamp_to_date.result_local') }}</span>
                            <span id="resLocal" class="font-mono text-indigo-900 font-bold text-right sm:text-left"></span>
                        </div>
                         <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ __tool('epoch-time-converter', 'timestamp_to_date.result_relative') }}</span>
                            <span id="resRelative" class="text-gray-600 text-sm text-right sm:text-left"></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Date to Timestamp --}}
            <div class="group relative bg-white rounded-3xl shadow-xl border border-purple-50 p-8 overflow-hidden hover:shadow-2xl transition-all duration-300">
                 <div class="absolute top-0 right-0 w-40 h-40 bg-purple-100 rounded-full mix-blend-multiply opacity-50 blur-3xl -mr-20 -mt-20 group-hover:scale-150 transition-transform duration-700"></div>

                <h3 class="flex items-center gap-3 text-2xl font-black text-gray-800 mb-6 relative z-10">
                    <span class="p-3 bg-purple-600 rounded-xl text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </span>
                    {{ __tool('epoch-time-converter', 'date_to_timestamp.title') }}
                </h3>

                <div class="space-y-5 relative z-10">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">
                            {{ __tool('epoch-time-converter', 'date_to_timestamp.label') }}
                        </label>
                        <div class="grid grid-cols-3 gap-3 mb-3">
                            <input type="number" id="year" placeholder="YYYY" class="w-full text-center font-mono rounded-xl border-gray-200 focus:border-purple-500 focus:ring-purple-500 h-12">
                            <input type="number" id="month" placeholder="MM" class="w-full text-center font-mono rounded-xl border-gray-200 focus:border-purple-500 focus:ring-purple-500 h-12">
                            <input type="number" id="day" placeholder="DD" class="w-full text-center font-mono rounded-xl border-gray-200 focus:border-purple-500 focus:ring-purple-500 h-12">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <input type="number" id="hour" placeholder="HH" class="w-full text-center font-mono rounded-xl border-gray-200 focus:border-purple-500 focus:ring-purple-500 h-12">
                            <input type="number" id="minute" placeholder="MM" class="w-full text-center font-mono rounded-xl border-gray-200 focus:border-purple-500 focus:ring-purple-500 h-12">
                            <input type="number" id="second" placeholder="SS" class="w-full text-center font-mono rounded-xl border-gray-200 focus:border-purple-500 focus:ring-purple-500 h-12">
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="isGmt" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 w-5 h-5">
                        <label for="isGmt" class="text-sm font-medium text-gray-700 cursor-pointer select-none">{{ __tool('epoch-time-converter', 'date_to_timestamp.checkbox') }}</label>
                    </div>

                    <button onclick="convertDate()"
                        class="w-full py-4 px-6 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-purple-500/30 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group/btn">
                        <span>{{ __tool('epoch-time-converter', 'date_to_timestamp.button') }}</span>
                         <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                    </button>

                    <div id="dateResult" class="hidden pt-4 border-t border-gray-100 text-center animate-fade-in-up">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __tool('epoch-time-converter', 'date_to_timestamp.result_title') }}</div>
                        <div id="resEpoch" class="text-4xl font-mono font-black text-gray-800 tracking-tight cursor-pointer hover:text-purple-600 transition-colors" title="Click to Copy"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SEO Content --}}
    <article class="max-w-4xl mx-auto prose prose-lg prose-indigo mb-20 px-4">
        <div class="bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 font-display">{{ __tool('epoch-time-converter', 'content.hero_title') }}</h2>
            <p class="lead text-gray-600">{{ __tool('epoch-time-converter', 'content.hero_description') }}</p>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mt-12 mb-6">
                <span class="p-2 bg-indigo-100/50 rounded-lg text-indigo-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg></span>
                {{ __tool('epoch-time-converter', 'content.why_title') }}
            </h3>
            
            <div class="grid md:grid-cols-3 gap-6 not-prose mb-12">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-3 font-bold">1</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('epoch-time-converter', 'content.efficiency_title') }}</h4>
                    <p class="text-sm text-gray-600">{{ __tool('epoch-time-converter', 'content.efficiency_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                     <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mb-3 font-bold">2</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('epoch-time-converter', 'content.universal_title') }}</h4>
                    <p class="text-sm text-gray-600">{{ __tool('epoch-time-converter', 'content.universal_desc') }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                     <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 mb-3 font-bold">3</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('epoch-time-converter', 'content.math_title') }}</h4>
                    <p class="text-sm text-gray-600">{{ __tool('epoch-time-converter', 'content.math_desc') }}</p>
                </div>
            </div>

            <h3 class="font-bold text-gray-900">{{ __tool('epoch-time-converter', 'content.code_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm font-mono not-prose my-6">
                <div class="bg-gray-900 text-gray-300 p-4 rounded-xl flex justify-between">
                    <span class="text-pink-400">PHP</span>
                    <span>time()</span>
                </div>
                 <div class="bg-gray-900 text-gray-300 p-4 rounded-xl flex justify-between">
                    <span class="text-yellow-400">JavaScript</span>
                    <span>Math.floor(Date.now() / 1000)</span>
                </div>
                 <div class="bg-gray-900 text-gray-300 p-4 rounded-xl flex justify-between">
                    <span class="text-blue-400">Python</span>
                    <span>import time; time.time()</span>
                </div>
                 <div class="bg-gray-900 text-gray-300 p-4 rounded-xl flex justify-between">
                    <span class="text-green-400">Java</span>
                    <span>System.currentTimeMillis() / 1000</span>
                </div>
                <div class="bg-gray-900 text-gray-300 p-4 rounded-xl flex justify-between">
                    <span class="text-cyan-400">Go</span>
                    <span>time.Now().Unix()</span>
                </div>
                <div class="bg-gray-900 text-gray-300 p-4 rounded-xl flex justify-between">
                    <span class="text-red-400">Ruby</span>
                    <span>Time.now.to_i</span>
                </div>
            </div>

            <div class="bg-red-50 rounded-2xl p-6 border-l-4 border-red-500 my-8">
                <h4 class="text-red-800 font-bold flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    {{ __tool('epoch-time-converter', 'content.apocalypse_title') }}
                </h4>
                <p class="text-red-700 text-sm mb-0">
                    {{ __tool('epoch-time-converter', 'content.apocalypse_desc') }}
                </p>
            </div>

             <h3 class="font-bold text-gray-900">{{ __tool('epoch-time-converter', 'content.faq_title') }}</h3>
             <div class="space-y-4 not-prose">
                <details class="bg-white rounded-xl shadow-sm border border-gray-100 group">
                    <summary class="flex justify-between items-center p-4 cursor-pointer font-bold text-gray-800">
                        {{ __tool('epoch-time-converter', 'faq.q1') }}
                        <svg class="w-5 h-5 text-gray-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <div class="px-4 pb-4 text-gray-600 leading-relaxed">
                        {{ __tool('epoch-time-converter', 'faq.a1') }}
                    </div>
                </details>
                <details class="bg-white rounded-xl shadow-sm border border-gray-100 group">
                    <summary class="flex justify-between items-center p-4 cursor-pointer font-bold text-gray-800">
                        {{ __tool('epoch-time-converter', 'faq.q2') }}
                        <svg class="w-5 h-5 text-gray-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <div class="px-4 pb-4 text-gray-600 leading-relaxed">
                        {{ __tool('epoch-time-converter', 'faq.a2') }}
                    </div>
                </details>
             </div>
        </div>
    </article>

    @push('scripts')
        <script>
            // Live Update
            setInterval(() => {
                document.getElementById('currentEpoch').innerText = Math.floor(Date.now() / 1000);
            }, 1000);

            function convertTs() {
                const ts = document.getElementById('tsInput').value.trim();
                const resGmt = document.getElementById('resGmt');
                const resLocal = document.getElementById('resLocal');
                const resRelative = document.getElementById('resRelative');
                const resultDiv = document.getElementById('tsResult');

                if (!ts) return;

                const date = new Date(ts * 1000);
                
                resGmt.innerText = date.toUTCString();
                resLocal.innerText = date.toLocaleString();
                
                // Relative time logic (simple version)
                const diff = Math.floor(Date.now()/1000) - ts;
                let relText = "";
                if(diff < 0) relText = "In " + Math.abs(diff) + " seconds";
                else if(diff < 60) relText = diff + " seconds ago";
                else if(diff < 3600) relText = Math.floor(diff/60) + " minutes ago";
                else if(diff < 86400) relText = Math.floor(diff/3600) + " hours ago";
                else relText = Math.floor(diff/86400) + " days ago";
                
                resRelative.innerText = relText;

                resultDiv.classList.remove('hidden');
            }

            function convertDate() {
                const y = document.getElementById('year').value;
                const m = document.getElementById('month').value - 1; // 0-indexed
                const d = document.getElementById('day').value;
                const h = document.getElementById('hour').value || 0;
                const min = document.getElementById('minute').value || 0;
                const s = document.getElementById('second').value || 0;
                const isGmt = document.getElementById('isGmt').checked;

                let date;
                if(isGmt) {
                    date = new Date(Date.UTC(y, m, d, h, min, s));
                } else {
                    date = new Date(y, m, d, h, min, s);
                }

                const epoch = Math.floor(date.getTime() / 1000);
                document.getElementById('resEpoch').innerText = epoch;
                document.getElementById('dateResult').classList.remove('hidden');
            }

            // Init inputs with current date
            const now = new Date();
            document.getElementById('year').value = now.getFullYear();
            document.getElementById('month').value = now.getMonth() + 1;
            document.getElementById('day').value = now.getDate();
            document.getElementById('hour').value = now.getHours();
            document.getElementById('minute').value = now.getMinutes();
            document.getElementById('second').value = now.getSeconds();
        </script>
    @endpush
@endsection