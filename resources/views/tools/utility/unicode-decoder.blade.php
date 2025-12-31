@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <script>
        window.location.href = '{{ route('utility.unicode-encode') }}#decode';
    </script>

    <div class="max-w-6xl mx-auto text-center py-20">
        <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-purple-600 mx-auto mb-4"></div>
        <p class="text-gray-600">Redirecting to Unicode Encoder/Decoder...</p>
    </div>
@endsection