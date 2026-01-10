# Remaining Document Tools - Quick Reference
# This file lists the 5 remaining tools that need SEO + translation updates

## Tools to Update:
1. ppt-to-pdf.blade.php
2. pdf-to-ppt.blade.php
3. jpg-to-pdf.blade.php
4. pdf-to-jpg.blade.php
5. pdf-splitter.blade.php

## Pattern to Apply:

### 1. SEO Meta Tags (lines 1-10):
```blade
@extends('layouts.app')

@section('title', __tool('tool-slug', 'seo.title', $tool->meta_title))
@section('meta_description', __tool('tool-slug', 'seo.description', $tool->meta_description))
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <x-tool-hero :tool="$tool" />
```

### 2. Form Translations:
- upload_title
- upload_subtitle
- upload_text
- file_size_limit
- button
- dev_notice

### 3. All translation keys are ready in document.php!
