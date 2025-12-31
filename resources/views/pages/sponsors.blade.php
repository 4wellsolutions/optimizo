@extends('layouts.app')

@section('title', 'Sponsors - Optimizo')
@section('meta_description', 'Support Optimizo and help us keep our tools free for everyone.')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl shadow-2xl p-8 md:p-12 mb-8">
            <div class="text-center">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-black text-gray-900 mb-4">Support Optimizo</h1>
                <p class="text-xl text-gray-600">Help us keep our tools free for everyone</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Why Sponsor Us?</h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                Optimizo is committed to providing free, high-quality online tools to everyone. We don't show intrusive ads,
                we don't sell your data, and we don't require registration. Your support helps us:
            </p>
            <ul class="space-y-3 text-gray-700 text-lg mb-6">
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <span>Keep all tools completely free</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <span>Develop new tools and features</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <span>Maintain and improve existing tools</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <span>Cover server and infrastructure costs</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-green-600 font-bold text-xl">✓</span>
                    <span>Ensure fast and reliable service</span>
                </li>
            </ul>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Sponsorship Tiers</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border-2 border-blue-200">
                    <div class="text-4xl mb-3">☕</div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-2">Coffee</h3>
                    <p class="text-3xl font-black text-blue-600 mb-4">$5/mo</p>
                    <ul class="space-y-2 text-gray-700 text-sm">
                        <li>✓ Supporter badge</li>
                        <li>✓ Our gratitude</li>
                        <li>✓ Early access to new tools</li>
                    </ul>
                </div>
                <div
                    class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200 transform scale-105">
                    <div class="text-4xl mb-3">🚀</div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-2">Pro</h3>
                    <p class="text-3xl font-black text-purple-600 mb-4">$15/mo</p>
                    <ul class="space-y-2 text-gray-700 text-sm">
                        <li>✓ All Coffee benefits</li>
                        <li>✓ Priority support</li>
                        <li>✓ Feature requests</li>
                        <li>✓ Name in credits</li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                    <div class="text-4xl mb-3">⭐</div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-2">Enterprise</h3>
                    <p class="text-3xl font-black text-orange-600 mb-4">$50/mo</p>
                    <ul class="space-y-2 text-gray-700 text-sm">
                        <li>✓ All Pro benefits</li>
                        <li>✓ Logo on homepage</li>
                        <li>✓ Custom tools</li>
                        <li>✓ API access</li>
                    </ul>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-8 md:p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Support?</h2>
            <p class="text-lg mb-6 text-white/90">Contact us to discuss sponsorship opportunities</p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-white text-indigo-600 font-bold px-8 py-4 rounded-xl hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                Get in Touch
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Our Sponsors</h2>
            <p class="text-gray-600 text-center mb-8">Thank you to our amazing sponsors who make Optimizo possible!</p>
            <div class="text-center text-gray-500">
                <p class="text-lg">Be the first to sponsor Optimizo!</p>
                <p class="text-sm mt-2">Your logo and link could be here</p>
            </div>
        </div>
    </div>
@endsection