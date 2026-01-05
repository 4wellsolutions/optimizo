@extends('layouts.app')

@section('title', 'Time Zone Converter - Convert Time Between Zones')
@section('meta_description', 'Free online Time Zone Converter. Easily convert time between different time zones (PST, EST, GMT, UTC, etc.) with this accurate and simple tool.')

@section('content')
    <x-tool-hero :tool="$tool" title="Time Zone Converter"
        description="Convert time instantly between any global time zones." icon="clock" />

    <div class="max-w-5xl mx-auto mb-16">
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden relative">
            <!-- Decorative Top Bar -->
            <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12">

                <!-- Left Panel: Source -->
                <div
                    class="lg:col-span-5 p-8 bg-gray-50 border-b lg:border-b-0 lg:border-r border-gray-100 flex flex-col justify-center relative">
                    <label class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Source Location
                    </label>

                    <div class="space-y-6">
                        <div class="relative group">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Date & Time</label>
                            <input type="datetime-local" id="sourceTime"
                                class="block w-full rounded-xl border-gray-200 bg-white focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm transition-all text-lg font-mono font-medium text-gray-800"
                                onchange="convertTime()">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Time Zone</label>
                            <select id="sourceZone"
                                class="block w-full rounded-xl border-gray-200 bg-white focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 shadow-sm transition-all text-gray-800"
                                onchange="convertTime()">
                                <!-- Populated by JS -->
                            </select>
                        </div>
                    </div>

                    <!-- Swap Button Mobile -->
                    <button onclick="swapZones()"
                        class="lg:hidden absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-10 h-10 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-indigo-600 z-10 hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                        </svg>
                    </button>
                </div>

                <!-- Middle Swap (Desktop) -->
                <div class="hidden lg:flex lg:col-span-1 items-center justify-center relative z-10">
                    <div class="absolute inset-y-0 left-1/2 w-px bg-gray-100"></div>
                    <button onclick="swapZones()"
                        class="w-12 h-12 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-indigo-600 hover:text-indigo-700 hover:scale-110 hover:shadow-xl transition-all duration-200 z-20 group">
                        <svg class="w-6 h-6 group-hover:rotate-180 transition-transform duration-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </button>
                </div>

                <!-- Right Panel: Target -->
                <div class="lg:col-span-6 p-8 bg-white flex flex-col justify-center">
                    <label class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> Target Location
                    </label>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Time Zone</label>
                            <select id="targetZone"
                                class="block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-500 focus:ring-purple-500 py-3 px-4 transition-all text-gray-800"
                                onchange="convertTime()">
                                <!-- Populated by JS -->
                            </select>
                        </div>

                        <div class="pt-4">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Converted
                                Time</label>
                            <div class="relative group mt-1">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl opacity-20 group-hover:opacity-30 transition blur">
                                </div>
                                <div
                                    class="relative bg-white rounded-xl border border-indigo-100 p-6 flex flex-col items-center text-center">
                                    <div id="resultTime"
                                        class="text-3xl sm:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-purple-700 tracking-tight font-mono">
                                        --:--:--
                                    </div>
                                    <div class="text-xs text-gray-400 mt-2 font-medium">Auto-updates as you change inputs
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SEO Content -->
    <article class="prose prose-lg prose-indigo max-w-none">

            <x-tool-hero :tool="$tool" />
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 tracking-tight">Mastering Global Time</h2>
                    <p class="text-lg text-blue-100 leading-relaxed max-w-2xl">
                        In a connected world, time is relative. Whether you're scheduling a cross-border meeting, catching a flight, or launching a global product, precision is non-negotiable.
                    </p>
                </div>
                <div class="absolute -bottom-12 -right-12 text-blue-500 opacity-10">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path></svg>
                </div>
            </div>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-8">
                <span class="p-2 bg-indigo-100 rounded-lg text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
                Why Precision Matters
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Business Efficiency</h4>
                    <p class="text-gray-600 text-sm">Missed meetings cost money. Ensuring your team in Tokyo and New York sync up perfectly is critical for efficiency.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Travel Planning</h4>
                    <p class="text-gray-600 text-sm">Jet lag is hard enough. Knowing exactly when you land helps you adjust your sleep schedule before you even board.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Live Events</h4>
                    <p class="text-gray-600 text-sm">Don't miss the livestream. Whether it's a product drop or a market opening, accurate conversion puts you in the front row.</p>
                </div>
            </div>

            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-6">
                <span class="p-2 bg-gray-100 rounded-lg text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                </span>
                Major Time Zones
            </h3>

            <div class="space-y-3 mb-12">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 hover:bg-white hover:shadow-md transition-all">
                    <div>
                        <span class="font-bold text-indigo-700">EST / EDT</span>
                        <span class="text-gray-600 ml-2 text-sm">(Eastern Time)</span>
                    </div>
                    <div class="flex items-center gap-3 mt-2 sm:mt-0">
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold rounded uppercase">UTC-5</span>
                        <span class="text-xs text-gray-400">New York, Toronto</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 hover:bg-white hover:shadow-md transition-all">
                    <div>
                        <span class="font-bold text-gray-800">CET / CEST</span>
                        <span class="text-gray-600 ml-2 text-sm">(Central European)</span>
                    </div>
                    <div class="flex items-center gap-3 mt-2 sm:mt-0">
                        <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs font-bold rounded uppercase">UTC+1</span>
                        <span class="text-xs text-gray-400">Paris, Berlin, Rome</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 hover:bg-white hover:shadow-md transition-all">
                    <div>
                        <span class="font-bold text-gray-800">IST</span>
                        <span class="text-gray-600 ml-2 text-sm">(Indian Standard)</span>
                    </div>
                    <div class="flex items-center gap-3 mt-2 sm:mt-0">
                        <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs font-bold rounded uppercase">UTC+5:30</span>
                        <span class="text-xs text-gray-400">Mumbai, New Delhi</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 hover:bg-white hover:shadow-md transition-all">
                     <div>
                        <span class="font-bold text-gray-800">JST</span>
                        <span class="text-gray-600 ml-2 text-sm">(Japan Standard)</span>
                    </div>
                    <div class="flex items-center gap-3 mt-2 sm:mt-0">
                        <span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs font-bold rounded uppercase">UTC+9</span>
                         <span class="text-xs text-gray-400">Tokyo, Osaka</span>
                    </div>
                </div>
            </div>

            <div class="bg-indigo-50 rounded-3xl p-8 mb-12">
                <h3 class="text-xl font-bold text-indigo-900 mb-6">Expert Scheduling Tips</h3>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-indigo-200 rounded-full flex items-center justify-center text-indigo-700 font-bold text-sm">1</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Use 24-Hour Format</h4>
                            <p class="text-indigo-800/80 text-sm leading-relaxed">Avoid the "AM/PM" trap. 14:00 is universally understood; 2:00 is ambiguous.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-indigo-200 rounded-full flex items-center justify-center text-indigo-700 font-bold text-sm">2</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Specify the Zone</h4>
                            <p class="text-indigo-800/80 text-sm leading-relaxed">Don't just say "Let's meet at 3." Say "3:00 PM EST." Clarity prevents missed calls.</p>
                        </div>
                    </div>
                     <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-indigo-200 rounded-full flex items-center justify-center text-indigo-700 font-bold text-sm">3</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Respect DST</h4>
                            <p class="text-indigo-800/80 text-sm leading-relaxed">Daylight Saving Time rules differ by country. Our calculator handles this, but your mental math might not.</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h3>
            <div class="space-y-4">
                 <details class="group bg-white rounded-2xl border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-all">
                    <summary class="flex justify-between items-center font-bold text-gray-900">
                        Does this tool handle Daylight Saving Time?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-600 mt-4 leading-relaxed group-open:animate-fadeIn">
                        Yes. We use the official IANA Time Zone Database, which automatically calculates the correct time based on the specific date you select, accounting for all historical and future DST transitions.
                    </div>
                </details>

                <details class="group bg-white rounded-2xl border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-all">
                    <summary class="flex justify-between items-center font-bold text-gray-900">
                         UTC vs. GMT: What's the difference?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="text-gray-600 mt-4 leading-relaxed group-open:animate-fadeIn">
                        Technically, UTC (Coordinated Universal Time) is an atomic time standard, while GMT (Greenwich Mean Time) is a time zone based on the earth's rotation. Practically speaking, for general usage, they are the same time.
                    </div>
                </details>
            </div>
        </article>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/luxon@3.4.4/build/global/luxon.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const timeZones = Intl.supportedValuesOf('timeZone');
                    const sourceSelect = document.getElementById('sourceZone');
                    const targetSelect = document.getElementById('targetZone');
                    const userZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

                    // Populate Selects
                    timeZones.forEach(zone => {
                        sourceSelect.add(new Option(zone, zone, zone === userZone, zone === userZone));
                        targetSelect.add(new Option(zone, zone, zone === 'UTC', zone === 'UTC'));
                    });

                    // Set default time
                    const now = new Date();
                    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                    document.getElementById('sourceTime').value = now.toISOString().slice(0, 16);

                    convertTime();
                });

                function convertTime() {
                    const dateStr = document.getElementById('sourceTime').value;
                    const sourceZone = document.getElementById('sourceZone').value;
                    const targetZone = document.getElementById('targetZone').value;

                    if (!dateStr) return;

                    try {
                        // Use Luxon for robust timezone handling
                        const { DateTime } = luxon;
                        // Parse input as if it is in the source zone
                        const sourceDT = DateTime.fromISO(dateStr, { zone: sourceZone });

                        if (!sourceDT.isValid) {
                            document.getElementById('resultTime').textContent = "Invalid Date";
                            return;
                        }

                        const targetDT = sourceDT.setZone(targetZone);

                        // Output
                        document.getElementById('resultTime').textContent = targetDT.toLocaleString(DateTime.DATETIME_FULL_WITH_SECONDS);
                    } catch (e) {
                        console.error(e);
                        document.getElementById('resultTime').textContent = "Error converting time";
                    }
                }

                function swapZones() {
                    const s = document.getElementById('sourceZone');
                    const t = document.getElementById('targetZone');
                    const temp = s.value;
                    s.value = t.value;
                    t.value = temp;
                    convertTime();
                }
            </script>
        @endpush
@endsection