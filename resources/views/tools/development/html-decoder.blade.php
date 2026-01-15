@extends('layouts.app')

@section('title', __tool('html-encoder', 'meta.redirect_title'))

@section('content')
    <div class="container mx-auto px-4 py-8 text-center">
        <h1 class="text-3xl font-bold mb-4">{{ __tool('html-encoder', 'meta.redirect_title') }}</h1>
        <p>{{ __tool('html-encoder', 'meta.redirect_msg') }} <a
                href="{{ route('tool.show', ['tool' => 'html-encoder']) }}#decode"
                class="text-blue-600 hover:underline">{{ __tool('html-encoder', 'meta.redirect_manual') }}</a>.</p>
    </div>

    @push('scripts')
        <script>
            window.location.href = "{{ route('tool.show', ['tool' => 'html-encoder']) }}#decode";
        </script>
    @endpush

    <div class="max-w-6xl mx-auto text-center py-20">
        <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-orange-600 mx-auto mb-4"></div>
        <p class="text-gray-600">Redirecting to HTML Encoder/Decoder...</p>
    </div>
@endsection