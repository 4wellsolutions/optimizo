@extends('layouts.app')

@section('title', 'Privacy Policy - Optimizo')
@section('meta_description', 'Learn how Optimizo protects your privacy and handles your data.')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <h1 class="text-4xl font-black text-gray-900 mb-6">Privacy Policy</h1>
            <p class="text-gray-600 mb-8">Last updated: {{ date('F d, Y') }}</p>

            <div class="prose prose-lg max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">1. Information We Collect</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Optimizo is designed with privacy in mind. Most of our tools process data entirely in your browser
                    without sending information to our servers. We may collect:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 ml-4">
                    <li><strong>Usage Data:</strong> Anonymous analytics about how you use our tools</li>
                    <li><strong>Technical Data:</strong> Browser type, device information, and IP address</li>
                    <li><strong>Contact Information:</strong> Only if you voluntarily submit it through our contact form
                    </li>
                </ul>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">2. How We Use Your Information</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    We use the collected information to:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 ml-4">
                    <li>Provide and maintain our Service</li>
                    <li>Improve and optimize our tools</li>
                    <li>Understand usage patterns and trends</li>
                    <li>Respond to your inquiries and support requests</li>
                    <li>Detect and prevent technical issues</li>
                </ul>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">3. Data Processing</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    <strong>Client-Side Processing:</strong> Most tools (Word Counter, Image Compressor, Base64 Encoder,
                    etc.) process your data entirely in your browser. Your files and text never leave your device.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    <strong>Server-Side Tools:</strong> Some tools (like YouTube tools, WHOIS Lookup) require server
                    processing. Data sent to our servers is processed immediately and not stored permanently.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">4. Cookies and Tracking</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    We use cookies and similar tracking technologies to track activity on our Service and hold certain
                    information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being
                    sent.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">5. Third-Party Services</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    We may use third-party services for analytics and functionality. These services have their own privacy
                    policies. We encourage you to review their privacy policies.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">6. Data Security</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    We implement appropriate technical and organizational security measures to protect your data. However,
                    no method of transmission over the Internet is 100% secure.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">7. Your Rights</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    You have the right to:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6 ml-4">
                    <li>Access your personal data</li>
                    <li>Correct inaccurate data</li>
                    <li>Request deletion of your data</li>
                    <li>Object to processing of your data</li>
                    <li>Request data portability</li>
                </ul>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">8. Children's Privacy</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Our Service is not directed to children under 13. We do not knowingly collect personal information from
                    children under 13.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">9. Changes to Privacy Policy</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new
                    Privacy Policy on this page and updating the "Last updated" date.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">10. Contact Us</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    If you have questions about this Privacy Policy, please <a href="{{ route('contact') }}"
                        class="text-blue-600 hover:text-blue-800 underline">contact us</a>.
                </p>
            </div>
        </div>
    </div>
@endsection