@extends('layouts.app')

@section('title', 'Local Time to UTC Converter')
@section('meta_description', 'Convert your local time to UTC/GMT instantly. Useful for scheduling international meetings and coordinating global events.')

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- Live Time Display Section --}}
    <div class="max-w-7xl mx-auto mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Local Time Card --}}
            <div
                class="group relative overflow-hidden bg-gradient-to-br from-violet-600 via-purple-600 to-fuchsia-600 rounded-3xl p-8 shadow-2xl transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl">
                <div class="absolute inset-0 bg-white opacity-10"></div>
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-1000">
                </div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white/80 text-sm font-semibold">Your Local Time</h3>
                                <p id="localTzName" class="text-white text-xs font-medium opacity-90"></p>
                            </div>
                        </div>
                        <div class="pulse-dot w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                    </div>

                    <div id="liveLocal"
                        class="text-5xl md:text-6xl font-black text-white mb-2 tracking-tight font-mono tabular-nums">
                        --:--:--
                    </div>
                    <div id="liveLocalDate" class="text-white/70 text-lg font-medium">
                        Loading...
                    </div>
                </div>
            </div>

            {{-- UTC Time Card --}}
            <div
                class="group relative overflow-hidden bg-gradient-to-br from-cyan-500 via-blue-600 to-indigo-700 rounded-3xl p-8 shadow-2xl transform transition-all duration-500 hover:scale-[1.02] hover:shadow-3xl">
                <div class="absolute inset-0 bg-white opacity-10"></div>
                <div
                    class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl -ml-16 -mb-16 group-hover:scale-150 transition-transform duration-1000">
                </div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white/80 text-sm font-semibold">UTC / GMT</h3>
                                <p class="text-white text-xs font-medium opacity-90">Coordinated Universal Time</p>
                            </div>
                        </div>
                        <div class="pulse-dot w-3 h-3 bg-amber-300 rounded-full animate-pulse"></div>
                    </div>

                    <div id="liveUTC"
                        class="text-5xl md:text-6xl font-black text-white mb-2 tracking-tight font-mono tabular-nums">
                        --:--:--
                    </div>
                    <div id="liveUTCDate" class="text-white/70 text-lg font-medium">
                        Loading...
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Converter Tool --}}
    <div class="max-w-4xl mx-auto mb-16">
        <div class="relative overflow-hidden bg-white rounded-3xl shadow-2xl border border-gray-100 p-8">
            {{-- Decorative elements --}}
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full blur-3xl opacity-30 -mr-48 -mt-48">
            </div>
            <div
                class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-blue-100 to-cyan-100 rounded-full blur-3xl opacity-30 -ml-48 -mb-48">
            </div>

            <div class="relative z-10">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-black text-gray-900 mb-2">Convert Any Time</h2>
                    <p class="text-gray-600">Enter a local time to see its UTC equivalent</p>
                </div>

                <div class="space-y-6">
                    {{-- Input Section --}}
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100/50 rounded-2xl p-6 border border-gray-200">
                        <label
                            class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Enter Local Time
                        </label>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <input type="datetime-local" id="localInput" step="1"
                                class="flex-1 rounded-xl border-gray-300 bg-white focus:bg-white focus:border-violet-500 focus:ring-violet-500 text-lg py-4 px-5 shadow-sm transition-all font-mono">
                            <button onclick="convertCustom()"
                                class="group relative overflow-hidden px-8 py-4 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2">
                                <span class="relative z-10">Convert</span>
                                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-purple-600 to-fuchsia-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-3 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Timezone: <span id="userTz" class="font-semibold text-gray-700"></span>
                        </p>
                    </div>

                    {{-- Result Section --}}
                    <div id="resultCard" class="hidden opacity-0 transform translate-y-4 transition-all duration-500">
                        <div
                            class="relative overflow-hidden bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 rounded-2xl p-8 shadow-xl">
                            <div class="absolute inset-0 bg-black opacity-5"></div>
                            <div
                                class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-2xl -mr-20 -mt-20">
                            </div>

                            <div class="relative z-10 text-center">
                                <div
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-xs font-bold text-white shadow-lg mb-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    CONVERTED TO UTC
                                </div>
                                <div id="utcResult"
                                    class="text-4xl md:text-5xl font-black text-white tracking-tight mb-2 select-all font-mono">
                                    --:--
                                </div>
                                <p class="text-white/80 text-sm font-medium">Coordinated Universal Time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Info Section --}}
    <div class="max-w-6xl mx-auto mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $features = [
                    [
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        'title' => 'Instant Conversion',
                        'description' => 'Real-time conversion with live clock synchronization',
                        'gradient' => 'from-amber-500 to-orange-600'
                    ],
                    [
                        'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                        'title' => 'Timezone Agnostic',
                        'description' => 'Works with any timezone, DST changes handled automatically',
                        'gradient' => 'from-violet-500 to-purple-600'
                    ],
                    [
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'title' => 'Accurate & Reliable',
                        'description' => 'Precision timing using browser native Date APIs',
                        'gradient' => 'from-emerald-500 to-teal-600'
                    ]
                ];
            @endphp

            @foreach($features as $feature)
                <div
                    class="group relative overflow-hidden bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-br {{ $feature['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity">
                    </div>

                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-gradient-to-br {{ $feature['gradient'] }} rounded-xl flex items-center justify-center mb-4 shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $feature['icon'] }}"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $feature['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- SEO Content --}}
    <article class="prose prose-lg max-w-none border-t border-gray-200 pt-16 mt-16">
        <h2 class="flex items-center gap-3">
            <span
                class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </span>
            Why Convert Local Time to UTC?
        </h2>
        <p>
            Converting your <strong>local time</strong> to <strong>UTC (Coordinated Universal Time)</strong> is essential
            for anyone working in a global context. Whether you are a developer examining server logs, a pilot filing a
            flight plan, or a manager scheduling a cross-border meeting, UTC is the common language of time.
        </p>

        <h3>UTC: The Universal Time Standard</h3>
        <p>Local times vary wildly due to:</p>
        <ul>
            <li><strong>Time Zones:</strong> Over 24 different time zones globally</li>
            <li><strong>Daylight Saving Time (DST):</strong> Clocks shift at different times in different countries</li>
            <li><strong>Political Changes:</strong> Governments can change timezone rules with little notice</li>
        </ul>
        <p>UTC is immune to these fluctuations, providing a stable, constant reference point.</p>

        <h3>Real-World Applications</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 not-prose my-8">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 p-6 rounded-2xl border border-blue-200">
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 text-base mb-2">Aviation & Maritime</h4>
                <p class="text-sm text-gray-700">Pilots and sailors use "Zulu Time" (UTC) to avoid confusion when crossing
                    multiple time zones.</p>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-purple-100/50 p-6 rounded-2xl border border-purple-200">
                <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                        </path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 text-base mb-2">Servers & Logging</h4>
                <p class="text-sm text-gray-700">System logs are recorded in UTC ensuring accurate analysis regardless of
                    server location.</p>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-green-100/50 p-6 rounded-2xl border border-green-200">
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 text-base mb-2">Event Scheduling</h4>
                <p class="text-sm text-gray-700">Virtual summits announced in UTC allow attendees worldwide to convert to
                    local time.</p>
            </div>
        </div>
    </article>

    @push('scripts')
        <script>
            // Update live clocks
            function updateClocks() {
                const now = new Date();

                // Local time
                const localTime = now.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
                const localDate = now.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                document.getElementById('liveLocal').textContent = localTime;
                document.getElementById('liveLocalDate').textContent = localDate;

                // UTC time
                const utcTime = now.toUTCString().split(' ')[4]; // Gets HH:MM:SS
                const utcDate = now.toUTCString().split(',')[1].trim().split(' ').slice(0, 3).join(' ');
                document.getElementById('liveUTC').textContent = utcTime;
                document.getElementById('liveUTCDate').textContent = utcDate;
            }

            // Initialize
            document.addEventListener('DOMContentLoaded', () => {
                // Set timezone
                const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
                document.getElementById('userTz').textContent = tz;
                document.getElementById('localTzName').textContent = tz;

                // Pre-fill input
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.getElementById('localInput').value = now.toISOString().slice(0, 19);

                // Start live clocks
                updateClocks();
                setInterval(updateClocks, 1000);
            });

            // Convert custom time
            function convertCustom() {
                const val = document.getElementById('localInput').value;
                if (!val) return;

                const date = new Date(val);
                document.getElementById('utcResult').textContent = date.toUTCString().replace('GMT', 'UTC');

                // Show result with animation
                const card = document.getElementById('resultCard');
                card.classList.remove('hidden');
                setTimeout(() => {
                    card.classList.remove('opacity-0', 'translate-y-4');
                }, 10);
            }
        </script>

        <style>
            @keyframes pulse-dot {

                0%,
                100% {
                    opacity: 1;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.5;
                    transform: scale(1.2);
                }
            }

            .pulse-dot {
                animation: pulse-dot 2s ease-in-out infinite;
            }
        </style>
    @endpush
@endsection