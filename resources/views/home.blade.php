@extends('layouts.app')

@section('title', 'Optimizo - Professional Online Tools')
@section('meta_description', 'Free professional online tools for YouTube creators, SEO optimization, and daily utilities. No registration required.')

@section('content')
    <!-- Hero Section -->
    <div class="text-center py-12 md:py-16 animate-fade-in">
        <div class="mb-6 inline-block">
            <span
                class="px-6 py-3 bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wide">
                27+ Free Professional Tools
            </span>
        </div>
        <h1 class="hero-title animate-float">
            Professional Tools<br>for Creators
        </h1>
        <p class="hero-subtitle">
            Access 27+ free, powerful, and easy-to-use tools for YouTube, SEO, and daily problem solving.<br>
            <span class="font-bold text-indigo-600">No registration required. 100% Free Forever.</span>
        </p>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="#youtube-tools" class="btn-primary">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg>
                Explore YouTube Tools
            </a>
            <a href="#seo-tools" class="btn-secondary">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Browse SEO Tools
            </a>
        </div>
    </div>

    <!-- YouTube Tools Section -->
    <section id="youtube-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-red-500 to-pink-600">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg>
            </div>
            <h2 class="section-title">YouTube Tools</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('youtube.thumbnail') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Thumbnail Downloader</h3>
                <p class="tool-card-description">Download YouTube video thumbnails in all available resolutions instantly.
                </p>
            </a>

            <a href="{{ route('youtube.extractor') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Title & Description Extractor</h3>
                <p class="tool-card-description">Extract video titles, descriptions, and metadata from any YouTube video.
                </p>
            </a>

            <a href="{{ route('youtube.tags') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Tag Generator</h3>
                <p class="tool-card-description">Generate relevant tags for your YouTube videos to improve discoverability.
                </p>
            </a>

            <a href="{{ route('youtube.channel') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Channel Data Extractor</h3>
                <p class="tool-card-description">Extract detailed information from any YouTube channel.
                </p>
            </a>

            <a href="{{ route('youtube.handle') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Handle Checker</h3>
                <p class="tool-card-description">Check if a YouTube handle is available for your channel.
                </p>
            </a>

            <a href="{{ route('youtube.monetization') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Monetization Checker</h3>
                <p class="tool-card-description">Check if a YouTube channel is monetized.
                </p>
            </a>
        </div>
    </section>

    <!-- SEO Tools Section -->
    <section id="seo-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-green-500 to-emerald-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h2 class="section-title">SEO Tools</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('seo.meta-analyzer') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Meta Tag Analyzer</h3>
                <p class="tool-card-description">Analyze and optimize meta tags for better search engine rankings.</p>
            </a>

            <a href="{{ route('seo.keyword-density') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Keyword Density Checker</h3>
                <p class="tool-card-description">Calculate keyword density and frequency in your content.</p>
            </a>

            <a href="{{ route('seo.word-counter') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Word Counter</h3>
                <p class="tool-card-description">Count words, characters, sentences, and estimate reading time.</p>
            </a>
        </div>
    </section>

    <!-- Utility Tools Section -->
    <section id="utility-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-blue-500 to-cyan-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h2 class="section-title">Utility Tools</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="{{ route('utility.qr-generator') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">QR Generator</h3>
                <p class="tool-card-description">Create custom QR codes instantly.</p>
            </a>

            <a href="{{ route('utility.password-generator') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Password Generator</h3>
                <p class="tool-card-description">Generate secure random passwords.</p>
            </a>

            <a href="{{ route('utility.json-formatter') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="tool-card-title">JSON Formatter</h3>
                <p class="tool-card-description">Format and validate JSON data.</p>
            </a>

            <a href="{{ route('utility.base64') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Base64 Encoder</h3>
                <p class="tool-card-description">Encode and decode Base64 strings.</p>
            </a>

            <a href="{{ route('utility.image-compressor') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Image Compressor</h3>
                <p class="tool-card-description">Compress images without losing quality.</p>
            </a>

            <a href="{{ route('utility.case-converter') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Case Converter</h3>
                <p class="tool-card-description">Convert text to different cases.</p>
            </a>

            <a href="{{ route('utility.md5-generator') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">MD5 Generator</h3>
                <p class="tool-card-description">Generate MD5 hashes from text.</p>
            </a>

            <a href="{{ route('utility.slug-generator') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Slug Generator</h3>
                <p class="tool-card-description">Create SEO-friendly URL slugs.</p>
            </a>

            <a href="{{ route('utility.rgb-hex-converter') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <h3 class="tool-card-title">RGB/HEX Converter</h3>
                <p class="tool-card-description">Convert between RGB and HEX colors.</p>
            </a>

            <a href="{{ route('utility.speed-test') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Internet Speed Test</h3>
                <p class="tool-card-description">Test your internet connection speed.</p>
            </a>

            <a href="{{ route('utility.username-checker') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Username Checker</h3>
                <p class="tool-card-description">Check username availability across platforms.</p>
            </a>

            <a href="{{ route('utility.html-viewer') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="tool-card-title">HTML Viewer</h3>
                <p class="tool-card-description">Preview HTML code in real-time.</p>
            </a>

            <a href="{{ route('utility.json-parser') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">JSON Parser</h3>
                <p class="tool-card-description">Parse and validate JSON data.</p>
            </a>

            <a href="{{ route('utility.code-formatter') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Code Formatter</h3>
                <p class="tool-card-description">Format and beautify code in multiple languages.</p>
            </a>
        </div>
    </section>

    <!-- Network Tools Section -->
    <section id="network-tools" class="mb-24 animate-slide-up">
        <div class="section-header">
            <div class="section-icon bg-gradient-to-br from-purple-500 to-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
            </div>
            <h2 class="section-title">Network Tools</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('network.what-is-my-ip') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="tool-card-title">What is My IP</h3>
                <p class="tool-card-description">Find your public IP address instantly.</p>
            </a>

            <a href="{{ route('network.what-is-my-isp') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                    </svg>
                </div>
                <h3 class="tool-card-title">What is My ISP</h3>
                <p class="tool-card-description">Identify your Internet Service Provider.</p>
            </a>

            <a href="{{ route('network.domain-to-ip') }}" class="tool-card">
                <div class="tool-card-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </div>
                <h3 class="tool-card-title">Domain to IP</h3>
                <p class="tool-card-description">Convert domain names to IP addresses.</p>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section
        class="bg-gradient-to-br from-gray-50 to-indigo-50 rounded-[3rem] p-16 md:p-24 shadow-2xl border-2 border-gray-100">
        <div class="text-center mb-20">
            <div class="mb-6 inline-block">
                <span
                    class="px-6 py-3 bg-white text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wide shadow-lg">
                    Why Choose Us
                </span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black mb-6 text-gray-900" style="letter-spacing: -0.02em;">Why Choose
                Optimizo?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Professional tools designed for creators,
                developers, and marketers</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="feature-card">
                <div class="feature-icon bg-gradient-success">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="feature-title">Lightning Fast</h3>
                <p class="feature-description">All tools are optimized for speed and performance. Get results instantly
                    without any delays.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon bg-gradient-primary">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="feature-title">100% Free</h3>
                <p class="feature-description">No hidden fees, no registration required. Use all tools completely free
                    forever.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon bg-gradient-secondary">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="feature-title">Privacy First</h3>
                <p class="feature-description">Your data stays in your browser. We don't store or track anything you do.</p>
            </div>
        </div>
    </section>
@endsection