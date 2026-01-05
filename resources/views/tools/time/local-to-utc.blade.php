@extends('layouts.app')

@section('title', 'Local Time to UTC Converter')
@section('meta_description', 'Convert your local time to UTC/GMT instantly. Useful for scheduling international meetings and coordinating global events.')

@section('content')
    <x-tool-hero :tool="$tool" />

    <div class="max-w-4xl mx-auto mb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <!-- Input Section -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">Enter Local Time</label>
                <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                    <div class="relative flex-1 w-full">
                        <input type="datetime-local" id="localInput" step="1"
                            class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 text-lg py-3 px-4 shadow-sm transition-all">
                    </div>
                    <button onclick="convert()"
                        class="w-full sm:w-auto px-8 py-3.5 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 whitespace-nowrap flex items-center justify-center gap-2">
                        <span>Convert</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Your specific timezone: <span id="userTz" class="font-semibold text-gray-600"></span>
                </p>
            </div>

            <!-- Result Section -->
            <div
                class="relative overflow-hidden bg-gradient-to-br from-teal-50 to-emerald-50 rounded-2xl border border-teal-100 p-8 text-center">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-white opacity-40 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white text-xs font-bold text-teal-600 shadow-sm border border-teal-50 mb-4">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        UTC / GMT TIME
                    </span>
                    <div id="utcResult"
                        class="text-3xl sm:text-5xl font-black text-gray-900 tracking-tight leading-tight select-all">--:--
                    </div>
                </div>
            </div>
        </div>
    </div>


    <article class="prose max-w-none mt-12 border-t border-gray-100 pt-12">
        <h2>Standardize Your Time: Local to UTC Conversion</h2>
        <p>
            Converting your <strong>local time</strong> to <strong>UTC (Coordinated Universal Time)</strong> is essential
            for anyone working in a global context. Whether you are a developer examining server logs, a pilot filing a
            flight plan, or a manager scheduling a cross-border meeting, UTC is the common language of time.
        </p>

        <h3>Why Standardize on UTC?</h3>
        <p>
            Local times vary wildly due to:
        </p>
        <ul>
            <li><strong>Time Zones:</strong> There are over 24 different time zones globally.</li>
            <li><strong>Daylight Saving Time (DST):</strong> Clocks move forward and backward at different times of the year
                in different countries.</li>
            <li><strong>Political Changes:</strong> Governments can change their time zone rules with little notice.</li>
        </ul>
        <p>
            UTC is immune to these fluctuations. It provides a stable, constant reference point that never changes.
        </p>

        <h3>Real-World Applications</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mb-4 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Aviation & Maritime</h4>
                <p class="text-sm text-gray-600">Pilots and sailors use "Zulu Time" (UTC) to avoid confusion when crossing
                    multiple time zones during a single journey.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mb-4 text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                        </path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Servers & Logging</h4>
                <p class="text-sm text-gray-600">System logs are almost always recorded in UTC. This ensures that a log file
                    can be analyzed correctly regardless of the server's physical location.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-4 text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Event Scheduling</h4>
                <p class="text-sm text-gray-600">Virtual summits and product launches are announced in UTC (e.g., "Launches
                    at 18:00 UTC") to allow attendees worldwide to convert to their own local time.</p>
            </div>
        </div>

        <h3>How to Convert Local Time to UTC Manually</h3>
        <p>
            To convert manually, you need to know your current offset from UTC.
        </p>
        <ol class="list-decimal pl-5 space-y-2 text-gray-700">
            <li><strong>Find your offset:</strong> Determine if your timezone is ahead (+) or behind (-) Greenwich. (e.g.,
                New York is typically UTC-5).</li>
            <li><strong>Invert the sign:</strong> If you are UTC-5, you must <strong>add 5 hours</strong> to your local time
                to get UTC. If you are UTC+8 (Beijing), you must <strong>subtract 8 hours</strong>.</li>
            <li><strong>Adjust the date:</strong> If the calculation pushes you past midnight, remember to change the date
                as well!</li>
        </ol>
        <p class="mt-4 text-sm text-gray-500 italic">
            * Or simply use the tool above to handle all the math instantly.
        </p>
    </article>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('userTz').textContent = Intl.DateTimeFormat().resolvedOptions().timeZone;

                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.getElementById('localInput').value = now.toISOString().slice(0, 19);

                convert();
            });

            function convert() {
                const val = document.getElementById('localInput').value;
                if (!val) return;

                const date = new Date(val); // Parses as local
                document.getElementById('utcResult').textContent = date.toUTCString().replace('GMT', 'UTC');
            }
        </script>
    @endpush
@endsection