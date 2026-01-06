@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sitemap Management</h1>
        </div>



        <div class="row">

            <!-- Status Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Sitemap Status</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if($sitemapExists)
                                        <span class="badge badge-success"><i class="fas fa-check mr-1"></i> Active</span>
                                    @else
                                        <span class="badge badge-danger"><i class="fas fa-times mr-1"></i> Not Found</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Links Count Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total URLs Indexed</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($urlCount) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-link fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Last Generated Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Last Generated</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 small">{{ $lastGenerated }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sitemap Statistics Table --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Sitemaps</h6>
                        <span class="badge badge-primary">{{ count($sitemaps) }} Sitemaps</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Sitemap Name</th>
                                        <th width="10%">Type</th>
                                        <th width="15%">URL Count</th>
                                        <th width="35%">URL</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sitemaps as $index => $sitemap)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="font-weight-bold">
                                                @if($sitemap['type'] === 'index')
                                                    <i class="fas fa-sitemap text-primary mr-2"></i>
                                                @elseif($sitemap['type'] === 'categories')
                                                    <i class="fas fa-folder text-warning mr-2"></i>
                                                @else
                                                    <i class="fas fa-list text-info mr-2"></i>
                                                @endif
                                                {{ $sitemap['name'] }}
                                            </td>
                                            <td>
                                                @if($sitemap['type'] === 'index')
                                                    <span class="badge badge-primary">Index</span>
                                                @elseif($sitemap['type'] === 'categories')
                                                    <span class="badge badge-warning">Categories</span>
                                                @else
                                                    <span class="badge badge-info">Category</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($sitemap['count'] > 0)
                                                    <span
                                                        class="badge badge-success badge-pill">{{ number_format($sitemap['count']) }}
                                                        {{ $sitemap['type'] === 'index' ? 'sitemaps' : 'URLs' }}</span>
                                                @else
                                                    <span class="badge badge-secondary badge-pill">0</span>
                                                @endif
                                            </td>
                                            <td>
                                                <code class="small">{{ $sitemap['url'] }}</code>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ $sitemap['url'] }}" target="_blank" class="btn btn-sm btn-primary"
                                                    title="View Sitemap">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th colspan="3" class="text-right">Total URLs Across All Sitemaps:</th>
                                        <th class="text-center">
                                            <span class="badge badge-success badge-pill">
                                                {{ number_format(collect($sitemaps)->where('type', '!=', 'index')->sum('count')) }}
                                            </span>
                                        </th>
                                        <th colspan="2"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="mt-3">
                            <p class="text-muted small mb-0">
                                <i class="fas fa-info-circle mr-1"></i>
                                <strong>Note:</strong> Sitemaps are dynamically generated from your ToolData service. New
                                tools are automatically included.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Legacy Sitemap Generator</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <h5 class="small font-weight-bold text-secondary text-uppercase mb-3">Settings</h5>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bold">Status:</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext"
                                            value="{{ $sitemapExists ? 'Map file exists and works.' : 'Map file is missing.' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bold">Live URL:</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                value="{{ $sitemapUrl }}" readonly>
                                            <div class="input-group-append">
                                                <a href="{{ $sitemapUrl }}" target="_blank" class="btn btn-primary"
                                                    type="button">
                                                    <i class="fas fa-external-link-alt fa-sm"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center pt-4 pt-md-0">
                                <form action="{{ route('admin.sitemap.generate') }}" method="POST" class="w-75 text-center">
                                    @csrf
                                    <div class="mb-3">
                                        <span class="icon-circle bg-primary text-white mb-3"
                                            style="width: 60px; height: 60px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;">
                                            <i class="fas fa-sync-alt fa-2x"></i>
                                        </span>
                                    </div>
                                    <h5 class="font-weight-bold">Regenerate Legacy Sitemap</h5>
                                    <p class="text-muted small mb-4">
                                        This will crawl your database for active tools and pages, calculate priorities, and
                                        overwrite the existing <code>sitemap.xml</code> file.
                                    </p>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
                                        <i class="fas fa-magic mr-2"></i> Generate Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection