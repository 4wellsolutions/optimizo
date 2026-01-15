&lt;?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app-&gt;make('Illuminate\Contracts\Console\Kernel')-&gt;bootstrap();

echo "=== All Tool Categories ===\n";
$allCategories = \App\Models\Category::where('type', 'tool')-&gt;orderBy('name')-&gt;get();
echo "Total: " . $allCategories-&gt;count() . "\n\n";

foreach ($allCategories as $cat) {
$totalTools = $cat-&gt;tools()-&gt;count();
$activeTools = $cat-&gt;tools()-&gt;where('is_active', true)-&gt;count();
echo "{$cat-&gt;name}: {$activeTools} active / {$totalTools} total tools\n";
}

echo "\n=== Categories with Active Tools (what dropdown shows) ===\n";
$activeCategories = \App\Models\Category::where('type', 'tool')
-&gt;whereHas('tools', function($query) {
$query-&gt;where('is_active', true);
})
-&gt;orderBy('name')
-&gt;get();

echo "Total: " . $activeCategories-&gt;count() . "\n\n";

foreach ($activeCategories as $cat) {
$activeTools = $cat-&gt;tools()-&gt;where('is_active', true)-&gt;count();
echo "{$cat-&gt;name}: {$activeTools} active tools\n";
}