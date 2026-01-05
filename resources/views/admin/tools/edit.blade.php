@extends('layouts.admin')

@section('title', 'Edit Tool - ' . $tool->name)

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Tool: {{ $tool->name }}</h1>
        <a href="{{ route('admin.tools.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Tools
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tools.update', $tool) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tool Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $tool->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror" 
                                   id="url" name="url" value="{{ old('url', $tool->url) }}" required>
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Example: /tools/image-compressor</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                           id="meta_title" name="meta_title" value="{{ old('meta_title', $tool->meta_title) }}" 
                           maxlength="255">
                    @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Recommended: 50-60 characters</small>
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                              id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $tool->meta_description) }}</textarea>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Recommended: 150-160 characters</small>
                </div>

                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" 
                           id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $tool->meta_keywords) }}">
                    @error('meta_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Comma-separated keywords</small>
                </div>

                {{-- Icon Management Section --}}
                <div class="card mb-3 bg-light">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-icons"></i> Icon Configuration</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="icon_name" class="form-label">Icon Name</label>
                            <input type="text" class="form-control @error('icon_name') is-invalid @enderror" 
                                   id="icon_name" name="icon_name" value="{{ old('icon_name', $tool->icon_name) }}">
                            @error('icon_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Optional icon identifier (e.g., "image-compressor")</small>
                        </div>

                        <div class="mb-3">
                            <label for="icon_svg" class="form-label">Icon SVG Code</label>
                            <textarea class="form-control @error('icon_svg') is-invalid @enderror font-monospace" 
                                      id="icon_svg" name="icon_svg" rows="8" 
                                      placeholder='<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>'
                                      style="font-size: 0.875rem;">{{ old('icon_svg', $tool->icon_svg) }}</textarea>
                            @error('icon_svg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-info-circle"></i> Paste SVG markup here. Use "currentColor" for fill/stroke to inherit icon color.
                            </small>
                        </div>

                        @if($tool->icon_svg)
                        <div class="mb-3">
                            <label class="form-label">Icon Preview</label>
                            <div class="p-4 border rounded bg-white">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="flex-shrink-0" style="width: 48px; height: 48px; display: flex; align-items: center; justify-center;">
                                        <div class="text-primary" style="width: 36px; height: 36px;">
                                            {!! $tool->icon_svg !!}
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">{{ $tool->name }}</p>
                                        <small class="text-muted">Icon preview as it appears in hero section</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="priority" class="form-label">Sitemap Priority</label>
                            <input type="number" class="form-control @error('priority') is-invalid @enderror" 
                                   id="priority" name="priority" value="{{ old('priority', $tool->priority) }}" 
                                   min="0" max="1" step="0.1" required>
                            @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">0.0 to 1.0</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="change_frequency" class="form-label">Change Frequency</label>
                            <select class="form-select @error('change_frequency') is-invalid @enderror" 
                                    id="change_frequency" name="change_frequency" required>
                                <option value="always" {{ old('change_frequency', $tool->change_frequency) === 'always' ? 'selected' : '' }}>Always</option>
                                <option value="hourly" {{ old('change_frequency', $tool->change_frequency) === 'hourly' ? 'selected' : '' }}>Hourly</option>
                                <option value="daily" {{ old('change_frequency', $tool->change_frequency) === 'daily' ? 'selected' : '' }}>Daily</option>
                                <option value="weekly" {{ old('change_frequency', $tool->change_frequency) === 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="monthly" {{ old('change_frequency', $tool->change_frequency) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="yearly" {{ old('change_frequency', $tool->change_frequency) === 'yearly' ? 'selected' : '' }}>Yearly</option>
                                <option value="never" {{ old('change_frequency', $tool->change_frequency) === 'never' ? 'selected' : '' }}>Never</option>
                            </select>
                            @error('change_frequency')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                   id="order" name="order" value="{{ old('order', $tool->order) }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Lower numbers appear first</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                               value="1" {{ old('is_active', $tool->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active (Include in sitemap and display on site)
                        </label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Tool
                    </button>
                    <a href="{{ route('admin.tools.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Tool Information</h5>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Slug:</dt>
                <dd class="col-sm-9">{{ $tool->slug }}</dd>

                <dt class="col-sm-3">Category:</dt>
                <dd class="col-sm-9">
                    <span class="badge bg-{{ $tool->category === 'utility' ? 'primary' : ($tool->category === 'youtube' ? 'danger' : ($tool->category === 'seo' ? 'success' : 'info')) }}">
                        {{ ucfirst($tool->category) }}
                    </span>
                </dd>

                <dt class="col-sm-3">Controller:</dt>
                <dd class="col-sm-9"><code>{{ $tool->controller }}</code></dd>

                <dt class="col-sm-3">Route Name:</dt>
                <dd class="col-sm-9"><code>{{ $tool->route_name }}</code></dd>

                <dt class="col-sm-3">Created:</dt>
                <dd class="col-sm-9">{{ $tool->created_at->format('M d, Y H:i') }}</dd>

                <dt class="col-sm-3">Last Updated:</dt>
                <dd class="col-sm-9">{{ $tool->updated_at->format('M d, Y H:i') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
