@extends('layouts.app')

@section('title', __tool('google-sheets-to-excel', 'seo.title', $tool->meta_title ?? $tool->name))
@section('meta_description', __tool('google-sheets-to-excel', 'seo.description', $tool->meta_description ?? $tool->description))

@section('content')
    <x-tool-hero :tool="$tool" />
            
    <!-- Tool Interface Section -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload Google Sheets Export</h2>
            <p class="text-lg text-gray-600">Download your sheet as CSV, ODS, or XLSX and upload here to convert/repair.</p>
        </div>

        <form action="{{ route('utility.google-sheets-to-excel.convert') }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-green-100 rounded-3xl p-10 text-center hover:border-green-300 hover:bg-green-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".csv,.ods,.xlsx">
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
                        <p class="text-base text-gray-500 mt-2">Exports (.csv, .ods, .xlsx)</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-green-600 font-medium hidden text-lg"></div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-green-500/50 transform hover:-translate-y-1 transition-all">
                    Convert to Excel
                    <!-- Icon: Arrow Right -->
                    <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- SEO Content Section -->
    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 mb-12">
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-600">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Convert Google Sheets to Excel</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    The ultimate guide and tool to export your Google Sheets data into Microsoft Excel (XLSX) format. Fix
                    formatting issues and get offline access instantly.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Easy Export</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Accepts standard Google Sheet exports (CSV, ODS) and
                        converts them to fully functional Excel workbooks.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Offline Access</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Liberate your data from the cloud. Save your
                        financial reports and client lists locally on your hard drive.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Data Cleanup</h3>
                    <p class="text-base text-gray-600 leading-relaxed">We normalize date formats and numbers that often get
                        messed up when downloading directly as CSV.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">How to export from Google Sheets</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-100 text-green-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900">Open your Sheet:</strong>
                                <p class="text-gray-600">Go to your Google Sheet in your browser.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-100 text-green-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900">Download:</strong>
                                <p class="text-gray-600">Click <strong>File > Download > Comma Separated Values
                                        (.csv)</strong> or <strong>OpenDocument (.ods)</strong>.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-100 text-green-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900">Convert Here:</strong>
                                <p class="text-gray-600">Upload that downloaded file to this tool to generate a polished
                                    Excel (.xlsx) file.</p>
                            </div>
                        </li>
                    </ol>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Why use this tool instead of direct download?</h3>
                    <p>While Google Sheets has a "Download as Excel" option, it often creates large, bloated files with
                        metadata that can cause "Corrupted File" errors in older Excel versions. Our tool acts as a sanitary
                        bridge:</p>
                    <ul class="list-disc list-inside mt-4 space-y-2">
                        <li>Strips hidden web metadata.</li>
                        <li>Fixes currency and date encoding quirks.</li>
                        <li>Ensures maximum compatibility with Excel 2010-2021.</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-12">
                <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Can I work on the file offline?</h4>
                        <p class="text-gray-600">Yes! Once converted to Excel, the file is yours. You can save it to a USB
                            drive, email it, or work on it without an internet connection.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Are my Google permissions affected?</h4>
                        <p class="text-gray-600">No. We don't ask for access to your Google Drive. You simply upload the
                            exported file, so your account credentials remain completely safe.</p>
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