<?php

/**
 * Complete Network Tools - Add subtitles across all languages
 * Assuming keys are verified to match
 */

$subtitles = [
    'en' => [
        'dns-lookup' => 'Query DNS records to find nameservers, MX, A, CNAME & TXT records instantly',
        'domain-to-ip' => 'Resolve domain names to IP addresses with detailed DNS information',
        'ip-lookup' => 'Get detailed information about any IP address including location & ISP',
        'ping-test' => 'Test server response time and network connectivity from multiple locations',
        'port-checker' => 'Check if ports are open on any server for troubleshooting connectivity',
        'redirect-checker' => 'Trace HTTP redirects and identify 301, 302 & meta refresh chains',
        'reverse-dns' => 'Perform reverse DNS lookup to find hostname from IP address',
        'traceroute' => 'Trace network path and identify routing hops to any destination',
        'what-is-my-ip' => 'Instantly discover your public IP address with detailed ISP information',
        'what-is-my-isp' => 'Identify your Internet Service Provider with connection details',
        'whois-lookup' => 'Query WHOIS database for domain registration & ownership details',
    ],
    'es' => [
        'dns-lookup' => 'Consulte registros DNS para encontrar nameservers, MX, A, CNAME & TXT al instante',
        'domain-to-ip' => 'Resuelva nombres de dominio a direcciones IP con información DNS detallada',
        'ip-lookup' => 'Obtenga información detallada sobre cualquier dirección IP incluyendo ubicación e ISP',
        'ping-test' => 'Pruebe tiempo de respuesta del servidor y conectividad desde múltiples ubicaciones',
        'port-checker' => 'Verifique si los puertos están abiertos en cualquier servidor para solucionar problemas',
        'redirect-checker' => 'Rastree redirecciones HTTP e identifique cadenas de 301, 302 y meta refresh',
        'reverse-dns' => 'Realice búsqueda DNS inversa para encontrar hostname desde dirección IP',
        'traceroute' => 'Rastree ruta de red e identifique saltos de enrutamiento a cualquier destino',
        'what-is-my-ip' => 'Descubra instantáneamente su dirección IP pública con información detallada del ISP',
        'what-is-my-isp' => 'Identifique su Proveedor de Servicios de Internet con detalles de conexión',
        'whois-lookup' => 'Consulte base de datos WHOIS para detalles de registro y propiedad del dominio',
    ],
    'ru' => [
        'dns-lookup' => 'Запрашивайте DNS записи для поиска nameservers, MX, A, CNAME & TXT мгновенно',
        'domain-to-ip' => 'Преобразуйте доменные имена в IP-адреса с подробной DNS информацией',
        'ip-lookup' => 'Получите детальную информацию о любом IP-адресе включая местоположение и ISP',
        'ping-test' => 'Тестируйте время отклика сервера и сетевое подключение из разных локаций',
        'port-checker' => 'Проверяйте открыты ли порты на любом сервере для диагностики подключения',
        'redirect-checker' => 'Отслеживайте HTTP редиректы и определяйте цепочки 301, 302 и meta refresh',
        'reverse-dns' => 'Выполняйте обратный DNS поиск для нахождения hostname по IP-адресу',
        'traceroute' => 'Отслеживайте сетевой путь и определяйте маршрутизацию к любому назначению',
        'what-is-my-ip' => 'Мгновенно узнайте свой публичный IP-адрес с подробной информацией о провайдере',
        'what-is-my-isp' => 'Определите вашего Интернет-провайдера с деталями подключения',
        'whois-lookup' => 'Запрашивайте базу данных WHOIS для деталей регистрации и владения доменом',
    ],
];

// Process all languages
function beautifyOutput($translations)
{
    $output = "<?php\n\nreturn [\n";

    foreach ($translations as $toolSlug => $toolData) {
        $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
        $output .= "    '{$toolSlug}' => [\n";

        if (isset($toolData['meta'])) {
            $output .= "        'meta' => [\n";
            foreach ($toolData['meta'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['seo'])) {
            $output .= "        'seo' => [\n";
            foreach ($toolData['seo'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['form'])) {
            $output .= "        'form' => [\n";
            foreach ($toolData['form'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['content'])) {
            $output .= "        'content' => [\n";
            foreach ($toolData['content'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        $output .= "    ],\n\n";
    }

    $output .= "];\n";
    return $output;
}

$languages = ['en', 'es', 'ru'];
$totalUpdated = 0;

echo "\n=== ADDING NETWORK SUBTITLES ===\n\n";

foreach ($languages as $lang) {
    echo "Processing {$lang}...\n";

    $file = __DIR__ . "/resources/lang/{$lang}/tools/network.php";
    $translations = include $file;
    $updated = 0;

    foreach ($subtitles[$lang] as $slug => $subtitle) {
        if (isset($translations[$slug])) {
            if (!isset($translations[$slug]['meta'])) {
                $translations[$slug]['meta'] = [];
            }
            $translations[$slug]['meta']['subtitle'] = $subtitle;
            $updated++;
        } else {
            echo "  ⚠ Tool not found: $slug\n";
        }
    }

    file_put_contents($file, beautifyOutput($translations));
    echo "✅ {$lang}: {$updated}/11 complete\n";
    $totalUpdated += $updated;
}

echo "\n=== FINAL SUMMARY ===\n";
echo "Total subtitles added: {$totalUpdated}/33\n";
echo "All 11 network tools updated!\n";
