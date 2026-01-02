@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sitemap Management</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sitemap Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">Sitemap URL:</div>
                            <div class="col-md-8">
                                <a href="{{ $sitemapUrl }}" target="_blank">{{ $sitemapUrl }}</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">Last Generated:</div>
                            <div class="col-md-8">
                                <span class="badge badge-{{ $sitemapExists ? 'success' : 'secondary' }}">
                                    {{ $lastGenerated }}
                                </span>
                            </div>
                        </div>

                        <hr>

                        <form action="{{ route('admin.sitemap.generate') }}" method="POST">
                            @csrf
                            <div class="text-center">
                                <p class="text-muted small">
                                    Click below to crawl the database (Active Tools) and regenerate the `sitemap.xml` file.
                                </p>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-sync-alt"></i>
                                    </span>
                                    <span class="text">Generate Sitemap Now</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection