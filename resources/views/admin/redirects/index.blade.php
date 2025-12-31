@extends('layouts.admin')

@section('page-title', 'URL Redirects')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">URL Redirects</h3>
            <div class="card-tools">
                <button onclick="addRedirect()" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Redirect
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="redirectsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>From URL</th>
                        <th>To URL</th>
                        <th>Type</th>
                        <th>Hits</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($redirects as $redirect)
                        <tr>
                            <td>{{ $redirect->from_url }}</td>
                            <td>{{ Str::limit($redirect->to_url, 50) }}</td>
                            <td>
                                <span class="badge badge-{{ $redirect->type === '301' ? 'primary' : 'warning' }}">
                                    {{ $redirect->type }}
                                </span>
                            </td>
                            <td>{{ $redirect->hits }}</td>
                            <td>
                                <span class="badge badge-{{ $redirect->status ? 'success' : 'secondary' }}">
                                    {{ $redirect->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button onclick='editRedirect(@json($redirect))' class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteRedirect({{ $redirect->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $redirects->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#redirectsTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        function addRedirect() {
            Swal.fire({
                title: 'Add URL Redirect',
                html: `
                <input id="from_url" class="form-control mb-2" placeholder="From URL (e.g., /old-page)">
                <input id="to_url" class="form-control mb-2" placeholder="To URL (full URL)">
                <select id="type" class="form-control mb-2">
                    <option value="301">301 (Permanent)</option>
                    <option value="302">302 (Temporary)</option>
                </select>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" checked>
                    <label class="custom-control-label" for="status">Active</label>
                </div>
            `,
                showCancelButton: true,
                confirmButtonText: 'Add',
                preConfirm: () => {
                    return {
                        from_url: document.getElementById('from_url').value,
                        to_url: document.getElementById('to_url').value,
                        type: document.getElementById('type').value,
                        status: document.getElementById('status').checked
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('{{ route("admin.redirects.store") }}', result.value, function (response) {
                        toast(response.message, 'success');
                        setTimeout(() => location.reload(), 1000);
                    }).fail(function () {
                        toast('Error creating redirect', 'error');
                    });
                }
            });
        }

        function editRedirect(redirect) {
            Swal.fire({
                title: 'Edit URL Redirect',
                html: `
                <input id="from_url" class="form-control mb-2" value="${redirect.from_url}">
                <input id="to_url" class="form-control mb-2" value="${redirect.to_url}">
                <select id="type" class="form-control mb-2">
                    <option value="301" ${redirect.type === '301' ? 'selected' : ''}>301 (Permanent)</option>
                    <option value="302" ${redirect.type === '302' ? 'selected' : ''}>302 (Temporary)</option>
                </select>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" ${redirect.status ? 'checked' : ''}>
                    <label class="custom-control-label" for="status">Active</label>
                </div>
            `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    return {
                        from_url: document.getElementById('from_url').value,
                        to_url: document.getElementById('to_url').value,
                        type: document.getElementById('type').value,
                        status: document.getElementById('status').checked
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/redirects/${redirect.id}`,
                        type: 'PUT',
                        data: result.value,
                        success: function (response) {
                            toast(response.message, 'success');
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function () {
                            toast('Error updating redirect', 'error');
                        }
                    });
                }
            });
        }

        function deleteRedirect(id) {
            confirmDelete('', function () {
                $.ajax({
                    url: `/admin/redirects/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        toast(response.message, 'success');
                        setTimeout(() => location.reload(), 1000);
                    },
                    error: function () {
                        toast('Error deleting redirect', 'error');
                    }
                });
            });
        }
    </script>
@endpush