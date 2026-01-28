@extends('layouts.app')

@section('title', __page('terms', 'meta.title'))
@section('meta_description', __page('terms', 'meta.description'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <h1 class="text-4xl font-black text-gray-900 mb-6">{{ __page('terms', 'title') }}</h1>
            <p class="text-gray-600 mb-8">{{ __page('terms', 'last_updated') }}: {{ date('F d, Y') }}</p>

            <div class="prose prose-lg max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.1.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ __page('terms', 'sections.1.content') }}
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.2.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    {{ __page('terms', 'sections.2.content') }}
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 ml-4">
                    @foreach(__page('terms', 'sections.2.items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.3.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {!! str_replace('{link}', '<a href="' . route('privacy') . '" class="text-blue-600 hover:text-blue-800 underline">' . __page('terms', 'privacy_link') . '</a>', __page('terms', 'sections.3.content')) !!}
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.4.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ __page('terms', 'sections.4.content') }}
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.5.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ __page('terms', 'sections.5.content') }}
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.6.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ __page('terms', 'sections.6.content') }}
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.7.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ __page('terms', 'sections.7.content') }}
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ __page('terms', 'sections.8.title') }}</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {!! str_replace('{link}', '<a href="' . route('contact') . '" class="text-blue-600 hover:text-blue-800 underline">' . __page('terms', 'contact_link') . '</a>', __page('terms', 'sections.8.content')) !!}
                </p>
            </div>
        </div>
    </div>
@endsection