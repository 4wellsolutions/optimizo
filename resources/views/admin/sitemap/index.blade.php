@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Multilingual Sitemap Management</h1>
        </div>

        <div class="row">
            <!-- Active Languages Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Active Languages</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $languages->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-language fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Sitemaps Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Sitemaps</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($sitemaps) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total URLs Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total URLs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format(collect($sitemaps)->where('type', 'language')->sum('count')) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-link fa-2x text-gray-300"></i>
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
                        <span class="badge badge-primary">{{ count($sitemaps) }} Files</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Sitemap Name</th>
                                        <th width="10%">Language</th>
                                        <th width="10%">Type</th>
                                        <th width="10%">URLs</th>
                                        <th width="10%">Blog URLs</th>
                                        <th width="10%">Status</th>
                                        <th width="20%">Last Modified</th>
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
                                                @else
                                                    <i class="fas fa-globe text-info mr-2"></i>
                                                @endif
                                                {{ $sitemap['name'] }}
                                            </td>
                                            <td>
                                                @if($sitemap['language'] === 'all')
                                                    <span class="badge badge-dark">All Languages</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ strtoupper($sitemap['language']) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($sitemap['type'] === 'index')
                                                    <span class="badge badge-primary">Index</span>
                                                @else
                                                    <span class="badge badge-info">Language</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($sitemap['count'] > 0)
                                                    <span class="badge badge-success badge-pill">
                                                        {{ number_format($sitemap['count']) }}
                                                        {{ $sitemap['type'] === 'index' ? 'sitemaps' : 'URLs' }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary badge-pill">0</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if(isset($sitemap['blog_count']) && $sitemap['blog_count'] > 0)
                                                    <span class="badge badge-info badge-pill">
                                                        {{ number_format($sitemap['blog_count']) }} URLs
                                                    </span>
                                                @elseif($sitemap['type'] === 'language')
                                                    <span class="badge badge-light badge-pill">0</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($sitemap['exists'])
                                                    <span class="badge badge-success"><i class="fas fa-check"></i> Exists</span>
                                                @else
                                                    <span class="badge badge-danger"><i class="fas fa-times"></i> Missing</span>
                                                @endif
                                            </td>
                                            <td class="small">
                                                {{ $sitemap['lastmod'] ?? 'Never generated' }}
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
                                        <th colspan="4" class="text-right">Total URLs Across All Languages:</th>
                                        <th class="text-center">
                                            <span class="badge badge-success badge-pill">
                                                {{ number_format(collect($sitemaps)->where('type', 'language')->sum('count')) }}
                                            </span>
                                        </th>
                                        <th colspan="3"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="mt-3">
                            <p class="text-muted small mb-0">
                                <i class="fas fa-info-circle mr-1"></i>
                                <strong>Note:</strong> Sitemaps are automatically generated for all active languages in your database. 
                                When you add a new language and activate it, a sitemap will be automatically created for it.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sitemap Generator --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sitemap Generator</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <h5 class="small font-weight-bold text-secondary text-uppercase mb-3">Active Languages</h5>
                                <ul class="list-group">
                                    @foreach($languages as $language)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                <i class="fas fa-globe text-info mr-2"></i>
                                                {{ ucfirst($language->name) }} 
                                                <code class="ml-2">{{ $language->code }}</code>
                                            </span>
                                            <span class="badge badge-primary badge-pill">
                                                Will be generated
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                                <p class="text-muted small mt-3">
                                    <i class="fas fa-lightbulb mr-1"></i>
                                    Each language will have its own sitemap file: <code>sitemap_{locale}.xml</code>
                                </p>
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
                                    <h5 class="font-weight-bold">Generate All Sitemaps</h5>
                                    <p class="text-muted small mb-4">
                                        This will generate the sitemap index and individual sitemaps for all {{ $languages->count() }} active languages.
                                        All files will be saved in the <code>public/</code> directory.
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

        {{-- SEO Tips --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 border-left-warning">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-warning">
                            <i class="fas fa-lightbulb mr-2"></i>SEO Best Practices
                        </h6>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li class="mb-2">Submit <code>{{ $domain }}/sitemap.xml</code> to Google Search Console and Bing Webmaster Tools</li>
                            <li class="mb-2">Each language-specific sitemap includes <strong>hreflang</strong> tags for proper multilingual SEO</li>
                            <li class="mb-2">Regenerate sitemaps after adding new tools or activating new languages</li>
                            <li>Sitemaps are updated automatically when you click "Generate Now"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection