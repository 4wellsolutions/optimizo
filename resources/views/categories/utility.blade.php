@extends('layouts.app')

@section('title', 'Utility Tools - Free Online Utility Tools | Optimizo')
@section('meta_description', 'Free utility tools including converters, generators, formatters, and more. Professional tools for developers and creators.')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-cyan-500 to-purple-600 rounded-2xl p-6 mb-8 shadow-xl">

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-xl shadow-lg mb-3">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">
                    Utility Tools
                </h1>
                <p class="text-sm md:text-base text-white/90 font-medium max-w-2xl mx-auto mb-3">
                    Professional utility tools for developers and creators - 100% free
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

        <!-- Tools by Subcategory -->
        @php
            $toolsBySubcategory = $tools->groupBy('subcategory');
        @endphp

        @foreach($toolsBySubcategory as $subcategory => $subcategoryTools)
            <div class="mb-10">
                <!-- Subcategory Header -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-blue-300 to-transparent"></div>
                    <h2 class="text-2xl font-black text-gray-900 px-4">
                        {{ $subcategory }}
                        <span class="text-sm font-normal text-gray-500 ml-2">({{ $subcategoryTools->count() }} tools)</span>
                    </h2>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-blue-300 to-transparent"></div>
                </div>

                <!-- Tools Grid for this Subcategory -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($subcategoryTools as $tool)
                        <a href="{{ route($tool->route_name) }}"
                            class="group bg-white rounded-2xl p-6 shadow-lg border-2 border-blue-200 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    @include('components.tool-icon', ['slug' => $tool->slug])
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-900 group-hover:text-blue-600 transition-colors">
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
            </div>
        @endforeach

        <!-- Back to Home -->
        <div class="text-center mb-12">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>
    </div>
@endsection