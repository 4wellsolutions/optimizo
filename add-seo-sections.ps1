#!/usr/bin/env pwsh
# Script to add SEO sections to all document tools in document.php

$seoSections = @{
    'word-to-pdf'    = @{
        title       = 'Word to PDF Converter - Free Online Tool'
        description = 'Convert Word documents to PDF online. Free DOC to PDF converter with perfect formatting preservation.'
    }
    'excel-to-pdf'   = @{
        title       = 'Excel to PDF Converter - Free Online Tool'
        description = 'Convert Excel spreadsheets to PDF online. Free XLS to PDF converter for professional data presentation.'
    }
    'pdf-to-excel'   = @{
        title       = 'PDF to Excel Converter - Free Online Tool'
        description = 'Convert PDF to Excel spreadsheets online. Extract tables from PDF to editable XLSX format.'
    }
    'ppt-to-pdf'     = @{
        title       = 'PowerPoint to PDF Converter - Free Online Tool'
        description = 'Convert PowerPoint presentations to PDF online. Free PPT to PDF converter for easy sharing.'
    }
    'pdf-to-ppt'     = @{
        title       = 'PDF to PowerPoint Converter - Free Online Tool'
        description = 'Convert PDF to PowerPoint slides online. Transform PDF pages into editable PPTX presentations.'
    }
    'jpg-to-pdf'     = @{
        title       = 'JPG to PDF Converter - Free Online Tool'
        description = 'Convert JPG images to PDF online. Combine multiple images into one PDF document.'
    }
    'pdf-to-jpg'     = @{
        title       = 'PDF to JPG Converter - Free Online Tool'
        description = 'Convert PDF to JPG images online. Extract PDF pages as high-quality JPG files.'
    }
    'pdf-compressor' = @{
        title       = 'PDF Compressor - Reduce PDF File Size Online'
        description = 'Compress PDF files online. Reduce PDF file size while maintaining quality with our free PDF compressor.'
    }
    'pdf-merger'     = @{
        title       = 'PDF Merger - Combine PDF Files Online'
        description = 'Merge PDF files online. Combine multiple PDFs into one document with our free PDF merger tool.'
    }
    'pdf-splitter'   = @{
        title       = 'PDF Splitter - Split PDF Files Online'
        description = 'Split PDF files online. Extract pages and divide large PDFs into smaller documents.'
    }
}

Write-Host "SEO sections to add:" -ForegroundColor Cyan
foreach ($tool in $seoSections.Keys) {
    Write-Host "  - $tool" -ForegroundColor Green
}
Write-Host "`nTotal: $($seoSections.Count) tools" -ForegroundColor Cyan
