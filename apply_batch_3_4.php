<?php

$locales = ['ru', 'es'];
$category = 'development';
$tools = [
    'code-formatter' => [
        'ru' => [
            'meta' => [
                'title' => 'Форматирование кода онлайн - Бесплатно',
                'description' => 'Улучшите читаемость вашего кода мгновенно. Поддержка HTML, CSS, JS, JSON, XML, SQL, PHP.',
                'h1' => 'Форматирование кода онлайн',
                'subtitle' => 'Сделайте ваш код чистым и красивым'
            ],
            'editor' => [
                'label_language' => 'Язык',
                'label_indent' => 'Отступ',
                'btn_format' => 'Форматировать',
                'label_input' => 'Входящий код',
                'btn_clear' => 'Очистить',
                'ph_input' => '// Вставьте код здесь...',
                'label_output' => 'Результат',
                'btn_copy' => 'Копировать'
            ],
            'content' => [
                'hero_title' => 'Профессиональное форматирование кода',
                'p1' => 'Приведите в порядок запутанный код и улучшите его читаемость. Наш инструмент работает прямо в браузере.',
                'why_title' => 'Зачем форматировать код?',
                'why' => [
                    'read' => [
                        'title' => 'Читаемость',
                        'desc' => 'Код с правильными отступами легче понимать и поддерживать.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, вставьте код для форматирования',
                'success_format' => '✓ Код успешно отформатирован!',
                'success_copy' => '✓ Скопировано в буфер обмена!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Formateador de Código Online - Gratis',
                'description' => 'Mejora la legibilidad de tu código al instante. Soporta HTML, CSS, JS, JSON, XML, SQL, PHP.',
                'h1' => 'Formateador de Código Online',
                'subtitle' => 'Haz que tu código se vea limpio y profesional'
            ],
            'editor' => [
                'label_language' => 'Lenguaje',
                'label_indent' => 'Sangría',
                'btn_format' => 'Formatear Código',
                'label_input' => 'Código de Entrada',
                'btn_clear' => 'Limpiar',
                'ph_input' => '// Pega tu código aquí...',
                'label_output' => 'Código Formateado',
                'btn_copy' => 'Copiar'
            ],
            'content' => [
                'hero_title' => 'Formateador de Código Profesional',
                'p1' => 'Limpia el código desordenado y mejora su legibilidad. Nuestra herramienta procesa todo en tu navegador de forma privada.',
                'why_title' => '¿Por qué formatear el código?',
                'why' => [
                    'read' => [
                        'title' => 'Legibilidad',
                        'desc' => 'El código bien estructurado es más fácil de leer y mantener.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor pega algún código para formatear',
                'success_format' => '¡Código formateado con éxito!',
                'success_copy' => '¡Copiado al portapapeles!'
            ]
        ]
    ],
    'css-minifier' => [
        'ru' => [
            'meta' => [
                'title' => 'CSS Минификатор и Форматировщик - Бесплатно онлайн',
                'description' => 'Оптимизируйте CSS файлы для быстрой загрузки сайта. Сжатие и форматирование кода.',
                'h1' => 'CSS Минификатор и Форматировщик',
                'subtitle' => 'Ускорьте загрузку вашего сайта через оптимизацию стилей'
            ],
            'editor' => [
                'label_input' => 'CSS Ввод',
                'ph_input' => 'Вставьте ваш CSS код здесь...',
                'btn_minify' => 'Сжать CSS',
                'btn_beautify' => 'Форматировать CSS',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output' => 'Результат',
                'stats' => [
                    'original' => 'Исходный размер',
                    'minified' => 'Сжатый размер',
                    'saved' => 'Сэкономлено',
                    'compression' => 'Сжатие'
                ]
            ],
            'content' => [
                'hero_title' => 'Оптимизация CSS онлайн',
                'p1' => 'Наш минификатор удаляет лишние пробелы и комментарии, уменьшая вес файлов.',
                'what_title' => 'Что такое минификация CSS?',
                'what_desc' => 'Это процесс удаления необязательных символов из кода без изменения функциональности.'
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите CSS код',
                'success_minify' => '✓ CSS успешно сжат',
                'success_beautify' => '✓ CSS успешно отформатирован'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Minificador y Embellecedor CSS - Gratis Online',
                'description' => 'Optimiza tus archivos CSS para cargas más rápidas. Minifica y formatea tu código.',
                'h1' => 'Minificador y Embellecedor CSS',
                'subtitle' => 'Optimiza tus archivos de estilos para una web más rápida'
            ],
            'editor' => [
                'label_input' => 'Entrada CSS',
                'ph_input' => 'Pega tu código CSS aquí...',
                'btn_minify' => 'Minificar CSS',
                'btn_beautify' => 'Embellecer CSS',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output' => 'Salida CSS',
                'stats' => [
                    'original' => 'Tamaño Original',
                    'minified' => 'Tamaño Minificado',
                    'saved' => 'Ahorrado',
                    'compression' => 'Compresión'
                ]
            ],
            'content' => [
                'hero_title' => 'Optimización de CSS Online',
                'p1' => 'Nuestra herramienta comprime archivos eliminando espacios y comentarios innecesarios.',
                'what_title' => '¿Qué es la minificación CSS?',
                'what_desc' => 'Es el proceso de eliminar caracteres innecesarios del código para mejorar el rendimiento.'
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa código CSS para procesar',
                'success_minify' => '✓ CSS minificado con éxito',
                'success_beautify' => '✓ CSS embellecido con éxito'
            ]
        ]
    ],
    'html-minifier' => [
        'ru' => [
            'meta' => [
                'title' => 'HTML Минификатор и Бестифайер - Сжатие кода',
                'description' => 'Мгновенно сжимайте или форматируйте HTML код. Минификация для продакшена.',
                'h1' => 'HTML Минификатор и Бестифайер',
                'subtitle' => 'Оптимизируйте HTML разметку за один клик'
            ],
            'editor' => [
                'label_input' => 'HTML Ввод',
                'ph_input' => 'Вставьте ваш HTML код...',
                'btn_minify' => 'Минифицировать HTML',
                'btn_beautify' => 'Форматировать HTML',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать результат',
                'label_output' => 'Результат'
            ],
            'content' => [
                'about_title' => 'Что такое HTML минификатор?',
                'about_desc' => 'Это инструмент, который удаляет пробелы, комментарии и переносы строк, уменьшая размер файла без влияния на отображение в браузере.'
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите HTML код',
                'success_minify' => '✓ HTML успешно минифицирован!',
                'success_beautify' => '✓ HTML успешно отформатирован!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Minificador y Embellecedor HTML - Comprime tu código',
                'description' => 'Comprime o formatea código HTML al instante. Minificación para entornos de producción.',
                'h1' => 'Minificador y Embellecedor HTML',
                'subtitle' => 'Optimiza tu marcado HTML en un clic'
            ],
            'editor' => [
                'label_input' => 'Entrada HTML',
                'ph_input' => 'Pega tu código HTML aquí...',
                'btn_minify' => 'Minificar HTML',
                'btn_beautify' => 'Embellecer HTML',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar Resultado',
                'label_output' => 'Salida HTML'
            ],
            'content' => [
                'about_title' => '¿Qué es un minificador HTML?',
                'about_desc' => 'Es una herramienta que comprime el código eliminando caracteres como espacios y comentarios, logrando archivos más ligeros.'
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa código HTML',
                'success_minify' => '¡HTML minificado con éxito!',
                'success_beautify' => '¡HTML embellecido con éxito!'
            ]
        ]
    ],
    'js-minifier' => [
        'ru' => [
            'meta' => [
                'title' => 'JavaScript Минификатор - Оптимизация скриптов',
                'description' => 'Сжимайте и оптимизируйте JavaScript код для быстрой загрузки страниц.',
                'h1' => 'JavaScript Минификатор',
                'subtitle' => 'Максимальное сжатие ваших JS файлов'
            ],
            'editor' => [
                'label_input' => 'JS Ввод',
                'ph_input' => 'Вставьте ваш JavaScript код...',
                'btn_minify' => 'Сжать JS',
                'btn_beautify' => 'Форматировать JS',
                'btn_clear' => 'Очистить'
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите JavaScript код',
                'success_minify' => '✓ JavaScript успешно сжат',
                'success_beautify' => '✓ JavaScript успешно отформатирован'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Minificador de JavaScript - Optimiza tus scripts',
                'description' => 'Comprime y optimiza tu código JavaScript para una carga web más rápida.',
                'h1' => 'Minificador JavaScript',
                'subtitle' => 'Compresión máxima de tus archivos JS'
            ],
            'editor' => [
                'label_input' => 'Entrada JS',
                'ph_input' => 'Pega tu JavaScript aquí...',
                'btn_minify' => 'Minificar JS',
                'btn_beautify' => 'Embellecer JS',
                'btn_clear' => 'Limpiar'
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa código JavaScript',
                'success_minify' => '✓ JavaScript minificado con éxito',
                'success_beautify' => '✓ JavaScript embellecido con éxito'
            ]
        ]
    ],
    'xml-formatter' => [
        'ru' => [
            'meta' => [
                'title' => 'XML Форматировщик - Красивый вид кода',
                'description' => 'Форматируйте, делайте красивым или сжимайте XML данные бесплатно.',
                'h1' => 'XML Форматировщик',
                'subtitle' => 'Удобное отображение XML данных'
            ],
            'editor' => [
                'label_input' => 'XML Ввод',
                'ph_input' => '<root><child>значение</child></root>',
                'btn_format' => 'Форматировать / Приукрасить',
                'btn_minify' => 'Минифицировать',
                'btn_copy' => 'Копировать'
            ],
            'js' => [
                'success_format' => 'XML успешно отформатирован!',
                'error_invalid' => 'Некорректный XML',
                'success_minify' => 'XML успешно сжат!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Formateador XML - Visualización de código',
                'description' => 'Formatea, embellece o comprime tus datos XML de forma gratuita.',
                'h1' => 'Formateador XML',
                'subtitle' => 'Visualización amigable de datos XML'
            ],
            'editor' => [
                'label_input' => 'Entrada XML',
                'ph_input' => '<root><child>valor</child></root>',
                'btn_format' => 'Formatear / Embellecer',
                'btn_minify' => 'Minificar',
                'btn_copy' => 'Copiar'
            ],
            'js' => [
                'success_format' => '¡XML formateado con éxito!',
                'error_invalid' => 'XML no válido',
                'success_minify' => '¡XML minificado con éxito!'
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

echo "Batch 3.4 update completed.\n";
