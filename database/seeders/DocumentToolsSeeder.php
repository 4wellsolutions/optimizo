<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class DocumentToolsSeeder extends Seeder
{
    public function run()
    {
        $tools = [
            [
                'name' => 'PDF to Word Converter',
                'slug' => 'pdf-to-word',
                'description' => 'Convert PDF documents to editable Microsoft Word (DOC/DOCX) files.',
                'category' => 'Utility Tools',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-to-word',
                'meta_title' => 'PDF to Word Converter - Free Online Tool',
                'meta_description' => 'Convert PDF to Word online for free. Extract text and layout from PDF files to editable DOCX documents without software installation.',
                'content' => '<h2>Convert PDF to Word Online</h2><p>Our PDF to Word converter allows you to easily extract text and formatting from PDF files and save them as editable Word documents. Perfect for editing contracts, huge documents, or resumes originally saved as PDF.</p><h3>How to use:</h3><ol><li>Upload your PDF file.</li><li>Click "Convert to Word".</li><li>Download your editable DOCX file.</li></ol>',
            ],
            [
                'name' => 'Word to PDF Converter',
                'slug' => 'word-to-pdf',
                'description' => 'Convert Microsoft Word documents to professional PDF files.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.word-to-pdf',
                'meta_title' => 'Word to PDF Converter - Free Online Tool',
                'meta_description' => 'Convert DOC and DOCX files to PDF online for free. Preserve formatting and layout of your Word documents.',
                'content' => '<h2>Convert Word to PDF Online</h2><p>Turn your Microsoft Word documents into industry-standard PDF files. Preserves fonts, images, and layout.</p>',
            ],
            [
                'name' => 'PDF to Excel Converter',
                'slug' => 'pdf-to-excel',
                'description' => 'Convert PDF tables and data to Microsoft Excel spreadsheets.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-to-excel',
                'meta_title' => 'PDF to Excel Converter - Free Online Tool',
                'meta_description' => 'Convert PDF to Excel online. Extract tables and data from PDF documents into editable XLS/XLSX spreadsheets.',
                'content' => '<h2>Convert PDF to Excel</h2><p>Extract tables from your PDF documents directly into Microsoft Excel spreadsheets. The layout is preserved for easy data analysis.</p>',
            ],
            [
                'name' => 'Excel to PDF Converter',
                'slug' => 'excel-to-pdf',
                'description' => 'Convert Excel spreadsheets to clean PDF documents.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.excel-to-pdf',
                'meta_title' => 'Excel to PDF Converter - Free Online Tool',
                'meta_description' => 'Convert XLS and XLSX files to PDF. Securely save your spreadsheets as PDF documents.',
                'content' => '<h2>Convert Excel to PDF</h2><p>Save your Excel sheets as PDF files to ensure they print and display correctly on any device.</p>',
            ],
            [
                'name' => 'PowerPoint to PDF',
                'slug' => 'powerpoint-to-pdf',
                'description' => 'Convert PowerPoint presentations to PDF format.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.ppt-to-pdf',
                'meta_title' => 'PowerPoint to PDF Converter - Free Online Tool',
                'meta_description' => 'Convert PPT and PPTX presentations to PDF. Share your slides easily without compatibility issues.',
                'content' => '<h2>Convert PowerPoint to PDF</h2><p>Save your slides as a PDF document. Ideal for handing out notes or sharing presentations with people who don\'t have PowerPoint.</p>',
            ],
            [
                'name' => 'PDF to PowerPoint',
                'slug' => 'pdf-to-powerpoint',
                'description' => 'Convert PDF files to editable PowerPoint presentations.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-to-ppt',
                'meta_title' => 'PDF to PowerPoint Converter - Free Online Tool',
                'meta_description' => 'Convert PDF to PPTX online. Turn PDF content back into editable presentation slides.',
                'content' => '<h2>Convert PDF to PowerPoint</h2><p>Need to edit a presentation saved as PDF? Convert it back to PowerPoint (PPTX) format to modify text and move elements.</p>',
            ],
            [
                'name' => 'PDF to JPG Converter',
                'slug' => 'pdf-to-jpg',
                'description' => 'Convert PDF pages to high-quality JPG images.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-to-jpg',
                'meta_title' => 'PDF to JPG Converter - Free Online Tool',
                'meta_description' => 'Convert PDF pages to JPG images. Extract every page of your PDF as a separate image file.',
                'content' => '<h2>Convert PDF to JPG</h2><p>Turn PDF pages into image files. Useful for sharing specific pages on social media or using them in design projects.</p>',
            ],
            [
                'name' => 'JPG to PDF Converter',
                'slug' => 'jpg-to-pdf',
                'description' => 'Convert JPG and PNG images into a single PDF file.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.jpg-to-pdf',
                'meta_title' => 'JPG to PDF Converter - Free Online Tool',
                'meta_description' => 'Combine images (JPG, PNG) into a PDF document. Create portfolios or photo albums in PDF format.',
                'content' => '<h2>Convert Images to PDF</h2><p>Merge multiple images into a single PDF file. Great for creating digital photo albums or compiling scanned documents.</p>',
            ],
            [
                'name' => 'PDF Compressor',
                'slug' => 'pdf-compressor',
                'description' => 'Reduce PDF file size without losing quality.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-compressor',
                'meta_title' => 'Compress PDF Online - Free PDF Optimizer',
                'meta_description' => 'Compress PDF files online. Reduce file size for email or web upload while maintaining visual quality.',
                'content' => '<h2>Compress PDF File Size</h2><p>Optimize your PDF files by reducing their size. Perfect for emailing large documents or saving storage space.</p>',
            ],
            [
                'name' => 'PDF Merger',
                'slug' => 'pdf-merger',
                'description' => 'Combine multiple PDF files into one.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-merger',
                'meta_title' => 'Merge PDF Online - Free PDF Combiner',
                'meta_description' => 'Merge multiple PDF files into a single document. Organize your PDFs by combining them in your preferred order.',
                'content' => '<h2>Merge PDF Files</h2><p>Combine separate PDF files into one master document. Drag and drop to reorder files before merging.</p>',
            ],
            [
                'name' => 'PDF Splitter',
                'slug' => 'pdf-splitter',
                'description' => 'Split a PDF into multiple files or extract specific pages.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'route_name' => 'utility.pdf-splitter',
                'meta_title' => 'Split PDF Online - Extract Pages',
                'meta_description' => 'Split PDF documents online. Extract pages or cut a large PDF into smaller files.',
                'content' => '<h2>Split PDF Files</h2><p>Break a large PDF into smaller pieces or extract only the pages you need.</p>',
            ],
        ];

        foreach ($tools as $tool) {
            $tool['url'] = 'tools/' . $tool['slug'];
            $tool['controller'] = 'App\Http\Controllers\Tools\Utility\DocumentConverterController';
            Tool::updateOrCreate(
                ['slug' => $tool['slug']],
                $tool
            );
        }
    }
}
