@extends('layouts.admin')

@section('title', 'Edit Language')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Language</h1>
        <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Languages
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.languages.update', $language) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Language Code <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('code') is-invalid @enderror" 
                                   id="code" 
                                   name="code" 
                                   value="{{ old('code', $language->code) }}"
                                   placeholder="e.g., es, fr, de"
                                   required>
                            <small class="form-text text-muted">ISO 639-1 code (2 letters)</small>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Language Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $language->name) }}"
                                   placeholder="e.g., Spanish, French, German"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="native_name">Native Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('native_name') is-invalid @enderror" 
                                   id="native_name" 
                                   name="native_name" 
                                   value="{{ old('native_name', $language->native_name) }}"
                                   placeholder="e.g., Español, Français, Deutsch"
                                   required>
                            @error('native_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="flag_icon">Flag Icon</label>
                            <input type="text" 
                                   class="form-control @error('flag_icon') is-invalid @enderror" 
                                   id="flag_icon" 
                                   name="flag_icon" 
                                   value="{{ old('flag_icon', $language->flag_icon) }}"
                                   placeholder="e.g., 🇪🇸, 🇫🇷, 🇩🇪">
                            <small class="form-text text-muted">Emoji or icon class</small>
                            @error('flag_icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direction">Text Direction <span class="text-danger">*</span></label>
                            <select class="form-control @error('direction') is-invalid @enderror" 
                                    id="direction" 
                                    name="direction" 
                                    required>
                                <option value="ltr" {{ old('direction', $language->direction) == 'ltr' ? 'selected' : '' }}>
                                    Left to Right (LTR)
                                </option>
                                <option value="rtl" {{ old('direction', $language->direction) == 'rtl' ? 'selected' : '' }}>
                                    Right to Left (RTL)
                                </option>
                            </select>
                            @error('direction')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order">Display Order</label>
                            <input type="number" 
                                   class="form-control @error('order') is-invalid @enderror" 
                                   id="order" 
                                   name="order" 
                                   value="{{ old('order', $language->order) }}"
                                   min="0">
                            <small class="form-text text-muted">Lower numbers appear first</small>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" 
                               class="custom-control-input" 
                               id="is_active" 
                               name="is_active"
                               {{ old('is_active', $language->is_active) ? 'checked' : '' }}
                               {{ $language->is_default ? 'disabled' : '' }}>
                        <label class="custom-control-label" for="is_active">
                            Active (users can switch to this language)
                            @if($language->is_default)
                                <small class="text-muted">(Default language is always active)</small>
                            @endif
                        </label>
                    </div>
                </div>

                @if($language->is_default)
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> This is the default language and cannot be deactivated.
                    </div>
                @endif

                <hr>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Language
                    </button>
                    <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
