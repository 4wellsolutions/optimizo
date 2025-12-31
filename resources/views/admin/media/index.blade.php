@extends('layouts.admin')

@section('page-title', 'Media Library')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Upload Files</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.media.upload') }}" class="dropzone" id="mediaDropzone">
                @csrf
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Media Files</h3>
        </div>
        <div class="card-body">
            <div class="row" id="mediaGrid">
                @foreach($media as $item)
                    <div class="col-md-2 col-sm-4 col-6 mb-3 media-item" data-id="{{ $item->id }}">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->path) }}" class="card-img-top" alt="{{ $item->alt_text }}"
                                style="height: 150px; object-fit: cover;">
                            <div class="card-body p-2">
                                <p class="card-text small text-truncate">{{ $item->original_name }}</p>
                                <div class="btn-group btn-group-sm w-100">
                                    <button
                                        onclick="editMedia({{ $item->id }}, '{{ $item->alt_text }}', '{{ $item->caption }}')"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="copyUrl('{{ asset('storage/' . $item->path) }}')"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button onclick="deleteMedia({{ $item->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            {{ $media->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        Dropzone.options.mediaDropzone = {
            paramName: "file",
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            success: function (file, response) {
                toast(response.message, 'success');
                setTimeout(() => location.reload(), 1000);
            },
            error: function (file, response) {
                toast('Upload failed', 'error');
            }
        };

        function copyUrl(url) {
            navigator.clipboard.writeText(url);
            toast('URL copied to clipboard!', 'success');
        }

        function editMedia(id, altText, caption) {
            Swal.fire({
                title: 'Edit Media',
                html: `
                <input id="alt_text" class="form-control mb-2" placeholder="Alt Text" value="${altText || ''}">
                <textarea id="caption" class="form-control" placeholder="Caption">${caption || ''}</textarea>
            `,
                showCancelButton: true,
                confirmButtonText: 'Save',
                preConfirm: () => {
                    return {
                        alt_text: document.getElementById('alt_text').value,
                        caption: document.getElementById('caption').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/media/${id}`,
                        type: 'PUT',
                        data: result.value,
                        success: function (response) {
                            toast(response.message, 'success');
                        },
                        error: function () {
                            toast('Error updating media', 'error');
                        }
                    });
                }
            });
        }

        function deleteMedia(id) {
            confirmDelete('', function () {
                $.ajax({
                    url: `/admin/media/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        toast(response.message, 'success');
                        $(`.media-item[data-id="${id}"]`).fadeOut(300, function () {
                            $(this).remove();
                        });
                    },
                    error: function () {
                        toast('Error deleting media', 'error');
                    }
                });
            });
        }
    </script>
@endpush