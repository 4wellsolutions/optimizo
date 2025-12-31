@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-emerald-500 via-green-500 to-teal-600 rounded-3xl p-4 md:p-6 mb-8 shadow-2xl">
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white rounded-2xl shadow-2xl mb-3">
                    <svg class="w-9 h-9 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                    </svg>
                </div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-black text-white mb-2">
                    Domain to IP
                </h1>
                <p class="text-base md:text-lg text-white/90 font-medium">
                    Convert domain names to IP addresses!
                </p>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-emerald-200 mb-8">
            <form id="domainForm">
                @csrf
                <div class="mb-6">
                    <label for="domain" class="form-label text-base">Enter Domain Name</label>
                    <input type="text" id="domain" name="domain" class="form-input" placeholder="example.com" required>
                    <p class="text-sm text-gray-500 mt-2">Enter domain without http:// or https://</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span id="btnText">Lookup IP Address</span>
                </button>
            </form>

            <!-- Results -->
            <div id="results" class="hidden mt-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">DNS Lookup Results</h3>
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border-2 border-emerald-200">
                    <div class="mb-4">
                        <div class="text-sm text-gray-600 mb-1">Domain</div>
                        <div class="text-lg font-bold text-gray-900" id="resultDomain"></div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-600 mb-1">IP Address</div>
                        <div class="text-2xl font-black text-emerald-600 font-mono" id="resultIP"></div>
                    </div>

            @include('components.hero-actions')
        </div>
            </div>

            <!-- Error -->
            <div id="error" class="hidden mt-8">
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                    <p class="text-red-800 font-semibold" id="errorText"></p>
                </div>

            @include('components.hero-actions')
        </div>
        </div>

        <!-- SEO Content -->
        <div
            class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-6 md:p-8 border-2 border-emerald-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">DNS Lookup Tool</h2>
            <p class="text-gray-700 leading-relaxed text-lg">
                Convert domain names to IP addresses using DNS lookup. Find the server IP address behind any domain name.
                Perfect for network troubleshooting, server verification, and understanding domain configurations.
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#domainForm').on('submit', function (e) {
            e.preventDefault();

            const domain = $('#domain').val().trim().replace(/^https?:\/\//, '');
            const btn = $(this).find('button[type="submit"]');
            const btnText = $('#btnText');

            if (!domain) return;

            btn.prop('disabled', true).addClass('opacity-75');
            btnText.text('Looking up...');
            $('#results').addClass('hidden');
            $('#error').addClass('hidden');

            $.ajax({
                url: '{{ route("network.domain-to-ip.lookup") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    domain: domain
                },
                success: function (response) {
                    if (response.success) {
                        $('#resultDomain').text(response.data.domain);
                        $('#resultIP').text(response.data.ip);
                        $('#results').removeClass('hidden');
                    }
                },
                error: function (xhr) {
                    const error = xhr.responseJSON?.error || 'Failed to lookup domain';
                    $('#errorText').text(error);
                    $('#error').removeClass('hidden');
                },
                complete: function () {
                    btn.prop('disabled', false).removeClass('opacity-75');
                    btnText.text('Lookup IP Address');
                }
            });
        });

        async function pasteFromClipboard() {
            try {
                const text = await navigator.clipboard.readText();
                document.getElementById('domain').value = text.trim();
            } catch (err) {
                // Fallback for browsers that don't support clipboard API
                document.getElementById('domain').focus();
            }
        }
    </script>
@endsection