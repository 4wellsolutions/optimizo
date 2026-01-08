@extends('layouts.admin')

@section('page-title', 'Tool Categories')

@section('content')
    <div class="row">
        <!-- Category List -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header border-0 d-flex justify-content-between align-items-center">
                    <h3 class="card-title font-weight-bold">All Tool Categories</h3>
                    <div class="card-tools d-flex align-items-center">
                        <a href="{{ route('admin.tools.categories.create') }}" class="btn btn-primary btn-sm mr-3">
                            <i class="fas fa-plus mr-1"></i> Add New
                        </a>
                        <form action="{{ route('admin.tools.categories.index') }}" method="GET" class="d-inline-block">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search"
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Slug</th>
                                <th>Count</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>
                                        <span class="font-weight-bold text-primary">{{ $category->name }}</span>
                                        <div class="small text-muted">{{ Str::limit($category->description, 30) }}</div>
                                    </td>
                                    <td>
                                        @if($category->parent)
                                            <span class="badge badge-info">{{ $category->parent->name }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        {{-- Show tools count if parent, or subTools count if subcategory --}}
                                        <span class="badge badge-light border">
                                            {{ $category->parent_id ? $category->sub_tools_count : $category->tools_count }}
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.tools.categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-info mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.tools.categories.destroy', $category->id) }}"
                                            method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="fas fa-folder-open fa-2x mb-2"></i>
                                        <p>No categories found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-slug - Need to ensure input exists if we had a quick create form
        // But we removed it. So we don't need this script here anymore unless for search?
        // No, search input doesn't need auto-slug.
    </script>
@endsection