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

    private function downloadAndSaveImage($url)
    {
        try {
            $response = Http::get($url);
            if (!$response->successful()) {
                return null;
            }
            $contents = $response->body();

            $name = basename(parse_url($url, PHP_URL_PATH));
            if (empty($name)) {
                $name = uniqid() . '.jpg';
            }

            // Ensure extension
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if (empty($ext)) {
                $name .= '.jpg';
            }

            // Use the new public/images/Y/m/d structure
            $now = now();
            $directory = 'images/' . $now->format('Y/m/d');
            $filename = uniqid() . '_' . $name;
            $path = $directory . '/' . $filename;

            // Ensure directory exists in public disk
            if (!Storage::disk('public_folder')->exists($directory)) {
                Storage::disk('public_folder')->makeDirectory($directory);
            }

            // Save to public disk (public_folder points to public_path())
            Storage::disk('public_folder')->put($path, $contents);

            // Create Media Record
            $media = Media::create([
                'user_id' => auth()->id() ?? 1,
                'original_name' => $name,
                'filename' => $filename,
                'mime_type' => 'image/' . ($ext ?: 'jpeg'),
                'size' => strlen($contents),
                'path' => $path,
                'url' => asset($path)
            ]);

            return $media;

        } catch (\Exception $e) {
            \Log::error('Import image download failed: ' . $e->getMessage());
            return null;
        }
    }

    public function importXml(Request $request)
    {
        $request->validate([
            'xml_file' => 'required|file|mimes:xml,txt'
        ]);

        $file = $request->file('xml_file');
        $xmlContent = file_get_contents($file->getRealPath());

        try {
            $xml = simplexml_load_string($xmlContent, 'SimpleXMLElement', LIBXML_NOCDATA);
            $namespaces = $xml->getNamespaces(true);

            $count = 0;
            foreach ($xml->channel->item as $item) {
                $wp = $item->children($namespaces['wp']);
                $content = $item->children($namespaces['content']);

                // Only import posts
                if ((string) $wp->post_type !== 'post') {
                    continue;
                }

                $title = (string) $item->title;
                $slug = (string) $wp->post_name ?: Str::slug($title);
                $postContent = (string) $content->encoded;
                $status = (string) $wp->status === 'publish' ? 'published' : 'draft';
                $publishedAt = (string) $wp->post_date !== '0000-00-00 00:00:00' ? (string) $wp->post_date : now();

                // Create Post
                $post = Post::create([
                    'title' => $title,
                    'slug' => $slug . '-' . uniqid(),
                    'content' => $postContent,
                    'status' => $status,
                    'published_at' => $publishedAt,
                    'author_id' => auth()->id() ?? 1,
                    'meta_title' => $title,
                ]);

                $count++;
            }

            return back()->with('success', "Successfully imported {$count} posts. Please note: image downloading for XML is currently in progress.");

        } catch (\Exception $e) {
            return back()->with('error', 'XML Import failed: ' . $e->getMessage());
        }
    }
}
