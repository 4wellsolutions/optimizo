@extends('layouts.admin')

@section('page-title', 'Cache Management System')

@section('content')
    <div class="row">
        <!-- Application Cache -->
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-database mr-1"></i> Application Cache
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Clears the application cache (Cache Facade).</p>
                    <button class="btn btn-block btn-outline-primary clear-cache-btn" data-type="application">
                        <i class="fas fa-broom mr-1"></i> Clear App Cache
                    </button>
                </div>
            </div>
        </div>

        <!-- Route Cache -->
        <div class="col-md-4">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-route mr-1"></i> Route Cache
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Clears the route cache. Use if new routes are 404.</p>
                    <button class="btn btn-block btn-outline-warning clear-cache-btn" data-type="route">
                        <i class="fas fa-broom mr-1"></i> Clear Route Cache
                    </button>
                </div>
            </div>
        </div>

        <!-- Config Cache -->
        <div class="col-md-4">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cogs mr-1"></i> Config Cache
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Clears the config cache. Use if .env changes aren't showing.</p>
                    <button class="btn btn-block btn-outline-info clear-cache-btn" data-type="config">
                        <i class="fas fa-broom mr-1"></i> Clear Config Cache
                    </button>
                </div>
            </div>
        </div>

        <!-- View Cache -->
        <div class="col-md-6">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-eye mr-1"></i> View/Blade Cache
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Clears compiled view files. Use if Blade changes aren't reflecting.</p>
                    <button class="btn btn-block btn-outline-success clear-cache-btn" data-type="view">
                        <i class="fas fa-broom mr-1"></i> Clear View Cache
                    </button>
                </div>
            </div>
        </div>

        <!-- Optimize Clear -->
        <div class="col-md-6">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bomb mr-1"></i> Optimize:Clear (All)
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Clears ALL caches (App, Route, Config, View, Events).</p>
                    <button class="btn btn-block btn-outline-danger clear-cache-btn" data-type="optimize">
                        <i class="fas fa-trash-alt mr-1"></i> Nuke Everything
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.clear-cache-btn').on('click', function () {
            let btn = $(this);
            let originalText = btn.html();
            let type = btn.data('type');

            // Disable button and show spinner
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Clearing...');

            $.ajax({
                url: '{{ route("admin.settings.cache.clear") }}',
                type: 'POST',
                data: {
                    type: type,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    toast(response.message, 'success');
                },
                error: function (xhr) {
                    toast(xhr.responseJSON?.message || 'Error clearing cache', 'error');
                },
                complete: function () {
                    // Re-enable button
                    btn.prop('disabled', false).html(originalText);
                }
            });
        });
    </script>
@endpush