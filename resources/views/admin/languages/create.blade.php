@extends('layouts.admin')

@section('title', 'Add New Language')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Language</h1>
        <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Languages
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.languages.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Language Code <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('code') is-invalid @enderror" 
                                   id="code" 
                                   name="code" 
                                   value="{{ old('code') }}"
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
                                   value="{{ old('name') }}"
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
                                   value="{{ old('native_name') }}"
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
                                   value="{{ old('flag_icon') }}"
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
                                <option value="ltr" {{ old('direction') == 'ltr' ? 'selected' : '' }}>
                                    Left to Right (LTR)
                                </option>
                                <option value="rtl" {{ old('direction') == 'rtl' ? 'selected' : '' }}>
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
                                   value="{{ old('order', 999) }}"
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
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="is_active">
                            Active (users can switch to this language)
                        </label>
                    </div>
                </div>

                <hr>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Language
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
