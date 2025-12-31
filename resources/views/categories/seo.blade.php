@extends('layouts.app')

@section('title', 'SEO Tools - Free Professional SEO Tools | Optimizo')
@section('meta_description', 'Free SEO tools including keyword density checker, meta tag analyzer, word counter, and more. Optimize your content for search engines.')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-green-500 via-emerald-500 to-teal-600 rounded-2xl p-6 mb-8 shadow-xl">

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-xl shadow-lg mb-3">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">
                    SEO Tools
                </h1>
                <p class="text-sm md:text-base text-white/90 font-medium max-w-2xl mx-auto mb-3">
                    Professional SEO tools to optimize your content - 100% free
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-2xl font-black text-white">{{ $tools->count() }}</div>
                        <div class="text-xs text-white/80">Free Tools</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-2xl font-black text-white">100%</div>
                        <div class="text-xs text-white/80">Free Forever</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-2xl font-black text-white">⚡</div>
                        <div class="text-xs text-white/80">Instant Access</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tools Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($tools as $tool)
                <a href="{{ route($tool->route_name) }}"
                    class="group bg-white rounded-2xl p-6 shadow-lg border-2 border-green-200 hover:border-green-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            @include('components.tool-icon', ['slug' => $tool->slug])
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-green-600 transition-colors">
                                {{ $tool->name }}
                            </h3>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $tool->meta_description }}
                    </p>
                </a>
            @endforeach
        </div>

        <!-- Back to Home -->
        <div class="text-center mb-12">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>
    </div>
@endsection