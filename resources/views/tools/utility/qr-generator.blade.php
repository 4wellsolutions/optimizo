@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
    @section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
        <div class="max-w-6xl mx-auto">
            <!-- SEO-Optimized Header with Gradient Background -->
            <div
                class="relative overflow-hidden bg-gradient-to-br from-purple-500 via-pink-500 to-red-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>

    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

    <div class="relative z-10 text-center">
        <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
            <svg class="w-9 h-9 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
            </svg>
        </div>
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2 leading-tight">
            QR Code Generator
        </h1>
        <p class="text-base md:text-lg text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
            Create custom QR codes instantly - multiple sizes, instant download, 100% free!
        </p>