# Replace SEO section with stunning visual design
$file = "d:/workspace/optimizo/resources/views/home.blade.php"
$content = Get-Content $file -Raw

# Find and replace the SEO section
$oldSection = @'
    <!-- SEO Optimized Content Section -->
    <section class="bg-white py-16 md:py-24">
'@

$newSection = @'
    <!-- SEO Optimized Content Section -->
    <section class="relative py-20 md:py-32 overflow-hidden bg-gradient-to-br from-gray-50 via-indigo-50 to-purple-50">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full filter blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in">
                <div class="inline-block mb-6">
                    <span class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full text-sm font-bold uppercase tracking-wide shadow-lg">
                        Powerful Tools for Everyone
                    </span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6" style="letter-spacing: -0.02em;">
                    Everything You Need,<br>All in One Place
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Professional-grade tools designed for creators, developers, and digital professionals. No registration, no limits, completely free.
                </p>
            </div>

            <!-- Tool Categories Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- YouTube Tools Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-red-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">YouTube Tools</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Grow your channel with powerful analytics and optimization tools. Download thumbnails, extract metadata, check monetization status, and generate SEO-optimized tags to boost discoverability.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Channel analytics & statistics</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Thumbnail downloader & analyzer</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">SEO tag generator & optimizer</span>
                        </li>
                    </ul>
                </div>

                <!-- SEO Tools Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-green-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">SEO Tools</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Optimize your content for search engines and improve rankings. Analyze meta tags, check keyword density, count words, and ensure your content meets SEO best practices.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Meta tag analysis & optimization</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Keyword density checker</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Word counter & reading time</span>
                        </li>
                    </ul>
                </div>

                <!-- Utility Tools Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-blue-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">Utility Tools</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Essential tools for developers and designers. Generate QR codes, create secure passwords, format code, compress images, convert colors, and handle JSON data efficiently.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">QR code & password generators</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Image compression & optimization</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Code formatters & JSON tools</span>
                        </li>
                    </ul>
                </div>

                <!-- Network Tools Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-white hover:border-purple-200 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900 ml-4">Network Tools</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Diagnose network issues and analyze infrastructure. Check your IP address, identify ISP, perform DNS lookups, convert domains to IPs, and verify port connectivity.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">IP address & ISP detection</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">DNS & WHOIS lookup tools</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-purple-500 mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Port checker & domain converter</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mt-20">
                <div class="text-center mb-12">
                    <h3 class="text-4xl font-black text-gray-900 mb-4">Frequently Asked Questions</h3>
                    <p class="text-xl text-gray-600">Everything you need to know about our tools</p>
                </div>

                <div class="grid md:grid-cols-2 gap-6 max-w-6xl mx-auto">
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            Do I need to create an account?
                        </h4>
                        <p class="text-gray-700">No registration required! All tools are instantly accessible without creating an account. Just visit and start using them immediately.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            Are there any usage limits?
                        </h4>
                        <p class="text-gray-700">Absolutely none! Use any tool as many times as you need. No daily limits, no premium tiers, no hidden costs. Everything is 100% free.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            How is my data protected?
                        </h4>
                        <p class="text-gray-700">Most tools process data entirely in your browser. Your information never leaves your device and isn't stored on our servers. Complete privacy guaranteed.</p>
                    </div>

                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 shadow-lg border-2 border-white hover:border-indigo-200 transition-all">
                        <h4 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            Can I use these for commercial projects?
                        </h4>
                        <p class="text-gray-700">Yes! All tools are free for both personal and commercial use. No licensing restrictions, no attribution required. Use them however you need.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-3xl p-12 shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
                    <div class="relative z-10">
                        <h3 class="text-4xl font-black text-white mb-4">Ready to Get Started?</h3>
                        <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                            Join thousands of professionals using our tools daily. No credit card, no trial, no commitments.
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#youtube-tools" class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold hover:bg-gray-100 transition-all hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                                Explore YouTube Tools
                            </a>
                            <a href="#seo-tools" class="inline-flex items-center px-8 py-4 bg-white/20 backdrop-blur-sm text-white border-2 border-white rounded-xl font-bold hover:bg-white/30 transition-all hover:scale-105">
                                Browse All Tools
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
'@

$content = $content.Replace($oldSection, $newSection)
Set-Content -Path $file -Value $content -NoNewline

Write-Host "SEO section visual design upgraded successfully!"
