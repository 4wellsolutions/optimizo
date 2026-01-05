@extends('layouts.app')

@section('title', $tool->name . ' - ' . config('app.name'))
@section('meta_description', $tool->meta_description)

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Enhanced Hero Section -->
        <!-- Enhanced Hero Section -->
        <x-tool-hero :tool="$tool" icon="xml-to-json-converter" />

        <!-- Converter Tool with Enhanced Design -->
        <div class="bg-white rounded-3xl shadow-2xl p-6 md:p-8 mb-8 border border-gray-100">
            <!-- Action Buttons with Enhanced Styling -->
            <div class="flex flex-wrap gap-3 mb-6">
                <button onclick="convertXmlToJson()"
                    class="group px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all transform hover:scale-105">
                    <svg class="w-5 h-5 inline-block mr-2 group-hover:rotate-180 transition-transform duration-500"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Convert to JSON
                </button>
                <button onclick="copyJson()"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all hover:shadow-md">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Copy JSON
                </button>
                <button onclick="downloadJson()"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all hover:shadow-md">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download
                </button>
                <button onclick="loadExample()"
                    class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Load Example
                </button>
                <button onclick="clearAll()"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all hover:shadow-md">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear
                </button>
            </div>

            <!-- Input/Output Grid with Enhanced Design -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- XML Input -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-bold text-gray-900">XML Input</label>
                        <span class="text-xs text-gray-500 font-medium">Paste your XML code</span>
                    </div>
                    <textarea id="xmlInput"
                        class="w-full h-96 p-4 border-2 border-orange-200 rounded-xl font-mono text-sm focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all resize-none"
                        placeholder="<?xml version=&quot;1.0&quot;?>
<root>
  <item>Your XML here...</item>
</root>"></textarea>
                </div>

                <!-- JSON Output -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-bold text-gray-900">JSON Output</label>
                        <span class="text-xs text-gray-500 font-medium">Converted JSON result</span>
                    </div>
                    <textarea id="jsonOutput" readonly
                        class="w-full h-96 p-4 border-2 border-gray-200 rounded-xl font-mono text-sm bg-gradient-to-br from-gray-50 to-gray-100 focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all resize-none"
                        placeholder="Converted JSON will appear here..."></textarea>
                </div>
            </div>
        </div>

        <!-- Long-Form SEO Content with Stunning Design -->
        <div class="space-y-8">
            <!-- Main Description -->
            <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-3xl shadow-xl p-8 border-2 border-orange-200">
                <h2 class="text-4xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-5xl">🔄</span>
                    Free XML to JSON Converter Online
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-4">
                    <p class="text-xl font-medium text-gray-800">
                        Transform XML data into JSON format instantly with our powerful, free online XML to JSON converter.
                        Perfect for developers, data analysts, and anyone working with API integrations, data migration, or
                        modern web applications.
                    </p>
                    <p>
                        XML (eXtensible Markup Language) has been a standard for data exchange for decades, but modern
                        applications increasingly prefer JSON (JavaScript Object Notation) for its simplicity and native
                        JavaScript support. Our converter bridges this gap, allowing you to seamlessly transform XML
                        documents into clean, readable JSON format.
                    </p>
                    <p>
                        Whether you're migrating legacy systems, integrating with RESTful APIs, or simply need to convert
                        configuration files, our tool handles it all with precision and speed. No installation required, no
                        registration needed – just paste your XML and get instant results.
                    </p>
                </div>
            </div>

            <!-- Key Features -->
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-4xl">✨</span>
                    Powerful Features
                </h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-2xl p-6 border-2 border-orange-200">
                        <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Lightning Fast</h3>
                        <p class="text-gray-700 text-sm">Instant conversion with real-time processing. No waiting, no
                            delays.</p>
                    </div>

                    <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 border-2 border-red-200">
                        <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">100% Secure</h3>
                        <p class="text-gray-700 text-sm">All conversion happens in your browser. Your data never leaves your
                            device.</p>
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 border-2 border-purple-200">
                        <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Attribute Handling</h3>
                        <p class="text-gray-700 text-sm">Preserves XML attributes and converts them properly to JSON
                            structure.</p>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-200">
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Nested Structure</h3>
                        <p class="text-gray-700 text-sm">Maintains complex hierarchical data structures during conversion.</p>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border-2 border-blue-200">
                        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Pretty Formatting</h3>
                        <p class="text-gray-700 text-sm">Clean, indented JSON output that's easy to read and understand.</p>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 border-2 border-yellow-200">
                        <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Error Validation</h3>
                        <p class="text-gray-700 text-sm">Detects and reports invalid XML syntax with helpful error messages.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Use Cases -->
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-4xl">🎯</span>
                    Common Use Cases
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="group bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border-2 border-orange-200 hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">API Integration</h3>
                                <p class="text-gray-700 text-sm leading-relaxed">Convert XML API responses to JSON for modern
                                    web applications and RESTful services. Perfect for integrating legacy SOAP services with
                                    modern REST APIs.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border-2 border-blue-200 hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Data Migration</h3>
                                <p class="text-gray-700 text-sm leading-relaxed">Transform XML databases and exports to JSON
                                    for NoSQL systems like MongoDB, CouchDB, or Firebase. Simplify your data migration
                                    projects.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-200 hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Configuration Files</h3>
                                <p class="text-gray-700 text-sm leading-relaxed">Convert XML configuration files to JSON for
                                    modern applications, build tools, and deployment pipelines. Streamline your DevOps
                                    workflow.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border-2 border-purple-200 hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">SOAP to REST</h3>
                                <p class="text-gray-700 text-sm leading-relaxed">Transform SOAP XML responses to JSON for
                                    RESTful services and modern API architectures. Bridge the gap between old and new
                                    technologies.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 border-2 border-yellow-200 hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">RSS Feeds</h3>
                                <p class="text-gray-700 text-sm leading-relaxed">Convert RSS and Atom feeds (XML format) to
                                    JSON for easier parsing in JavaScript applications and mobile apps.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-6 border-2 border-cyan-200 hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-cyan-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Data Analysis</h3>
                                <p class="text-gray-700 text-sm leading-relaxed">Convert XML data exports to JSON for easier
                                    analysis with JavaScript libraries, Python pandas, or data visualization tools.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How It Works -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl shadow-xl p-8 border-2 border-blue-200">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-4xl">⚙️</span>
                    How XML to JSON Conversion Works
                </h2>
                <div class="space-y-6">
                    <p class="text-gray-700 leading-relaxed">
                        Our XML to JSON converter uses advanced parsing algorithms to accurately transform XML documents into
                        JSON format while preserving data structure and relationships. Here's how the conversion process
                        works:
                    </p>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-2xl p-6 shadow-md">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 text-white font-black text-xl">
                                1
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Parse XML</h3>
                            <p class="text-gray-700 text-sm">The converter parses your XML document, identifying elements,
                                attributes, and text content.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 text-white font-black text-xl">
                                2
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Transform Structure</h3>
                            <p class="text-gray-700 text-sm">XML elements become JSON objects, attributes are preserved, and
                                hierarchies are maintained.</p>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-md">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 text-white font-black text-xl">
                                3
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Generate JSON</h3>
                            <p class="text-gray-700 text-sm">The final JSON is formatted with proper indentation for
                                readability and easy integration.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-md">
                        <h3 class="font-bold text-lg text-gray-900 mb-3">Example Conversion:</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">XML Input:</p>
                                <pre
                                    class="bg-gray-900 text-green-400 p-4 rounded-lg text-xs overflow-x-auto"><code>&lt;user id="1"&gt;
  &lt;name&gt;John Doe&lt;/name&gt;
  &lt;email&gt;john@example.com&lt;/email&gt;
