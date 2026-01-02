@extends('layouts.admin')

@section('page-title', 'Categories')

@section('content')
    <div class="row">
        <!-- Quick Create Form -->
        <div class="col-md-4">
            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Add New Category</h3>
                </div>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Technology"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="e.g. technology">
                            <small class="text-muted">The "slug" is the URL-friendly version of the name.</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"
                                placeholder="Optional description..."></textarea>
                        </div>
                    </div>
                    <div class="card-footer bg-white text-right">
                        <button type="submit" class="btn btn-primary font-weight-bold">
                            <i class="fas fa-plus mr-1"></i> Add Category
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Category List -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bold">All Categories</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Count</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td><span class="font-weight-bold text-primary">{{ $category->name }}</span></td>
                                    <td class="text-muted small">{{ Str::limit($category->description, 30) }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <span class="badge badge-light border">{{ $category->posts_count }}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-info mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?');">
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
        // Auto-slug
        document.getElementById('name').addEventListener('input', function () {
            let slug = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection