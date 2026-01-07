<?php

return [
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
    'youtube-channel-id-finder' => [
        'how_to_use' => [
            'title' => 'How to Use',
            'step1' => 'Enter YouTube channel URL or username',
            'step2' => 'Click "Find ID"',
            'step3' => 'Copy the channel ID for your use',
        ],
        'features' => [
            'title' => 'Features',
            'instant' => 'Instant results',
            'accurate' => 'Accurate ID detection',
            'free' => 'Completely free',
            'no_api' => 'No API key required',
        ],
        'use_cases' => [
            'title' => 'Use Cases',
            'case1' => 'YouTube API integration',
            'case2' => 'Channel analytics',
            'case3' => 'Channel verification',
            'case4' => 'YouTube automation',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'What is a YouTube Channel ID?',
            'a1' => 'A YouTube Channel ID is a unique identifier that YouTube assigns to each channel. It starts with "UC" and contains 24 characters.',
            'q2' => 'Why do I need a channel ID?',
            'a2' => 'Channel IDs are required for using the YouTube API, embedding channel widgets, and various integrations.',
            'q3' => 'Is this free?',
            'a3' => 'Yes, our tool is completely free and requires no registration.',
        ],
    ],

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
];
