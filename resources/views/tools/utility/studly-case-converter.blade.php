@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-pink-500 via-rose-500 to-red-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">Studly Case Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">Convert text to
                    StUdLy CaSe format instantly - 100% free and fun!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-pink-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">Input Text</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="hello world"></textarea>
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-pink-600 text-white rounded-xl hover:bg-pink-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert to StUdLy CaSe</span>
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="copyOutput()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>Copy</span>
                </button>
            </div>
            <div class="mb-4">
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">Output (StUdLy CaSe)</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="HeLlO wOrLd"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 border-2 border-pink-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Studly Case Converter Tool</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert text to StUdLy CaSe for creative formatting</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">Transform your text into StUdLy CaSe format with our free
                online converter. Studly case randomly alternates between uppercase and lowercase letters, creating a
                playful and eye-catching text style. Perfect for social media posts, creative content, and fun messaging.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">Creative Styling</h4>
                    <p class="text-gray-600 text-sm">Create unique, eye-catching text formatting</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Results</h4>
                    <p class="text-gray-600 text-sm">Convert to studly case in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy Protected</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bulk Processing</h4>
                    <p class="text-gray-600 text-sm">Convert multiple lines at once</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Random Pattern</h4>
                    <p class="text-gray-600 text-sm">Each conversion creates a unique pattern</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits or registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📱 Social Media</h4>
                    <p class="text-gray-700 leading-relaxed">Create attention-grabbing posts and comments on Twitter,
                        Instagram, and Facebook</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">💬 Messaging</h4>
                    <p class="text-gray-700 leading-relaxed">Add playful formatting to Discord, Slack, and text messages</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎮 Gaming</h4>
                    <p class="text-gray-700 leading-relaxed">Create unique usernames and in-game messages</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎨 Creative Content</h4>
                    <p class="text-gray-700 leading-relaxed">Add stylistic flair to blog posts and creative writing</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">😄 Memes</h4>
                    <p class="text-gray-700 leading-relaxed">Format meme text and sarcastic comments</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎪 Fun Projects</h4>
                    <p class="text-gray-700 leading-relaxed">Add personality to personal projects and creative work</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-pink-600 text-lg">1.</span><span><strong>Enter Text:</strong> Type the
                            text you want to convert</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-pink-600 text-lg">2.</span><span><strong>Click Convert:</strong> Press
                            "Convert to StUdLy CaSe"</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-pink-600 text-lg">3.</span><span><strong>Review Output:</strong> Check the
                            studly case result</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-pink-600 text-lg">4.</span><span><strong>Copy Result:</strong> Click
                            "Copy" button</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-pink-600 text-lg">5.</span><span><strong>Use Anywhere:</strong> Paste into
                            social media or messages</span></li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Social Media:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">hello world → HeLlO wOrLd</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Messages:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">good morning → GoOd MoRnInG</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Creative Text:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">awesome → AwEsOmE</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Fun Formatting:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">cool stuff → CoOl StUfF</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is studly case?</h4>
                    <p class="text-gray-700 leading-relaxed">Studly case randomly alternates between uppercase and lowercase
                        letters, creating a playful text style. Example: StUdLy CaSe</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is the pattern random each time?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Each conversion creates a new random pattern, so you can
                        convert the same text multiple times for different results.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Where can I use studly case?</h4>
                    <p class="text-gray-700 leading-relaxed">Use it for social media posts, messaging apps, gaming
                        usernames, memes, and anywhere you want to add creative flair to your text.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Does it work with numbers?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Numbers are preserved as-is while letters are randomly
                        capitalized.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is this tool free?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Completely free with no limits. All processing happens in
                        your browser for privacy.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function convertText() {
            const input = document.getElementById('inputText').value;
            if (!input.trim()) {
                showStatus('Please enter some text to convert', 'error');
                return;
            }
            const output = input.split('').map(char => {
                if (char.match(/[a-zA-Z]/)) {
                    return Math.random() > 0.5 ? char.toUpperCase() : char.toLowerCase();
                }
                return char;
            }).join('');
            document.getElementById('outputText').value = output;
            showStatus('✓ Converted to StUdLy CaSe successfully!', 'success');
        }

        function clearAll() {
            document.getElementById('inputText').value = '';
            document.getElementById('outputText').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
        }

        function copyOutput() {
            const output = document.getElementById('outputText');
            if (!output.value) {
                showStatus('Nothing to copy! Please convert some text first.', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ Copied to clipboard!', 'success');
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