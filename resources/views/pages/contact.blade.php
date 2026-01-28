@extends('layouts.app')

@section('title', __page('contact', 'meta.title'))
@section('meta_description', __page('contact', 'meta.description'))

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
                <h1 class="text-5xl font-black text-gray-900 mb-4">{{ __page('contact', 'hero.title') }}</h1>
                <p class="text-xl text-gray-600">{{ __page('contact', 'hero.subtitle') }}</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-2 border-green-300 text-green-800 rounded-xl p-6 mb-8">
                <p class="font-bold text-lg">{{ __page('contact', 'success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="form-label text-base">{{ __page('contact', 'form.name') }}</label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="form-label text-base">{{ __page('contact', 'form.email') }}</label>
                    <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="subject" class="form-label text-base">{{ __page('contact', 'form.subject') }}</label>
                    <input type="text" id="subject" name="subject" class="form-input" value="{{ old('subject') }}" required>
                    @error('subject')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="form-label text-base">{{ __page('contact', 'form.message') }}</label>
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
                    <span>{{ __page('contact', 'form.button') }}</span>
                </button>
            </form>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="text-4xl mb-3">💬</div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __page('contact', 'info.feedback.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __page('contact', 'info.feedback.desc') }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="text-4xl mb-3">🐛</div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __page('contact', 'info.bugs.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __page('contact', 'info.bugs.desc') }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <div class="text-4xl mb-3">💡</div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __page('contact', 'info.features.title') }}</h3>
                <p class="text-gray-600 text-sm">{{ __page('contact', 'info.features.desc') }}</p>
            </div>
        </div>
    </div>
@endsection