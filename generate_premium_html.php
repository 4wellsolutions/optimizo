<?php

$data = json_decode(file_get_contents('detailed_report_data.json'), true);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool Structural Atlas - Final Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
            --primary: #6366f1;
            --success: #22c55e;
            --warning: #eab308;
            --danger: #ef4444;
            --text-main: #f8fafc;
            --text-dim: #94a3b8;
        }

        body {
            background: #0f172a;
            color: var(--text-main);
            font-family: "Outfit", sans-serif;
            margin: 0;
            padding: 2rem;
            line-height: 1.5;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 3rem;
            background: var(--glass-bg);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
        }

        h1 { margin: 0; font-size: 2.5rem; background: linear-gradient(to right, #818cf8, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .subtitle { color: var(--text-dim); margin-top: 0.5rem; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: var(--glass-bg);
            padding: 1.5rem;
            border-radius: 15px;
            border: 1px solid var(--glass-border);
            text-align: center;
        }

        .stat-value { font-size: 2rem; font-weight: 700; color: var(--primary); }
        .stat-label { font-size: 0.875rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em; }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.75rem;
        }

        th {
            text-align: left;
            padding: 1rem;
            color: var(--text-dim);
            font-weight: 600;
            font-size: 0.875rem;
        }

        tr {
            background: var(--glass-bg);
            transition: transform 0.2s, background 0.2s;
        }

        tr:hover {
            transform: scale(1.01);
            background: rgba(255, 255, 255, 0.08);
        }

        td {
            padding: 1rem;
            border-top: 1px solid var(--glass-border);
            border-bottom: 1px solid var(--glass-border);
        }

        td:first-child { border-left: 1px solid var(--glass-border); border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
        td:last-child { border-right: 1px solid var(--glass-border); border-top-right-radius: 10px; border-bottom-right-radius: 10px; }

        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-match { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
        .badge-mismatch { background: rgba(239, 68, 68, 0.2); color: #f87171; }

        .key-count { font-family: monospace; font-size: 1.1rem; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Tool Structural Atlas</h1>
            <p class="subtitle">Complete Verification of 145 Tools across 3 Locales</p>
        </header>';

$totalTools = count($data);
$perfectSyncEn = 0;
$perfectSyncRu = 0;
$perfectSyncEs = 0;

foreach ($data as $t) {
    if ($t['locales']['en']['status'] == 'Match')
        $perfectSyncEn++;
    if ($t['locales']['ru']['status'] == 'Match')
        $perfectSyncRu++;
    if ($t['locales']['es']['status'] == 'Match')
        $perfectSyncEs++;
}

$html .= '
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">' . $totalTools . '</div>
                <div class="stat-label">Total Tools</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">' . round(($perfectSyncEn / $totalTools) * 100) . '%</div>
                <div class="stat-label">EN Structural Parity</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">' . round(($perfectSyncRu / $totalTools) * 100) . '%</div>
                <div class="stat-label">RU Structural Parity</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">' . round(($perfectSyncEs / $totalTools) * 100) . '%</div>
                <div class="stat-label">ES Structural Parity</div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tool Name</th>
                    <th>Category</th>
                    <th>View Keys</th>
                    <th>English</th>
                    <th>Russian</th>
                    <th>Spanish</th>
                </tr>
            </thead>
            <tbody>';

foreach ($data as $t) {
    $html .= '<tr>
        <td><strong>' . $t['name'] . '</strong><br><small style="color:var(--text-dim)">' . $t['slug'] . '</small></td>
        <td><span class="badge" style="background:#334155">' . $t['category'] . '</span></td>
        <td class="key-count">' . $t['keys_in_view'] . '</td>';

    foreach (['en', 'ru', 'es'] as $loc) {
        $statusClass = $t['locales'][$loc]['status'] == 'Match' ? 'badge-match' : 'badge-mismatch';
        $html .= '<td>
            <div class="key-count">' . $t['locales'][$loc]['count'] . '</div>
            <span class="badge ' . $statusClass . '">' . $t['locales'][$loc]['status'] . '</span>
        </td>';
    }

    $html .= '</tr>';
}

$html .= '
            </tbody>
        </table>
    </div>
</body>
</html>';

file_put_contents('StructuralAtlas.html', $html);
echo "Premium HTML report generated: StructuralAtlas.html\n";
