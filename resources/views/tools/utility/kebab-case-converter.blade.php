@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-orange-500 via-amber-500 to-yellow-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">Kebab Case Converter
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">Convert text to
                    kebab-case format instantly - 100% free and accurate!</p>
                @include('components.hero-actions')
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="block text-sm font-semibold text-gray-700 mb-2">Input Text</label>
                <textarea id="inputText" rows="8"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 font-mono text-sm resize-none"
                    placeholder="my url slug"></textarea>
            </div>
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertText()"
                    class="px-8 py-3 bg-orange-600 text-white rounded-xl hover:bg-orange-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>Convert to kebab-case</span>
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
                <label for="outputText" class="block text-sm font-semibold text-gray-700 mb-2">Output (kebab-case)</label>
                <textarea id="outputText" rows="8" readonly
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 font-mono text-sm resize-none"
                    placeholder="my-url-slug"></textarea>
            </div>
            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>
        </div>

        <div
            class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-3xl p-8 md:p-12 border-2 border-orange-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-500 to-amber-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free Kebab Case Converter Tool</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Convert text to kebab-case for URLs and CSS</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">Transform your text into kebab-case format with our free
                online converter. Kebab-case uses lowercase letters with hyphens separating words. It's the standard for
                URLs, CSS class names, file names, and HTML attributes.</p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔗</div>
                    <h4 class="font-bold text-gray-900 mb-2">URL Friendly</h4>
                    <p class="text-gray-600 text-sm">Perfect for SEO-friendly URLs and slugs</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-amber-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Conversion</h4>
                    <p class="text-gray-600 text-sm">Convert to kebab-case in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-orange-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy Protected</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📝</div>
                    <h4 class="font-bold text-gray-900 mb-2">Bulk Processing</h4>
                    <p class="text-gray-600 text-sm">Convert multiple slugs at once</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎯</div>
                    <h4 class="font-bold text-gray-900 mb-2">Smart Formatting</h4>
                    <p class="text-gray-600 text-sm">Removes spaces and special characters automatically</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-lime-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🆓</div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Free</h4>
                    <p class="text-gray-600 text-sm">No limits or registration required</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔗 URL Slugs</h4>
                    <p class="text-gray-700 leading-relaxed">Create SEO-friendly URLs for blog posts, products, and web
                        pages</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎨 CSS Classes</h4>
                    <p class="text-gray-700 leading-relaxed">Format CSS class names following BEM and modern conventions</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📁 File Names</h4>
                    <p class="text-gray-700 leading-relaxed">Create consistent file names for web assets and documents</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🏷️ HTML Attributes</h4>
                    <p class="text-gray-700 leading-relaxed">Format data attributes and custom HTML attributes</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📦 Package Names</h4>
                    <p class="text-gray-700 leading-relaxed">Create npm package names and repository names</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🌐 Domain Names</h4>
                    <p class="text-gray-700 leading-relaxed">Format subdomain and domain name suggestions</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-orange-600 text-lg">1.</span><span><strong>Enter Text:</strong> Type the
                            text you want to convert</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-orange-600 text-lg">2.</span><span><strong>Click Convert:</strong> Press
                            "Convert to kebab-case"</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-orange-600 text-lg">3.</span><span><strong>Review Output:</strong> Check
                            the kebab-case result</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-orange-600 text-lg">4.</span><span><strong>Copy Result:</strong> Click
                            "Copy" button</span></li>
                    <li class="flex items-start gap-3"><span
                            class="font-bold text-orange-600 text-lg">5.</span><span><strong>Use in URLs:</strong> Paste
                            into your website or code</span></li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Conversion Examples</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">URL Slugs:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">My Blog Post → my-blog-post</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">CSS Classes:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">navigation menu → navigation-menu
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">File Names:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">user profile image →
                            user-profile-image</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Data Attributes:</p>
                        <p class="text-gray-700 font-mono text-sm bg-gray-50 p-3 rounded">user id → data-user-id</p>
                    </div>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What is kebab-case?</h4>
                    <p class="text-gray-700 leading-relaxed">Kebab-case is a naming convention where words are lowercase and
                        separated by hyphens. Example: my-url-slug</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">When should I use kebab-case?</h4>
                    <p class="text-gray-700 leading-relaxed">Use kebab-case for URLs, CSS class names, HTML attributes, file
                        names, and anywhere hyphens are preferred over spaces or underscores.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Why is it called kebab-case?</h4>
                    <p class="text-gray-700 leading-relaxed">It's called kebab-case because the hyphens look like skewers
                        holding words together, similar to how food is held on a kebab skewer.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is kebab-case good for SEO?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Kebab-case URLs are readable, SEO-friendly, and
                        recommended by Google. They're easier for users and search engines to understand.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is this tool free?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Completely free with no limits. All processing happens in
                        your browser for privacy and speed.</p>
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
            const output = input.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            document.getElementById('outputText').value = output;
            showStatus('✓ Converted to kebab-case successfully!', 'success');
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