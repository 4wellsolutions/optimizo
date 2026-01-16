@extends('layouts.app')

@section('title', __tool('local-time-to-utc', 'meta.title'))
@section('meta_description', __tool('local-time-to-utc', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" title="{{ $tool->name }}" description="{{ $tool->meta_description }}" />

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
             <div class="p-8 text-center text-gray-500 border-2 border-dashed border-gray-200 rounded-xl">
                {!! __tool('local-time-to-utc', 'meta.h1') !!} - Placeholder
             </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold mb-4">{!! __tool('local-time-to-utc', 'content.what_is_title') !!}</h2>
            <p class="text-gray-600">{!! __tool('local-time-to-utc', 'content.what_is_desc') !!}</p>
        </div>
    </div>
@endsection