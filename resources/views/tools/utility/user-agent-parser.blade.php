@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="user-agent-parser" />

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="mb-6">
                <label for="uaInput" class="block text-sm font-semibold text-gray-700 mb-2">User Agent String</label>
                <div class="flex gap-2">
                    <input type="text" id="uaInput"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 transition-all font-mono text-sm"
                        placeholder="Mozilla/5.0...">
                    <button onclick="parseUA()"
                        class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg">
                        Parse
                    </button>
                </div>
                <div class="mt-2 text-right">
                    <button onclick="useMyUA()"
                        class="text-xs text-green-600 hover:text-green-800 font-semibold underline">Use My User
                        Agent</button>
                </div>
            </div>

            <div id="results" class="hidden grid md:grid-cols-3 gap-6">
                <!-- Browser -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">Browser</h3>
                    <div class="text-3xl mb-2">🌐</div>
                    <div class="font-bold text-xl text-gray-900" id="res_browser">Chrome</div>
                    <div class="text-gray-600" id="res_browser_ver">Version 120.0</div>
                </div>

                <!-- OS -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">Operating System</h3>
                    <div class="text-3xl mb-2">💻</div>
                    <div class="font-bold text-xl text-gray-900" id="res_os">Windows</div>
                    <div class="text-gray-600" id="res_os_ver">10</div>
                </div>

                <!-- Device -->
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">Device</h3>
                    <div class="text-3xl mb-2">📱</div>
                    <div class="font-bold text-xl text-gray-900" id="res_device">Desktop</div>
                    <div class="text-gray-600" id="res_device_vendor">Unknown Vendor</div>
                </div>

                <!-- Raw Data -->
                <div class="md:col-span-3 bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-500 text-sm uppercase tracking-wide mb-3">Raw Engine info</h3>
                    <div class="font-mono text-sm text-gray-700 break-all" id="res_engine">Engine: Blink</div>
                </div>
            </div>
        </div>
    </div>

    <!-- We would typically use a library like ua-parser-js. 
             Since I cannot easily install npm packages here without build steps, 
             I will use a simple logical parser script or suggest the CDN link if available.
             For robust offline-like capability, I'll write a simple regex based parser. 
        -->
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
            document.getElementById('res_browser_ver').innerText = "v" + version;
            document.getElementById('res_os').innerText = os;
            document.getElementById('res_os_ver').innerText = osVer;
            document.getElementById('res_device').innerText = device;
            document.getElementById('res_engine').innerText = ua; // Just showing raw for now as engine

            document.getElementById('results').classList.remove('hidden');
        }

        // Auto load my ua
        window.onload = useMyUA;
    </script>
@endsection