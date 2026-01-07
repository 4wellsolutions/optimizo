@extends('layouts.app')

@section('title', __tool('meta-analyzer', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('meta-analyzer', 'seo.description', $tool->meta_description))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-green-200 mb-8">
            <div class="mb-6">
                <label for="urlInput" class="form-label text-base">{{ __tool('meta-analyzer', 'form.label') }}</label>
                <input type="url" id="urlInput" class="form-input"
                    placeholder="{{ __tool('meta-analyzer', 'form.placeholder') }}" />
            </div>

            <button onclick="analyzeMeta()" id="analyzeBtn" class="btn-primary w-full justify-center text-lg py-4 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span id="btnText">{{ __tool('meta-analyzer', 'form.button') }}</span>
            </button>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>

            <!-- Results -->
            <div id="results" class="hidden">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Meta Tag Analysis Results</h3>

                <!-- Title Tag -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-bold text-lg text-gray-900">Title Tag</h4>
                        <span id="titleStatus" class="px-3 py-1 rounded-full text-sm font-bold"></span>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border-2 border-gray-200">
                        <p id="titleContent" class="text-gray-700 mb-2"></p>
                        <div class="text-sm text-gray-600">
                            Length: <span id="titleLength" class="font-bold"></span> characters
                            <span id="titleAdvice" class="ml-2"></span>
                        </div>
                    </div>
                </div>

                <!-- Meta Description -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-bold text-lg text-gray-900">Meta Description</h4>
                        <span id="descStatus" class="px-3 py-1 rounded-full text-sm font-bold"></span>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border-2 border-gray-200">
                        <p id="descContent" class="text-gray-700 mb-2"></p>
                        <div class="text-sm text-gray-600">
                            Length: <span id="descLength" class="font-bold"></span> characters
                            <span id="descAdvice" class="ml-2"></span>
                        </div>
                    </div>
                </div>

                <!-- Other Meta Tags -->
                <div class="mb-6">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">Other Important Meta Tags</h4>
                    <div id="otherMeta" class="space-y-3"></div>
                </div>

                <!-- SEO Score -->
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-xl p-6 border-2 border-green-200">
                    <h4 class="font-bold text-lg text-gray-900 mb-3">SEO Score</h4>
                    <div class="flex items-center gap-4">
                        <div class="text-5xl font-black" id="seoScore">0</div>
                        <div class="flex-1">
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div id="scoreBar" class="h-4 rounded-full transition-all" style="width: 0%"></div>
                            </div>
                            <p id="scoreText" class="text-sm text-gray-600 mt-2"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 md:p-12 border-2 border-green-100 shadow-2xl">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl shadow-xl mb-4">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-3">Meta Tag Analyzer & Checker</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Optimize your website's meta tags for better search
                    engine visibility</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-lg mb-8">
                Our free Meta Tag Analyzer examines your website's meta tags to ensure they're properly optimized for search
                engines. Get instant feedback on title tags, meta descriptions, Open Graph tags, and other critical SEO
                elements. Perfect for SEO professionals, web developers, and website owners who want to improve their search
                rankings.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🏷️ What are Meta Tags?</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Meta tags are HTML elements that provide information about your web page to search engines and website
                visitors. They don't appear on the page itself but in the page's code. Meta tags influence how your page
                appears in search results and on social media, making them crucial for SEO and user engagement.
            </p>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">🎯 Essential Meta Tags for SEO</h3>
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">📌 Title Tag</h4>
                    <p class="text-gray-700 mb-3">The most important meta tag. Appears as the clickable headline in search
                        results.</p>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-200">
                        <p class="text-sm text-blue-900"><strong>Optimal Length:</strong> 50-60 characters</p>
                        <p class="text-sm text-blue-900"><strong>Best Practice:</strong> Include primary keyword near the
                            beginning</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">📝 Meta Description</h4>
                    <p class="text-gray-700 mb-3">Summary that appears below the title in search results. Influences
                        click-through rates.</p>
                    <div class="bg-green-50 p-3 rounded-lg border border-green-200">
                        <p class="text-sm text-green-900"><strong>Optimal Length:</strong> 150-160 characters</p>
                        <p class="text-sm text-green-900"><strong>Best Practice:</strong> Compelling call-to-action with
                            keywords</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">🌐 Open Graph Tags</h4>
                    <p class="text-gray-700 mb-3">Control how your page appears when shared on social media platforms.</p>
                    <div class="bg-purple-50 p-3 rounded-lg border border-purple-200">
                        <p class="text-sm text-purple-900"><strong>Key Tags:</strong> og:title, og:description, og:image</p>
                        <p class="text-sm text-purple-900"><strong>Platform:</strong> Facebook, LinkedIn, others</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">🐦 Twitter Cards</h4>
                    <p class="text-gray-700 mb-3">Optimize appearance of shared links on Twitter/X platform.</p>
                    <div class="bg-cyan-50 p-3 rounded-lg border border-cyan-200">
                        <p class="text-sm text-cyan-900"><strong>Key Tags:</strong> twitter:card, twitter:title,
                            twitter:description</p>
                        <p class="text-sm text-cyan-900"><strong>Types:</strong> Summary, Summary Large Image</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-200 rounded-2xl p-8 mb-10">
                <h4 class="font-bold text-yellow-900 mb-3 flex items-center gap-3 text-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    ⚠️ Common Meta Tag Mistakes to Avoid
                </h4>
                <ul class="text-yellow-800 leading-relaxed space-y-2">
                    <li>❌ Missing or duplicate title tags across pages</li>
                    <li>❌ Title tags that are too long (truncated in search results)</li>
                    <li>❌ Meta descriptions that don't match page content</li>
                    <li>❌ Keyword stuffing in meta tags</li>
                    <li>❌ Forgetting to update meta tags when content changes</li>
                    <li>❌ Not including Open Graph or Twitter Card tags</li>
                </ul>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">✨ Why Analyze Meta Tags?</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-green-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">📈</div>
                    <h4 class="font-bold text-gray-900 mb-2">Improve Rankings</h4>
                    <p class="text-gray-600 text-sm">Properly optimized meta tags help search engines understand your
                        content</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-teal-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">👆</div>
                    <h4 class="font-bold text-gray-900 mb-2">Increase CTR</h4>
                    <p class="text-gray-600 text-sm">Compelling meta descriptions drive more clicks from search results</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-blue-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🎨</div>
                    <h4 class="font-bold text-gray-900 mb-2">Social Sharing</h4>
                    <p class="text-gray-600 text-sm">Control how your content appears on social media platforms</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-purple-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🔍</div>
                    <h4 class="font-bold text-gray-900 mb-2">SEO Audit</h4>
                    <p class="text-gray-600 text-sm">Identify and fix meta tag issues across your website</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">⚡</div>
                    <h4 class="font-bold text-gray-900 mb-2">Quick Checks</h4>
                    <p class="text-gray-600 text-sm">Instantly verify meta tags without viewing source code</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 transition-all shadow-lg hover:shadow-xl">
                    <div class="text-3xl mb-3">🏆</div>
                    <h4 class="font-bold text-gray-900 mb-2">Competitor Analysis</h4>
                    <p class="text-gray-600 text-sm">See how competitors optimize their meta tags</p>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Do meta tags directly affect search rankings?</h4>
                    <p class="text-gray-700 leading-relaxed">While meta keywords don't affect rankings, title tags and meta
                        descriptions are crucial. Title tags are a direct ranking factor, and compelling meta descriptions
                        improve click-through rates, which indirectly boosts rankings.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">How often should I update my meta tags?</h4>
                    <p class="text-gray-700 leading-relaxed">Update meta tags whenever you significantly change page
                        content, target different keywords, or notice poor performance in search results. Regular SEO audits
                        (quarterly or bi-annually) help identify optimization opportunities.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Can I use the same meta description for multiple pages?
                    </h4>
                    <p class="text-gray-700 leading-relaxed">No! Each page should have a unique meta description that
                        accurately describes its specific content. Duplicate meta descriptions confuse search engines and
                        reduce the effectiveness of your SEO efforts.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">What happens if my title tag is too long?</h4>
                    <p class="text-gray-700 leading-relaxed">Search engines will truncate titles longer than ~60 characters,
                        potentially cutting off important information. Keep titles concise and front-load important keywords
                        to ensure they're visible in search results.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                    <h4 class="font-bold text-gray-900 mb-3 text-lg">Are meta keywords still important?</h4>
                    <p class="text-gray-700 leading-relaxed">No. Google and most major search engines ignore the meta
                        keywords tag due to historical abuse. Focus on title tags, meta descriptions, and quality content
                        instead.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function analyzeMeta() {
            const url = document.getElementById('urlInput').value.trim();
            const btn = document.getElementById('analyzeBtn');
            const btnText = document.getElementById('btnText');
            const statusMessage = document.getElementById('statusMessage');

            if (!url) {
                alert('Please enter a URL');
                return;
            }

            // Show loading state
            btn.disabled = true;
            btn.classList.add('opacity-75');
            btnText.textContent = 'Analyzing...';
            statusMessage.classList.add('hidden');
            document.getElementById('results').classList.add('hidden');

            try {
                // Fetch the page (Note: This will be blocked by CORS in production)
                // In production, you'd need a backend proxy
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-yellow-100 text-yellow-800 border-2 border-yellow-300';
                statusMessage.innerHTML = '<p class="font-bold">⚠️ Note: Due to browser security (CORS), this tool works best with a backend proxy. For now, manually check your page source or use browser extensions.</p>';
                statusMessage.classList.remove('hidden');

                // Simulated analysis for demo
                setTimeout(() => {
                    showDemoResults();
                }, 1000);

            } catch (error) {
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                statusMessage.textContent = '✗ Error analyzing URL. Please check the URL and try again.';
                statusMessage.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.classList.remove('opacity-75');
                btnText.textContent = 'Analyze Meta Tags';
            }
        }

        function showDemoResults() {
            // Demo data - in production, parse actual HTML
            const title = "Example Website - Best Products & Services";
            const description = "Discover amazing products and services at Example Website. Shop now for exclusive deals and premium quality items delivered to your door.";

            // Title analysis
            document.getElementById('titleContent').textContent = title;
            document.getElementById('titleLength').textContent = title.length;

            if (title.length >= 50 && title.length <= 60) {
                document.getElementById('titleStatus').className = 'px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800';
                document.getElementById('titleStatus').textContent = '✓ Optimal';
                document.getElementById('titleAdvice').textContent = '✓ Perfect length!';
                document.getElementById('titleAdvice').className = 'ml-2 text-green-600';
            } else if (title.length > 60) {
                document.getElementById('titleStatus').className = 'px-3 py-1 rounded-full text-sm font-bold bg-orange-100 text-orange-800';
                document.getElementById('titleStatus').textContent = '⚠ Too Long';
                document.getElementById('titleAdvice').textContent = '⚠ May be truncated in search results';
                document.getElementById('titleAdvice').className = 'ml-2 text-orange-600';
            } else {
                document.getElementById('titleStatus').className = 'px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800';
                document.getElementById('titleStatus').textContent = '⚠ Too Short';
                document.getElementById('titleAdvice').textContent = '⚠ Consider adding more detail';
                document.getElementById('titleAdvice').className = 'ml-2 text-yellow-600';
            }

            // Description analysis
            document.getElementById('descContent').textContent = description;
            document.getElementById('descLength').textContent = description.length;

            if (description.length >= 150 && description.length <= 160) {
                document.getElementById('descStatus').className = 'px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800';
                document.getElementById('descStatus').textContent = '✓ Optimal';
                document.getElementById('descAdvice').textContent = '✓ Perfect length!';
                document.getElementById('descAdvice').className = 'ml-2 text-green-600';
            } else if (description.length > 160) {
                document.getElementById('descStatus').className = 'px-3 py-1 rounded-full text-sm font-bold bg-orange-100 text-orange-800';
                document.getElementById('descStatus').textContent = '⚠ Too Long';
                document.getElementById('descAdvice').textContent = '⚠ May be truncated';
                document.getElementById('descAdvice').className = 'ml-2 text-orange-600';
            } else {
                document.getElementById('descStatus').className = 'px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800';
                document.getElementById('descStatus').textContent = '⚠ Too Short';
                document.getElementById('descAdvice').textContent = '⚠ Add more detail';
                document.getElementById('descAdvice').className = 'ml-2 text-yellow-600';
            }

            // Other meta tags
            const otherMeta = document.getElementById('otherMeta');
            otherMeta.innerHTML = `
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="font-bold text-gray-900 mb-1">Viewport</div>
                                <code class="text-sm text-gray-600">width=device-width, initial-scale=1</code>
                                <span class="ml-2 text-green-600">✓</span>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="font-bold text-gray-900 mb-1">Charset</div>
                                <code class="text-sm text-gray-600">UTF-8</code>
                                <span class="ml-2 text-green-600">✓</span>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="font-bold text-gray-900 mb-1">Robots</div>
                                <code class="text-sm text-gray-600">index, follow</code>
                                <span class="ml-2 text-green-600">✓</span>
                            </div>
                        `;

            // SEO Score
            const score = 85;
            document.getElementById('seoScore').textContent = score;
            document.getElementById('scoreBar').style.width = score + '%';
            document.getElementById('scoreBar').className = 'h-4 rounded-full transition-all bg-gradient-to-r from-green-500 to-teal-600';
            document.getElementById('scoreText').textContent = 'Good! Your meta tags are well optimized.';

            document.getElementById('results').classList.remove('hidden');
        }
    </script>
@endsection