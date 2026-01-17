<?php

$ru_translations = [
    'password-generator' => [
        'editor' => [
            'title' => 'Создайте свой надежный пароль сейчас',
            'length_label' => 'Длина пароля:',
            'chars' => 'символов',
            'strength' => [
                'weak' => '8 (Слабый)',
                'good' => '16 (Хороший)',
                'strong' => '32 (Надежный)',
                'very_strong' => '64 (Очень надежный)'
            ],
            'include_label' => 'Включить типы символов:',
            'option_uppercase' => 'Заглавные буквы (A-Z)',
            'option_uppercase_desc' => 'Добавляет заглавные буквы для сложности',
            'option_lowercase' => 'Строчные буквы (a-z)',
            'option_lowercase_desc' => 'Необходимы для надежности пароля',
            'option_numbers' => 'Цифры (0-9)',
            'option_numbers_desc' => 'Увеличивает энтропию пароля',
            'option_symbols' => 'Специальные символы (!@#$%)',
            'option_symbols_desc' => 'Максимальная защита безопасности',
            'btn_generate' => 'Сгенерировать надежный пароль',
            'result_title' => 'Ваш сгенерированный пароль',
            'strength_score' => 'Оценка безопасности:',
            'btn_copy_text' => 'Копировать пароль',
            'btn_copy_final' => 'Копировать в буфер обмена',
            'btn_regenerate' => 'Сгенерировать заново'
        ],
        'content' => [
            'faq_hero_title' => 'Зачем использовать наш генератор безопасных паролей?',
            'faq' => [
                'q1' => 'Насколько безопасны пароли, создаваемые этим инструментом?',
                'a1' => 'Наш генератор паролей использует криптографически безопасную генерацию случайных чисел. Пароли создаются полностью в вашем бразуере с помощью метода JavaScript crypto.getRandomValues(), что обеспечивает истинную случайность и максимальную безопасность. Мы никогда не храним, не передаем и не логируем сгенерированные пароли.',
                'q2' => 'Какова идеальная длина пароля?',
                'a2' => 'Мы рекомендуем минимум 16 символов для обеспечения высокой безопасности. Более длинные пароли (24-32 символа) обеспечивают еще лучшую защиту от атак методом перебора. Наш генератор поддерживает до 64 символов для максимальной безопасности.',
                'q3' => 'Должен ли я включать специальные символы в свой пароль?',
                'a3' => 'Да, обязательно! Включение специальных символов (!@#$%^&*) значительно увеличивает сложность и энтропию пароля. Пароль, содержащий заглавные и строчные буквы, цифры и символы, экспоненциально труднее взломать, чем пароль, состоящий только из букв и цифр.',
                'q4' => 'Как мне запомнить сложные пароли?',
                'a4' => 'Не пытайтесь их запомнить! Используйте надежный менеджер паролей, такой как LastPass, 1Password, Bitwarden или Dashlane, для безопасного хранения всех ваших паролей. Менеджеры паролей шифруют ваши пароли и требуют от вас запоминания только одного мастер-пароля.',
                'q5' => 'Безопасно ли использовать онлайн-генератор паролей?',
                'a5' => 'Да, наш генератор паролей полностью безопасен, так как вся генерация происходит локально в вашем браузере. Пароли никогда не отправляются на наши серверы и нигде не сохраняются.',
                'q6' => 'Как часто я должен менять свои пароли?',
                'a6' => 'Для критически важных учетных записей (электронная почта, банковские операции, работа) меняйте пароли каждые 3-6 месяцев. Если вы подозреваете взлом или получили уведомление о нарушении безопасности, немедленно измените пароль.'
            ],
            'seo' => [
                'title' => 'Понимание безопасности паролей и шифрования',
                'p1' => 'Безопасность паролей является основой онлайн-безопасности. Надежный пароль служит первой линией защиты от несанкционированного доступа к вашей личной информации, финансовым данным и цифровой личности.',
                'p2' => 'Надежность пароля измеряется его энтропией — степенью случайности и непредсказуемости. 16-символьный пароль, содержащий все типы символов, имеет значительно более высокую энтропию, чем простой 8-символьный пароль.',
                'p3' => 'Наш бесплатный инструмент генерации паролей предназначен для всех — от частных лиц, защищающих личные аккаунты, до компаний, обеспечивающих безопасность доступа сотрудников. Генерируйте неограниченное количество паролей совершенно бесплатно, без регистрации.'
            ]
        ],
        'js' => [
            'generating' => 'Генерация безопасного пароля...',
            'strength' => [
                'very_strong' => '✓ Очень надежный — отличная безопасность пароля!',
                'strong' => '✓ Надежный — хорошая безопасность пароля.',
                'medium' => '⚠ Средний — рассмотрите возможность сделать его надежнее.',
                'weak' => '⚠ Слабый — пожалуйста, сгенерируйте более надежный пароль.'
            ],
            'error_generating' => 'Ошибка при генерации пароля. Пожалуйста, попробуйте еще раз',
            'copied' => 'Скопировано!',
            'error_copy' => 'Не удалось скопировать пароль. Пожалуйста, скопируйте вручную.'
        ]
    ],
    'qr-code-generator' => [
        'meta' => [
            'title' => 'Бесплатный онлайн генератор QR-кодов',
            'description' => 'Мгновенно создавайте собственные QR-коды для URL-адресов, текста, WiFi и многого другого. Скачивайте высококачественные изображения в формате PNG.',
            'h1' => 'Генератор QR-кодов',
            'subtitle' => 'Мгновенное создание пользовательских QR-кодов для любых целей'
        ],
        'editor' => [
            'title' => 'Создать QR-код',
            'label_text' => 'Введите текст или URL',
            'ph_text' => 'Введите текст, URL или любые данные, которые вы хотите закодировать...',
            'label_size' => 'Размер QR-кода',
            'opt_small' => 'Маленький (128x128)',
            'opt_medium' => 'Средний (256x256)',
            'opt_large' => 'Большой (512x512)',
            'opt_xl' => 'Очень большой (1024x1024)',
            'btn_generate' => 'Создать QR-код',
            'btn_download' => 'Скачать QR-код',
            'preview_title' => 'Предпросмотр',
            'preview_placeholder' => 'Ваш QR-код появится здесь'
        ],
        'content' => [
            'hero_title' => 'Бесплатный генератор QR-кодов',
            'hero_subtitle' => 'Мгновенное создание пользовательских QR-кодов для любых целей',
            'p1' => 'Наш бесплатный генератор QR-кодов мгновенно создает высококачественные QR-коды. Идеально подходит для бизнеса, маркетологов, организаторов мероприятий и всех, кому необходимо быстро обмениваться информацией. Создавайте QR-коды для URL-адресов, текста, контактной информации, учетных данных WiFi и многого другого. Скачивайте в различных размерах и используйте где угодно — совершенно бесплатно, регистрация не требуется.',
            'faq' => [
                'q1' => 'Являются ли QR-коды постоянными?',
                'a1' => 'Да! QR-коды являются статичными и постоянными. После создания они всегда будут работать до тех пор, пока закодированные данные (например, URL) остаются действительными.',
                'q2' => 'Являются ли QR-коды постоянными?',
                'a2' => 'Да! QR-коды являются статичными и постоянными. После создания они всегда будут работать до тех пор, пока закодированные данные (например, URL) остаются действительными.',
                'q3' => 'Какой размер следует использовать для печати?',
                'a3' => 'Для визитных карточек используйте не менее 256 пикселей. Для плакатов и баннеров используйте 512 или 1024 пикселя. Чем больше размер печати, тем больше должен быть QR-код для удобства сканирования.',
                'q4' => 'Могу ли я отслеживать сканирования QR-кодов?',
                'a4' => 'Наш инструмент генерирует статические QR-коды без функции отслеживания. Чтобы отслеживать сканирования, используйте сервис сокращения ссылок с аналитикой перед созданием QR-кода или воспользуйтесь сервисом динамических QR-кодов.',
                'q5' => 'Есть ли предел количеству данных, которые я могу закодировать?',
                'a5' => 'QR-коды могут хранить до 4296 буквенно-цифровых символов, но для достижения наилучших результатов сканирования данные должны быть краткими. Лучше всего работают URL-адреса короче 100 символов.',
                'q6' => 'Истекает ли срок действия QR-кодов?',
                'a6' => 'Нет, сами QR-коды никогда не истекают. Однако, если QR-код ссылается на URL-адрес, который был удален или изменен, QR-код перестанет работать.'
            ],
            'features_title' => 'Возможности',
            'features' => [
                'instant' => [
                    'title' => 'Мгновенная генерация',
                    'desc' => 'Создавайте QR-коды за считанные секунды с предпросмотром в реальном времени'
                ],
                'sizes' => [
                    'title' => 'Несколько размеров',
                    'desc' => 'Выбирайте от 128 до 1024 пикселей для любых целей'
                ],
                'download' => [
                    'title' => 'Легкое скачивание',
                    'desc' => 'Скачивайте в формате изображения PNG одним кликом'
                ],
                'privacy' => [
                    'title' => 'Конфиденциальность прежде всего',
                    'desc' => 'Вся обработка происходит в вашем браузере'
                ],
                'free' => [
                    'title' => '100% бесплатно',
                    'desc' => 'Без ограничений, без водяных знаков, без регистрации'
                ],
                'compatibility' => [
                    'title' => 'Универсальная совместимость',
                    'desc' => 'Работает со всеми сканерами QR-кодов'
                ]
            ],
            'uses_title' => '🎯 Распространенные варианты использования',
            'uses' => [
                'urls' => [
                    'title' => '🔗 URL-адреса сайтов',
                    'desc' => 'Мгновенно направляйте пользователей на ваш сайт, целевую страницу или в интернет-магазин'
                ],
                'contact' => [
                    'title' => '👤 Контактная информация',
                    'desc' => 'Делитесь визитными карточками vCard с адресом электронной почты, телефоном и адресом'
                ],
                'social' => [
                    'title' => '👍 Социальные сети',
                    'desc' => 'Ссылки на ваши профили в соцсетях, канал YouTube или Instagram'
                ],
                'tickets' => [
                    'title' => '🎟️ Билеты на мероприятия',
                    'desc' => 'Создавайте сканируемые билеты для мероприятий и конференций'
                ],
                'product' => [
                    'title' => '📦 Информация о продукте',
                    'desc' => 'Добавляйте QR-коды к товарам для доступа к инструкциям, характеристикам или проверке подлинности'
                ],
                'payment' => [
                    'title' => '💳 Платежные ссылки',
                    'desc' => 'Обеспечьте быстрые платежи через PayPal, Venmo или криптокошельки'
                ]
            ],
            'how_title' => '📚 Как использовать',
            'how_steps' => [
                '1' => [
                    'title' => 'Введите ваши данные:',
                    'desc' => 'Введите или вставьте текст, URL или информацию, которую вы хотите закодировать'
                ],
                '2' => [
                    'title' => 'Выберите размер:',
                    'desc' => 'Выберите размер QR-кода в зависимости от того, где вы будете его использовать'
                ],
                '3' => [
                    'title' => 'Создайте:',
                    'desc' => 'Нажмите "Создать QR-код", чтобы мгновенно создать свой QR-код'
                ],
                '4' => [
                    'title' => 'Скачайте:',
                    'desc' => 'Нажмите "Скачать QR-код", чтобы сохранить изображение PNG'
                ],
                '5' => [
                    'title' => 'Используйте везде:',
                    'desc' => 'Печатайте, делитесь в цифровом виде или добавляйте в маркетинговые материалы'
                ]
            ],
            'best_practices_title' => '💡 Полезные советы',
            'best_practices' => [
                'test' => [
                    'title' => 'Протестируйте перед печатью:',
                    'desc' => 'Всегда сканируйте QR-код, чтобы убедиться, что он работает правильно'
                ],
                'size' => [
                    'title' => 'Используйте подходящий размер:',
                    'desc' => 'Крупные QR-коды легче сканировать на расстоянии'
                ],
                'contrast' => [
                    'title' => 'Обеспечьте контрастность:',
                    'desc' => 'Печатайте на белом или светлом фоне для лучшего сканирования'
                ],
                'context' => [
                    'title' => 'Добавьте контекст:',
                    'desc' => 'Добавьте призыв к действию, например "Сканируйте, чтобы перейти на сайт"'
                ],
                'short' => [
                    'title' => 'Используйте короткие URL:',
                    'desc' => 'Короткие URL-адреса создают более простые и удобные для сканирования QR-коды'
                ]
            ],
            'faq_title' => 'Часто задаваемые вопросы'
        ],
        'js' => [
            'error_empty' => 'Пожалуйста, введите текст или URL для создания QR-кода',
            'error_generating' => 'Ошибка при создании QR-кода.',
            'error_no_code' => 'Сначала создайте QR-код',
            'error_image_not_found' => 'Изображение QR-кода не найдено'
        ]
    ]
];

