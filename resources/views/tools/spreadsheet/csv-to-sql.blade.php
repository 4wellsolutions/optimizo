@extends('layouts.app')

@section('title', $tool->meta_title ?? $tool->name)
@section('meta_description', $tool->meta_description ?? $tool->description)

@section('content')
    <x-tool-hero :tool="$tool" />
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
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Convert CSV to SQL INSERTs</h2>
            <p class="text-lg text-gray-600">Upload CSV to generate SQL Create Table and Insert statements</p>
        </div>

        <form action="{{ route('utility.csv-to-sql.convert') }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf

            <div class="border-4 border-dashed border-indigo-100 rounded-3xl p-10 text-center hover:border-indigo-300 hover:bg-indigo-50 transition-all cursor-pointer relative group bg-gray-50/50"
                id="dropzone">
                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".csv">
                <div class="space-y-6 pointer-events-none">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-indigo-100 text-indigo-600 rounded-full group-hover:scale-110 transition-transform">
                        <!-- Icon: Code -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-gray-700">Click to upload or drag and drop</p>
                        <p class="text-base text-gray-500 mt-2">CSV Files (.csv)</p>
                    </div>
                </div>
                <div id="file-name" class="mt-4 text-indigo-600 font-medium hidden text-lg"></div>
            </div>

            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <label class="block text-gray-700 font-bold mb-2">Table Name (Optional)</label>
                <input type="text" name="table_name" placeholder="e.g. users_table"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                <p class="text-sm text-gray-500 mt-2">Defaults to filename if left empty.</p>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full md:w-auto min-w-[300px] inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl shadow-xl text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transform hover:-translate-y-1 transition-all">
                    Generate SQL
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
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Convert CSV to SQL INSERT Statement</h2>
                <p class="text-xl leading-relaxed text-gray-600">
                    The ultimate developer tool for data migration. Instantly turn your CSV files into executable SQL
                    scripts with CREATE TABLE and INSERT INTO commands.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16 not-prose">
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M3 14h18m-9-4v8m-7-4h14M4 6h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Auto Schema</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Automatically detects column names from your first
                        header row and generates the CREATE TABLE schema.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Bulk Insertions</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Generates clean, escaped SQL INSERT statements ready
                        for bulk execution in any SQL client.</p>
                </div>
                <div class="bg-gray-50/50 p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-cyan-100 text-cyan-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl text-gray-900 mb-3">Universal SQL</h3>
                    <p class="text-base text-gray-600 leading-relaxed">Generates SQL-92 compliant code that works on MySQL,
                        PostgreSQL, SQLite, and MariaDB.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Supported Databases</h3>
                    <p>Our tool generates standard SQL (Structured Query Language) that is compatible with most relational
                        database management systems (RDEBMS):</p>
                    <ul class="list-none space-y-3 mt-4 pl-0">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            MySQL & MariaDB
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            PostgreSQL
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            SQLite
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Microsoft SQL Server
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">How it works</h3>
                    <ol class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full font-bold mr-4 mt-1">1</span>
                            <div>
                                <strong class="text-gray-900">Analysis:</strong>
                                <p class="text-gray-600 text-sm">We scan your CSV file to determine columns and data types
                                    (text vs numbers).</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full font-bold mr-4 mt-1">2</span>
                            <div>
                                <strong class="text-gray-900">Schema Generation:</strong>
                                <p class="text-gray-600 text-sm">We create a <code>CREATE TABLE user_table (...)</code>
                                    statement defining the structure.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-full font-bold mr-4 mt-1">3</span>
                            <div>
                                <strong class="text-gray-900">Data Insertion:</strong>
                                <p class="text-gray-600 text-sm">We interate through every row and generate
                                    <code>INSERT INTO</code> statements for the data.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-12">
                <h3 class="text-3xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">How do I specify the table name?</h4>
                        <p class="text-gray-600">You can enter a custom table name in the input field above. If you leave it
                            blank, we will default to using your uploaded file's name (e.g., "my_data.csv" becomes
                            "my_data").</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Are quotes handled correctly?</h4>
                        <p class="text-gray-600">Yes! We automatically escape single quotes within your text data to prevent
                            SQL syntax errors during importation.</p>
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