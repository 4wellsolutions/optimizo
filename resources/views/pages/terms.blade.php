@extends('layouts.app')

@section('title', 'Terms & Conditions - Optimizo')
@section('meta_description', 'Read our terms and conditions for using Optimizo online tools.')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <h1 class="text-4xl font-black text-gray-900 mb-6">Terms & Conditions</h1>
            <p class="text-gray-600 mb-8">Last updated: {{ date('F d, Y') }}</p>

            <div class="prose prose-lg max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">1. Acceptance of Terms</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    By accessing and using Optimizo ("the Service"), you accept and agree to be bound by the terms and
                    provision of this agreement. If you do not agree to these Terms & Conditions, please do not use our
                    Service.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">2. Use of Service</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Optimizo provides free online tools for various purposes including YouTube tools, SEO tools, network
                    tools, and utility tools. You agree to use these tools:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 ml-4">
                    <li>Only for lawful purposes</li>
                    <li>In accordance with these Terms & Conditions</li>
                    <li>Without violating any applicable laws or regulations</li>
                    <li>Without infringing on the rights of others</li>
                </ul>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">3. Privacy and Data</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    We respect your privacy. All tools process data client-side in your browser whenever possible. We do not
                    store or collect your personal data unless explicitly stated. Please refer to our <a
                        href="{{ route('privacy') }}" class="text-blue-600 hover:text-blue-800 underline">Privacy Policy</a>
                    for more information.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">4. Intellectual Property</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The Service and its original content, features, and functionality are owned by Optimizo and are
                    protected by international copyright, trademark, patent, trade secret, and other intellectual property
                    laws.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">5. Disclaimer of Warranties</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The Service is provided "AS IS" and "AS AVAILABLE" without warranties of any kind, either express or
                    implied. We do not guarantee that the Service will be uninterrupted, secure, or error-free.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">6. Limitation of Liability</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    In no event shall Optimizo, its directors, employees, or agents be liable for any indirect, incidental,
                    special, consequential, or punitive damages arising out of your use of the Service.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">7. Changes to Terms</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    We reserve the right to modify or replace these Terms at any time. We will provide notice of any changes
                    by updating the "Last updated" date. Your continued use of the Service after any changes constitutes
                    acceptance of the new Terms.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">8. Contact Us</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    If you have any questions about these Terms & Conditions, please <a href="{{ route('contact') }}"
                        class="text-blue-600 hover:text-blue-800 underline">contact us</a>.
                </p>
            </div>
        </div>
    </div>
@endsection