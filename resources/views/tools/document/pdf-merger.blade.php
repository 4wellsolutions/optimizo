@extends('layouts.app')

@section('title', __tool('pdf-merger', 'meta.title'))
@section('meta_description', __tool('pdf-merger', 'meta.description'))
@if($tool->meta_keywords)
@endif

@section('content')
    <x-tool-hero :tool="$tool" />
    <!-- Wide Form -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ __tool('pdf-merger', 'form.upload_title') }}</h2>
            <p class="text-lg text-gray-600">{{ __tool('pdf-merger', 'form.upload_subtitle') }}</p>
        </div>

        <form id="converterForm" action="{{ route('document.pdf-merger.process') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-indigo-100 rounded-3xl p-10 text-center hover:border-indigo-300 hover:bg-indigo-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="files[]" id="file" multiple
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".pdf">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-indigo-100 text-indigo-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">{{ __tool('pdf-merger', 'form.upload_text') }}</p>
                        <p class="text-base text-gray-500 mt-2">{{ __tool('pdf-merger', 'form.file_size_limit') }}</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-indigo-600 font-medium hidden text-lg"></div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transform hover:-translate-y-1 transition-all">
                    {{ __tool('pdf-merger', 'form.button') }}
                    <!-- Icon: Arrow Right -->
                    <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
                <p class="mt-4 text-sm text-gray-400">{{ __tool('pdf-merger', 'form.dev_notice') }}</p>
            </div>
        </form>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">{{ __tool('pdf-merger', 'content.main_title') }}</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    {{ __tool('pdf-merger', 'content.main_desc') }}
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: View List -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('pdf-merger', 'content.feature1_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('pdf-merger', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Desktop Computer -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('pdf-merger', 'content.feature2_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('pdf-merger', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-cyan-100 text-cyan-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Link -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('pdf-merger', 'content.feature3_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('pdf-merger', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('pdf-merger', 'content.how_to_title') }}</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('pdf-merger', 'content.step1_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('pdf-merger', 'content.step1_desc') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('pdf-merger', 'content.step2_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('pdf-merger', 'content.step2_desc') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('pdf-merger', 'content.step3_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('pdf-merger', 'content.step3_desc') }}</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </article>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/document-converter-ajax.js') }}"></script>
@endpush