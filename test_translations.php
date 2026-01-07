#!/usr/bin/env php
<?php

/**
 * Quick Translation Test Script
 * 
 * Run this to verify translations are working:
 * php test_translations.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "\n=== Translation System Test ===\n\n";

// Test English
app()->setLocale('en');
echo "📍 Locale: en (English)\n";
echo "-------------------\n";
echo "common.home: " . __('common.home') . "\n";
echo "common.create: " . __('common.create') . "\n";
echo "seo.meta_title_suffix: " . __('seo.meta_title_suffix') . "\n";
echo "Tool title: " . __tool('youtube-thumbnail-downloader', 'form.title', 'MISSING') . "\n";
echo "Tool feature: " . __tool('youtube-thumbnail-downloader', 'content.feature_free_title', 'MISSING') . "\n\n";

// Test Russian
app()->setLocale('ru');
echo "📍 Locale: ru (Russian)\n";
echo "-------------------\n";
echo "common.home: " . __('common.home') . "\n";
echo "common.create: " . __('common.create') . "\n";
echo "seo.meta_title_suffix: " . __('seo.meta_title_suffix') . "\n";
echo "Tool title: " . __tool('youtube-thumbnail-downloader', 'form.title', 'MISSING') . "\n";
echo "Tool feature: " . __tool('youtube-thumbnail-downloader', 'content.feature_free_title', 'MISSING') . "\n\n";

// Test nested structure
echo "📍 Testing Nested Structure\n";
echo "-------------------\n";
app()->setLocale('en');
echo "EN Pro Tip 1: " . __tool('youtube-thumbnail-downloader', 'content.pro_tip_1', 'MISSING') . "\n";
app()->setLocale('ru');
echo "RU Pro Tip 1: " . __tool('youtube-thumbnail-downloader', 'content.pro_tip_1', 'MISSING') . "\n\n";

// Check for missing translations
echo "📍 Testing Missing Translations\n";
echo "-------------------\n";
app()->setLocale('en');
$missing = __tool('non-existent-tool', 'non.existent.key', 'FALLBACK_VALUE');
echo "Non-existent key should return fallback: " . $missing . "\n";
echo "Expected: FALLBACK_VALUE\n";
echo "Match: " . ($missing === 'FALLBACK_VALUE' ? '✅ PASS' : '❌ FAIL') . "\n\n";

echo "=== Test Complete ===\n\n";