$es_translations = [
    'password-generator' => [
        'editor' => [
            'title' => 'Genere su contraseña segura ahora',
            'length_label' => 'Longitud de la contraseña:',
            'chars' => 'caracteres',
            'strength' => [
                'weak' => '8 (Débil)',
                'good' => '16 (Buena)',
                'strong' => '32 (Fuerte)',
                'very_strong' => '64 (Muy fuerte)'
            ],
            'include_label' => 'Incluir tipos de caracteres:',
            'option_uppercase' => 'Mayúsculas (A-Z)',
            'option_uppercase_desc' => 'Añade letras mayúsculas para mayor complejidad',
            'option_lowercase' => 'Minúsculas (a-z)',
            'option_lowercase_desc' => 'Esencial para la seguridad de la contraseña',
            'option_numbers' => 'Números (0-9)',
            'option_numbers_desc' => 'Aumenta la entropía de la contraseña',
            'option_symbols' => 'Símbolos especiales (!@#$%)',
            'option_symbols_desc' => 'Máxima protección de seguridad',
            'btn_generate' => 'Generar contraseña fuerte',
            'result_title' => 'Su contraseña generada',
            'strength_score' => 'Puntuación de seguridad:',
            'btn_copy_text' => 'Copiar contraseña',
            'btn_copy_final' => 'Copiar al portapapeles',
            'btn_regenerate' => 'Regenerar'
        ],
        'content' => [
            'faq_hero_title' => '¿Por qué usar nuestro generador de contraseñas seguras?',
            'faq' => [
                'q1' => '¿Qué tan seguras son las contraseñas generadas por esta herramienta?',
                'a1' => 'Nuestro generador de contraseñas utiliza una generación de números aleatorios criptográficamente segura. Las contraseñas se generan íntegramente en su navegador utilizando el método crypto.getRandomValues() de JavaScript, garantizando una aleatoriedad real y la máxima seguridad. Nunca almacenamos, transmitimos ni registramos ninguna contraseña generada.',
                'q2' => '¿Cuál es la longitud ideal de la contraseña?',
                'a2' => 'Recomendamos un mínimo de 16 caracteres para una seguridad sólida. Las contraseñas más largas (24-32 caracteres) proporcionan una protección aún mejor contra ataques de fuerza bruta. Nuestro generador soporta hasta 64 caracteres para la máxima seguridad.',
                'q3' => '¿Debo incluir caracteres especiales en mi contraseña?',
                'a3' => '¡Sí, absolutamente! Incluir caracteres especiales (!@#$%^&*) aumenta significativamente la complejidad y la entropía de la contraseña. Una contraseña con mayúsculas, minúsculas, números y símbolos es exponencialmente más difícil de descifrar que una con solo letras y números.',
                'q4' => '¿Cómo recuerdo las contraseñas complejas?',
                'a4' => '¡No intente memorizarlas! Use un gestor de contraseñas de buena reputación como LastPass, 1Password, Bitwarden o Dashlane para almacenar de forma segura todas sus contraseñas. Los gestores de contraseñas cifran sus contraseñas y solo requieren que recuerde una contraseña maestra.',
                'q5' => '¿Es seguro usar un generador de contraseñas en línea?',
                'a5' => 'Sí, nuestro generador de contraseñas es completamente seguro porque toda la generación de contraseñas ocurre localmente en su navegador. Las contraseñas nunca se envían a nuestros servidores ni se almacenan en ningún lugar.',
                'q6' => '¿Con qué frecuencia debo cambiar mis contraseñas?',
                'a6' => 'Para cuentas críticas (correo electrónico, banca, trabajo), cambie las contraseñas cada 3-6 meses. Si sospecha de una brecha o recibe una alerta de seguridad, cambie su contraseña inmediatamente.'
            ],
            'seo' => [
                'title' => 'Entendiendo la seguridad de las contraseñas y el cifrado',
                'p1' => 'La seguridad de las contraseñas es la base de la seguridad en línea. Una contraseña fuerte actúa como la primera línea de defensa contra el acceso no autorizado a su información personal, datos financieros e identidad digital.',
                'p2' => 'La fuerza de una contraseña se mide por su entropía: la cantidad de aleatoriedad e imprevisibilidad. Una contraseña de 16 caracteres con todos los tipos de caracteres tiene una entropía significativamente mayor que una simple contraseña de 8 caracteres.',
                'p3' => 'Nuestra herramienta gratuita de generación de contraseñas está diseñada para todos: desde individuos que protegen cuentas personales hasta empresas que aseguran el acceso de los empleados. Genere contraseñas ilimitadas, completamente gratis, sin necesidad de registro.'
            ]
        ],
        'js' => [
            'generating' => 'Generando contraseña segura...',
            'strength' => [
                'very_strong' => '✓ Muy fuerte: ¡Excelente seguridad de contraseña!',
                'strong' => '✓ Fuerte: Buena seguridad de contraseña.',
                'medium' => '⚠ Media: Considere hacerla más fuerte.',
                'weak' => '⚠ Débil: Por favor, genere una contraseña más fuerte.'
            ],
            'error_generating' => 'Error al generar la contraseña. Por favor, inténtelo de nuevo',
            'copied' => '¡Copiado!',
            'error_copy' => 'Error al copiar la contraseña. Por favor, cópiela manualmente.'
        ]
    ],
    'qr-code-generator' => [
        'meta' => [
            'title' => 'Generador de códigos QR en línea gratuito',
            'description' => 'Cree códigos QR personalizados al instante para URL, texto, WiFi y más. Descargue imágenes PNG de alta calidad.',
            'h1' => 'Generador de códigos QR',
            'subtitle' => 'Cree códigos QR personalizados al instante para cualquier propósito'
        ],
        'editor' => [
            'title' => 'Generar código QR',
            'label_text' => 'Ingrese texto o URL',
            'ph_text' => 'Ingrese texto, URL o cualquier dato que desee codificar...',
            'label_size' => 'Tamaño del código QR',
            'opt_small' => 'Pequeño (128x128)',
            'opt_medium' => 'Medio (256x256)',
            'opt_large' => 'Grande (512x512)',
            'opt_xl' => 'Extra grande (1024x1024)',
            'btn_generate' => 'Generar código QR',
            'btn_download' => 'Descargar código QR',
            'preview_title' => 'Vista previa',
            'preview_placeholder' => 'Su código QR aparecerá aquí'
        ],
        'content' => [
            'hero_title' => 'Generador de códigos QR gratuito',
            'hero_subtitle' => 'Cree códigos QR personalizados al instante para cualquier propósito',
            'p1' => 'Nuestro generador de códigos QR gratuito crea códigos QR de alta calidad al instante. Perfecto para empresas, especialistas en marketing, organizadores de eventos y cualquier persona que necesite compartir información rápidamente. Genere códigos QR para URL, texto, información de contacto, credenciales WiFi y más. Descargue en varios tamaños y úselos en cualquier lugar: completamente gratis, sin necesidad de registro.',
            'faq' => [
                'q1' => '¿Son permanentes los códigos QR?',
                'a1' => '¡Sí! Los códigos QR son estáticos y permanentes. Una vez generados, siempre funcionarán mientras los datos codificados (como una URL) sigan siendo válidos.',
                'q2' => '¿Son permanentes los códigos QR?',
                'a2' => '¡Sí! Los códigos QR son estáticos y permanentes. Una vez generados, siempre funcionarán mientras los datos codificados (como una URL) sigan siendo válidos.',
                'q3' => '¿Qué tamaño debo usar para la impresión?',
                'a3' => 'Para tarjetas de presentación, use al menos 256 px. Para carteles y pancartas, use 512 px o 1024 px. Cuanto mayor sea el tamaño de impresión, mayor debe ser el código QR para facilitar el escaneo.',
                'q4' => '¿Puedo rastrear los escaneos de códigos QR?',
                'a4' => 'Nuestra herramienta genera códigos QR estáticos sin rastreo. Para rastrear los escaneos, use un acortador de URL con análisis antes de generar el código QR, o use un servicio de códigos QR dinámicos.',
                'q5' => '¿Hay un límite en la cantidad de datos que puedo codificar?',
                'a5' => 'Los códigos QR pueden almacenar hasta 4296 caracteres alfanuméricos, pero para obtener mejores resultados de escaneo, mantenga los datos concisos. Las URL de menos de 100 caracteres funcionan mejor.',
                'q6' => '¿Caducan los códigos QR?',
                'a6' => 'No, los códigos QR en sí mismos nunca caducan. Sin embargo, si el código QR enlaza a una URL que se elimina o se cambia, el código QR dejará de funcionar.'
            ],
            'features_title' => 'Características',
            'features' => [
                'instant' => [
                    'title' => 'Generación instantánea',
                    'desc' => 'Cree códigos QR en segundos con vista previa en tiempo real'
                ],
                'sizes' => [
                    'title' => 'Múltiples tamaños',
                    'desc' => 'Elija desde 128 px hasta 1024 px para cualquier caso de uso'
                ],
                'download' => [
                    'title' => 'Descarga fácil',
                    'desc' => 'Descargue como imagen PNG con un solo clic'
                ],
                'privacy' => [
                    'title' => 'Privacidad primero',
                    'desc' => 'Todo el procesamiento ocurre en su navegador'
                ],
                'free' => [
                    'title' => '100% gratis',
                    'desc' => 'Sin límites, sin marcas de agua, sin necesidad de registro'
                ],
                'compatibility' => [
                    'title' => 'Compatibilidad universal',
                    'desc' => 'Funciona con todos los escáners de códigos QR'
                ]
            ],
            'uses_title' => '🎯 Casos de uso comunes',
            'uses' => [
                'urls' => [
                    'title' => '🔗 URL de sitios web',
                    'desc' => 'Dirija a los usuarios a su sitio web, página de aterrizaje o tienda en línea al instante'
                ],
                'contact' => [
                    'title' => '👤 Información de contacto',
                    'desc' => 'Comparta vCards con detalles de correo electrónico, teléfono y dirección'
                ],
                'social' => [
                    'title' => '👍 Redes sociales',
                    'desc' => 'Enlace a sus perfiles sociales, canal de YouTube o Instagram'
                ],
                'tickets' => [
                    'title' => '🎟️ Boletos para eventos',
                    'desc' => 'Genere boletos escaneables para eventos y conferencias'
                ],
                'product' => [
                    'title' => '📦 Información del producto',
                    'desc' => 'Agregue códigos QR a productos para manuales, especificaciones o autenticidad'
                ],
                'payment' => [
                    'title' => '💳 Enlaces de pago',
                    'desc' => 'Habilite pagos rápidos a través de PayPal, Venmo o monederos de criptomonedas'
                ]
            ],
            'how_title' => '📚 Cómo usar',
            'how_steps' => [
                '1' => [
                    'title' => 'Ingrese sus datos:',
                    'desc' => 'Escriba o pegue el texto, la URL o la información que desea codificar'
                ],
                '2' => [
                    'title' => 'Elija el tamaño:',
                    'desc' => 'Seleccione el tamaño del código QR según el lugar donde lo usará'
                ],
                '3' => [
                    'title' => 'Genere:',
                    'desc' => 'Haga clic en "Generar código QR" para crear su código QR al instante'
                ],
                '4' => [
                    'title' => 'Descargue:',
                    'desc' => 'Haga clic en "Descargar código QR" para guardar la imagen PNG'
                ],
                '5' => [
                    'title' => 'Use en cualquier lugar:',
                    'desc' => 'Imprima, comparta digitalmente o añada a materiales de marketing'
                ]
            ],
            'best_practices_title' => '💡 Mejores prácticas',
            'best_practices' => [
                'test' => [
                    'title' => 'Pruebe antes de imprimir:',
                    'desc' => 'Escanee siempre su código QR para verificar que funcione correctamente'
                ],
                'size' => [
                    'title' => 'Use el tamaño adecuado:',
                    'desc' => 'Los códigos QR más grandes son más fáciles de escanear desde la distancia'
                ],
                'contrast' => [
                    'title' => 'Garantice el contraste:',
                    'desc' => 'Imprima sobre fondos blancos o claros para un mejor escaneo'
                ],
                'context' => [
                    'title' => 'Añada contexto:',
                    'desc' => 'Incluya una llamada a la acción como "Escanea para visitar el sitio web"'
                ],
                'short' => [
                    'title' => 'Mantenga las URL cortas:',
                    'desc' => 'Las URL más cortas crean códigos QR más simples y fáciles de escanear'
                ]
            ],
            'faq_title' => 'Preguntas frecuentes'
        ],
        'js' => [
            'error_empty' => 'Por favor, ingrese texto o URL para generar el código QR',
            'error_generating' => 'Error al generar el código QR.',
            'error_no_code' => 'Por favor, genere un código QR primero',
            'error_image_not_found' => 'Imagen del código QR no encontrada'
        ]
    ]
];

function applyTranslations($locale, $newTranslations)
{
    $filePath = "resources/lang/$locale/tools/utility.json";
    $currentData = json_decode(file_get_contents($filePath), true);

    foreach ($newTranslations as $tool => $data) {
        if (isset($currentData[$tool])) {
            $currentData[$tool] = array_replace_recursive($currentData[$tool], $data);
        } else {
            $currentData[$tool] = $data;
        }
    }

    file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "Applied translations for $locale\n";
}

applyTranslations('ru', $ru_translations);
applyTranslations('es', $es_translations);
