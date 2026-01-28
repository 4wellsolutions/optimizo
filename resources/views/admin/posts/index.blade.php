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

        <!-- Filter Bar -->
        <div class="card-body border-bottom">
            <form action="{{ route('admin.posts.index') }}" method="GET" class="row">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Search..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="language" class="form-control">
                        <option value="">All Languages</option>
                        @foreach($languages as $lang)
                            <option value="{{ $lang->code }}" {{ request('language') == $lang->code ? 'selected' : '' }}>
                                {{ $lang->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="category_id" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} ({{ $category->language_code }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-default btn-block">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    @if(request()->anyFilled(['search', 'category_id', 'status', 'language']))
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-link btn-sm btn-block text-muted">Clear
                            All</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <table id="postsTable" class="table table-hover table-striped mb-0">
                <thead>
                    <tr>
                        <th style="width: 40%">Title</th>
                        <th>Author</th>
                        <th>Lang</th>
                        <th>Categories</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>
                                <strong>{{ $post->title }}</strong><br>
                                <small class="text-muted">{{ Str::limit(strip_tags($post->content), 80) }}</small>
                            </td>
                            <td>{{ $post->author->name }}</td>
                            <td><span class="badge badge-light border text-uppercase">{{ $post->language_code }}</span></td>
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
                            <td class="text-right">
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-success"
                                    target="_blank" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-outline-info"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deletePost({{ $post->id }})" class="btn btn-sm btn-outline-danger"
                                    title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No posts found matching your filters.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $posts->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#postsTable').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false, // Disable DataTables search
                "ordering": true,
                "info": false,
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