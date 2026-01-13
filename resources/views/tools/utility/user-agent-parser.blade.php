@extends('layouts.app')

@section('title', __tool('user-agent-parser', 'meta.title'))
@section('meta_description', __tool('user-agent-parser', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="user-agent-parser" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="mb-6">
                <label for="uaInput" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('user-agent-parser', 'editor.label_input', 'User Agent String') }}</label>
                <div class="flex gap-2">
                    <input type="text" id="uaInput"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 transition-all font-mono text-sm"
                        placeholder="{{ __tool('user-agent-parser', 'editor.ph_input', 'Mozilla/5.0...') }}">
                    <button onclick="parseUA()"
                        class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg">
                        {{ __tool('user-agent-parser', 'editor.btn_parse', 'Parse') }}
                    </button>
                </div>
                <div class="mt-2 text-right">
                    <button onclick="useMyUA()"
                        class="text-xs text-green-600 hover:text-green-800 font-semibold underline">{{ __tool('user-agent-parser', 'editor.btn_use_my_ua', 'Use My User Agent') }}</button>
                </div>
            </div>

            <div id="results" class="hidden grid md:grid-cols-3 gap-6">
                <!-- Browser -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">{{ __tool('user-agent-parser', 'editor.label_browser', 'Browser') }}</h3>
                    <div class="text-3xl mb-2">🌐</div>
                    <div class="font-bold text-xl text-gray-900" id="res_browser">Chrome</div>
                    <div class="text-gray-600" id="res_browser_ver">Version 120.0</div>
                </div>

                <!-- OS -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">{{ __tool('user-agent-parser', 'editor.label_os', 'Operating System') }}</h3>
                    <div class="text-3xl mb-2">💻</div>
                    <div class="font-bold text-xl text-gray-900" id="res_os">Windows</div>
                    <div class="text-gray-600" id="res_os_ver">10</div>
                </div>

                <!-- Device -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">{{ __tool('user-agent-parser', 'editor.label_device', 'Device') }}</h3>
                    <div class="text-3xl mb-2">📱</div>
                    <div class="font-bold text-xl text-gray-900" id="res_device">Desktop</div>
                    <div class="text-gray-600" id="res_device_vendor">Unknown Vendor</div>
                </div>

                <!-- Raw Data -->
                <div class="md:col-span-3 bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">{{ __tool('user-agent-parser', 'editor.label_raw', 'Raw Engine info') }}</h3>
                    <div class="font-mono text-sm text-gray-700 break-all" id="res_engine">Engine: Blink</div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('user-agent-parser', 'meta.h1', 'Free User Agent Parser') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('user-agent-parser', 'meta.subtitle', 'Identify browser, OS, and device from User Agent string') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('user-agent-parser', 'content.p1', 'Our free User Agent Parser instantly decodes user agent strings to identify the browser, operating system, device type, and engine version. Useful for developers debugging browser-specific issues or analyzing traffic sources.') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ {{ __tool('user-agent-parser', 'content.features_title', 'Features') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('user-agent-parser', 'content.features.instant.title', 'Instant Parsing') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('user-agent-parser', 'content.features.instant.desc', 'Decode user agents in milliseconds') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-emerald-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('user-agent-parser', 'content.features.detailed.title', 'Detailed Info') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('user-agent-parser', 'content.features.detailed.desc', 'Extracts Browser, OS, Device, and Engine') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-lime-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('user-agent-parser', 'content.features.auto.title', 'Auto-Detect') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('user-agent-parser', 'content.features.auto.desc', 'One-click to parse your own current user agent') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('user-agent-parser', 'content.features.free.title', '100% Free') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('user-agent-parser', 'content.features.free.desc', 'Unlimited uses, no cost') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 {{ __tool('user-agent-parser', 'content.uses_title', 'Common Use Cases') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🐛 {{ __tool('user-agent-parser', 'content.uses.debugging.title', 'Debugging') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.uses.debugging.desc', 'Identify detailed browser versions for troubleshooting') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 {{ __tool('user-agent-parser', 'content.uses.analytics.title', 'Analytics') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.uses.analytics.desc', 'Understand what devices and OSs your users are using') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">💻 {{ __tool('user-agent-parser', 'content.uses.dev.title', 'Development') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.uses.dev.desc', 'Verify user agent strings during testing') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔒 {{ __tool('user-agent-parser', 'content.uses.security.title', 'Security') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.uses.security.desc', 'Analyze suspicious user agent strings in logs') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 {{ __tool('user-agent-parser', 'content.how_to_title', 'How to Use') }}</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-green-600 text-lg">1.</span>
                        <span><strong>{{ __tool('user-agent-parser', 'content.how_to.step1.title', 'Enter String') }}:</strong> {{ __tool('user-agent-parser', 'content.how_to.step1.desc', 'Paste a User Agent string or click "Use My User Agent"') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-green-600 text-lg">2.</span>
                        <span><strong>{{ __tool('user-agent-parser', 'content.how_to.step2.title', 'Parse') }}:</strong> {{ __tool('user-agent-parser', 'content.how_to.step2.desc', 'Click "Parse" to decode the string') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-green-600 text-lg">3.</span>
                        <span><strong>{{ __tool('user-agent-parser', 'content.how_to.step3.title', 'View Results') }}:</strong> {{ __tool('user-agent-parser', 'content.how_to.step3.desc', 'See the broken-down details for Browser, OS, and Device') }}</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ {{ __tool('user-agent-parser', 'content.faq_title', 'Frequently Asked Questions') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('user-agent-parser', 'content.faq.q1', 'What is a User Agent?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.faq.a1', 'A User Agent is a string of text sent by your web browser to every website you visit, identifying the browser, version, operating system, and device type.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('user-agent-parser', 'content.faq.q2', 'Is this parser accurate?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.faq.a2', 'It uses standard pattern matching to identify common real-world user agents. However, user agent strings can be spoofed or modified.') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('user-agent-parser', 'content.faq.q3', 'Is my data private?') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('user-agent-parser', 'content.faq.a3', 'Yes, parsing happens locally in your browser (or client-side logic). We do not store your user agent data.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function useMyUA() {
            document.getElementById('uaInput').value = navigator.userAgent;
            parseUA();
        }

        function parseUA() {
            const ua = document.getElementById('uaInput').value;
            if (!ua) return;

            // Simple parsing logic (Polyfill-ish)
            let browser = "Unknown";
            let version = "Unknown";
            let os = "Unknown";
            let osVer = "";
            let device = "Desktop";

            // OS Detection
            if (ua.indexOf("Win") !== -1) os = "Windows";
            else if (ua.indexOf("Mac") !== -1) os = "MacOS";
            else if (ua.indexOf("Linux") !== -1) os = "Linux";
            else if (ua.indexOf("Android") !== -1) { os = "Android"; device = "Mobile"; }
            else if (ua.indexOf("iPhone") !== -1) { os = "iOS"; device = "Mobile"; }

            // Browser Detection
            if (ua.indexOf("Firefox") !== -1) {
                browser = "Firefox";
                version = ua.match(/Firefox\/([0-9.]+)/)?.[1] || "";
            } else if (ua.indexOf("Chrome") !== -1 && ua.indexOf("Edg") === -1 && ua.indexOf("OPR") === -1) {
                browser = "Chrome";
                version = ua.match(/Chrome\/([0-9.]+)/)?.[1] || "";
            } else if (ua.indexOf("Safari") !== -1 && ua.indexOf("Chrome") === -1) {
                browser = "Safari";
                version = ua.match(/Version\/([0-9.]+)/)?.[1] || "";
            } else if (ua.indexOf("Edg") !== -1) {
                browser = "Edge";
                version = ua.match(/Edg\/([0-9.]+)/)?.[1] || "";
            }

            document.getElementById('res_browser').innerText = browser;
            document.getElementById('res_browser_ver').innerText = version ? "v" + version : "";
            document.getElementById('res_os').innerText = os;
            document.getElementById('res_os_ver').innerText = osVer;
            document.getElementById('res_device').innerText = device;
            document.getElementById('res_engine').innerText = ua; // Just showing raw for now as engine

            document.getElementById('results').classList.remove('hidden');
        }

        // Auto load my ua
        window.onload = useMyUA;
    </script>
    @endpush
@endsection