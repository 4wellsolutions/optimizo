@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-cyan-500 to-teal-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    CSS Minifier
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Minify CSS to reduce file size or beautify CSS for better readability - 100% free and secure!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-blue-200 mb-8">
            <div class="mb-6">
                <label for="cssInput" class="form-label text-base">CSS Input</label>
                <textarea id="cssInput" class="form-input font-mono text-sm min-h-[300px]"
                    placeholder="Paste your CSS code here..."></textarea>
            </div>

            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="processCSS('minify')" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span>Minify CSS</span>
                </button>
                <button onclick="processCSS('beautify')" class="btn-secondary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                    <span>Beautify CSS</span>
                </button>
                <button onclick="clearCSS()"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Clear</span>
                </button>
                <button onclick="copyCSS()"
                    class="px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span>Copy</span>
                </button>
            </div>

            <div id="statusMessage" class="hidden mb-6 p-4 rounded-xl font-semibold"></div>

            <div class="mb-6">
                <label for="cssOutput" class="form-label text-base">CSS Output</label>
                <textarea id="cssOutput" class="form-input font-mono text-sm min-h-[300px]" readonly
                    placeholder="Processed CSS will appear here..."></textarea>
            </div>

            <div id="stats" class="hidden grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border-2 border-blue-200">
                    <div class="text-sm text-gray-600 mb-1">Original Size</div>
                    <div class="text-2xl font-black text-blue-600" id="originalSize">0</div>
                </div>
                <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-xl p-4 border-2 border-cyan-200">
                    <div class="text-sm text-gray-600 mb-1">Minified Size</div>
                    <div class="text-2xl font-black text-cyan-600" id="minifiedSize">0</div>
                </div>
                <div class="bg-gradient-to-br from-teal-50 to-green-50 rounded-xl p-4 border-2 border-teal-200">
                    <div class="text-sm text-gray-600 mb-1">Saved</div>
                    <div class="text-2xl font-black text-teal-600" id="savedSize">0</div>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border-2 border-green-200">
                    <div class="text-sm text-gray-600 mb-1">Compression</div>
                    <div class="text-2xl font-black text-green-600" id="compressionRate">0%</div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 md:p-12 border-2 border-blue-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Free CSS Minifier & Beautifier</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Optimize CSS files for faster page loads and better
                    performance</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free CSS Minifier compresses CSS files by removing whitespace, comments, and unnecessary characters,
                significantly reducing file size and improving website load times. Perfect for web developers, designers,
                and anyone optimizing website performance. Also includes a CSS beautifier to format and organize your
                stylesheets for better readability. 100% free, client-side processing ensures your code stays private.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎨 What is CSS Minification?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                CSS minification is the process of removing unnecessary characters from CSS code without changing its
                functionality. This includes whitespace, line breaks, comments, and redundant code. Minified CSS files are
                smaller, load faster, and improve website performance. It's an essential optimization technique for
                production websites.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Features</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📦</div>
                    <h4 class="font-bold text-gray-900 mb-2">CSS Minification</h4>
                    <p class="text-gray-600 text-sm">Compress CSS by removing whitespace and comments</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-cyan-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">CSS Beautification</h4>
                    <p class="text-gray-600 text-sm">Format CSS with proper indentation and spacing</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📊</div>
                    <h4 class="font-bold text-gray-900 mb-2">Compression Stats</h4>
                    <p class="text-gray-600 text-sm">See file size reduction and compression rate</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Instant Processing</h4>
                    <p class="text-gray-600 text-sm">Minify or beautify CSS in milliseconds</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-yellow-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔒</div>
                    <h4 class="font-bold text-gray-900 mb-2">Privacy First</h4>
                    <p class="text-gray-600 text-sm">All processing happens in your browser</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📋</div>
                    <h4 class="font-bold text-gray-900 mb-2">One-Click Copy</h4>
                    <p class="text-gray-600 text-sm">Copy minified CSS to clipboard instantly</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Benefits of CSS Minification</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">⚡ Faster Page Loads</h4>
                    <p class="text-gray-700 leading-relaxed">Smaller CSS files download faster, improving page load times
                        and user experience</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">💰 Reduced Bandwidth</h4>
                    <p class="text-gray-700 leading-relaxed">Lower bandwidth usage saves hosting costs and mobile data for
                        users</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📈 Better SEO</h4>
                    <p class="text-gray-700 leading-relaxed">Faster sites rank better in search engines, improving
                        visibility</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🎯 Improved Performance</h4>
                    <p class="text-gray-700 leading-relaxed">Optimized CSS reduces browser parsing time and rendering delays
                    </p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">📱 Mobile Optimization</h4>
                    <p class="text-gray-700 leading-relaxed">Crucial for mobile users with limited bandwidth and slower
                        connections</p>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">🔧 Production Ready</h4>
                    <p class="text-gray-700 leading-relaxed">Minified CSS is standard practice for production deployments
                    </p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">📚 How to Use</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">1.</span>
                        <span><strong>Paste CSS:</strong> Copy and paste your CSS code into the input field</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">2.</span>
                        <span><strong>Choose Action:</strong> Click "Minify CSS" to compress or "Beautify CSS" to
                            format</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">3.</span>
                        <span><strong>View Results:</strong> See the processed CSS in the output field with compression
                            stats</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">4.</span>
                        <span><strong>Copy:</strong> Click "Copy" to copy the minified CSS to your clipboard</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="font-bold text-blue-600 text-lg">5.</span>
                        <span><strong>Use in Production:</strong> Replace your original CSS file with the minified
                            version</span>
                    </li>
                </ol>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">💡 Best Practices</h3>
            <div class="bg-white rounded-xl p-6 border-2 border-gray-200 mb-8">
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Keep source files:</strong> Always maintain readable, unminified versions for
                            development</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Minify for production:</strong> Only use minified CSS in production
                            environments</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Combine files:</strong> Merge multiple CSS files before minifying for better
                            compression</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Test thoroughly:</strong> Always test minified CSS to ensure no functionality is
                            broken</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-green-600 font-bold text-xl">✓</span>
                        <span><strong>Use build tools:</strong> Integrate minification into your build process for
                            automation</span>
                    </li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How much can CSS minification reduce file size?</h4>
                    <p class="text-gray-700 leading-relaxed">Typically 20-40% reduction, depending on your CSS structure.
                        Files with lots of comments and whitespace see bigger savings. Combined with gzip compression, you
                        can achieve 70-80% total reduction.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Will minification break my CSS?</h4>
                    <p class="text-gray-700 leading-relaxed">No! Minification only removes unnecessary characters while
                        preserving functionality. However, always test your minified CSS to ensure everything works as
                        expected.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Should I minify CSS for development?</h4>
                    <p class="text-gray-700 leading-relaxed">No. Keep CSS readable during development for easier debugging.
                        Only minify for production deployments. Use beautified CSS during development and testing.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I reverse minification?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Use our "Beautify CSS" feature to format minified CSS back
                        into a readable format. However, comments are permanently removed during minification.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Is my CSS data secure?</h4>
                    <p class="text-gray-700 leading-relaxed">Absolutely! All processing happens entirely in your browser.
                        Your CSS code never leaves your device and is not sent to any server.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function processCSS(action) {
            const input = document.getElementById('cssInput').value.trim();
            const output = document.getElementById('cssOutput');
            const statusMessage = document.getElementById('statusMessage');
            const stats = document.getElementById('stats');

            if (!input) {
                showStatus('Please enter CSS code to process', 'error');
                return;
            }

            try {
                let processed;
                if (action === 'minify') {
                    processed = minifyCSS(input);
                    showStats(input, processed);
                    showStatus('✓ CSS minified successfully', 'success');
                } else {
                    processed = beautifyCSS(input);
                    stats.classList.add('hidden');
                    showStatus('✓ CSS beautified successfully', 'success');
                }
                output.value = processed;
            } catch (error) {
                showStatus('✗ Error processing CSS: ' + error.message, 'error');
            }
        }

        function minifyCSS(css) {
            return css
                .replace(/\/\*[\s\S]*?\*\//g, '') // Remove comments
                .replace(/\s+/g, ' ') // Replace multiple spaces with single space
                .replace(/\s*{\s*/g, '{') // Remove spaces around {
                .replace(/\s*}\s*/g, '}') // Remove spaces around }
                .replace(/\s*:\s*/g, ':') // Remove spaces around :
                .replace(/\s*;\s*/g, ';') // Remove spaces around ;
                .replace(/;\s*}/g, '}') // Remove last semicolon
                .replace(/,\s*/g, ',') // Remove spaces after commas
                .trim();
        }

        function beautifyCSS(css) {
            let formatted = css
                .replace(/\s+/g, ' ')
                .replace(/{\s*/g, ' {\n  ')
                .replace(/;\s*/g, ';\n  ')
                .replace(/}\s*/g, '\n}\n\n')
                .replace(/,\s*/g, ',\n  ')
                .trim();

            // Fix indentation
            let lines = formatted.split('\n');
            let indentLevel = 0;
            let result = [];

            lines.forEach(line => {
                line = line.trim();
                if (line.includes('}')) indentLevel--;
                result.push('  '.repeat(Math.max(0, indentLevel)) + line);
                if (line.includes('{')) indentLevel++;
            });

            return result.join('\n');
        }

        function showStats(original, minified) {
            const originalSize = new Blob([original]).size;
            const minifiedSize = new Blob([minified]).size;
            const saved = originalSize - minifiedSize;
            const compression = ((saved / originalSize) * 100).toFixed(1);

            document.getElementById('originalSize').textContent = formatBytes(originalSize);
            document.getElementById('minifiedSize').textContent = formatBytes(minifiedSize);
            document.getElementById('savedSize').textContent = formatBytes(saved);
            document.getElementById('compressionRate').textContent = compression + '%';
            document.getElementById('stats').classList.remove('hidden');
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }

        function clearCSS() {
            document.getElementById('cssInput').value = '';
            document.getElementById('cssOutput').value = '';
            document.getElementById('statusMessage').classList.add('hidden');
            document.getElementById('stats').classList.add('hidden');
        }

        function copyCSS() {
            const output = document.getElementById('cssOutput');
            if (!output.value) {
                showStatus('No CSS to copy', 'error');
                return;
            }
            output.select();
            document.execCommand('copy');
            showStatus('✓ CSS copied to clipboard', 'success');
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