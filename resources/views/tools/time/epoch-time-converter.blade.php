@extends('layouts.app')

@section('title', 'Epoch Time Converter - Unix Timestamp Conversion')
@section('meta_description', 'Free online Epoch Time Converter. Convert Unix timestamps to human-readable dates and vice versa. View the current epoch time instantly.')

@section('content')
    <x-tool-hero :tool="$tool" title="Epoch Time Converter"
        description="Convert Unix timestamps to human-readable dates and vice versa." icon="server" />

    <!-- Current Epoch Hero -->
    <div
        class="relative overflow-hidden bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl p-10 text-center text-white mb-12 shadow-2xl">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        <div class="relative z-10">
            <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-100 mb-4">Current Unix Epoch Time</h2>
            <div class="text-5xl sm:text-7xl font-mono font-bold tracking-tight mb-4 tabular-nums" id="currentEpoch">
                Loading...</div>
            <div
                class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium text-indigo-50 border border-white/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Seconds since Jan 01 1970 (UTC)
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
        <!-- Timestamp to Date -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 flex flex-col h-full">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Timestamp to Date</h3>
            </div>

            <div class="space-y-6 flex-1">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Enter
                        Timestamp</label>
                    <div class="flex gap-3">
                        <input type="number" id="inputTimestamp"
                            class="flex-1 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 font-mono text-lg py-3 px-4 transition-all"
                            placeholder="1672531200">
                    </div>
                </div>

                <button onclick="convertTimestamp()"
                    class="w-full bg-indigo-600 text-white py-3.5 rounded-xl font-bold hover:bg-indigo-700 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    <span>Convert to Date</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </button>

                <div id="tsResult" class="hidden">
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-5 space-y-3">
                        <div
                            class="flex flex-col sm:flex-row justify-between sm:items-center gap-1 border-b border-gray-200 pb-3 last:border-0 last:pb-0">
                            <span class="text-xs font-bold text-gray-400 uppercase">GMT / UCT</span>
                            <span id="resGmt" class="font-mono font-medium text-gray-900 text-right"></span>
                        </div>
                        <div
                            class="flex flex-col sm:flex-row justify-between sm:items-center gap-1 border-b border-gray-200 pb-3 last:border-0 last:pb-0">
                            <span class="text-xs font-bold text-indigo-500 uppercase">Your Local Time</span>
                            <span id="resLocal" class="font-mono font-bold text-indigo-700 text-right"></span>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-1">
                            <span class="text-xs font-bold text-gray-400 uppercase">Relative</span>
                            <span id="resRelative" class="font-mono font-medium text-gray-600 text-right"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date to Timestamp -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 flex flex-col h-full">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Date to Timestamp</h3>
            </div>

            <div class="space-y-6 flex-1">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Select Date &
                        Time</label>
                    <input type="datetime-local" id="inputDate" step="1"
                        class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-500 focus:ring-purple-500 font-mono text-lg py-3 px-4 transition-all">

                    <label class="flex items-center gap-3 mt-4 cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" id="isGmt" class="peer sr-only">
                            <div
                                class="w-10 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600 group-hover:text-gray-900 transition-colors">Treat as
                            GMT/UTC time</span>
                    </label>
                </div>

                <button onclick="convertDate()"
                    class="w-full bg-purple-600 text-white py-3.5 rounded-xl font-bold hover:bg-purple-700 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    <span>Convert to Timestamp</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </button>

                <div id="dateResult" class="hidden">
                    <div
                        class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-xl border border-purple-100 p-6 text-center">
                        <span class="text-xs text-purple-600 uppercase font-bold tracking-widest mb-2 block">Unix
                            Timestamp</span>
                        <div class="text-3xl font-mono font-bold text-gray-900 tracking-tight select-all" id="resEpoch">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO Content -->
    <article class="prose prose-lg prose-indigo max-w-none">

            <!-- Hero Section -->
            <div class="relative bg-gray-900 rounded-3xl p-8 mb-12 text-white overflow-hidden shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black opacity-90"></div>
                 <!-- Matrix-like background effect -->
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#4f46e5 1px, transparent 1px); background-size: 20px 20px;"></div>

                <div class="relative z-10">
                    <div class="flex items-center gap-3 text-indigo-300 font-mono text-sm tracking-widest mb-4 uppercase">
                        <span>System Time</span>
                        <span class="w-1 h-1 bg-indigo-500 rounded-full"></span>
                        <span>The Beginning</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 tracking-tight">The Pulse of Digital Time</h2>
                    <p class="text-lg text-gray-300 leading-relaxed max-w-2xl">
                        Unix Time is the universal clock of the internet. It's a single, ticking number that connects every server, database, and smartphone on Earth to the same precise moment in history.
                    </p>
                </div>
            </div>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-8">
                <span class="p-2 bg-indigo-100 rounded-lg text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </span>
                Why Computers Count in Seconds
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Efficiency</h4>
                    <p class="text-gray-600 text-sm">Validating "October 5th" requires complex parsing rules. Validating "1696516200" is just checking an integer. Speed matters.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Universal</h4>
                    <p class="text-gray-600 text-sm">It's timezone agnostic. 1696516200 is the same distinct moment in time whether you are in Tokyo, London, or New York.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Math-Ready</h4>
                    <p class="text-gray-600 text-sm">Calculating duration is simple subtraction: <code>End - Start = Duration</code>. No need to worry about days in a month.</p>
                </div>
            </div>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-6">
                <span class="p-2 bg-gray-100 rounded-lg text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </span>
                Current Epoch in Every Language
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-12">
                <!-- JS -->
                <div class="group relative bg-gray-900 rounded-2xl p-5 border border-gray-800 hover:border-indigo-500 transition-colors">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-bold text-indigo-400 uppercase tracking-wider">JavaScript</span>
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    </div>
                    <code class="font-mono text-white text-sm">Math.floor(Date.now() / 1000)</code>
                </div>

                <!-- Python -->
                <div class="group relative bg-gray-900 rounded-2xl p-5 border border-gray-800 hover:border-yellow-500 transition-colors">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-bold text-yellow-400 uppercase tracking-wider">Python</span>
                        <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                    </div>
                    <code class="font-mono text-white text-sm">import time; int(time.time())</code>
                </div>

                <!-- PHP -->
                <div class="group relative bg-gray-900 rounded-2xl p-5 border border-gray-800 hover:border-purple-500 transition-colors">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-bold text-purple-400 uppercase tracking-wider">PHP</span>
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                    </div>
                    <code class="font-mono text-white text-sm">time();</code>
                </div>

                <!-- Swift -->
                <div class="group relative bg-gray-900 rounded-2xl p-5 border border-gray-800 hover:border-orange-500 transition-colors">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-bold text-orange-400 uppercase tracking-wider">Swift</span>
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                    </div>
                    <code class="font-mono text-white text-sm">Int(Date().timeIntervalSince1970)</code>
                </div>
            </div>

            <div class="bg-amber-50 rounded-2xl p-8 mb-12 border-l-4 border-amber-500">
                <h3 class="text-xl font-bold text-amber-900 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    The 2038 Apocalypse?
                </h3>
                <p class="text-amber-800 leading-relaxed">
                    On <strong>January 19, 2038 at 03:14:07 UTC</strong>, older 32-bit systems will run out of numbers to count seconds. They will overflow and think it is December 13, 1901. Most of the modern web (including 64-bit systems) is already safe, but many legacy embedded systems still need to be patched.
                </p>
            </div>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-6">
                <span class="p-2 bg-gray-100 rounded-lg text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
                Common Questions
            </h3>

            <div class="space-y-4">
                 <details class="group bg-white rounded-2xl border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-all">
                    <summary class="flex justify-between items-center font-bold text-gray-900">
                        Does Unix Time account for Leap Seconds?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-600 mt-4 leading-relaxed group-open:animate-fadeIn">
                        No. Unix time ignores leap seconds. It treats every day as exactly 86,400 seconds long. When a leap second occurs, the timestamp technically "repeats" a second or stalls, allowing the atomic clocks to sync up with Earth's rotation.
                    </div>
                </details>

                <details class="group bg-white rounded-2xl border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-all">
                    <summary class="flex justify-between items-center font-bold text-gray-900">
                         Why does it start from 1970?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-600 mt-4 leading-relaxed group-open:animate-fadeIn">
                        It was an arbitrary date chosen by Unix engineers (Ken Thompson and Dennis Ritchie) as a convenient starting point for the new operating system they were building at Bell Labs. It was appropriately the start of a new decade.
                    </div>
                </details>
            </div>
        </article>
        </div>

        @push('scripts')
            <script>
                // Update Current Epoch
                setInterval(() => {
                    document.getElementById('currentEpoch').textContent = Math.floor(Date.now() / 1000);
                }, 1000);
                document.getElementById('currentEpoch').textContent = Math.floor(Date.now() / 1000);

                // Pre-fill date
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.getElementById('inputDate').value = now.toISOString().slice(0, 19);

                // Convert Timestamp -> Date
                function convertTimestamp() {
                    const tsInput = document.getElementById('inputTimestamp').value;
                    if (!tsInput) return;

                    let ts = parseInt(tsInput);
                    // Auto-detect milliseconds (if > 100000000000, likely ms)
                    if (ts > 100000000000 && ts < 10000000000000) {
                        // It's likely ms, but user expects seconds for unix usually. 
                        // Standard unix is seconds. Let's assume input is seconds unless user specifies?
                        // Simple logic: Use as seconds.
                    }

                    const date = new Date(ts * 1000);

                    document.getElementById('resGmt').textContent = date.toUTCString();
                    document.getElementById('resLocal').textContent = date.toLocaleString();
                    document.getElementById('resRelative').textContent = getRelativeTime(ts);

                    document.getElementById('tsResult').classList.remove('hidden');
                }

                // Convert Date -> Timestamp
                function convertDate() {
                    const dateStr = document.getElementById('inputDate').value;
                    const isGmt = document.getElementById('isGmt').checked;

                    if (!dateStr) return;

                    const d = new Date(dateStr);
                    let epoch = 0;

                    if (isGmt) {
                        // If input is meant to be GMT, we need to treat the string as UTC
                        // dateStr is "YYYY-MM-DDTHH:MM:SS"
                        // new Date(dateStr) parses as Local
                        // We add the offset back to get the UTC value of that wall time
                        const offset = d.getTimezoneOffset() * 60000;
                        epoch = Math.floor((d.getTime() - offset) / 1000); // Wait, if I want 12:00 UTC, and I'm in +5. "12:00" parses as 12:00 local (07:00 UTC).
                        // I want it to be 12:00 UTC. So I need to add 5 hours to the timestamp?
                        // Actually easier: Date.UTC(...)
                        const parts = dateStr.split(/[^0-9]/);
                        // Date.UTC(year, monthIndex, day, hour, minute, second)
                        // Note: month is 0-indexed
                        epoch = Math.floor(Date.UTC(parts[0], parts[1] - 1, parts[2], parts[3], parts[4], parts[5] || 0) / 1000);
                    } else {
                        epoch = Math.floor(d.getTime() / 1000);
                    }

                    document.getElementById('resEpoch').textContent = epoch;
                    document.getElementById('dateResult').classList.remove('hidden');
                }

                function getRelativeTime(ts) {
                    const now = Math.floor(Date.now() / 1000);
                    const diff = now - ts;
                    const absDiff = Math.abs(diff);
                    const suffix = diff > 0 ? 'ago' : 'from now';

                    if (absDiff < 60) return `${absDiff} seconds ${suffix}`;
                    if (absDiff < 3600) return `${Math.floor(absDiff / 60)} minutes ${suffix}`;
                    if (absDiff < 86400) return `${Math.floor(absDiff / 3600)} hours ${suffix}`;
                    return `${Math.floor(absDiff / 86400)} days ${suffix}`;
                }
            </script>
        @endpush
@endsection