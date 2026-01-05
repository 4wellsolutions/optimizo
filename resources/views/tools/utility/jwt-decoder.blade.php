@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" />
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    JWT Decoder
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Decode and inspect JSON Web Tokens (JWT) - View header, payload, and signature!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <!-- Input -->
            <div class="mb-6">
                <label for="jwtInput" class="form-label text-base">Enter JWT Token</label>
                <textarea id="jwtInput" class="form-input font-mono text-sm min-h-[250px]"
                    placeholder="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="decodeJWT()" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Decode JWT</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Example</span>
                </button>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <!-- Decoded Output -->
            <div id="decodedOutput" class="hidden space-y-6">
                <x-tool-hero :tool="$tool" />

                <!-- Payload -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border-2 border-green-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Payload (Claims)
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
                        Signature
                    </h3>
                    <pre id="signatureOutput"
                        class="bg-white p-4 rounded-lg font-mono text-sm overflow-x-auto border border-orange-200"></pre>
                    <p class="text-sm text-gray-600 mt-3">⚠️ Note: Signature verification requires the secret key</p>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free JWT Decoder Online</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Decode and inspect JSON Web Tokens instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free JWT Decoder tool allows you to decode and inspect JSON Web Tokens (JWT) to view their header,
                payload, and signature components. Perfect for debugging authentication issues, understanding token
                structure, and validating JWT claims.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔑 What is JWT?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                JSON Web Token (JWT) is a compact, URL-safe means of representing claims between two parties. JWTs consist
                of three parts: Header (algorithm and token type), Payload (claims/data), and Signature (verification),
                separated by dots.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Decoding</h4>
                    <p class="text-gray-600 text-sm">Decode JWTs in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">Structured View</h4>
                    <p class="text-gray-600 text-sm">See header, payload, and signature separately</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All decoding happens in your browser</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🐛 Debugging</h4>
                    <p class="text-gray-700 leading-relaxed">Debug authentication issues by inspecting JWT contents</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">✅ Validation</h4>
                    <p class="text-gray-700 leading-relaxed">Verify JWT claims and expiration times</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📚 Learning</h4>
                    <p class="text-gray-700 leading-relaxed">Understand JWT structure and components</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Development</h4>
                    <p class="text-gray-700 leading-relaxed">Test JWT generation and parsing in your applications</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is it safe to decode JWTs here?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! All decoding happens in your browser. Your JWT never
                        leaves your device. However, never share JWTs publicly as they may contain sensitive information.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can this tool verify JWT signatures?</h4>
                    <p class="text-gray-700 leading-relaxed">This tool decodes and displays JWT components but doesn't
                        verify signatures, as that requires the secret key which should never be shared.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What are JWT claims?</h4>
                    <p class="text-gray-700 leading-relaxed">Claims are statements about an entity (typically the user) and
                        additional data. Common claims include 'sub' (subject), 'exp' (expiration), and 'iat' (issued at).
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function decodeJWT() {
            const input = document.getElementById('jwtInput').value.trim();

            if (!input) {
                showStatus('Please enter a JWT token', 'error');
                return;
            }

            try {
                const parts = input.split('.');

                if (parts.length !== 3) {
                    showStatus('Invalid JWT format. JWT should have 3 parts separated by dots.', 'error');
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
                showStatus('✓ JWT decoded successfully', 'success');
            } catch (error) {
                showStatus('✗ Error decoding JWT: ' + error.message, 'error');
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
@endsection