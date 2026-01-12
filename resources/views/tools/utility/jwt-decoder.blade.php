@extends('layouts.app')

@section('title', __tool('jwt-decoder', 'meta.h1'))
@section('meta_description', __tool('jwt-decoder', 'meta.subtitle'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" />
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    {{ __tool('jwt-decoder', 'meta.h1') }}
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    {{ __tool('jwt-decoder', 'meta.subtitle') }}
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <!-- Input -->
            <div class="mb-6">
                <label for="jwtInput" class="form-label text-base">{{ __tool('jwt-decoder', 'editor.label_input') }}</label>
                <textarea id="jwtInput" class="form-input font-mono text-sm min-h-[250px]"
                    placeholder="{{ __tool('jwt-decoder', 'editor.ph_input') }}"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="decodeJWT()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('jwt-decoder', 'editor.btn_decode') }}</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>{{ __tool('jwt-decoder', 'editor.btn_clear') }}</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __tool('jwt-decoder', 'editor.btn_example') }}</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Decoded Output -->
            <div id="decodedOutput" class="hidden space-y-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Decoded Token</h2>

                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border-2 border-blue-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Header (Algorithm & Type)
                    </h3>
                    <pre id="headerOutput"
                        class="bg-white p-4 rounded-lg font-mono text-sm overflow-x-auto border border-blue-200"></pre>
                </div>

                <!-- Payload -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border-2 border-green-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        {{ __tool('jwt-decoder', 'editor.label_payload') }}
                    </h3>
                    <pre id="payloadOutput"
                        class="bg-white p-4 rounded-lg font-mono text-sm overflow-x-auto border border-green-200"></pre>
                </div>

                <!-- Signature -->
                <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        {{ __tool('jwt-decoder', 'editor.label_signature') }}
                    </h3>
                    <pre id="signatureOutput"
                        class="bg-white p-4 rounded-lg font-mono text-sm overflow-x-auto border border-orange-200"></pre>
                    <p class="text-sm text-gray-600 mt-3">{{ __tool('jwt-decoder', 'editor.note_signature') }}</p>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-3">{{ __tool('jwt-decoder', 'content.hero_title') }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ __tool('jwt-decoder', 'content.hero_subtitle') }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                {{ __tool('jwt-decoder', 'content.p1') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('jwt-decoder', 'content.what_title') }}</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                {{ __tool('jwt-decoder', 'content.what_desc') }}
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('jwt-decoder', 'content.features_title') }}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('jwt-decoder', 'content.features.instant.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('jwt-decoder', 'content.features.instant.desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('jwt-decoder', 'content.features.structured.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('jwt-decoder', 'content.features.structured.desc') }}</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">{{ __tool('jwt-decoder', 'content.features.privacy.title') }}</h4>
                    <p class="text-gray-600 text-sm">{{ __tool('jwt-decoder', 'content.features.privacy.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('jwt-decoder', 'content.uses_title') }}</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('jwt-decoder', 'content.uses.debug.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.uses.debug.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('jwt-decoder', 'content.uses.validate.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.uses.validate.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('jwt-decoder', 'content.uses.learn.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.uses.learn.desc') }}</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">{{ __tool('jwt-decoder', 'content.uses.dev.title') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.uses.dev.desc') }}</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ __tool('jwt-decoder', 'content.faq_title') }}</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('jwt-decoder', 'content.faq.q1') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('jwt-decoder', 'content.faq.q2') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">{{ __tool('jwt-decoder', 'content.faq.q3') }}</h4>
                    <p class="text-gray-700 leading-relaxed">{{ __tool('jwt-decoder', 'content.faq.a3') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function decodeJWT() {
            const input = document.getElementById('jwtInput').value.trim();

            if (!input) {
                showStatus("{{ __tool('jwt-decoder', 'js.error_empty') }}", 'error');
                return;
            }

            try {
                const parts = input.split('.');

                if (parts.length !== 3) {
                    showStatus("{{ __tool('jwt-decoder', 'js.error_invalid_format') }}", 'error');
                    return;
                }

                // Decode header
                const header = JSON.parse(atob(parts[0]));
                document.getElementById('headerOutput').textContent = JSON.stringify(header, null, 2);

                // Decode payload
                const payload = JSON.parse(atob(parts[1]));
                document.getElementById('payloadOutput').textContent = JSON.stringify(payload, null, 2);

                // Show signature (can't decode without secret)
                document.getElementById('signatureOutput').textContent = parts[2];

                // Show output
                document.getElementById('decodedOutput').classList.remove('hidden');
                showStatus("{{ __tool('jwt-decoder', 'js.success_decode') }}", 'success');
            } catch (error) {
                showStatus("{{ __tool('jwt-decoder', 'js.error_decode') }}" + error.message, 'error');
            }
        }

        function clearAll() {
            document.getElementById('jwtInput').value = '';
            document.getElementById('decodedOutput').classList.add('hidden');
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function loadExample() {
            document.getElementById('jwtInput').value = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyLCJleHAiOjE3MzU2ODk2MDB9.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';
            decodeJWT();
        }

        function showStatus(message, type) {
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = message;
            statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800', 'border-green-300', 'border-red-300');

            if (type === 'success') {
                statusMessage.classList.add('bg-green-100', 'text-green-800', 'border-2', 'border-green-300');
            } else {
                statusMessage.classList.add('bg-red-100', 'text-red-800', 'border-2', 'border-red-300');
            }
        }
    </script>
    @endpush
@endsection