@extends('layouts.app')


@section('title', __tool('dns-lookup', 'meta.title'))
@section('meta_description', __tool('dns-lookup', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="dns-lookup" />

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="dnsForm">
                @csrf
                <div class="mb-6">
                    <label for="domain" class="form-label text-base">{{ __tool('dns-lookup', 'form.domain_label') }}</label>
                    <input type="text" id="domain" name="domain" class="form-input" placeholder="{{ __tool('dns-lookup', 'form.domain_placeholder') }}" required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>{{ __tool('dns-lookup', 'form.button') }}</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('dns-lookup', 'results.title') }}</h3>
                <div id="dnsRecords"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('dns-lookup', 'content.what_is_title') }}</h2>
            <p class="text-gray-700 mb-4">{{ __tool('dns-lookup', 'content.what_is_desc') }}</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('dns-lookup', 'content.why_use_title') }}</h2>
            <p class="text-gray-700 mb-4">{{ __tool('dns-lookup', 'content.why_use_desc') }}</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('dns-lookup', 'content.record_types_title') }}
            </h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>{!! __tool('dns-lookup', 'content.a_record') !!}</li>
                <li>{!! __tool('dns-lookup', 'content.aaaa_record') !!}</li>
                <li>{!! __tool('dns-lookup', 'content.mx_record') !!}</li>
                <li>{!! __tool('dns-lookup', 'content.ns_record') !!}</li>
                <li>{!! __tool('dns-lookup', 'content.txt_record') !!}</li>
                <li>{!! __tool('dns-lookup', 'content.cname_record') !!}</li>
            </ul>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('dns-lookup', 'faq.title') }}</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('dns-lookup', 'faq.q1') }}</h3>
                    <p class="text-gray-700">{{ __tool('dns-lookup', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('dns-lookup', 'faq.q2') }}</h3>
                    <p class="text-gray-700">{{ __tool('dns-lookup', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('dns-lookup', 'faq.q3') }}</h3>
                    <p class="text-gray-700">{{ __tool('dns-lookup', 'faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('dns-lookup', 'faq.q4') }}</h3>
                    <p class="text-gray-700">{{ __tool('dns-lookup', 'faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('dns-lookup', 'faq.q5') }}</h3>
                    <p class="text-gray-700">{{ __tool('dns-lookup', 'faq.a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const form = document.getElementById('dnsForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('dnsForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = '{{ __tool('dns-lookup', 'js.looking_up') }}';
            btnIcon.classList.add('animate-spin');

            document.getElementById('statusMessage').classList.add('hidden');
            document.getElementById('resultSection').classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.dns-lookup.lookup") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();
                if (data.success) {
                    let html = '';
                    for (const [type, records] of Object.entries(data.data.records)) {
                        if (records.length > 0) {
                            html += `<div class="mb-4"><h4 class="font-bold text-lg mb-2">${type} {{ __tool('dns-lookup', 'js.records_label') }}</h4>`;
                            records.forEach(r => {
                                html += `<div class="bg-gray-50 p-3 rounded mb-2"><code class="text-sm">${JSON.stringify(r)}</code></div>`;
                            });
                            html += '</div>';
                        }
                    }
                    document.getElementById('dnsRecords').innerHTML = html;
                    document.getElementById('statusMessage').className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800';
                    document.getElementById('statusMessage').textContent = '{{ __tool('dns-lookup', 'js.success') }}';
                    document.getElementById('statusMessage').classList.remove('hidden');
                    document.getElementById('resultSection').classList.remove('hidden');
                } else {
                    document.getElementById('statusMessage').className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800';
                    document.getElementById('statusMessage').textContent = '✗ ' + data.error;
                    document.getElementById('statusMessage').classList.remove('hidden');
                }
            } catch (error) {
                document.getElementById('statusMessage').className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800';
                document.getElementById('statusMessage').textContent = '{{ __tool('dns-lookup', 'js.error') }}';
                document.getElementById('statusMessage').classList.remove('hidden');
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = '{{ __tool('dns-lookup', 'js.lookup_dns') }}';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endpush