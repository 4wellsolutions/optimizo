@extends('layouts.app')

@section('title', 'About Us - Optimizo')
@section('meta_description', 'Learn about Optimizo and our mission to provide free, fast, and privacy-focused online tools.')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-3xl shadow-2xl p-8 md:p-12 mb-8">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-black text-gray-900 mb-4">About Optimizo</h1>
                <p class="text-xl text-gray-600">Free, Fast, and Privacy-Focused Online Tools</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Mission</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Optimizo was created with a simple mission: to provide powerful, easy-to-use online tools that respect your
                privacy and don't require registration or payment. We believe everyone should have access to
                professional-grade tools without compromising their data or privacy.
            </p>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Whether you're a content creator, developer, SEO professional, or just someone who needs quick online tools,
                Optimizo has you covered with a comprehensive suite of utilities designed to make your work easier and
                faster.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">What Makes Us Different</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border-2 border-blue-200">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Privacy First</h3>
                    <p class="text-gray-700">Most tools process data entirely in your browser. Your files never leave your
                        device.</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-xl p-6 border-2 border-green-200">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Lightning Fast</h3>
                    <p class="text-gray-700">Optimized for speed with instant results and no waiting times.</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200">
                    <div class="text-4xl mb-3">🆓</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">100% Free</h3>
                    <p class="text-gray-700">All tools are completely free with no hidden fees or premium tiers.</p>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                    <div class="text-4xl mb-3">🚫</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">No Registration</h3>
                    <p class="text-gray-700">Use any tool instantly without creating an account or signing up.</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Tools</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">📺 YouTube Tools</h3>
                    <p class="text-gray-700">Thumbnail downloaders, title extractors, tag generators, and more to help
                        content creators optimize their YouTube presence.</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">🔍 SEO Tools</h3>
                    <p class="text-gray-700">Keyword density checkers, meta tag analyzers, and word counters to improve your
                        content's search engine visibility.</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">🌐 Network Tools</h3>
                    <p class="text-gray-700">IP lookup, WHOIS, DNS lookup, and other network diagnostic tools for developers
                        and IT professionals.</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">🛠️ Utility Tools</h3>
                    <p class="text-gray-700">Image compressors, Base64 encoders, QR generators, and many more everyday
                        utilities.</p>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-8 md:p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Get in Touch</h2>
            <p class="text-lg mb-6 text-white/90">Have questions, suggestions, or feedback? We'd love to hear from you!</p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-white text-indigo-600 font-bold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                Contact Us
            </a>
        </div>
    </div>
@endsection