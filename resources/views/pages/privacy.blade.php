@extends('layouts.app')

@section('title', __page('privacy', 'meta.title'))
@section('meta_description', __page('privacy', 'meta.description'))

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <h1 class="text-4xl font-black text-gray-900 mb-6">{{ __page('privacy', 'title') }}</h1>
            <p class="text-gray-600 mb-8">{{ __page('privacy', 'last_updated') }}: {{ date('F d, Y') }}</p>

            <div class="prose prose-lg max-w-none">
                @foreach (range(1, 10) as $index)
                    @php
                        $section = __page('privacy', "sections.$index");
                    @endphp

                    @if ($section && is_array($section))
                        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">{{ $section['title'] ?? '' }}</h2>
                        @if (isset($section['content']))
                            <p class="text-gray-700 leading-relaxed mb-6">
                                {!! str_replace('{link}', '<a href="' . route('contact') . '" class="text-blue-600 hover:text-blue-800 underline">' . __page('privacy', 'contact_link') . '</a>', $section['content']) !!}
                            </p>
                        @endif

                        @if (isset($section['items']) && is_array($section['items']))
                            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 ml-4">
                                @foreach ($section['items'] as $item)
                                    <li>{!! $item !!}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (isset($section['client_side']))
                            <p class="text-gray-700 leading-relaxed mb-4">
                                {!! $section['client_side'] !!}
                            </p>
                        @endif

                        @if (isset($section['server_side']))
                            <p class="text-gray-700 leading-relaxed mb-6">
                                {!! $section['server_side'] !!}
                            </p>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection