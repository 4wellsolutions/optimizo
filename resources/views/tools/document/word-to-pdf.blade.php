@extends('layouts.app')

@section('title', __tool('word-to-pdf', 'meta.title'))
@section('meta_description', __tool('word-to-pdf', 'meta.description'))
@if($tool->meta_keywords)
@endif

@section('content')
    <x-tool-hero :tool="$tool" />

    <!-- Tool Interface Section -->
    <!-- Wide Form -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ __tool('word-to-pdf', 'form.upload_title') }}</h2>
            <p class="text-lg text-gray-600">{{ __tool('word-to-pdf', 'form.upload_subtitle') }}</p>
        </div>

        <form id="converterForm" action="{{ route('document.word-to-pdf.process') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-red-100 rounded-3xl p-10 text-center hover:border-red-300 hover:bg-red-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".doc,.docx,.rtf">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-red-100 text-red-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">{{ __tool('word-to-pdf', 'form.upload_text') }}</p>
                        <p class="text-base text-gray-500 mt-2">{{ __tool('word-to-pdf', 'form.file_size_limit') }}</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-red-600 font-medium hidden text-lg"></div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 focus:outline-none focus:ring-4 focus:ring-red-500/50 transform hover:-translate-y-1 transition-all">
                    {{ __tool('word-to-pdf', 'form.button') }}
                    <!-- Icon: Arrow Right -->
                    <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
                <p class="mt-4 text-sm text-gray-400">{{ __tool('word-to-pdf', 'form.dev_notice') }}</p>
            </div>
        </form>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">{{ __tool('word-to-pdf', 'content.main_title') }}</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    {{ __tool('word-to-pdf', 'content.main_desc') }}
                </p>
            </div>
            <!-- ... SEO content preserved ... -->
            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Lock Closed -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('word-to-pdf', 'content.feature1_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('word-to-pdf', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Eye -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('word-to-pdf', 'content.feature2_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('word-to-pdf', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Lightning -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('word-to-pdf', 'content.feature3_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('word-to-pdf', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('word-to-pdf', 'content.how_to_title') }}</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('word-to-pdf', 'content.step1_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('word-to-pdf', 'content.step1_desc') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('word-to-pdf', 'content.step2_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('word-to-pdf', 'content.step2_desc') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('word-to-pdf', 'content.step3_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('word-to-pdf', 'content.step3_desc') }}</p>
                            </div>
                        </li>
                    </ol>
                </div>
                <!-- ... rest of SEO content ... -->
            </div>
        </article>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/document-converter-ajax.js') }}"></script>
@endpush