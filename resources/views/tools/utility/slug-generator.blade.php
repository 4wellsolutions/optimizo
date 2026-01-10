@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-violet-200 mb-8">
            <div class="mb-6">
                <label for="inputText" class="form-label text-base">Enter Text or Title</label>
                <textarea id="inputText" class="form-input min-h-[150px]" placeholder="Enter your title or text..."
                    oninput="generateSlug()"></textarea>
            </div>

            <div class="mb-6">
                <label class="form-label text-base">Generated Slug</label>
                <div class="relative">
                    <input type="text" id="slugOutput" readonly class="form-input font-mono bg-gray-50 pr-24">
                    <button onclick="copySlug()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-violet-600 hover:bg-violet-700 text-white rounded-lg transition-colors">
                        Copy
                    </button>

                    @include('components.hero-actions')
                </div>
            </div>

            <!-- Options -->
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="lowercase" checked onchange="generateSlug()"
                        class="w-4 h-4 text-violet-600 rounded">
                    <label for="lowercase" class="text-sm text-gray-700">Convert to lowercase</label>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="removeSpecial" checked onchange="generateSlug()"
                        class="w-4 h-4 text-violet-600 rounded">
                    <label for="removeSpecial" class="text-sm text-gray-700">Remove special characters</label>

                    @include('components.hero-actions')
                </div>
            </div>

            <!-- Examples -->
            <div class="bg-gradient-to-br from-violet-50 to-purple-50 rounded-xl p-4 border-2 border-violet-200">
                <h3 class="font-bold text-gray-900 mb-2">Examples:</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600">Input:</span>
                        <span class="font-mono bg-white px-2 py-1 rounded">How to Create SEO-Friendly URLs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600">Output:</span>
                        <span
                            class="font-mono bg-white px-2 py-1 rounded text-violet-600">how-to-create-seo-friendly-urls</span>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-violet-50 to-purple-50 rounded-2xl p-6 md:p-8 border-2 border-violet-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">URL Slug Generator - Create SEO-Friendly URLs</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Generate clean, SEO-friendly URL slugs from any text instantly with our free slug generator tool. Convert
                blog titles, article headings, and page names into readable, search-engine-optimized URLs. Our tool
                automatically removes special characters, converts to lowercase, and replaces spaces with hyphens for
                perfect URL formatting. Essential for bloggers, content creators, web developers, and SEO professionals.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">What is a URL Slug?</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                A URL slug is the part of a web address that comes after the domain name and identifies a specific page. For
                example, in "example.com/how-to-create-seo-friendly-urls", the slug is "how-to-create-seo-friendly-urls".
                Good slugs are short, descriptive, and contain relevant keywords that help both users and search engines
                understand the page content.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Why Use SEO-Friendly Slugs?</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 leading-relaxed">
                <li><strong>Better SEO Rankings:</strong> Keywords in URLs help search engines understand page content</li>
                <li><strong>Improved Click-Through Rates:</strong> Readable URLs are more trustworthy and clickable</li>
                <li><strong>User Experience:</strong> Clear URLs tell users what to expect before clicking</li>
                <li><strong>Social Sharing:</strong> Clean URLs look professional when shared on social media</li>
                <li><strong>Link Building:</strong> Descriptive URLs make better anchor text for backlinks</li>
                <li><strong>Accessibility:</strong> Screen readers can better interpret meaningful URLs</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">URL Slug Best Practices</h3>
            <div class="bg-white rounded-lg p-4 border-2 border-gray-200 mb-6">
                <ul class="space-y-2 text-gray-700">
                    <li>✅ <strong>Use lowercase letters</strong> - Avoid capitalization for consistency</li>
                    <li>✅ <strong>Use hyphens (-)</strong> - Separate words with hyphens, not underscores</li>
                    <li>✅ <strong>Keep it short</strong> - Aim for 3-5 words maximum</li>
                    <li>✅ <strong>Include keywords</strong> - Use relevant keywords for SEO</li>
                    <li>✅ <strong>Be descriptive</strong> - Clearly describe the page content</li>
                    <li>❌ <strong>Avoid special characters</strong> - Remove @, #, %, &, etc.</li>
                    <li>❌ <strong>Avoid stop words</strong> - Remove "a", "the", "and" when possible</li>
                    <li>❌ <strong>Avoid numbers/dates</strong> - Unless essential for content</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">How Our Slug Generator Works</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Our tool follows industry best practices to create perfect URL slugs. It converts text to lowercase, removes
                special characters and punctuation, replaces spaces with hyphens, removes consecutive hyphens, and trims
                leading/trailing hyphens. The result is a clean, SEO-optimized slug ready to use in your CMS, blog platform,
                or website.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Common Use Cases</h3>
            <div class="grid md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-violet-900 mb-2">📝 Blog Posts</h4>
                    <p class="text-gray-700 text-sm">Convert article titles to SEO-friendly URLs for WordPress, Medium, or
                        custom blogs</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-purple-900 mb-2">🛍️ E-commerce</h4>
                    <p class="text-gray-700 text-sm">Create product URLs that include keywords and product names</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-fuchsia-900 mb-2">📄 Documentation</h4>
                    <p class="text-gray-700 text-sm">Generate clean URLs for help articles and documentation pages</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-violet-900 mb-2">🎯 Landing Pages</h4>
                    <p class="text-gray-700 text-sm">Create keyword-rich URLs for marketing campaigns and landing pages</p>
                </div>
            </div>

            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-bold text-blue-900 mb-2">💡 SEO Pro Tip</h4>
                <p class="text-blue-800 text-sm leading-relaxed">
                    Google recommends using hyphens (-) instead of underscores (_) in URLs because hyphens are treated as
                    word separators while underscores are not. This means "seo-friendly-urls" is better than
                    "seo_friendly_urls" for search engine optimization.
                </p>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Should I use hyphens or underscores in URLs?</h4>
                    <p class="text-gray-700 leading-relaxed">Always use hyphens (-). Google treats hyphens as word
                        separators but treats underscores as word connectors. This means "best-seo-practices" is read as
                        three separate words, while "best_seo_practices" is read as one word.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">How long should a URL slug be?</h4>
                    <p class="text-gray-700 leading-relaxed">Keep slugs between 3-5 words (30-60 characters). Shorter URLs
                        are easier to remember, share, and rank better in search results. Remove unnecessary words like "a",
                        "the", "and" to keep slugs concise.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Can I change a URL slug after publishing?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes, but it's not recommended. Changing URLs can break existing
                        links and hurt SEO. If you must change a slug, always set up a 301 redirect from the old URL to the
                        new one to preserve link equity and avoid 404 errors.</p>
                </div>
                <div class="bg-white rounded-lg p-4 border-2 border-gray-200">
                    <h4 class="font-bold text-gray-900 mb-2">Should I include keywords in my URL slug?</h4>
                    <p class="text-gray-700 leading-relaxed">Yes! Including relevant keywords in your URL slug helps search
                        engines understand your content and can improve rankings. However, keep it natural and descriptive -
                        don't stuff keywords unnaturally.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generateSlug() {
            let text = document.getElementById('inputText').value;
            const lowercase = document.getElementById('lowercase').checked;
            const removeSpecial = document.getElementById('removeSpecial').checked;

            if (!text) {
                document.getElementById('slugOutput').value = '';
                return;
            }

            // Convert to lowercase if option is checked
            if (lowercase) {
                text = text.toLowerCase();
            }

            // Remove special characters if option is checked
            if (removeSpecial) {
                text = text.replace(/[^\w\s-]/g, '');
            }

            // Replace spaces and multiple hyphens with single hyphen
            text = text.replace(/\s+/g, '-').replace(/-+/g, '-');

            // Remove leading and trailing hyphens
            text = text.replace(/^-+|-+$/g, '');

            document.getElementById('slugOutput').value = text;
        }

        function copySlug() {
            const output = document.getElementById('slugOutput');
            if (!output.value) {
                showError('No slug to copy');
                return;
            }
            output.select();
            document.execCommand('copy');

            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = 'Copied!';
            setTimeout(() => btn.textContent = originalText, 2000);
        }
    </script>
@endsection