@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="row">
        <!-- Total Posts -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['total_posts'] }}</h3>
                    <p>Total Posts</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>

        <!-- Published Posts -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['published_posts'] }}</h3>
                    <p>Published</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <!-- Draft Posts -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['draft_posts'] }}</h3>
                    <p>Drafts</p>
                </div>
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
        </div>

        <!-- Total Media -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['total_media'] }}</h3>
                    <p>Media Files</p>
                </div>
                <div class="icon">
                    <i class="fas fa-images"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recent Posts</h3>
            <div class="card-tools">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> New Post
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            @if($recent_posts->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>
                                    @if($post->status === 'published')
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-warning">{{ ucfirst($post->status) }}</span>
                                    @endif
                                </td>
                                <td>{{ $post->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-4 text-center text-muted">
                    No posts yet. <a href="{{ route('admin.posts.create') }}">Create your first post</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-plus"></i> New Post</h5>
                    <p class="card-text">Create a new blog post</p>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-success card-outline">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-images"></i> Media Library</h5>
                    <p class="card-text">Manage your media files</p>
                    <a href="{{ route('admin.media.index') }}" class="btn btn-success">Browse</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-warning card-outline">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-cog"></i> Settings</h5>
                    <p class="card-text">Configure your site</p>
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-warning">Configure</a>
                </div>
            </div>
        </div>
    </div>
@endsection