<?php

return array (
  'epoch-time-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Конвертер Epoch Time',
      'subtitle' => 'Конвертируйте Unix timestamps в читаемые даты и обратно',
      'title' => 'Epoch Время Конвертироватьer - Unix Времяstamp to Date & Date to Времяstamp',
      'description' => 'Конвертировать Unix Epoch Времяstamps to human-readable dates and vice versa. Support for Местный Время, GMT/UTC, and relative Время with our Бесплатно, Мгновенный Конвертироватьer.',
    ),
    'seo' => 
    array (
      'title' => 'Конвертер Epoch Time - Unix Timestamp в Дату и обратно',
      'h1' => 'Конвертер Epoch Time',
      'description' => 'Конвертируйте Unix Epoch timestamp в читаемую дату и наоборот. Поддержка местного времени, GMT/UTC и относительного времени. Бесплатный и мгновенный конвертер.',
    ),
    'content' => 
    array (
      'hero_title' => 'Расшифровка Unix Epoch',
      'hero_description' => 'Время Unix (или Epoch time) — это система, проверяющая пульс цифрового мира. Она отслеживает количество секунд, прошедших с "Unix Epoch" — 00:00:00 UTC 1 января 1970 года.',
      'why_title' => 'Зачем использовать Unix Time?',
      'efficiency_title' => 'Эффективность',
      'efficiency_desc' => 'Компьютеры предпочитают простые целые числа сложным строкам дат. Их быстрее обрабатывать и хранить.',
      'universal_title' => 'Универсальность',
      'universal_desc' => 'Игнорирует часовые пояса при хранении. 1696516200 — это один и тот же момент в Токио и в Нью-Йорке.',
      'math_title' => 'Простая Математика',
      'math_desc' => 'Вычисление разницы между двумя датами так же просто, как вычитание (A - B).',
      'code_title' => 'Получить текущий Epoch на вашем языке',
      'apocalypse_title' => 'Проблема 2038 года',
      'apocalypse_desc' => '19 января 2038 года у 32-битных систем закончатся числа для хранения времени, что вызовет "Unix Y2K". Большинство современных 64-битных систем уже в безопасности на следующие 292 миллиарда лет.',
      'faq_title' => 'Часто задаваемые вопросы',
    ),
  ),
  'date-to-unix' => 
  array (
    'meta' => 
    array (
      'h1' => 'Конвертер Даты в Unix Timestamp',
      'subtitle' => 'Преобразуйте даты в Unix epoch timestamps для программирования и баз данных',
    ),
    'seo' => 
    array (
      'title' => 'Конвертер Даты в Unix Timestamp - Мгновенно и Точно',
      'h1' => 'Конвертер Даты в Unix Timestamp',
      'description' => 'Мгновенно конвертируйте любую дату и время в Unix Timestamp. Поддерживает ввод как местного времени, так и UTC/GMT для точного планирования на стороне сервера и отладки.',
    ),
    'form' => 
    array (
      'title' => 'Выберите дату и время',
      'date_label' => 'Дата',
      'time_label' => 'Время',
      'local_time' => 'Использовать местное время',
      'utc_mode' => 'Использовать UTC/GMT',
      'button' => 'Конвертировать в Timestamp',
      'result_title' => 'UNIX TIMESTAMP',
      'result_subtitle' => 'Секунды с 1 янв 1970 (UTC)',
    ),
    'content' => 
    array (
      'hero_title' => 'Конвертация человеческого времени в машинное',
      'hero_description' => 'Преобразуйте читаемые даты в точные Unix Timestamps. Необходимо для запросов к базам данных, параметров API и отладки кода.',
      'mode_title' => 'Понимание режимов',
      'local_title' => 'Местный режим',
      'local_desc' => 'Использует текущий часовой пояс вашего браузера. Лучше всего подходит для поиска метки времени события, происходящего "здесь и сейчас" или в вашем конкретном местоположении.',
      'utc_title' => 'Режим UTC',
      'utc_desc' => 'Рассматривает ваш ввод как Всемирное координированное время (GMT). Необходимо при работе с логами серверов или координации международных событий.',
      'snippets_title' => 'Фрагменты кода для генерации Timestamp',
      'use_cases_title' => 'Распространенные сценарии использования',
      'use_case_1' => 'Установка времени истечения cookie или токенов.',
      'use_case_2' => 'Планирование cron или задач базы данных.',
      'use_case_3' => 'Эффективное сравнение дат в логике кода.',
    ),
  ),
  'unix-to-date' => 
  array (
    'meta' => 
    array (
      'h1' => 'Конвертер Unix Timestamp в Дату',
      'subtitle' => 'Конвертируйте Unix timestamps в читаемые форматы дат между часовыми поясами',
    ),
    'seo' => 
    array (
      'title' => 'Конвертер Unix Timestamp в Дату - Читаемый формат',
      'h1' => 'Конвертер Unix Timestamp в Дату',
      'description' => 'Декодируйте Unix Timestamps в читаемые человеком даты. Узнайте точное время в GMT, вашем местном часовом поясе и формате ISO 8601 мгновенно.',
    ),
    'form' => 
    array (
      'title' => 'Введите Unix Timestamp',
      'placeholder' => 'напр. 1672531200',
      'button_now' => 'Использовать сейчас',
      'button_convert' => 'Конвертировать в Дату',
      'result_gmt' => 'GMT / UTC',
      'result_local' => 'Ваше Местное Время',
      'result_iso' => 'Формат ISO 8601',
    ),
    'content' => 
    array (
      'hero_title' => 'Расшифровка Epoch',
      'hero_description' => 'Превратите эти загадочные 10-значные числа обратно в понятия, понятные людям: годы, месяцы, дни и часы.',
      'formats_title' => 'Объяснение форматов вывода',
      'format_gmt_title' => 'GMT/UTC',
      'format_gmt_example' => 'Пт, 01 Янв 2023 00:00:00 GMT',
      'format_gmt_desc' => 'Абсолютный эталон времени, не зависящий от перехода на летнее время или географического положения.',
      'format_iso_title' => 'ISO 8601',
      'format_iso_example' => '2023-01-01T00:00:00.000Z',
      'format_iso_desc' => 'Международный стандартный формат (YYYY-MM-DD), идеально подходящий для обмена данными и API.',
      'format_local_title' => 'Ваше Местное Время',
      'format_local_example' => 'Вс 01 Янв 2023 00:00:00 GMT+0300',
      'format_local_desc' => 'Показывает, как это выглядит в местном часовом поясе вашего браузера',
      'reverse_title' => 'Обратный процесс',
      'reverse_description' => 'Нужно наоборот? Преобразуйте человеческую дату обратно в timestamp.',
      'reverse_button' => 'Перейти к инструменту Дата в Timestamp',
      'tip_title' => 'Совет разработчика',
      'tip_desc' => 'Если ваш timestamp состоит из 13 цифр вместо 10, значит он в миллисекундах! Наш инструмент автоматически обнаруживает и обрабатывает timestamp в миллисекундах (распространено в JavaScript и Java), корректно конвертируя их.',
    ),
  ),
  'local-to-utc' => 
  array (
    'meta' => 
    array (
      'h1' => 'Конвертер Местного времени в UTC',
      'subtitle' => 'Конвертируйте локальное время в UTC для глобальной синхронизации',
    ),
    'seo' => 
    array (
      'title' => 'Конвертер Местного времени в UTC - Настройка часового пояса',
      'h1' => 'Конвертер Местного времени в UTC',
      'description' => 'Конвертируйте ваше местное время в UTC (Всемирное координированное время). Необходимо для планирования международных звонков и синхронизации журналов сервера.',
    ),
    'form' => 
    array (
      'title' => 'Конвертировать Местное Время',
      'subtitle' => 'Выберите дату и время в вашем местном поясе, чтобы увидеть их эквивалент в UTC.',
      'label' => 'Введите Местную Дату и Время',
      'button' => 'Конвертировать в UTC',
      'timezone_label' => 'Ваш Часовой Пояс:',
      'result_title' => 'ВРЕМЯ UTC',
      'result_subtitle' => 'Глобальный Стандарт',
    ),
    'content' => 
    array (
      'why_title' => 'Зачем конвертировать в UTC?',
      'why_desc' => 'UTC (Всемирное координированное время) — это основной стандарт времени, по которому мир регулирует часы и время. Оно не соблюдает переход на летнее время, что делает его стабильной точкой отсчета.',
      'utc_standard_title' => 'Глобальный Стандарт',
      'utc_standard_intro' => 'Разработчики, пилоты и ученые используют UTC, потому что:',
      'timezone_reason' => 'Часовые пояса политизированы: Они часто меняются на основе законов.',
      'dst_reason' => 'DST сбивает с толку: Часы прыгают вперед и назад, создавая пропуски или дубликаты при использовании местного времени.',
      'political_reason' => 'Никакой двусмысленности: 10:00 UTC — это один и тот же момент везде во вселенной.',
      'utc_immunity' => 'UTC не подвержено этим проблемам, обеспечивая непрерывную, линейную шкалу времени.',
      'applications_title' => 'Применение в реальном мире',
      'aviation_title' => 'Авиация и Судоходство',
      'aviation_desc' => 'Планы полетов и журналы всегда ведутся в UTC, чтобы предотвратить путаницу при пересечении границ.',
      'servers_title' => 'Серверы и Базы Данных',
      'servers_desc' => 'Компьютеры хранят логии в UTC, чтобы событие в Токио идеально совпадало с событием в Лондоне.',
      'events_title' => 'Глобальные События',
      'events_desc' => 'Вебинары и запуски продуктов часто анонсируются в UTC или GMT, чтобы предоставить единое время для всех.',
    ),
  ),
  'utc-to-local' => 
  array (
    'meta' => 
    array (
      'h1' => 'Конвертер UTC в Местное Время',
      'subtitle' => 'Преобразуйте UTC время в ваш локальный часовой пояс мгновенно',
    ),
    'seo' => 
    array (
      'title' => 'Конвертер UTC в Местное Время - Глобальный Переводчик Времени',
      'h1' => 'Конвертер UTC в Местное Время',
      'description' => 'Быстро конвертируйте время UTC/GMT в ваш местный часовой пояс. Идеально для проверки логов сервера, времени международных встреч и расписания глобальных событий.',
    ),
    'form' => 
    array (
      'result_title' => 'Конвертировать UTC в Местное',
      'help_text' => 'Введите дату/время в UTC (GMT), чтобы увидеть, сколько это по вашему местному времени.',
      'label' => 'Введите дату и время UTC',
      'button' => 'Конвертировать в Местное Время',
      'result_title_output' => 'ВАШЕ МЕСТНОЕ ВРЕМЯ',
      'example' => 'Пример: 2023-11-25 14:30:00',
    ),
    'content' => 
    array (
      'hero_title' => 'Перевод Глобального Времени в Местное',
      'hero_desc' => 'UTC — это язык серверов и международных стандартов. Этот инструмент переводит его обратно во время на ваших настенных часах.',
      'why_title' => 'Почему серверы любят UTC',
      'consistency_title' => 'Постоянство',
      'consistency_desc' => 'UTC никогда не меняется из-за перехода на летнее время.',
      'universality_title' => 'Универсальность',
      'universality_desc' => 'Оно работает одинаково, независимо от того, где физически находится сервер.',
      'simplicity_title' => 'Простота',
      'simplicity_desc' => 'Это позволяет избежать проблемы "двусмысленного часа" при переводе часов назад.',
      'offsets_title' => 'Как читать смещения',
      'offsets_intro' => 'Когда вы конвертируете UTC в местное время, вы применяете "Смещение" (Offset).',
      'offset_minus' => 'UTC-5 (напр., Нью-Йорк EST) означает, что местное время отстает от UTC на 5 часов.',
      'offset_plus' => 'UTC+9 (напр., Токио) означает, что местное время опережает UTC на 9 часов.',
      'offset_half' => 'Некоторые места, такие как Индия, используют смещение в полчаса (UTC+5:30).',
      'golden_rule_title' => 'Золотое правило',
      'golden_rule_desc' => 'Всегда ХРАНИТЕ время в UTC. ОТОБРАЖАЙТЕ время только в Местном.',
    ),
  ),
  'time-zone-converter' => 
  array (
    'meta' => 
    array (
      'h1' => 'Конвертер Часовых Поясов',
      'subtitle' => 'Конвертируйте время между разными часовыми поясами мира точно',
      'title' => 'Время Zone Конвертироватьer - Global Meeting Planner',
      'description' => 'Visualize Время differences across the globe. Compare Времяs between two cities or zones side-by-side. Ideal for arranging international meetings.',
    ),
    'seo' => 
    array (
      'title' => 'Конвертер Часовых Поясов - Планировщик Встреч',
      'h1' => 'Конвертер Часовых Поясов',
      'description' => 'Визуализируйте разницу во времени по всему миру. Сравнивайте время между двумя городами или зонами бок о бок. Идеально для организации международных встреч.',
    ),
    'form' => 
    array (
      'source_label' => 'Исходное время',
      'target_label' => 'Целевое время',
      'date_time_label' => 'Дата и время',
      'timezone_label' => 'Часовой пояс',
      'result_label' => 'КОНВЕРТИРОВАННОЕ ВРЕМЯ',
      'default_time' => '-- : --',
      'result_subtitle' => 'Скорректировано с учетом разницы во времени',
      'selected_time_label' => 'ВЫБРАННОЕ ВРЕМЯ',
      'auto_calculated' => 'Авторасчет',
    ),
    'content' => 
    array (
      'hero_title' => 'Управление мировым временем',
      'hero_desc' => 'Планируйте встречи, успевайте на рейсы и координируйте действия на разных континентах без головной боли. Наш конвертер берет все расчеты на себя.',
      'meeting_planner_title' => 'Планировщик международных встреч',
      'precision_title' => 'Почему важна точность',
      'business_title' => 'Деловые встречи',
      'business_desc' => 'Избегайте неловкости звонка клиенту в 3 часа ночи.',
      'travel_title' => 'Планирование путешествий',
      'travel_desc' => 'Точно знайте, когда ваш рейс приземлится по местному времени.',
      'events_title' => 'Прямые эфиры',
      'events_desc' => 'Не пропустите начало глобальной трансляции.',
      'tips_title' => 'Советы профи по часовым поясам',
      'tip1_title' => 'Следите за DST',
      'tip1_desc' => 'Правила летнего времени варьируются в зависимости от страны и меняются каждый год. Автоматические конвертеры надежнее, чем расчеты в уме.',
      'tip2_title' => 'Используйте 24-часовой формат',
      'tip2_desc' => 'Это устраняет двусмысленность между AM и PM (например, 12:00 — это полночь или полдень?).',
      'tip3_title' => 'Проверяйте дату',
      'tip3_desc' => 'При звонке через Тихий океан (например, США — Австралия) на другой стороне часто уже завтра.',
      'faq_title' => 'Распространенные вопросы',
      'faq_q1' => 'GMT и UTC — это одно и то же?',
      'faq_a1' => 'Для большинства практических целей — да. UTC — это точный атомный стандарт, а GMT — более старый стандарт, основанный на солнце. Они отличаются друг от друга на доли секунды.',
      'faq_q2' => 'Почему у некоторых зон смещение 30 или 45 минут?',
      'faq_a2' => 'Политические и географические причины. Индия (UTC+5:30) и Непал (UTC+5:45) выбрали эти смещения, чтобы лучше согласовать солнечный полдень с их долготой.',
    ),
  ),
  'date-to-unix-timestamp' => 
  array (
    'meta' => 
    array (
      'title' => 'Date to Unix Времяstamp Конвертироватьer - Мгновенный & Accurate',
      'description' => 'Конвертировать any date and Время into a Unix Времяstamp Мгновенныйly. Supports both Местный Время and UTC/GMT inputs for precise server-side scheduling and debugging.',
      'h1' => 'Date to Unix Времяstamp Конвертироватьer',
      'subtitle' => 'Transform dates to Unix epoch Времяstamps for programming & databases',
    ),
    'form' => 
    array (
      'title' => 'Select Date & Время',
      'date_label' => 'Date',
      'time_label' => 'Время',
      'local_time' => 'Use Местный Время',
      'utc_mode' => 'Use UTC/GMT',
      'button' => 'Конвертировать to Времяstamp',
      'result_title' => 'UNIX ВремяSTAMP',
      'result_subtitle' => 'Seconds since Jan 01 1970 (UTC)',
    ),
    'content' => 
    array (
      'hero_title' => 'Конвертировать Human Время to Machine Время',
      'hero_description' => 'Transform readable dates into precise Unix Времяstamps. Essential for database queries, API parameters, and debugging code. ',
      'mode_title' => 'Understanding the Modes',
      'local_title' => 'Местный Mode',
      'local_desc' => 'Uses your browser\'s current Времяzone. Best for finding the Времяstamp of an event happening "here and now" or in your specific location.',
      'utc_title' => 'UTC Mode',
      'utc_desc' => 'Treats your input as Coordinated Universal Время (GMT). Essential when dealing with server logs or international event coordination.',
      'snippets_title' => 'Code Snippets for Generating Времяstamps',
      'use_cases_title' => 'Common Use Cases',
      'use_case_1' => 'Setting expiration Времяs for cookies or tokens.',
      'use_case_2' => 'Scheduling crons or database jobs.',
      'use_case_3' => 'Comparing dates efficiently in code logic.',
    ),
  ),
  'unix-timestamp-to-date' => 
  array (
    'meta' => 
    array (
      'title' => 'Unix Времяstamp to Date Конвертироватьer - Readable DateВремя Tool',
      'description' => 'Декодировать Unix Времяstamps into human-readable dates. See the exact Время in GMT, your Местный Времяzone, and ISO 8601 format Мгновенныйly.',
      'h1' => 'Unix Времяstamp to Date Конвертироватьer',
      'subtitle' => 'Конвертировать Unix Времяstamps to readable date formats across Времяzones',
    ),
    'form' => 
    array (
      'title' => 'Enter Unix Времяstamp',
      'placeholder' => 'e.g. 1672531200',
      'button_now' => 'Use Now',
      'button_convert' => 'Конвертировать to Date',
      'result_gmt' => 'GMT / UTC',
      'result_local' => 'Your Местный Время',
      'result_iso' => 'ISO 8601 Format',
    ),
    'content' => 
    array (
      'hero_title' => 'Deciphering the Epoch',
      'hero_description' => 'Turn those cryptic 10-digit numbers back into concepts humans understand: years, months, days, and hours.',
      'formats_title' => 'Output Formats Explained',
      'format_gmt_title' => 'GMT/UTC',
      'format_gmt_example' => 'Fri, 01 Jan 2023 00:00:00 GMT',
      'format_gmt_desc' => 'The absolute Время reference, unaffected by daylight saving or geographical location.',
      'format_iso_title' => 'ISO 8601',
      'format_iso_example' => '2023-01-01T00:00:00.000Z',
      'format_iso_desc' => 'The international standard format (YYYY-MM-DD), perfect for data exchange and APIs. ',
      'format_local_title' => 'Your Местный Время',
      'format_local_example' => 'Sun Jan 01 2023 00:00:00 GMT+0000',
      'format_local_desc' => 'Shows how it looks in your browser\'s Местный Времяzone',
      'reverse_title' => 'Reverse Process',
      'reverse_description' => 'Need to go the other way? Конвертировать a human date back into a Времяstamp.',
      'reverse_button' => 'Go to Date to Времяstamp Tool',
      'tip_title' => 'Developer Tip',
      'tip_desc' => 'If your Времяstamp has 13 digits instead of 10, it is in milliseconds! Our tool automatically detects and handles millisecond Времяstamps (common in JavaScript and Java) by Конвертироватьing them correctly.',
    ),
  ),
  'local-time-to-utc' => 
  array (
    'meta' => 
    array (
      'title' => 'Местный Время to UTC Конвертироватьer - Времяzone Adjuster',
      'description' => 'Конвертировать your Местный Время to UTC (Coordinated Universal Время). Essential for scheduling international calls and server logs synchronization.',
      'h1' => 'Местный Время to UTC Конвертироватьer',
      'subtitle' => 'Конвертировать Местный Время to UTC for global Время synchronization',
    ),
    'form' => 
    array (
      'title' => 'Конвертировать Местный Время',
      'subtitle' => 'Select a date and Время in your Местный zone to see its UTC equivalent.',
      'label' => 'Enter Местный Date & Время',
      'button' => 'Конвертировать to UTC',
      'timezone_label' => 'Your Времяzone:',
      'result_title' => 'UTC Время',
      'result_subtitle' => 'Global Standard',
    ),
    'live_clocks' => 
    array (
      'local_title' => 'Your Местный Время',
      'utc_title' => 'UTC Время',
      'utc_subtitle' => 'Coordinated Universal Время',
      'loading' => 'Загрузка...',
    ),
    'features' => 
    array (
      'instant_title' => 'Мгновенный Conversion',
      'instant_desc' => 'Конвертировать Местный Время to UTC in real-Время with accurate Времяzone detection',
      'timezone_title' => 'Auto-Detect Времяzone',
      'timezone_desc' => 'Automatically detects your browser Времяzone for accurate conversion',
      'accurate_title' => 'Always Accurate',
      'accurate_desc' => 'Handles DST changes and Времяzone offsets automatically',
    ),
    'content' => 
    array (
      'why_title' => 'Why Конвертировать to UTC?',
      'why_desc' => 'UTC (Coordinated Universal Время) is the primary Время standard by which the world regulates clocks and Время. It does not observe Daylight Saving Время, making it a stable reference point.',
      'utc_standard_title' => 'The Global Standard',
      'utc_standard_intro' => 'Developers, pilots, and scientists use UTC because: ',
      'timezone_reason' => 'Времяzones are Political: They change often based on laws.',
      'dst_reason' => 'DST is Confusing: Clocks jump forward and back, creating gaps or duplicates using Местный Время.',
      'political_reason' => 'No Ambiguity: 10:00 UTC is the same moment everywhere in the universe.',
      'utc_immunity' => 'UTC is immune to these issues, providing a continuous, linear Времяscale.',
      'applications_title' => 'Real World Applications',
      'aviation_title' => 'Aviation & Shipping',
      'aviation_desc' => 'Flight plans and logs are always in UTC to prevent confusion across borders.',
      'servers_title' => 'Servers & Databases',
      'servers_desc' => 'Computers store logs in UTC so that an event in Tokyo aligns perfectly with an event in London.',
      'events_title' => 'Global Events',
      'events_desc' => 'Webinars and product launches are often announced in UTC or GMT to provide a single reference Время.',
    ),
  ),
  'utc-to-local-time' => 
  array (
    'meta' => 
    array (
      'title' => 'UTC to Местный Время Конвертироватьer - Global Время Translator',
      'description' => 'Быстрыйly Конвертировать UTC/GMT Время to your Местный Времяzone. Perfect for checking server logs, international meeting Времяs, and global event schedules.',
      'h1' => 'UTC to Местный Время Конвертироватьer',
      'subtitle' => 'Transform UTC Время to your Местный Времяzone Мгновенныйly',
    ),
    'form' => 
    array (
      'result_title' => 'Конвертировать UTC to Местный',
      'help_text' => 'Enter a date/Время in UTC (GMT) to see what it is in your Местный Времяzone.',
      'label' => 'Enter UTC Date & Время',
      'button' => 'Конвертировать to Местный Время',
      'result_title_output' => 'YOUR Местный Время',
      'example' => 'Example: 2023-11-25 14:30:00',
    ),
    'content' => 
    array (
      'hero_title' => 'Translate Global Время to Местный Время',
      'hero_desc' => 'UTC is the language of servers and international standards. This tool translates it back into the Время on your wall clock.',
      'why_title' => 'Why Servers Love UTC',
      'consistency_title' => 'Consistency',
      'consistency_desc' => 'UTC never changes for Daylight Saving Время.',
      'universality_title' => 'Universality',
      'universality_desc' => 'It works the same regardless of where the server is located.',
      'simplicity_title' => 'Simplicity',
      'simplicity_desc' => 'It avoids the "ambiguous hour" problem when clocks fall back.',
      'offsets_title' => 'How to Read Offsets',
      'offsets_intro' => 'When you Конвертировать UTC to Местный, you are applying an "Offset". ',
      'offset_minus' => 'UTC-5 (e.g., New York EST) means Местный Время is 5 hours behind UTC.',
      'offset_plus' => 'UTC+9 (e.g., Tokyo) means Местный Время is 9 hours ahead of UTC.',
      'offset_half' => 'Some places like India use half-hour offsets (UTC+5:30).',
      'golden_rule_title' => 'The Golden Rule',
      'golden_rule_desc' => 'Always Store Время in UTC. Only Display Время in Местный.',
    ),
  ),
);
