<?php

$locales = ['ru', 'es'];
$category = 'development';
$tools = [
    'html-encoder-decoder' => [
        'ru' => [
            'meta' => [
                'title' => 'HTML Энкодер и Декодер - Бесплатно онлайн',
                'description' => 'Кодируйте и декодируйте HTML-сущности для защиты от XSS атак и корректного отображения кода.',
                'h1' => 'HTML Энкодер и Декодер',
                'subtitle' => 'Преобразование спецсимволов HTML в сущности и обратно'
            ],
            'editor' => [
                'mode_encode' => 'Закодировать HTML',
                'mode_decode' => 'Декодировать HTML',
                'label_input_encode' => 'Введите HTML для кодирования',
                'ph_input_encode' => '<div>Привет и Добро пожаловать</div>',
                'btn_encode' => 'Закодировать',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output_encode' => 'Результат кодирования',
                'ph_output' => 'Обработанный HTML появится здесь...',
                'label_input_decode' => 'Введите HTML для декодирования',
                'label_output_decode' => 'Результат декодирования',
                'btn_decode' => 'Декодировать'
            ],
            'content' => [
                'hero_title' => 'HTML Эскейпинг и Декодирование',
                'hero_subtitle' => 'Безопасное отображение кода на веб-страницах.',
                'p1' => 'Этот инструмент помогает преобразовывать спецсимволы HTML (такие как <, >, &) в их безопасные эквиваленты (сущности) для предотвращения XSS-уязвимостей.',
                'what_title' => 'Что такое HTML кодирование?',
                'what_desc' => 'Это процесс замены потенциально опасных символов специальными кодами (напр. &lt; вместо <), чтобы браузер не воспринимал их как часть разметки.',
                'features_title' => 'Особенности',
                'features' => [
                    'fast' => [
                        'title' => 'Мгновенно',
                        'desc' => 'Результат доступен сразу после нажатия кнопки.'
                    ],
                    'privacy' => [
                        'title' => 'Приватно',
                        'desc' => 'Данные не отправляются на сервер, всё работает в браузере.'
                    ]
                ],
                'uses_title' => 'Применение',
                'uses' => [
                    'security' => [
                        'title' => 'Безопасность',
                        'desc' => 'Очистка пользовательского ввода для защиты от XSS атак.'
                    ],
                    'display' => [
                        'title' => 'Отображение кода',
                        'desc' => 'Вывод исходного HTML кода на странице без его рендеринга.'
                    ]
                ],
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Зачем кодировать HTML?',
                'faq_a1' => 'Для безопасности и правильного отображения кода. Это не дает браузеру выполнять скрипты, вставленные пользователями.',
                'faq_q2' => 'Какие символы кодируются?',
                'faq_a2' => 'Обязательно: <, >, &, ", \'. Также могут кодироваться символы расширенного ASCII.',
                'faq_q3' => 'Это обратимый процесс?',
                'faq_a3' => 'Да, декодирование полностью восстанавливает исходный текст из сущностей.'
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите HTML для обработки',
                'success_encode' => '✓ HTML успешно закодирован',
                'success_decode' => '✓ HTML успешно декодирован',
                'success_copy' => '✓ Скопировано в буфер обмена'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Codificador y Decodificador HTML - Online Gratis',
                'description' => 'Codifica y decodifica entidades HTML para prevenir ataques XSS y mostrar código de forma segura.',
                'h1' => 'Codificador y Decodificador HTML',
                'subtitle' => 'Convierte caracteres especiales de HTML en entidades y viceversa'
            ],
            'editor' => [
                'mode_encode' => 'Codificar HTML',
                'mode_decode' => 'Decodificar HTML',
                'label_input_encode' => 'Ingresa HTML para codificar',
                'ph_input_encode' => '<div>Hola y Bienvenido</div>',
                'btn_encode' => 'Codificar HTML',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output_encode' => 'HTML Codificado',
                'ph_output' => 'El HTML procesado aparecerá aquí...',
                'label_input_decode' => 'Ingresa HTML para decodificar',
                'label_output_decode' => 'HTML Decodificado',
                'btn_decode' => 'Decodificar HTML'
            ],
            'content' => [
                'hero_title' => 'Escapado y Decodificación HTML',
                'hero_subtitle' => 'Muestra código de forma segura en tus páginas web.',
                'p1' => 'Nuestra herramienta ayuda a convertir caracteres especiales de HTML (como <, >, &) en sus entidades correspondientes para prevenir vulnerabilidades XSS.',
                'what_title' => '¿Qué es la codificación HTML?',
                'what_desc' => 'Es el proceso de reemplazar caracteres con significado especial por entidades (ej. &lt; en lugar de <) para que el navegador no los interprete como etiquetas.',
                'features_title' => 'Características',
                'features' => [
                    'fast' => [
                        'title' => 'Conversión Instantánea',
                        'desc' => 'Codifica o decodifica HTML en milisegundos.'
                    ],
                    'privacy' => [
                        'title' => 'Privacidad',
                        'desc' => 'Todo el proceso ocurre en tu navegador.'
                    ]
                ],
                'uses_title' => 'Casos de uso',
                'uses' => [
                    'security' => [
                        'title' => 'Seguridad',
                        'desc' => 'Saneamiento de entradas de usuario para prevenir ataques XSS.'
                    ],
                    'display' => [
                        'title' => 'Mostrar Código',
                        'desc' => 'Muestra código HTML bruto en una web sin que se renderice.'
                    ]
                ],
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Por qué necesito codificar HTML?',
                'faq_a1' => 'Por seguridad y para mostrar fragmentos de código correctamente sin que el navegador los ejecute.',
                'faq_q2' => '¿Qué caracteres se codifican?',
                'faq_a2' => 'Caracteres esenciales como <, >, &, " y \'.',
                'faq_q3' => '¿Es reversible?',
                'faq_a3' => 'Sí, la decodificación restaura el texto original exactamente.'
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa HTML para procesar',
                'success_encode' => '✓ HTML codificado con éxito',
                'success_decode' => '✓ HTML decodificado con éxito',
                'success_copy' => '✓ ¡Copiado al portapapeles!'
            ]
        ]
    ],
    'html-to-markdown-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер HTML в Markdown - Бесплатно онлайн',
                'description' => 'Мгновенно преобразуйте HTML код в чистый формат Markdown для документации и README файлов.',
                'h1' => 'Конвертер HTML в Markdown',
                'subtitle' => 'Преобразование HTML в чистый Markdown за один клик'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать',
                'btn_copy' => 'Копировать Markdown',
                'btn_download' => 'Скачать',
                'btn_clear' => 'Очистить',
                'label_input' => 'Входящий HTML',
                'ph_input' => 'Вставьте ваш HTML код здесь...',
                'label_output' => 'Результат Markdown',
                'ph_output' => 'Здесь появится конвертированный Markdown...'
            ],
            'content' => [
                'about_title' => 'О конвертере HTML в Markdown',
                'about_p1' => 'Превратите громоздкий HTML код в читаемый и легкий формат Markdown. Идеально подходит для переноса контента в GitHub, документацию или статические генераторы сайтов.',
                'features_title' => 'Ключевые особенности',
                'features_list' => [
                    '1' => '✅ <strong>Сохранение форматирования:</strong> Поддержка заголовков, списков и ссылок.',
                    '2' => '✅ <strong>Чистый код:</strong> Генерация валидного Markdown без лишнего мусора.',
                    '3' => '✅ <strong>Приватность:</strong> Конвертация происходит прямо в браузере.'
                ],
                'uses_title' => 'Примеры использования',
                'uses' => [
                    'docs' => [
                        'title' => 'Документация',
                        'desc' => 'Перевод HTML инструкций в README файлы для GitHub.'
                    ],
                    'migration' => [
                        'title' => 'Миграция контента',
                        'desc' => 'Перенос статей из CMS в статические движки типа Hugo или Jekyll.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите HTML код для конвертации',
                'success_copy' => 'Markdown скопирован в буфер обмена!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de HTML a Markdown - Gratis Online',
                'description' => 'Convierte código HTML a formato Markdown limpio al instante para documentación y archivos README.',
                'h1' => 'Convertidor HTML a Markdown',
                'subtitle' => 'Convierte HTML a Markdown de forma limpia y rápida'
            ],
            'editor' => [
                'btn_convert' => 'Convertir',
                'btn_copy' => 'Copiar Markdown',
                'btn_download' => 'Descargar',
                'btn_clear' => 'Limpiar',
                'label_input' => 'Entrada HTML',
                'ph_input' => 'Pega tu código HTML aquí...',
                'label_output' => 'Resultado Markdown',
                'ph_output' => 'El Markdown convertido aparecerá aquí...'
            ],
            'content' => [
                'about_title' => 'Sobre el convertidor de HTML a Markdown',
                'about_p1' => 'Transforma contenido HTML en formato Markdown legible. Ideal para redactores técnicos, desarrolladores y creadores de contenido que necesitan limpiar código para plataformas como GitHub.',
                'features_title' => 'Características principales',
                'features_list' => [
                    '1' => '✅ <strong>Mantiene el formato:</strong> Respeta encabezados, listas y enlaces.',
                    '2' => '✅ <strong>Sin instalación:</strong> Funciona directamente en tu navegador.',
                    '3' => '✅ <strong>Privacidad absoluta:</strong> Tus datos no salen de tu equipo.'
                ],
                'uses_title' => 'Casos de uso comunes',
                'uses' => [
                    'docs' => [
                        'title' => 'Documentación',
                        'desc' => 'Convierte docs HTML a Markdown para wikis de GitHub y archivos README.'
                    ],
                    'migration' => [
                        'title' => 'Migración de contenido',
                        'desc' => 'Pasa contenido de CMS basados en HTML a plataformas como Jekyll o Hugo.'
                    ]
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa código HTML para convertir',
                'success_copy' => '¡Markdown copiado al portapapeles!'
            ]
        ]
    ],
    'markdown-to-html-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер Markdown в HTML - Редактор с предпросмотром',
                'description' => 'Преобразуйте Markdown в чистый HTML код. Редактор в реальном времени с поддержкой GitHub стиля.',
                'h1' => 'Конвертер Markdown в HTML',
                'subtitle' => 'Мгновенное преобразование Markdown в HTML с предпросмотром'
            ],
            'editor' => [
                'btn_convert' => 'Конвертировать',
                'btn_copy' => 'Копировать HTML',
                'btn_clear' => 'Очистить',
                'label_input' => 'Markdown',
                'ph_input' => '# Введите ваш Markdown здесь...',
                'label_output' => 'Предпросмотр / HTML'
            ],
            'content' => [
                'about_title' => 'О конвертере Markdown в HTML',
                'about_p1' => 'Markdown — это легкий язык разметки. Наш инструмент позволяет быстро получить готовый HTML код из вашего Markdown текста для использования на сайтах или в письмах.',
                'features_title' => 'Функции',
                'features_list' => [
                    '1' => '🚀 <strong>Живой предпросмотр:</strong> Визуальное отображение результата в реальном времени.',
                    '2' => '🛠 <strong>Чистый HTML:</strong> Генерация качественного кода без лишних тегов.',
                    '3' => '🌑 <strong>Темы оформления:</strong> Поддержка темного и светлого режимов.'
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите текст в формате Markdown',
                'success_copy' => 'HTML код скопирован!'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de Markdown a HTML - Editor con Vista Previa',
                'description' => 'Convierte Markdown a código HTML limpio. Editor en tiempo real con soporte para estilo GitHub.',
                'h1' => 'Convertidor Markdown a HTML',
                'subtitle' => 'Conversión instantánea de Markdown a HTML con vista previa real'
            ],
            'editor' => [
                'btn_convert' => 'Convertir',
                'btn_copy' => 'Copiar HTML',
                'btn_clear' => 'Limpiar',
                'label_input' => 'Markdown',
                'ph_input' => '# Ingresa tu Markdown aquí...',
                'label_output' => 'Vista Previa / HTML'
            ],
            'content' => [
                'about_title' => 'Sobre el convertidor de Markdown a HTML',
                'about_p1' => 'Markdown es un lenguaje de marcado ligero. Nuestra herramienta te permite obtener código HTML listo para usar en blogs, correos electrónicos o cualquier sitio web.',
                'features_title' => 'Funciones',
                'features_list' => [
                    '1' => '🚀 <strong>Vista previa en vivo:</strong> Visualiza el resultado mientras escribes.',
                    '2' => '🛠 <strong>HTML Limpio:</strong> Genera código optimizado y compatible.',
                    '3' => '🔒 <strong>Seguro:</strong> Procesamiento local para máxima privacidad.'
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa texto en Markdown',
                'success_copy' => '¡Código HTML copiado!'
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

echo "Batch 3.1 update completed.\n";
