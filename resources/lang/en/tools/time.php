<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Time Tools Translation Keys
    |--------------------------------------------------------------------------
    |
    | This file contains all translation keys for the Time tools category.
    |
    */

    // Epoch Time Converter
    'epoch-time-converter' => [
        'meta' => [
            'h1' => 'Epoch Time Converter',
        ],
        'seo' => [
            'title' => 'Epoch Time Converter - Unix Timestamp to Date & Date to Timestamp',
            'h1' => 'Epoch Time Converter',
            'description' => 'Convert Unix Epoch timestamps to human-readable dates and vice versa. Support for local time, GMT/UTC, and relative time with our free, instant converter.',
        ],
        'current_epoch' => [
            'title' => 'Current Unix Epoch Time',
            'subtitle' => 'The number of seconds since January 1st, 1970 UTC',
        ],
        'click_to_copy' => 'Click to copy',
        'timestamp_to_date' => [
            'title' => 'Epoch Timestamp to Date',
            'label' => 'Enter Timestamp',
            'placeholder' => 'e.g. 1696516200',
            'button' => 'Convert to Date',
            'result_gmt' => 'GMT / UTC',
            'result_local' => 'Your Local Time',
            'result_relative' => 'Relative',
        ],
        'date_to_timestamp' => [
            'title' => 'Date to Epoch Timestamp',
            'label' => 'Enter Date & Time',
            'checkbox' => 'Use GMT/UTC Time',
            'button' => 'Convert to Epoch',
            'result_title' => 'Unix Epoch',
        ],
        'content' => [
            'hero_title' => 'Deciphering the Unix Epoch',
            'hero_description' => 'Unix time (or Epoch time) is the system checking the heartbeat of the digital world. It tracks the number of seconds that have elapsed since the "Unix Epoch" — 00:00:00 UTC on 1 January 1970.',
            'why_title' => 'Why use Unix Time?',
            'efficiency_title' => 'Efficiency',
            'efficiency_desc' => 'Computers prefer simple integers over complex date strings. It\'s faster to process and store.',
            'universal_title' => 'Universal',
            'universal_desc' => 'It ignores timezones during storage. 1696516200 is the same moment in Tokyo as it is in New York.',
            'math_title' => 'Easy Math',
            'math_desc' => 'Calculating the difference between two dates is as simple as simple subtraction (A - B).',
            'code_title' => 'Get Current Epoch in Your Language',
            'apocalypse_title' => 'The Year 2038 Problem',
            'apocalypse_desc' => 'On January 19, 2038, 32-bit systems will run out of numbers to store the time, causing the "Unix Y2K". Most modern 64-bit systems are already safe for the next 292 billion years.',
            'faq_title' => 'Frequently Asked Questions',
        ],
        'faq' => [
            'q1' => 'What happens during a Leap Second?',
            'a1' => 'Unix time ignores leap seconds. It treats every day as containing exactly 86400 seconds. When a leap second occurs, the Unix time clock may appear to repeat a second or pause.',
            'q2' => 'Why 1970?',
            'a2' => 'It was an arbitrary date chosen by early Unix engineers provided a convenient starting point for the 32-bit signed integer implementation.',
        ],
    ],

    // Date to Unix Timestamp
    'date-to-unix' => [
        'meta' => [
            'h1' => 'Date to Unix Timestamp Converter',
        ],
        'seo' => [
            'title' => 'Date to Unix Timestamp Converter - Instant & Accurate',
            'h1' => 'Date to Unix Timestamp Converter',
            'description' => 'Convert any date and time into a Unix IP imestamp instantly. Supports both local time and UTC/GMT inputs for precise server-side scheduling and debugging.',
        ],
        'form' => [
            'title' => 'Select Date & Time',
            'date_label' => 'Date',
            'time_label' => 'Time',
            'local_time' => 'Use Local Time',
            'utc_mode' => 'Use UTC/GMT',
            'button' => 'Convert to Timestamp',
            'result_title' => 'UNIX TIMESTAMP',
            'result_subtitle' => 'Seconds since Jan 01 1970 (UTC)',
        ],
        'click_to_copy' => 'Click to copy',
        'content' => [
            'hero_title' => 'Convert Human Time to Machine Time',
            'hero_description' => 'Transform readable dates into precise Unix Timestamps. Essential for database queries, API parameters, and debugging code.',
            'mode_title' => 'Understanding the Modes',
            'local_title' => 'Local Mode',
            'local_desc' => 'Uses your browser\'s current timezone. Best for finding the timestamp of an event happening "here and now" or in your specific location.',
            'utc_title' => 'UTC Mode',
            'utc_desc' => 'Treats your input as Coordinated Universal Time (GMT). Essential when dealing with server logs or international event coordination.',
            'snippets_title' => 'Code Snippets for Generating Timestamps',
            'use_cases_title' => 'Common Use Cases',
            'use_case_1' => 'Setting expiration times for cookies or tokens.',
            'use_case_2' => 'Scheduling crons or database jobs.',
            'use_case_3' => 'Comparing dates efficiently in code logic.',
        ],
    ],

    // Unix Timestamp to Date
    'unix-to-date' => [
        'meta' => [
            'h1' => 'Unix Timestamp to Date Converter',
        ],
        'seo' => [
            'title' => 'Unix Timestamp to Date Converter - Readable DateTime Tool',
            'h1' => 'Unix Timestamp to Date Converter',
            'description' => 'Decode Unix Timestamps into human-readable dates. See the exact time in GMT, your local timezone, and ISO 8601 format instantly.',
        ],
        'form' => [
            'title' => 'Enter Unix Timestamp',
            'placeholder' => 'e.g. 1672531200',
            'button_now' => 'Use Now',
            'button_convert' => 'Convert to Date',
            'result_gmt' => 'GMT / UTC',
            'result_local' => 'Your Local Time',
            'result_iso' => 'ISO 8601 Format',
        ],
        'content' => [
            'hero_title' => 'Deciphering the Epoch',
            'hero_description' => 'Turn those cryptic 10-digit numbers back into concepts humans understand: years, months, days, and hours.',
            'formats_title' => 'Output Formats Explained',
            'format_gmt_title' => 'GMT/UTC',
            'format_gmt_example' => 'Fri, 01 Jan 2023 00:00:00 GMT',
            'format_gmt_desc' => 'The absolute time reference, unaffected by daylight saving or geographical location.',
            'format_iso_title' => 'ISO 8601',
            'format_iso_example' => '2023-01-01T00:00:00.000Z',
            'format_iso_desc' => 'The international standard format (YYYY-MM-DD), perfect for data exchange and APIs.',
            'format_local_title' => 'Your Local Time',
            'format_local_example' => 'Sun Jan 01 2023 00:00:00 GMT+0000',
            'format_local_desc' => 'Shows how it looks in your browser\'s local timezone',
            'reverse_title' => 'Reverse Process',
            'reverse_description' => 'Need to go the other way? Convert a human date back into a timestamp.',
            'reverse_button' => 'Go to Date to Timestamp Tool',
            'tip_title' => 'Developer Tip',
            'tip_desc' => 'If your timestamp has 13 digits instead of 10, it is in milliseconds! Our tool automatically detects and handles millisecond timestamps (common in JavaScript and Java) by converting them correctly.',
        ],
    ],

    // Local to UTC
    'local-to-utc' => [
        'meta' => [
            'h1' => 'Local Time to UTC Converter',
        ],
        'seo' => [
            'title' => 'Local Time to UTC Converter - Timezone Adjuster',
            'h1' => 'Local Time to UTC Converter',
            'description' => 'Convert your local time to UTC (Coordinated Universal Time). Essential for scheduling international calls and server logs synchronization.',
        ],
        'live_clocks' => [
            'local_title' => 'Your Local Time',
            'utc_title' => 'Current UTC Time',
            'loading' => 'Loading...',
            'utc_subtitle' => 'Coordinated Universal Time',
        ],
        'form' => [
            'title' => 'Convert Local Time',
            'subtitle' => 'Select a date and time in your local zone to see its UTC equivalent.',
            'label' => 'Enter Local Date & Time',
            'button' => 'Convert to UTC',
            'timezone_label' => 'Your Timezone:',
            'result_title' => 'UTC TIME',
            'result_subtitle' => 'Global Standard',
        ],
        'features' => [
            'instant_title' => 'Instant Conversion',
            'instant_desc' => 'No page reloads. Conversion happens locally in your browser immediately.',
            'timezone_title' => 'Auto-Detection',
            'timezone_desc' => 'We automatically detect your system\'s timezone for accurate local context.',
            'accurate_title' => 'DST Aware',
            'accurate_desc' => 'Calculations respect Daylight Saving Time shifts for your specific location.',
        ],
        'content' => [
            'why_title' => 'Why Convert to UTC?',
            'why_desc' => 'UTC (Coordinated Universal Time) is the primary time standard by which the world regulates clocks and time. It does not observe Daylight Saving Time, making it a stable reference point.',
            'utc_standard_title' => 'The Global Standard',
            'utc_standard_intro' => 'Developers, pilots, and scientists use UTC because:',
            'timezone_reason' => 'Timezones are Political: They change often based on laws.',
            'dst_reason' => 'DST is Confusing: Clocks jump forward and back, creating gaps or duplicates using local time.',
            'political_reason' => 'No Ambiguity: 10:00 UTC is the same moment everywhere in the universe.',
            'utc_immunity' => 'UTC is immune to these issues, providing a continuous, linear timescale.',
            'applications_title' => 'Real World Applications',
            'aviation_title' => 'Aviation & Shipping',
            'aviation_desc' => 'Flight plans and logs are always in UTC to prevent confusion across borders.',
            'servers_title' => 'Servers & Databases',
            'servers_desc' => 'Computers store logs in UTC so that an event in Tokyo aligns perfectly with an event in London.',
            'events_title' => 'Global Events',
            'events_desc' => 'Webinars and product launches are often announced in UTC or GMT to provide a single reference time.',
        ],
    ],

    // UTC to Local
    'utc-to-local' => [
        'meta' => [
            'h1' => 'UTC to Local Time Converter',
        ],
        'seo' => [
            'title' => 'UTC to Local Time Converter - Global Time Translator',
            'h1' => 'UTC to Local Time Converter',
            'description' => 'Quickly convert UTC/GMT time to your local timezone. Perfect for checking server logs, international meeting times, and global event schedules.',
        ],
        'form' => [
            'result_title' => 'Convert UTC to Local',
            'help_text' => 'Enter a date/time in UTC (GMT) to see what it is in your local timezone.',
            'label' => 'Enter UTC Date & Time',
            'button' => 'Convert to Local Time',
            'result_title_output' => 'YOUR LOCAL TIME',
            'example' => 'Example: 2023-11-25 14:30:00',
        ],
        'content' => [
            'hero_title' => 'Translate Global Time to Local Time',
            'hero_desc' => 'UTC is the language of servers and international standards. This tool translates it back into the time on your wall clock.',
            'why_title' => 'Why Servers Love UTC',
            'consistency_title' => 'Consistency',
            'consistency_desc' => 'UTC never changes for Daylight Saving Time.',
            'universality_title' => 'Universality',
            'universality_desc' => 'It works the same regardless of where the server is located.',
            'simplicity_title' => 'Simplicity',
            'simplicity_desc' => 'It avoids the "ambiguous hour" problem when clocks fall back.',
            'offsets_title' => 'How to Read Offsets',
            'offsets_intro' => 'When you convert UTC to local, you are applying an "Offset".',
            'offset_minus' => 'UTC-5 (e.g., New York EST) means local time is 5 hours behind UTC.',
            'offset_plus' => 'UTC+9 (e.g., Tokyo) means local time is 9 hours ahead of UTC.',
            'offset_half' => 'Some places like India use half-hour offsets (UTC+5:30).',
            'golden_rule_title' => 'The Golden Rule',
            'golden_rule_desc' => 'Always Store time in UTC. Only Display time in Local.',
        ],
    ],

    // Time Zone Converter
    'time-zone-converter' => [
        'meta' => [
            'h1' => 'Time Zone Converter',
        ],
        'seo' => [
            'title' => 'Time Zone Converter - Global Meeting Planner',
            'h1' => 'Time Zone Converter',
            'description' => 'Visualize time differences across the globe. Compare times between two cities or zones side-by-side. Ideal for arranging international meetings.',
        ],
        'form' => [
            'source_label' => 'Source Time',
            'target_label' => 'Target Time',
            'date_time_label' => 'Date & Time',
            'timezone_label' => 'Timezone',
            'result_label' => 'CONVERTED TIME',
            'default_time' => '-- : --',
            'result_subtitle' => 'Adjusted for Timezone Difference',
            'selected_time_label' => 'SELECTED TIME',
            'auto_calculated' => 'Auto-Calculated',
        ],
        'content' => [
            'hero_title' => 'Mastering Global Time',
            'hero_desc' => 'Schedule meetings, catch flights, and coordinate across continents without the headache. Our converter handles all the math.',
            'meeting_planner_title' => 'Global Meeting Planner',
            'precision_title' => 'Why Precision Matters',
            'business_title' => 'Business Meetings',
            'business_desc' => 'Avoid the embarrassment of calling a client at 3 AM.',
            'travel_title' => 'Travel Planning',
            'travel_desc' => 'Know exactly when your flight lands in local time.',
            'events_title' => 'Live Events',
            'events_desc' => 'Don\'t miss the start of a global livestream.',
            'tips_title' => 'Timezone Pro Tips',
            'tip1_title' => 'Watch out for DST',
            'tip1_desc' => 'Daylight Saving Time rules vary by country and change dates every year. Automatic converters are safer than mental math.',
            'tip2_title' => 'Use 24-Hour Format',
            'tip2_desc' => 'It removes ambiguity between AM and PM (e.g., is 12:00 midnight or noon?).',
            'tip3_title' => 'Check the Date',
            'tip3_desc' => 'When calling across the Pacific (e.g., US to Australia), it is often already tomorrow on the other side.',
            'faq_title' => 'Common Questions',
            'faq_q1' => 'Are GMT and UTC the same?',
            'faq_a1' => 'For most practical purposes, yes. UTC is the precise atomic standard, while GMT is the older solar-based standard. They are within a fraction of a second of each other.',
            'faq_q2' => 'Why do some zones have 30 or 45 minute offsets?',
            'faq_a2' => 'Political and geographical reasons. India (UTC+5:30) and Nepal (UTC+5:45) chose these offsets to better align solar noon with their longitude.',
        ],
    ],
];