&lt;/user&gt;</code></pre>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-2">JSON Output:</p>
                                <pre
                                    class="bg-gray-900 text-blue-400 p-4 rounded-lg text-xs overflow-x-auto"><code>{
  "user": {
    "_attributes": { "id": "1" },
    "name": { "_text": "John Doe" },
    "email": { "_text": "john@example.com" }
  }
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-4xl">❓</span>
                    Frequently Asked Questions
                </h2>
                <div class="space-y-4">
                    <div class="bg-gradient-to-r from-orange-50 to-yellow-50 rounded-2xl p-6 border-l-4 border-orange-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Is this XML to JSON converter really free?</h3>
                        <p class="text-gray-700">Yes! Our XML to JSON converter is 100% free with no limitations, no
                            registration required, and no hidden costs. Convert as many files as you need.</p>
                    </div>

                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border-l-4 border-blue-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">How does the converter handle XML attributes?</h3>
                        <p class="text-gray-700">XML attributes are preserved in the JSON output under an "_attributes" key,
                            maintaining all attribute-value pairs from your original XML document.</p>
                    </div>

                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 border-l-4 border-green-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Is my data secure when using this converter?</h3>
                        <p class="text-gray-700">Absolutely! All conversion happens locally in your browser using JavaScript.
                            Your XML data never leaves your device or gets sent to any server, ensuring complete privacy and
                            security.</p>
                    </div>

                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 border-l-4 border-purple-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">What if my XML has invalid syntax?</h3>
                        <p class="text-gray-700">The converter includes error validation and will alert you if your XML
                            contains syntax errors, helping you identify and fix issues before conversion.</p>
                    </div>

                    <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-2xl p-6 border-l-4 border-red-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Can I convert large XML files?</h3>
                        <p class="text-gray-700">Yes! There's no file size limit, though very large files may take a moment
                            to process depending on your browser's performance. The conversion happens entirely in your
                            browser.</p>
                    </div>

                    <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-2xl p-6 border-l-4 border-cyan-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Does it work offline?</h3>
                        <p class="text-gray-700">Once the page is loaded, the converter works entirely in your browser, so it
                            can function offline. However, you need an initial internet connection to load the page and
                            required libraries.</p>
                    </div>

                    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-6 border-l-4 border-yellow-500">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Can I use this for commercial projects?</h3>
                        <p class="text-gray-700">Yes! Our XML to JSON converter is free for both personal and commercial use.
                            Convert data for your business applications, client projects, or any other purpose without
                            restrictions.</p>
                    </div>
                </div>
            </div>

            <!-- Tips & Best Practices -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl shadow-xl p-8 border-2 border-purple-200">
                <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <span class="text-4xl">💡</span>
                    Tips & Best Practices
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl p-5 shadow-md">
                        <h3 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-2xl">✅</span>
                            Validate Before Converting
                        </h3>
                        <p class="text-gray-700 text-sm">Ensure your XML is well-formed before conversion. Use XML validators
                            to check for syntax errors and fix them first.</p>
                    </div>

                    <div class="bg-white rounded-xl p-5 shadow-md">
                        <h3 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-2xl">📝</span>
                            Use Meaningful Names
                        </h3>
                        <p class="text-gray-700 text-sm">XML element names become JSON keys. Use descriptive, consistent
                            naming conventions for better JSON readability.</p>
                    </div>

                    <div class="bg-white rounded-xl p-5 shadow-md">
                        <h3 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-2xl">🔄</span>
                            Test with Examples
                        </h3>
                        <p class="text-gray-700 text-sm">Use the "Load Example" button to see how the converter handles
                            different XML structures before converting your own data.</p>
                    </div>

                    <div class="bg-white rounded-xl p-5 shadow-md">
                        <h3 class="font-bold text-lg text-gray-900 mb-2 flex items-center gap-2">
                            <span class="text-2xl">💾</span>
                            Save Your Results
                        </h3>
                        <p class="text-gray-700 text-sm">Use the download button to save your converted JSON as a file for
                            easy integration into your projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Native XML to JSON converter using DOMParser
        function xmlToJson(xml) {
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(xml, "text/xml");
            
            // Check for parsing errors
            const parserError = xmlDoc.querySelector('parsererror');
            if (parserError) {
                throw new Error('Invalid XML syntax');
            }
            
            return elementToJson(xmlDoc.documentElement);
        }
        
        function elementToJson(element) {
            const obj = {};
            
            // Add attributes
            if (element.attributes.length > 0) {
                obj['@attributes'] = {};
                for (let i = 0; i < element.attributes.length; i++) {
                    const attr = element.attributes[i];
                    obj['@attributes'][attr.nodeName] = attr.nodeValue;
                }
            }
            
            // Add child elements
            if (element.hasChildNodes()) {
                for (let i = 0; i < element.childNodes.length; i++) {
                    const child = element.childNodes[i];
                    
                    if (child.nodeType === 1) { // Element node
                        const childName = child.nodeName;
                        const childJson = elementToJson(child);
                        
                        if (obj[childName]) {
                            if (!Array.isArray(obj[childName])) {
                                obj[childName] = [obj[childName]];
                            }
                            obj[childName].push(childJson);
                        } else {
                            obj[childName] = childJson;
                        }
                    } else if (child.nodeType === 3) { // Text node
                        const text = child.nodeValue.trim();
                        if (text) {
                            if (Object.keys(obj).length === 0) {
                                return text;
                            } else {
                                obj['#text'] = text;
                            }
                        }
                    }
                }
            }
            
            return obj;
        }

        function convertXmlToJson() {
            const xml = document.getElementById('xmlInput').value;
            if (!xml.trim()) {
                alert('Please enter some XML data to convert.');
                return;
            }

            try {
                const jsonObj = xmlToJson(xml);
                const jsonString = JSON.stringify(jsonObj, null, 2);
                document.getElementById('jsonOutput').value = jsonString;
            } catch (error) {
                alert('Error converting XML: ' + error.message + '\n\nPlease check your XML syntax.');
            }
        }

        function copyJson() {
            const output = document.getElementById('jsonOutput');
            if (!output.value.trim()) {
                alert('No JSON to copy. Please convert XML first.');
                return;
            }

            output.select();
            document.execCommand('copy');
            
            // Show success feedback
            const btn = event.target.closest('button');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Copied!';
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
        }

        function downloadJson() {
            const json = document.getElementById('jsonOutput').value;
            if (!json.trim()) {
                alert('No JSON to download. Please convert XML first.');
                return;
            }

            const blob = new Blob([json], {
                type: 'application/json'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'converted.json';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        function clearAll() {
            document.getElementById('xmlInput').value = '';
            document.getElementById('jsonOutput').value = '';
        }

        function loadExample() {
            const example = '<' + '?xml version="1.0" encoding="UTF-8"?>\n<users>\n  <user id="1">\n    <name>John Doe</name>\n    <email>john@example.com</email>\n    <age>30</age>\n    <active>true</active>\n  </user>\n  <user id="2">\n    <name>Jane Smith</name>\n    <email>jane@example.com</email>\n    <age>25</age>\n    <active>true</active>\n  </user>\n  <user id="3">\n    <name>Bob Johnson</name>\n    <email>bob@example.com</email>\n    <age>35</age>\n    <active>false</active>\n  </user>\n</users>';

            document.getElementById('xmlInput').value = example;
            convertXmlToJson();
        }

        // Auto-convert on input (debounced)
        let debounceTimer;
        document.getElementById('xmlInput').addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (this.value.trim()) {
                    convertXmlToJson();
                }
            }, 500);
        });
    </script>
@endsection
