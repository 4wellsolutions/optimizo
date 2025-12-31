# Add SEO section to homepage
$file = "d:/workspace/optimizo/resources/views/home.blade.php"
$content = Get-Content $file -Raw

# SEO section content
$seoSection = @'

    <!-- SEO Optimized Content Section -->
    <section class="bg-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="prose prose-lg max-w-none">
                <h2 class="text-4xl font-black text-gray-900 mb-8">Comprehensive Free Online Tools for Every Need</h2>
                
                <p class="text-gray-700 leading-relaxed mb-6">
                    In today's digital landscape, having access to reliable, professional-grade tools is essential for success. Whether you're a content creator, digital marketer, developer, or business owner, Optimizo provides a comprehensive suite of free online tools designed to streamline your workflow and enhance productivity. Our platform eliminates the need for expensive software subscriptions while delivering enterprise-quality results.
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-12 mb-6">YouTube Tools for Content Creators</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    YouTube creators face unique challenges in growing their channels and optimizing content for maximum reach. Our YouTube tools suite provides everything you need to analyze, optimize, and enhance your YouTube presence. From downloading high-quality thumbnails for competitive analysis to extracting detailed channel statistics, our tools help you make data-driven decisions.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    The YouTube Monetization Checker helps you verify if channels are eligible for ad revenue, while the Tag Generator creates SEO-optimized tags to improve video discoverability. Channel data extraction tools provide comprehensive insights into subscriber growth, video performance, and engagement metrics. These tools are invaluable for content strategy planning and competitive analysis.
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-12 mb-6">SEO Tools for Better Rankings</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Search engine optimization is crucial for online visibility and organic traffic growth. Our SEO tools help you analyze and optimize your content for better search engine rankings. The Meta Tag Analyzer examines your website's meta titles, descriptions, and keywords to ensure they follow best practices and maximize click-through rates from search results.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Keyword density analysis helps you maintain optimal keyword usage without over-optimization, which can harm your rankings. The Word Counter tool provides detailed text statistics including word count, character count, sentence count, and reading time estimates—essential metrics for content optimization and meeting platform-specific requirements.
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-12 mb-6">Utility Tools for Daily Tasks</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Our utility tools collection addresses common daily challenges faced by developers, designers, and digital professionals. Image compression tools reduce file sizes while maintaining visual quality, crucial for website performance and faster load times. Color conversion tools seamlessly translate between RGB, HEX, and other color formats, streamlining design workflows.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Security-focused tools like the Password Generator create strong, random passwords to protect your accounts. The MD5 Generator produces cryptographic hashes for data verification and security applications. Code formatting tools beautify and standardize your HTML, CSS, and JavaScript code, improving readability and maintainability. JSON formatters and parsers help developers work with API responses and configuration files efficiently.
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-12 mb-6">Network Tools for Diagnostics</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Network administrators and IT professionals require reliable diagnostic tools to troubleshoot connectivity issues and analyze network infrastructure. Our network tools provide instant access to essential information like your public IP address, ISP details, and domain resolution data. The Domain to IP converter quickly translates domain names to their corresponding IP addresses, essential for DNS troubleshooting and server configuration.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Advanced tools like WHOIS Lookup reveal domain registration information, ownership details, and expiration dates. DNS Lookup tools query various DNS record types including A, AAAA, MX, TXT, and CNAME records. Port checking utilities verify if specific ports are open or closed on remote servers, crucial for firewall configuration and security auditing.
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-12 mb-6">Why Choose Our Free Online Tools?</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Unlike many online tool platforms that require registration, impose usage limits, or collect user data, our tools are completely free and privacy-focused. All processing happens directly in your browser, ensuring your sensitive data never leaves your device. This client-side approach means faster performance, enhanced privacy, and no server-side data storage or tracking.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    We believe professional-grade tools should be accessible to everyone, regardless of budget. Whether you're a freelancer, startup founder, or enterprise professional, you get the same high-quality tools without paywalls or feature restrictions. Our commitment to 100% free access means you can rely on these tools for your critical workflows without worrying about subscription renewals or usage quotas.
                </p>

                <h3 class="text-3xl font-bold text-gray-900 mt-12 mb-6">Frequently Asked Questions</h3>
                
                <div class="space-y-6 mt-8">
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Do I need to create an account to use these tools?</h4>
                        <p class="text-gray-700">No, all our tools are accessible without any registration or account creation. Simply visit the tool page and start using it immediately. This no-registration approach ensures maximum convenience and protects your privacy.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Are there any usage limits or restrictions?</h4>
                        <p class="text-gray-700">No, you can use any tool as many times as you need without restrictions. There are no daily limits, no premium tiers, and no hidden costs. All features are available to all users equally.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">How do you ensure data privacy and security?</h4>
                        <p class="text-gray-700">Most of our tools process data entirely in your browser using client-side JavaScript. This means your data never leaves your device and isn't stored on our servers. For tools that require server processing, we don't log or retain any user data.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Can I use these tools for commercial projects?</h4>
                        <p class="text-gray-700">Yes, absolutely! Our tools are free for both personal and commercial use. Whether you're working on client projects, building your business, or creating content professionally, you're welcome to use our tools without any licensing restrictions.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Do these tools work on mobile devices?</h4>
                        <p class="text-gray-700">Yes, all our tools are fully responsive and work seamlessly on smartphones and tablets. The interface adapts to your screen size, ensuring a great user experience whether you're on desktop, mobile, or tablet.</p>
                    </div>
                </div>

                <div class="mt-12 p-8 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl border-2 border-indigo-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Start Using Professional Tools Today</h3>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Join thousands of creators, developers, and professionals who rely on our free online tools daily. No credit card required, no trial periods, no commitments—just instant access to professional-grade tools that help you work smarter and faster.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#youtube-tools" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                            Explore YouTube Tools
                        </a>
                        <a href="#seo-tools" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                            Explore SEO Tools
                        </a>
                        <a href="#utility-tools" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-600 text-white rounded-lg font-bold hover:shadow-lg transition-all">
                            Explore Utility Tools
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
'@

# Replace @endsection with SEO section + @endsection
$content = $content -replace '@endsection', "$seoSection`r`n@endsection"

# Write back to file
Set-Content -Path $file -Value $content -NoNewline

Write-Host "SEO section added successfully!"
