# Development & Converters Categories - Complete Setup Guide

## Overview
This guide covers the complete setup for Development and Converters categories including SQL, routes, controllers, views, and cache clearing.

## Step 1: Run SQL
Execute `create_dev_converters_categories.sql` to:
- Create Development category (indigo/purple gradient)
- Create Converters category (teal/cyan gradient)
- Update 22 development tools
- Update 33 converter tools

## Step 2: Add Category Routes & Controller Methods

### Add to `routes/web.php` (Category Pages section):
```php
Route::get('/development-tools', [CategoryController::class, 'development'])->name('development');
Route::get('/converters-tools', [CategoryController::class, 'converters'])->name('converters');
```

### Add to `CategoryController.php`:
```php
public function development()
{
    return $this->showCategory('development');
}

public function converters()
{
    return $this->showCategory('converters');
}
```

## Step 3: Create Route Groups

Due to the large number of tools, I recommend running the SQL first, then I can generate the complete route definitions based on the actual controller structure.

## Development Tools (22 tools)
- JSON Parser
- XML Formatter
- HTML Minifier
- JavaScript Minifier
- CSS Minifier
- Code Formatter
- Curl Command Builder
- Cron Job Generator
- UUID/GUID Generator
- MD5 Generator
- URL Encoder/Decoder
- Unicode Encoder/Decoder
- JWT Decoder
- Base64 Encoder/Decoder
- HTML Encoder/Decoder
- JSON to YAML Converter
- JSON to XML Converter
- JSON to SQL Converter
- Markdown to HTML Converter
- HTML to Markdown Converter
- HTML Viewer
- JSON Formatter

## Converter Tools (33 tools)
- Frequency Converter
- Molar Mass Converter
- Density Converter
- Torque Converter
- Cooking Unit Converter
- Data Transfer Rate Converter
- Fuel Consumption Converter
- Angle Converter
- Force Converter
- Power Converter
- Pressure Converter
- Energy Converter
- Digital Storage Converter
- Speed Converter
- Area Converter
- Volume Converter
- Temperature Converter
- Weight Converter
- Length Converter
- Number Base Converter
- Decimal to Octal Converter
- Decimal to Hexadecimal Converter
- Decimal to Binary Converter
- Binary to Hexadecimal Converter
- ASCII Converter
- RGB to HEX Converter
- Studly Case Converter
- Snake Case Converter
- Sentence Case Converter
- Pascal Case Converter
- Kebab Case Converter
- Camel Case Converter
- Case Converter

## Next Steps

After running the SQL:
1. I'll create the route groups for both categories
2. Create view directories
3. Update controller view paths
4. Update any route references in views
5. Clear all caches

**Please run the SQL file first, then I'll continue with the remaining steps.**
