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
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="importTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold" id="url-tab" data-toggle="pill" href="#url-import"
                                role="tab" aria-controls="url-import" aria-selected="true">
                                <i class="fas fa-link mr-1"></i> URL Scraper
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" id="xml-tab" data-toggle="pill" href="#xml-import"
                                role="tab" aria-controls="xml-import" aria-selected="false">
                                <i class="fas fa-file-code mr-1"></i> WordPress XML
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="importTabContent">
                        <!-- URL Scraper Tab -->
                        <div class="tab-pane fade show active" id="url-import" role="tabpanel" aria-labelledby="url-tab">
                            <form action="{{ route('admin.import.process') }}" method="POST" id="importForm">
                                @csrf
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Scrape a single URL, extract content, and download images.
                                </div>
                                <div class="form-group">
                                    <label for="url">Blog Post URL <span class="text-danger">*</span></label>
                                    <input type="url" name="url" id="url" class="form-control"
                                        placeholder="https://example.com/post/" required>
                                </div>
                                <div class="form-group">
                                    <label for="selector">Content CSS Selector (Optional)</label>
                                    <input type="text" name="selector" id="selector" class="form-control"
                                        placeholder=".entry-content">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary font-weight-bold px-4">Start
                                        Import</button>
                                </div>
                            </form>
                        </div>

                        <!-- XML Import Tab -->
                        <div class="tab-pane fade" id="xml-import" role="tabpanel" aria-labelledby="xml-tab">
                            <form action="{{ route('admin.import.xml') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Upload a standard WordPress WXR export file (.xml).
                                </div>
                                <div class="form-group">
                                    <label for="xml_file">Choose XML File <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="xml_file" class="custom-file-input" id="xml_file"
                                            accept=".xml" required>
                                        <label class="custom-file-label" for="xml_file">Browse...</label>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success font-weight-bold px-4">Upload and
                                        Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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