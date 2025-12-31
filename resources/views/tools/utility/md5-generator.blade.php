@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif


@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-green-500 via-teal-500 to-cyan-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
                    MD5 Hash Generator
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium">
                    Generate MD5 hashes from any text instantly!
                </p>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="form-label text-base">Enter Text</label>
                <textarea id="inputText" rows="4" class="form-input" placeholder="Enter text to hash..."></textarea>
            </div>

            <button onclick="generateMD5()" class="btn-primary w-full justify-center text-lg py-4 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span>Generate MD5 Hash</span>
            </button>

            <div id="result" class="hidden">
                <label class="form-label text-base">MD5 Hash</label>
                <div class="relative">
                    <input type="text" id="md5Output" readonly class="form-input font-mono text-sm bg-gray-50">
                    <button onclick="copyHash()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                        Copy
                    </button>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content - Stunning Design -->
        <div
            class="bg-gradient-to-br from-green-50 via-teal-50 to-cyan-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">MD5 Hash Generator</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Generate MD5 hashes from any text instantly</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Generate MD5 hashes from any text, password, or data string instantly with our free online MD5 hash
                generator. MD5 (Message-Digest Algorithm 5) is a widely used cryptographic hash function that produces a
                128-bit (32-character hexadecimal) hash value. Perfect for data integrity verification, checksum generation,
                and understanding hash functions. All processing happens in your browser for complete privacy.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">🔐 What is MD5?</h3>
            <p class="text-gray-700 leading-relaxed mb-8 text-center max-w-3xl mx-auto">
                MD5 is a cryptographic hash function that takes an input of any length and produces a fixed 128-bit hash
                value, typically represented as a 32-character hexadecimal number. The same input always produces the same
                hash, but even a tiny change in input creates a completely different hash.
            </p>

            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">✅ MD5 Advantages</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>Fast Processing:</strong> Extremely quick hash generation</li>
                        <li>• <strong>Fixed Length:</strong> Always produces 128-bit output</li>
                        <li>• <strong>Deterministic:</strong> Same input = same hash</li>
                        <li>• <strong>Wide Support:</strong> Available in all programming languages</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold text-2xl mb-3">📊 Common Use Cases</h4>
                    <ul class="space-y-2 text-white/90">
                        <li>• <strong>File Verification:</strong> Check file integrity</li>
                        <li>• <strong>Checksums:</strong> Verify downloads</li>
                        <li>• <strong>Cache Keys:</strong> Generate unique identifiers</li>
                        <li>• <strong>Data Integrity:</strong> Detect changes</li>
                    </ul>
                </div>
            </div>

            <div class="bg-gradient-to-r from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-red-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    ⚠️ Security Warning
                </h4>
                <p class="text-red-800 leading-relaxed mb-3">
                    <strong>DO NOT use MD5 for password hashing or security-critical applications!</strong> MD5 is
                    cryptographically broken and vulnerable to collision attacks. For password hashing, use modern
                    algorithms like bcrypt, Argon2, or PBKDF2.
                </p>
                <p class="text-red-800 leading-relaxed">
                    MD5 is still useful for non-security purposes like checksums, cache keys, and data integrity
                    verification where collision resistance isn't critical.
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🔄 MD5 vs Other Hash Functions</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔵</div>
                    <h4 class="font-bold text-gray-900 mb-2">MD5</h4>
                    <p class="text-gray-600 text-sm mb-2">128-bit output</p>
                    <p class="text-gray-600 text-sm">Fast but insecure for cryptography</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🟢</div>
                    <h4 class="font-bold text-gray-900 mb-2">SHA-1</h4>
                    <p class="text-gray-600 text-sm mb-2">160-bit output</p>
                    <p class="text-gray-600 text-sm">Also deprecated for security use</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🟡</div>
                    <h4 class="font-bold text-gray-900 mb-2">SHA-256</h4>
                    <p class="text-gray-600 text-sm mb-2">256-bit output</p>
                    <p class="text-gray-600 text-sm">Secure and widely used today</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🔴</div>
                    <h4 class="font-bold text-gray-900 mb-2">SHA-512</h4>
                    <p class="text-gray-600 text-sm mb-2">512-bit output</p>
                    <p class="text-gray-600 text-sm">More secure but slower</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">🟣</div>
                    <h4 class="font-bold text-gray-900 mb-2">bcrypt</h4>
                    <p class="text-gray-600 text-sm mb-2">Variable output</p>
                    <p class="text-gray-600 text-sm">Designed for password hashing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg">
                    <div class="text-3xl mb-3">⚫</div>
                    <h4 class="font-bold text-gray-900 mb-2">Argon2</h4>
                    <p class="text-gray-600 text-sm mb-2">Variable output</p>
                    <p class="text-gray-600 text-sm">Modern password hashing winner</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    💡 How MD5 Works
                </h4>
                <p class="text-blue-800 leading-relaxed">
                    MD5 processes input data in 512-bit blocks and produces a 128-bit hash value. The algorithm uses a
                    series of mathematical operations to transform the input into a unique fingerprint. The same input
                    always produces the same hash, making it deterministic and reliable for data verification purposes.
                </p>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is MD5 secure for passwords?</h4>
                    <p class="text-gray-700 leading-relaxed">No! MD5 is cryptographically broken and should never be used
                        for password hashing. Use bcrypt, Argon2, or PBKDF2 instead. MD5 is vulnerable to collision attacks
                        and rainbow table attacks.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I reverse an MD5 hash?</h4>
                    <p class="text-gray-700 leading-relaxed">No, MD5 is a one-way function - you cannot reverse a hash to
                        get the original input. However, attackers can use rainbow tables or brute force to find inputs that
                        produce the same hash.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is MD5 still good for?</h4>
                    <p class="text-gray-700 leading-relaxed">MD5 is still useful for non-security purposes like file
                        integrity checks, checksums, cache keys, and generating unique identifiers where collision
                        resistance isn't critical.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How long is an MD5 hash?</h4>
                    <p class="text-gray-700 leading-relaxed">An MD5 hash is always 128 bits (16 bytes) long, typically
                        represented as a 32-character hexadecimal string. For example: "5d41402abc4b2a76b9719d911017c592"
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my data sent to a server?</h4>
                    <p class="text-gray-700 leading-relaxed">No! All MD5 hash generation happens entirely in your browser
                        using JavaScript. Your data never leaves your device, ensuring complete privacy and security.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script>
        function generateMD5() {
            const text = document.getElementById('inputText').value;
            if (!text) {
                alert('Please enter some text');
                return;
            }

            const hash = CryptoJS.MD5(text).toString();
            document.getElementById('md5Output').value = hash;
            document.getElementById('result').classList.remove('hidden');
        }

        function copyHash() {
            const output = document.getElementById('md5Output');
            output.select();
            document.execCommand('copy');

            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = 'Copied!';
            setTimeout(() => btn.textContent = originalText, 2000);
        }
    </script>
@endsection