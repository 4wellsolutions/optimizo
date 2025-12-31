@extends('layouts.admin')

@section('page-title', 'Create Post')

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Create New Post</h1>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-600 hover:text-gray-900">
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Posts
            </a>
        </div>

        <form id="postForm" class="space-y-6">
            @csrf

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Post Content</h3>

                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" required class="input-modern w-full">
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" class="input-modern w-full"
                        placeholder="auto-generated-from-title">
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content" rows="20"></textarea>
                </div>

                <!-- Excerpt -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3" class="input-modern w-full"
                        placeholder="Brief summary (optional)"></textarea>
                </div>

                <!-- Featured Image -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image URL</label>
                    <input type="url" name="featured_image" id="featured_image" class="input-modern w-full"
                        placeholder="https://example.com/image.jpg">
                </div>
            </div>

            <!-- Categories & Tags -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Categories & Tags</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>
                        <select name="categories[]" id="categories" multiple class="input-modern w-full h-32">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" onclick="addCategory()"
                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Add New Category</button>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <select name="tags[]" id="tags" multiple class="input-modern w-full h-32">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" onclick="addTag()" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+
                            Add New Tag</button>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">SEO Settings</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="input-modern w-full"
                        placeholder="Leave empty to use post title">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="2" class="input-modern w-full"
                        placeholder="SEO description"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" class="input-modern w-full"
                        placeholder="keyword1, keyword2, keyword3">
                </div>
            </div>

            <!-- Publishing Options -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Publishing Options</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select name="status" id="status" required class="input-modern w-full">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                        <input type="datetime-local" name="published_at" id="published_at" class="input-modern w-full">
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="saveDraft()"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Save as Draft
                </button>
                <button type="submit" class="btn-gradient px-6 py-2 rounded-lg text-white">
                    Create Post
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#content',
            height: 500,
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
            content_style: 'body { font-family: Inter, sans-serif; font-size: 14px }',
            images_upload_url: '{{ route("admin.media.upload") }}',
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function () {
                        cb(reader.result, { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        });

        // Auto-generate slug from title
        $('#title').on('blur', function () {
            if (!$('#slug').val()) {
                let slug = $(this).val().toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                $('#slug').val(slug);
            }
        });

        // Submit form via AJAX
        $('#postForm').on('submit', function (e) {
            e.preventDefault();

            // Get TinyMCE content
            let content = tinymce.get('content').getContent();

            let formData = new FormData(this);
            formData.set('content', content);

            $.ajax({
                url: '{{ route("admin.posts.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toast(response.message, 'success');
                    setTimeout(() => window.location.href = response.redirect, 1000);
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        Object.keys(errors).forEach(key => {
                            toast(errors[key][0], 'error');
                        });
                    } else {
                        toast('Error creating post', 'error');
                    }
                }
            });
        });

        function saveDraft() {
            $('#status').val('draft');
            $('#postForm').submit();
        }

        function addCategory() {
            Swal.fire({
                title: 'Add New Category',
                input: 'text',
                inputLabel: 'Category Name',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter a category name'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('{{ route("admin.categories.store") }}', {
                        name: result.value
                    }, function (response) {
                        toast(response.message, 'success');
                        $('#categories').append(`<option value="${response.category.id}" selected>${response.category.name}</option>`);
                    });
                }
            });
        }

        function addTag() {
            Swal.fire({
                title: 'Add New Tag',
                input: 'text',
                inputLabel: 'Tag Name',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter a tag name'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('{{ route("admin.tags.store") }}', {
                        name: result.value
                    }, function (response) {
                        toast(response.message, 'success');
                        $('#tags').append(`<option value="${response.tag.id}" selected>${response.tag.name}</option>`);
                    });
                }
            });
        }
    </script>
@endpush