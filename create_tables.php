<?php
// Create all missing tables directly
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=optimizo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Creating missing tables...\n\n";

    // Categories table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `categories` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `slug` varchar(255) NOT NULL,
        `description` text DEFAULT NULL,
        `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `categories_slug_unique` (`slug`),
        KEY `categories_parent_id_index` (`parent_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Categories table created\n";

    // Tags table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `tags` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `slug` varchar(255) NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `tags_slug_unique` (`slug`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Tags table created\n";

    // Media table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `media` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `filename` varchar(255) NOT NULL,
        `original_name` varchar(255) NOT NULL,
        `mime_type` varchar(255) NOT NULL,
        `size` int(11) NOT NULL,
        `path` varchar(255) NOT NULL,
        `url` varchar(255) NOT NULL,
        `alt_text` varchar(255) DEFAULT NULL,
        `caption` text DEFAULT NULL,
        `user_id` bigint(20) UNSIGNED NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `media_user_id_index` (`user_id`),
        KEY `media_mime_type_index` (`mime_type`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Media table created\n";

    // Redirects table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `redirects` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `from_url` varchar(255) NOT NULL,
        `to_url` varchar(255) NOT NULL,
        `type` enum('301','302') NOT NULL DEFAULT '301',
        `status` tinyint(1) NOT NULL DEFAULT 1,
        `hits` int(11) NOT NULL DEFAULT 0,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `redirects_from_url_index` (`from_url`),
        KEY `redirects_status_index` (`status`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Redirects table created\n";

    // Settings table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `settings` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `key` varchar(255) NOT NULL,
        `value` text DEFAULT NULL,
        `type` enum('text','textarea','image','json') NOT NULL DEFAULT 'text',
        `group` varchar(255) NOT NULL DEFAULT 'general',
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `settings_key_unique` (`key`),
        KEY `settings_key_index` (`key`),
        KEY `settings_group_index` (`group`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Settings table created\n";

    // Post-Category pivot table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `post_category` (
        `post_id` bigint(20) UNSIGNED NOT NULL,
        `category_id` bigint(20) UNSIGNED NOT NULL,
        PRIMARY KEY (`post_id`,`category_id`),
        KEY `post_category_category_id_foreign` (`category_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Post-Category pivot table created\n";

    // Post-Tag pivot table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `post_tag` (
        `post_id` bigint(20) UNSIGNED NOT NULL,
        `tag_id` bigint(20) UNSIGNED NOT NULL,
        PRIMARY KEY (`post_id`,`tag_id`),
        KEY `post_tag_tag_id_foreign` (`tag_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    echo "✓ Post-Tag pivot table created\n";

    echo "\n✅ All tables created successfully!\n";
    echo "You can now access the admin panel at http://127.0.0.1:8000/admin/dashboard\n";

} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}
