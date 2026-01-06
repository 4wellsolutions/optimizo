@extends('layouts.admin')

@section('title', 'Language Management')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Language Management</h1>
            <a href="{{ route('admin.languages.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Language
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Languages</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Flag</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Native Name</th>
                                <th>Direction</th>
                                <th>Status</th>
                                <th>Default</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($languages as $language)
                                <tr>
                                    <td class="text-center" style="font-size: 24px;">
                                        {{ $language->flag_icon ?? '🌐' }}
                                    </td>
                                    <td>
                                        <code>{{ $language->code }}</code>
                                    </td>
                                    <td>{{ $language->name }}</td>
                                    <td>{{ $language->native_name }}</td>
                                    <td>
                                        <span class="badge badge-secondary">
                                            {{ strtoupper($language->direction) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($language->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($language->is_default)
                                            <span class="badge badge-primary">Default</span>
                                        @else
                                            <form action="{{ route('admin.languages.set-default', $language) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    Set as Default
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>{{ $language->order }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.languages.edit', $language) }}" class="btn btn-sm btn-info"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.languages.toggle', $language) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-sm {{ $language->is_active ? 'btn-warning' : 'btn-success' }}"
                                                    title="{{ $language->is_active ? 'Deactivate' : 'Activate' }}">
                                                    <i
                                                        class="fas fa-{{ $language->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                                                </button>
                                            </form>

                                            @if(!$language->is_default && $language->code !== 'en')
                                                <form action="{{ route('admin.languages.destroy', $language) }}" method="POST"
                                                    style="display: inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this language?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No languages found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection