<?php

$updates = [
    'de' => 'Sitemap-Validator',
    'es' => 'Validador de Sitemap',
    'fr' => 'Validateur de Sitemap',
    'it' => 'Validatore Sitemap',
    'pt' => 'Validador de Sitemap',
    'nl' => 'Sitemap Validator',
    'pl' => 'Walidator Mapy Strony',
    'ru' => 'Валидатор Sitemap',
    'tr' => 'Sitemap Doğrulayıcı',
    'zh' => 'Sitemap 验证器',
    'ja' => 'サイトマップバリデーター',
    'ko' => '사이트맵 검사기',
    'ar' => 'مدقق خريطة الموقع',
    'id' => 'Validator Sitemap',
    'vi' => 'Trình Xác thực Sitemap',
    'cs' => 'Validátor Sitemap',
    'da' => 'Sitemap Validator',
    'fi' => 'Sivustokartta Validaattori',
    'no' => 'Sitemap Validator',
    'ro' => 'Validare Sitemap',
    'sv' => 'Sitemap Validator'
];

foreach ($updates as $lang => $newTitle) {
    $path = "resources/lang/{$lang}/tools/seo.json";

    if (!file_exists($path)) {
        echo "Skipping {$lang}: File not found\n";
        continue;
    }

    $data = json_decode(file_get_contents($path), true);

    if (isset($data['sitemap-validator']['meta']['h1'])) {
        $data['sitemap-validator']['meta']['h1'] = $newTitle;
        file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo "Updated {$lang}\n";
    } else {
        echo "Skipping {$lang}: Key not found\n";
    }
}
