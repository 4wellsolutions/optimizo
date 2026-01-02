@extends('layouts.admin')

@section('page-title', 'Import Blog Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-file-import mr-1"></i> Import from WordPress/Web
                    </h3>
                </div>
                <form action="{{ route('admin.import.process') }}" method="POST" id="importForm">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle mr-1"></i>
                            This tool will scrape the provided URL, extract the content, download local copies of all
                            images, and create a new draft post.
                        </div>

                        <div class="form-group">
                            <label for="url">Blog Post URL <span class="text-danger">*</span></label>
                            <input type="url" name="url" id="url" class="form-control form-control-lg"
                                placeholder="https://example.com/my-old-post/" required>
                        </div>

                        <div class="form-group">
                            <label for="selector">Content CSS Selector (Optional)</label>
                            <input type="text" name="selector" id="selector" class="form-control"
                                placeholder="e.g. .entry-content or #main-content">
                            <small class="text-muted">Leave blank to auto-detect (works for most WordPress sites).</small>
                        </div>
                    </div>
                    <div class="card-footer bg-white text-right">
                        <button type="submit" class="btn btn-primary font-weight-bold px-4" id="btnImport">
                            <span id="btnText">Start Import</span>
                            <span id="btnLoading" style="display: none;">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Importing...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('importForm').addEventListener('submit', function () {
            // Show loading state
            document.getElementById('btnImport').disabled = true;
            document.getElementById('btnText').style.display = 'none';
            document.getElementById('btnLoading').style.display = 'inline-block';
        });
    </script>
@endsection