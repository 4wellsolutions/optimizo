@extends('layouts.app')

@section('title', __tool('xlsx-to-xls', 'seo.title', $tool->meta_title ?? $tool->name))
@section('meta_description', __tool('xlsx-to-xls', 'seo.description', $tool->meta_description ?? $tool->description))

@section('content')
    <x-tool-hero :tool="$tool" />

    <div class="mb-16 px-4">
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ __tool('xlsx-to-xls', 'form.title') }}</h2>
                <p class="text-lg text-gray-600">{{ __tool('xlsx-to-xls', 'form.subtitle') }}</p>
            </div>

            <form id="converterForm" method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="return false;">
                @csrf
                <div class="border-4 border-dashed border-green-100 rounded-3xl p-10 text-center hover:border-green-300 hover:bg-green-50 transition-all cursor-pointer relative group bg-gray-50/50">
                    <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".xlsx">
                    <div class="space-y-6 pointer-events-none">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 text-green-600 rounded-full group-hover:scale-110 transition-transform">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-700">{{ __tool('xlsx-to-xls', 'form.upload_label') }}</p>
                            <p class="text-base text-gray-500 mt-2">{{ __tool('xlsx-to-xls', 'form.upload_help') }}</p>
                        </div>
                    </div>
                    <div id="file-name" class="mt-4 text-green-600 font-medium hidden text-lg"></div>
                </div>

                <div class="text-center">
                    <button type="button" id="convertBtn" class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-4 focus:ring-green-500/50 transform hover:-translate-y-1 transition-all">
                        {{ __tool('xlsx-to-xls', 'form.button') }}
                        <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
            <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">{{ __tool('xlsx-to-xls', 'content.hero_title') }}</h2>
                    <p class="text-xl leading-relaxed text-gray-600">{{ __tool('xlsx-to-xls', 'content.hero_description') }}</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                    <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('xlsx-to-xls', 'content.feature1_title') }}</h3>
                        <p class="text-base text-gray-600 leading-relaxed">{{ __tool('xlsx-to-xls', 'content.feature1_desc') }}</p>
                    </div>
                    <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('xlsx-to-xls', 'content.feature2_title') }}</h3>
                        <p class="text-base text-gray-600 leading-relaxed">{{ __tool('xlsx-to-xls', 'content.feature2_desc') }}</p>
                    </div>
                    <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-2xl text-gray-900 mb-3">{{ __tool('xlsx-to-xls', 'content.feature3_title') }}</h3>
                        <p class="text-base text-gray-600 leading-relaxed">{{ __tool('xlsx-to-xls', 'content.feature3_desc') }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-12">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">{{ __tool('xlsx-to-xls', 'faq.title') }}</h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">{{ __tool('xlsx-to-xls', 'faq.q1') }}</h4>
                            <p class="text-gray-600">{{ __tool('xlsx-to-xls', 'faq.a1') }}</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">{{ __tool('xlsx-to-xls', 'faq.q2') }}</h4>
                            <p class="text-gray-600">{{ __tool('xlsx-to-xls', 'faq.a2') }}</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection

@push('scripts')
<script>
(function() {
    const fileInput = document.getElementById('file');
    const fileName = document.getElementById('file-name');
    const convertBtn = document.getElementById('convertBtn');
    const form = document.getElementById('converterForm');

    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            fileName.textContent = e.target.files[0].name;
            fileName.classList.remove('hidden');
        }
    });

    convertBtn.addEventListener('click', async function() {
        if (!fileInput.files.length) {
            alert('Please select a file');
            return;
        }

        const formData = new FormData(form);
        const originalText = convertBtn.innerHTML;
        
        convertBtn.disabled = true;
        convertBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-3 inline-block" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Converting...';

        try {
            const response = await fetch('{{ route("utility.xlsx-to-xls.convert") }}', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            if (!response.ok) throw new Error('Conversion failed');

            const blob = await response.blob();
            const disposition = response.headers.get('Content-Disposition');
            let filename = 'converted.xls';
            if (disposition) {
                const match = disposition.match(/filename="?([^"]+)"?/);
                if (match) filename = match[1];
            }

            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            URL.revokeObjectURL(url);
            document.body.removeChild(a);

            form.reset();
            fileName.classList.add('hidden');

            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50';
            toast.textContent = 'File converted successfully!';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        } catch (error) {
            alert('Conversion failed: ' + error.message);
        } finally {
            convertBtn.disabled = false;
            convertBtn.innerHTML = originalText;
        }
    });
})();
</script>
@endpush