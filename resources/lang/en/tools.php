<?php

// Dynamically load and merge translation files from tools subdirectory
$toolsTranslations = [];
$toolsDirectory = __DIR__ . '/tools';

if (is_dir($toolsDirectory)) {
    // Load all PHP files from the tools directory
    $files = glob($toolsDirectory . '/*.php');
    foreach ($files as $file) {
        $category = basename($file, '.php'); // e.g., 'youtube', 'time'
        $categoryTranslations = require $file;

        // Merge category translations into main array with category prefix
        $toolsTranslations[$category] = $categoryTranslations;
    }
}

return array_merge($toolsTranslations, [
    /*
    |--------------------------------------------------------------------------
    | Tools Translation Keys
    |--------------------------------------------------------------------------
    */

    // Common translations
    'copied' => 'Copied!',
    'tool_description' => 'Tool description',
    'processing' => 'Processing',
    'try_again' => 'Try again',

    // YouTube Thumbnail Downloader
    'youtube-thumbnail-downloader' => [
        'form' => [
            'title' => 'Download YouTube Thumbnail',
            'url_label' => 'YouTube Video URL',
            'url_help' => 'Paste any YouTube video URL to get all available thumbnail resolutions',
            'submit' => 'Get Thumbnails',
        ],
        'results' => [
            'preview_title' => 'Thumbnail Preview',
            'resolutions_title' => 'Available Resolutions',
        ],
        'content' => [
            'main_title' => 'How It Works',
            'main_subtitle' => 'Download HD thumbnails from any YouTube video instantly - all resolutions available!',
            'description' => 'Download YouTube video thumbnails in the highest quality available with our free thumbnail downloader tool. Get thumbnails in HD (1920x1080), Full HD, SD (640x480), HQ, MQ, and default resolutions - all with a single click. Perfect for content creators analyzing competitor thumbnails, designers needing reference images, marketers creating presentations, or anyone who wants to save memorable video thumbnails for inspiration.',
            'feature_all_resolutions_title' => 'All Resolutions',
            'feature_all_resolutions_description' => 'Download thumbnails in HD, Full HD, SD, HQ, MQ, and default sizes - choose the perfect quality',
            'feature_instant_download_title' => 'Instant Download',
            'feature_instant_download_description' => 'Get thumbnails immediately without any processing delays or waiting time',
            'feature_free_title' => '100% Free',
            'feature_free_description' => 'No registration, no watermarks, no limits - completely free forever',
            'resolutions_section_title' => '📐 Available Thumbnail Resolutions',
            'resolution_label' => 'Resolution',
            'resolution_hd_title' => '🎬 HD (Maxres)',
            'resolution_hd_description' => 'Highest quality available - perfect for presentations, design work, and professional use',
            'resolution_sd_title' => '📺 SD (Standard)',
            'resolution_sd_description' => 'Standard definition - good balance of quality and file size for web use',
            'resolution_hq_title' => '🎯 HQ (High Quality)',
            'resolution_hq_description' => 'High quality thumbnail for social media and blogs',
            'resolution_mq_title' => '📱 MQ (Medium Quality)',
            'resolution_mq_description' => 'Medium quality for mobile displays and previews',
            'use_cases_section_title' => '🎯 Common Use Cases',
            'use_case_design_title' => 'Design Inspiration',
            'use_case_design_description' => 'Analyze successful thumbnail designs and create your own eye-catching thumbnails',
            'use_case_competitor_title' => 'Competitor Analysis',
            'use_case_competitor_description' => 'Study competitor thumbnails to understand what works in your niche',
            'use_case_social_media_title' => 'Social Media Sharing',
            'use_case_social_media_description' => 'Share video thumbnails on Instagram, Twitter, or Facebook',
            'use_case_presentations_title' => 'Presentations',
            'use_case_presentations_description' => 'Use thumbnails in business presentations and reports',
            'use_case_blog_posts_title' => 'Blog Posts',
            'use_case_blog_posts_description' => 'Embed video thumbnails in articles and blog content',
            'use_case_educational_title' => 'Educational Content',
            'use_case_educational_description' => 'Save thumbnails from educational videos for reference and study',
            'pro_tip_title' => '💡 Pro Tip: Creating Effective Thumbnails',
            'pro_tip_1' => 'Use bright, contrasting colors to stand out in search results',
            'pro_tip_2' => 'Add clear, readable text (maximum 3-5 words)',
            'pro_tip_3' => 'Show faces with emotions - they get 30% more clicks',
            'pro_tip_4' => 'Maintain consistent branding across all your thumbnails',
            'pro_tip_5' => 'Use 1920x1080 resolution for best quality on all devices',
            'faq_section_title' => '❓ Frequently Asked Questions',
            'faq_q1' => 'Can I download thumbnails from any YouTube video?',
            'faq_a1' => 'Yes! Our tool works with any public YouTube video. Simply paste the video URL and download thumbnails in all available resolutions instantly.',
            'faq_q2' => 'Which resolution should I choose?',
            'faq_a2' => 'For professional use, presentations, or design work, choose HD (1920x1080). For web use and social media, SD (640x480) or HQ (480x360) are perfect. Higher resolution means better quality but larger file size.',
            'faq_q3' => 'Is it legal to download YouTube thumbnails?',
            'faq_a3' => 'Downloading thumbnails for personal use, research, or inspiration is generally acceptable. However, using someone else\'s thumbnail for your own videos without permission may violate copyright. Always create original thumbnails for your content.',
            'faq_q4' => 'Do I need to install any software?',
            'faq_a4' => 'No! Our tool is entirely web-based. Just paste a YouTube URL and download - no software installation, registration, or downloads required.',
            'faq_q5' => 'Why are some resolutions not available?',
            'faq_a5' => 'Not all videos have thumbnails in all resolutions. Older videos or videos from smaller channels may only have lower resolution thumbnails. Our tool shows all available resolutions for each video.',
        ],
        'how_to_use' => [
            'title' => 'How to Download YouTube Thumbnails',
            'step1_title' => 'Copy Video URL:',
            'step1_description' => 'Go to YouTube and copy the video URL from the address bar.',
            'step2_title' => 'Paste URL:',
            'step2_description' => 'Paste the YouTube video URL into the input field above.',
            'step3_title' => 'Get Thumbnails:',
            'step3_description' => 'Click the button to load all available thumbnail resolutions.',
            'step4_title' => 'Download:',
            'step4_description' => 'Choose your preferred resolution and click download to save the thumbnail.',
        ],
        'extra_use_cases' => [
            'title' => 'Popular Use Cases for YouTube Thumbnails',
            'content_creation_title' => 'Content Creation:',
            'content_creation_desc' => 'Analyze competitor thumbnails for inspiration and trends',
            'presentations_title' => 'Presentations:',
            'presentations_desc' => 'Use video thumbnails in PowerPoint or Google Slides',
            'social_media_title' => 'Social Media:',
            'social_media_desc' => 'Share video previews on Twitter, Facebook, or Instagram',
            'design_reference_title' => 'Design Reference:',
            'design_reference_desc' => 'Use thumbnails as design inspiration for your own content',
            'archiving_title' => 'Archiving:',
            'archiving_desc' => 'Save memorable video thumbnails for personal collections',
        ],
    ],

    // YouTube Channel Data Extractor
    'youtube-channel-extractor' => [
        'form' => [
            'title' => 'Extract Channel Data',
            'url_label' => 'YouTube Channel URL',
            'url_help' => 'Paste any YouTube channel URL to extract its data',
            'submit' => 'Extract Channel Data',
        ],
        'results' => [
            'success_title' => 'Channel Data Extracted Successfully!',
        ],
        'content' => [
            'main_title' => 'YouTube Channel Data Extraction',
            'main_subtitle' => 'Extract complete channel statistics and information instantly',
            'description' => 'Our free YouTube Channel Data Extractor helps you analyze any YouTube channel by extracting comprehensive statistics and information. Get subscriber counts, total videos, view counts, channel descriptions, join dates, and more - all without needing a YouTube API key. Perfect for competitor analysis, influencer research, marketing campaigns, and content strategy planning.',
            'feature_complete_stats_title' => 'Complete Statistics',
            'feature_complete_stats_description' => 'Get subscribers, views, video count, and all channel metrics',
            'feature_instant_results_title' => 'Instant Results',
            'feature_instant_results_description' => 'Extract channel data instantly without any delays',
            'feature_free_title' => '100% Free',
            'feature_free_description' => 'No API keys, no registration, completely free forever',
            'extractable_data_title' => '📊 Extractable Channel Data',
            'use_cases_title' => '🎯 Common Use Cases',
            'pro_tips_title' => '💡 Pro Tips: Channel Analysis',
            'faq_title' => '❓ Frequently Asked Questions',
        ],
    ],

    // YouTube Video Data Extractor
    'youtube-video-extractor' => [
        'form' => [
            'title' => 'Extract YouTube Video Data',
            'url_label' => 'YouTube Video URL',
            'url_help' => 'Paste any YouTube video URL to extract all its metadata',
            'submit' => 'Extract Video Data',
        ],
        'results' => [
            'success_title' => 'Video Data Extracted Successfully!',
        ],
        'content' => [
            'main_title' => 'Complete Video Data Extraction',
            'main_subtitle' => 'Extract complete video data instantly',
            'description' => 'Our free YouTube Video Data Extractor is the perfect tool for content creators, digital marketers, SEO specialists, and researchers who need fast access to complete video metadata. Extract full video information including title, description, tags, views, likes, channel name, publish date, and thumbnail - all without using the YouTube API. Perfect for competitive analysis, content research, SEO optimization, and video marketing strategies.',
            'feature_complete_data_title' => 'Complete Data Extraction',
            'feature_complete_data_description' => 'Get all video metadata in one place - title, description, tags, views, likes, and more',
            'feature_easy_copy_title' => 'Easy Copy Function',
            'feature_easy_copy_description' => 'One-click copy buttons for title, description, and tags - perfect for content reuse',
            'feature_instant_results_title' => 'Instant Results',
            'feature_instant_results_description' => 'Get video data instantly without API keys or registration',
            'extractable_data_title' => '📊 Extractable Data Fields',
            // Extractable Data Fields
            'data_content_title' => '📝 Content Information',
            'data_video_title' => 'Video Title',
            'data_video_title_desc' => 'Full title with formatting',
            'data_description' => 'Description',
            'data_description_desc' => 'Complete video description',
            'data_tags' => 'Tags',
            'data_tags_desc' => 'All video tags for SEO analysis',
            'data_category' => 'Category',
            'data_category_desc' => 'Video category classification',
            'data_performance_title' => '📈 Performance Metrics',
            'data_view_count' => 'View Count',
            'data_view_count_desc' => 'Total video views',
            'data_likes' => 'Likes',
            'data_likes_desc' => 'Number of likes received',
            'data_publish_date' => 'Publish Date',
            'data_publish_date_desc' => 'When the video was uploaded',
            'data_duration' => 'Duration',
            'data_duration_desc' => 'Video length in minutes',
            'data_channel_title' => '👤 Channel Details',
            'data_channel_name' => 'Channel Name',
            'data_channel_name_desc' => 'Creator\'s channel name',
            'data_channel_url' => 'Channel URL',
            'data_channel_url_desc' => 'Direct link to the channel',
            'data_subscriber_count' => 'Subscriber Count',
            'data_subscriber_count_desc' => 'Channel subscribers',
            'data_visual_title' => '🖼️ Visual Assets',
            'data_thumbnail' => 'Thumbnail',
            'data_thumbnail_desc' => 'Video thumbnail image',
            'data_resolutions' => 'Multiple Resolutions',
            'data_resolutions_desc' => 'HD, SD, HQ options',
            'data_avatar' => 'Channel Avatar',
            'data_avatar_desc' => 'Creator\'s profile picture',
            // Use Cases
            'use_cases_title' => '🎯 Common Use Cases',
            'use_case_research_title' => 'Content Research',
            'use_case_research_desc' => 'Analyze competitor videos to understand successful content strategies',
            'use_case_seo_title' => 'SEO Optimization',
            'use_case_seo_desc' => 'Extract tags and keywords from high-performing videos to optimize your content',
            'use_case_marketing_title' => 'Marketing Analysis',
            'use_case_marketing_desc' => 'Track video performance metrics and analyze engagement data',
            'use_case_creation_title' => 'Content Creation',
            'use_case_creation_desc' => 'Get inspiration from successful videos and understand what works',
            'use_case_competitive_title' => 'Competitive Analysis',
            'use_case_competitive_desc' => 'Study competitor strategies and identify successful patterns',
            'use_case_data_title' => 'Data Collection',
            'use_case_data_desc' => 'Collect video metadata for research and analytics projects',
            // Pro Tips
            'pro_tips_title' => '💡 Pro Tip: Competitive Analysis Strategy',
            'pro_tip_1' => 'Extract data from top 10 videos in your niche to identify patterns',
            'pro_tip_2' => 'Analyze tags used by successful creators for SEO insights',
            'pro_tip_3' => 'Study video descriptions to understand effective copywriting',
            'pro_tip_4' => 'Compare views-to-likes ratios to gauge engagement quality',
            'pro_tip_5' => 'Track publish dates to determine optimal posting times',
            // FAQ
            'faq_title' => '❓ Frequently Asked Questions',
            'faq_q1' => 'Do I need a YouTube API key to use this tool?',
            'faq_a1' => 'No! Our tool extracts public video data without needing API keys, registration, or authentication. Just paste the video URL and get instant results.',
            'faq_q2' => 'What data can I extract from a YouTube video?',
            'faq_a2' => 'You can extract complete data including video title, description, tags, view count, likes, channel name, publish date, category, duration, thumbnail, and more. All data is displayed in an easy-to-read format with copy buttons.',
            'faq_q3' => 'Can I use this for competitive analysis?',
            'faq_a3' => 'Absolutely! This tool is perfect for competitive analysis. Extract data from competitor videos to understand their SEO strategy, content approach, and what makes their videos successful.',
            'faq_q4' => 'Is there a limit on how many videos I can analyze?',
            'faq_a4' => 'No limits! You can extract data from as many YouTube videos as you want, completely free. No daily limits, no registration required, and no hidden charges.',
            'faq_q5' => 'Can I copy the extracted data?',
            'faq_a5' => 'Yes! We provide one-click copy buttons for title, description, and tags. You can easily copy any data field and use it for your own content creation, research, or analytics purposes.',
        ],
        // JavaScript Labels
        'js' => [
            'video_thumbnail' => 'Video Thumbnail',
            'video_title' => 'Video Title',
            'channel_name' => 'Channel Name',
            'views' => 'Views',
            'likes' => 'Likes',
            'publish_date' => 'Publish Date',
            'duration' => 'Duration',
            'video_id' => 'Video ID',
            'description' => 'Description',
            'tags' => 'Tags',
            'copy' => 'Copy',
            'copied' => 'Copied!',
            'error_enter_url' => 'Please enter a YouTube URL',
            'error_valid_url' => 'Please enter a valid YouTube URL',
            'extracting' => 'Extracting data...',
            'error_failed' => 'Failed to extract video data. Please try again.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | YouTube Channel ID Finder Tool Translations
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | YouTube Earnings Calculator Tool Translations
    |--------------------------------------------------------------------------
    */
    'youtube-earnings-calculator' => [
        'how_to_use' => [
            'title' => 'How to Use',
            'step1' => 'Enter number of views',
            'step2' => 'Select content category',
            'step3' => 'View estimated earnings',
        ],
        'features' => [
            'title' => 'Features',
            'accurate' => 'Accurate calculations based on industry data',
            'categories' => 'Multiple content categories',
            'cpm_ranges' => 'CPM ranges by country',
            'instant' => 'Instant results',
        ],
        'use_cases' => [
            'title' => 'Use Cases',
            'case1' => 'Estimate potential revenue',
            'case2' => 'Plan content strategy',
            'case3' => 'Compare niches',
            'case4' => 'Set monetization goals',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'How accurate are the calculations?',
            'a1' => 'Our calculations are based on average industry CPM rates. Actual earnings may vary depending on many factors.',
            'q2' => 'What affects YouTube earnings?',
            'a2' => 'Earnings depend on CPM, viewer geography, content category, engagement, and seasonality.',
            'q3' => 'Does this include sponsorships?',
            'a3' => 'No, the calculator shows only YouTube ad revenue. Sponsorships and other income sources are not included.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | QR Code Generator Tool Translations
    |--------------------------------------------------------------------------
    */
    'qr-code-generator' => [
        'how_to_use' => [
            'title' => 'How to Use',
            'step1' => 'Enter text or URL',
            'step2' => 'Customize size and color (optional)',
            'step3' => 'Click "Generate QR Code"',
            'step4' => 'Download the image',
        ],
        'features' => [
            'title' => 'Features',
            'customizable' => 'Customizable size and color',
            'high_quality' => 'High quality images',
            'instant' => 'Instant generation',
            'free' => 'Free and unlimited',
        ],
        'use_cases' => [
            'title' => 'Use Cases',
            'case1' => 'Website links',
            'case2' => 'Product information',
            'case3' => 'Contact details',
            'case4' => 'Marketing materials',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'What is a QR code?',
            'a1' => 'A QR code (Quick Response) is a two-dimensional barcode that can be scanned with a smartphone to quickly access information.',
            'q2' => 'What size should I use?',
            'a2' => 'For print, we recommend a minimum of 300x300 pixels. For digital use, 200x200 is sufficient.',
            'q3' => 'Can I change the color?',
            'a3' => 'Yes, you can customize the QR code color, but ensure there is sufficient contrast for scanning.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Generator Tool Translations
    |--------------------------------------------------------------------------
    */
    'password-generator' => [
        'how_to_use' => [
            'title' => 'How to Use',
            'step1' => 'Choose password length',
            'step2' => 'Select character types (letters, numbers, symbols)',
            'step3' => 'Click "Generate Password"',
            'step4' => 'Copy and use',
        ],
        'features' => [
            'title' => 'Features',
            'secure' => 'Cryptographically secure generation',
            'customizable' => 'Customizable length and characters',
            'strength' => 'Password strength indicator',
            'instant' => 'Instant generation',
        ],
        'use_cases' => [
            'title' => 'Use Cases',
            'case1' => 'Creating new accounts',
            'case2' => 'Resetting forgotten passwords',
            'case3' => 'Improving security',
            'case4' => 'Generating API keys',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'How secure are the generated passwords?',
            'a1' => 'Our generator uses cryptographically secure methods to create highly secure random passwords.',
            'q2' => 'What password length is recommended?',
            'a2' => 'We recommend a minimum of 12 characters. For high security, use 16+ characters.',
            'q3' => 'Are passwords saved?',
            'a3' => 'No, passwords are generated locally in your browser and never sent to our servers.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | JSON Formatter Tool Translations
    |--------------------------------------------------------------------------
    */
    'json-formatter' => [
        'how_to_use' => [
            'title' => 'How to Use',
            'step1' => 'Paste your JSON code',
            'step2' => 'Choose formatting options',
            'step3' => 'Click "Format"',
            'step4' => 'Copy formatted JSON',
        ],
        'features' => [
            'title' => 'Features',
            'validate' => 'JSON syntax validation',
            'beautify' => 'Beautiful formatting',
            'minify' => 'JSON minification',
            'highlight' => 'Syntax highlighting',
        ],
        'use_cases' => [
            'title' => 'Use Cases',
            'case1' => 'Debug API responses',
            'case2' => 'Format configuration files',
            'case3' => 'Validate data structure',
            'case4' => 'Prepare for documentation',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'What does this tool do?',
            'a1' => 'The tool formats JSON code for better readability, validates syntax, and can minify JSON.',
            'q2' => 'Can I minify JSON?',
            'a2' => 'Yes, the tool supports both beautifying and minifying JSON.',
            'q3' => 'Is it safe to paste sensitive data?',
            'a3' => 'Yes, all processing happens locally in your browser. Data is not sent to the server.',
        ],
    ],


    // YouTube Video Data Extractor - FULLY TRANSLATED
    "youtube-video-extractor" => [
        "seo" => [
            "title" => "Free YouTube Video Data Extractor - Extract Video Metadata | Optimizo",
            "description" => "Extract complete YouTube video data instantly. Get title, description, tags, views, likes, and more without API keys.",
        ],

        "form" => [
            "title" => "Extract YouTube Video Data",
            "url_label" => "YouTube Video URL",
            "url_help" => "Paste any YouTube video URL to extract all its metadata",
            "submit" => "Extract Video Data",
        ],

        "results" => [
            "success_title" => "Video Data Extracted Successfully!",
        ],

        "js" => [
            "error_enter_url" => "Please enter a YouTube video URL",
            "error_valid_url" => "Please enter a valid YouTube URL",
            "extracting" => "Extracting...",
            "error_failed" => "Failed to extract video data",
            "video_thumbnail" => "Video Thumbnail",
            "video_title" => "Video Title",
            "video_description" => "Description",
            "video_tags" => "Tags",
            "view_count" => "Views",
            "like_count" => "Likes",
            "channel_name" => "Channel",
            "publish_date" => "Published",
            "copy" => "Copy",
            "copied" => "Copied!",
        ],

        "content" => [
            "main_title" => "Complete Video Data Extraction",
            "main_subtitle" => "Extract complete video data instantly",
            "description" => "Our free YouTube Video Data Extractor is the ultimate tool for content creators, digital marketers, SEO specialists, and researchers who need quick access to comprehensive video metadata. Extract complete video information including title, description, tags, views, likes, channel name, publish date, and thumbnail - all without using any YouTube API. Perfect for competitive analysis, content research, SEO optimization, and video marketing strategies.",

            "feature_complete_data_title" => "Complete Data Extraction",
            "feature_complete_data_description" => "Get all video metadata in one place - title, description, tags, views, likes, and more",
            "feature_easy_copy_title" => "Easy Copy Function",
            "feature_easy_copy_description" => "One-click copy buttons for title, description, and tags - perfect for content reuse",
            "feature_instant_results_title" => "Instant Results",
            "feature_instant_results_description" => "Get video data instantly without any API keys or registration required",

            "extractable_data_title" => "Extractable Data Fields",
            "data_content_title" => "📝 Content Information",
            "data_video_title" => "Video Title",
            "data_video_title_desc" => "Full title with formatting",
            "data_description" => "Description",
            "data_description_desc" => "Complete video description",
            "data_tags" => "Tags",
            "data_tags_desc" => "All video tags for SEO analysis",
            "data_category" => "Category",
            "data_category_desc" => "Video category classification",

            "data_performance_title" => "📈 Performance Metrics",
            "data_view_count" => "View Count",
            "data_view_count_desc" => "Total video views",
            "data_likes" => "Likes",
            "data_likes_desc" => "Number of likes received",
            "data_publish_date" => "Publish Date",
            "data_publish_date_desc" => "When video was uploaded",
            "data_duration" => "Duration",
            "data_duration_desc" => "Video length in minutes",

            "data_channel_title" => "👤 Channel Details",
            "data_channel_name" => "Channel Name",
            "data_channel_name_desc" => "Creator's channel name",
            "data_channel_url" => "Channel URL",
            "data_channel_url_desc" => "Direct link to channel",
            "data_subscriber_count" => "Subscriber Count",
            "data_subscriber_count_desc" => "Channel subscribers",

            "data_visual_title" => "🖼️ Visual Assets",
            "data_thumbnail" => "Thumbnail",
            "data_thumbnail_desc" => "Video thumbnail image",
            "data_resolutions" => "Multiple Resolutions",
            "data_resolutions_desc" => "HD, SD, HQ options",
            "data_avatar" => "Channel Avatar",
            "data_avatar_desc" => "Creator profile picture",

            "use_cases_title" => "Common Use Cases",
            "use_case_research_title" => "Content Research",
            "use_case_research_desc" => "Analyze competitor videos to understand successful content strategies",
            "use_case_seo_title" => "SEO Optimization",
            "use_case_seo_desc" => "Extract tags and keywords from high-performing videos to optimize your own content",
            "use_case_marketing_title" => "Marketing Analysis",
            "use_case_marketing_desc" => "Track video performance metrics and analyze engagement data",
            "use_case_creation_title" => "Content Creation",
            "use_case_creation_desc" => "Get inspiration from successful videos and understand what works",
            "use_case_competitive_title" => "Competitive Analysis",
            "use_case_competitive_desc" => "Study competitor strategies and identify successful patterns",
            "use_case_data_title" => "Data Collection",
            "use_case_data_desc" => "Gather video metadata for research and analysis projects",

            "pro_tips_title" => "Pro Tip: Competitive Analysis Strategy",
            "pro_tip_1" => "Extract data from top 10 videos in your niche to identify patterns",
            "pro_tip_2" => "Analyze tags used by successful creators for SEO insights",
            "pro_tip_3" => "Study video descriptions to understand effective copywriting",
            "pro_tip_4" => "Compare view-to-like ratios to gauge engagement quality",
            "pro_tip_5" => "Track publish dates to identify optimal posting times",

            "faq_title" => "Frequently Asked Questions",
            "faq_q1" => "Do I need a YouTube API key to use this tool?",
            "faq_a1" => "No! Our tool extracts publicly available video data without requiring any API keys, registration, or authentication. Simply paste the video URL and get instant results.",
            "faq_q2" => "What data can I extract from YouTube videos?",
            "faq_a2" => "You can extract comprehensive data including video title, description, tags, view count, likes, channel name, publish date, category, duration, thumbnail, and more. All data is displayed in an easy-to-read format with copy buttons.",
            "faq_q3" => "Can I use this for competitor analysis?",
            "faq_a3" => "Absolutely! This tool is perfect for competitive analysis. Extract data from competitor videos to understand their SEO strategy, content approach, and what makes their videos successful.",
            "faq_q4" => "Is there a limit on how many videos I can analyze?",
            "faq_a4" => "No limits! You can extract data from as many YouTube videos as you need, completely free. There are no daily limits, no registration required, and no hidden fees.",
            "faq_q5" => "Can I copy the extracted data?",
            "faq_a5" => "Yes! We provide one-click copy buttons for title, description, and tags. You can easily copy any data field and use it for your own content creation, research, or analysis purposes.",
        ],
    ],


    // YouTube Tag Generator - FULLY TRANSLATED
    "youtube-tag-generator" => [
        "seo" => [
            "title" => "Free YouTube Tag Generator - Generate SEO Tags | Optimizo",
            "description" => "Generate optimized YouTube tags instantly. Get tag suggestions based on keywords for better video SEO.",
        ],

        "form" => [
            "title" => "Generate YouTube Tags",
            "keyword_label" => "Main Keyword or Topic",
            "keyword_placeholder" => "e.g., cooking recipes, gaming tutorial, tech review...",
            "keyword_help" => "Enter your video's main topic to generate relevant tags",
            "button" => "Generate Tags",
            "button_generating" => "Generating Tags...",
        ],

        "results" => [
            "title" => "Generated Tags",
            "count_prefix" => "Generated Tags (",
            "count_suffix" => ")",
            "copy_button" => "Copy All",
            "copied" => "Copied!",
            "comma_separated" => "Comma-separated format:",
        ],

        "messages" => [
            "error_keyword_required" => "Please enter a keyword or topic",
        ],

        "content" => [
            "main_title" => "Generate SEO-Optimized Tags",
            "main_subtitle" => "Boost your video's visibility and rankings with smart tag suggestions",
            "intro" => "Our free YouTube Tag Generator helps content creators, marketers, and video producers create effective, SEO-optimized tags that improve video discoverability. Generate relevant tags based on your main keyword, understand tag strategy, and boost your YouTube SEO with data-driven tag suggestions. Perfect for maximizing reach, improving search rankings, and growing your channel organically.",

            "feature1_title" => "SEO Optimized",
            "feature1_desc" => "Generate tags optimized for YouTube's search algorithm to improve rankings",
            "feature2_title" => "Instant Results",
            "feature2_desc" => "Get relevant tag suggestions instantly based on your keyword",
            "feature3_title" => "Easy Copy",
            "feature3_desc" => "One-click copy in comma-separated format ready to paste",

            "strategy_title" => "🎯 Tag Strategy Guide",
            "primary_title" => "🎯 Primary Tags (3-5)",
            "primary_desc" => "Your main keywords that directly describe your video",
            "primary_example" => "Example: \"cooking tutorial\", \"easy recipes\", \"beginner cooking\"",
            "secondary_title" => "📊 Secondary Tags (5-10)",
            "secondary_desc" => "Related keywords that expand your reach",
            "secondary_example" => "Example: \"quick meals\", \"healthy eating\", \"kitchen tips\"",
            "longtail_title" => "🔍 Long-tail Tags (5-10)",
            "longtail_desc" => "Specific phrases with less competition",
            "longtail_example" => "Example: \"how to cook pasta for beginners\"",
            "branded_title" => "🏷️ Branded Tags (2-3)",
            "branded_desc" => "Your channel name and brand keywords",
            "branded_example" => "Example: \"YourChannelName\", \"YourBrand cooking\"",

            "best_practices_title" => "✅ Tag Best Practices",
            "bp1_title" => "Use 15-20 Tags",
            "bp1_desc" => "Optimal number for maximum SEO benefit without over-tagging",
            "bp2_title" => "Mix Broad & Specific",
            "bp2_desc" => "Combine general and niche tags for better reach",
            "bp3_title" => "First Tag Matters",
            "bp3_desc" => "Your most important keyword should be the first tag",
            "bp4_title" => "Avoid Misleading Tags",
            "bp4_desc" => "Only use tags relevant to your actual content",
            "bp5_title" => "Update Regularly",
            "bp5_desc" => "Refresh tags based on performance and trends",
            "bp6_title" => "Research Competitors",
            "bp6_desc" => "Analyze successful videos in your niche",

            "tips_title" => "💡 Pro Tips: Maximizing Tag Effectiveness",
            "tip1" => "Use your main keyword in the video title, description, AND first tag",
            "tip2" => "Include misspellings of popular keywords to capture more searches",
            "tip3" => "Add location-based tags if your content is location-specific",
            "tip4" => "Use YouTube's autocomplete to find popular search terms",
            "tip5" => "Monitor analytics to see which tags drive the most traffic",

            "faq_title" => "❓ Frequently Asked Questions",
            "faq_q1" => "How many tags should I use for my YouTube videos?",
            "faq_a1" => "YouTube allows up to 500 characters of tags. The sweet spot is 15-20 well-chosen tags that mix broad keywords, specific phrases, and long-tail variations. Quality matters more than quantity.",
            "faq_q2" => "Do YouTube tags really help with SEO?",
            "faq_a2" => "Yes! While title and description are more important, tags help YouTube understand your content and suggest it to relevant viewers. They're especially useful for commonly misspelled keywords and synonyms.",
            "faq_q3" => "Should I use single words or phrases as tags?",
            "faq_a3" => "Use both! Mix single-word tags (broad reach) with multi-word phrases (specific targeting). For example: \"cooking\" (broad) and \"easy cooking for beginners\" (specific).",
            "faq_q4" => "Can I copy tags from popular videos?",
            "faq_a4" => "You can use them as inspiration, but create your own unique tag combination. Focus on tags that accurately describe YOUR content. Misleading tags can hurt your channel's performance.",
            "faq_q5" => "How often should I update my video tags?",
            "faq_a5" => "Review and update tags every 3-6 months, or when you notice performance changes. Add trending keywords relevant to your content and remove underperforming tags based on your analytics.",
        ],
    ],

    // YouTube Channel ID Finder - FULLY TRANSLATED
    "youtube-channel-id-finder" => [
        "seo" => [
            "title" => "Free YouTube Channel ID Finder - Get Any Channel ID | Optimizo",
            "description" => "Find any YouTube channel's unique ID instantly. Simple tool for developers, marketers, and creators. No API key needed.",
        ],

        "form" => [
            "title" => "Find YouTube Channel ID",
            "url_label" => "YouTube Channel URL or Username",
            "url_placeholder" => "https://www.youtube.com/@channelname or https://www.youtube.com/c/channelname",
            "url_help" => "Enter the URL of the YouTube channel or @username to find its ID",
            "find_button" => "Find Channel ID",
        ],

        "js" => [
            "error_enter_url" => "Please enter a YouTube channel URL",
            "error_valid_url" => "Please enter a valid YouTube channel URL",
            "finding" => "Finding ID...",
            "error_failed" => "Failed to retrieve channel ID. Please try again.",
            "success_title" => "Channel ID Found!",
            "channel_id" => "Channel ID",
            "channel_name" => "Channel Name",
            "channel_url" => "Channel URL",
            "copy" => "Copy",
            "copied" => "Copied!",
        ],

        "use_cases" => [
            "case1" => "API Integration",
            "case1_desc" => "Use channel IDs in YouTube Data API calls for your applications",
            "case2" => "Analytics Tools",
            "case2_desc" => "Build custom analytics dashboards and tracking systems",
            "case3" => "Influencer Marketing",
            "case3_desc" => "Track and manage influencer partnerships efficiently",
            "case4" => "RSS Feeds",
            "case4_desc" => "Create RSS feeds for channel uploads using channel IDs",
            "case5" => "Content Curation",
            "case5_desc" => "Organize and categorize channels for content strategies",
            "case6" => "Automation",
            "case6_desc" => "Automate channel monitoring and data collection",
        ],

        "pro_tips" => [
            "title" => "💡 Pro Tips: Using Channel IDs",
            "tip1" => "Channel IDs always start with \"UC\" followed by 22 characters",
            "tip2" => "Use channel IDs instead of usernames for API reliability",
            "tip3" => "Channel IDs never change, even if the channel name or handle changes",
            "tip4" => "Store channel IDs in your database for long-term tracking",
            "tip5" => "Use channel IDs to create direct RSS feed URLs: youtube.com/feeds/videos.xml?channel_id=ID",
        ],

        "content" => [
            "main_title" => "Find YouTube Channel ID Instantly",
            "main_subtitle" => "Get any channel's unique ID for API integration, analytics, and development",
            "main_description" => "Our free YouTube Channel ID Finder helps developers, marketers, and content creators quickly retrieve the unique ID for any YouTube channel. Whether you need it for API integration, analytics tools, or third-party applications, get accurate channel IDs instantly without requiring an API key.",

            "feature_instant_title" => "Instant Results",
            "feature_instant_desc" => "Get channel IDs immediately without delays or complicated setup",
            "feature_formats" => "All URL Formats",
            "feature_formats_desc" => "Works with @username, /c/channelname, /channel/ID, and /user/username",
            "feature_copy" => "Easy Copy",
            "feature_copy_desc" => "One-click copy to clipboard for quick use in your projects",

            "why_need_title" => "Why You Need Channel IDs",
            "api_dev_title" => "🔧 API & Development",
            "api_dev_1" => "Required for YouTube Data API v3 integration",
            "api_dev_2" => "Essential for building YouTube analytics tools",
            "api_dev_3" => "Needed for channel subscription tracking",
            "api_dev_4" => "Crucial for automated content management",
            "marketing_title" => "📊 Marketing & Analytics",
            "marketing_1" => "Track competitor channel performance",
            "marketing_2" => "Monitor influencer collaborations",
            "marketing_3" => "Verify channel authenticity",
            "marketing_4" => "Analyze channel growth trends",
        ],

        "use_cases" => [
            "title" => "Common Use Cases",
            "case1" => "API Integration",
            "case1_desc" => "Use channel IDs to fetch channel data via YouTube Data API",
            "case2" => "Analytics Tools",
            "case2_desc" => "Build or integrate with YouTube analytics and tracking platforms",
            "case3" => "Influencer Marketing",
            "case3_desc" => "Verify and track influencer channels for collaboration campaigns",
            "case4" => "Channel Verification",
            "case4_desc" => "Confirm channel identity and authenticity for partnerships",
            "case5" => "Content Curation",
            "case5_desc" => "Organize and manage multiple YouTube channels efficiently",
            "case6" => "Development Projects",
            "case6_desc" => "Integrate YouTube channel data into applications and websites",
        ],

        "pro_tips" => [
            "title" => "💡 Pro Tips: Working with Channel IDs",
            "tip1" => "Channel IDs always start with 'UC' followed by 22 characters",
            "tip2" => "Store channel IDs for faster API calls instead of usernames",
            "tip3" => "Channel IDs remain constant even if the channel URL changes",
            "tip4" => "Use the ID in RSS feeds: youtube.com/feeds/videos.xml?channel_id=YOUR_ID",
            "tip5" => "Bookmark frequently used channel IDs for quick reference",
        ],

        "faq" => [
            "title" => "❓ Frequently Asked Questions",
            "q1" => "What is a YouTube Channel ID?",
            "a1" => "A YouTube Channel ID is a unique 24-character identifier starting with 'UC' that YouTube assigns to every channel. It's permanent and doesn't change even if the channel name or custom URL changes.",
            "q2" => "Why do I need the Channel ID instead of just the channel name?",
            "a2" => "The YouTube API requires Channel IDs for most operations. Unlike channel names which can change, IDs are permanent and work more reliably in API calls, analytics tools, and integrations.",
            "q3" => "Can I use this tool with any YouTube channel URL format?",
            "a3" => "Yes! Our tool works with all URL formats including @username, /c/channelname, /channel/ID, /user/username, and even legacy formats.",
            "q4" => "Is this tool free to use?",
            "a4" => "Absolutely! Our Channel ID Finder is completely free with no limitations, registration, or API key requirements. Use it as often as you need.",
            "q5" => "What should I do with the Channel ID once I have it?",
            "a5" => "You can use it with the YouTube Data API to fetch channel statistics, subscribe users, retrieve videos, generate RSS feeds, or integrate with third-party analytics and management tools.",
        ],
    ],

    // YouTube Handle Checker
    "youtube-handle-checker" => [
        "seo" => [
            "title" => "YouTube Handle Checker - Check @Handle Availability | Optimizo",
            "description" => "Check if your desired YouTube handle is available. Free tool to find the perfect @handle for your YouTube channel.",
        ],

        "form" => [
            "title" => "Check Handle Availability",
            "handle_label" => "Desired Handle",
            "handle_placeholder" => "yourhandle",
            "handle_help" => "Enter handle without the @ symbol",
            "check_button" => "Check Availability",
        ],

        "js" => [
            "error_enter_handle" => "Please enter a handle",
            "error_invalid_handle" => "Invalid handle format",
            "checking" => "Checking...",
            "error_failed" => "Failed to check handle",
            "available_title" => "✅ Available!",
            "available_message" => "This handle is available",
            "taken_title" => "❌ Taken",
            "taken_message" => "This handle is already taken",
            "try_alternatives" => "Try these alternatives:",
        ],

        "content" => [
            "main_title" => "Check Handle Availability",
            "main_subtitle" => "Find the perfect @handle for your YouTube channel",
            "description" => "Our free YouTube Handle Checker helps you find the perfect @handle for your YouTube channel. Instantly check handle availability, get alternative suggestions if your desired handle is taken, and secure your brand identity on YouTube.",

            "feature1_title" => "Instant Check",
            "feature1_desc" => "Get immediate results on handle availability",
            "feature2_title" => "Smart Suggestions",
            "feature2_desc" => "Get alternative handle ideas if yours is taken",
            "feature3_title" => "100% Free",
            "feature3_desc" => "No limits, no registration required",

            "tips_title" => "💡 Pro Tips: Choosing the Perfect Handle",
            "tip1" => "Check availability on Instagram, Twitter, and TikTok too for consistency",
            "tip2" => "Consider future growth - will this handle still fit in 5 years?",
            "tip3" => "Test pronunciation - can people easily say it?",
            "tip4" => "Avoid trends that might date your brand",
            "tip5" => "If your first choice is taken, try adding your niche or location",

            "faq_title" => "❓ Frequently Asked Questions",
            "faq_q1" => "What characters can I use in a YouTube handle?",
            "faq_a1" => "YouTube handles can contain letters (a-z), numbers (0-9), periods (.), underscores (_), and hyphens (-). Handles must be 3-30 characters long and cannot contain spaces or special characters.",
            "faq_q2" => "Can I change my YouTube handle later?",
            "faq_a2" => "Yes! YouTube allows you to change your handle, but you can only do so a limited number of times within a certain period. Choose wisely to avoid frequent changes that might confuse your audience.",
            "faq_q3" => "What if my desired handle is taken?",
            "faq_a3" => "Our tool provides alternative suggestions if your handle is unavailable. Try adding numbers, your niche, location, or variations of your name.",
            "faq_q4" => "Should my YouTube handle match my channel name?",
            "faq_a4" => "Ideally, yes! Matching your handle with your channel name creates consistency and makes you easier to find. However, if your channel name is long, consider a shortened version for your handle.",
            "faq_q5" => "How do I claim my YouTube handle?",
            "faq_a5" => "After checking that a handle is available with our tool, go to YouTube Studio, navigate to Settings > Basic Info, and you'll see the option to choose your handle. Claim it quickly before someone else does!",
        ],
    ],

    // YouTube Video Tags Extractor - FULLY TRANSLATED
    "youtube-video-tags-extractor" => [
        "seo" => [
            "title" => "Free YouTube Video Tags Extractor - See Any Video's Tags | Optimizo",
            "description" => "Extract tags from any YouTube video instantly. Analyze competitor tags, discover trending keywords, and optimize your SEO strategy.",
        ],

        "form" => [
            "title" => "Extract Video Tags",
            "url_label" => "YouTube Video URL",
            "url_placeholder" => "https://www.youtube.com/watch?v=...",
            "url_help" => "Paste any YouTube video URL to extract all its tags",
            "extract_button" => "Extract Tags",
            "extracting" => "Extracting...",
        ],

        "results" => [
            "title" => "Extracted Tags",
            "copy_all" => "Copy All",
            "copied" => "Copied!",
            "comma_separated" => "Comma-separated format:",
        ],

        "js" => [
            "error_enter_url" => "Please enter a YouTube video URL",
            "error_valid_url" => "Please enter a valid YouTube URL",
            "error_failed" => "Failed to extract tags. Please try again.",
            "extracting" => "Extracting...",
            "extract_button" => "Extract Tags",
            "copied" => "Copied!",
        ],

        "content" => [
            "main_title" => "Extract Video Tags for SEO",
            "main_subtitle" => "Analyze tags from any YouTube video for optimization insights",
            "intro" => "Extract all tags from any YouTube video instantly with our free tags extractor tool. Analyze competitor tags, discover trending keywords, and optimize your own video tags for better search rankings. Perfect for content creators, SEO specialists, and digital marketers who want to understand what tags successful videos use to rank higher in YouTube search results.",

            "feature1_title" => "Complete Tag List",
            "feature1_desc" => "Extract all tags from any video - see exactly what keywords creators use",
            "feature2_title" => "One-Click Copy",
            "feature2_desc" => "Copy all tags instantly in comma-separated format for easy use",
            "feature3_title" => "Instant Results",
            "feature3_desc" => "Get tags immediately without any delays or processing time",

            "why_title" => "🎯 Why Extract YouTube Tags?",
            "competitor_title" => "📊 Competitor Analysis",
            "competitor_desc" => "Discover what tags successful videos in your niche use",
            "competitor_detail" => "Analyze top-performing videos to understand their SEO strategy and replicate their success",
            "keyword_title" => "🔍 Keyword Research",
            "keyword_desc" => "Find trending keywords and popular search terms",
            "keyword_detail" => "Identify high-performing keywords to improve your video's discoverability",
            "ideas_title" => "💡 Content Ideas",
            "ideas_desc" => "Get inspiration for your own video tags",
            "ideas_detail" => "See what topics and keywords are trending in your niche",
            "seo_title" => "📈 SEO Optimization",
            "seo_desc" => "Optimize your tags for better rankings",
            "seo_detail" => "Learn from successful videos to improve your own SEO strategy",

            "use_cases_title" => "🎯 Common Use Cases",
            "case1_title" => "Content Research",
            "case1_desc" => "Analyze competitor tags to understand successful content strategies",
            "case2_title" => "SEO Analysis",
            "case2_desc" => "Study tag patterns in high-ranking videos for optimization insights",
            "case3_title" => "Keyword Discovery",
            "case3_desc" => "Find new keyword opportunities from successful videos",
            "case4_title" => "Marketing Strategy",
            "case4_desc" => "Develop data-driven tag strategies for your videos",
            "case5_title" => "Trend Analysis",
            "case5_desc" => "Identify trending topics and keywords in your niche",
            "case6_title" => "Learning & Research",
            "case6_desc" => "Study how successful creators optimize their content",

            "tips_title" => "💡 Pro Tips: Using Extracted Tags Effectively",
            "tip1" => "Analyze tags from top 10 videos in your niche to find common patterns",
            "tip2" => "Don't copy tags directly - use them as inspiration for your own unique tags",
            "tip3" => "Focus on tags that are relevant to your specific content",
            "tip4" => "Mix broad and specific tags for maximum reach",
            "tip5" => "Update your tags regularly based on trending keywords",

            "faq_title" => "❓ Frequently Asked Questions",
            "faq_q1" => "How do I extract tags from a YouTube video?",
            "faq_a1" => "Simply paste the YouTube video URL into the input field above and click \"Extract Tags\". Our tool will instantly retrieve all tags used in that video and display them in an easy-to-copy format.",
            "faq_q2" => "Can I see tags from any YouTube video?",
            "faq_a2" => "Yes! Our tool works with any public YouTube video. However, if a video creator hasn't added any tags, the tool will show that no tags are available for that particular video.",
            "faq_q3" => "Is it legal to extract YouTube video tags?",
            "faq_a3" => "Yes, extracting tags for research and analysis is completely legal. Tags are publicly available metadata. However, you should create your own original tags rather than copying them directly from other videos.",
            "faq_q4" => "How can I use extracted tags for my videos?",
            "faq_a4" => "Use extracted tags as inspiration and research. Analyze patterns in successful videos, identify relevant keywords for your niche, and create your own unique tag combinations that accurately describe your content.",
            "faq_q5" => "Do I need a YouTube API key?",
            "faq_a5" => "No! Our tool doesn't require any API keys or authentication. Simply paste the video URL and get instant results - completely free and unlimited.",
        ],
    ],

    // YouTube Handle Checker - FULLY TRANSLATED
    // YouTube Channel Data Extractor - FULLY TRANSLATED
    "youtube-channel-extractor" => [
        "seo" => [
            "title" => "Free YouTube Channel Data Extractor - Get Channel Statistics | Optimizo",
            "description" => "Extract complete YouTube channel data including subscribers, views, videos count, description, and more. Free channel statistics extractor tool.",
        ],

        "form" => [
            "title" => "Extract Channel Data",
            "url_label" => "YouTube Channel URL",
            "url_help" => "Paste any YouTube channel URL (supports @handle, /c/, /channel/, or /user/ formats)",
            "submit" => "Extract Channel Data",
        ],

        "results" => [
            "success_title" => "Channel Data Extracted Successfully!",
        ],

        "js" => [
            "error_enter_url" => "Please enter a channel URL",
            "error_valid_url" => "Please enter a valid YouTube channel URL",
            "extracting" => "Extracting Data...",
            "error_failed" => "Failed to extract channel data. Please try again.",
            "channel_avatar" => "Channel Avatar",
            "channel_name" => "Channel Name",
            "subscribers" => "Subscribers",
            "total_videos" => "Total Videos",
            "total_views" => "Total Views",
            "channel_id" => "Channel ID",
            "channel_handle" => "Channel Handle",
            "joined_date" => "Joined Date",
            "description" => "Description",
            "channel_url" => "Channel URL",
            "copy" => "Copy",
            "copied" => "Copied!",
        ],

        "content" => [
            "main_title" => "YouTube Channel Data Extractor",
            "main_subtitle" => "Extract complete statistics and information from any YouTube channel",
            "description" => "Our free YouTube Channel Data Extractor helps you gather comprehensive statistics and information from any YouTube channel. Extract subscriber counts, video counts, total views, channel descriptions, and more in seconds. Perfect for competitor analysis, influencer research, market research, and partnership evaluation.",

            "feature_complete_stats_title" => "Complete Statistics",
            "feature_complete_stats_description" => "Get all channel metrics including subscribers, videos, and total views",
            "feature_instant_results_title" => "Instant Results",
            "feature_instant_results_description" => "Extract channel data in seconds with our fast processing",
            "feature_free_title" => "100% Free",
            "feature_free_description" => "No registration, no limits, completely free to use",

            "extractable_data_title" => " Extractable Channel Data",
            "data_statistics_title" => " Statistics",
            "data_subscriber_count" => "Subscriber Count",
            "data_subscriber_count_desc" => "Total channel

 subscribers",
            "data_video_count" => "Video Count",
            "data_video_count_desc" => "Total uploaded videos",
            "data_total_views" => "Total Views",
            "data_total_views_desc" => "Cumulative channel views",
            "data_join_date" => "Join Date",
            "data_join_date_desc" => "When the channel was created",

            "data_information_title" => "ℹ Channel Information",
            "data_channel_name" => "Channel Name",
            "data_channel_name_desc" => "Official channel name",
            "data_channel_handle" => "Channel Handle",
            "data_channel_handle_desc" => "Unique @handle identifier",
            "data_description" => "Description",
            "data_description_desc" => "Full channel description",
            "data_channel_id" => "Channel ID",
            "data_channel_id_desc" => "Unique YouTube channel identifier",

            "use_cases_title" => " Common Use Cases",
            "use_case_competitor_title" => "Competitor Analysis",
            "use_case_competitor_desc" => "Analyze competitor channels to understand their growth and strategy",
            "use_case_influencer_title" => "Influencer Research",
            "use_case_influencer_desc" => "Evaluate influencers for potential brand partnerships and collaborations",
            "use_case_market_title" => "Market Research",
            "use_case_market_desc" => "Study channel performance trends in your niche or industry",
            "use_case_partnership_title" => "Partnership Evaluation",
            "use_case_partnership_desc" => "Assess potential partners before collaboration opportunities",
            "use_case_growth_title" => "Growth Tracking",
            "use_case_growth_desc" => "Monitor channel growth over time for strategic insights",
            "use_case_content_title" => "Content Strategy",
            "use_case_content_desc" => "Learn from successful channels to improve your content approach",

            "pro_tips_title" => " Pro Tips: Using Channel Data Effectively",
            "pro_tip_1" => "Track competitor channels regularly to spot trends early",
            "pro_tip_2" => "Compare channels in your niche to find content gaps",
            "pro_tip_3" => "Use subscriber-to-view ratios to gauge engagement levels",
            "pro_tip_4" => "Monitor video upload frequency for competitive benchmarking",
            "pro_tip_5" => "Save channel data periodically to track growth over time",

            "faq_title" => " Frequently Asked Questions",
            "faq_q1" => "What channel data can I extract?",
            "faq_a1" => "Our tool extracts comprehensive channel information including subscriber count, total videos, total views, channel description, channel ID, handle, join date, and channel avatar. All data is publicly available information from YouTube.",
            "faq_q2" => "Do I need a YouTube API key?",
            "faq_a2" => "No! Our tool does not require any API keys or authentication. Simply paste the channel URL and get instant results completely free.",
            "faq_q3" => "Can I extract data from any YouTube channel?",
            "faq_a3" => "Yes, you can extract data from any public YouTube channel. The tool supports all channel URL formats including @handle, /c/, /channel/, and /user/ URLs.",
            "faq_q4" => "Is the extracted data accurate?",
            "faq_a4" => "Yes, all data is extracted directly from YouTube in real-time, ensuring accuracy. However, YouTube may round large numbers (e.g., showing 1.5M instead of exact counts).",
            "faq_q5" => "How can I use this data for my business?",
            "faq_a5" => "Channel data is valuable for competitor analysis, influencer partnerships, market research, content strategy planning, and tracking industry trends. Use it to make informed decisions about collaborations and content direction.",
            "requirements_title" => "Handle Requirements",
            "req1" => "3-30 characters long",
            "req2" => "Letters, numbers, dots, underscores, hyphens only",
            "req3" => "Must be unique across YouTube",
            "req4" => "Cannot contain spaces or special characters",
        ],
    ],
    // YouTube Video Downloader - FULLY TRANSLATED
    "youtube-video-downloader" => [
        "seo" => [
            "title" => "Free YouTube Video Downloader - Download Videos in HD | Optimizo",
            "description" => "Download YouTube videos in multiple quality options FREE. High quality downloads in 1080p, 720p, 480p, 360p, and MP3 audio. No registration required.",
        ],

        "content" => [
            "main_title" => "Free YouTube Video Downloader",
            "intro" => "Download YouTube videos easily with our free online video downloader. Choose from multiple quality options including Full HD (1080p), HD (720p), SD (480p), 360p, and MP3 audio format. No registration required, completely free, and works with all YouTube videos. Perfect for saving videos for offline viewing, creating compilations, or extracting audio for podcasts and music.",

            "feature1_title" => "Multiple Formats",
            "feature1_desc" => "Download in MP4, WebM, or extract MP3 audio from videos",
            "feature2_title" => "Fast Downloads",
            "feature2_desc" => "Quick processing and high-speed download links",
            "feature3_title" => "Safe & Secure",
            "feature3_desc" => "No malware, no viruses, completely safe to use",
        ],
    ],
    // YouTube Earnings Calculator - MINIMAL KEYS FOR JS
    "youtube-earnings-calculator" => [
        "seo" => [
            "title" => "YouTube Earnings Calculator - Estimate Your Revenue | Optimizo",
            "description" => "Calculate YouTube earnings based on views and CPM. Get instant daily, monthly, and yearly revenue estimates. Free earnings calculator for content creators.",
        ],

        "js" => [
            "error_views" => "Please enter valid daily views (must be 0 or greater)",
            "error_cpm" => "Please enter valid CPM (must be 0 or greater)",
        ],
    ],
    // YouTube Channel ID Finder - COMPREHENSIVE TRANSLATION KEYS

    // YouTube Channel Data Extractor - COMPREHENSIVE TRANSLATION KEYS
    "youtube-channel" => [
        "seo" => [
            "title" => "YouTube Channel Data Extractor - Get Channel Statistics & Info | Optimizo",
            "description" => "Extract complete YouTube channel data including subscriber count, video count, views, and more. Free tool for marketers, researchers, and content creators.",
        ],

        "form" => [
            "title" => "Extract Channel Data",
            "url_label" => "YouTube Channel URL",
            "url_placeholder" => "https://www.youtube.com/@channelname or https://www.youtube.com/c/channelname",
            "url_help" => "Paste any YouTube channel URL to extract its data",
            "submit" => "Extract Channel Data",
        ],

        "js" => [
            "error_enter_url" => "Please enter a YouTube channel URL",
            "error_valid_url" => "Please enter a valid YouTube channel URL",
            "extracting" => "Extracting Data...",
            "error_failed" => "Failed to extract channel data. Please try again.",
            "success_title" => "Channel Data Extracted Successfully!",
            "copy" => "Copy",
            "copied" => "Copied!",
        ],


        "stats" => [
            "title" => " Channel Statistics",
            "subscriber_count" => "Subscriber Count",
            "subscriber_count_desc" => "Total subscribers",
            "video_count" => "Video Count",
            "video_count_desc" => "Number of videos published",
            "total_views" => "Total Views",
            "total_views_desc" => "Lifetime channel views",
            "join_date" => "Join Date",
            "join_date_desc" => "When channel was created",
        ],

        "info" => [
            "title" => "ℹ Channel Information",
            "channel_name" => "Channel Name",
            "channel_name_desc" => "Official channel title",
            "channel_handle" => "Channel Handle",
            "channel_handle_desc" => "@username format",
            "description" => "Description",
            "description_desc" => "Full channel description",
            "channel_id" => "Channel ID",
            "channel_id_desc" => "Unique identifier",
        ],

        "use_cases" => [
            "case1" => "Competitor Analysis",
            "case1_desc" => "Research competitor channels to understand their growth and strategy",
            "case2" => "Influencer Research",
            "case2_desc" => "Evaluate influencers for collaboration and sponsorship opportunities",
            "case3" => "Market Research",
            "case3_desc" => "Analyze channel performance in your niche or industry",
            "case4" => "Partnership Evaluation",
            "case4_desc" => "Assess potential partners based on their channel metrics",
            "case5" => "Growth Tracking",
            "case5_desc" => "Monitor channel growth over time for benchmarking",
            "case6" => "Content Strategy",
            "case6_desc" => "Study successful channels to inform your content strategy",
        ],

        "pro_tips" => [
            "title" => " Pro Tips for Channel Analysis",
            "tip1" => "Compare multiple channels in your niche to identify growth patterns",
            "tip2" => "Track channel metrics over time to spot trends and opportunities",
            "tip3" => "Use subscriber-to-view ratios to gauge audience engagement",
            "tip4" => "Analyze channel descriptions for keyword and SEO insights",
            "tip5" => "Check join dates to understand channel maturity and growth rate",
        ],

        "faq" => [
            "title" => " Frequently Asked Questions",
            "q1" => "Do I need a YouTube API key?",
            "a1" => "No! Our tool works without any API keys. Simply paste the channel URL and get instant results.",
            "q2" => "What channel data can I extract?",
            "a2" => "You can extract subscriber count, total videos, total views, channel name, description, channel ID, custom URL, country, and join date.",
            "q3" => "Is this tool free to use?",
            "a3" => "Yes, completely free! Extract data from unlimited channels without any restrictions or hidden fees.",
            "q4" => "Can I use this for competitor analysis?",
            "a4" => "Absolutely! This tool is perfect for analyzing competitor channels, understanding their growth metrics, and identifying successful strategies in your niche.",
            "q5" => "Is there a limit on how many channels I can analyze?",
            "a5" => "No limits! Extract data from as many YouTube channels as you need, completely free. Perfect for comprehensive market research and competitive analysis.",
            "q6" => "What channel URL formats are supported?",
            "a6" => "We support all YouTube channel URL formats including @handle, /c/channelname, /channel/ID, and /user/username. Just paste any valid channel URL and we'll extract the data.",
        ],

        "results" => [
            "success_title" => "Channel Data Extracted Successfully!",
        ],
    ],


    // YouTube Video Downloader - COMPREHENSIVE TRANSLATION KEYS
    "youtube-downloader" => [
        "seo" => [
            "title" => "Free YouTube Video Downloader - Download Videos in HD | Optimizo",
            "description" => "Download YouTube videos for free in multiple formats and quality options. Fast, safe, and easy to use. No registration required.",
        ],

        "content" => [
            "main_title" => "Free YouTube Video Downloader",
            "main_description" => "Download YouTube videos easily with our free online video downloader. Choose from multiple quality options including Full HD (1080p), HD (720p), SD (480p), 360p, and MP3 audio format. No registration required, completely free, and works with all YouTube videos. Perfect for saving videos for offline viewing, creating compilations, or extracting audio for podcasts and music.",

            "feature1_title" => "Multiple Formats",
            "feature1_desc" => "Download in MP4, WebM, or extract MP3 audio from videos",
            "feature2_title" => "Fast Downloads",
            "feature2_desc" => "Quick processing and high-speed download links",
            "feature3_title" => "Safe & Secure",
            "feature3_desc" => "No malware, no viruses, completely safe to use",
        ],

        "js" => [
            "error_enter_url" => "Please enter a YouTube URL",
            "processing" => "Processing...",
            "error_failed" => "Failed to process video. Please try again.",
        ],
    ],


    // YouTube Earnings Calculator - Translation Keys


    // YouTube Video Data Extractor - Comprehensive Translation Keys
    "youtube-video-extractor" => [
        "seo" => [
            "title" => "YouTube Video Data Extractor - Get Complete Video Metadata | Optimizo",
            "description" => "Extract complete YouTube video data including title, description, tags, views, likes, and more. Free tool for content creators and marketers.",
        ],

        "form" => [
            "title" => "Extract YouTube Video Data",
            "url_label" => "YouTube Video URL",
            "url_help" => "Paste any YouTube video URL to extract all its metadata",
            "submit" => "Extract Video Data",
        ],

        "js" => [
            "error_enter_url" => "Please enter a YouTube URL",
            "error_valid_url" => "Please enter a valid YouTube URL",
            "extracting" => "Extracting Data...",
            "error_failed" => "Failed to extract video data. Please try again.",
            "video_thumbnail" => "Video Thumbnail",
            "video_title" => "Video Title",
            "channel_name" => "Channel Name",
            "views" => "Views",
            "likes" => "Likes",
            "publish_date" => "Publish Date",
            "duration" => "Duration",
            "video_id" => "Video ID",
            "description" => "Description",
            "tags" => "Tags",
            "copy" => "Copy",
            "copied" => "Copied!",
        ],

        "results" => [
            "success_title" => "Video Data Extracted Successfully!",
        ],

        "content" => [
            "main_title" => "Complete Video Data Extraction",
            "main_subtitle" => "Extract complete video data instantly",
            "description" => "Our free YouTube Video Data Extractor is the ultimate tool for content creators, digital marketers, SEO specialists, and researchers who need quick access to comprehensive video metadata. Extract complete video information including title, description, tags, views, likes, channel name, publish date, and thumbnail - all without using any YouTube API. Perfect for competitive analysis, content research, SEO optimization, and video marketing strategies.",

            "feature_complete_data_title" => "Complete Data Extraction",
            "feature_complete_data_description" => "Get all video metadata in one place - title, description, tags, views, likes, and more",
            "feature_easy_copy_title" => "Easy Copy Function",
            "feature_easy_copy_description" => "One-click copy buttons for title, description, and tags - perfect for content reuse",
            "feature_instant_results_title" => "Instant Results",
            "feature_instant_results_description" => "Get video data instantly without any API keys or registration required",

            "extractable_data_title" => "Extractable Data Fields",
            "data_content_title" => " Content Information",
            "data_video_title" => "Video Title",
            "data_video_title_desc" => "Full title with formatting",
            "data_description" => "Description",
            "data_description_desc" => "Complete video description",
            "data_tags" => "Tags",
            "data_tags_desc" => "All video tags for SEO analysis",
            "data_category" => "Category",
            "data_category_desc" => "Video category classification",

            "data_performance_title" => " Performance Metrics",
            "data_view_count" => "View Count",
            "data_view_count_desc" => "Total video views",
            "data_likes" => "Likes",
            "data_likes_desc" => "Number of likes received",
            "data_publish_date" => "Publish Date",
            "data_publish_date_desc" => "When video was uploaded",
            "data_duration" => "Duration",
            "data_duration_desc" => "Video length in minutes",

            "data_channel_title" => " Channel Details",
            "data_channel_name" => "Channel Name",
            "data_channel_name_desc" => "Creator's channel name",
            "data_channel_url" => "Channel URL",
            "data_channel_url_desc" => "Direct link to channel",
            "data_subscriber_count" => "Subscriber Count",
            "data_subscriber_count_desc" => "Channel subscribers",

            "data_visual_title" => " Visual Assets",
            "data_thumbnail" => "Thumbnail",
            "data_thumbnail_desc" => "Video thumbnail image",
            "data_resolutions" => "Multiple Resolutions",
            "data_resolutions_desc" => "HD, SD, HQ options",
            "data_avatar" => "Channel Avatar",
            "data_avatar_desc" => "Creator profile picture",

            "use_cases_title" => "Common Use Cases",
            "use_case_research_title" => "Content Research",
            "use_case_research_desc" => "Analyze competitor videos to understand successful content strategies",
            "use_case_seo_title" => "SEO Optimization",
            "use_case_seo_desc" => "Extract tags and keywords from high-performing videos to optimize your own content",
            "use_case_marketing_title" => "Marketing Analysis",
            "use_case_marketing_desc" => "Track video performance metrics and analyze engagement data",
            "use_case_creation_title" => "Content Creation",
            "use_case_creation_desc" => "Get inspiration from successful videos and understand what works",
            "use_case_competitive_title" => "Competitive Analysis",
            "use_case_competitive_desc" => "Study competitor strategies and identify successful patterns",
            "use_case_data_title" => "Data Collection",
            "use_case_data_desc" => "Gather video metadata for research and analysis projects",

            "pro_tips_title" => "Pro Tip: Competitive Analysis Strategy",
            "pro_tip_1" => "Extract data from top 10 videos in your niche to identify patterns",
            "pro_tip_2" => "Analyze tags used by successful creators for SEO insights",
            "pro_tip_3" => "Study video descriptions to understand effective copywriting",
            "pro_tip_4" => "Compare view-to-like ratios to gauge engagement quality",
            "pro_tip_5" => "Track publish dates to identify optimal posting times",

            "faq_title" => "Frequently Asked Questions",
            "faq_q1" => "Do I need a YouTube API key to use this tool?",
            "faq_a1" => "No! Our tool extracts publicly available video data without requiring any API keys, registration, or authentication. Simply paste the video URL and get instant results.",
            "faq_q2" => "What data can I extract from YouTube videos?",
            "faq_a2" => "You can extract comprehensive data including video title, description, tags, view count, likes, channel name, publish date, category, duration, thumbnail, and more. All data is displayed in an easy-to-read format with copy buttons.",
            "faq_q3" => "Can I use this for competitor analysis?",
            "faq_a3" => "Absolutely! This tool is perfect for competitive analysis. Extract data from competitor videos to understand their SEO strategy, content approach, and what makes their videos successful.",
            "faq_q4" => "Is there a limit on how many videos I can analyze?",
            "faq_a4" => "No limits! You can extract data from as many YouTube videos as you need, completely free. There are no daily limits, no registration required, and no hidden fees.",
            "faq_q5" => "Can I copy the extracted data?",
            "faq_a5" => "Yes! We provide one-click copy buttons for title, description, and tags. You can easily copy any data field and use it for your own content creation, research, or analysis purposes.",
        ],
    ],


    // YouTube Handle Checker - Comprehensive Translation Keys


    // YouTube Monetization Checker - Comprehensive Translation Keys
    "youtube-monetization-checker" => [
        "seo" => [
            "title" => "YouTube Monetization Checker - Check Channel Monetization Status | Optimizo",
            "description" => "Check if a YouTube channel is monetized. Free tool to verify monetization eligibility and requirements.",
        ],

        "form" => [
            "url_label" => "YouTube Channel URL or Handle",
            "url_placeholder" => "https://www.youtube.com/@channelname or @channelname",
            "url_help" => "Enter channel URL, handle (@username), or channel ID",
            "check_button" => "Check Monetization",
            "checking" => "Checking...",
        ],

        "results" => [
            "monetization_status" => "Monetization Status",
            "estimated_status" => "Estimated Status",
            "likely_monetized" => " Likely Monetized",
            "not_monetized" => " Not Monetized",
            "subscribers" => "subscribers",
            "note_title" => "Note:",
            "note_text" => "This tool estimates monetization based on public channel data. Actual monetization status can only be confirmed by the channel owner through YouTube Studio.",
        ],

        "js" => [
            "error_failed" => "Failed to check monetization status",
            "subscribers_text" => "subscribers",
            "likely_monetized" => " Likely Monetized",
            "not_monetized" => " Not Monetized",
        ],

        "content" => [
            "requirements_title" => " YouTube Partner Program Requirements (2024)",
            "req1_title" => " 1,000 Subscribers",
            "req1_desc" => "Minimum subscriber threshold needed to qualify for monetization",
            "req1_note" => "Important first milestone for YouTube Partner Program",
            "req2_title" => " 4,000 Watch Hours",
            "req2_desc" => "Must be accumulated in the last 12 months for long-form content",
            "req2_note" => "Or 10M Shorts views in 90 days as alternative",
            "req3_title" => " Google AdSense Account",
            "req3_desc" => "Valid and approved AdSense account linked to your channel",
            "req3_note" => "Required to receive payments from YouTube",
            "req4_title" => " Policy Compliance",
            "req4_desc" => "No active strikes, violations, or policy warnings",
            "req4_note" => "Full adherence to community and content guidelines",

            "revenue_title" => " YouTube Monetization Revenue Streams",
            "revenue1_title" => "Ad Revenue",
            "revenue1_desc" => "Display, overlay, skippable, and non-skippable video ads",
            "revenue2_title" => "Channel Memberships",
            "revenue2_desc" => "Monthly recurring payments for exclusive perks",
            "revenue3_title" => "Super Chat & Thanks",
            "revenue3_desc" => "Fan funding during live streams and on videos",
            "revenue4_title" => "YouTube Premium",
            "revenue4_desc" => "Share of subscription fees from Premium members",
            "revenue5_title" => "Merch Shelf",
            "revenue5_desc" => "Sell branded merchandise directly under videos",
            "revenue6_title" => "Sponsored Content",
            "revenue6_desc" => "Brand deals and sponsorship opportunities",

            "notice_title" => " Important Notice",
            "notice_text" => "This tool provides estimates based on publicly available channel data and YouTube Partner Program requirements. Actual monetization status can only be confirmed by the channel owner through YouTube Studio. Meeting minimum requirements does not guarantee approval - channels must maintain compliance with all YouTube policies, community guidelines, and advertiser-friendly content guidelines.",

            "faq_title" => " Frequently Asked Questions",
            "faq_q1" => "How accurate is the monetization check?",
            "faq_a1" => "Our tool provides highly accurate estimates (90%+ accuracy) based on public metrics and YouTube Partner Program requirements. However, only channel owners can confirm actual monetization status through YouTube Studio.",
            "faq_q2" => "Can I check any YouTube channel?",
            "faq_a2" => "Yes! You can check any public YouTube channel by entering its URL, handle (@username), or channel ID. Private or deleted channels cannot be analyzed.",
            "faq_q3" => "How long does monetization approval take?",
            "faq_a3" => "YouTube typically reviews applications within 1 month after you meet all requirements. Complex cases or high-volume periods may result in longer wait times (up to 2-3 months).",
            "faq_q4" => "What if my channel is rejected?",
            "faq_a4" => "If rejected, review YouTube's feedback, address any policy violations, and reapply after 30 days. Common rejection reasons include reused content, spam, misleading metadata, or policy violations.",
            "faq_q5" => "How much money can monetized channels make?",
            "faq_a5" => "Earnings vary greatly based on niche, audience demographics, CPM rates, and engagement. Average CPM ranges from $0.25 to $4.00 per 1,000 views, but can be much higher for premium niches like finance, tech, or business content.",
        ],
    ],


    // YouTube Tag Generator - Comprehensive Translation Keys

    // YouTube Video Tags Extractor - Comprehensive Translation Keys
]);
