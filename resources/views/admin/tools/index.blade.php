@extends('layouts.admin')

@section('title', 'Tools Management')

@section('content')
    <div class="container-fluid">
        {{-- Header & Actions --}}
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tools Management</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <form action="{{ route('admin.sitemap.generate') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-app bg-success">
                            <i class="fas fa-sitemap"></i> Sitemap
                        </button>
                    </form>
                    <form action="{{ route('admin.tools.sync') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-app bg-primary">
                            <i class="fas fa-sync"></i> Sync
                        </button>
                    </form>
                    <form action="{{ route('admin.tools.build') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-app bg-warning">
                            <i class="fas fa-hammer"></i> Build
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalTools }}</h3>
                        <p>Total Tools</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $activeTools }}</h3>
                        <p>Active Tools</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $utilityTools }}</h3>
                        <p>Utility Tools</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $youtubeTools }}</h3>
                        <p>YouTube Tools</p>
                    </div>
                    <div class="icon">
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filters & Search --}}
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-filter mr-1"></i> Filter & Search</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tools.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Search Term</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="search" 
                                           value="{{ request('search') }}" placeholder="Name, Slug...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" name="category" style="width: 100%;">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                            {{ ucfirst($cat) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="form-group w-100">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Apply Filter
                                </button>
                                <a href="{{ route('admin.tools.index') }}" class="btn btn-default ml-2">
                                    <i class="fas fa-undo"></i> Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>URL</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tools as $index => $tool)
                                <tr>
                                    <td>{{ $tools->firstItem() + $index }}</td>
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
                <div class="mt-4">
                    {{ $tools->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection