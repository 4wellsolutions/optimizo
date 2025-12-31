// Global paste functionality for all input fields
document.addEventListener('DOMContentLoaded', function () {
    // Add paste buttons to all text inputs that don't have them
    const inputs = document.querySelectorAll('input[type="text"], input[type="url"], textarea');

    inputs.forEach(input => {
        // Skip if already has paste button or is readonly
        if (input.readOnly || input.closest('.relative')?.querySelector('[onclick*="paste"]')) {
            return;
        }

        // Wrap input in relative container if not already
        if (!input.parentElement.classList.contains('relative')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative';
            input.parentNode.insertBefore(wrapper, input);
            wrapper.appendChild(input);
        }

        // Add padding to input for paste button
        input.classList.add('pr-12');

        // Create paste button
        const pasteBtn = document.createElement('button');
        pasteBtn.type = 'button';
        pasteBtn.className = 'absolute right-2 top-1/2 -translate-y-1/2 p-2 text-gray-500 hover:text-blue-600 transition-colors';
        pasteBtn.title = 'Paste from clipboard';
        pasteBtn.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        `;

        pasteBtn.addEventListener('click', async function () {
            try {
                const text = await navigator.clipboard.readText();
                input.value = text.trim();
                input.dispatchEvent(new Event('input', { bubbles: true }));
            } catch (err) {
                // Fallback - just focus the input
                input.focus();
                input.select();
            }
        });

        input.parentElement.appendChild(pasteBtn);
    });
});
