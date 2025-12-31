@extends('layouts.admin')

@section('page-title', 'Edit Post')

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Post</h1>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-600 hover:text-gray-900">
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Posts
            </a>
        </div>

        <form id="postForm" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Post Content</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" required
                        class="input-modern w-full">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" value="{{ $post->slug }}" class="input-modern w-full">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content">{{ $post->content }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                        class="input-modern w-full">{{ $post->excerpt }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image URL</label>
                    <input type="url" name="featured_image" id="featured_image" value="{{ $post->featured_image }}"
                        class="input-modern w-full">
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Categories & Tags</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>
                        <select name="categories[]" id="categories" multiple class="input-modern w-full h-32">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <select name="tags[]" id="tags" multiple class="input-modern w-full h-32">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">SEO Settings</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="input-modern w-full">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="2"
                        class="input-modern w-full">{{ $post->meta_description }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $post->meta_keywords }}" class="input-modern w-full">
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Publishing Options</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select name="status" id="status" required class="input-modern w-full">
                            <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="scheduled" {{ $post->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                        <input type="datetime-local" name="published_at"
                            value="{{ $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '' }}"
                            class="input-modern w-full">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="btn-gradient px-6 py-2 rounded-lg text-white">
                    Update Post
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
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
            content_style: 'body { font-family: Inter, sans-serif; font-size: 14px }'
        });

        $('#postForm').on('submit', function (e) {
            e.preventDefault();

            let content = tinymce.get('content').getContent();
            let formData = new FormData(this);
            formData.set('content', content);

            $.ajax({
                url: '{{ route("admin.posts.update", $post) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toast(response.message, 'success');
                },
                error: function (xhr) {
                    toast('Error updating post', 'error');
                }
            });
        });
    </script>
@endpush