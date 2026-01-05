@extends('layouts.app')

@section('title', 'Unix Timestamp to Date - Convert Epoch to Human Time')
@section('meta_description', 'Convert Unix Timestamp to human-readable date formats (ISO, GMT, Local) instantly. Free online Unix to Date converter.')

@section('content')
    <x-tool-hero :tool="$tool" title="Unix Timestamp to Date"
        description="Convert numeric Unix timestamps to readable date and time formats." icon="calendar" />

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 mb-8">
        <div class="max-w-xl mx-auto space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Unix Timestamp</label>
                <div class="flex gap-2">
                    <input type="number" id="tsInput"
                        class="flex-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 font-mono text-lg"
                        placeholder="e.g. 1672531200">
                    <button onclick="useCurrent()"
                        class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 text-sm font-medium">Now</button>
                </div>
            </div>

            <button onclick="convert()"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-medium transition shadow-sm">Convert
                to Date</button>

            <div id="result" class="hidden space-y-3 pt-4 border-t border-gray-100">
                <div class="bg-indigo-50 p-4 rounded-lg">
                    <span class="block text-xs text-indigo-500 uppercase font-bold tracking-wide">GMT / UTC</span>
                    <span id="outGmt" class="block text-xl font-mono text-gray-900 mt-1 select-all"></span>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <span class="block text-xs text-gray-500 uppercase font-bold tracking-wide">Your Local Time</span>
                    <span id="outLocal" class="block text-xl font-mono text-gray-900 mt-1 select-all"></span>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <span class="block text-xs text-gray-500 uppercase font-bold tracking-wide">ISO 8601</span>
                    <span id="outIso" class="block text-xl font-mono text-gray-900 mt-1 select-all"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO Content -->
    <article class="prose prose-lg prose-indigo max-w-none">

        <x-tool-hero :tool="$tool" />
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 tracking-tight">Deciphering the Epoch</h2>
                <p class="text-lg text-indigo-100 leading-relaxed max-w-2xl">
                    Unix timestamps are the language of machines. This tool translates that raw numeric data into human
                    history, instantly converting seconds into readable moments.
                </p>
            </div>
            <!-- Decorative Background -->
            <div class="absolute -bottom-10 -right-10 text-9xl text-white opacity-5 select-none pointer-events-none">
                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-8">
            <span class="p-2 bg-indigo-100 rounded-lg text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </span>
            Output Formats Explained
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center gap-2 mb-3">
                    <span class="text-xs font-bold px-2 py-1 bg-green-100 text-green-700 rounded-md">Standard</span>
                    <h4 class="font-bold text-gray-900">RFC 2822 (GMT)</h4>
                </div>
                <p class="text-sm text-gray-600 font-mono bg-white p-2 rounded border border-gray-200">Mon, 25 Dec 2023
                    15:30:00 GMT</p>
                <p class="text-sm text-gray-500 mt-2">The internet standard for HTTP headers and emails.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center gap-2 mb-3">
                    <span class="text-xs font-bold px-2 py-1 bg-blue-100 text-blue-700 rounded-md">Database</span>
                    <h4 class="font-bold text-gray-900">ISO 8601</h4>
                </div>
                <p class="text-sm text-gray-600 font-mono bg-white p-2 rounded border border-gray-200">
                    2023-12-25T15:30:00.000Z</p>
                <p class="text-sm text-gray-500 mt-2">The international standard. Sortable and unambiguous.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <div class="flex items-center gap-2 mb-3">
                    <span class="text-xs font-bold px-2 py-1 bg-purple-100 text-purple-700 rounded-md">Human</span>
                    <h4 class="font-bold text-gray-900">Local Time</h4>
                </div>
                <p class="text-sm text-gray-600 font-mono bg-white p-2 rounded border border-gray-200">12/25/2023, 10:30:00
                    AM</p>
                <p class="text-sm text-gray-500 mt-2">Adjusted to your browser's specific timezone settings.</p>
            </div>
        </div>

        <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-6">
            <span class="p-2 bg-gray-100 rounded-lg text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
            </span>
            Reversing the Process (Date to Timestamp)
        </h3>

        <div class="space-y-4 mb-12">
            <!-- JavaScript -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">JavaScript</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    <span class="text-purple-400">const</span> date = <span class="text-purple-400">new</span> <span
                        class="text-yellow-400">Date</span>(<span class="text-green-400">1672531200</span> * <span
                        class="text-green-400">1000</span>); <span class="text-gray-500">// MS correct</span><br>
                    console.<span class="text-blue-400">log</span>(date.<span class="text-blue-400">toUTCString</span>());
                </div>
            </div>

            <!-- Python -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Python</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    <span class="text-purple-400">import</span> datetime<br>
                    <span class="text-blue-400">print</span>(datetime.datetime.<span
                        class="text-yellow-400">utcfromtimestamp</span>(<span class="text-green-400">1672531200</span>))
                </div>
            </div>

            <!-- PHP -->
            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg border border-gray-800">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">PHP</span>
                    <div class="flex gap-1.5">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 font-mono text-sm text-gray-300">
                    <span class="text-blue-400">echo</span> <span class="text-yellow-400">date</span>(<span
                        class="text-green-300">'Y-m-d H:i:s'</span>, <span class="text-green-400">1672531200</span>);
                </div>
            </div>
        </div>

        <div class="bg-indigo-50 border-l-4 border-indigo-500 p-6 rounded-r-xl">
            <h4 class="text-indigo-900 font-bold mb-2">Pro Tip: Seconds vs Milliseconds</h4>
            <p class="text-indigo-800 mb-0">
                If your timestamp has <strong>13 digits</strong> (e.g., 1672531200000), it includes milliseconds.
                Standard Unix timestamps have <strong>10 digits</strong> (seconds). Always multiply standard timestamps by
                1000 when feeding them into JavaScript's <code>Date()</code> constructor.
            </p>
        </div>

    </article>

    @push('scripts')
        <script>
            function useCurrent() {
                document.getElementById('tsInput').value = Math.floor(Date.now() / 1000);
                convert();
            }

            function convert() {
                const val = document.getElementById('tsInput').value;
                if (!val) return;

                const date = new Date(val * 1000);
                document.getElementById('outGmt').textContent = date.toUTCString();
                document.getElementById('outLocal').textContent = date.toLocaleString();
                document.getElementById('outIso').textContent = date.toISOString();
                document.getElementById('result').classList.remove('hidden');
            }
        </script>
    @endpush
@endsection