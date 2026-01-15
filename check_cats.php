&lt;?php
// Simple category check script
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app-&gt;make(Illuminate\Contracts\Console\Kernel::class);
$kernel-&gt;bootstrap();

use Illuminate\Support\Facades\DB;

// Get all tool categories
$categories = DB::table('categories')
-&gt;where('type', 'tool')
-&gt;orderBy('name')
-&gt;get();

echo "Total tool categories: " . $categories-&gt;count() . "\n\n";

foreach ($categories as $cat) {
$totalTools = DB::table('tools')-&gt;where('category_id', $cat-&gt;id)-&gt;count();
$activeTools = DB::table('tools')-&gt;where('category_id', $cat-&gt;id)-&gt;where('is_active', 1)-&gt;count();
echo "{$cat-&gt;name}: {$activeTools} active / {$totalTools} total\n";
}

// Get categories with active tools (what the dropdown should show)
echo "\n--- Categories with active tools (dropdown) ---\n";
$result = DB::select("
SELECT c.name, COUNT(t.id) as active_count
FROM categories c
INNER JOIN tools t ON c.id = t.category_id
WHERE c.type = 'tool' AND t.is_active = 1
GROUP BY c.id, c.name
ORDER BY c.name
");

echo "Count: " . count($result) . "\n\n";
foreach ($result as $row) {
echo "{$row-&gt;name}: {$row-&gt;active_count} active tools\n";
}