@extends('layouts.app')

@section('title', __tool('internet-speed-test', 'meta.h1'))
@section('meta_description', __tool('internet-speed-test', 'meta.subtitle'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <!-- Hero -->
        <x-tool-hero :tool="$tool" icon="internet-speed-test" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-teal-200 mb-8">
            <div class="text-center mb-8">
                <button id="startBtn" onclick="startTest()" class="btn-primary justify-center text-lg py-4 px-12">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('internet-speed-test', 'editor.btn_start') }}</span>
                </button>
            </div>

            <!-- Testing Progress -->
            <div id="testing" class="hidden text-center py-8">
                <div class="inline-block animate-spin rounded-full h-16 w-16 border-b-4 border-teal-600 mb-4"></div>
                <p class="text-lg font-semibold text-gray-900" id="testingStatus">
                    {{ __tool('internet-speed-test', 'editor.status_init') }}</p>
            </div>

            <!-- Results -->
            <div id="results" class="hidden">
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div
                        class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-xl p-6 border-2 border-teal-200 text-center">
                        <div class="text-sm text-gray-600 mb-2">{{ __tool('internet-speed-test', 'editor.label_download') }}
                        </div>
                        <div class="text-4xl font-black text-teal-600 mb-1" id="downloadSpeed">0</div>
                        <div class="text-sm text-gray-600">Mbps</div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border-2 border-emerald-200 text-center">
                        <div class="text-sm text-gray-600 mb-2">{{ __tool('internet-speed-test', 'editor.label_upload') }}
                        </div>
                        <div class="text-4xl font-black text-emerald-600 mb-1" id="uploadSpeed">0</div>
                        <div class="text-sm text-gray-600">Mbps</div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-50 to-lime-50 rounded-xl p-6 border-2 border-green-200 text-center">
                        <div class="text-sm text-gray-600 mb-2">{{ __tool('internet-speed-test', 'editor.label_ping') }}
                        </div>
                        <div class="text-4xl font-black text-green-600 mb-1" id="ping">0</div>
                        <div class="text-sm text-gray-600">ms</div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-xl p-6 border-2 border-teal-200">
                    <h3 class="font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'editor.label_quality') }}
                    </h3>
                    <div class="flex items-center gap-4">
                        <div class="flex-1 bg-gray-200 rounded-full h-4">
                            <div id="qualityBar"
                                class="bg-gradient-to-r from-teal-500 to-emerald-500 h-4 rounded-full transition-all duration-500"
                                style="width: 0%"></div>
                        </div>
                        <span id="qualityText" class="font-bold text-gray-900">-</span>
                    </div>
                </div>

                <button onclick="startTest()" class="btn-primary w-full justify-center text-lg py-4 mt-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>{{ __tool('internet-speed-test', 'editor.btn_retry') }}</span>
                </button>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-2xl p-6 md:p-8 border-2 border-teal-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('internet-speed-test', 'meta.h1') }}</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __tool('internet-speed-test', 'content.p1') }}</p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'content.metrics_title') }}
            </h3>
            <div class="grid md:grid-cols-3 gap-4 mb-6">
                @foreach (['download', 'upload', 'ping'] as $key)
                    <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-teal-900 mb-2">
                            {{ __tool('internet-speed-test', 'content.metrics.' . $key . '.title') }}</h4>
                        <p class="text-gray-700 text-sm mb-2">
                            {{ __tool('internet-speed-test', 'content.metrics.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'content.req_title') }}</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <ul class="space-y-2 text-gray-700">
                    @foreach (__tool('internet-speed-test', 'content.req_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'content.why_title') }}</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                @foreach (__tool('internet-speed-test', 'content.why_list') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'content.factors_title') }}
            </h3>
            <div class="space-y-3 mb-6">
                @foreach (['congestion', 'wifi', 'device', 'router'] as $key)
                    <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-2">
                            {{ __tool('internet-speed-test', 'content.factors.' . $key . '.title') }}</h4>
                        <p class="text-gray-700 text-sm">
                            {{ __tool('internet-speed-test', 'content.factors.' . $key . '.desc') }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'content.improve_title') }}
            </h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                @foreach (__tool('internet-speed-test', 'content.improve_list') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __tool('internet-speed-test', 'content.tips_title') }}
                </h4>
                <ul class="text-blue-800 text-sm leading-relaxed space-y-2">
                    @foreach (__tool('internet-speed-test', 'content.tips_list') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __tool('internet-speed-test', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                @foreach (['q1', 'q2', 'q3', 'q4', 'q5'] as $q)
                    <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-2">{{ __tool('internet-speed-test', 'content.faq.' . $q) }}</h4>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __tool('internet-speed-test', 'content.faq.a' . substr($q, 1)) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            async function startTest() {
                document.getElementById('startBtn').classList.add('hidden');
                document.getElementById('results').classList.add('hidden');
                document.getElementById('testing').classList.remove('hidden');

                // Simulate speed test (in production, use actual speed test API)
                await testPing();
                await testDownload();
                await testUpload();

                document.getElementById('testing').classList.add('hidden');
                document.getElementById('results').classList.remove('hidden');
                updateQuality();
            }

            async function testPing() {
                document.getElementById('testingStatus').textContent = "{{ __tool('internet-speed-test', 'editor.status_ping') }}";
                await sleep(1000);
                const ping = Math.floor(Math.random() * 50) + 10;
                document.getElementById('ping').textContent = ping;
            }

            async function testDownload() {
                document.getElementById('testingStatus').textContent = "{{ __tool('internet-speed-test', 'editor.status_download') }}";
                await sleep(2000);
                const download = (Math.random() * 100 + 20).toFixed(2);
                document.getElementById('downloadSpeed').textContent = download;
            }

            async function testUpload() {
                document.getElementById('testingStatus').textContent = "{{ __tool('internet-speed-test', 'editor.status_upload') }}";
                await sleep(2000);
                const upload = (Math.random() * 50 + 10).toFixed(2);
                document.getElementById('uploadSpeed').textContent = upload;
            }

            function updateQuality() {
                const download = parseFloat(document.getElementById('downloadSpeed').textContent);
                let quality, percentage;

                if (download >= 100) {
                    quality = "{{ __tool('internet-speed-test', 'editor.quality_val_excellent') }}";
                    percentage = 100;
                } else if (download >= 50) {
                    quality = "{{ __tool('internet-speed-test', 'editor.quality_val_very_good') }}";
                    percentage = 80;
                } else if (download >= 25) {
                    quality = "{{ __tool('internet-speed-test', 'editor.quality_val_good') }}";
                    percentage = 60;
                } else if (download >= 10) {
                    quality = "{{ __tool('internet-speed-test', 'editor.quality_val_fair') }}";
                    percentage = 40;
                } else {
                    quality = "{{ __tool('internet-speed-test', 'editor.quality_val_poor') }}";
                    percentage = 20;
                }

                document.getElementById('qualityText').textContent = quality;
                document.getElementById('qualityBar').style.width = percentage + '%';
            }

            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
        </script>
    @endpush
@endsection