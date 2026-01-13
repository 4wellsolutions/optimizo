@extends('layouts.app')

@section('title', __tool('local-to-utc', 'meta.title'))
@section('meta_description', __tool('local-to-utc', 'meta.description'))

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- LIVE CLOCKS SECTION --}}
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-700">
                <div class="pb-8 md:pb-0 md:pr-8">
                    <div class="text-gray-400 text-sm font-bold tracking-widest uppercase mb-2">
                        {{ __tool('local-to-utc', 'live_clocks.local_title') }}</div>
                    <div id="clockLocal" class="text-4xl md:text-5xl font-mono font-bold tracking-tight text-emerald-400">
                        {{ __tool('local-to-utc', 'live_clocks.loading') }}</div>
                    <div id="dateLocal" class="text-gray-500 mt-2 font-medium">--</div>
                </div>
                <div class="pt-8 md:pt-0 md:pl-8">
                    <div class="text-gray-400 text-sm font-bold tracking-widest uppercase mb-2">
                        {{ __tool('local-to-utc', 'live_clocks.utc_title') }}</div>
                    <div id="clockUTC" class="text-4xl md:text-5xl font-mono font-bold tracking-tight text-blue-400">
                        {{ __tool('local-to-utc', 'live_clocks.loading') }}</div>
                    <div class="text-gray-500 mt-2 font-medium">{{ __tool('local-to-utc', 'live_clocks.utc_subtitle') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONVERTER SECTION --}}
    <div class="max-w-4xl mx-auto mb-16 px-4">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800">{{ __tool('local-to-utc', 'form.title') }}</h3>
                <p class="text-sm text-gray-500">{{ __tool('local-to-utc', 'form.subtitle') }}</p>
            </div>

            <div class="p-8">
                <div class="grid md:grid-cols-2 gap-6 items-end">
                    <div class="w-full">
                        <label
                            class="block text-sm font-bold text-gray-700 mb-2">{{ __tool('local-to-utc', 'form.label') }}</label>
                        <input type="datetime-local" id="localInput"
                            class="w-full text-lg rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 h-14">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button onclick="convertLocalToUtc()"
                        class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all hover:-translate-y-0.5">
                        {{ __tool('local-to-utc', 'form.button') }}
                    </button>
                </div>

                {{-- Result --}}
                <div id="resultBox"
                    class="hidden mt-8 p-6 bg-blue-50 rounded-2xl border border-blue-100 animate-fade-in-up">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="text-center md:text-left">
                            <div class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-1">
                                {{ __tool('local-to-utc', 'form.timezone_label') }} <span id="userTimezone"
                                    class="text-blue-800"></span></div>
                            <div id="displayLocal" class="text-lg text-blue-900 font-medium"></div>
                        </div>

                        <div class="hidden md:block text-blue-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>

                        <div class="text-center md:text-right">
                            <div class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">
                                {{ __tool('local-to-utc', 'form.result_title') }}</div>
                            <div id="displayUtc"
                                class="text-3xl font-mono font-black text-gray-900 tracking-tight select-all"></div>
                            <div class="text-sm text-gray-500">{{ __tool('local-to-utc', 'form.result_subtitle') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FEATURES GRID --}}
    <div class="max-w-7xl mx-auto px-4 mb-20">
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                <div class="p-3 bg-red-100 text-red-600 rounded-full mb-4"><svg class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg></div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('local-to-utc', 'features.instant_title') }}</h4>
                <p class="text-sm text-gray-600">{{ __tool('local-to-utc', 'features.instant_desc') }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                <div class="p-3 bg-indigo-100 text-indigo-600 rounded-full mb-4"><svg class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg></div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('local-to-utc', 'features.timezone_title') }}</h4>
                <p class="text-sm text-gray-600">{{ __tool('local-to-utc', 'features.timezone_desc') }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                <div class="p-3 bg-green-100 text-green-600 rounded-full mb-4"><svg class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg></div>
                <h4 class="font-bold text-gray-900 mb-2">{{ __tool('local-to-utc', 'features.accurate_title') }}</h4>
                <p class="text-sm text-gray-600">{{ __tool('local-to-utc', 'features.accurate_desc') }}</p>
            </div>
        </div>
    </div>

    {{-- SEO Content --}}
    <article class="max-w-4xl mx-auto prose prose-lg prose-blue px-4 mb-20">
        <h2 class="font-display text-gray-900">{{ __tool('local-to-utc', 'content.why_title') }}</h2>
        <p>{{ __tool('local-to-utc', 'content.why_desc') }}</p>

        <h3>{{ __tool('local-to-utc', 'content.utc_standard_title') }}</h3>
        <p>{{ __tool('local-to-utc', 'content.utc_standard_intro') }}</p>
        <ul>
            <li><strong>{{ __tool('local-to-utc', 'content.timezone_reason') }}</strong></li>
            <li><strong>{{ __tool('local-to-utc', 'content.dst_reason') }}</strong></li>
            <li><strong>{{ __tool('local-to-utc', 'content.political_reason') }}</strong></li>
        </ul>
        <p>{{ __tool('local-to-utc', 'content.utc_immunity') }}</p>

        <h3>{{ __tool('local-to-utc', 'content.applications_title') }}</h3>
        <div class="not-prose grid gap-4">
            <div class="bg-gray-50 p-4 rounded-lg">
                <strong class="block text-gray-900">{{ __tool('local-to-utc', 'content.aviation_title') }}</strong>
                <span class="text-gray-600">{{ __tool('local-to-utc', 'content.aviation_desc') }}</span>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <strong class="block text-gray-900">{{ __tool('local-to-utc', 'content.servers_title') }}</strong>
                <span class="text-gray-600">{{ __tool('local-to-utc', 'content.servers_desc') }}</span>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <strong class="block text-gray-900">{{ __tool('local-to-utc', 'content.events_title') }}</strong>
                <span class="text-gray-600">{{ __tool('local-to-utc', 'content.events_desc') }}</span>
            </div>
        </div>
    </article>

    @push('scripts')
        <script>
            // Clock Logic
            function updateClocks() {
                const now = new Date();

                // Local
                document.getElementById('clockLocal').innerText = now.toLocaleTimeString();
                document.getElementById('dateLocal').innerText = now.toLocaleDateString(undefined, { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

                // UTC
                document.getElementById('clockUTC').innerText = now.toLocaleTimeString('en-US', { timeZone: 'UTC', hour12: false });
            }
            setInterval(updateClocks, 1000);
            updateClocks();

            // Set default input to now
            const now = new Date();
            // Format datetime-local requires YYYY-MM-DDTHH:MM
            // We need to account for timezone offset to show "local" time in the input correctly
            const offsetMs = now.getTimezoneOffset() * 60000;
            const localISOTime = (new Date(now - offsetMs)).toISOString().slice(0, 16);
            document.getElementById('localInput').value = localISOTime;

            // Display Timezone Name
            document.getElementById('userTimezone').innerText = Intl.DateTimeFormat().resolvedOptions().timeZone;

            function convertLocalToUtc() {
                const inputVal = document.getElementById('localInput').value;
                if (!inputVal) return;

                const date = new Date(inputVal);

                // Display Local
                document.getElementById('displayLocal').innerText = date.toLocaleString();

                // Display UTC
                // Format: YYYY-MM-DD HH:MM:SS UTC
                const utcString = date.toISOString().replace('T', ' ').slice(0, 19) + ' UTC';
                document.getElementById('displayUtc').innerText = utcString;

                document.getElementById('resultBox').classList.remove('hidden');
            }
        </script>
    @endpush
@endsection