# Tool Name & Title Storage Locations

You asked where titles and names are stored. They act as a "waterfall" - the system checks them in order and uses the first one found.

## 1. File-Based Translations (Priority)
Location: `resources/lang/{locale}/tools/{slug}.php` (e.g., `youtube.php`)
These are the preferred sources for translations.

*   `meta.h1` (Highest Priority): Intended for the **Short Name** of the tool (e.g., "YouTube Downloader").
*   `form.title` (Medium Priority): Usually the title above the input form (e.g., "Download YouTube Video"). Often short, but sometimes descriptive.
*   `seo.title` (Lowest Priority - **To Be Removed**): The long title for Google Search (e.g., "Free YouTube Video Downloader - 1080p Support"). This is what you strictly want to avoid showing on the page.

## 2. Database (Fallback)
Location: `tools` table in your database.
*   `name`: The default English name (e.g., "YouTube Video Downloader"). Used only if NO file-based translation is found.

## The Fix
I am changing the code to **ignore** `seo.title` when looking for a name. The new logic will be:
1.  Check `meta.h1` (Shortest)
2.  Check `form.title` (Short/Medium)
3.  Fallback to Database `name` (Short)

It will **never** accidentally show the long `seo.title` again.
