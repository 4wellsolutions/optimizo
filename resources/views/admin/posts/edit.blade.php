@extends('layouts.admin')

@section('page-title', 'Edit Post')

@section('content')
<div x-data="postEditor()" class="pb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="mb-1 text-dark font-weight-bold">Edit Post</h5>
            <small class="text-muted">Updating: <span class="font-weight-bold text-dark">{{ $post->title }}</span></small>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary btn-sm">
            Cancel
        </a>
    </div>

    <form id="postForm">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- LEFT COLUMN (Main Content) -->
            <div class="col-lg-8">
                
                <!-- Title & Slug -->
                <div class="card card-outline card-primary shadow-sm mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold text-uppercase text-xs text-muted">Post Title</label>
                            <input type="text" name="title" id="title" value="{{ $post->title }}" required 
                                   class="form-control form-control-lg">
                        </div>
                        <div class="form-group mb-0">
                            <label class="font-weight-bold text-uppercase text-xs text-muted">Permalink</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light text-muted">{{ url('/blog') }}/</span>
                                </div>
                                <input type="text" name="slug" id="slug" value="{{ $post->slug }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Editor -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-0">
                        <textarea name="content" id="content" style="height: 600px; opacity: 0;">{!! $post->content !!}</textarea>
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <label class="font-weight-bold text-uppercase text-xs text-muted">Excerpt</label>
                        <textarea name="excerpt" rows="3" class="form-control">{{ $post->excerpt }}</textarea>
                    </div>
                </div>
                
                <!-- SEO Section -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h3 class="card-title font-weight-bold text-dark" style="font-size: 1rem;">
                            <i class="fas fa-search mr-1 text-primary"></i> SEO Configuration
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea name="meta_description" rows="2" class="form-control">{{ $post->meta_description }}</textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label>Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ $post->meta_keywords }}" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN (Sidebar) -->
            <div class="col-lg-4">
                
                <!-- Publish Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white font-weight-bold text-uppercase text-xs text-muted">
                        Publishing
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control custom-select">
                                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="scheduled" {{ $post->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Publish Date</label>
                            <input type="datetime-local" name="published_at" value="{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '' }}" class="form-control">
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 shadow-sm">
                                Update Post
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white font-weight-bold text-uppercase text-xs text-muted">
                        Featured Image
                    </div>
                    <div class="card-body text-center">
                        <input type="hidden" name="featured_image" x-model="featuredImage">
                        
                        <!-- Placeholder -->
                        <div x-show="!featuredImage" 
                             @click="$dispatch('open-media-modal', { onSelect: handleFeaturedImage })"
                             class="rounded border-dashed border-2 border-secondary d-flex flex-column align-items-center justify-content-center p-4 cursor-pointer hover-bg-light"
                             style="height: 200px; border-style: dashed; cursor: pointer; transition: all 0.2s;">
                            <i class="fas fa-image fa-3x text-muted mb-2"></i>
                            <span class="text-muted font-weight-medium">Set Featured Image</span>
                        </div>

                        <!-- Preview -->
                        <div x-show="featuredImage" class="position-relative md-preview" style="height: 200px;">
                             <img :src="featuredImage" class="img-fluid rounded w-100 h-100" style="object-fit: cover;">
                             <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center bg-dark-overlay hover-actions" style="top:0; left:0; background: rgba(0,0,0,0.5); opacity: 0; transition: opacity 0.2s;">
                                 <button type="button" @click="$dispatch('open-media-modal', { onSelect: handleFeaturedImage })" class="btn btn-sm btn-light mr-2">Replace</button>
                                 <button type="button" @click="featuredImage = ''" class="btn btn-sm btn-danger">Remove</button>
                             </div>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white font-weight-bold text-uppercase text-xs text-muted">
                        Categories
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto mb-3" style="max-height: 200px;">
                            @foreach($categories as $category)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="custom-control-input" id="cat_{{ $category->id }}"
                                           {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="cat_{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white font-weight-bold text-uppercase text-xs text-muted">
                        Tags
                    </div>
                    <div class="card-body">
                        <select id="tags" name="tags[]" multiple class="form-control">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Media Library Modal -->
@include('admin.partials.media-library-modal')

<style>
    .hover-bg-light:hover { background-color: #f8f9fa; border-color: #007bff !important; color: #007bff; }
    .md-preview:hover .hover-actions { opacity: 1 !important; }
</style>
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
        function postEditor() {
            return {
                featuredImage: '{{ $post->featured_image }}',
                handleFeaturedImage(media) {
                    this.featuredImage = media.url;
                }
            }
        }

        // Initialize TinyMCE
        tinymce.init({
            selector: '#content',
            height: 600,
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                'searchreplace', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
                'table', 'help', 'wordcount', 'directionality'
            ],
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | link image media | removeformat | code',
            
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype === 'image') {
                    window.dispatchEvent(new CustomEvent('open-media-modal', {
                        detail: {
                            onSelect: function(media) {
                                callback(media.url, { alt: media.alt_text || media.original_name });
                            }
                        }
                    }));
                }
            },
            convert_urls: false,
        });

        // Initialize TomSelect
        new TomSelect('#tags', {
            maxItems: 20,
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            create: function(input) {
                return new Promise(function(resolve, reject){
                     $.post('{{ route("admin.tags.store") }}', { name: input, _token: '{{ csrf_token() }}' })
                      .done(function(res){ resolve({id: res.tag.id, name: res.tag.name}); })
                      .fail(function(){ resolve(false); });
                });
            }
        });

        $('#postForm').on('submit', function(e) {
            e.preventDefault();
            let content = tinymce.get('content').getContent();
            let formData = new FormData(this);
            formData.set('content', content);
            
            $.ajax({
                url: '{{ route("admin.posts.update", $post->id) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if(res.success) {
                        window.toast('Post updated successfully!');
                    }
                },
                error: function(err) {
                    alert('Error: ' + JSON.stringify(err.responseJSON?.errors));
                }
            });
        });
    </script>
@endpush