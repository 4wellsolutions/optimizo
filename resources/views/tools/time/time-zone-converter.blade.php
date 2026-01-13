@extends('layouts.app')

@section('title', __tool('time-zone-converter', 'meta.title'))
@section('meta_description', __tool('time-zone-converter', 'meta.description'))

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- CONVERTER SECTION --}}
    <div class="max-w-7xl mx-auto mb-16 px-4">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div
                class="p-6 md:p-8 bg-gray-50 border-b border-gray-100 flex flex-col md:flex-row justify-between md:items-center gap-4">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        {{ __tool('time-zone-converter', 'content.meeting_planner_title') }}
                    </h2>
                </div>
            </div>

            <div class="p-6 md:p-8 grid lg:grid-cols-3 gap-8">

                {{-- Column 1: Source --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span
                            class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm">1</span>
                        <h3 class="font-bold text-gray-700">{{ __tool('time-zone-converter', 'form.source_label') }}</h3>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <label
                                class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __tool('time-zone-converter', 'form.date_time_label') }}</label>
                            <input type="datetime-local" id="sourceDateTime"
                                class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                onchange="calculateTargetTime()">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __tool('time-zone-converter', 'form.timezone_label') }}</label>
                            <select id="sourceZone"
                                class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                onchange="calculateTargetTime()">
                                {{-- Options populated by JS --}}
                            </select>
                        </div>
                    </div>
                    <div class="p-4 bg-indigo-50/50 rounded-xl border border-indigo-100 mt-4">
                        <div class="text-xs text-indigo-500 font-bold mb-1">{{ __tool('time-zone-converter', 'form.selected_time_label') }}</div>
                        <div id="sourceDisplay" class="text-lg font-mono font-bold text-indigo-900">
                            {{ __tool('time-zone-converter', 'form.default_time') }}</div>
                    </div>
                </div>

                {{-- Arrow --}}
                <div class="hidden lg:flex items-center justify-center text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>

                {{-- Column 2: Target --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span
                            class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-sm">2</span>
                        <h3 class="font-bold text-gray-700">{{ __tool('time-zone-converter', 'form.target_label') }}</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="opacity-50 pointer-events-none grayscale" aria-hidden="true">
                            <label
                                class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __tool('time-zone-converter', 'form.date_time_label') }}</label>
                            <input type="text" value="{{ __tool('time-zone-converter', 'form.auto_calculated') }}" disabled
                                class="w-full rounded-xl border-gray-200 bg-gray-50">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ __tool('time-zone-converter', 'form.timezone_label') }}</label>
                            <select id="targetZone"
                                class="w-full rounded-xl border-gray-200 focus:border-pink-500 focus:ring-pink-500"
                                onchange="calculateTargetTime()">
                                {{-- Options populated by JS --}}
                            </select>
                        </div>
                    </div>

                    <div class="p-4 bg-pink-50 rounded-xl border border-pink-100 mt-4 shadow-sm">
                        <div class="text-xs text-pink-500 font-bold mb-1">
                            {{ __tool('time-zone-converter', 'form.result_label') }}</div>
                        <div id="targetDisplay" class="text-2xl font-mono font-black text-pink-600">
                            {{ __tool('time-zone-converter', 'form.default_time') }}</div>
                        <div class="text-xs text-pink-400 mt-1">{{ __tool('time-zone-converter', 'form.result_subtitle') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <article class="max-w-4xl mx-auto prose prose-lg prose-indigo px-4 mb-20">
        <h2 class="font-display">{{ __tool('time-zone-converter', 'content.hero_title') }}</h2>
        <p>{{ __tool('time-zone-converter', 'content.hero_desc') }}</p>

        <h3>{{ __tool('time-zone-converter', 'content.precision_title') }}</h3>
        <div class="grid md:grid-cols-3 gap-4 not-prose">
            <div class="card bg-white p-4 rounded-xl border shadow-sm">
                <strong
                    class="block mb-2 text-indigo-700">{{ __tool('time-zone-converter', 'content.business_title') }}</strong>
                <span class="text-sm text-gray-600">{{ __tool('time-zone-converter', 'content.business_desc') }}</span>
            </div>
            <div class="card bg-white p-4 rounded-xl border shadow-sm">
                <strong
                    class="block mb-2 text-indigo-700">{{ __tool('time-zone-converter', 'content.travel_title') }}</strong>
                <span class="text-sm text-gray-600">{{ __tool('time-zone-converter', 'content.travel_desc') }}</span>
            </div>
            <div class="card bg-white p-4 rounded-xl border shadow-sm">
                <strong
                    class="block mb-2 text-indigo-700">{{ __tool('time-zone-converter', 'content.events_title') }}</strong>
                <span class="text-sm text-gray-600">{{ __tool('time-zone-converter', 'content.events_desc') }}</span>
            </div>
        </div>

        <h3>{{ __tool('time-zone-converter', 'content.tips_title') }}</h3>
        <ul>
            <li><strong>{{ __tool('time-zone-converter', 'content.tip1_title') }}</strong>:
                {{ __tool('time-zone-converter', 'content.tip1_desc') }}</li>
            <li><strong>{{ __tool('time-zone-converter', 'content.tip2_title') }}</strong>:
                {{ __tool('time-zone-converter', 'content.tip2_desc') }}</li>
            <li><strong>{{ __tool('time-zone-converter', 'content.tip3_title') }}</strong>:
                {{ __tool('time-zone-converter', 'content.tip3_desc') }}</li>
        </ul>

        <h3>{{ __tool('time-zone-converter', 'content.faq_title') }}</h3>
        <details>
            <summary>{{ __tool('time-zone-converter', 'content.faq_q1') }}</summary>
            <p>{{ __tool('time-zone-converter', 'content.faq_a1') }}</p>
        </details>
        <details>
            <summary>{{ __tool('time-zone-converter', 'content.faq_q2') }}</summary>
            <p>{{ __tool('time-zone-converter', 'content.faq_a2') }}</p>
        </details>
    </article>

    @push('scripts')
        {{-- Use Luxon for robust Timezone handling --}}
        <script src="https://cdn.jsdelivr.net/npm/luxon@3.4.3/build/global/luxon.min.js"></script>
        <script>
            const DateTime = luxon.DateTime;

            // Common Timezones List
            const timezones = [
                "UTC", "GMT", "Europe/London", "Europe/Paris", "Europe/Berlin", "Europe/Moscow",
                "Africa/Cairo", "Africa/Johannesburg", "Asia/Dubai", "Asia/Karachi", "Asia/Kolkata",
                "Asia/Bangkok", "Asia/Singapore", "Asia/Shanghai", "Asia/Tokyo", "Australia/Sydney",
                "Pacific/Auckland", "Pacific/Honolulu", "America/Anchorage", "America/Los_Angeles",
                "America/Denver", "America/Chicago", "America/New_York", "America/Toronto", "America/Sao_Paulo"
            ];

            // Populate Selects
            const sourceSel = document.getElementById('sourceZone');
            const targetSel = document.getElementById('targetZone');

            // Add all Intl supported zones if you want a complete list, but let's stick to curated + user's local
            const userZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            if (!timezones.includes(userZone)) timezones.push(userZone);
            timezones.sort();

            timezones.forEach(tz => {
                const opt1 = new Option(tz, tz);
                const opt2 = new Option(tz, tz);
                sourceSel.add(opt1);
                targetSel.add(opt2);
            });

            // Set Defaults
            sourceSel.value = userZone;
            targetSel.value = "UTC"; // Default target

            // Init Source Date Time to now
            const now = DateTime.now().setZone(userZone);
            document.getElementById('sourceDateTime').value = now.toFormat("yyyy-MM-dd'T'HH:mm");

            function calculateTargetTime() {
                const sourceTimeStr = document.getElementById('sourceDateTime').value;
                const sourceZone = document.getElementById('sourceZone').value;
                const targetZone = document.getElementById('targetZone').value;

                if (!sourceTimeStr) return;

                // Create DateTime object from source input (interpreting it as being in sourceZone)
                // Note: HTML datetime-local input gives plain string "YYYY-MM-DDTHH:mm"
                const dt = DateTime.fromISO(sourceTimeStr, { zone: sourceZone });

                if (!dt.isValid) {
                    document.getElementById('targetDisplay').innerText = "Invalid Time";
                    return;
                }

                // Display source nicely
                document.getElementById('sourceDisplay').innerText = dt.toFormat("ccc, dd MMM HH:mm");

                // Convert to target zone
                const targetDt = dt.setZone(targetZone);

                // Display target nicely
                document.getElementById('targetDisplay').innerText = targetDt.toFormat("ccc, dd MMM HH:mm");
            }

            // Run once
            calculateTargetTime();
        </script>
    @endpush
@endsection