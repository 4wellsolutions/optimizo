@extends('layouts.admin')

@section('title', 'Tools Management')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Tools Management</h1>
            <form action="{{ route('admin.sitemap.generate') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sitemap"></i> Generate Sitemap
                </button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>URL</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tools as $tool)
                                <tr>
                                    <td>
                                        <strong>{{ $tool->name }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $tool->meta_title }}</small>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $tool->category === 'utility' ? 'primary' : ($tool->category === 'youtube' ? 'danger' : ($tool->category === 'seo' ? 'success' : 'info')) }}">
                                            {{ ucfirst($tool->category) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ url($tool->url) }}" target="_blank" class="text-decoration-none">
                                            {{ $tool->url }}
                                            <i class="fas fa-external-link-alt fa-xs"></i>
                                        </a>
                                    </td>
                                    <td>{{ $tool->priority }}</td>
                                    <td>
                                        @if($tool->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tools.edit', $tool) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Tools</h5>
                            <h2 class="text-primary">{{ $tools->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Active Tools</h5>
                            <h2 class="text-success">{{ $tools->where('is_active', true)->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Utility Tools</h5>
                            <h2 class="text-info">{{ $tools->where('category', 'utility')->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">YouTube Tools</h5>
                            <h2 class="text-danger">{{ $tools->where('category', 'youtube')->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection