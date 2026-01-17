<?php

$locales = ['ru', 'es'];
$category = 'development';
$tools = [
    'json-to-yaml-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер JSON в YAML - Бесплатно онлайн',
                'description' => 'Мгновенно преобразуйте JSON в формат YAML. Идеально для конфигурационных файлов Docker и Kubernetes.',
                'h1' => 'Конвертер JSON в YAML',
                'subtitle' => 'Профессиональный инструмент для трансформации данных'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать',
                'btn_copy' => 'Копировать YAML',
                'label_input' => 'JSON на входе',
                'ph_input' => 'Вставьте ваш JSON здесь...',
                'label_output' => 'YAML на выходе',
                'ph_output' => 'Результат появится здесь...'
            ],
            'content' => [
                'hero_title' => 'JSON в YAML Конвертер',
                'p1' => 'Этот инструмент позволяет быстро переводить данные из JSON в YAML. YAML часто используется в DevOps и системном администрировании благодаря своей читаемости.',
                'features' => [
                    'fast' => [
                        'title' => 'Быстрая конвертация',
                        'desc' => 'Результат за миллисекунды.'
                    ],
                    'secure' => [
                        'title' => 'Безопасно',
                        'desc' => 'Все операции выполняются в вашем браузере.'
                    ]
                ],
                'uses' => [
                    'docker' => [
                        'title' => 'Docker',
                        'desc' => 'Создание Docker Compose файлов из JSON конфигов.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите JSON текст',
                'success_convert' => 'JSON успешно преобразован в YAML!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de JSON a YAML - Gratis Online',
                'description' => 'Convierte JSON a formato YAML al instante. Ideal para archivos de configuración de Docker y Kubernetes.',
                'h1' => 'Convertidor JSON a YAML',
                'subtitle' => 'La mejor herramienta para desarrolladores y profesionales IT'
            ],
            'editor' => [
                'btn_convert' => 'Convertir',
                'btn_copy' => 'Copiar YAML',
                'label_input' => 'Entrada JSON',
                'ph_input' => 'Pega tu JSON aquí...',
                'label_output' => 'Salida YAML',
                'ph_output' => 'El YAML aparecerá aquí...'
            ],
            'content' => [
                'hero_title' => 'Convertidor JSON a YAML',
                'p1' => 'Nuestra herramienta te permite transformar datos JSON a YAML de forma sencilla. El formato YAML es preferido por su legibilidad en archivos de configuración.',
                'features' => [
                    'fast' => [
                        'title' => 'Conversión Rápida',
                        'desc' => 'Convierte datos en milisegundos.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa un texto en JSON',
                'success_convert' => '¡JSON convertido a YAML con éxito!'
            ]
        ]
    ],
    'sql-to-json' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер SQL в JSON - Бесплатно онлайн',
                'description' => 'Преобразуйте SQL INSERT инструкции в массив JSON объектов. Идеально для миграции данных в NoSQL БД.',
                'h1' => 'Конвертер SQL в JSON',
                'subtitle' => 'Создание JSON структур из SQL дампов'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать в JSON',
                'label_input' => 'SQL INSERT Запрос',
                'ph_input' => 'INSERT INTO table (col1) VALUES (val1);',
                'label_output' => 'JSON Результат',
                'btn_copy' => 'Копировать'
            ],
            'content' => [
                'hero_title' => 'SQL в JSON Трансформер',
                'p1' => 'Позволяет быстро перевести реляционные данные в формат JSON для использования в веб-приложениях.',
                'faq' => [
                    'q1' => 'Какие форматы поддерживаются?',
                    'a1' => 'Стандартные INSERT запросы с именами колонок.'
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите SQL INSERT запрос',
                'success_convert' => '✓ SQL успешно конвертирован в JSON'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de SQL a JSON - Gratis Online',
                'description' => 'Convierte sentencias SQL INSERT en arreglos de objetos JSON. Ideal para migraciones a bases de datos NoSQL.',
                'h1' => 'Convertidor SQL a JSON',
                'subtitle' => 'Crea estructuras JSON desde volcados SQL'
            ],
            'editor' => [
                'btn_convert' => 'Convertir a JSON',
                'label_input' => 'Sentencia SQL INSERT',
                'ph_input' => 'INSERT INTO tabla (col1) VALUES (val1);',
                'label_output' => 'Resultado JSON',
                'btn_copy' => 'Copiar'
            ],
            'content' => [
                'hero_title' => 'Transformador SQL a JSON',
                'p1' => 'Traduce rápidamente datos relacionales a formato JSON para su uso en aplicaciones modernas.',
                'faq' => [
                    'q1' => '¿Qué formatos soporta?',
                    'a1' => 'Soporta sentencias INSERT estándar con nombres de columnas.'
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa una sentencia SQL INSERT',
                'success_convert' => '✓ SQL convertido a JSON con éxito'
            ]
        ]
    ],
    'xml-to-csv' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер XML в CSV - Для Excel и Таблиц',
                'description' => 'Бесплатно преобразуйте XML данные в табличный формат CSV. Удобно для анализа в Excel и Google Sheets.',
                'h1' => 'Конвертер XML в CSV',
                'subtitle' => 'Превратите структурированный XML в плоский CSV'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать в CSV',
                'label_input' => 'Введите XML',
                'label_output' => 'CSV Результат',
                'btn_copy' => 'Копировать'
            ],
            'content' => [
                'p1' => 'Наш инструмент извлекает данные из XML и сохраняет их в формате с разделением запятыми.',
                'uses' => [
                    'analysis' => [
                        'title' => 'Анализ данных',
                        'desc' => 'Импорт XML отчетов в Excel для дальнейшей обработки.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите данные XML',
                'success_convert' => '✓ XML успешно конвертирован в CSV'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de XML a CSV - Para Excel y Tablas',
                'description' => 'Convierte datos XML a formato tabular CSV de forma gratuita. Ideal para análisis en Excel y Google Sheets.',
                'h1' => 'Convertidor XML a CSV',
                'subtitle' => 'Transforma XML estructurado en un CSV plano'
            ],
            'editor' => [
                'btn_convert' => 'Convertir a CSV',
                'label_input' => 'Ingresa XML',
                'label_output' => 'Resultado CSV',
                'btn_copy' => 'Copiar'
            ],
            'content' => [
                'p1' => 'Nuestra herramienta extrae datos de archivos XML y los guarda en formato de valores separados por comas.',
                'uses' => [
                    'analysis' => [
                        'title' => 'Análisis de datos',
                        'desc' => 'Importa informes XML a Excel para su procesamiento.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa datos XML',
                'success_convert' => '✓ XML convertido a CSV con éxito'
            ]
        ]
    ],
    'xml-to-json' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер XML в JSON - Бесплатно онлайн',
                'description' => 'Преобразуйте XML документы в чистый JSON формат. Поддержка атрибутов и вложенных структур.',
                'h1' => 'Конвертер XML в JSON',
                'subtitle' => 'Мгновенная трансформация XML в JavaScript объекты'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать в JSON',
                'label_input' => 'Входящий XML',
                'label_output' => 'JSON Результат',
                'btn_copy' => 'Копировать JSON'
            ],
            'content' => [
                'h2' => 'Бесплатный XML в JSON конвертер',
                'p1' => 'XML был стандартом десятилетиями, но современные приложения предпочитают JSON за простоту. Наш инструмент помогает преодолеть этот разрыв.',
                'features' => [
                    'fast' => [
                        'title' => 'Молниеносно',
                        'desc' => 'Мгновенная обработка в реальном времени.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите XML данные для конвертации',
                'success_copy' => 'Скопировано!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de XML a JSON - Gratis Online',
                'description' => 'Convierte documentos XML a formato JSON limpio. Soporta atributos y estructuras anidadas.',
                'h1' => 'Convertidor XML a JSON',
                'subtitle' => 'Transformación instantánea de XML a objetos JavaScript'
            ],
            'editor' => [
                'btn_convert' => 'Convertir a JSON',
                'label_input' => 'Entrada XML',
                'label_output' => 'Resultado JSON',
                'btn_copy' => 'Copiar JSON'
            ],
            'content' => [
                'h2' => 'Convertidor gratuito de XML a JSON',
                'p1' => 'XML ha sido un estándar por décadas, pero las aplicaciones modernas prefieren JSON. Nuestra herramienta facilita el cambio.',
                'features' => [
                    'fast' => [
                        'title' => 'Ultra rápido',
                        'desc' => 'Procesamiento en tiempo real.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa datos XML para convertir',
                'success_copy' => '¡Copiado!'
            ]
        ]
    ],
    'yaml-to-json' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер YAML в JSON - Бесплатно онлайн',
                'description' => 'Преобразуйте файлы конфигурации YAML в формат JSON мгновенно. Полезно для DevOps и веб-разработки.',
                'h1' => 'Конвертер YAML в JSON',
                'subtitle' => 'Трансформация YAML конфигов в JSON формат'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать',
                'btn_copy' => 'Копировать JSON',
                'label_input' => 'YAML Ввод',
                'ph_input' => 'Вставьте ваш YAML код здесь...',
                'label_output' => 'JSON Результат'
            ],
            'content' => [
                'h2' => 'О конвертере YAML в JSON',
                'p1' => 'Этот инструмент полезен для разработчиков, работающих с облачными провайдерами и CI/CD пайплайнами.',
                'features' => [
                    'instant' => [
                        'title' => 'Мгновенно',
                        'desc' => 'Конвертация происходит на лету.'
                    ]
                ]
            ],
            'js' => [
                'error_process' => 'Ошибка при конвертации YAML: ',
                'success_copy' => 'JSON скопирован в буфер обмена!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de YAML a JSON - Gratis Online',
                'description' => 'Convierte archivos de configuración YAML a formato JSON al instante. Útil para DevOps y desarrollo web.',
                'h1' => 'Convertidor YAML a JSON',
                'subtitle' => 'Transforma configuraciones YAML a formato JSON al instante'
            ],
            'editor' => [
                'btn_convert' => 'Convertir',
                'btn_copy' => 'Copiar JSON',
                'label_input' => 'Entrada YAML',
                'ph_input' => 'Pega tu YAML aquí...',
                'label_output' => 'Salida JSON'
            ],
            'content' => [
                'h2' => 'Sobre el convertidor de YAML a JSON',
                'p1' => 'Esta herramienta es vital para desarrolladores que manejan pipelines CI/CD y despliegues en la nube.',
                'features' => [
                    'instant' => [
                        'title' => 'Instantáneo',
                        'desc' => 'Transformación en tiempo real.'
                    ]
                ]
            ],
            'js' => [
                'error_process' => 'Error convirtiendo YAML: ',
                'success_copy' => '¡JSON copiado al portapapeles!'
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

echo "Batch 3.2 update completed.\n";
