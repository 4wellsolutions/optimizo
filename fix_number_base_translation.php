<?php

$locales = ['ru', 'es'];
$category = 'converters';
$tools = [
    'number-base-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Универсальный конвертер систем счисления | От 2 до 36',
                'description' => 'Конвертируйте числа между любыми системами счисления от 2 до 36. Универсальный инструмент для программистов и студентов.',
                'h1' => 'Конвертер систем счисления',
                'subtitle' => 'Самый гибкий инструмент для преобразования чисел в сети.'
            ],
            'editor' => [
                'label_from' => 'Из системы',
                'bases' => [
                    '2' => 'Десятичная (Основание 10)',
                    '8' => 'Восьмеричная (Основание 8)',
                    '10' => 'Десятичная (Основание 10)',
                    '16' => 'Шестнадцатеричная (Основание 16)',
                    'generic' => 'Основание :base'
                ],
                'label_to' => 'В систему',
                'btn_swap' => 'Поменять местами',
                'presets' => 'Быстрые настройки:',
                'preset_labels' => [
                    'bin_dec' => 'Двоичная → Дес',
                    'dec_hex' => 'Дес → Шестн',
                    'hex_bin' => 'Шестн → Двоичная',
                    'dec_oct' => 'Дес → Восьм'
                ],
                'label_input' => 'Введите число',
                'ph_input' => 'Введите число здесь...',
                'label_output' => 'Результат',
                'ph_output' => 'Результат конвертации появится здесь...',
                'btn_convert' => 'Конвертировать число',
                'btn_clear' => 'Очистить все',
                'btn_copy' => 'Копировать результат'
            ],
            'content' => [
                'hero_title' => 'Универсальный конвертер систем счисления',
                'hero_subtitle' => 'Мгновенное преобразование значений между любыми системами счисления от 2 до 36.',
                'p1' => 'Наш универсальный конвертер — это мощный инструмент, созданный для максимальной гибкости. В то время как большинство инструментов ограничиваются стандартными системами (двоичной, десятичной или шестнадцатеричной), наш конвертер позволяет работать с любым основанием от 2 до 36. Это включает двенадцатеричную (система 12), двадцатеричную (система 20) и даже систему 36 (цифры 0-9 и буквы A-Z). Это незаменимый помощник для программистов, работающих с кастомными кодировками, и студентов, изучающих теорию чисел.',
                'what_title' => 'Что такое системы счисления?',
                'what_desc' => 'Основание системы счисления (также называемое радиксом) представляет собой количество уникальных цифр, включая ноль, которые используются в системе для записи значений. Например, десятичная система (основание 10), которую мы используем ежедневно, имеет десять цифр (0-9). Компьютеры работают в двоичной системе (основание 2), а разработчики часто используют восьмеричную (основание 8) и шестнадцатеричную (основание 16) системы для компактного представления данных. В системах с основанием выше 10 для обозначения значений используются буквы алфавита; например, в базе 16 буква A означает 10, а F — 15.',
                'features_title' => 'Основные функции инструмента',
                'features' => [
                    'instant' => [
                        'title' => 'Мгновенная работа',
                        'desc' => 'Алгоритмы, оптимизированные для скорости, выдают результат мгновенно по мере ввода.'
                    ],
                    'universal' => [
                        'title' => 'Поддержка всех систем',
                        'desc' => 'Полная свобода выбора исходной и целевой системы в диапазоне от 2 до 36.'
                    ],
                    'presets' => [
                        'title' => 'Умные пресеты',
                        'desc' => 'Быстрые ссылки для наиболее часто используемых промышленных стандартов.'
                    ],
                    'swap' => [
                        'title' => 'Быстрая замена',
                        'desc' => 'Мгновенно меняйте местами исходную и целевую системы одной кнопкой.'
                    ],
                    'privacy' => [
                        'title' => 'Безопасность данных',
                        'desc' => 'Ваши числа никогда не отправляются на сервер; вся логика выполняется в вашем браузере.'
                    ],
                    'free' => [
                        'title' => 'Бесплатно для всех',
                        'desc' => 'Без регистрации, без ограничений и без скрытых платежей.'
                    ]
                ],
                'uses_title' => 'Профессиональное применение',
                'uses' => [
                    'programming' => [
                        'title' => 'Программирование',
                        'desc' => 'Работа с кастомными базами для генераторов уникальных ID и сжатия данных.'
                    ],
                    'education' => [
                        'title' => 'Образование',
                        'desc' => 'Визуализируйте переход чисел между различными позиционными системами.'
                    ],
                    'crypto' => [
                        'title' => 'Криптография',
                        'desc' => 'Экспериментируйте с нестандартными системами для простого кодирования.'
                    ],
                    'web' => [
                        'title' => 'Веб-разработка',
                        'desc' => 'Анализируйте и конвертируйте идентификаторы URL, использующие высокие базы, такие как base-36.'
                    ]
                ],
                'how_title' => 'Руководство пользователя',
                'how_steps' => [
                    '1' => [
                        'title' => 'Выберите целевую систему',
                        'desc' => 'Выберите систему счисления, в которую хотите перевести число.'
                    ],
                    '2' => [
                        'title' => 'Введите значение',
                        'desc' => 'Введите число, используя разрешенные символы для вашей исходной системы.'
                    ],
                    '3' => [
                        'title' => 'Выполните перевод',
                        'desc' => 'Нажмите «Конвертировать число» для выполнения преобразования.'
                    ],
                    '4' => [
                        'title' => 'Получите результат',
                        'desc' => 'Скопируйте полученное значение для использования в ваших приложениях.'
                    ],
                    '5' => [
                        'title' => 'Копирование:',
                        'desc' => 'Нажмите кнопку «Копировать», чтобы сохранить результат в буфер обмена.'
                    ]
                ],
                'faq_title' => 'Часто задаваемые вопросы',
                'faq' => [
                    'q1' => 'Какое максимальное основание поддерживается?',
                    'a1' => 'Этот конвертер поддерживает все системы от 2 до 36. В системе 36 используются цифры 0-9 и буквы A-Z.',
                    'q2' => 'Как работают системы с основанием выше 10?',
                    'a2' => 'Они используют буквы A-Z для обозначения значений от 10 до 35. Например, в шестнадцатеричной системе A=10, F=15.',
                    'q3' => 'Поддерживаются ли отрицательные числа?',
                    'a3' => 'Да, конвертер работает с отрицательными числами. Знак сохраняется при преобразовании.',
                    'q4' => 'Безопасны ли мои данные?',
                    'a4' => 'Абсолютно! Все вычисления происходят прямо в браузере. Ваши данные не покидают устройство.'
                ]
            ],
            'js' => [
                'error_empty' => 'Пожалуйста, введите число для конвертации.',
                'error_invalid' => 'Некорректный ввод для системы :base. Допустимы только символы :chars.',
                'error_format' => 'Обнаружен неверный формат числа.',
                'success_convert' => '✓ Успешно переведено из системы :from в систему :to!',
                'error_general' => 'Произошла непредвиденная ошибка: '
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor Universal de Bases Numéricas | Bases 2 a 36',
                'description' => 'Convierte cualquier número entre cualquier base del 2 al 36. Una herramienta versátil para programadores y estudiantes de matemáticas.',
                'h1' => 'Convertidor de Bases Numéricas',
                'subtitle' => 'La herramienta de transformación numérica más flexible de la web.'
            ],
            'editor' => [
                'label_from' => 'De Base',
                'bases' => [
                    '2' => 'Decimal (Base 10)',
                    '8' => 'Octal (Base 8)',
                    '10' => 'Decimal (Base 10)',
                    '16' => 'Hexadecimal (Base 16)',
                    'generic' => 'Base :base'
                ],
                'label_to' => 'A Base',
                'btn_swap' => 'Intercambiar Bases',
                'presets' => 'Preajustes rápidos:',
                'preset_labels' => [
                    'bin_dec' => 'Binario → Dec',
                    'dec_hex' => 'Dec → Hex',
                    'hex_bin' => 'Hex → Binario',
                    'dec_oct' => 'Dec → Octal'
                ],
                'label_input' => 'Número de entrada',
                'ph_input' => 'Ingresa tu número aquí...',
                'label_output' => 'Resultado',
                'ph_output' => 'El resultado aparecerá aquí...',
                'btn_convert' => 'Convertir Número',
                'btn_clear' => 'Limpiar Todo',
                'btn_copy' => 'Copiar Resultado'
            ],
            'content' => [
                'hero_title' => 'Convertidor Universal de Bases Numéricas',
                'hero_subtitle' => 'Transforma valores instantáneamente entre cualquier base numérica del 2 al 36.',
                'p1' => 'Nuestro Convertidor Universal es una herramienta potente diseñada para la máxima flexibilidad. Mientras que la mayoría se limitan a bases comunes, el nuestro te permite trabajar con cualquier base del 2 al 36. Esto incluye duodecimal (base 12), vigesimal (base 20) e incluso base 36 (0-9 y A-Z). Es esencial para programadores que trabajan con codificaciones personalizadas y estudiantes de teoría de números.',
                'what_title' => '¿Qué son las bases numéricas?',
                'what_desc' => 'Una base numérica (o raíz) representa el número de dígitos únicos que usa un sistema. El sistema decimal (base 10) que usamos a diario tiene diez dígitos (0-9). Las computadoras usan el sistema binario (base 2), mientras que los desarrolladores suelen usar octal (base 8) y hexadecimal (base 16). Las bases superiores a 10 usan letras del alfabeto: por ejemplo, en base 16, A es 10 y F es 15.',
                'features_title' => 'Características principales',
                'features' => [
                    'instant' => [
                        'title' => 'Latencia Casi Cero',
                        'desc' => 'Algoritmos optimizados para ofrecer resultados mientras escribes o haces clic.'
                    ],
                    'universal' => [
                        'title' => 'Soporte Omni-Base',
                        'desc' => 'Libertad total para elegir cualquier base de origen y destino entre 2 y 36.'
                    ],
                    'presets' => [
                        'title' => 'Ajustes Inteligentes',
                        'desc' => 'Accesos directos para las conversiones más comunes en la industria.'
                    ],
                    'swap' => [
                        'title' => 'Intercambio Instantáneo',
                        'desc' => 'Invierte rápidamente tus bases de origen y destino con un botón dedicado.'
                    ],
                    'privacy' => [
                        'title' => 'Computación Segura',
                        'desc' => 'Tus números nunca se envían al servidor; toda la lógica se ejecuta localmente en tu navegador.'
                    ],
                    'free' => [
                        'title' => 'Gratis para Todos',
                        'desc' => 'Sin registros, sin límites y sin cuotas ocultas.'
                    ]
                ],
                'uses_title' => 'Aplicaciones Profesionales',
                'uses' => [
                    'programming' => [
                        'title' => 'Programación Full-Stack',
                        'desc' => 'Trabaja con bases personalizadas para ID únicos y compresión de datos.'
                    ],
                    'education' => [
                        'title' => 'Educación Informática',
                        'desc' => 'Visualiza cómo transitan los números entre diferentes sistemas posicionales.'
                    ],
                    'crypto' => [
                        'title' => 'Criptografía Creativa',
                        'desc' => 'Experimenta con bases no estándar para codificación simple y acertijos.'
                    ],
                    'web' => [
                        'title' => 'Desarrollo Web Avanzado',
                        'desc' => 'Analiza y convierte identificadores de URL que utilizan bases altas como base-36.'
                    ]
                ],
                'how_title' => 'Guía de Operación',
                'how_steps' => [
                    '1' => [
                        'title' => 'Selecciona la base de destino',
                        'desc' => 'Elige la base a la que deseas convertir tu número.'
                    ],
                    '2' => [
                        'title' => 'Ingresa el valor',
                        'desc' => 'Escribe el número usando los caracteres permitidos para tu base de origen.'
                    ],
                    '3' => [
                        'title' => 'Ejecuta',
                        'desc' => 'Haz clic en «Convertir Número» para procesar la transformación.'
                    ],
                    '4' => [
                        'title' => 'Captura el resultado',
                        'desc' => 'Copia el valor resultante para usarlo en tus aplicaciones externas.'
                    ],
                    '5' => [
                        'title' => 'Copiar:',
                        'desc' => 'Haz clic en «Copiar» para guardar el número convertido.'
                    ]
                ],
                'faq_title' => 'Preguntas Frecuentes',
                'faq' => [
                    'q1' => '¿Cuál es la base más alta soportada?',
                    'a1' => 'Este convertidor soporta todas las bases del 2 al 36. La base 36 usa los dígitos 0-9 y las letras A-Z.',
                    'q2' => '¿Cómo funcionan las bases superiores a 10?',
                    'a2' => 'Usan letras A-Z para valores del 10 al 35. Por ejemplo, en hexadecimal A=10, F=15.',
                    'q3' => '¿Puedo convertir números negativos?',
                    'a3' => 'Sí, el convertidor maneja números negativos y preserva el signo.',
                    'q4' => '¿Son seguros mis datos?',
                    'a4' => '¡Absolutamente! Todo sucede en tu navegador. Tus números nunca salen de tu dispositivo.'
                ]
            ],
            'js' => [
                'error_empty' => 'Por favor ingresa un número para convertir.',
                'error_invalid' => 'Entrada no válida para la base :base. Solo se permiten los caracteres :chars.',
                'error_format' => 'Se detectó un formato de número no válido.',
                'success_convert' => '✓ ¡Convertido de base :from a base :to con éxito!',
                'error_general' => 'Ocurrió un error inesperado: '
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

echo "Fix for number-base-converter completed.\n";
