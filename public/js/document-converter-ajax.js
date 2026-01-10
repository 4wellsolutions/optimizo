/**
 * Universal Document Converter AJAX Handler
 * Handles all document converter tool form submissions via AJAX
 * With comprehensive error validation
 */
$(document).ready(function () {
    const $form = $('#converterForm');
    if (!$form.length) return; // Exit if no form on this page

    // Configuration
    const MAX_FILE_SIZE = 10 * 1024 * 1024; // 10MB in bytes
    const FILE_TYPE_MAP = {
        '.pdf': ['application/pdf'],
        '.doc': ['application/msword'],
        '.docx': ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        '.xlsx': ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
        '.xls': ['application/vnd.ms-excel'],
        '.csv': ['text/csv', 'application/csv'],
        '.ppt': ['application/vnd.ms-powerpoint'],
        '.pptx': ['application/vnd.openxmlformats-officedocument.presentationml.presentation'],
        '.jpg': ['image/jpeg'],
        '.jpeg': ['image/jpeg'],
        '.png': ['image/png'],
        '.rtf': ['application/rtf', 'text/rtf']
    };

    /**
     * Validate file type against accepted types
     */
    function validateFileType(file, acceptedTypes) {
        if (!acceptedTypes) return true;

        const acceptedExtensions = acceptedTypes.split(',').map(t => t.trim().toLowerCase());
        const fileName = file.name.toLowerCase();
        const fileExt = '.' + fileName.split('.').pop();

        // Check extension
        if (!acceptedExtensions.includes(fileExt)) {
            return false;
        }

        // Check MIME type if available
        if (file.type) {
            const allowedMimeTypes = FILE_TYPE_MAP[fileExt] || [];
            if (allowedMimeTypes.length > 0 && !allowedMimeTypes.includes(file.type)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validate file size
     */
    function validateFileSize(file, maxSize = MAX_FILE_SIZE) {
        if (file.size === 0) {
            return { valid: false, error: 'The selected file is empty. Please choose a valid file.' };
        }
        if (file.size > maxSize) {
            const sizeMB = (maxSize / (1024 * 1024)).toFixed(0);
            return { valid: false, error: `File size exceeds the maximum limit of ${sizeMB}MB. Please choose a smaller file.` };
        }
        return { valid: true };
    }

    /**
     * Format file size for display
     */
    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(2) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }

    // File selection display with validation
    $('#file').on('change', function () {
        const fileInput = this;
        const acceptedTypes = $(fileInput).attr('accept');
        const isMultiple = $(fileInput).attr('multiple') !== undefined;

        if (fileInput.files.length === 0) {
            $('#file-name').addClass('hidden');
            return;
        }

        // Handle multiple files (for PDF merger)
        if (isMultiple) {
            const fileCount = fileInput.files.length;
            let totalSize = 0;
            let invalidFiles = [];

            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];
                totalSize += file.size;

                if (!validateFileType(file, acceptedTypes)) {
                    invalidFiles.push(file.name);
                }
            }

            if (invalidFiles.length > 0) {
                showError(`Invalid file type(s): ${invalidFiles.join(', ')}\nPlease select only ${acceptedTypes} files.`);
                fileInput.value = '';
                $('#file-name').addClass('hidden');
                return;
            }

            if (totalSize > MAX_FILE_SIZE) {
                showError(`Total file size (${formatFileSize(totalSize)}) exceeds the maximum limit of ${formatFileSize(MAX_FILE_SIZE)}.\nPlease select fewer or smaller files.`);
                fileInput.value = '';
                $('#file-name').addClass('hidden');
                return;
            }

            $('#file-name').text(`${fileCount} file(s) selected (${formatFileSize(totalSize)})`).removeClass('hidden');
        } else {
            // Handle single file
            const file = fileInput.files[0];

            // Validate file type
            if (!validateFileType(file, acceptedTypes)) {
                showError(`Invalid file type. Please select a ${acceptedTypes} file.`);
                fileInput.value = '';
                $('#file-name').addClass('hidden');
                return;
            }

            // Validate file size
            const sizeValidation = validateFileSize(file);
            if (!sizeValidation.valid) {
                showError(sizeValidation.error);
                fileInput.value = '';
                $('#file-name').addClass('hidden');
                return;
            }

            $('#file-name').text(`${file.name} (${formatFileSize(file.size)})`).removeClass('hidden');
        }

        console.log('File(s) selected and validated');
    });

    // AJAX form submission with validation
    $form.on('submit', function (e) {
        e.preventDefault();
        console.log('Form submitted, preventing default');

        // Get the file input
        const fileInput = $('#file')[0];
        const acceptedTypes = $(fileInput).attr('accept');
        const isMultiple = $(fileInput).attr('multiple') !== undefined;

        // Check if file(s) selected
        if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
            showError('Please select a file first');
            return false;
        }

        // Validate files before submission
        if (isMultiple) {
            let totalSize = 0;
            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];

                if (!validateFileType(file, acceptedTypes)) {
                    showError(`Invalid file type: ${file.name}\nPlease select only ${acceptedTypes} files.`);
                    return false;
                }

                const sizeValidation = validateFileSize(file);
                if (!sizeValidation.valid) {
                    showError(`Error in file "${file.name}": ${sizeValidation.error}`);
                    return false;
                }

                totalSize += file.size;
            }

            if (totalSize > MAX_FILE_SIZE) {
                showError(`Total file size exceeds ${formatFileSize(MAX_FILE_SIZE)}. Please select fewer or smaller files.`);
                return false;
            }

            if (fileInput.files.length < 2) {
                showError('Please select at least 2 PDF files to merge.');
                return false;
            }
        } else {
            const file = fileInput.files[0];

            if (!validateFileType(file, acceptedTypes)) {
                showError(`Invalid file type. Please select a ${acceptedTypes} file.`);
                return false;
            }

            const sizeValidation = validateFileSize(file);
            if (!sizeValidation.valid) {
                showError(sizeValidation.error);
                return false;
            }
        }

        // Get form action URL
        const formData = new FormData(this);
        const actionUrl = $(this).attr('action');
        const $btn = $(this).find('button[type="submit"]');
        const originalBtnHtml = $btn.html();

        console.log('Submitting to:', actionUrl);

        // Show loading state
        $btn.prop('disabled', true).html('<svg class="animate-spin h-5 w-5 mr-3 inline" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...');

        // Submit via AJAX
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            timeout: 120000, // 2 minutes timeout
            success: function (response) {
                console.log('Success:', response);

                if (response.success && response.download_url) {
                    // Auto-download the file
                    window.location.href = response.download_url;
                    showSuccess(response.message || 'Conversion successful! Your download will begin shortly.');
                } else if (response.success) {
                    showSuccess(response.message || 'Operation completed successfully!');
                } else {
                    showError(response.message || 'An unexpected error occurred.');
                }

                $form[0].reset();
                $('#file-name').addClass('hidden');
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr, status, error);

                let errorMsg = 'Conversion failed. Please try again.';

                if (status === 'timeout') {
                    errorMsg = 'Request timed out. The file may be too large or the server is busy. Please try again.';
                } else if (xhr.status === 413) {
                    errorMsg = 'File is too large for the server to process. Please try a smaller file.';
                } else if (xhr.status === 422) {
                    errorMsg = xhr.responseJSON?.message || 'Validation error. Please check your file and try again.';
                } else if (xhr.status === 500) {
                    errorMsg = 'Server error occurred. Please try again later.';
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                } else if (xhr.responseText) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        errorMsg = response.message || errorMsg;
                    } catch (e) {
                        // Response is not JSON, use default error message
                    }
                }

                showError(errorMsg);
            },
            complete: function () {
                $btn.prop('disabled', false).html(originalBtnHtml);
            }
        });

        return false;
    });
});
