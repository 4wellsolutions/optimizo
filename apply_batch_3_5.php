<?php

$locales = ['ru', 'es'];
$category = 'development';
$tools = [
    'base64-encoder-decoder' => [
        'ru' => [
            'meta' => [
                'title' => 'Base64 Энкодер и Декодер - Бесплатно онлайн',
                'description' => 'Кодируйте и декодируйте данные Base64 мгновенно. Поддержка текста и бинарных данных.',
                'h1' => 'Base64 Энкодер и Декодер',
                'subtitle' => 'Мгновенное преобразование текста в Base64 и обратно'
            ],
            'editor' => [
                'tab_encode' => 'Закодировать в Base64',
                'tab_decode' => 'Декодировать из Base64',
                'label_encode' => 'Введите текст для кодирования',
                'ph_encode' => 'Введите ваш текст здесь...',
                'btn_encode' => 'Закодировать',
                'label_decode' => 'Введите Base64 для декодирования',
                'ph_decode' => 'Введите Base64 строку...',
                'btn_decode' => 'Декодировать',
                'result_title' => 'Результат',
                'btn_copy' => 'Копировать результат'
            ],
            'content' => [
                'what_title' => 'Что такое Base64 кодирование?',
                'what_desc' => 'Base64 — это схема кодирования бинарных данных в текстовый формат ASCII. Она широко используется для передачи данных через среды, предназначенные для работы с текстом.',
                'features' => [
                    'secure' => [
                        'title' => 'Безопасно',
                        'desc' => 'Все операции выполняются в вашем браузере.'
                    ],
                    'instant' => [
                        'title' => 'Мгновенно',
                        'desc' => 'Преобразование за миллисекунды.'
                    ]
                ]
            ],
            'js' => [
                'error_empty_encode' => 'Пожалуйста, введите текст для кодирования',
                'error_empty_decode' => 'Пожалуйста, введите Base64 строку',
                'error_invalid' => 'Некорректная строка Base64.',
                'copied' => 'Скопировано!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Codificador y Decodificador Base64 - Online Gratis',
                'description' => 'Codifica y decodifica datos Base64 al instante. Soporta texto y datos binarios de forma rápida.',
                'h1' => 'Codificador y Decodificador Base64',
                'subtitle' => 'Convierte texto a Base64 y viceversa al instante'
            ],
            'editor' => [
                'tab_encode' => 'Codificar a Base64',
                'tab_decode' => 'Decodificar de Base64',
                'label_encode' => 'Ingresa texto para codificar',
                'ph_encode' => 'Escribe tu texto aquí...',
                'btn_encode' => 'Codificar',
                'label_decode' => 'Ingresa Base64 para decodificar',
                'ph_decode' => 'Pega tu cadena Base64...',
                'btn_decode' => 'Decodificar',
                'result_title' => 'Resultado',
                'btn_copy' => 'Copiar Resultado'
            ],
            'content' => [
                'what_title' => '¿Qué es la codificación Base64?',
                'what_desc' => 'Base64 es un sistema de codificación que representa datos binarios en un formato de texto ASCII.',
                'features' => [
                    'secure' => [
                        'title' => 'Seguro',
                        'desc' => 'Todo el proceso ocurre en tu navegador.'
                    ]
                ]
            ],
            'js' => [
                'error_empty_encode' => 'Por favor ingresa texto para codificar',
                'error_empty_decode' => 'Por favor ingresa una cadena Base64',
                'error_invalid' => 'Cadena Base64 no válida.',
                'copied' => '¡Copiado!'
            ]
        ]
    ],
    'cron-job-generator' => [
        'ru' => [
            'meta' => [
                'title' => 'Генератор Cron Job - Создание расписаний',
                'description' => 'Удобный визуальный конструктор заданий Cron. Забудьте о сложном синтаксисе.',
                'h1' => 'Генератор Cron Job',
                'subtitle' => 'Создавайте расписания Cron без труда'
            ],
            'editor' => [
                'common_settings' => 'Общие настройки',
                'choose' => '-- Выбрать --',
                'options' => [
                    'every_minute' => 'Каждую минуту (* * * * *)',
                    'every_5_minutes' => 'Каждые 5 минут (*/5 * * * *)',
                    'every_hour' => 'Каждый час (0 * * * *)'
                ],
                'minute' => 'Минута',
                'hour' => 'Час',
                'day' => 'День',
                'month' => 'Месяц',
                'weekday' => 'День недели',
                'command' => 'Команда для запуска',
                'btn_copy' => 'Копировать Cron',
                'btn_clear' => 'Сброс'
            ],
            'js' => [
                'success_copy' => '✓ Выражение Cron скопировано!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Generador de Cron Job - Crea horarios fácilmente',
                'description' => 'Constructor visual de tareas Cron. Genera expresiones sin memorizar el código.',
                'h1' => 'Generador de Cron Job',
                'subtitle' => 'Crea programas Cron visualmente y sin errores'
            ],
            'editor' => [
                'common_settings' => 'Ajustes comunes',
                'choose' => '-- Seleccionar --',
                'options' => [
                    'every_minute' => 'Cada minuto (* * * * *)',
                    'every_5_minutes' => 'Cada 5 minutos (*/5 * * * *)',
                    'every_hour' => 'Cada hora (0 * * * *)'
                ],
                'minute' => 'Minuto',
                'hour' => 'Hora',
                'day' => 'Día',
                'month' => 'Mes',
                'weekday' => 'Día de la semana',
                'command' => 'Comando a ejecutar',
                'btn_copy' => 'Copiar Cron',
                'btn_clear' => 'Reiniciar'
            ],
            'js' => [
                'success_copy' => '¡Expresión Cron copiada con éxito!'
            ]
        ]
    ],
    'html-viewer' => [
        'ru' => [
            'meta' => [
                'title' => 'HTML Вьювер - Просмотр кода онлайн',
                'description' => 'Мгновенный предпросмотр HTML кода в реальном времени. Удобно для отладки верстки.',
                'h1' => 'HTML Вьювер',
                'subtitle' => 'Живой просмотр HTML разметки'
            ],
            'editor' => [
                'label_input' => 'HTML Код',
                'ph_input' => 'Введите ваш HTML код здесь...',
                'btn_clear' => 'Очистить',
                'btn_load_sample' => 'Пример',
                'label_preview' => 'Предпросмотр',
                'btn_fullscreen' => 'Полный экран'
            ],
            'content' => [
                'about_title' => 'Что такое HTML Вьювер?',
                'about_desc' => 'Это мощный инструмент, который позволяет визуализировать HTML код мгновенно по мере его ввода.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Visor HTML - Previsualiza código online',
                'description' => 'Previsualización de código HTML en tiempo real. Ideal para diseñadores y desarrolladores.',
                'h1' => 'Visor HTML',
                'subtitle' => 'Vista previa en vivo de tu marcado HTML'
            ],
            'editor' => [
                'label_input' => 'Código HTML',
                'ph_input' => 'Ingresa tu código HTML aquí...',
                'btn_clear' => 'Limpiar',
                'btn_load_sample' => 'Cargar Ejemplo',
                'label_preview' => 'Vista Previa',
                'btn_fullscreen' => 'Pantalla Completa'
            ],
            'content' => [
                'about_title' => '¿Qué es un Visor HTML?',
                'about_desc' => 'Es una herramienta que te permite visualizar el resultado de tu código HTML de forma instantánea.'
            ]
        ]
    ],
    'json-formatter' => [
        'ru' => [
            'meta' => [
                'title' => 'JSON Форматировщик - Приукрасить и проверить',
                'description' => 'Форматируйте, валидируйте и минифицируйте JSON данные бесплатно онлайн.',
                'h1' => 'JSON Форматировщик',
                'subtitle' => 'Сделайте ваш JSON читаемым и валидным'
            ],
            'editor' => [
                'btn_format' => 'Форматировать и приукрасить',
                'btn_minify' => 'Минифицировать JSON',
                'label_input' => 'Введите JSON данные',
                'btn_copy' => 'Копировать JSON'
            ],
            'js' => [
                'error_empty_format' => 'Пожалуйста, введите JSON для форматирования',
                'error_invalid' => 'Невалидный JSON: ',
                'success_copy' => 'Скопировано!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Formateador JSON - Embellecer y Validar',
                'description' => 'Formatea, valida y minifica tus datos JSON de forma gratuita online.',
                'h1' => 'Formateador JSON',
                'subtitle' => 'Haz que tu JSON sea legible y válido al instante'
            ],
            'editor' => [
                'btn_format' => 'Formatear y Embellecer',
                'btn_minify' => 'Minificar JSON',
                'label_input' => 'Ingresa datos JSON',
                'btn_copy' => 'Copiar JSON'
            ],
            'js' => [
                'error_empty_format' => 'Por favor ingresa JSON para formatear',
                'error_invalid' => 'JSON no válido: ',
                'success_copy' => '¡Copiado!'
            ]
        ]
    ],
    'json-parser' => [
        'ru' => [
            'meta' => [
                'title' => 'JSON Парсер и Валидатор - Анализ структур',
                'description' => 'Разбирайте, проверяйте и визуализируйте структуру JSON в виде дерева.',
                'h1' => 'JSON Парсер и Валидатор',
                'subtitle' => 'Инструмент для глубокого анализа JSON'
            ],
            'editor' => [
                'btn_parse' => 'Разобраться (Parse)',
                'title_tree' => 'Дерево JSON'
            ],
            'content' => [
                'features' => [
                    'tree' => [
                        'title' => 'Древовидный вид',
                        'desc' => 'Визуализируйте структуру JSON в удобном формате.'
                    ]
                ]
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Analizador y Validador JSON - Análisis de estructuras',
                'description' => 'Analiza, valida y visualiza la estructura JSON en forma de árbol.',
                'h1' => 'Analizador y Validador JSON',
                'subtitle' => 'Herramienta para el análisis profundo de JSON'
            ],
            'editor' => [
                'btn_parse' => 'Analizar (Parse)',
                'title_tree' => 'Vista de Árbol JSON'
            ],
            'content' => [
                'features' => [
                    'tree' => [
                        'title' => 'Vista de Árbol',
                        'desc' => 'Visualiza la estructura jerárquica de tu JSON.'
                    ]
                ]
            ]
        ]
    ]
];

foreach ($locales as $locale) {
    $filePath = "resources/lang/$locale/tools/$category.json";
    if (!file_exists($filePath)) {
        continue;
    }
    $currentData = json_decode(file_get_contents($filePath), true);
    foreach ($tools as $slug => $langs) {
        if (isset($langs[$locale])) {
            $currentData[$slug] = array_merge($currentData[$slug] ?? [], $langs[$locale]);
        }
    }
    file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "Updated $filePath\n";
}

echo "Batch 3.5 update completed.\n";
