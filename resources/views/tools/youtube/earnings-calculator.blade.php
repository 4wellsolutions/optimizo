@extends('layouts.app')

@section('title', 'YouTube Earnings Calculator - Calculate YouTube Revenue | Optimizo')
@section('meta_description', 'Calculate potential YouTube earnings based on views and engagement. Free YouTube money calculator.')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-red-500 via-pink-500 to-purple-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
                    YouTube Earnings Calculator
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Calculate potential YouTube earnings based on views and engagement!
                </p>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Calculate YouTube Earnings</h2>
            <form id="earningsForm">
                @csrf
                <div class="mb-6">
                    <label for="views" class="form-label text-base">Daily Video Views</label>
                    <input type="number" id="views" name="views" class="form-input" placeholder="10000" min="0" required>
                    <p class="text-sm text-gray-500 mt-2">Enter your average daily video views</p>
                </div>

                <div class="mb-6">
                    <label for="cpm" class="form-label text-base">Estimated CPM ($)</label>
                    <input type="number" id="cpm" name="cpm" class="form-input" placeholder="2.50" min="0" step="0.01"
                        value="2.50" required>
                    <p class="text-sm text-gray-500 mt-2">Average CPM ranges from $0.25 to $4.00</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">Calculate Earnings</span>
                </button>
            </form>
        </div>
    </div>
@endsection