@extends('layouts.app')

@section('title', __tool('base64-to-image-converter', 'meta.title'))
@section('meta_description', __tool('base64-to-image-converter', 'meta.description'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-gray-100 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{!! __tool('base64-to-image-converter', 'input.title') !!}
                </h2>
                <p class="text-gray-600">{!! __tool('base64-to-image-converter', 'input.desc') !!}</p>
            </div>

            <!-- Input Area -->
            <div class="mb-6">
                <textarea id="base64Input" placeholder="{!! __tool('base64-to-image-converter', 'input.placeholder') !!}"
                    class="w-full h-48 bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-4 font-mono text-sm text-gray-700 focus:border-gray-500 focus:ring-0 resize-none transition-all placeholder-gray-400"></textarea>
            </div>

            <button id="convertBtn"
                class="w-full bg-gray-900 hover:bg-black text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2 mb-8">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                {!! __tool('base64-to-image-converter', 'input.btn_decode') !!}
            </button>

            <!-- Result Area -->
            <div id="resultArea" class="hidden mt-8 grid md:grid-cols-2 gap-8 animate-fade-in">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="{!! __tool('base64-to-image-converter', 'result.image_alt') !!}">
                </div>

                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <div class="text-center text-gray-600 font-medium">
                        {!! __tool('base64-to-image-converter', 'result.success') !!}
                    </div>

                    <div class="flex flex-col gap-4">
                        <button id="downloadBtn"
                            class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-md transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            {!! __tool('base64-to-image-converter', 'result.btn_download') !!}
                        </button>
                        <button id="clearBtn"
                            class="px-8 py-4 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-xl transition-colors w-full">
                            {!! __tool('base64-to-image-converter', 'result.btn_clear') !!}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-indigo max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">
                    {!! __tool('base64-to-image-converter', 'content.title') !!}
                </h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        {!! __tool('base64-to-image-converter', 'content.p1') !!}
                    </p>
                    <p>
                        {!! __tool('base64-to-image-converter', 'content.p2') !!}
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('base64-to-image-converter', 'content.features.preview.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {!! __tool('base64-to-image-converter', 'content.features.preview.desc') !!}
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('base64-to-image-converter', 'content.features.auto.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {!! __tool('base64-to-image-converter', 'content.features.auto.desc') !!}
                        </p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('base64-to-image-converter', 'content.features.download.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {!! __tool('base64-to-image-converter', 'content.features.download.desc') !!}
                        </p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">
                            {!! __tool('base64-to-image-converter', 'content.how_to.title') !!}
                        </h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            @php
                                $howToSteps = __tool('base64-to-image-converter', 'content.how_to.list');
                                $howToSteps = is_array($howToSteps) ? $howToSteps : [];
                            @endphp
                            @foreach($howToSteps as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">
                            {!! __tool('base64-to-image-converter', 'content.use_cases.title') !!}
                        </h3>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            @php
                                $useCases = __tool('base64-to-image-converter', 'content.use_cases.list');
                                $useCases = is_array($useCases) ? $useCases : [];
                            @endphp
                            @foreach($useCases as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </article>
        </div>

        @push('scripts')
            <script>
                const base64Input = document.getElementById('base64Input');
                const convertBtn = document.getElementById('convertBtn');
                const resultArea = document.getElementById('resultArea');
                const imagePreview = document.getElementById('imagePreview');
                const downloadBtn = document.getElementById('downloadBtn');
                const clearBtn = document.getElementById('clearBtn');

                convertBtn.addEventListener('click', () => {
                    const input = base64Input.value.trim();
                    if (!input) { showError('{!! __tool('base64-to-image-converter', 'js.input_required') !!}'); return; }

                    // Basic validation/cleanup
                    // Note: Users might paste just the base64 part without data URI prefix.
                    // A robust tool might try to detect common headers, but let's assume if it doesn't start with data:image, we might need to add it or fail.
                    // For now, we set src directly, browsers are good at handling data URIs.

                    imagePreview.src = input;

                    imagePreview.onerror = () => {
                        showError('{!! __tool('base64-to-image-converter', 'js.invalid_error') !!}');
                        resultArea.classList.add('hidden');
                    };

                    imagePreview.onload = () => {
                        resultArea.classList.remove('hidden');
                    };
                });

                downloadBtn.addEventListener('click', () => {
                    const link = document.createElement('a');
                    link.href = imagePreview.src;
                    // Try to guess extension from mime
                    let ext = 'png';
                    const match = imagePreview.src.match(/data:image\/(.*?);/);
                    if (match && match[1]) ext = match[1];

                    link.download = 'decoded-image.' + ext;
                    link.click();
                });

                clearBtn.addEventListener('click', () => {
                    base64Input.value = '';
                    resultArea.classList.add('hidden');
                    imagePreview.src = '';
                });
            </script>
        @endpush
@endsection