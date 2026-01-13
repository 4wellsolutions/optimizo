@extends('layouts.app')

@section('title', __tool('utc-to-local', 'meta.title'))
@section('meta_description', __tool('utc-to-local', 'meta.description'))

@section('content')
    <x-tool-hero :tool="$tool" />

    {{-- CONVERTER SECTION --}}
    <div class="max-w-4xl mx-auto mb-16 px-4">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800">{{ __tool('utc-to-local', 'form.result_title') }}</h3>
                <p class="text-sm text-gray-500">{{ __tool('utc-to-local', 'form.help_text') }}</p>
            </div>
            
            <div class="p-8">
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">{{ __tool('utc-to-local', 'form.label') }}</label>
                    <input type="datetime-local" id="utcInput" class="w-full text-lg rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 h-14 font-mono">
                    <p class="text-xs text-gray-400 mt-2 ml-1">{{ __tool('utc-to-local', 'form.example') }}</p>
                </div>

                <div class="flex justify-end">
                    <button onclick="convertUtcToLocal()" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg transition-all hover:-translate-y-0.5">
                        {{ __tool('utc-to-local', 'form.button') }}
                    </button>
                </div>

                {{-- Result --}}
                <div id="resultBox" class="hidden mt-8 p-8 bg-indigo-50 rounded-2xl border border-indigo-100 animate-fade-in-up text-center">
                    <div class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-2">{{ __tool('utc-to-local', 'form.result_title') }}</div>
                    <div id="displayLocal" class="text-3xl md:text-4xl font-black text-indigo-900 tracking-tight select-all"></div>
                    <div id="userTimezone" class="text-indigo-600 font-medium mt-2"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <article class="max-w-4xl mx-auto prose prose-lg prose-indigo px-4 mb-20">
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 font-display">{{ __tool('utc-to-local', 'content.hero_title') }}</h2>
            <p class="lead text-gray-600">{{ __tool('utc-to-local', 'content.hero_desc') }}</p>
            
            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mt-12 mb-6">
                <span class="p-2 bg-indigo-100 rounded-lg text-indigo-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></span>
                {{ __tool('utc-to-local', 'content.why_title') }}
            </h3>

            <div class="space-y-6 not-prose mb-12">
                <div class="flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold flex-shrink-0">1</div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">{{ __tool('utc-to-local', 'content.consistency_title') }}</h4>
                        <p class="text-gray-600">{{ __tool('utc-to-local', 'content.consistency_desc') }}</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                     <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold flex-shrink-0">2</div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">{{ __tool('utc-to-local', 'content.universality_title') }}</h4>
                        <p class="text-gray-600">{{ __tool('utc-to-local', 'content.universality_desc') }}</p>
                    </div>
                </div>
                 <div class="flex gap-4 items-start">
                     <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold flex-shrink-0">3</div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">{{ __tool('utc-to-local', 'content.simplicity_title') }}</h4>
                        <p class="text-gray-600">{{ __tool('utc-to-local', 'content.simplicity_desc') }}</p>
                    </div>
                </div>
            </div>

            <h3 class="font-bold text-gray-900">{{ __tool('utc-to-local', 'content.offsets_title') }}</h3>
            <p>{{ __tool('utc-to-local', 'content.offsets_intro') }}</p>
            <ul>
                <li>{{ __tool('utc-to-local', 'content.offset_minus') }}</li>
                <li>{{ __tool('utc-to-local', 'content.offset_plus') }}</li>
                <li>{{ __tool('utc-to-local', 'content.offset_half') }}</li>
            </ul>

            <div class="mt-8 p-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-r-xl">
                 <h4 class="text-yellow-800 font-bold m-0 mb-2">{{ __tool('utc-to-local', 'content.golden_rule_title') }}</h4>
                 <p class="text-yellow-700 m-0 text-sm">{{ __tool('utc-to-local', 'content.golden_rule_desc') }}</p>
            </div>
        </div>
    </article>

    @push('scripts')
        <script>
            // Init input with current UTC time
            const now = new Date();
            // To put "Current UTC" into datetime-local input, we format it as ISO string
            // datetime-local expects local time by default, so we manually build string YYYY-MM-DDTHH:mm
            const y = now.getUTCFullYear();
            const m = String(now.getUTCMonth() + 1).padStart(2, '0');
            const d = String(now.getUTCDate()).padStart(2, '0');
            const h = String(now.getUTCHours()).padStart(2, '0');
            const min = String(now.getUTCMinutes()).padStart(2, '0');
            
            document.getElementById('utcInput').value = `${y}-${m}-${d}T${h}:${min}`;

            // Display user timezone for context
            const tzName = Intl.DateTimeFormat().resolvedOptions().timeZone;

            function convertUtcToLocal() {
                const inputVal = document.getElementById('utcInput').value;
                if(!inputVal) return;

                // inputVal is "YYYY-MM-DDTHH:mm"
                // Treat this strictly as UTC
                const date = new Date(inputVal + 'Z');
                
                if(isNaN(date.getTime())) {
                    showError("Invalid Date");
                    return;
                }

                // Format to local string
                const localStr = date.toLocaleString(undefined, {
                    dateStyle: 'full',
                    timeStyle: 'medium'
                });

                document.getElementById('displayLocal').innerText = localStr;
                document.getElementById('userTimezone').innerText = `(${tzName})`;
                document.getElementById('resultBox').classList.remove('hidden');
            }
        </script>
    @endpush
@endsection