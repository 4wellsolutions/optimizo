@extends('layouts.app')

@section('title', __tool('xlsx-to-xls', 'seo.title', $tool->meta_title ?? $tool->name))
@section('meta_description', __tool('xlsx-to-xls', 'seo.description', $tool->meta_description ?? $tool->description))

@section('content')
    <x-tool-hero :tool="$tool" />

    <!-- Tool Interface Section -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload XLSX File</h2>
            <p class="text-lg text-gray-600">Drag & drop modern Excel (XLSX) to convert to legacy XLS</p>
        </div>

        <form action="{{ route('utility.xlsx-to-xls.convert') }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-green-100 rounded-3xl p-10 text-center hover:border-green-300 hover:bg-green-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".xlsx">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-green-100 text-green-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                        <p class="text-base text-gray-500 mt-2">Excel Files (.xlsx)</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-green-600 font-medium hidden text-lg"></div>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Downgrade to Legacy Excel Format (XLS)</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    Need compatibility with older systems? Convert your modern XLSX files to the legacy XLS format (Excel
                    97-2003) instantly for use with legacy software and databases.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Legacy Support</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Ensure your spreadsheets open on older computers,
                        Windows XP systems, and software that only support XLS.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Fast Processing</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Convert robust datasets quickly without installing
                        any desktop software. Works on any device.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Safe Downgrade</h3>
                    <p class="text-base text-gray-600 leading-relaxed">We safely convert your data structures while alerting
                        you to any modern features that may not be supported in old Excel.</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">When should I use XLS format?</h3>
                    <p>While XLSX is the modern standard, there are legitimate reasons to convert back to XLS:</p>
                    <ul class="list-disc list-inside mt-4 space-y-2">
                        <li><strong>Legacy Software:</strong> Some old ERP systems, accounting software, or scientific
                            instruments only export/import .xls files.</li>
                        <li><strong>Old Code:</strong> Custom scripts written in VB6 or older languages might rely on the
                            binary structure of XLS files.</li>
                        <li><strong>Compatibility:</strong> Sharing files with users running Excel 2003 or earlier without
                            the Compatibility Pack installed.</li>
                    </ul>
                </div>

                <div class="border-t border-gray-100 pt-12">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">What limitations does XLS have?</h4>
                            <p class="text-gray-600">The biggest limitation is size. XLS supports a maximum of 65,536 rows
                                and 256 columns per sheet. If your XLSX file exceeds this, data will be truncated.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">Will my formatting change?</h4>
                            <p class="text-gray-600">Basic formatting (bold, colors, borders) will be preserved. However,
                                modern features like Sparklines, advanced conditional formatting, or new charts may not have
                                an equivalent in the old format.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg mb-2">Is it safe to use XLS?</h4>
                            <p class="text-gray-600">XLS files are binary and can theoretically contain dangerous macros. We
                                recommend only using them when strictly necessary for compatibility.</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

    @push('scripts')
        <script>
            const fileInput = document.getElementById('file');
            const fileName = document.getElementById('file-name');

            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    fileName.textContent = e.target.files[0].name;
                    fileName.classList.remove('hidden');
                }
            });
        </script>
    @endpush
@endsection