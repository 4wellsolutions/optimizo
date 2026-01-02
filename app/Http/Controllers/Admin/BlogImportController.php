<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use voku\helper\HtmlDomParser;

class BlogImportController extends Controller
{
    public function index()
    {
        return view('admin.import.index');
    }

    public function indextest()
    {
        return view('admin.import.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            // Optional: allow user to specify a selector if auto-detection fails
            'selector' => 'nullable|string'
        ]);

        $url = $request->input('url');
        set_time_limit(300); // Allow 5 minutes for image downloads

        try {
            // 1. Fetch Page
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            ])->get($url);

            if (!$response->successful()) {
                return back()->with('error', 'Failed to fetch the URL. Status: ' . $response->status());
            }

            $html = $response->body();
            $dom = HtmlDomParser::str_get_html($html);

            // 2. Extract Data

            // Title: H1 is usually the best bet
            $titleNode = $dom->find('h1', 0);
            $title = $titleNode ? $titleNode->plaintext : '';

            if (empty($title)) {
                // Fallback to og:title
                $ogTitle = $dom->find('meta[property="og:title"]', 0);
                $title = $ogTitle ? $ogTitle->getAttribute('content') : 'Imported Post';
            }

            // Slug: Extract from URL or derive from title
            $path = parse_url($url, PHP_URL_PATH);
            $slug = Str::slug(basename($path));
            if (empty($slug))
                $slug = Str::slug($title);

            // Featured Image check
            $featuredImageUrl = null;
            $ogImage = $dom->find('meta[property="og:image"]', 0);
            if ($ogImage) {
                $featuredImageUrl = $ogImage->getAttribute('content');
            }

            // Content Extraction
            $contentNode = null;
            $selectors = ['.entry-content', '.post-content', 'article', '.content', '#content', '.blog-post'];

            if ($request->input('selector')) {
                array_unshift($selectors, $request->input('selector'));
            }

            foreach ($selectors as $selector) {
                $node = $dom->find($selector, 0);
                if ($node) {
                    $contentNode = $node;
                    break;
                }
            }

            if (!$contentNode) {
                return back()->with('error', 'Could not auto-detect content. Please provide a CSS selector.');
            }

            // 3. Process Content & Images
            // Retrieve the HTML content
            $contentHtml = $contentNode->innertext;

            // Re-parse just the content to manipulate images safely
            $contentDom = HtmlDomParser::str_get_html($contentHtml);
            $images = $contentDom->find('img');

            foreach ($images as $img) {
                $src = $img->getAttribute('src');

                // Handle relative URLs
                if (!filter_var($src, FILTER_VALIDATE_URL)) {
                    $src = $this->resolveUrl($url, $src);
                }

                if ($src) {
                    $localMedia = $this->downloadAndSaveImage($src);
                    if ($localMedia) {
                        $img->setAttribute('src', $localMedia->url);
                        // Remove srcset/sizes to force browser to use new src
                        $img->removeAttribute('srcset');
                        $img->removeAttribute('sizes');
                        // Add class for styling
                        $currentClass = $img->getAttribute('class');
                        $img->setAttribute('class', trim($currentClass . ' img-fluid'));
                    }
                }
            }

            $finalContent = $contentDom->html();

            // 4. Handle Featured Image
            $localFeaturedImage = null;
            if ($featuredImageUrl) {
                $media = $this->downloadAndSaveImage($featuredImageUrl);
                if ($media) {
                    $localFeaturedImage = $media->url;
                }
            }

            // 5. Create Post
            $post = Post::create([
                'title' => trim($title),
                'slug' => $slug . '-' . uniqid(), // Avoid collision
                'content' => $finalContent,
                'featured_image' => $localFeaturedImage,
                'status' => 'draft', // Draft by default for review
                'meta_title' => trim($title),
                'author_id' => auth()->id() ?? 1,
            ]);

            return redirect()->route('admin.posts.edit', $post->id)
                ->with('success', 'Blog imported successfully! Please review.');

        } catch (\Exception $e) {
            return back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }

    private function resolveUrl($baseUrl, $relativeUrl)
    {
        if (parse_url($relativeUrl, PHP_URL_SCHEME) != '')
            return $relativeUrl;

        // Simple resolution (can be improved)
        return rtrim($baseUrl, '/') . '/' . ltrim($relativeUrl, '/');
    }

    private function downloadAndSaveImage($url)
    {
        try {
            $contents = Http::get($url)->body();
            if (!$contents)
                return null;

            $name = basename(parse_url($url, PHP_URL_PATH));
            if (empty($name))
                $name = uniqid() . '.jpg';

            // Ensure extension
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if (empty($ext)) {
                $name .= '.jpg';
            }

            $filename = 'imported/' . uniqid() . '_' . $name;

            // Save to public disk
            // Assuming 'public' disk is configured to link to valid public URL
            $path = Storage::disk('public')->put($filename, $contents);

            if (!$path)
                return null;

            // Create Media Record
            $media = Media::create([
                'user_id' => auth()->id() ?? 1,
                'original_name' => $name,
                'filename' => $filename,
                'mime_type' => 'image/' . (pathinfo($name, PATHINFO_EXTENSION) ?: 'jpeg'),
                'size' => strlen($contents),
                'path' => $filename,
                'url' => Storage::url($filename)
            ]);

            return $media;

        } catch (\Exception $e) {
            // Log error but continue
            return null;
        }
    }
}
