@extends('layouts.app')

@section('title', __tool('pdf-to-jpg', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('pdf-to-jpg', 'seo.description', $tool->meta_description))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <x-tool-hero :tool="$tool" />

    <!-- Tool Interface Section -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ __tool('pdf-to-jpg', 'form.upload_title') }}
            </h2>
            <p class="text-lg text-gray-600">{{ __tool('pdf-to-jpg', 'form.upload_subtitle') }}</p>
        </div>

        <form id="converterForm" action="{{ route('utility.pdf-to-jpg.process') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-amber-100 rounded-3xl p-10 text-center hover:border-amber-300 hover:bg-amber-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".pdf">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 text-amber-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">{{ __tool('pdf-to-jpg', 'form.upload_text') }}</p>
                        <p class="text-base text-gray-500 mt-2">{{ __tool('pdf-to-jpg', 'form.file_size_limit') }}</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-amber-600 font-medium hidden text-lg"></div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 focus:outline-none focus:ring-4 focus:ring-amber-500/50 transform hover:-translate-y-1 transition-all">
                    {{ __tool('pdf-to-jpg', 'form.button') }}
                    <!-- Icon: Arrow Right -->
                    <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
                <p class="mt-4 text-sm text-gray-400">{{ __tool('pdf-to-jpg', 'form.dev_notice') }}</p>
            </div>
        </form>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">{{ __tool('pdf-to-jpg', 'content.main_title') }}</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    {{ __tool('pdf-to-jpg', 'content.main_desc') }}
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Photograph -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('pdf-to-jpg', 'content.feature1_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('pdf-to-jpg', 'content.feature1_desc') }}</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Share -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('pdf-to-jpg', 'content.feature2_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('pdf-to-jpg', 'content.feature2_desc') }}</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-yellow-100 text-yellow-600 rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon: Folder Open -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('pdf-to-jpg', 'content.feature3_title') }}</h3>
                    <p class="text-base text-gray-600 leading-relaxed">{{ __tool('pdf-to-jpg', 'content.feature3_desc') }}</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('pdf-to-jpg', 'content.how_to_title') }}</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('pdf-to-jpg', 'content.step1_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('pdf-to-jpg', 'content.step1_desc') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('pdf-to-jpg', 'content.step2_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('pdf-to-jpg', 'content.step2_desc') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900 text-lg">{{ __tool('pdf-to-jpg', 'content.step3_title') }}</strong>
                                <p class="mt-1 text-gray-600">{{ __tool('pdf-to-jpg', 'content.step3_desc') }}</p>
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