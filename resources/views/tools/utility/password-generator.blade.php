@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Password Generator Tool (Primary CTA) -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-indigo-200 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Generate Your Secure Password Now</h2>
            <form id="passwordForm">
                @csrf
                <div class="mb-6">
                    <label for="length" class="form-label text-base">Password Length: <span id="lengthValue"
                            class="text-indigo-600 font-black text-xl">16</span> characters</label>
                    <input type="range" id="length" name="length" min="8" max="64" value="16"
                        class="w-full h-4 bg-gradient-to-r from-gray-200 to-gray-300 rounded-lg appearance-none cursor-pointer accent-indigo-600 hover:accent-indigo-700 transition-all">
                    <div class="flex justify-between text-xs text-gray-500 mt-2 font-semibold">
                        <span>8 (Weak)</span>
                        <span class="text-yellow-600">16 (Good)</span>
                        <span class="text-green-600">32 (Strong)</span>
                        <span class="text-indigo-600">64 (Very Strong)</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="form-label mb-4 text-base">Include Character Types:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="uppercase" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">Uppercase Letters (A-Z)</span>
                                <span class="text-xs text-gray-500">Adds capital letters for complexity</span>
                            </div>
                        </label>
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="lowercase" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">Lowercase Letters (a-z)</span>
                                <span class="text-xs text-gray-500">Essential for password strength</span>
                            </div>
                        </label>
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="numbers" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">Numbers (0-9)</span>
                                <span class="text-xs text-gray-500">Increases password entropy</span>
                            </div>
                        </label>
                        <label
                            class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl hover:bg-indigo-50 transition-colors border-2 border-gray-200 hover:border-indigo-300 group">
                            <input type="checkbox" name="symbols" value="1" checked
                                class="w-6 h-6 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 focus:ring-2">
                            <div class="flex-1">
                                <span class="text-sm font-bold text-gray-900 block">Special Symbols (!@#$%)</span>
                                <span class="text-xs text-gray-500">Maximum security protection</span>
                            </div>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="btn-primary w-full justify-center text-lg py-5 shadow-2xl hover:shadow-indigo-500/50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    <span id="btnText" class="font-bold">Generate Strong Password</span>
                </button>
            </form>
        </div>

        <!-- Result Card -->
        <div id="resultCard" class="result-card hidden animate-slide-up">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Your Generated Password</h2>

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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Password Strength:
                    </span>
                    <span id="strengthValue" class="font-black text-3xl text-indigo-600">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-5 shadow-inner">
                    <div id="strengthBar" class="bg-gradient-primary h-5 rounded-full transition-all duration-500 shadow-lg"
                        style="width: 0%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-3 font-semibold" id="strengthText">Calculating strength...</p>
            </div>

            <div class="flex flex-col md:flex-row gap-4">
                <button onclick="copyPassword()"
                    class="btn-secondary flex-1 justify-center text-lg py-4 shadow-lg hover:shadow-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Copy Password
                </button>
                <button onclick="document.getElementById('passwordForm').requestSubmit()"
                    class="btn-primary flex-1 justify-center text-lg py-4 shadow-lg hover:shadow-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Generate Another Password
                </button>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content Section -->
        <div
            class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-2xl p-6 md:p-8 mb-8 border-2 border-indigo-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Use Our Password Generator?</h2>
            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                In today's digital landscape, password security is more critical than ever. Cybercriminals use sophisticated
                tools to crack weak passwords in seconds. Our free online password generator creates cryptographically
                secure, random passwords that are virtually impossible to crack. Whether you need a password for your email,
                social media, banking, cloud storage, or any online account, our tool generates ultra-strong passwords with
                customizable options including uppercase letters, lowercase letters, numbers, and special symbols. Protect
                your digital life with passwords that meet the highest security standards.
            </p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-indigo-200 hover:border-indigo-400">
                    <div class="text-4xl mb-3">🛡️</div>
                    <h3 class="font-bold text-indigo-600 mb-2 text-lg">Military-Grade Security</h3>
                    <p class="text-sm text-gray-600">Generate cryptographically strong passwords with up to 64 characters
                        using advanced algorithms</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-purple-200 hover:border-purple-400">
                    <div class="text-4xl mb-3">⚙️</div>
                    <h3 class="font-bold text-purple-600 mb-2 text-lg">Fully Customizable</h3>
                    <p class="text-sm text-gray-600">Choose password length (8-64 chars) and character types to meet any
                        security requirement</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-pink-200 hover:border-pink-400">
                    <div class="text-4xl mb-3">🔒</div>
                    <h3 class="font-bold text-pink-600 mb-2 text-lg">100% Private & Secure</h3>
                    <p class="text-sm text-gray-600">Passwords generated in your browser - we never store, transmit, or log
                        your passwords</p>
                </div>
                <div
                    class="bg-white rounded-xl p-5 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-green-200 hover:border-green-400">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-green-600 mb-2 text-lg">Instant Generation</h3>
                    <p class="text-sm text-gray-600">Get your secure password immediately with one click - no delays, no
                        registration</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- How to Use Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">How to Create a Strong Password in 4 Easy Steps
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-indigo-50 border-2 border-indigo-200">
                    <div
                        class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg">
                        1</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Choose Password Length</h3>
                        <p class="text-gray-700 text-sm">Select a length between 8-64 characters. We recommend at least 16
                            characters for maximum security against brute-force attacks.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-purple-50 border-2 border-purple-200">
                    <div
                        class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg">
                        2</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Select Character Types</h3>
                        <p class="text-gray-700 text-sm">Include uppercase, lowercase, numbers, and symbols for the
                            strongest passwords. More character types = higher entropy.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-pink-50 border-2 border-pink-200">
                    <div
                        class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-pink-600 to-red-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg">
                        3</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Generate Password</h3>
                        <p class="text-gray-700 text-sm">Click the button to instantly create your secure password. Our
                            algorithm ensures true randomness for maximum security.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-green-50 border-2 border-green-200">
                    <div
                        class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-600 to-emerald-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg">
                        4</div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Copy & Save Securely</h3>
                        <p class="text-gray-700 text-sm">Copy your password and store it in a reputable password manager.
                            Never write passwords on paper or save in plain text files.</p>
                    </div>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Password Security Best Practices -->
        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 md:p-8 mb-8 border-2 border-blue-100 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Password Security Best Practices & Tips</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-bold text-green-700 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        DO These Things
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Use unique passwords</strong> for each account - never reuse passwords across
                                different websites or services</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Make passwords at least 16 characters</strong> long for optimal security against
                                modern hacking techniques</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Include all character types</strong> - uppercase, lowercase, numbers, and special
                                symbols for maximum complexity</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Store passwords in a password manager</strong> like LastPass, 1Password, or
                                Bitwarden for secure storage</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Enable two-factor authentication (2FA)</strong> whenever possible for an extra
                                layer of security</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Change passwords regularly</strong> - update critical account passwords every 3-6
                                months</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-red-700 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        DON'T Do These Things
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Never use personal information</strong> like names, birthdays, addresses, or phone
                                numbers in passwords</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Avoid common passwords</strong> like "password123", "qwerty", or "123456" - these
                                are cracked instantly</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Don't use dictionary words</strong> or simple patterns - hackers use dictionary
                                attacks to crack these</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Never write passwords on paper</strong> or save them in unencrypted text files,
                                emails, or notes</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Don't share passwords</strong> via email, text message, or any unsecured
                                communication method</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span><strong>Avoid using the same password</strong> across multiple accounts - one breach
                                compromises all</span>
                        </li>
                    </ul>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-xl border-2 border-gray-200 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Frequently Asked Questions (FAQ)</h2>
            <div class="space-y-4">
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ How secure are the passwords generated by this tool?
                    </h3>
                    <p class="text-gray-700">Our password generator uses cryptographically secure random number generation
                        to create passwords. The passwords are generated entirely in your browser using JavaScript's
                        crypto.getRandomValues() method, ensuring true randomness and maximum security. We never store,
                        transmit, or log any generated passwords.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ What is the ideal password length?</h3>
                    <p class="text-gray-700">We recommend a minimum of 16 characters for strong security. Longer passwords
                        (24-32 characters) provide even better protection against brute-force attacks. Our generator
                        supports up to 64 characters for maximum security. The longer your password, the more time it would
                        take for a computer to crack it through brute force.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ Should I include special characters in my password?
                    </h3>
                    <p class="text-gray-700">Yes, absolutely! Including special characters (!@#$%^&*) significantly
                        increases password complexity and entropy. A password with uppercase, lowercase, numbers, and
                        symbols is exponentially harder to crack than one with just letters and numbers. We highly recommend
                        enabling all character types for maximum security.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ How do I remember complex passwords?</h3>
                    <p class="text-gray-700">Don't try to memorize them! Use a reputable password manager like LastPass,
                        1Password, Bitwarden, or Dashlane to securely store all your passwords. Password managers encrypt
                        your passwords and only require you to remember one master password. This allows you to use unique,
                        complex passwords for every account without memorization.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ Is it safe to use an online password generator?</h3>
                    <p class="text-gray-700">Yes, our password generator is completely safe because all password generation
                        happens locally in your browser. The passwords are never sent to our servers or stored anywhere. You
                        can even use this tool offline by saving the page. For extra security, you can disconnect from the
                        internet before generating passwords.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ How often should I change my passwords?</h3>
                    <p class="text-gray-700">For critical accounts (email, banking, work), change passwords every 3-6
                        months. If you suspect a breach or receive a security alert, change your password immediately. Using
                        unique passwords for each account (via a password manager) reduces the need for frequent changes, as
                        a breach on one site won't affect your other accounts.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ What makes a password strong?</h3>
                    <p class="text-gray-700">A strong password has: (1) At least 16 characters, (2) Mix of uppercase and
                        lowercase letters, (3) Numbers, (4) Special symbols, (5) No dictionary words or personal
                        information, (6) Completely random and unique. Our generator creates passwords that meet all these
                        criteria automatically.</p>
                </div>
                <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-indigo-300 transition-colors">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">❓ Can I use the same password for multiple accounts?
                    </h3>
                    <p class="text-gray-700">No, never reuse passwords! If one account is breached, hackers will try that
                        password on all your other accounts (credential stuffing attack). Always use unique passwords for
                        each account. A password manager makes this easy by generating and storing unique passwords for
                        every site you use.</p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- Additional SEO Content -->
        <div class="bg-gradient-to-br from-gray-50 to-slate-100 rounded-2xl p-6 md:p-8 border-2 border-gray-200 shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Understanding Password Security & Encryption</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Password security is the foundation of online safety. A strong password acts as the first line of defense
                against unauthorized access to your personal information, financial data, and digital identity. Weak
                passwords can be cracked in seconds using modern computing power and sophisticated hacking tools. Our
                password generator creates truly random passwords with high entropy, making them resistant to dictionary
                attacks, brute-force attacks, and rainbow table attacks.
            </p>
            <p class="text-gray-700 leading-relaxed mb-4">
                The strength of a password is measured by its entropy - the amount of randomness and unpredictability. A
                16-character password with all character types has approximately 100 bits of entropy, which would take
                billions of years to crack using current technology. By comparison, a simple 8-character password with only
                lowercase letters has just 37 bits of entropy and can be cracked in hours.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Our free password generator tool is designed for everyone - from individuals protecting personal accounts to
                businesses securing employee access. Whether you're creating passwords for Gmail, Facebook, Instagram,
                Twitter, LinkedIn, banking apps, cloud storage, VPNs, or any online service, our tool ensures you get
                military-grade security every time. Generate unlimited passwords, completely free, with no registration
                required.
            </p>
        </div>
    </div>

    <script>
        // Update length display
        document.getElementById('length').addEventListener('input', function () {
            document.getElementById('lengthValue').textContent = this.value;
        });

        // AJAX Form Submission
        document.getElementById('passwordForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const btn = this.querySelector('button[type="submit"]');
            const btnText = document.getElementById('btnText');
            const originalText = btnText.textContent;

            // Show loading state
            btn.disabled = true;
            btnText.textContent = 'Generating Secure Password...';
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
                    if (data.strength >= 80) {
                        strengthText.textContent = '✓ Very Strong - Excellent password security! This password is highly resistant to attacks.';
                        strengthText.className = 'text-sm text-green-600 mt-3 font-bold';
                    } else if (data.strength >= 60) {
                        strengthText.textContent = '✓ Strong - Good password security. Consider adding more characters for even better protection.';
                        strengthText.className = 'text-sm text-blue-600 mt-3 font-semibold';
                    } else if (data.strength >= 40) {
                        strengthText.textContent = '⚠ Medium - Consider making it stronger by adding more characters and character types.';
                        strengthText.className = 'text-sm text-yellow-600 mt-3 font-semibold';
                    } else {
                        strengthText.textContent = '⚠ Weak - Please generate a stronger password with more characters and complexity.';
                        strengthText.className = 'text-sm text-red-600 mt-3 font-semibold';
                    }

                    document.getElementById('resultCard').classList.remove('hidden');

                    // Smooth scroll to result
                    setTimeout(() => {
                        document.getElementById('resultCard').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            } catch (error) {
                alert('Error generating password. Please try again.');
                console.error('Error:', error);
            } finally {
                btn.disabled = false;
                btnText.textContent = originalText;
                btn.classList.remove('opacity-75');
            }
        });

        function copyPassword() {
            const password = document.getElementById('passwordDisplay').textContent;
            navigator.clipboard.writeText(password).then(() => {
                // Show success message
                const btn = event.target.closest('button');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Copied!';
                btn.classList.add('bg-green-600', 'hover:bg-green-700');
                btn.classList.remove('bg-white', 'text-indigo-600', 'border-indigo-600');

                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('bg-green-600', 'hover:bg-green-700');
                    btn.classList.add('bg-white', 'text-indigo-600', 'border-indigo-600');
                }, 2000);
            }).catch(err => {
                alert('Failed to copy password. Please copy manually.');
            });
        }
    </script>
@endsection