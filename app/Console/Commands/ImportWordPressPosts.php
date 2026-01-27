<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class ImportWordPressPosts extends Command
{
    protected $signature = 'blog:import-wp {--db-host=localhost} {--db-name=} {--db-user=root} {--db-pass=} {--prefix=wp_}';

    protected $description = 'Import posts, categories, and tags from a WordPress database';

    public function handle()
    {
        $dbName = $this->option('db-name');
        if (!$dbName) {
            $dbName = $this->ask('Enter WordPress database name');
        }

        $host = $this->option('mobileki_wp933');
        $user = $this->option('mobileki_wp933');
        $pass = $this->option('2Oon#q2qi=pJbKAE');
        $prefix = $this->option('wpl0');

        // Configure temporary connection
        Config::set('database.connections.wordpress', [
            'driver' => 'mysql',
            'host' => $host,
            'database' => $dbName,
            'username' => $user,
            'password' => $pass,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ]);

        try {
            DB::connection('wordpress')->getPdo();
        } catch (\Exception $e) {
            $this->error('Could not connect to WordPress database: ' . $e->getMessage());
            return 1;
        }

        $this->info('Connected to WordPress database.');

        // Get default author
        $author = User::first();
        if (!$author) {
            $this->error('No users found in local database. Please create a user first.');
            return 1;
        }

        $wpPosts = DB::connection('wordpress')
            ->table($prefix . 'posts')
            ->where('post_type', 'post')
            ->where('post_status', 'publish')
            ->get();

        $this->info("Found {$wpPosts->count()} posts to import.");

        $bar = $this->output->createProgressBar($wpPosts->count());
        $bar->start();

        foreach ($wpPosts as $wpPost) {
            // 1. Create Post
            $post = Post::updateOrCreate(
                ['slug' => $wpPost->post_name],
                [
                    'title' => $wpPost->post_title,
                    'content' => $wpPost->post_content,
                    'excerpt' => $wpPost->post_excerpt ?: Str::limit(strip_tags($wpPost->post_content), 160),
                    'status' => 'published',
                    'published_at' => $wpPost->post_date,
                    'author_id' => $author->id,
                ]
            );

            // 2. Handle Categories and Tags
            $terms = DB::connection('wordpress')
                ->table($prefix . 'term_relationships as tr')
                ->join($prefix . 'term_taxonomy as tt', 'tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                ->join($prefix . 'terms as t', 'tt.term_id', '=', 't.term_id')
                ->where('tr.object_id', $wpPost->ID)
                ->select('t.name', 't.slug', 'tt.taxonomy')
                ->get();

            $categoryIds = [];
            $tagIds = [];

            foreach ($terms as $term) {
                if ($term->taxonomy === 'category') {
                    $category = BlogCategory::firstOrCreate(
                        ['slug' => $term->slug],
                        ['name' => $term->name]
                    );
                    $categoryIds[] = $category->id;
                } elseif ($term->taxonomy === 'post_tag') {
                    $tag = Tag::firstOrCreate(
                        ['slug' => $term->slug],
                        ['name' => $term->name]
                    );
                    $tagIds[] = $tag->id;
                }
            }

            $post->categories()->sync($categoryIds);
            $post->tags()->sync($tagIds);

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Import completed successfully!');

        return 0;
    }
}
