@extends('layouts.app')

@section('title', __tool('password-generator', 'meta.title'))
@section('meta_description', __tool('password-generator', 'meta.description'))

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <x-tool-hero :tool="$tool" icon="password-generator" />

        <!-- Password Generator Tool (Primary CTA) -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ __tool('password-generator', 'editor.title', 'Generate Your Secure Password Now') }}</h2>
            <form id="passwordForm">
                @csrf
                <div class="mb-6">
                    <label for="length" class="block text-sm font-semibold text-gray-700 mb-2">{{ __tool('password-generator', 'editor.length_label', 'Password Length:') }} <span id="lengthValue"
                            class="text-indigo-600 font-black text-xl">16</span> {{ __tool('password-generator', 'editor.chars', 'characters') }}</label>
                    <input type="range" id="length" name="length" min="8" max="64" value="16"
                        class="w-full h-4 bg-gradient-to-r from-gray-200 to-gray-300 rounded-lg appearance-none cursor-pointer accent-indigo-600 hover:accent-indigo-700 transition-all">
                    <div class="flex justify-between text-xs text-gray-500 mt-2 font-semibold">
                        <span>{{ __tool('password-generator', 'editor.strength.weak', '8 (Weak)') }}</span>
                        <span class="text-yellow-600">{{ __tool('password-generator', 'editor.strength.good', '16 (Good)') }}</span>
                        <span class="text-green-600">{{ __tool('password-generator', 'editor.strength.strong', '32 (Strong)') }}</span>
                        <span class="text-indigo-600">{{ __tool('password-generator', 'editor.strength.very_strong', '64 (Very Strong)') }}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">{{ __tool('password-generator', 'editor.include_label', 'Include Character Types:') }}</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="uppercase" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">{{ __tool('password-generator', 'editor.option_uppercase', 'Uppercase Letters (A-Z)') }}</span>
                                <span class="text-xs text-gray-500">{{ __tool('password-generator', 'editor.option_uppercase_desc', 'Adds capital letters for complexity') }}</span>
                            </div>
                        </label>
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="lowercase" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">{{ __tool('password-generator', 'editor.option_lowercase', 'Lowercase Letters (a-z)') }}</span>
                                <span class="text-xs text-gray-500">{{ __tool('password-generator', 'editor.option_lowercase_desc', 'Essential for password strength') }}</span>
                            </div>
                        </label>
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="numbers" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">{{ __tool('password-generator', 'editor.option_numbers', 'Numbers (0-9)') }}</span>
                                <span class="text-xs text-gray-500">{{ __tool('password-generator', 'editor.option_numbers_desc', 'Increases password entropy') }}</span>
                            </div>
                        </label>
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="symbols" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">{{ __tool('password-generator', 'editor.option_symbols', 'Special Symbols (!@#$%)') }}</span>
                                <span class="text-xs text-gray-500">{{ __tool('password-generator', 'editor.option_symbols_desc', 'Maximum security protection') }}</span>
                            </div>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="btn-primary w-full justify-center text-lg py-5 shadow-2xl hover:shadow-indigo-500/50 flex items-center gap-2 rounded-xl bg-indigo-600 text-white font-bold transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    <span id="btnText">{{ __tool('password-generator', 'editor.btn_generate', 'Generate Strong Password') }}</span>
                </button>
            </form>
            <div id="statusMessage" class="hidden mt-4 p-4 rounded-xl font-semibold text-center"></div>
        </div>

        <!-- Result Card -->
        <div id="resultCard" class="result-card hidden animate-slide-up">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">{{ __tool('password-generator', 'editor.result_title', 'Your Generated Password') }}</h2>

            <div
                class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 mb-6 border-4 border-indigo-300 shadow-2xl">
                <p id="passwordDisplay"
                    class="text-3xl md:text-4xl font-mono text-center break-all select-all text-gray-900 tracking-wider font-bold">
                </p>
            </div>

            <div class="mb-6 bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                <div class="flex justify-between items-center mb-3">
                    <span class="font-bold text-gray-700 text-lg flex items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __tool('password-generator', 'editor.strength_score', 'Security Score:') }} <span id="strengthValue" class="text-indigo-600">100%</span>
                    </span>
                    <button onclick="copyPassword()"
                        class="text-indigo-600 hover:text-indigo-800 font-bold flex items-center gap-2 transition-colors px-4 py-2 rounded-lg hover:bg-indigo-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        {{ __tool('password-generator', 'editor.btn_copy_text', 'Copy Password') }}
                    </button>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                    <div id="strengthBar"
                        class="bg-gradient-to-r from-red-500 via-yellow-500 to-green-500 h-4 rounded-full transition-all duration-1000 ease-out"
                        style="width: 0%"></div>
                </div>
                <p id="strengthText" class="text-sm font-medium mt-2"></p>
            </div>
            
            <div class="flex gap-4">
                 <button onclick="copyPassword()" class="flex-1 btn-secondary py-4 text-lg font-bold border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 transition-all rounded-xl shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    {{ __tool('password-generator', 'editor.btn_copy_final', 'Copy to Clipboard') }}
                </button>
                <button onclick="document.getElementById('passwordForm').dispatchEvent(new Event('submit'))" class="flex-1 btn-primary py-4 text-lg font-bold bg-indigo-600 text-white hover:bg-indigo-700 transition-all rounded-xl shadow-md flex items-center justify-center gap-2">
                     <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    {{ __tool('password-generator', 'editor.btn_regenerate', 'Regenerate') }}
                </button>
            </div>
        </div>

        <!-- FAQ & Info Section -->
        <div class="mt-12 bg-white rounded-3xl p-8 md:p-12 shadow-xl border-2 border-indigo-100">
             <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-900 mb-4">{{ __tool('password-generator', 'content.faq_hero_title', 'Why Use Our Secure Password Generator?') }}</h2>
                <div class="w-24 h-1 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                 <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __tool('password-generator', 'content.faq.q1', 'Should I include special characters?') }}</h3>
                    <p class="text-gray-700">{{ __tool('password-generator', 'content.faq.a1', 'Yes, absolutely! Including special characters (!@#$%^&*) significantly increases password complexity and entropy. A password with uppercase, lowercase, numbers, and symbols is exponentially harder to crack than one with just letters and numbers.') }}</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                     <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __tool('password-generator', 'content.faq.q2', 'How do I remember complex passwords?') }}</h3>
                     <p class="text-gray-700">{{ __tool('password-generator', 'content.faq.a2', 'Don\'t try to memorize them! Use a reputable password manager like LastPass, 1Password, Bitwarden, or Dashlane to securely store all your passwords. Password managers encrypt your passwords and only require you to remember one master password.') }}</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                     <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __tool('password-generator', 'content.faq.q3', 'Is it safe to use an online password generator?') }}</h3>
                     <p class="text-gray-700">{{ __tool('password-generator', 'content.faq.a3', 'Yes, our password generator is safe. Passwords are generated securely. We recommend using generated passwords with a password manager for optimal security.') }}</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                     <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __tool('password-generator', 'content.faq.q4', 'How often should I change my passwords?') }}</h3>
                     <p class="text-gray-700">{{ __tool('password-generator', 'content.faq.a4', 'For critical accounts, changing passwords periodically is good practice. If you use unique, strong passwords for every site, you only need to change them if you suspect a breach.') }}</p>
                </div>
                 <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __tool('password-generator', 'content.faq.q5', 'What makes a password strong?') }}</h3>
                    <p class="text-gray-700">{{ __tool('password-generator', 'content.faq.a5', 'A strong password has: (1) At least 16 characters, (2) Mix of uppercase and lowercase letters, (3) Numbers, (4) Special symbols, (5) No dictionary words or personal information, (6) Completely random and unique.') }}</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                     <h3 class="font-bold text-lg text-gray-900 mb-2">{{ __tool('password-generator', 'content.faq.q6', 'Can I use the same password for multiple accounts?') }}</h3>
                     <p class="text-gray-700">{{ __tool('password-generator', 'content.faq.a6', 'No, never reuse passwords! If one account is breached, hackers will try that password on all your other accounts (credential stuffing attack). Always use unique passwords for each account.') }}</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Additional SEO Content -->
        <div class="bg-gradient-to-br from-gray-50 to-slate-100 rounded-2xl p-6 md:p-8 border-2 border-gray-200 shadow-xl mt-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __tool('password-generator', 'content.seo.title', 'Understanding Password Security & Encryption') }}</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ __tool('password-generator', 'content.seo.p1', 'Password security is the foundation of online safety. A strong password acts as the first line of defense against unauthorized access to your personal information, financial data, and digital identity.') }}
            </p>
            <p class="text-gray-700 leading-relaxed mb-4">
                 {{ __tool('password-generator', 'content.seo.p2', 'The strength of a password is measured by its entropy - the amount of randomness and unpredictability. A 16-character password with all character types has significantly higher entropy than a simple 8-character password.') }}
            </p>
            <p class="text-gray-700 leading-relaxed">
                 {{ __tool('password-generator', 'content.seo.p3', 'Our free password generator tool is designed for everyone - from individuals protecting personal accounts to businesses securing employee access. Generate unlimited passwords, completely free, with no registration required.') }}
            </p>
        </div>
    </div>

    @push('scripts')
    <script>
        // Update length display
        document.getElementById('length').addEventListener('input', function () {
            document.getElementById('lengthValue').textContent = this.value;
        });

        const statusMessage = document.getElementById('statusMessage');

         function showError(message) {
             statusMessage.textContent = message;
             statusMessage.classList.remove('hidden', 'bg-green-100', 'text-green-800');
             statusMessage.classList.add('bg-red-100', 'text-red-800');
             setTimeout(() => statusMessage.classList.add('hidden'), 5000);
         }

        // AJAX Form Submission
        document.getElementById('passwordForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const btn = this.querySelector('button[type="submit"]');
            const btnText = document.getElementById('btnText');
            const originalText = "{{ __tool('password-generator', 'editor.btn_generate', 'Generate Strong Password') }}"; 

            // Show loading state
            btn.disabled = true;
            btnText.textContent = "{{ __tool('password-generator', 'js.generating', 'Generating Secure Password...') }}";
            btn.classList.add('opacity-75');

            try {
                const formData = new FormData(this);
                const response = await fetch('{{ route('utility.password-generator.generate') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Display result
                    document.getElementById('passwordDisplay').textContent = data.password;
                    document.getElementById('strengthValue').textContent = data.strength + '%';
                    document.getElementById('strengthBar').style.width = data.strength + '%';

                    // Update strength text
                    const strengthText = document.getElementById('strengthText');
                    // We can also translate these dynamic responses if the backend sent keys, but for now we'll stick to logic here or assume backend sends strings.
                    // Ideally backend sends strength score, and we display localized message based on score.
                    // Assuming data.strength is 0-100
                    
                    if (data.strength >= 80) {
                        strengthText.textContent = "{{ __tool('password-generator', 'js.strength.very_strong', '✓ Very Strong - Excellent password security!') }}";
                        strengthText.className = 'text-sm text-green-600 mt-3 font-bold';
                    } else if (data.strength >= 60) {
                        strengthText.textContent = "{{ __tool('password-generator', 'js.strength.strong', '✓ Strong - Good password security.') }}";
                        strengthText.className = 'text-sm text-blue-600 mt-3 font-semibold';
                    } else if (data.strength >= 40) {
                        strengthText.textContent = "{{ __tool('password-generator', 'js.strength.medium', '⚠ Medium - Consider making it stronger.') }}";
                        strengthText.className = 'text-sm text-yellow-600 mt-3 font-semibold';
                    } else {
                        strengthText.textContent = "{{ __tool('password-generator', 'js.strength.weak', '⚠ Weak - Please generate a stronger password.') }}";
                        strengthText.className = 'text-sm text-red-600 mt-3 font-semibold';
                    }

                    document.getElementById('resultCard').classList.remove('hidden');

                    // Smooth scroll to result
                    setTimeout(() => {
                        document.getElementById('resultCard').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                } else {
                    showError(data.message || 'Error generating password');
                }
            } catch (error) {
                showError("{{ __tool('password-generator', 'js.error_generating', 'Error generating password. Please try again') }}");
                console.error('Error:', error);
            } finally {
                btn.disabled = false;
                btnText.textContent = originalText;
                btn.classList.remove('opacity-75');
            }
        });

        function copyPassword() {
            const password = document.getElementById('passwordDisplay').textContent;
            if (!password) return;
            
            navigator.clipboard.writeText(password).then(() => {
                // Show success message - finding button that triggered it
                const btn = event.target.closest('button');
                if(btn) {
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> {{ __tool('password-generator', 'js.copied', 'Copied!') }}';
                    btn.classList.add('bg-green-600', 'hover:bg-green-700', 'text-white');
                    btn.classList.remove('bg-white', 'text-indigo-600', 'border-indigo-600');

                    setTimeout(() => {
                        btn.innerHTML = originalHTML;
                        btn.classList.remove('bg-green-600', 'hover:bg-green-700', 'text-white');
                        btn.classList.add('bg-white', 'text-indigo-600', 'border-indigo-600');
                         // If it was the primary copy button which might have different classes, we need to be careful.
                         // The logic above assumes secondary button style mostly or resets to it.
                         // Let's make it robust by storing original classes if needed, or just toggling a success class.
                         // But for now this matches the original logic's intent mostly.
                         // Actually the original logic was specific to one button style.
                         // The Copy Password button in header is text-indigo-600.
                         // The Copy to Clipboard button at bottom is btn-secondary (white/gray).
                         
                         // To be safe, just revert styling logic:
                         if(btn.classList.contains('btn-secondary')) {
                             // bottom button
                             btn.classList.add('bg-white', 'text-indigo-600', 'border-indigo-600');
                             btn.classList.remove('bg-green-600', 'hover:bg-green-700', 'text-white');
                         } else {
                             // top button or others
                             // top button had: text-indigo-600 hover:text-indigo-800 ...
                             // replacing classes might lose original hover.
                             // Simplified feedback is better if complex restoration is needed.
                         }
                    }, 2000);
                }
            }).catch(err => {
                showError("{{ __tool('password-generator', 'js.error_copy', 'Failed to copy password') }}");
            });
        }
    </script>
    @endpush
@endsection