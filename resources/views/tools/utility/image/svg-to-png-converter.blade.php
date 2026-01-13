@extends('layouts.app')

@section('title', __tool('svg-to-png-converter', 'meta.title'))
@section('meta_description', __tool('svg-to-png-converter', 'meta.desc'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool Interface -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-rose-50 mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{!! __tool('svg-to-png-converter', 'input.title') !!}</h2>
                <p class="text-gray-600">{!! __tool('svg-to-png-converter', 'input.desc') !!}</p>
            </div>

            <div id="dropZone"
                class="border-3 border-dashed border-rose-200 rounded-2xl p-8 hover:border-rose-400 hover:bg-rose-50 transition-all cursor-pointer text-center relative group">
                <input type="file" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/svg+xml">
                <div class="space-y-4 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 text-rose-600 rounded-full group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-700">{!! __tool('svg-to-png-converter', 'input.drop_title') !!}</p>
                        <p class="text-sm text-gray-500">{!! __tool('svg-to-png-converter', 'input.drop_desc') !!}</p>
                    </div>
                </div>
            </div>

            <div id="editorArea" class="hidden mt-8 grid md:grid-cols-2 gap-8">
                <!-- Left Column: Image Preview -->
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center border border-gray-200 h-[400px]">
                    <img id="imagePreview"
                        class="max-h-full max-w-full object-contain rounded-lg shadow-sm bg-[url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAF0lEQVQ4T2N89+7df3Qmo2F4NAyjYQAAq003wQ2u5x4AAAAASUVORK5CYII=')] bg-repeat"
                        src="" alt="{!! __tool('svg-to-png-converter', 'editor.image_alt') !!}">
                </div>
                <!-- Right Column: Actions -->
                <div class="flex flex-col justify-center space-y-6">
                    <p class="text-xs text-center text-gray-400">{!! __tool('svg-to-png-converter', 'editor.checkerboard') !!}</p>

                    <div class="text-center text-gray-600 font-medium">
                        {!! __tool('svg-to-png-converter', 'editor.output_format') !!} <span class="font-bold text-rose-600">PNG</span>
                    </div>

                    <div class="w-full">
                        <label class="block text-sm font-bold text-gray-700 mb-2">{!! __tool('svg-to-png-converter', 'editor.scale_label') !!}</label>
                        <select id="scaleSelect"
                            class="w-full rounded-lg border-gray-300 focus:border-rose-500 shadow-sm p-3">
                            <option value="1">{!! __tool('svg-to-png-converter', 'editor.scale_1') !!}</option>
                            <option value="2">{!! __tool('svg-to-png-converter', 'editor.scale_2') !!}</option>
                            <option value="4">{!! __tool('svg-to-png-converter', 'editor.scale_4') !!}</option>
                        </select>
                    </div>

                    <button id="convertBtn"
                        class="w-full bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 text-white font-bold py-4 rounded-xl shadow-lg transform hover:scale-[1.01] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        </svg>
                        {!! __tool('svg-to-png-converter', 'editor.btn_convert') !!}
                    </button>
                </div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="mt-12 mb-20 max-w-7xl mx-auto">
            <article
                class="prose prose-lg prose-rose max-w-none bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-6 text-center">{!! __tool('svg-to-png-converter', 'content.title') !!}</h2>
                <div class="text-gray-600 text-center mb-12">
                    <p class="mb-4">
                        {!! __tool('svg-to-png-converter', 'content.p1') !!}
                    </p>
                    <p>
                        {!! __tool('svg-to-png-converter', 'content.p2') !!}
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">{!! __tool('svg-to-png-converter', 'content.features.transparency.title') !!}</h3>
                        <p class="text-sm text-gray-600">{!! __tool('svg-to-png-converter', 'content.features.transparency.desc') !!}</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">{!! __tool('svg-to-png-converter', 'content.features.scaling.title') !!}</h3>
                        <p class="text-sm text-gray-600">{!! __tool('svg-to-png-converter', 'content.features.scaling.desc') !!}</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 text-center">
                        <div
                            class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-900">{!! __tool('svg-to-png-converter', 'content.features.browser.title') !!}</h3>
                        <p class="text-sm text-gray-600">{!! __tool('svg-to-png-converter', 'content.features.browser.desc') !!}</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">{!! __tool('svg-to-png-converter', 'content.how_to.title') !!}</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                             @foreach(__tool('svg-to-png-converter', 'content.how_to.list') as $step)
                                <li>{!! $step !!}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-900">{!! __tool('svg-to-png-converter', 'content.why.title') !!}</h3>
                        <p class="text-gray-600 mb-4">
                            {!! __tool('svg-to-png-converter', 'content.why.p1') !!}
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                             @foreach(__tool('svg-to-png-converter', 'content.why.list') as $item)
                                <li>{!! $item !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <hr class="my-12 border-gray-200">

                <div>
                    <h3 class="font-bold text-2xl mb-6 text-center text-gray-900">{!! __tool('svg-to-png-converter', 'content.faq.title') !!}</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">{!! __tool('svg-to-png-converter', 'content.faq.q1') !!}</h4>
                            <p class="text-gray-600 text-sm">{!! __tool('svg-to-png-converter', 'content.faq.a1') !!}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-lg mb-2 text-gray-800">{!! __tool('svg-to-png-converter', 'content.faq.q2') !!}</h4>
                            <p class="text-gray-600 text-sm">{!! __tool('svg-to-png-converter', 'content.faq.a2') !!}</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

    @push('scripts')
    <script>
        const imageInput = document.getElementById('imageInput');
        const dropZone = document.getElementById('dropZone');
        const editorArea = document.getElementById('editorArea');
        const imagePreview = document.getElementById('imagePreview');
        const convertBtn = document.getElementById('convertBtn');
        const scaleSelect = document.getElementById('scaleSelect');

        // Drag & Drop
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-rose-500', 'bg-rose-50'); });
        dropZone.addEventListener('dragleave', (e) => { e.preventDefault(); dropZone.classList.remove('border-rose-500', 'bg-rose-50'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-rose-500', 'bg-rose-50');
            if (e.dataTransfer.files[0]) handleFile(e.dataTransfer.files[0]);
        });

        imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

        function handleFile(file) {
            if (!file.type.match('image/svg.*')) { showError('{!! __tool('svg-to-png-converter', 'js.invalid_image') !!}'); return; }
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
                const scale = parseInt(scaleSelect.value);
                canvas.width = img.width * scale;
                canvas.height = img.height * scale;

                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                const dataUrl = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.download = 'converted-svg.png';
                link.href = dataUrl;
                link.click();
            };
        });
    </script>
    @endpush
@endsection