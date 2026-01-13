@extends('layouts.app')
@section('title', __tool('traceroute', 'meta.title'))
@section('meta_description', __tool('traceroute', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="traceroute" />

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="traceForm">
                @csrf
                <div class="mb-6">
                    <label for="host" class="form-label text-base">{{ __tool('traceroute', 'form.host_label') }}</label>
                    <input type="text" id="host" name="host" class="form-input" placeholder="{{ __tool('traceroute', 'form.host_placeholder') }}" required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 013.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    <span>{{ __tool('traceroute', 'form.button') }}</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('traceroute', 'results.title') }}</h3>
                <div id="traceResults" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('traceroute', 'content.what_is_title') }}</h2>
            <p class="text-gray-700 mb-4">{{ __tool('traceroute', 'content.what_is_desc') }}</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('traceroute', 'content.why_use_title') }}</h2>
            <p class="text-gray-700 mb-4">{{ __tool('traceroute', 'content.why_use_desc') }}</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('traceroute', 'content.hops_title') }}</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('traceroute', 'content.hop1') !!}</li>
                <li>{!! __tool('traceroute', 'content.hop2') !!}</li>
                <li>{!! __tool('traceroute', 'content.hop3') !!}</li>
                <li>{!! __tool('traceroute', 'content.hop4') !!}</li>
                <li>{!! __tool('traceroute', 'content.hop5') !!}</li>
                <li>{!! __tool('traceroute', 'content.hop6') !!}</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('traceroute', 'content.issues_title') }}</h2>
            <p class="text-gray-700 mb-4">{{ __tool('traceroute', 'content.issues_desc') }}</p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('traceroute', 'faq.title') }}</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('traceroute', 'faq.q1') }}</h3>
                    <p class="text-gray-700">{{ __tool('traceroute', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('traceroute', 'faq.q2') }}</h3>
                    <p class="text-gray-700">{{ __tool('traceroute', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('traceroute', 'faq.q3') }}</h3>
                    <p class="text-gray-700">{{ __tool('traceroute', 'faq.a3') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        const form = document.getElementById('traceForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('traceForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const traceResults = document.getElementById('traceResults');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = '{{ __tool('traceroute', 'form.button_loading') }}';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.traceroute.trace") }}', {
                    method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();

                if (data.success) {
                    traceResults.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '✓ Traceroute successful!';
                    statusMessage.classList.remove('hidden');
                    resultSection.classList.remove('hidden');
                } else {
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                    statusMessage.textContent = '✗ ' + data.error;
                    statusMessage.classList.remove('hidden');
                }
            } catch (error) {
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                statusMessage.textContent = '✗ An error occurred';
                statusMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = '{{ __tool('traceroute', 'form.button') }}';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endpush