@extends('layouts.app')

@section('title', 'Contact Us - Optimizo')
@section('meta_description', 'Get in touch with the Optimizo team. We\'d love to hear your feedback and suggestions.')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl shadow-2xl p-8 md:p-12 mb-8">
            <div class="text-center">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl shadow-xl mb-6">
                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-5xl font-black text-gray-900 mb-4">Contact Us</h1>
                <p class="text-xl text-gray-600">We'd love to hear from you!</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-2 border-green-300 text-green-800 rounded-xl p-6 mb-8">
                <p class="font-bold text-lg">{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="form-label text-base">Your Name</label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="form-label text-base">Your Email</label>
                    <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="subject" class="form-label text-base">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-input" value="{{ old('subject') }}" required>
                    @error('subject')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="form-label text-base">Message</label>
                    <textarea id="message" name="message" rows="6" class="form-input"
                        required>{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Send Message</span>
                </button>
            </form>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="text-4xl mb-3">💬</div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Feedback</h3>
                <p class="text-gray-600 text-sm">Share your thoughts and suggestions</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="text-4xl mb-3">🐛</div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Bug Reports</h3>
                <p class="text-gray-600 text-sm">Help us improve by reporting issues</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="text-4xl mb-3">💡</div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Feature Requests</h3>
                <p class="text-gray-600 text-sm">Tell us what tools you'd like to see</p>
            </div>
        </div>
    </div>
@endsection