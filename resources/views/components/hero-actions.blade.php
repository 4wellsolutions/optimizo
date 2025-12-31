<!-- Hero Actions Component - Share and Report buttons for hero section -->
<div class="flex items-center justify-between mt-6 pt-6 border-t border-white/20">
    <div class="flex items-center gap-2">
        <span class="text-sm font-semibold text-white/90">Share:</span>
        <div class="flex gap-2">
            <!-- Twitter -->
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($tool->meta_title ?? 'Check out this tool') }}"
                target="_blank"
                class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                title="Share on Twitter">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                    </path>
                </svg>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
                class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                title="Share on Facebook">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                target="_blank"
                class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                title="Share on LinkedIn">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                    </path>
                    <circle cx="4" cy="4" r="2"></circle>
                </svg>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/?text={{ urlencode($tool->meta_title . ' - ' . url()->current()) }}" target="_blank"
                class="inline-flex items-center justify-center w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg transition-all duration-200"
                title="Share on WhatsApp">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z">
                    </path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Report Button -->
    <button onclick="openReportModal()"
        class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white text-sm font-medium rounded-lg transition-all duration-200 border border-white/30"
        title="Report an issue">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
            </path>
        </svg>
        Report
    </button>
</div>

<!-- Report Modal (same as before) -->
<div id="reportModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 relative">
        <button onclick="closeReportModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <h3 class="text-2xl font-bold text-gray-900 mb-4">Report an Issue</h3>

        <form id="reportForm" onsubmit="submitReport(event)">
            <div id="issueTypeSection" class="space-y-3 mb-6">
                <label class="block">
                    <input type="radio" name="issueType" value="not_working" class="mr-2" required>
                    <span class="text-gray-700 font-medium">Not Working</span>
                    <p class="text-sm text-gray-500 ml-6">The tool is completely broken or not functioning</p>
                </label>

                <label class="block">
                    <input type="radio" name="issueType" value="malfunctioned" class="mr-2" required>
                    <span class="text-gray-700 font-medium">Malfunctioned</span>
                    <p class="text-sm text-gray-500 ml-6">The tool works but produces incorrect results</p>
                </label>

                <label class="block">
                    <input type="radio" name="issueType" value="suggestion" class="mr-2" required>
                    <span class="text-gray-700 font-medium">Suggestion</span>
                    <p class="text-sm text-gray-500 ml-6">I have an idea to improve this tool</p>
                </label>
            </div>

            <div id="suggestionSection" class="hidden mb-6">
                <label for="suggestionText" class="block text-sm font-semibold text-gray-700 mb-2">
                    Your Suggestion
                </label>
                <textarea id="suggestionText" name="suggestion" rows="4"
                    class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    placeholder="Please describe your suggestion in detail..."></textarea>
            </div>

            <div class="mb-6">
                <label for="reportEmail" class="block text-sm font-semibold text-gray-700 mb-2">
                    Your Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="reportEmail" name="email" required
                    class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    placeholder="your.email@example.com">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="flex-1 px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition-colors duration-200">
                    Submit Report
                </button>
                <button type="button" onclick="closeReportModal()"
                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition-colors duration-200">
                    Cancel
                </button>
            </div>
        </form>

        <div id="reportSuccess" class="hidden text-center py-8">
            <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h4 class="text-xl font-bold text-gray-900 mb-2">Thank You!</h4>
            <p class="text-gray-600">Your report has been submitted successfully. We'll review it shortly.</p>
            <button onclick="closeReportModal()"
                class="mt-4 px-6 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg">
                Close
            </button>
        </div>
    </div>
</div>

<script>
    function openReportModal() {
        document.getElementById('reportModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeReportModal() {
        document.getElementById('reportModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        document.getElementById('reportForm').reset();
        document.getElementById('suggestionSection').classList.add('hidden');
        document.getElementById('reportSuccess').classList.add('hidden');
        document.getElementById('issueTypeSection').classList.remove('hidden');
        document.getElementById('reportEmail').parentElement.classList.remove('hidden');
        document.querySelector('button[type="submit"]').parentElement.classList.remove('hidden');
    }

    document.querySelectorAll('input[name="issueType"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const suggestionSection = document.getElementById('suggestionSection');
            const suggestionText = document.getElementById('suggestionText');

            if (this.value === 'suggestion') {
                suggestionSection.classList.remove('hidden');
                suggestionText.required = true;
            } else {
                suggestionSection.classList.add('hidden');
                suggestionText.required = false;
            }
        });
    });

    function submitReport(event) {
        event.preventDefault();

        const formData = new FormData(event.target);
        const data = {
            tool: '{{ $tool->slug ?? "unknown" }}',
            issueType: formData.get('issueType'),
            suggestion: formData.get('suggestion'),
            email: formData.get('email'),
            url: window.location.href
        };

        console.log('Report submitted:', data);

        document.getElementById('issueTypeSection').classList.add('hidden');
        document.getElementById('suggestionSection').classList.add('hidden');
        document.getElementById('reportEmail').parentElement.classList.add('hidden');
        document.querySelector('button[type="submit"]').parentElement.classList.add('hidden');
        document.getElementById('reportSuccess').classList.remove('hidden');
    }
</script>