@extends('layouts.app')

@section('title', __tool('csv-to-excel', 'seo.title', $tool->meta_title ?? $tool->name))
@section('meta_description', __tool('csv-to-excel', 'seo.description', $tool->meta_description ?? $tool->description))

@section('content')
    <x-tool-hero :tool="$tool" />

    <!-- Tool Interface Section -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload CSV File</h2>
            <p class="text-lg text-gray-600">Drag & drop CSV to convert to Excel (XLSX)</p>
        </div>

        <form action="{{ route('utility.csv-to-excel.convert') }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-green-100 rounded-3xl p-10 text-center hover:border-green-300 hover:bg-green-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".csv">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-green-100 text-green-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                        <p class="text-base text-gray-500 mt-2">CSV files (.csv)</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-green-600 font-medium hidden text-lg"></div>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Convert CSV to Excel (XLSX) Online</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    Transform raw CSV data into professional, formatted Excel spreadsheets. The easiest way to view, manage,
                    and analyze CSV data with proper columns and special character support.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M3 14h18m-9-4v8m-7-4h14M4 6h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">XLSX Format</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Converts to the modern Excel (.xlsx) format
                        compatible with Office 2007, 365, and Google Sheets.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Data Integrity</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Preserves your data structure, intelligent column
                        detection, and special characters (UTF-8).</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Seconds to Convert</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Get your Excel file ready in seconds, even for large
                        CSV datasets. No software required.</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Why convert CSV to Excel?</h3>
                    <p>CSV files are raw text files great for data transfer, but hard for humans to read and manipulate.
                        Converting to Excel unlocks powerful features:</p>
                    <ul class="list-none space-y-3 mt-4 pl-0">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span><strong>Visual Formatting:</strong> Apply colors, fonts, borders, and conditional
                                formatting to highlight key data.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span><strong>Analysis Tools:</strong> Use Excel's powerful formulas, pivot tables, and charts
                                to gain insights.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span><strong>Sorting & Filtering:</strong> Easily manage large datasets with user-friendly
                                sorting and filtering controls.</span>
                        </li>
                    </ul>
                </div>

                <div class="grid md:grid-cols-2 gap-8 border-t border-gray-100 pt-12">
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">How to Convert</h4>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600">
                            <li>Upload your <strong>.csv</strong> file.</li>
                            <li>Wait for the automatic conversion process.</li>
                            <li>Download your new <strong>.xlsx</strong> file immediately.</li>
                        </ol>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Pro Tip</h4>
                        <p class="text-gray-600">Our converter automatically handles UTF-8 encoding, so your special
                            characters (accents, symbols, emojis) will display correctly in Excel, which often breaks when
                            opening CSVs directly.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="border-t border-gray-100 pt-12 mt-12">
                <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">What is the difference between CSV and XLSX?</h4>
                        <p class="text-gray-600">CSV is a simple text format for raw data. XLSX is a binary format that
                            supports formatting, formulas, charts, and multiple sheets.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Can I convert back to CSV later?</h4>
                        <p class="text-gray-600">Yes! You can always save your Excel file as CSV again, or use our <a
                                href="{{ route('utility.excel-to-csv') }}"
                                class="text-emerald-600 hover:text-emerald-700">Excel to CSV converter</a>.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Is there a file size limit?</h4>
                        <p class="text-gray-600">We support files up to 100MB, which covers most large data exports.</p>
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