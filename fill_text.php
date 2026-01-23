<?php

// Fill empty keys in text.json with SEO-optimized content
// This file has 65 empty keys across multiple tools

$file = 'resources/lang/en/tools/text.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill
$fills = [
    // Duplicate Line Remover (9 keys)
    'duplicate-line-remover.editor.label_input' => 'Input Text',
    'duplicate-line-remover.editor.ph_input' => 'Paste your text with duplicate lines here...',
    'duplicate-line-remover.editor.lines_count' => 'Lines',
    'duplicate-line-remover.editor.label_output' => 'Output (Duplicates Removed)',
    'duplicate-line-remover.editor.btn_remove' => 'Remove Duplicates',
    'duplicate-line-remover.editor.btn_copy' => 'Copy Result',
    'duplicate-line-remover.editor.label_sensitive' => 'Case Sensitive',
    'duplicate-line-remover.js.removed_msg' => 'Removed {count} duplicate lines',
    'duplicate-line-remover.js.copied' => 'Copied to clipboard!',

    // File Difference Checker (11 keys)
    'file-difference-checker.editor.original_text' => 'Original Text',
    'file-difference-checker.editor.ph_original' => 'Paste original text here...',
    'file-difference-checker.editor.modified_text' => 'Modified Text',
    'file-difference-checker.editor.ph_modified' => 'Paste modified text here...',
    'file-difference-checker.editor.result_label' => 'Differences',
    'file-difference-checker.content.hero_title' => 'File Difference Checker - Compare Text & Code',
    'file-difference-checker.content.hero_subtitle' => 'Compare two text files or code snippets to find differences, additions, and deletions. Perfect for code reviews, document comparison, and version control.',
    'file-difference-checker.content.p1' => 'Our file difference checker (diff tool) helps you quickly identify changes between two versions of text, code, or documents. It highlights additions, deletions, and modifications line-by-line for easy comparison.',
    'file-difference-checker.content.uses_title' => 'Common Use Cases',
    'file-difference-checker.content.how_title' => 'How to Use',
    'file-difference-checker.content.faq_title' => 'Frequently Asked Questions',
    'file-difference-checker.js.error_empty' => 'Please enter text in both fields to compare',

    // Lorem Ipsum Generator (14 keys)
    'lorem-ipsum-generator.editor.label_count' => 'Number of',
    'lorem-ipsum-generator.editor.label_type' => 'Generate',
    'lorem-ipsum-generator.editor.opt_paragraphs' => 'Paragraphs',
    'lorem-ipsum-generator.editor.opt_sentences' => 'Sentences',
    'lorem-ipsum-generator.editor.opt_words' => 'Words',
    'lorem-ipsum-generator.editor.label_start_lorem' => 'Start with "Lorem ipsum"',
    'lorem-ipsum-generator.editor.btn_copy' => 'Copy Text',
    'lorem-ipsum-generator.editor.label_output' => 'Generated Text',
    'lorem-ipsum-generator.content.about_title' => 'About Lorem Ipsum',
    'lorem-ipsum-generator.content.about_desc' => 'Lorem Ipsum is placeholder text used in the printing and typesetting industry since the 1500s. It\'s used to demonstrate the visual form of a document without relying on meaningful content.',
    'lorem-ipsum-generator.content.p1' => 'Generate Lorem Ipsum placeholder text for your designs, mockups, and prototypes. Choose between paragraphs, sentences, or words to get exactly the amount of dummy text you need.',
    'lorem-ipsum-generator.js.success_generate' => 'Lorem ipsum text generated successfully!',
    'lorem-ipsum-generator.js.error_copy' => 'Failed to copy text',
    'lorem-ipsum-generator.js.success_copy' => 'Text copied to clipboard!',

    // Morse Code Converter (1 key)
    'morse-to-text-converter.content.examples_title' => 'Morse Code Examples',

    // Word Counter (30 keys)
    'word-counter.form.label' => 'Enter or Paste Your Text',
    'word-counter.form.placeholder' => 'Start typing or paste your text here to count words, characters, sentences, and more...',
    'word-counter.stats.words' => 'Words',
    'word-counter.stats.characters' => 'Characters',
    'word-counter.stats.sentences' => 'Sentences',
    'word-counter.stats.reading_time' => 'Reading Time',
    'word-counter.stats.paragraphs' => 'Paragraphs',
    'word-counter.stats.long_sentences' => 'Long Sentences',
    'word-counter.stats.short_sentences' => 'Short Sentences',
    'word-counter.stats.chars_no_spaces' => 'Characters (no spaces)',
    'word-counter.stats.avg_word_length' => 'Avg. Word Length',
    'word-counter.content.main_title' => 'Free Word Counter Tool',
    'word-counter.content.main_description' => 'Count words, characters, sentences, and paragraphs instantly. Perfect for writers, students, and SEO professionals.',
    'word-counter.content.intro' => 'Our word counter tool provides real-time statistics about your text including word count, character count, sentence count, reading time, and more. It\'s perfect for essays, articles, social media posts, and SEO content optimization.',
    'word-counter.content.feature1_title' => 'Real-Time Counting',
    'word-counter.content.feature1_desc' => 'See word and character counts update instantly as you type or paste text.',
    'word-counter.content.feature2_title' => 'Reading Time Estimate',
    'word-counter.content.feature2_desc' => 'Calculate how long it takes to read your content based on average reading speed.',
    'word-counter.content.feature3_title' => 'Sentence Analysis',
    'word-counter.content.feature3_desc' => 'Identify long and short sentences to improve readability and flow.',
    'word-counter.content.feature4_title' => 'SEO Optimization',
    'word-counter.content.feature4_desc' => 'Track character limits for meta descriptions, titles, and social media posts.',
    'word-counter.content.faq_title' => 'Frequently Asked Questions',
    'word-counter.content.faq1_q' => 'How accurate is the word count?',
    'word-counter.content.faq1_a' => 'Our word counter uses industry-standard algorithms to count words accurately. It counts words separated by spaces and ignores extra whitespace, giving you precise results matching tools like Microsoft Word and Google Docs.',
    'word-counter.content.faq2_q' => 'What is considered a "long sentence"?',
    'word-counter.content.faq2_a' => 'A sentence with more than 20 words is typically considered long. Long sentences can reduce readability, so our tool highlights them to help you improve your writing clarity.',
    'word-counter.content.faq3_q' => 'How is reading time calculated?',
    'word-counter.content.faq3_a' => 'Reading time is calculated based on an average reading speed of 200-250 words per minute for adults. This gives you an estimate of how long it takes to read your content.'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ text.json: Filled 65 empty keys\n";
echo "  - Duplicate Line Remover (9 keys)\n";
echo "  - File Difference Checker (11 keys)\n";
echo "  - Lorem Ipsum Generator (14 keys)\n";
echo "  - Morse Code Converter (1 key)\n";
echo "  - Word Counter (30 keys)\n";
