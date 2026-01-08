@extends('layouts.admin')

@section('page-title', 'Tool Categories')

@section('content')
    <div class="row mb-3">
        <div class="col-12 text-right">
            <a href="{{ route('admin.tools.categories.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus mr-1"></i> Add New Category
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title font-weight-bold text-dark mb-0">
                <i class="fas fa-list mr-2 text-primary"></i> All Categories
            </h3>
            <div class="card-tools">
                <!-- Filter Form -->
                <form action="{{ route('admin.tools.categories.index') }}" method="GET" class="form-inline">
                    <div class="input-group input-group-sm mr-2">
                        <select name="parent_id" class="form-control" onchange="this.form.submit()">
                            <option value="">All Levels</option>
                            <option value="top" {{ request('parent_id') == 'top' ? 'selected' : '' }}>Top Level Only</option>
                            <option disabled>──────────</option>
                            @foreach($parents as $parent)
                                <option value="{{ $parent->id }}" {{ request('parent_id') == $parent->id ? 'selected' : '' }}>
                                    Subcategories of {{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control" placeholder="Search..."
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped text-nowrap">
                <thead class="bg-light">
                    <tr>
                        <th class="border-top-0">Name & Description</th>
                        <th class="border-top-0">Level / Parent</th>
                        <th class="border-top-0">Slug</th>
                        <th class="border-top-0 text-center">Tools Count</th>
                        <th class="border-top-0 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="align-middle">
                                <span class="font-weight-bold text-dark d-block">{{ $category->name }}</span>
                                @if($category->description)
                                    <small class="text-muted text-wrap" style="max-width: 300px; display: block;">
                                        {{ Str::limit($category->description, 50) }}
                                    </small>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if($category->parent)
                                    <span class="badge badge-info px-2 py-1">
                                        <i class="fas fa-level-up-alt mr-1"></i> {{ $category->parent->name }}
                                    </span>
                                @else
                                    <span class="badge badge-secondary px-2 py-1">Top Level</span>
                                @endif
                            </td>
                            <td class="align-middle text-muted">{{ $category->slug }}</td>
                            <td class="align-middle text-center">
                                @php
                                    $count = $category->parent_id ? $category->sub_tools_count : $category->tools_count;
                                    $badgeClass = $count > 0 ? 'badge-success' : 'badge-light text-muted border';
                                @endphp
                                <span class="badge {{ $badgeClass }} badge-pill px-3 py-1" style="font-size: 0.9em;">
                                    {{ $count }}
                                </span>
                            </td>
                            <td class="text-right align-middle">
                                <a href="{{ route('admin.tools.categories.edit', $category->id) }}"
                                    class="btn btn-sm btn-outline-info mr-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.tools.categories.destroy', $category->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <div class="mb-3">
                                    <i class="fas fa-folder-open fa-3x text-light-gray"></i>
                                </div>
                                <h5 class="font-weight-normal">No categories found</h5>
                                <p class="mb-0">Try adjusting your filters or create a new one.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <small class="text-muted">Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of
                {{ $categories->total() }} entries</small>
            {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection