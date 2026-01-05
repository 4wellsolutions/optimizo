@extends('layouts.app')

@section('title', $tool->meta_title ?? $tool->name)
@section('meta_description', $tool->meta_description ?? $tool->description)

@section('content')
    <!-- Hero Section -->
    <div
        class="relative overflow-hidden bg-gradient-to-br from-green-700 via-green-600 to-emerald-600 rounded-3xl p-8 md:p-12 mb-12 shadow-2xl">
        <div class="absolute top-0 right-0 w-80 h-80 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

        <div class="relative z-10 text-center">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-2xl shadow-2xl mb-8 transform hover:-rotate-3 transition-transform duration-300">
                <!-- Icon: Document Duplicate (Green) -->
                <svg class="w-10 h-10 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 01-2-2V5a2 2 0 012-2h4.586" />
                </svg>
            </div>
            <h1 class="text-3xl md:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                {{ $tool->name }}
            </h1>
            <p class="text-xl md:text-2xl text-white/90 font-medium max-w-3xl mx-auto leading-relaxed">
                {{ $tool->description }}
            </p>
            <div class="mt-8">
                @include('components.hero-actions')
            </div>
        </div>
    </div>

    <!-- Tool Interface Section -->
    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Upload Legacy XLS File</h2>
            <p class="text-lg text-gray-600">Drag & drop old Excel (XLS) files to convert to modern XLSX</p>
        </div>

        <form action="{{ route('utility.xls-to-xlsx.convert') }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-green-100 rounded-3xl p-10 text-center hover:border-green-300 hover:bg-green-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".xls">
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
                        <p class="text-base text-gray-500 mt-2">Old Excel Files (.xls)</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-green-600 font-medium hidden text-lg"></div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-4 focus:ring-green-500/50 transform hover:-translate-y-1 transition-all">
                    Convert to XLSX
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
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Upgrade to Modern Excel Format (XLSX)</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    Modernize your old Excel 97-2003 files (XLS) to the new open standard (XLSX). Enjoy smaller file sizes,
                    better security, and full compatibility.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Enhanced Security</h3>
                    <p class="text-base text-gray-600 leading-relaxed">XLSX removes macros by default, reducing security
                        risks compared to the legacy XLS format that could hide malicious code.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Smaller Size</h3>
                    <p class="text-base text-gray-600 leading-relaxed">XLSX uses ZIP compression for XML data, making files
                        up to 75% smaller than the old binary XLS files.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Corruption Safe</h3>
                    <p class="text-base text-gray-600 leading-relaxed">The XML architecture makes XLSX much more robust and
                        easier to recover if data corruption occurs.</p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Detailed Comparison: XLS vs XLSX</h3>
                    <div class="overflow-hidden border border-gray-200 rounded-2xl">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Feature</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        XLS (Legacy)</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider text-emerald-600">
                                        XLSX (Modern)</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Format
                                        Structure</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Proprietary Binary</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Open XML
                                        (Zipped)</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Max Rows</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">65,536</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">1,048,576</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Max Columns
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">256 (IV)</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">16,384 (XFD)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Macro Security
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Macros stored directly
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Macros
                                        forbidden (use XLSM)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-12">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                    <div class="space-y-6">
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg">Why should I convert my old files?</h4>
                            <p class="text-gray-600 mt-1">Microsoft has deprecated the XLS format. Converting ensures your
                                data remains accessible, secure, and compatible with modern tools like Power BI, Google
                                Sheets, and mobile apps.</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg">Will I lose data during conversion?</h4>
                            <p class="text-gray-600 mt-1">No. The conversion preserves all text, numbers, formulas, and
                                formatting. However, if your old file used very specific legacy macros, they might need to
                                be saved as an .XLSM file separately.</p>
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