@extends('layouts.app')

@section('title', 'UTC to Local Time Converter')
@section('meta_description', 'Convert UTC/GMT time to your local timezone instantly. Simple, accurate, and free online UTC converter.')

@section('content')
    <x-tool-hero :tool="$tool" />

    <div class="max-w-4xl mx-auto mb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <!-- Input Section -->
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">Enter UTC Time</label>
                <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                    <div class="relative flex-1 w-full">
                        <input type="datetime-local" id="utcInput" step="1"
                            class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 text-lg py-3 px-4 shadow-sm transition-all">
                    </div>
                    <button onclick="convert()"
                        class="w-full sm:w-auto px-8 py-3.5 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 whitespace-nowrap flex items-center justify-center gap-2">
                        <span>Convert</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Input time as it appears in Universal Coordinated Time
                </p>
            </div>

            <!-- Result Section -->
            <div class="relative overflow-hidden bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl border border-indigo-100 p-8 text-center">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-white opacity-40 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white text-xs font-bold text-indigo-600 shadow-sm border border-indigo-50 mb-4">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        YOUR LOCAL TIME
                    </span>
                    <div id="localResult" class="text-3xl sm:text-5xl font-black text-gray-900 tracking-tight leading-tight select-all">--:--</div>
                    <div id="timeZoneName" class="text-base text-indigo-400 font-medium mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO Content -->
    <article class="prose prose-lg prose-indigo max-w-none">

        <x-tool-hero :tool="$tool" />
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 tracking-tight">From Zero to Everywhere</h2>
                <p class="text-lg text-blue-100 leading-relaxed max-w-2xl">
                    Coordinated Universal Time (UTC) is the world's heartbeat—a single, atomic reference point. This tool
                    translates that global standard into your personal moment.
                </p>
            </div>
            <!-- Decorative Globe Background -->
            <div class="absolute top-0 right-0 p-8 opacity-10 select-none pointer-events-none">
                <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z">
                    </path>
                </svg>
            </div>
        </div>

        <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-8">
            <span class="p-2 bg-blue-100 rounded-lg text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </span>
            Why Servers Love UTC
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-2">Consistency</h4>
                <p class="text-gray-600 text-sm">UTC never changes. No Daylight Saving jumps, no political timezone shifts.
                    It is an unbroken linear scale.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 21v-8a2 2 0 012-2h14a2 2 0 012 2v8M3 21h18M5 21v-8a2 2 0 00-2-2" />
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-2">Universality</h4>
                <p class="text-gray-600 text-sm">Logs from Tokyo and logs from New York can be compared side-by-side without
                    doing mental math.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-2">Simplicity</h4>
                <p class="text-gray-600 text-sm">Systems process logic in UTC and only convert to "human time" at the very
                    last moment—on the user's screen.</p>
            </div>
        </div>

        <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-6">
            <span class="p-2 bg-gray-100 rounded-lg text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-.553-.894L15 4m0 13V4m0 0L9 7">
                    </path>
                </svg>
            </span>
            How to Read Offsets
        </h3>

        <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-12 shadow-sm">
            <p class="mb-4 text-gray-600">Your specific timezone is defined as a plus or minus integer from UTC.</p>
            <div class="space-y-3">
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-2 py-1 rounded">UTC-05:00</span>
                    <span class="text-gray-700">Five hours <strong>behind</strong> UTC (e.g., New York, Toronto).</span>
                </div>
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <span class="font-mono font-bold text-green-600 bg-green-50 px-2 py-1 rounded">UTC+01:00</span>
                    <span class="text-gray-700">One hour <strong>ahead</strong> of UTC (e.g., London, Berlin).</span>
                </div>
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <span class="font-mono font-bold text-purple-600 bg-purple-50 px-2 py-1 rounded">UTC+05:30</span>
                    <span class="text-gray-700">Five and a half hours <strong>ahead</strong> of UTC (e.g., Mumbai, New
                        Delhi).</span>
                </div>
            </div>
        </div>

        <div class="bg-indigo-50 rounded-2xl p-8 mb-12 border-l-4 border-indigo-500">
            <h3 class="text-xl font-bold text-indigo-900 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                The "Golden Rule" for Developers
            </h3>
            <p class="text-indigo-800 leading-relaxed">
                Always store time in your database in UTC (e.g., <code>2023-10-27 14:00:00Z</code>). Never store local time.
                Only convert the timestamp to the user's specific local timezone at the moment you render it on the screen.
            </p>
        </div>
    </article>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Default to now UTC
                const now = new Date();
                const utcISO = now.toISOString().slice(0, 19); // This IS current UTC time in ISO format
                // But valid datetime-local input expects "YYYY-MM-DDTHH:MM:SS"
                // If we put ISO string into input, it displays.
                document.getElementById('utcInput').value = utcISO;

                document.getElementById('timeZoneName').textContent = Intl.DateTimeFormat().resolvedOptions().timeZone;
                convert();
            });

            function convert() {
                const val = document.getElementById('utcInput').value;
                if (!val) return;

                // value is "2023-01-01T12:00:00"
                // We want to verify this is UTC.
                const parts = val.split(/[^0-9]/);
                const utcDate = new Date(Date.UTC(parts[0], parts[1] - 1, parts[2], parts[3], parts[4], parts[5] || 0));

                document.getElementById('localResult').textContent = utcDate.toLocaleString();
            }
        </script>
    @endpush
@endsection