@extends('layouts.admin')

@section('page-title', 'Posts')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Posts</h3>
            <div class="card-tools">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> New Post
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="postsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Categories</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <strong>{{ $post->title }}</strong><br>
                                <small class="text-muted">{{ Str::limit($post->excerpt, 50) }}</small>
                            </td>
                            <td>{{ $post->author->name }}</td>
                            <td>
                                @foreach($post->categories as $category)
                                    <span class="badge badge-info">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($post->status === 'published')
                                    <span class="badge badge-success">Published</span>
                                @elseif($post->status === 'scheduled')
                                    <span class="badge badge-warning">Scheduled</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $post->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-success" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deletePost({{ $post->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right pagination-sm">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#postsTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function deletePost(id) {
            confirmDelete('', function () {
                $.ajax({
                    url: `/admin/posts/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        toast(response.message, 'success');
                        setTimeout(() => location.reload(), 1000);
                    },
                    error: function (xhr) {
                        toast('Error deleting post', 'error');
                    }
                });
            });
        }
    </script>
@endpush