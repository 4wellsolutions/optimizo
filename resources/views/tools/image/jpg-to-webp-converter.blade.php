@extends('layouts.app')

@section('title', __tool('jpg-to-webp-converter', 'meta.title'))
@section('meta_description', __tool('jpg-to-webp-converter', 'meta.desc'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-orange-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{!! __tool('jpg-to-webp-converter', 'input.title') !!}</h2>
                <p class="text-gray-600">{!! __tool('jpg-to-webp-converter', 'input.desc') !!}</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-orange-200 rounded-2xl p-8 hover:border-orange-400 hover:bg-orange-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/jpeg, image/jpg">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 text-orange-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">{!! __tool('jpg-to-webp-converter', 'input.drop_title') !!}</p>
                        <p class="text-sm text-gray-500">{!! __tool('jpg-to-webp-converter', 'input.drop_desc') !!}</p>
                    </div>
                </div>
            </div>

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview" class="max-h-full max-w-full object-contain rounded-lg shadow-sm" src=""
                        alt="{!! __tool('jpg-to-webp-converter', 'editor.image_alt') !!}">
                </div>

                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <div class="text-center text-gray-600 font-medium">
                        {!! __tool('jpg-to-webp-converter', 'editor.output_format') !!} <span
                            class="font-bold text-orange-600">{!! __tool('jpg-to-webp-converter', 'editor.format_short') !!}</span>
                    </div>

                    <div class="w-full">
                        <label
                            class="block text-sm font-bold text-gray-700 mb-2">{!! __tool('jpg-to-webp-converter', 'editor.quality') !!}</label>
                        <div class="flex items-center gap-4">
                            <input type="range" id="qualityRange" min="0.1" max="1.0" step="0.1" value="0.8"
                                class="w-full h-2 bg-orange-200 rounded-lg appearance-none cursor-pointer">
                            <span id="qualityValue" class="text-sm font-bold text-orange-600 w-12">80%</span>
                        </div>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        {!! __tool('jpg-to-webp-converter', 'editor.btn_convert') !!}
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
            <article class="prose prose-lg prose-blue max-w-none">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">
                    {!! __tool('jpg-to-webp-converter', 'content.title') !!}
                </h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        {!! __tool('jpg-to-webp-converter', 'content.p1') !!}
                    </p>
                    <p>
                        {!! __tool('jpg-to-webp-converter', 'content.p2') !!}
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('jpg-to-webp-converter', 'content.features.faster.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">{!! __tool('jpg-to-webp-converter', 'content.features.faster.desc') !!}</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('jpg-to-webp-converter', 'content.features.quality.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">{!! __tool('jpg-to-webp-converter', 'content.features.quality.desc') !!}</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 text-center">
                        <div
                            class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">
                            {!! __tool('jpg-to-webp-converter', 'content.features.secure.title') !!}
                        </h3>
                        <p class="text-sm text-gray-600">{!! __tool('jpg-to-webp-converter', 'content.features.secure.desc') !!}</p>
                    </div>
                </div>

                <!-- How-to and FAQ Guide -->
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">
                            {!! __tool('jpg-to-webp-converter', 'content.how_to.title') !!}</h3>
                        <ol class="list-decimal pl-5 space-y-3 text-gray-600">
                            @foreach(__tool('jpg-to-webp-converter', 'content.how_to.list') as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">{!! __tool('jpg-to-webp-converter', 'content.faq.title') !!}
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-bold text-lg text-gray-800">{!! __tool('jpg-to-webp-converter', 'content.faq.q1') !!}
                                </h4>
                                <p class="text-gray-600 text-sm">{!! __tool('jpg-to-webp-converter', 'content.faq.a1') !!}</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-gray-800">{!! __tool('jpg-to-webp-converter', 'content.faq.q2') !!}
                                </h4>
                                <p class="text-gray-600 text-sm">{!! __tool('jpg-to-webp-converter', 'content.faq.a2') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        @push('scripts')
            <script>
                const imageInput = document.getElementById('imageInput');
                const dropZone = document.getElementById('dropZone');
                const editorArea = document.getElementById('editorArea');
                const imagePreview = document.getElementById('imagePreview');
                const convertBtn = document.getElementById('convertBtn');
                const qualityRange = document.getElementById('qualityRange');
                const qualityValue = document.getElementById('qualityValue');

                // Drag & Drop
                dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-orange-500', 'bg-orange-50'); });
                dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-orange-500', 'bg-orange-50'); });
                dropZone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('border-orange-500', 'bg-orange-50');
                    if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
                });

                imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

                qualityRange.addEventListener('input', (e) => { qualityValue.innerText = Math.round(e.target.value * 100) + '%'; });

                function handleFile(file) {
                    if (!file.type.match('image.*')) { showError('{!! __tool('jpg-to-webp-converter', 'js.invalid_image') !!}'); return; }
                    const reader = new FileReader();
                    reader.onload = (e) => { imagePreview.src = e.target.result; editorArea.classList.remove('hidden'); };
                    reader.readAsDataURL(file);
                }

                convertBtn.addEventListener('click', () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    const img = new Image();
                    img.src = imagePreview.src;
                    img.onload = () => {
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);
                        const quality = parseFloat(qualityRange.value);
                        const dataUrl = canvas.toDataURL('image/webp', quality);
                        const link = document.createElement('a');
                        link.download = '{!! __tool('jpg-to-webp-converter', 'js.converted_name') !!}.webp';
                        link.href = dataUrl;
                        link.click();
                    };
                });
            </script>
        @endpush
@endsection