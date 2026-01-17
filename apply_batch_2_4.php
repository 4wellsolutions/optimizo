<?php

$locales = ['ru', 'es'];
$category = 'converters';
$tools = [
    'camel-case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер в camelCase - Онлайн инструмент',
                'description' => 'Бесплатный онлайн конвертер текста в camelCase. Идеально для имен переменных в JavaScript, Java и других языках.',
                'h1' => 'Конвертер в camelCase',
                'subtitle' => 'Преобразование текста в формат camelCase для программирования'
            ],
            'editor' => [
                'label_input' => 'Исходный текст',
                'ph_input' => 'имя моей переменной',
                'btn_convert' => 'Конвертировать в camelCase',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output' => 'Результат (camelCase)',
                'ph_output' => 'myVariableName'
            ],
            'content' => [
                'hero_title' => 'Профессиональный конвертер в camelCase',
                'hero_subtitle' => 'Быстрое создание имен переменных по стандартам разработки.',
                'p1' => 'camelCase — это стиль написания составных слов, при котором первая буква первого слова пишется со строчной, а первая буква каждого последующего слова — с прописной, без пробелов между ними.',
                'features_title' => 'Особенности',
                'features' => [
                    'clean' => [
                        'title' => 'Чистый вывод',
                        'desc' => 'Автоматически удаляет лишние символы и пробелы.'
                    ],
                    'standard' => [
                        'title' => 'Стандарт JS',
                        'desc' => 'Идеально подходит для JavaScript, Java, C++ и других языков.'
                    ],
                    'privacy' => [
                        'title' => 'Приватность',
                        'desc' => 'Все данные обрабатываются в вашем браузере.'
                    ]
                ],
                'uses_title' => 'Применение camelCase',
                'uses' => [
                    'js' => [
                        'title' => 'JavaScript',
                        'desc' => 'Стандарт для имен переменных и функций.'
                    ],
                    'css' => [
                        'title' => 'CSS-in-JS',
                        'desc' => 'Использование в стилях React и других фреймворков.'
                    ]
                ],
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Что такое camelCase?',
                'faq_a1' => 'Стиль написания (напр. camelCase), где слова соединены, и каждое слово, кроме первого, начинается с большой буквы.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor camelCase - Herramienta en línea gratuita',
                'description' => 'Convierte texto a camelCase al instante. Ideal para nombres de variables en JavaScript, Java y otros lenguajes.',
                'h1' => 'Convertidor camelCase',
                'subtitle' => 'Transforma tu texto al formato camelCase para programación'
            ],
            'editor' => [
                'label_input' => 'Texto de entrada',
                'ph_input' => 'nombre de mi variable',
                'btn_convert' => 'Convertir a camelCase',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output' => 'Resultado (camelCase)',
                'ph_output' => 'myVariableName'
            ],
            'content' => [
                'hero_title' => 'Convertidor camelCase Profesional',
                'hero_subtitle' => 'Crea nombres de variables siguiendo los estándares de desarrollo.',
                'p1' => 'El camelCase es una convención de escritura donde la primera letra es minúscula y las siguientes palabras comienzan con mayúscula, sin espacios.',
                'features_title' => 'Características',
                'features' => [
                    'clean' => [
                        'title' => 'Resultado limpio',
                        'desc' => 'Elimina caracteres especiales y espacios automáticamente.'
                    ],
                    'standard' => [
                        'title' => 'Estándar JS',
                        'desc' => 'Perfecto para JavaScript, Java, C++ y más.'
                    ]
                ],
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Qué es camelCase?',
                'faq_a1' => 'Es un estilo (ej. miVariable) donde las palabras se unen y cada una tras la primera inicia en mayúscula.'
            ]
        ]
    ],
    'case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер регистра текста онлайн',
                'description' => 'Бесплатный инструмент для изменения регистра: ПРОПИСНЫЕ, строчные, Заглавные Буквы и другие форматы.',
                'h1' => 'Конвертер регистра текста',
                'subtitle' => 'Мгновенное изменение регистра для любого текста'
            ],
            'editor' => [
                'label_input' => 'Ваш текст',
                'ph_input' => 'Введите или вставьте текст здесь...',
                'btn_upper' => 'ПРОПИСНЫЕ',
                'btn_lower' => 'строчные',
                'btn_capitalized' => 'Как в предложениях',
                'btn_title' => 'Названия (Заглавные)',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать результат',
                'label_stats' => 'Статистика: :chars символов, :words слов, :lines строк',
                'label_output' => 'Результат'
            ],
            'content' => [
                'hero_title' => 'Универсальный конвертер регистра',
                'hero_subtitle' => 'Все необходимые форматы текста в одном месте.',
                'p1' => 'Этот инструмент позволяет быстро переключаться между различными типами регистра: все прописные, все строчные, капитализация каждого слова и другие.',
                'uses_title' => 'Когда это полезно',
                'uses' => [
                    'docs' => [
                        'title' => 'Документы',
                        'desc' => 'Исправление CAPS LOCK или форматирование заголовков.'
                    ],
                    'coding' => [
                        'title' => 'Программирование',
                        'desc' => 'Подготовка строк для кода или БД.'
                    ]
                ],
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Этот сервис бесплатный?',
                'faq_a1' => 'Да, сервис абсолютно бесплатен и не требует регистрации.',
                'faq_q2' => 'Мои данные сохраняются?',
                'faq_a2' => 'Нет, вся обработка происходит в вашем браузере.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de mayúsculas y minúsculas en línea',
                'description' => 'Cambia el formato de tu texto: MAYÚSCULAS, minúsculas, Tipo Título y más al instante.',
                'h1' => 'Convertidor de formato de texto',
                'subtitle' => 'Cambia el registro de cualquier texto rápidamente'
            ],
            'editor' => [
                'label_input' => 'Tu texto',
                'ph_input' => 'Escribe o pega tu texto aquí...',
                'btn_upper' => 'MAYÚSCULAS',
                'btn_lower' => 'minúsculas',
                'btn_capitalized' => 'Tipo Oración',
                'btn_title' => 'Tipo Título',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar resultado',
                'label_stats' => 'Estadísticas: :chars caracteres, :words palabras, :lines líneas',
                'label_output' => 'Resultado'
            ],
            'content' => [
                'p1' => 'Esta herramienta te permite alternar entre formatos de texto como mayúsculas, minúsculas o capitalización automática de oraciones de forma sencilla.',
                'uses_title' => 'Casos de uso',
                'uses' => [
                    'docs' => [
                        'title' => 'Documentación',
                        'desc' => 'Corregir textos escritos accidentalmente en mayúsculas.'
                    ]
                ]
            ]
        ]
    ],
    'kebab-case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер в kebab-case - Для URL и CSS классов',
                'description' => 'Мгновенно преобразуйте текст в kebab-case (на-шампуре). Идеально для slug-адресов сайтов и имен CSS файлов.',
                'h1' => 'Конвертер в kebab-case',
                'subtitle' => 'Создание читаемых URL и имен классов'
            ],
            'editor' => [
                'label_input' => 'Ваш текст',
                'ph_input' => 'Пример Названия Tool',
                'btn_convert' => 'Конвертировать в kebab-case',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output' => 'Результат (kebab-case)',
                'ph_output' => 'primer-nazvaniya-tool'
            ],
            'content' => [
                'hero_title' => ' kebab-case генератор',
                'hero_subtitle' => 'Создавайте валидные slug для ваших проектов.',
                'p1' => 'kebab-case — это практика написания слов через дефис. Популярно в именовании URL (slug) и CSS классов.',
                'features_title' => 'Преимущества',
                'features' => [
                    'url' => [
                        'title' => 'SEO Friendly',
                        'desc' => 'Создает чистые и понятные поисковикам ссылки.'
                    ],
                    'dash' => [
                        'title' => 'Разделители',
                        'desc' => 'Автоматически заменяет пробелы на дефисы.'
                    ]
                ],
                'uses_title' => 'Где использовать',
                'uses' => [
                    'slugs' => [
                        'title' => 'URL Slugs',
                        'desc' => 'Оптимально для адресов страниц блога или каталога.'
                    ],
                    'css' => [
                        'title' => 'CSS Классы',
                        'desc' => 'Стандарт именования в BEM методологии.'
                    ]
                ]
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor kebab-case - Para URLs y clases CSS',
                'description' => 'Convierte texto a kebab-case (con-guiones) al instante. Perfecto para slugs de URL y nombres de clases CSS.',
                'h1' => 'Convertidor kebab-case',
                'subtitle' => 'Crea URLs amigables y nombres de clases limpios'
            ],
            'editor' => [
                'label_input' => 'Tu texto',
                'ph_input' => 'Ejemplo de Titulo Herramienta',
                'btn_convert' => 'Convertir a kebab-case',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output' => 'Resultado (kebab-case)',
                'ph_output' => 'ejemplo-de-titulo-herramienta'
            ],
            'content' => [
                'hero_title' => 'Generador kebab-case',
                'hero_subtitle' => 'Crea slugs válidos para tus proyectos web.',
                'p1' => 'El formato kebab-case une las palabras con guiones. Es el estándar para URLs amigables con el SEO (slugs).',
                'features_title' => 'Características',
                'features' => [
                    'url' => [
                        'title' => 'SEO Friendly',
                        'desc' => 'Genera enlaces limpios y fáciles de leer para buscadores.'
                    ]
                ]
            ]
        ]
    ],
    'pascal-case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер в PascalCase - Для имен классов',
                'description' => 'Бесплатный инструмент для преобразования текста в PascalCase. Идеально для классов C#, Java и компонентов React.',
                'h1' => 'Конвертер в PascalCase',
                'subtitle' => 'Форматирование текста для именования классов и типов'
            ],
            'editor' => [
                'label_input' => 'Ваш текст',
                'ph_input' => 'имя моего класса',
                'btn_convert' => 'Конвертировать в PascalCase',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output' => 'Результат (PascalCase)',
                'ph_output' => 'MyClassName'
            ],
            'content' => [
                'hero_title' => 'PascalCase Конвертер',
                'hero_subtitle' => 'Создавайте компоненты и классы по стандартам.',
                'p1' => 'В PascalCase каждое слово начинается с большой буквы, пробелы отсутствуют.',
                'features_title' => 'Особенности',
                'features' => [
                    'oop' => [
                        'title' => 'ООП Стандарт',
                        'desc' => 'Соответствует правилам C#, Java и TypeScript.'
                    ]
                ],
                'uses_title' => 'Применение',
                'uses' => [
                    'react' => [
                        'title' => 'React Компоненты',
                        'desc' => 'Обязательный формат для именования компонентов.'
                    ]
                ]
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor PascalCase - Para nombres de clases',
                'description' => 'Convierte texto a PascalCase al instante. Ideal para clases en C#, Java y componentes de React.',
                'h1' => 'Convertidor PascalCase',
                'subtitle' => 'Formatea nombres de clases y tipos según los estándares'
            ],
            'editor' => [
                'label_input' => 'Tu texto',
                'ph_input' => 'mi nombre de clase',
                'btn_convert' => 'Convertir a PascalCase',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output' => 'Resultado (PascalCase)',
                'ph_output' => 'MyClassName'
            ],
            'content' => [
                'hero_title' => 'Convertidor PascalCase',
                'hero_subtitle' => 'Crea componentes y clases siguiendo las convenciones.',
                'p1' => 'En PascalCase, cada palabra comienza con mayúscula y no hay espacios entre ellas.',
                'features_title' => 'Características',
                'features' => [
                    'oop' => [
                        'title' => 'Estándar OOP',
                        'desc' => 'Cumple con las reglas de C#, Java y TypeScript.'
                    ]
                ]
            ]
        ]
    ],
    'sentence-case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер текста как в предложениях',
                'description' => 'Автоматически делает первую букву каждого предложения заглавной. Чистый и правильный текст за один клик.',
                'h1' => 'Конвертер Sentence Case',
                'subtitle' => 'Автоматическое исправление регистра в предложениях'
            ],
            'editor' => [
                'label_input' => 'Ваш текст',
                'btn_convert' => 'Исправить регистр',
                'btn_copy' => 'Копировать результат'
            ],
            'content' => [
                'p1' => 'Этот инструмент полезен для исправления текстов, написанных строчными буквами или в CAPS LOCK.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de formato de oración',
                'description' => 'Pone en mayúscula automáticamente la primera letra de cada oración. Obtén un texto gramaticalmente correcto al instante.',
                'h1' => 'Convertidor tipo oración',
                'subtitle' => 'Corrección automática de mayúsculas en oraciones'
            ],
            'editor' => [
                'label_input' => 'Tu texto',
                'btn_convert' => 'Convertir a tipo oración',
                'btn_copy' => 'Copiar resultado'
            ]
        ]
    ],
    'snake-case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер в snake_case - Для Python и БД',
                'description' => 'Преобразуйте текст в формат snake_case (через подчеркивание). Оптимально для имен полей БД и переменных в Python.',
                'h1' => 'Конвертер в snake_case',
                'subtitle' => 'Создание имен переменных и колонок через подчеркивание'
            ],
            'editor' => [
                'label_input' => 'Ваш текст',
                'ph_input' => 'имя моей колонки',
                'btn_convert' => 'Конвертировать в snake_case',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output' => 'Результат (snake_case)',
                'ph_output' => 'imya_moey_kolonki'
            ],
            'content' => [
                'p1' => 'snake_case — это стиль написания составных слов, разделенных символом подчеркивания.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor snake_case - Para Python y bases de datos',
                'description' => 'Convierte texto a snake_case (con_guiones_bajos) al instante. Estándar para Python y nombres de columnas en bases de datos.',
                'h1' => 'Convertidor snake_case',
                'subtitle' => 'Crea nombres de variables y columnas siguiendo los estándares'
            ],
            'editor' => [
                'label_input' => 'Tu texto',
                'ph_input' => 'mi nombre de columna',
                'btn_convert' => 'Convertir a snake_case',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output' => 'Resultado (snake_case)',
                'ph_output' => 'mi_nombre_de_columna'
            ],
            'content' => [
                'p1' => 'El estilo snake_case une las palabras con guiones bajos, muy común en lenguajes como Python o Ruby.'
            ]
        ]
    ],
    'studly-case-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер в StudlyCase',
                'h1' => 'StudlyCase Конвертер'
            ],
            'editor' => [
                'label_input' => 'Ваш текст',
                'btn_convert' => 'Конвертировать'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor StudlyCase',
                'h1' => 'Convertidor StudlyCase'
            ],
            'editor' => [
                'label_input' => 'Tu texto',
                'btn_convert' => 'Convertir'
            ]
        ]
    ],
    'text-to-binary' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер текста в двоичный код',
                'description' => 'Мгновенно преобразуйте любой текст в двоичный код (нули и единицы) и наоборот.',
                'h1' => 'Конвертер текста в бинарный код',
                'subtitle' => 'Шифрование и расшифровка текста в бинарный формат'
            ],
            'editor' => [
                'label_input' => 'Текст',
                'ph_input' => 'Введите текст здесь...',
                'btn_convert' => 'В двоичный код',
                'btn_clear' => 'Очистить',
                'btn_copy' => 'Копировать',
                'label_output' => 'Двоичный код'
            ],
            'content' => [
                'p1' => 'Этот инструмент позволяет переводить текст в последовательность нулей и единиц на основе кодировки UTF-8.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de texto a binario',
                'description' => 'Convierte cualquier texto a código binario (ceros y unos) y viceversa al instante.',
                'h1' => 'Convertidor texto a binario',
                'subtitle' => 'Codifica y decodifica texto en formato binario'
            ],
            'editor' => [
                'label_input' => 'Texto',
                'ph_input' => 'Escribe el texto aquí...',
                'btn_convert' => 'A binario',
                'btn_clear' => 'Limpiar',
                'btn_copy' => 'Copiar',
                'label_output' => 'Código binario'
            ],
            'content' => [
                'p1' => 'Esta herramienta traduce texto a secuencias de ceros y unos basándose en la codificación UTF-8.'
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

echo "Batch 2.4 update completed.\n";
