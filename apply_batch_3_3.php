<?php

$locales = ['ru', 'es'];
$category = 'development';
$tools = [
    'jwt-decoder' => [
        'ru' => [
            'meta' => [
                'title' => 'Декодер JWT - Бесплатно онлайн',
                'description' => 'Декодируйте и проверяйте JSON Web Tokens (JWT). Просматривайте заголовок, нагрузку (payload) и подпись.',
                'h1' => 'Декодер JWT',
                'subtitle' => 'Инструмент для анализа JSON Web Tokens'
            ],
            'editor' => [
                'label_input' => 'Введите JWT Токен',
                'ph_input' => 'eyJhbGciOiJIUzI1Ni...',
                'btn_decode' => 'Декодировать JWT',
                'btn_clear' => 'Очистить',
                'label_payload' => 'Полезная нагрузка (Payload)',
                'label_signature' => 'Подпись',
                'note_signature' => '⚠️ Примечание: Проверка подписи требует секретный ключ'
            ],
            'content' => [
                'hero_title' => 'Онлайн Декодер JWT',
                'p1' => 'Наш бесплатный инструмент позволяет мгновенно расшифровать JWT токены. Вы сможете увидеть содержимое заголовка и полезной нагрузки без необходимости знать секретный ключ.',
                'what_title' => 'Что такое JWT?',
                'what_desc' => 'JSON Web Token (JWT) — это компактный, безопасный для URL способ представления утверждений (claims) между двумя сторонами.',
                'features' => [
                    'instant' => [
                        'title' => 'Мгновенно',
                        'desc' => 'Декодирование за миллисекунды.'
                    ],
                    'privacy' => [
                        'title' => 'Приватность',
                        'desc' => 'Все происходит в вашем браузере.'
                    ]
                ],
                'faq' => [
                    'q1' => 'Это безопасно?',
                    'a1' => 'Да, декодирование происходит локально. Ваш токен не отправляется на сервер.'
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите JWT токен',
                'success_decode' => '✓ JWT успешно декодирован',
                'error_decode' => '✖ Ошибка при декодировании JWT: '
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Decodificador JWT - Gratis Online',
                'description' => 'Decodifica e inspecciona JSON Web Tokens (JWT). Visualiza el encabezado, payload y firma.',
                'h1' => 'Decodificador JWT',
                'subtitle' => 'Analiza tus JSON Web Tokens al instante'
            ],
            'editor' => [
                'label_input' => 'Ingresa el Token JWT',
                'ph_input' => 'eyJhbGciOiJIUzI1Ni...',
                'btn_decode' => 'Decodificar JWT',
                'btn_clear' => 'Limpiar',
                'label_payload' => 'Carga Útil (Payload)',
                'label_signature' => 'Firma',
                'note_signature' => '⚠️ Nota: La verificación de la firma requiere la clave secreta'
            ],
            'content' => [
                'hero_title' => 'Decodificador JWT Online',
                'p1' => 'Nuestra herramienta te permite ver el contenido de cualquier JWT sin necesidad de la clave secreta.',
                'what_title' => '¿Qué es JWT?',
                'what_desc' => 'JWT es un estándar abierto que define una forma compacta y autónoma para transmitir información entre partes de forma segura como un objeto JSON.',
                'features' => [
                    'instant' => [
                        'title' => 'Al Instante',
                        'desc' => 'Decodifica en milisegundos.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa un token JWT',
                'success_decode' => '✓ JWT decodificado con éxito',
                'error_decode' => '✖ Error decodificando JWT: '
            ]
        ]
    ],
    'md5-generator' => [
        'ru' => [
            'meta' => [
                'title' => 'Генератор MD5 хэша - Бесплатно онлайн',
                'description' => 'Создавайте MD5 хэши из любого текста мгновенно. Надежно и приватно.',
                'h1' => 'Генератор MD5 хэша',
                'subtitle' => 'Мгновенное вычисление хэша MD5'
            ],
            'editor' => [
                'label_input' => 'Введите текст',
                'ph_input' => 'Текст для хэширования...',
                'btn_generate' => 'Сгенерировать MD5',
                'label_result' => 'Хэш MD5',
                'btn_copy' => 'Копировать'
            ],
            'content' => [
                'hero_title' => 'Онлайн MD5 Генератор',
                'p1' => 'MD5 — это широко используемая криптографическая хэш-функция, которая выдает 128-битное значение хэша.',
                'what_title' => 'Что такое MD5?',
                'what_desc' => 'MD5 принимает входные данные любой длины и возвращает фиксированную строку из 32 символов.',
                'warning_title' => '⚠️ Предупреждение о безопасности',
                'warning_desc' => 'Не используйте MD5 для хранения паролей! Он уязвим для атак коллизий. Используйте bcrypt или Argon2.',
                'faq' => [
                    'q1' => 'Можно ли расшифровать MD5?',
                    'a1' => 'Нет, хэширование — это необратимый процесс.'
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите текст',
                'btn_copied' => 'Скопировано!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Generador de Hash MD5 - Gratis Online',
                'description' => 'Genera hashes MD5 desde cualquier texto al instante. Seguro y privado.',
                'h1' => 'Generador de Hash MD5',
                'subtitle' => 'Calcula el hash MD5 de tus textos al instante'
            ],
            'editor' => [
                'label_input' => 'Ingresa texto',
                'ph_input' => 'Texto para hashear...',
                'btn_generate' => 'Generar MD5',
                'label_result' => 'Hash MD5',
                'btn_copy' => 'Copiar'
            ],
            'content' => [
                'hero_title' => 'Generador MD5 Online',
                'p1' => 'MD5 es una función hash criptográfica muy utilizada que produce un valor hash de 128 bits.',
                'warning_title' => '⚠️ Advertencia de Seguridad',
                'warning_desc' => '¡NO uses MD5 para contraseñas! Es vulnerable a colisiones. Usa bcrypt para seguridad.',
                'faq' => [
                    'q1' => '¿Es reversible?',
                    'a1' => 'No, el hashing es una función de una sola vía.'
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa un texto',
                'btn_copied' => '¡Copiado!'
            ]
        ]
    ],
    'unicode-encoder-decoder' => [
        'ru' => [
            'meta' => [
                'title' => 'Unicode Энкодер и Декодер - Бесплатно онлайн',
                'description' => 'Преобразование текста в Unicode escape-последовательности (\\uXXXX) и обратно.',
                'h1' => 'Unicode Энкодер и Декодер',
                'subtitle' => 'Кодирование и декодирование символов Юникода'
            ],
            'editor' => [
                'btn_encode' => 'Закодировать в Unicode',
                'btn_decode' => 'Декодировать Unicode',
                'label_input_encode' => 'Введите текст',
                'ph_input' => 'Привет 世界',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output_encoded' => 'Результат'
            ],
            'content' => [
                'p1' => 'Этот инструмент помогает программистам вставлять спецсимволы в код JavaScript, JSON и др., заменяя их на безопасные последовательности типа \\uXXXX.',
                'features' => [
                    'instant' => [
                        'title' => 'Мгновенно',
                        'desc' => 'Результат готов сразу.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите текст для обработки',
                'success_encode' => '✓ Успешно закодировано в Unicode',
                'success_decode' => '✓ Успешно декодировано'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Codificador y Decodificador Unicode - Gratis Online',
                'description' => 'Convierte texto en secuencias de escape Unicode (\\uXXXX) y viceversa.',
                'h1' => 'Codificador y Decodificador Unicode',
                'subtitle' => 'Codifica y decodifica caracteres Unicode fácilmente'
            ],
            'editor' => [
                'btn_encode' => 'Codificar a Unicode',
                'btn_decode' => 'Decodificar Unicode',
                'label_input_encode' => 'Ingresa Texto',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output_encoded' => 'Resultado'
            ],
            'content' => [
                'p1' => 'Nuestra herramienta ayuda a incluir caracteres especiales en código para JavaScript, JSON o CSS de forma segura.',
                'features' => [
                    'instant' => [
                        'title' => 'Al Instante',
                        'desc' => 'Conversión en milisegundos.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa texto para procesar',
                'success_encode' => '✓ Codificado con éxito',
                'success_decode' => '✓ Decodificado con éxito'
            ]
        ]
    ],
    'url-encoder-decoder' => [
        'ru' => [
            'meta' => [
                'title' => 'URL Энкодер и Декодер - Бесплатно онлайн',
                'description' => 'Кодируйте и декодируйте параметры URL для безопасной передачи данных (percent-encoding).',
                'h1' => 'URL Энкодер и Декодер',
                'subtitle' => 'Безопасное преобразование параметров ссылок'
            ],
            'editor' => [
                'btn_encode' => 'Закодировать URL',
                'btn_decode' => 'Декодировать URL',
                'label_input_encode' => 'Введите URL или текст',
                'ph_input' => 'https://example.com/search?q=привет мир',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output_encoded' => 'Результат'
            ],
            'content' => [
                'what_title' => 'Что такое URL-кодирование?',
                'what_desc' => 'Процесс замены зарезервированных символов (%) для корректной передачи в строке запроса браузера.',
                'features' => [
                    'instant' => [
                        'title' => 'Мгновенно',
                        'desc' => 'Кодирование происходит на лету.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите URL для обработки',
                'success_encode' => '✓ URL успешно закодирован',
                'success_decode' => '✓ URL успешно декодирован'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Codificador y Decodificador URL - Gratis Online',
                'description' => 'Codifica y decodifica parámetros de URL para una transmisión segura (percent-encoding).',
                'h1' => 'Codificador y Decodificador URL',
                'subtitle' => 'Transforma tus URLs de forma segura'
            ],
            'editor' => [
                'btn_encode' => 'Codificar URL',
                'btn_decode' => 'Decodificar URL',
                'label_input_encode' => 'Ingresa URL o Texto',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output_encoded' => 'Resultado'
            ],
            'content' => [
                'what_title' => '¿Qué es la codificación URL?',
                'what_desc' => 'Es el proceso de reemplazar caracteres no permitidos por secuencias % para que funcionen en la web.',
                'features' => [
                    'instant' => [
                        'title' => 'Al Instante',
                        'desc' => 'Codifica tus enlaces rápidamente.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa una URL para procesar',
                'success_encode' => '✓ URL codificada con éxito',
                'success_decode' => '✓ URL decodificada con éxito'
            ]
        ]
    ],
    'uuid-generator' => [
        'ru' => [
            'meta' => [
                'title' => 'Генератор UUID - Бесплатно онлайн',
                'description' => 'Генерируйте универсально уникальные идентификаторы (UUID V4) мгновенно. Возможность создания списков.',
                'h1' => 'Генератор UUID',
                'subtitle' => 'Создание случайных идентификаторов для ваших проектов'
            ],
            'editor' => [
                'label_quantity' => 'Количество',
                'label_version' => 'Версия',
                'opt_v4' => 'Версия 4 (Случайная)',
                'btn_generate' => 'Сгенерировать UUID',
                'btn_copy' => 'Копировать',
                'label_output' => 'Сгенерированные UUID'
            ],
            'content' => [
                'about_title' => 'О UUID (Версия 4)',
                'about_desc' => 'UUID — это 128-битное число, используемое для уникальной идентификации информации. Вероятность совпадения практически равна нулю.'
            ],
            'js' => [
                'success_generated' => 'Сгенерировано :count UUID!',
                'success_copy' => 'Скопировано в буфер обмена!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Generador de UUID - Gratis Online',
                'description' => 'Genera identificadores únicos universales (UUID V4) al instante. Crea listas de IDs únicos.',
                'h1' => 'Generador de UUID',
                'subtitle' => 'Crea IDs aleatorios y únicos para tus proyectos'
            ],
            'editor' => [
                'label_quantity' => 'Cantidad',
                'label_version' => 'Versión',
                'opt_v4' => 'Versión 4 (Aleatoria)',
                'btn_generate' => 'Generar UUIDs',
                'btn_copy' => 'Copiar',
                'label_output' => 'UUIDs Generados'
            ],
            'content' => [
                'about_title' => 'Sobre UUID (Versión 4)',
                'about_desc' => 'Un UUID es un número de 128 bits usado para identificar información. La probabilidad de duplicación es virtualmente cero.'
            ],
            'js' => [
                'success_generated' => '¡Generados :count UUIDs!',
                'success_copy' => '¡Copiado al portapapeles!'
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

echo "Batch 3.3 update completed.\n";
