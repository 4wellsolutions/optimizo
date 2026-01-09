@extends('layouts.app')

@section('title', __tool('excel-to-csv', 'seo.title', $tool->meta_title ?? $tool->name))
@section('meta_description', __tool('excel-to-csv', 'seo.description', $tool->meta_description ?? $tool->description))

@section('content')
    <x-tool-hero :tool="$tool" />

    <!-- Tool Interface Section -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload Excel File</h2>
            <p class="text-lg text-gray-600">Drag & drop XLS or XLSX to convert to CSV</p>
        </div>

        <form action="{{ route('utility.excel-to-csv.convert') }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-emerald-100 rounded-3xl p-10 text-center hover:border-emerald-300 hover:bg-emerald-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".xls,.xlsx">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Cloud Upload -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                        <p class="text-base text-gray-500 mt-2">Excel files (XLS, XLSX)</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-emerald-600 font-medium hidden text-lg"></div>
            </div>

            <!-- Options -->
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <label class="block text-gray-700 font-bold mb-2">CSV Delimiter</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="delimiter" value="," checked
                            class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                        <span class="text-gray-900 font-medium">Comma (,)</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="delimiter" value=";"
                            class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                        <span class="text-gray-900 font-medium">Semicolon (;)</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="delimiter" value="|"
                            class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                        <span class="text-gray-900 font-medium">Pipe (|)</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="delimiter" value="tab"
                            class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                        <span class="text-gray-900 font-medium">Tab</span>
                    </label>
                </div>
    <div class="max-w-4xl mx-auto mb-16 px-4">
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload Excel File</h2>
                <p class="text-lg text-gray-600">Drag & drop XLS or XLSX to convert to CSV</p>
            </div>

            <form action="{{ route('utility.excel-to-csv.convert') }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">
                @csrf

                <div class="border-4 border-dashed border-emerald-100 rounded-3xl p-10 text-center hover:border-emerald-300 hover:bg-emerald-50 transition-all cursor-pointer relative group bg-gray-50/50"
                    id="dropzone">
                    <input type="file" name="file" id="file"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".xls,.xlsx">
                    <div class="space-y-6 pointer-events-none">
                        <div
                            class="inline-flex items-center justify-center w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full group-hover:scale-110 transition-transform">
                            <!-- Icon: Cloud Upload -->
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                            <p class="text-base text-gray-500 mt-2">Excel files (XLS, XLSX)</p>
                        </div>
                    </div>
                    <div id="file-name" class="mt-4 text-emerald-600 font-medium hidden text-lg"></div>
                </div>

                <!-- Options -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <label class="block text-gray-700 font-bold mb-2">CSV Delimiter</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="delimiter" value="," checked
                                class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                            <span class="text-gray-900 font-medium">Comma (,)</span>
                        </label>
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="delimiter" value=";"
                                class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                            <span class="text-gray-900 font-medium">Semicolon (;)</span>
                        </label>
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="delimiter" value="|"
                                class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                            <span class="text-gray-900 font-medium">Pipe (|)</span>
                        </label>
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="delimiter" value="tab"
                                class="text-emerald-600 focus:ring-emerald-500 w-5 h-5">
                            <span class="text-gray-900 font-medium">Tab</span>
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/50 transform hover:-translate-y-1 transition-all">
                        Convert to CSV
                        <!-- Icon: Arrow Right -->
                        <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SEO Content Section -->
                </p>
            </div>

            <!-- Feature Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Lightning Fast</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Process complex spreadsheets with thousands of rows
                        in
                        seconds. Built for performance.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Format Control</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Choose your preferred delimiter: comma, semicolon,
                        pipe,
                        or tab. Perfect for SQL imports.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">100% Secure</h3>
                    <p class="text-base text-gray-600 leading-relaxed">All file processing happens securely. Your data is
                        automatically deleted after conversion.</p>
                </div>
            </div>

            <!-- Content Split -->
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Why convert Excel to CSV?</h3>
                    <p>Excel files (XLS/XLSX) are great for human readability and calculations, but they aren't ideal for
                        every
                        system. Here's why you might need CSV:</p>
                    <ul class="list-none space-y-3 mt-4 pl-0">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span><strong>Database Imports:</strong> Most SQL databases (MySQL, PostgreSQL) prefer CSV for
                                bulk data loading.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span><strong>Compatibility:</strong> CSV is a universal format readable by almost any software,
                                from legacy mainframes to modern web apps.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span><strong>File Size:</strong> CSV files are plain text and significantly smaller than binary
                                Excel files, making them easier to email or upload.</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">How to convert XLS to CSV Step-by-Step</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full font-bold mr-4 mt-1 border border-gray-200">1</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Upload File</strong>
                                <p class="mt-1 text-gray-500">Drag and drop your Excel file into the upload box above.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full font-bold mr-4 mt-1 border border-gray-200">2</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Select Delimiter</strong>
                                <p class="mt-1 text-gray-500">Choose how your data columns should be separated (comma,
                                    semicolon, etc).</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full font-bold mr-4 mt-1 border border-gray-200">3</span>
                            <div>
                                <strong class="text-gray-900 text-lg">Download</strong>
                                <p class="mt-1 text-gray-500">Click "Convert" to instantly process and download your CSV
                                    file.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="border-t border-gray-100 pt-12">
                <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h3>

                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">My Excel file has multiple sheets. Will they all be
                            converted?</h4>
                        <p class="text-gray-600">Currently, our converter processes the <strong>active (first)
                                sheet</strong> of your Excel file. If you need data from other sheets, please save them
                            individually or move them to the first tab before uploading.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Will my formulas be preserved?</h4>
                        <p class="text-gray-600">No. CSV is a plain text format that stores <strong>values only</strong>,
                            not logic. All formulas will be calculated, and their <em>results</em> will be saved in the CSV.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">What is the difference between XLS and XLSX?</h4>
                        <p class="text-gray-600">XLS is the older binary format used by Excel 97-2003. XLSX is the modern
                            XML-based format used by Excel 2007 and newer. Our tool supports both.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">How do I open the CSV file?</h4>
                        <p class="text-gray-600">You can open CSV files with any spreadsheet software (Excel, Google Sheets,
                            Numbers) or any simple text editor (Notepad, TextEdit, VS Code).</p>
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