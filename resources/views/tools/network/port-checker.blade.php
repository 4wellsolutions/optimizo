@extends('layouts.app')
@section('title', __tool('port-checker', 'meta.title'))
@section('meta_description', __tool('port-checker', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <x-tool-hero :tool="$tool" icon="port-checker" />

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <form id="portForm">
                @csrf
                <div class="mb-6">
                    <label for="host" class="form-label text-base">{{ __tool('port-checker', 'form.host_label') }}</label>
                    <input type="text" id="host" name="host" class="form-input"
                        placeholder="{{ __tool('port-checker', 'form.host_placeholder') }}" required>
                </div>
                <div class="mb-6">
                    <label for="port" class="form-label text-base">{{ __tool('port-checker', 'form.port_label') }}</label>
                    <input type="number" id="port" name="port" class="form-input"
                        placeholder="{{ __tool('port-checker', 'form.port_placeholder') }}" min="1" max="65535" required>
                </div>
                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>{{ __tool('port-checker', 'form.button') }}</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-6 p-4 rounded-xl"></div>
            <div id="resultSection" class="hidden mt-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ __tool('port-checker', 'results.title') }}</h3>
                <div id="portResults" class="bg-gray-50 p-4 rounded-xl"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ __tool('port-checker', 'content.what_is_title') }}</h2>
            <p class="text-gray-700 mb-4">{{ __tool('port-checker', 'content.what_is_desc') }}</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('port-checker', 'content.why_check_title') }}
            </h2>
            <p class="text-gray-700 mb-4">{{ __tool('port-checker', 'content.why_check_desc') }}</p>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">
                {{ __tool('port-checker', 'content.common_ports_title') }}</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                <li>{!! __tool('port-checker', 'content.port1') !!}</li>
                <li>{!! __tool('port-checker', 'content.port2') !!}</li>
                <li>{!! __tool('port-checker', 'content.port3') !!}</li>
                <li>{!! __tool('port-checker', 'content.port4') !!}</li>
                <li>{!! __tool('port-checker', 'content.port5') !!}</li>
                <li>{!! __tool('port-checker', 'content.port6') !!}</li>
                <li>{!! __tool('port-checker', 'content.port7') !!}</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mb-4 mt-6">{{ __tool('port-checker', 'content.security_title') }}
            </h2>
            <p class="text-gray-700 mb-4">{{ __tool('port-checker', 'content.security_desc') }}</p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __tool('port-checker', 'faq.title') }}</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('port-checker', 'faq.q1') }}</h3>
                    <p class="text-gray-700">{{ __tool('port-checker', 'faq.a1') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('port-checker', 'faq.q2') }}</h3>
                    <p class="text-gray-700">{{ __tool('port-checker', 'faq.a2') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('port-checker', 'faq.q3') }}</h3>
                    <p class="text-gray-700">{{ __tool('port-checker', 'faq.a3') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('port-checker', 'faq.q4') }}</h3>
                    <p class="text-gray-700">{{ __tool('port-checker', 'faq.a4') }}</p>
                </div>
                <div class="bg-white rounded-xl p-5 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __tool('port-checker', 'faq.q5') }}</h3>
                    <p class="text-gray-700">{{ __tool('port-checker', 'faq.a5') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        const form = document.getElementById('portForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('span');
        const btnIcon = submitBtn.querySelector('svg');

        document.getElementById('portForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const statusMessage = document.getElementById('statusMessage');
            const resultSection = document.getElementById('resultSection');
            const portResults = document.getElementById('portResults');

            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = '{{ __tool('port-checker', 'js.checking') }}';
            btnIcon.classList.add('animate-spin');

            statusMessage.classList.add('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route("network.port-checker.check") }}', {
                    method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();

                if (data.success) {
                    portResults.innerHTML = `<pre class="text-sm">${JSON.stringify(data.data, null, 2)}</pre>`;
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-green-100 text-green-800 border-2 border-green-300';
                    statusMessage.textContent = '{{ __tool('port-checker', 'js.success') }}';
                    statusMessage.classList.remove('hidden');
                    resultSection.classList.remove('hidden');
                } else {
                    statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                    statusMessage.textContent = '✗ ' + data.error;
                    statusMessage.classList.remove('hidden');
                }
            } catch (error) {
                statusMessage.className = 'mt-6 p-4 rounded-xl bg-red-100 text-red-800 border-2 border-red-300';
                statusMessage.textContent = '{{ __tool('port-checker', 'js.error') }}';
                statusMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                btnText.textContent = '{{ __tool('port-checker', 'js.check_port') }}';
                btnIcon.classList.remove('animate-spin');
            }
        });
    </script>
@endpush