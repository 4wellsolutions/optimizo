@extends('layouts.app')

@section('title', __tool('ip-lookup', 'seo.title'))
@section('meta_description', __tool('ip-lookup', 'seo.description'))
@section('meta_keywords', __tool('ip-lookup', 'seo.keywords'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <x-tool-hero :tool="$tool" icon="ip-lookup" />

        <!-- Tool Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">

            <form id="ipForm">
                @csrf
                <div class="mb-6">
                    <label for="ipAddress" class="form-label text-base">{{ __tool('ip-lookup', 'form.ip_label') }}</label>
                    <input type="text" id="ipAddress" name="ip_address" class="form-input"
                        placeholder="{{ __tool('ip-lookup', 'form.ip_placeholder') }}" required>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>{{ __tool('ip-lookup', 'form.button') }}</span>
                </button>
            </form>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>

            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('ip-lookup', 'results.title') }}</h3>
                <div class="grid md:grid-cols-2 gap-5" id="ipDetails"></div>
            </div>
        </div>

        <!-- SEO Content with Premium Design -->
        <div
            class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-200">
            <h2 class="text-3xl font-black text-gray-900 mb-6 flex items-center gap-3">
                <span
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                {{ __tool('ip-lookup', 'content.what_is_title') }}
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                {{ __tool('ip-lookup', 'content.what_is_desc') }}
            </p>

            <h2 class="text-3xl font-black text-gray-900 mb-6 mt-10 flex items-center gap-3">
                <span
                    class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                {{ __tool('ip-lookup', 'content.why_use_title') }}
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                {{ __tool('ip-lookup', 'content.why_use_desc') }}
            </p>

            <h2 class="text-3xl font-black text-gray-900 mb-6 mt-10">{{ __tool('ip-lookup', 'content.features_title') }}
            </h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-cyan-500 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('ip-lookup', 'content.feature1_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('ip-lookup', 'content.feature1_desc') }}</p>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-teal-500 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('ip-lookup', 'content.feature2_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('ip-lookup', 'content.feature2_desc') }}</p>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('ip-lookup', 'content.feature3_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('ip-lookup', 'content.feature3_desc') }}</p>
                </div>
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-cyan-600 hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-gray-900 mb-2">{{ __tool('ip-lookup', 'content.feature4_title') }}</h3>
                    <p class="text-gray-600">{{ __tool('ip-lookup', 'content.feature4_desc') }}</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">
            <h2 class="text-3xl font-black text-gray-900 mb-8 text-center">{{ __tool('ip-lookup', 'faq.title') }}</h2>
            <div class="space-y-5">
                <div
                    class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-cyan-500">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('ip-lookup', 'faq.q1') }}</h3>
                    <p class="text-gray-700 text-lg">{{ __tool('ip-lookup', 'faq.a1') }}</p>
                </div>
                <div
                    class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-teal-500">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('ip-lookup', 'faq.q2') }}</h3>
                    <p class="text-gray-700 text-lg">{{ __tool('ip-lookup', 'faq.a2') }}</p>
                </div>
                <div
                    class="bg-gradient-to-r from-blue-50 to-teal-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-blue-500">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('ip-lookup', 'faq.q3') }}</h3>
                    <p class="text-gray-700 text-lg">{{ __tool('ip-lookup', 'faq.a3') }}</p>
                </div>
                <div
                    class="bg-gradient-to-r from-cyan-50 to-teal-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-cyan-600">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('ip-lookup', 'faq.q4') }}</h3>
                    <p class="text-gray-700 text-lg">{{ __tool('ip-lookup', 'faq.a4') }}</p>
                </div>
                <div
                    class="bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-shadow border-l-4 border-teal-600">
                    <h3 class="font-bold text-xl text-gray-900 mb-3">{{ __tool('ip-lookup', 'faq.q5') }}</h3>
                    <p class="text-gray-700 text-lg">{{ __tool('ip-lookup', 'faq.a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        const form = document.getElementById('ipForm');
        const statusMessage = document.getElementById('statusMessage');
        const resultSection = document.getElementById('resultSection');
        const ipDetails = document.getElementById('ipDetails');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = '{{ __tool('ip-lookup', 'js.looking_up') }}';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.ip-lookup.lookup") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                const data = await response.json();

                if (data.success) {
                    displayResults(data.data);
                    showMessage('{{ __tool('ip-lookup', 'js.success') }}', 'success');
                    resultSection.classList.remove('hidden');
                } else {
                    showMessage('✗ ' + data.error, 'error');
                }
            } catch (error) {
                showMessage('{{ __tool('ip-lookup', 'js.error') }}', 'error');
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = '{{ __tool('ip-lookup', 'form.button') }}';
                btnIcon.classList.remove('animate-spin');
            }
        });

        function displayResults(data) {
            const fields = [
                { label: '{{ __tool('ip-lookup', 'results.ip_address') }}', value: data.ip, icon: '🌐' },
                { label: '{{ __tool('ip-lookup', 'results.type') }}', value: data.type, icon: '📡' },
                { label: '{{ __tool('ip-lookup', 'results.hostname') }}', value: data.hostname, icon: '🔗' },
                { label: '{{ __tool('ip-lookup', 'results.isp') }}', value: data.isp, icon: '🏢' },
                { label: '{{ __tool('ip-lookup', 'results.country') }}', value: data.country, icon: '🌍' },
                { label: '{{ __tool('ip-lookup', 'results.region') }}', value: data.region, icon: '📍' },
                { label: '{{ __tool('ip-lookup', 'results.city') }}', value: data.city, icon: '🏙️' },
                { label: '{{ __tool('ip-lookup', 'results.timezone') }}', value: data.timezone, icon: '🕐' }
            ];

            ipDetails.innerHTML = fields.map(field => `
                                                            <div class="bg-gradient-to-br from-white to-gray-50 p-6 rounded-2xl shadow-lg border border-gray-200 hover:shadow-xl transition-all transform hover:-translate-y-1">
                                                                <p class="text-sm font-semibold text-gray-600 mb-2 flex items-center gap-2">
                                                                    <span class="text-2xl">${field.icon}</span>
                                                                    ${field.label}
                                                                </p>
                                                                <p class="text-xl font-black text-gray-900">${field.value}</p>
                                                            </div>
                                                        `).join('');
        }

        function showMessage(message, type) {
            statusMessage.className = `mt-8 p-5 rounded-2xl shadow-lg ${type === 'success' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border-2 border-green-300' : 'bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border-2 border-red-300'}`;
            statusMessage.innerHTML = `<p class="text-lg font-bold">${message}</p>`;
            statusMessage.classList.remove('hidden');
        }
    </script>
@endpush