@php
    use App\Models\Setting;
@endphp

@extends('layouts.admin')

@section('page-title', 'Settings')

@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="seo-tab" data-toggle="pill" href="#seo" role="tab">SEO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab">Social Media</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <form id="settingsForm">
                @csrf
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <!-- General Tab -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="form-group">
                            <label>Site Title</label>
                            <input type="text" name="site_title" value="{{ Setting::get('site_title', 'Optimizo') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Site Tagline</label>
                            <input type="text" name="site_tagline" value="{{ Setting::get('site_tagline') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Site Description</label>
                            <textarea name="site_description" rows="3"
                                class="form-control">{{ Setting::get('site_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Contact Email</label>
                            <input type="email" name="contact_email" value="{{ Setting::get('contact_email') }}"
                                class="form-control">
                        </div>
                    </div>

                    <!-- SEO Tab -->
                    <div class="tab-pane fade" id="seo" role="tabpanel">
                        <div class="form-group">
                            <label>Default Meta Title</label>
                            <input type="text" name="default_meta_title" value="{{ Setting::get('default_meta_title') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Default Meta Description</label>
                            <textarea name="default_meta_description" rows="3"
                                class="form-control">{{ Setting::get('default_meta_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Default Meta Keywords</label>
                            <input type="text" name="default_meta_keywords"
                                value="{{ Setting::get('default_meta_keywords') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Google Analytics ID</label>
                            <input type="text" name="google_analytics_id" value="{{ Setting::get('google_analytics_id') }}"
                                class="form-control" placeholder="G-XXXXXXXXXX">
                        </div>

                        <div class="form-group mt-4 pt-3 border-top">
                            <label class="d-block">Sitemap Management</label>
                            <button type="button" id="generateSitemapBtn" class="btn btn-info">
                                <i class="fas fa-sitemap mr-1"></i> Generate Sitemap
                            </button>
                            <p class="text-muted small mt-2">
                                <i class="fas fa-info-circle"></i> Generates a fresh <code>sitemap.xml</code> in the public
                                directory including all active tools and pages.
                            </p>
                        </div>
                    </div>

                    <!-- Social Media Tab -->
                    <div class="tab-pane fade" id="social" role="tabpanel">
                        <div class="form-group">
                            <label>Facebook URL</label>
                            <input type="url" name="facebook_url" value="{{ Setting::get('facebook_url') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Twitter URL</label>
                            <input type="url" name="twitter_url" value="{{ Setting::get('twitter_url') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Instagram URL</label>
                            <input type="url" name="instagram_url" value="{{ Setting::get('instagram_url') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LinkedIn URL</label>
                            <input type="url" name="linkedin_url" value="{{ Setting::get('linkedin_url') }}"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#settingsForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("admin.settings.update") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    toast(response.message, 'success');
                },
                error: function () {
                    toast('Error updating settings', 'error');
                }
            });
        });

        // Generate Sitemap Handler
        $('#generateSitemapBtn').on('click', function() {
            let btn = $(this);
            let originalText = btn.html();

            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Generating...');

            $.ajax({
                url: '{{ route("admin.settings.generate-sitemap") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toast(response.message, 'success');
                },
                error: function(xhr) {
                    toast(xhr.responseJSON?.message || 'Error generating sitemap', 'error');
                },
                complete: function() {
                    btn.prop('disabled', false).html(originalText);
                }
            });
        });
    </script>
@endpush