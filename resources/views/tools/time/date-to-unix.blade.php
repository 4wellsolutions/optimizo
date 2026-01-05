@extends('layouts.app')

@section('title', 'Date to Unix Timestamp - Convert Date to Epoch')
@section('meta_description', 'Convert Date and Time to Unix Timestamp instantly. Supports local time and UTC input. Free online Date to Epoch converter.')

@section('content')
    <x-tool-hero :tool="$tool" title="Date to Unix Timestamp"
        description="Convert any date and time to a Unix Epoch timestamp." icon="clock" />

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 mb-8">
        <div class="max-w-xl mx-auto space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Date & Time</label>
                <input type="datetime-local" id="dateInput" step="1"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                <div class="mt-4 flex items-center gap-6 mb-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="tzOption" id="tzLocal" class="text-indigo-600 focus:ring-indigo-500"
                            checked onchange="convert()">
                        <span class="ml-2 text-gray-700">Local Time</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="tzOption" id="tzUtc" class="text-indigo-600 focus:ring-indigo-500"
                            onchange="convert()">
                        <span class="ml-2 text-gray-700">UTC Mode</span>
                    </label>
                </div>

                <button onclick="convert()"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-medium transition shadow-sm">Get
                    Timestamp</button>

                <div id="result" class="hidden text-center pt-6 border-t border-gray-100">
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wide mb-2">Unix Timestamp</p>
                    <div class="text-4xl font-mono font-bold text-indigo-600 select-all" id="outTs"></div>
                    <p class="text-gray-400 text-sm mt-2">seconds since historic epoch</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO Content -->
    <article class="prose prose-lg prose-indigo max-w-none">

        <!-- Hero Section -->
        <div class="relative bg-gray-900 rounded-3xl p-8 mb-12 text-white overflow-hidden shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black opacity-90"></div>
            <div class="relative z-10">
                <div class="flex items-center gap-3 text-gray-400 font-mono text-sm tracking-widest mb-4 uppercase">
                    <span>Encoding</span>
                    <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
                    <span>System Time</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 tracking-tight">Generate the Epoch</h2>
                <p class="text-lg text-gray-400 leading-relaxed max-w-2xl">
                    Create precise timestamps for databases, APIs, and logs. Whether you need the current second or a
                    historical date from 1970, we convert your human time into machine-readable integers instantly.
                </p>
            </div>
        </div>

        <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-8">
            <span class="p-2 bg-indigo-100 rounded-lg text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </span>
            Local vs. UTC Mode
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div
                class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-md transition-all relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 font-bold">
                            L</div>
                        <h4 class="text-xl font-bold text-gray-900">Local Time</h4>
                    </div>
                    <p class="text-gray-600">
                        Uses your computer's current timezone offset. If you select "12:00 PM" and you are in New York, we
                        calculate the timestamp for 12:00 PM EST (which is 17:00 UTC).
                    </p>
                </div>
            </div>

            <div
                class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-md transition-all relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-purple-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 font-bold">
                            U</div>
                        <h4 class="text-xl font-bold text-gray-900">UTC Mode</h4>
                    </div>
                    <p class="text-gray-600">
                        Treats your input strictly as Universal Time. If you select "12:00 PM", the result is the timestamp
                        for exactly 12:00:00 UTC, ignoring your physical location.
                    </p>
                </div>
            </div>
        </div>

        <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-6">
            <span class="p-2 bg-gray-100 rounded-lg text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
            </span>
            Quick Code Snippets
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-12">
            <!-- JS -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">JavaScript (Current)</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    Math.<span class="text-blue-400">floor</span>(Date.<span class="text-blue-400">now</span>() / 1000)
                </div>
            </div>

            <!-- Python -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Python (Current)</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    <span class="text-purple-400">import</span> time; <span class="text-blue-400">int</span>(time.<span
                        class="text-blue-400">time</span>())
                </div>
            </div>

            <!-- Go -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Golang</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    time.<span class="text-blue-400">Now</span>().<span class="text-yellow-400">Unix</span>()
                </div>
            </div>

            <!-- SQL -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">MySQL</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    <span class="text-purple-400">SELECT</span> UNIX_TIMESTAMP();
                </div>
            </div>
        </div>

        <h3>Common Use Cases</h3>
        <ul class="space-y-3">
            <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span><strong>API Authentication:</strong> Generating nonces or expiry times for HMAC signatures.</span>
            </li>
            <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span><strong>Database Indexing:</strong> Storing `created_at` as an integer is often faster for range
                    queries than DATETIME columns.</span>
            </li>
            <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span><strong>File Versioning:</strong> Appending timestamps to filenames (e.g., `backup_16788822.zip`)
                    guarantees unique chronological naming.</span>
            </li>
        </ul>
    </article>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.getElementById('dateInput').value = now.toISOString().slice(0, 19);
            });

            function convert() {
                const val = document.getElementById('dateInput').value;
                if (!val) return;

                const isUtc = document.getElementById('tzUtc').checked;
                let ts = 0;

                if (isUtc) {
                    const parts = val.split(/[^0-9]/);
                    // Date.UTC inputs: Y, M-1, D, H, m, s
                    ts = Math.floor(Date.UTC(parts[0], parts[1] - 1, parts[2], parts[3], parts[4], parts[5] || 0) / 1000);
                } else {
                    ts = Math.floor(new Date(val).getTime() / 1000);
                }

                document.getElementById('outTs').textContent = ts;
                document.getElementById('result').classList.remove('hidden');
            }
        </script>
    @endpush
@endsection