<?php
$locales = ['ru', 'es'];
$categories = ['converters'];

$translations = [
    'ru' => [
        'decimal-binary-converter' => [
            'meta' => [
                'title' => 'Конвертер десятичных чисел в двоичные | Перевод из системы счисления 10 в 2',
                'description' => 'Быстрый, бесплатный и точный онлайн-инструмент для преобразования десятичных чисел в двоичные и наоборот. Идеально подходит для разработчиков и студентов.',
                'h1' => 'Конвертер десятичных ↔ двоичных чисел',
                'subtitle' => 'Лучший инструмент для перевода чисел из десятичной системы в двоичную и обратно.',
            ],
            'editor' => [
                'to_binary' => 'В двоичную',
                'to_decimal' => 'В десятичную',
                'label_decimal' => 'Десятичное число',
                'ph_decimal' => 'Введите десятичное число (например, 255)...',
                'label_result_binary' => 'Двоичный результат',
                'ph_output' => 'Результат появится здесь...',
                'btn_convert_binary' => 'Перевести в двоичную',
                'btn_clear' => 'Очистить всё',
                'btn_copy' => 'Копировать результат',
                'label_binary' => 'Двоичное число',
                'label_result_decimal' => 'Десятичный результат',
                'btn_convert_decimal' => 'Перевести в десятичную',
                'error_empty' => 'Пожалуйста, введите число для конвертации',
                'error_invalid_decimal' => 'Некорректное десятичное число. Используйте только цифры 0-9.',
                'success_binary' => '✓ Успешно переведено в двоичную систему!',
                'error_invalid_binary' => 'Некорректное двоичное число. Используйте только 0 и 1.',
                'success_decimal' => '✓ Успешно переведено в десятичную систему!',
                'error_general' => 'Произошла ошибка: ',
                'error_no_copy' => 'Нечего копировать! Сначала выполните конвертацию.',
                'success_copy' => '✓ Скопировано в буфер обмена!',
            ],
            'content' => [
                'p1' => 'Наш конвертер десятичных чисел в двоичные — это специализированный инструмент, предназначенный для преодоления разрыва между понятными человеку числами в 10-ричной системе и двоичной системой счисления (base-2), используемой компьютерами. Будь вы студент, изучающий основы информатики, или опытный разработчик, отлаживающий низкоуровневый код, этот инструмент обеспечит мгновенную двустороннюю конвертацию со 100% точностью.',
                'format_title' => ' Сила двоичных систем',
                'format_desc' => 'Двоичный код — это фундаментальный язык всех современных вычислительных систем. Он использует только две цифры, 0 и 1, для представления всех типов данных. Умение переводить числа между десятичной и двоичной системами является базовым навыком для любого специалиста, работающего с цифровыми технологиями.',
                'features_title' => 'Расширенные возможности инструмента',
                'uses_title' => 'Примеры профессионального и образовательного использования',
                'steps_title' => 'Как использовать этот инструмент',
                'examples_title' => 'Примеры конвертации',
                'faq_title' => 'Часто задаваемые вопросы',
                'features' => [
                    'fast' => [
                        'title' => 'Мгновенная обработка',
                        'desc' => 'Аппаратно-ускоренная конвертация, выдающая результат за миллисекунды.',
                    ],
                    'bi' => [
                        'title' => 'Двусторонний режим',
                        'desc' => 'Переключайтесь между режимами "десятичное в двоичное" и обратно одним щелчком мыши.',
                    ],
                    'secure' => [
                        'title' => 'Безопасность на стороне клиента',
                        'desc' => 'Все вычисления происходят в вашем браузере; ваши данные никогда не попадают на наши серверы.',
                    ],
                    'copy' => [
                        'title' => 'Быстрое копирование',
                        'desc' => 'Удобная функция копирования в буфер обмена для ускорения рабочего процесса.',
                    ],
                    'free' => [
                        'title' => 'Полностью бесплатно',
                        'desc' => 'Неограниченное использование всех функций без подписки или регистрации.',
                    ],
                    'universal' => [
                        'title' => 'Кроссплатформенность',
                        'desc' => 'Полностью адаптивный дизайн, идеально работающий на ПК, планшетах и смартфонах.',
                    ],
                ],
                'uses' => [
                    'programming' => [
                        'title' => 'Программная инженерия',
                        'desc' => 'Необходимо для побитовых операций, адресации памяти и низкоуровневого системного программирования.',
                    ],
                    'education' => [
                        'title' => 'Академические цели',
                        'desc' => 'Идеальный помощник для студентов, изучающих дискретную математику или архитектуру компьютера.',
                    ],
                    'debugging' => [
                        'title' => 'Сетевая отладка',
                        'desc' => 'Анализируйте IP-адреса, маски подсетей и сетевые протоколы на уровне битов.',
                    ],
                    'game' => [
                        'title' => 'Разработка игр',
                        'desc' => 'Оптимизируйте производительность, используя битовые маски и флаги для игровых состояний.',
                    ],
                    'crypto' => [
                        'title' => 'Криптография',
                        'desc' => 'Понимание представления данных в алгоритмах шифрования и хэш-функциях.',
                    ],
                    'network' => [
                        'title' => 'Аппаратная логика',
                        'desc' => 'Проектирование и проверка логических вентилей и цифровых схем.',
                    ],
                ],
                'steps' => [
                    '1' => [
                        'title' => 'Выберите режим',
                        'desc' => 'Выберите направление: из десятичной в двоичную или из двоичной в десятичную.',
                    ],
                    '2' => [
                        'title' => 'Введите значение',
                        'desc' => 'Введите или вставьте число в поле ввода.',
                    ],
                    '3' => [
                        'title' => 'Конвертировать',
                        'desc' => 'Нажмите кнопку конвертации, чтобы запустить расчет.',
                    ],
                    '4' => [
                        'title' => 'Проверьте результат',
                        'desc' => 'Посмотрите полученный результат во втором поле.',
                    ],
                    '5' => [
                        'title' => 'Скопируйте',
                        'desc' => 'Используйте кнопку копирования, чтобы сохранить результат в буфер обмена.',
                    ],
                ],
                'examples' => [
                    'small' => [
                        'title' => 'Базовая конвертация',
                        'desc' => 'Десятичное: 10 → Двоичное: 1010',
                    ],
                    'common' => [
                        'title' => 'Типичный 8-битный байт',
                        'desc' => 'Десятичное: 128 → Двоичное: 10000000',
                    ],
                    'power' => [
                        'title' => 'Полный байт',
                        'desc' => 'Десятичное: 255 → Двоичное: 11111111',
                    ],
                    'reverse' => [
                        'title' => 'Обратно в десятичную',
                        'desc' => 'Двоичное: 1100100 → Десятичное: 100',
                    ],
                ],
                'faq' => [
                    'q1' => 'Есть ли ограничения на размер чисел?',
                    'a1' => 'Наш инструмент обрабатывает очень большие числа, в пределах точности стандартных 64-битных целых чисел или BigInt в JavaScript.',
                    'q2' => 'Вы сохраняете числа, которые я конвертирую?',
                    'a2' => 'Нет. Все преобразования выполняются локально в вашем браузере. Данные не сохраняются и не передаются на сервер.',
                    'q3' => 'Почему некоторые двоичные числа длиннее других?',
                    'a3' => 'Двоичная система имеет основание 2, поэтому для представления того же значения требуется больше цифр (бит) по сравнению с десятичной системой.',
                    'q4' => 'Обрабатывает ли инструмент отрицательные числа?',
                    'a4' => 'В данный момент инструмент ориентирован на абсолютные значения без знака. Поддержка знаковых чисел планируется в будущем.',
                    'q5' => 'Можно ли использовать инструмент офлайн?',
                    'a5' => 'Если страница открыта в браузере, логика конвертации будет работать даже без подключения к интернету!',
                ],
            ],
        ],
        'decimal-hex-converter' => [
            'meta' => [
                'title' => 'Конвертер десятичных чисел в шестнадцатеричные | Перевод из системы 10 в 16',
                'description' => 'Мгновенно конвертируйте десятичные числа в HEX и наоборот. Идеально для веб-дизайнеров, разработчиков и программистов.',
                'h1' => 'Конвертер десятичных ↔ шестнадцатеричных чисел',
                'subtitle' => 'Эффективный перевод систем счисления для профессионалов.',
            ],
            'editor' => [
                'to_hex' => 'В шестнадцатеричную',
                'to_decimal' => 'В десятичную',
                'label_decimal' => 'Десятичное число',
                'ph_decimal' => 'Введите десятичное число (например, 255)...',
                'label_result_hex' => 'Шестнадцатеричный результат',
                'ph_output' => 'Результат появится здесь...',
                'btn_convert_hex' => 'Перевести в HEX',
                'btn_clear' => 'Очистить всё',
                'btn_copy' => 'Копировать результат',
                'label_hex' => 'Шестнадцатеричное число',
                'label_result_decimal' => 'Десятичный результат',
                'btn_convert_decimal' => 'Перевести в десятичную',
                'error_empty' => 'Пожалуйста, введите число для конвертации',
                'error_invalid_decimal' => 'Некорректное десятичное число. Используйте цифры 0-9.',
                'success_hex' => '✓ Успешно переведено в шестнадцатеричную систему!',
                'error_invalid_hex' => 'Некорректное HEX-число. Используйте 0-9 и A-F.',
                'success_decimal' => '✓ Успешно переведено в десятичную систему!',
                'error_general' => 'Произошла ошибка: ',
                'error_no_copy' => 'Нечего копировать! Сначала выполните конвертацию.',
                'success_copy' => '✓ Скопировано в буфер обмена!',
            ],
            'content' => [
                'p1' => 'Наш конвертер десятичных чисел в шестнадцатеричные — это высокопроизводительная утилита для IT-специалистов и студентов. Шестнадцатеричная система (Base-16) жизненно важна в вычислениях и часто используется как удобный для человека способ представления двоичных данных. Этот инструмент обеспечивает мгновенный перевод между системами счисления.',
                'format_title' => 'Понимание шестнадцатеричной системы',
                'format_desc' => 'Шестнадцатеричная система использует шестнадцать символов: 0-9 и буквы A-F для значений от десяти до пятнадцати. Эта система чрезвычайно эффективна для представления байтов и адресов памяти, так как одна цифра HEX соответствует ровно четырем битам.',
                'features_title' => 'Возможности инструмента',
                'uses_title' => 'Профессиональное применение',
                'steps_title' => 'Руководство пользователя',
                'examples_title' => 'Типовые примеры',
                'faq_title' => 'Общие вопросы',
                'features' => [
                    'fast' => [
                        'title' => 'Высокая скорость',
                        'desc' => 'Мгновенные результаты благодаря оптимизированному движку.',
                    ],
                    'bi' => [
                        'title' => 'Двусторонняя поддержка',
                        'desc' => 'Легко переключайтесь между десятичной и шестнадцатеричной системами.',
                    ],
                    'secure' => [
                        'title' => 'Безопасность и конфиденциальность',
                        'desc' => 'Ваши данные не покидают браузер, обеспечивая полную приватность.',
                    ],
                    'copy' => [
                        'title' => 'Интеграция с буфером обмена',
                        'desc' => 'Копирование результата в один клик.',
                    ],
                    'free' => [
                        'title' => '100% бесплатно',
                        'desc' => 'Полный доступ ко всем функциям без скрытых комиссий и лимитов.',
                    ],
                    'universal' => [
                        'title' => 'Удобство для устройств',
                        'desc' => 'Оптимизировано для мобильных устройств, планшетов и ПК.',
                    ],
                ],
                'uses' => [
                    'web' => [
                        'title' => 'Веб-дизайн (CSS)',
                        'desc' => 'Конвертируйте цвета RGB в HEX-коды для оформления сайтов.',
                    ],
                    'color' => [
                        'title' => 'Графический дизайн',
                        'desc' => 'Соблюдайте точность цветопередачи на различных цифровых платформах.',
                    ],
                    'memory' => [
                        'title' => 'Анализ памяти',
                        'desc' => 'Понимание адресов памяти и значений указателей при отладке ПО.',
                    ],
                    'unicode' => [
                        'title' => 'Кодировка символов',
                        'desc' => 'Работа с кодами символов Unicode.',
                    ],
                    'network' => [
                        'title' => 'Сетевые протоколы',
                        'desc' => 'Анализ заголовков пакетов и MAC-адресов оборудования.',
                    ],
                    'debugging' => [
                        'title' => 'Низкоуровневая отладка',
                        'desc' => 'Перевод "сырых" данных при просмотре машинного кода.',
                    ],
                ],
                'steps' => [
                    '1' => [
                        'title' => 'Выберите направление',
                        'desc' => 'Выберите режим: из десятичной в HEX или наоборот.',
                    ],
                    '2' => [
                        'title' => 'Введите данные',
                        'desc' => 'Введите число, которое хотите перевести, в поле ввода.',
                    ],
                    '3' => [
                        'title' => 'Конвертировать',
                        'desc' => 'Нажмите кнопку конвертации для получения результата.',
                    ],
                    '4' => [
                        'title' => 'Проверьте',
                        'desc' => 'Просмотрите полученный результат на точность.',
                    ],
                    '5' => [
                        'title' => 'Скопируйте результат',
                        'desc' => 'Нажмите кнопку "Копировать результат" для использования в проектах.',
                    ],
                ],
                'examples' => [
                    'small' => [
                        'title' => 'Быстрая проверка',
                        'desc' => 'Десятичное: 15 → HEX: F',
                    ],
                    'large' => [
                        'title' => 'Значение байта',
                        'desc' => 'Десятичное: 128 → HEX: 80',
                    ],
                    'color' => [
                        'title' => 'Максимальный байт',
                        'desc' => 'Десятичное: 255 → HEX: FF',
                    ],
                    'max' => [
                        'title' => 'Большое значение',
                        'desc' => 'Десятичное: 1024 → HEX: 400',
                    ],
                ],
                'faq' => [
                    'q1' => 'Какая связь между HEX и двоичной системой?',
                    'a1' => 'Одна шестнадцатеричная цифра представляет собой ровно четыре двоичных бита (ниббл). Это делает HEX гораздо более читаемым для человека.',
                    'q2' => 'Нужно ли добавлять "0x" при вводе?',
                    'a2' => 'Нет, наш инструмент автоматически обрабатывает числовой ввод без префиксов.',
                    'q3' => 'Чувствителен ли инструмент к регистру HEX-значений?',
                    'a3' => 'Нет. Вы можете вводить буквы как в верхнем (A-F), так и в нижнем (a-f) регистре.',
                    'q4' => 'Сохраняются ли мои данные на сервере?',
                    'a4' => 'Никогда. Вся логика выполняется в вашем браузере.',
                    'q5' => 'Почему в CSS используются HEX-коды?',
                    'a5' => 'HEX-коды — это краткий способ представления 24-битной глубины цвета (по 8 бит на красный, зеленый и синий) с помощью всего 6 символов.',
                ],
            ],
        ],
        'decimal-octal-converter' => [
            'meta' => [
                'title' => 'Конвертер десятичных чисел в восьмеричные | Перевод из системы 10 в 8',
                'description' => 'Мгновенный перевод десятичных чисел в восьмеричные и наоборот. Бесплатный инструмент для работы с правами доступа и анализа данных.',
                'h1' => 'Конвертер десятичных ↔ восьмеричных чисел',
                'subtitle' => 'Профессиональный инструмент для перевода чисел из 10-ричной в 8-ричную систему.',
            ],
            'editor' => [
                'to_octal' => 'В восьмеричную',
                'to_decimal' => 'В десятичную',
                'label_decimal' => 'Десятичное число',
                'ph_decimal' => 'Введите десятичное число (например, 511)...',
                'label_result_octal' => 'Восьмеричный результат',
                'ph_output' => 'Результат появится здесь...',
                'btn_convert_octal' => 'Перевести в OCTAL',
                'btn_clear' => 'Очистить всё',
                'btn_copy' => 'Копировать результат',
                'label_octal' => 'Восьмеричное число',
                'label_result_decimal' => 'Десятичный результат',
                'btn_convert_decimal' => 'Перевести в десятичную',
                'error_empty' => 'Пожалуйста, введите число для конвертации',
                'error_invalid_decimal' => 'Некорректное десятичное число. Используйте цифры 0-9.',
                'success_octal' => '✓ Успешно переведено в восьмеричную систему!',
                'error_invalid_octal' => 'Некорректное восьмеричное число. Используйте цифры 0-7.',
                'success_decimal' => '✓ Успешно переведено в десятичную систему!',
                'error_general' => 'Произошла ошибка: ',
                'error_no_copy' => 'Нечего копировать! Сначала выполните конвертацию.',
                'success_copy' => '✓ Скопировано в буфер обмена!',
            ],
            'content' => [
                'p1' => 'Наш конвертер десятичных чисел в восьмеричные — это надежная онлайн-утилита. Восьмеричная система (base-8) использует восемь цифр (0-7). Хотя она менее распространена сегодня, чем шестнадцатеричная, она остается критически важной для прав доступа к файлам в стиле Unix.',
                'format_title' => 'Значимость восьмеричной системы',
                'format_desc' => 'На заре компьютерной эры восьмеричная система была популярна, так как 3 бита могли быть идеально представлены одной восьмеричной цифрой. Сегодня она чаще всего встречается в команде "chmod" в Linux и macOS.',
                'features_title' => 'Возможности инструмента',
                'uses_title' => 'Практическое применение',
                'steps_title' => 'Пошаговое руководство',
                'examples_title' => 'Типовые примеры',
                'faq_title' => 'Часто задаваемые вопросы',
                'features' => [
                    'fast' => [
                        'title' => 'Быстрая конвертация',
                        'desc' => 'Мгновенные результаты на аппаратном уровне.',
                    ],
                    'bi' => [
                        'title' => 'Двусторонний режим',
                        'desc' => 'Бесшовное переключение между десятичной и восьмеричной системами.',
                    ],
                    'secure' => [
                        'title' => 'Гарантия конфиденциальности',
                        'desc' => 'Все вычисления в вашем браузере; данные не передаются на сервер.',
                    ],
                    'copy' => [
                        'title' => 'Копирование результата',
                        'desc' => 'Копируйте значения одним кликом.',
                    ],
                    'free' => [
                        'title' => 'Нулевая стоимость',
                        'desc' => 'Бесплатный доступ ко всем функциям навсегда.',
                    ],
                    'universal' => [
                        'title' => 'Универсальный доступ',
                        'desc' => 'Работает на всех устройствах и в современных браузерах.',
                    ],
                ],
                'uses' => [
                    'linux' => [
                        'title' => 'Права доступа Linux',
                        'desc' => 'Рассчитывайте числовые значения прав для команды chmod (например, 755).',
                    ],
                    'computing' => [
                        'title' => 'Информатика',
                        'desc' => 'Изучайте, как работают позиционные системы счисления помимо base-2, 10 и 16.',
                    ],
                    'permission' => [
                        'title' => 'Контроль доступа',
                        'desc' => 'Управление настройками безопасности в системах с восьмеричным представлением.',
                    ],
                    'legacy' => [
                        'title' => 'Устаревшие системы',
                        'desc' => 'Анализ данных со старого оборудования и мейнфреймов.',
                    ],
                    'aviation' => [
                        'title' => 'Авиационные транспондеры',
                        'desc' => 'Понимание ответных кодов самолетов, которые являются восьмеричными значениями.',
                    ],
                    'education' => [
                        'title' => 'Обучение математике',
                        'desc' => 'Исследуйте свойства математики и нотации по основанию 8.',
                    ],
                ],
                'steps' => [
                    '1' => [
                        'title' => 'Выберите режим',
                        'desc' => 'Выберите направление: из 10-ричной в 8-ричную систему или наоборот.',
                    ],
                    '2' => [
                        'title' => 'Введите данные',
                        'desc' => 'Введите числовое значение в соответствующее поле.',
                    ],
                    '3' => [
                        'title' => 'Конвертировать',
                        'desc' => 'Запустите расчет кнопкой конвертации.',
                    ],
                    '4' => [
                        'title' => 'Проверьте',
                        'desc' => 'Посмотрите результат во втором поле.',
                    ],
                    '5' => [
                        'title' => 'Скопируйте',
                        'desc' => 'Сохраните результат в буфер обмена для использования.',
                    ],
                ],
                'examples' => [
                    'small' => [
                        'title' => 'Простой пример',
                        'desc' => 'Десятичное: 8 → Восьмеричное: 10',
                    ],
                    'common' => [
                        'title' => 'Значение 100',
                        'desc' => 'Десятичное: 100 → Восьмеричное: 144',
                    ],
                    'max' => [
                        'title' => 'Права доступа',
                        'desc' => 'Десятичное: 511 → Восьмеричное: 777',
                    ],
                    'reverse' => [
                        'title' => 'Обратный перевод',
                        'desc' => 'Восьмеричное: 100 → Десятичное: 64',
                    ],
                ],
                'faq' => [
                    'q1' => 'Почему восьмеричная система важна для Linux?',
                    'a1' => 'Права доступа к файлам (чтение, запись, выполнение) сгруппированы по три бита, что идеально соответствует одной восьмеричной цифре.',
                    'q2' => 'Есть ли в этой системе буквы?',
                    'a2' => 'Нет. В восьмеричной системе используются только цифры от 0 до 7.',
                    'q3' => 'Как конвертировать восьмеричное число в десятичное вручную?',
                    'a3' => 'Умножьте каждую цифру на 8 в степени ее позиции (начиная с 0 справа) и сложите результаты.',
                    'q4' => 'Используется ли восьмеричная система сегодня?',
                    'a4' => 'Да, в основном в системном программировании, сетевых протоколах и авиации.',
                    'q5' => 'Безопасно ли использовать онлайн-конвертер?',
                    'a5' => 'Наш инструмент работает полностью в вашем браузере, данные не передаются в сеть.',
                ],
            ],
        ],
    ],
    'es' => [
        'decimal-binary-converter' => [
            'meta' => [
                'title' => 'Convertidor de Decimal a Binario | Traducción de Base-10 a Base-2',
                'description' => 'Herramienta en línea rápida, gratuita y precisa para convertir números decimales a binarios y viceversa. Ideal para desarrolladores y estudiantes.',
                'h1' => 'Convertidor Decimal ↔ Binario',
                'subtitle' => 'La herramienta definitiva para la conversión numérica de base-10 a base-2 y viceversa.',
            ],
            'editor' => [
                'to_binary' => 'A Binario',
                'to_decimal' => 'A Decimal',
                'label_decimal' => 'Número Decimal',
                'ph_decimal' => 'Ingrese un número decimal (ej., 255)...',
                'label_result_binary' => 'Resultado Binario',
                'ph_output' => 'El resultado aparecerá aquí...',
                'btn_convert_binary' => 'Convertir a Binario',
                'btn_clear' => 'Borrar Todo',
                'btn_copy' => 'Copiar Resultado',
                'label_binary' => 'Número Binario',
                'label_result_decimal' => 'Resultado Decimal',
                'btn_convert_decimal' => 'Convertir a Decimal',
                'error_empty' => 'Por favor, ingrese un número para convertir',
                'error_invalid_decimal' => 'Número decimal inválido. Use solo dígitos 0-9.',
                'success_binary' => '✓ ¡Convertido a binario con éxito!',
                'error_invalid_binary' => 'Número binario inválido. Use solo 0 y 1.',
                'success_decimal' => '✓ ¡Convertido a decimal con éxito!',
                'error_general' => 'Ocurrió un error: ',
                'error_no_copy' => '¡Nada que copiar! Realice una conversión primero.',
                'success_copy' => '✓ ¡Copiado al portapapeles!',
            ],
            'content' => [
                'p1' => 'Nuestro convertidor de decimal a binario es una herramienta especializada diseñada para cerrar la brecha entre los números de base-10 legibles por humanos y el sistema binario de base-2 utilizado por las computadoras. Ya sea que sea un estudiante aprendiendo los fundamentos de la informática o un desarrollador experimentado depurando código de bajo nivel, esta herramienta proporciona conversiones bidireccionales instantáneas con un 100% de precisión.',
                'format_title' => 'El Poder de los Sistemas Binarios',
                'format_desc' => 'El binario es el lenguaje fundamental de todos los sistemas informáticos modernos. Utiliza solo dos dígitos, 0 y 1, para representar todos los tipos de datos. Traducir entre decimal y binario es una habilidad central para cualquier profesional que trabaje con tecnología digital.',
                'features_title' => 'Características Avanzadas',
                'uses_title' => 'Casos de Uso Profesionales y Educativos',
                'steps_title' => 'Cómo usar esta herramienta',
                'examples_title' => 'Ejemplos de Conversión',
                'faq_title' => 'Preguntas Frecuentes',
                'features' => [
                    'fast' => [
                        'title' => 'Procesamiento Instantáneo',
                        'desc' => 'Conversiones aceleradas por hardware que ofrecen resultados en milisegundos.',
                    ],
                    'bi' => [
                        'title' => 'Bidireccional',
                        'desc' => 'Cambie entre los modos dec-a-bin y bin-a-dec con un solo clic.',
                    ],
                    'secure' => [
                        'title' => 'Seguridad del Lado del Cliente',
                        'desc' => 'Todos los cálculos ocurren en su navegador; sus datos nunca llegan a nuestros servidores.',
                    ],
                    'copy' => [
                        'title' => 'Copia Rápida',
                        'desc' => 'Funcionalidad conveniente de copiar al portapapeles para flujos de trabajo optimizados.',
                    ],
                    'free' => [
                        'title' => 'Completamente Gratis',
                        'desc' => 'Uso ilimitado de todas las funciones sin suscripción ni registro.',
                    ],
                    'universal' => [
                        'title' => 'Multiplataforma',
                        'desc' => 'Diseño totalmente responsivo que funciona perfectamente en escritorio, tablet y móvil.',
                    ],
                ],
                'uses' => [
                    'programming' => [
                        'title' => 'Ingeniería de Software',
                        'desc' => 'Esencial para operaciones a nivel de bits, direccionamiento de memoria y programación de sistemas.',
                    ],
                    'education' => [
                        'title' => 'Excelencia Académica',
                        'desc' => 'Un compañero perfecto para estudiantes de matemáticas discretas o arquitectura de computadoras.',
                    ],
                    'debugging' => [
                        'title' => 'Depuración de Redes',
                        'desc' => 'Analice direcciones IP, máscaras de subred y protocolos de red a nivel de bits.',
                    ],
                    'game' => [
                        'title' => 'Desarrollo de Juegos',
                        'desc' => 'Optimice el rendimiento utilizando máscaras de bits y banderas para los estados de los personajes.',
                    ],
                    'crypto' => [
                        'title' => 'Criptografía',
                        'desc' => 'Comprenda la representación de datos en algoritmos de cifrado y funciones hash.',
                    ],
                    'network' => [
                        'title' => 'Lógica de Hardware',
                        'desc' => 'Diseño y verificación de puertas y circuitos lógicos digitales.',
                    ],
                ],
                'steps' => [
                    '1' => [
                        'title' => 'Seleccione el Modo',
                        'desc' => 'Elija entre decimal a binario o binario a decimal.',
                    ],
                    '2' => [
                        'title' => 'Ingrese el Valor',
                        'desc' => 'Escriba o pegue su número en el campo de entrada.',
                    ],
                    '3' => [
                        'title' => 'Convertir',
                        'desc' => 'Haga clic en el botón de convertir para activar el cálculo.',
                    ],
                    '4' => [
                        'title' => 'Revisar',
                        'desc' => 'Verifique el resultado obtenido en el campo secundario.',
                    ],
                    '5' => [
                        'title' => 'Copiar',
                        'desc' => 'Use el botón Copiar para guardar el resultado en su portapapeles.',
                    ],
                ],
                'examples' => [
                    'small' => [
                        'title' => 'Conversión Básica',
                        'desc' => 'Decimal: 10 → Binario: 1010',
                    ],
                    'common' => [
                        'title' => 'Byte de 8 bits típico',
                        'desc' => 'Decimal: 128 → Binario: 10000000',
                    ],
                    'power' => [
                        'title' => 'Byte Completo',
                        'desc' => 'Decimal: 255 → Binario: 11111111',
                    ],
                    'reverse' => [
                        'title' => 'De vuelta a Decimal',
                        'desc' => 'Binario: 1100100 → Decimal: 100',
                    ],
                ],
                'faq' => [
                    'q1' => '¿Hay límites en el tamaño de los números?',
                    'a1' => 'Nuestra herramienta maneja números muy grandes, dentro de los límites de BigInt de JavaScript o la precisión estándar de 64 bits.',
                    'q2' => '¿Almacenan los números que convierto?',
                    'a2' => 'No. Todas las conversiones se realizan localmente en su navegador web. Nada se guarda ni se transmite.',
                    'q3' => '¿Por qué algunos números binarios son más largos que otros?',
                    'a3' => 'El binario es un sistema de base-2, por lo que los números más grandes requieren más dígitos (bits) para representar su valor.',
                    'q4' => '¿Maneja números negativos?',
                    'a4' => 'Actualmente se enfoca en valores absolutos sin signo. La representación con signo se planea para futuras actualizaciones.',
                    'q5' => '¿Está disponible para uso sin conexión?',
                    'a5' => 'Si mantiene esta página abierta, la lógica de JavaScript seguirá funcionando incluso sin internet.',
                ],
            ],
        ],
        'decimal-hex-converter' => [
            'meta' => [
                'title' => 'Convertidor de Decimal a Hexadecimal | Traducción Rápida de Base-16',
                'description' => 'Convierta decimal a hexadecimal y viceversa al instante. Perfecto para diseñadores web, desarrolladores y programadores.',
                'h1' => 'Convertidor Decimal ↔ Hexadecimal',
                'subtitle' => 'Traducción eficiente de sistemas numéricos para flujos de trabajo profesionales.',
            ],
            'editor' => [
                'to_hex' => 'A Hexadecimal',
                'to_decimal' => 'A Decimal',
                'label_decimal' => 'Número Decimal',
                'ph_decimal' => 'Ingrese un número decimal (ej., 255)...',
                'label_result_hex' => 'Resultado Hexadecimal',
                'ph_output' => 'El resultado aparecerá aquí...',
                'btn_convert_hex' => 'Convertir a Hex',
                'btn_clear' => 'Borrar Todo',
                'btn_copy' => 'Copiar Resultado',
                'label_hex' => 'Número Hexadecimal',
                'label_result_decimal' => 'Resultado Decimal',
                'btn_convert_decimal' => 'Convertir a Decimal',
                'error_empty' => 'Por favor, ingrese un número para convertir',
                'error_invalid_decimal' => 'Número decimal inválido. Use dígitos 0-9.',
                'success_hex' => '✓ ¡Convertido a hexadecimal con éxito!',
                'error_invalid_hex' => 'Número hexadecimal inválido. Use 0-9 y A-F.',
                'success_decimal' => '✓ ¡Convertido a decimal con éxito!',
                'error_general' => 'Ocurrió un error: ',
                'error_no_copy' => '¡Nada que copiar! Realice una conversión primero.',
                'success_copy' => '✓ ¡Copiado al portapapeles!',
            ],
            'content' => [
                'p1' => 'Nuestro convertidor de decimal a hexadecimal es una utilidad de alto rendimiento para profesionales y estudiantes. El hexadecimal (Base-16) es vital en informática, ya que es una forma legible para humanos de representar datos binarios.',
                'format_title' => 'Comprensión del Hexadecimal',
                'format_desc' => 'El sistema hexadecimal utiliza dieciséis símbolos: 0-9 y A-F para los valores del diez al quince. Es extremadamente eficiente para representar bytes y direcciones de memoria, ya que un dígito hexadecimal corresponde exactamente a cuatro bits.',
                'features_title' => 'Características de la Herramienta',
                'uses_title' => 'Aplicaciones Profesionales',
                'steps_title' => 'Manual de Usuario',
                'examples_title' => 'Ejemplos Comunes',
                'faq_title' => 'Preguntas Comunes',
                'features' => [
                    'fast' => [
                        'title' => 'Alta Velocidad',
                        'desc' => 'Obtenga resultados al instante con nuestro motor optimizado.',
                    ],
                    'bi' => [
                        'title' => 'Soporte Bidireccional',
                        'desc' => 'Cambie fácilmente entre sistemas decimal y hexadecimal.',
                    ],
                    'secure' => [
                        'title' => 'Seguro y Privado',
                        'desc' => 'Sus entradas nunca salen de su navegador para una privacidad total.',
                    ],
                    'copy' => [
                        'title' => 'Integración con Portapapeles',
                        'desc' => 'Copia en un clic para el resultado convertido.',
                    ],
                    'free' => [
                        'title' => '100% Gratis',
                        'desc' => 'Acceso completo a todas las funciones sin costos ocultos ni límites.',
                    ],
                    'universal' => [
                        'title' => 'Compatible con Dispositivos',
                        'desc' => 'Optimizado para móvil, tablet y escritorio.',
                    ],
                ],
                'uses' => [
                    'web' => [
                        'title' => 'Diseño Web (CSS)',
                        'desc' => 'Convierta valores de color RGB a códigos hexadecimales para el estilo de sitios web.',
                    ],
                    'color' => [
                        'title' => 'Diseño Gráfico',
                        'desc' => 'Mantenga la precisión del color en diferentes plataformas digitales.',
                    ],
                    'memory' => [
                        'title' => 'Análisis de Memoria',
                        'desc' => 'Comprenda las direcciones de memoria y los valores de los punteros al depurar software.',
                    ],
                    'unicode' => [
                        'title' => 'Codificación de Caracteres',
                        'desc' => 'Trabaje con puntos Unicode y códigos de caracteres.',
                    ],
                    'network' => [
                        'title' => 'Protocolos de Red',
                        'desc' => 'Analice encabezados de paquetes y direcciones MAC de hardware.',
                    ],
                    'debugging' => [
                        'title' => 'Depuración de Bajo Nivel',
                        'desc' => 'Traduzca datos brutos al inspeccionar código de máquina.',
                    ],
                ],
                'steps' => [
                    '1' => [
                        'title' => 'Establecer Dirección',
                        'desc' => 'Elija entre el modo decimal a hex o hex a decimal.',
                    ],
                    '2' => [
                        'title' => 'Ingresar Datos',
                        'desc' => 'Escriba el número que desea traducir en el cuadro de entrada.',
                    ],
                    '3' => [
                        'title' => 'Convertir',
                        'desc' => 'Presione el botón de conversión para obtener el resultado.',
                    ],
                    '4' => [
                        'title' => 'Verificar',
                        'desc' => 'Revise el resultado para asegurar su precisión.',
                    ],
                    '5' => [
                        'title' => 'Copiar Resultado',
                        'desc' => 'Haga clic en "Copiar Resultado" para usarlo en sus proyectos.',
                    ],
                ],
                'examples' => [
                    'small' => [
                        'title' => 'Chequeo Rápido',
                        'desc' => 'Decimal: 15 → Hex: F',
                    ],
                    'large' => [
                        'title' => 'Valor de Byte',
                        'desc' => 'Decimal: 128 → Hex: 80',
                    ],
                    'color' => [
                        'title' => 'Byte Máximo',
                        'desc' => 'Decimal: 255 → Hex: FF',
                    ],
                    'max' => [
                        'title' => 'Valor Grande',
                        'desc' => 'Decimal: 1024 → Hex: 400',
                    ],
                ],
                'faq' => [
                    'q1' => '¿Cuál es la relación entre hex y binario?',
                    'a1' => 'Un dígito hexadecimal representa exactamente cuatro bits binarios. Esto hace que el hex sea mucho más fácil de leer.',
                    'q2' => '¿Debo incluir "0x" en la entrada?',
                    'a2' => 'No, nuestra herramienta maneja automáticamente la conversión basada en la entrada numérica bruta.',
                    'q3' => '¿Distingue entre mayúsculas y minúsculas para valores hex?',
                    'a3' => 'No. Puede ingresar valores hex usando tanto mayúsculas (A-F) como minúsculas (a-f).',
                    'q4' => '¿Se almacenan mis datos en el servidor?',
                    'a4' => 'Nunca. Toda la lógica se ejecuta en su navegador mediante JavaScript.',
                    'q5' => '¿Por qué CSS usa códigos hex?',
                    'a5' => 'Los códigos hex son una forma concisa de representar la profundidad de color de 24 bits usando solo 6 caracteres.',
                ],
            ],
        ],
        'decimal-octal-converter' => [
            'meta' => [
                'title' => 'Convertidor de Decimal a Octal | Traducción de Base-10 a Base-8',
                'description' => 'Convierta decimal a octal y viceversa al instante. Herramienta gratuita para permisos, informática y análisis de datos.',
                'h1' => 'Convertidor Decimal ↔ Octal',
                'subtitle' => 'La herramienta definitiva para la conversión numérica de base-10 a base-8.',
            ],
            'editor' => [
                'to_octal' => 'A Octal',
                'to_decimal' => 'A Decimal',
                'label_decimal' => 'Número Decimal',
                'ph_decimal' => 'Ingrese un número decimal (ej., 511)...',
                'label_result_octal' => 'Resultado Octal',
                'ph_output' => 'El resultado aparecerá aquí...',
                'btn_convert_octal' => 'Convertir a Octal',
                'btn_clear' => 'Borrar Todo',
                'btn_copy' => 'Copiar Resultado',
                'label_octal' => 'Número Octal',
                'label_result_decimal' => 'Resultado Decimal',
                'btn_convert_decimal' => 'Convertir a Decimal',
                'error_empty' => 'Por favor, ingrese un número para convertir',
                'error_invalid_decimal' => 'Número decimal inválido. Use dígitos 0-9.',
                'success_octal' => '✓ ¡Convertido a octal con éxito!',
                'error_invalid_octal' => 'Número octal inválido. Use dígitos 0-7.',
                'success_decimal' => '✓ ¡Convertido a decimal con éxito!',
                'error_general' => 'Ocurrió un error: ',
                'error_no_copy' => '¡Nada que copiar! Realice una conversión primero.',
                'success_copy' => '✓ ¡Copiado al portapapeles!',
            ],
            'content' => [
                'p1' => 'Nuestro convertidor de decimal a octal es una utilidad confiable para tareas informáticas especializadas. El octal (base-8) utiliza ocho dígitos (0-7). Aunque es menos común hoy que el hexadecimal, sigue siendo importante en los permisos de archivos estilo Unix.',
                'format_title' => 'La Importancia del Octal',
                'format_desc' => 'En los inicios de la informática, el octal era popular porque 3 bits podían representarse perfectamente con un dígito octal. Hoy se ve principalmente en el comando "chmod" en sistemas Linux y macOS.',
                'features_title' => 'Características de la Herramienta',
                'uses_title' => 'Aplicaciones Prácticas',
                'steps_title' => 'Guía Paso a Paso',
                'examples_title' => 'Ejemplos Comunes',
                'faq_title' => 'Preguntas Frecuentes',
                'features' => [
                    'fast' => [
                        'title' => 'Conversión Rápida',
                        'desc' => 'Velocidad a nivel de hardware para resultados casi instantáneos.',
                    ],
                    'bi' => [
                        'title' => 'Bidireccional',
                        'desc' => 'Cambie sin problemas entre los modos dec-a-oct y oct-a-dec.',
                    ],
                    'secure' => [
                        'title' => 'Privacidad Garantizada',
                        'desc' => 'Los cálculos ocurren en su navegador; no se envían datos a nuestros servidores.',
                    ],
                    'copy' => [
                        'title' => 'Copia de Resultados',
                        'desc' => 'Copie sus valores convertidos con un solo clic.',
                    ],
                    'free' => [
                        'title' => 'Cero Costo',
                        'desc' => 'Acceso gratuito a todas las funciones de conversión para siempre.',
                    ],
                    'universal' => [
                        'title' => 'Acceso Universal',
                        'desc' => 'Funciona sin problemas en todos los dispositivos y navegadores modernos.',
                    ],
                ],
                'uses' => [
                    'linux' => [
                        'title' => 'Permisos de Linux',
                        'desc' => 'Calcule los valores numéricos de permisos para el comando chmod (ej., 755).',
                    ],
                    'computing' => [
                        'title' => 'Ciencias de la Computación',
                        'desc' => 'Aprenda cómo funcionan los sistemas numéricos posicionales más allá de la base 2, 10 y 16.',
                    ],
                    'permission' => [
                        'title' => 'Control de Acceso',
                        'desc' => 'Gestione configuraciones de seguridad en sistemas que utilizan representación octal.',
                    ],
                    'legacy' => [
                        'title' => 'Sistemas Heredados',
                        'desc' => 'Procese y analice datos de arquitecturas de hardware antiguas y mainframes.',
                    ],
                    'aviation' => [
                        'title' => 'Transpondedores de Aviación',
                        'desc' => 'Comprenda los códigos squawk usados por las aeronaves, que son valores octales.',
                    ],
                    'education' => [
                        'title' => 'Educación Matemática',
                        'desc' => 'Explore las propiedades de las matemáticas y la notación de base-8.',
                    ],
                ],
                'steps' => [
                    '1' => [
                        'title' => 'Seleccionar Modo',
                        'desc' => 'Elija su dirección de conversión (Base-10 a Base-8 o viceversa).',
                    ],
                    '2' => [
                        'title' => 'Ingresar Datos',
                        'desc' => 'Escriba el valor numérico en el campo de entrada correspondiente.',
                    ],
                    '3' => [
                        'title' => 'Convertir',
                        'desc' => 'Haga clic en el botón de conversión para realizar el cálculo.',
                    ],
                    '4' => [
                        'title' => 'Revisar',
                        'desc' => 'Verifique el resultado obtenido en el segundo campo.',
                    ],
                    '5' => [
                        'title' => 'Copiar',
                        'desc' => 'Guarde el resultado en su portapapeles para su uso.',
                    ],
                ],
                'examples' => [
                    'small' => [
                        'title' => 'Ejemplo Simple',
                        'desc' => 'Decimal: 8 → Octal: 10',
                    ],
                    'common' => [
                        'title' => 'Valor 100',
                        'desc' => 'Decimal: 100 → Octal: 144',
                    ],
                    'max' => [
                        'title' => 'Permisos de Acceso',
                        'desc' => 'Decimal: 511 → Octal: 777',
                    ],
                    'reverse' => [
                        'title' => 'Conversión Inversa',
                        'desc' => 'Octal: 100 → Decimal: 64',
                    ],
                ],
                'faq' => [
                    'q1' => '¿Por qué es importante el octal en Linux?',
                    'a1' => 'Los permisos de archivos (lectura, escritura, ejecución) se agrupan en tres bits, lo que coincide perfectamente con un dígito octal.',
                    'q2' => '¿Hay letras en este sistema?',
                    'a2' => 'No. El sistema octal solo utiliza los dígitos del 0 al 7.',
                    'q3' => '¿Cómo convertir octal a decimal manualmente?',
                    'a3' => 'Multiplique cada dígito por 8 elevado a su posición (empezando por 0 desde la derecha) y sume los resultados.',
                    'q4' => '¿Se usa el octal hoy en día?',
                    'a4' => 'Sí, principalmente en programación de sistemas, protocolos de red y aviación.',
                    'q5' => '¿Es seguro usar un convertidor en línea?',
                    'a5' => 'Nuestra herramienta funciona totalmente en su navegador, los datos no se transmiten a la red.',
                ],
            ],
        ],
    ],
];

foreach ($locales as $locale) {
    if (!isset($translations[$locale]))
        continue;
    foreach ($categories as $cat) {
        $jsonPath = "resources/lang/$locale/tools/$cat.json";
        if (file_exists($jsonPath)) {
            $data = json_decode(file_get_contents($jsonPath), true) ?: [];
            foreach ($translations[$locale] as $slug => $content) {
                $data[$slug] = $content;
            }
            file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            echo "Updated $jsonPath\n";
        }
    }
}
echo "Batch 1.1 update completed.\n";
