<?php

$locales = ['ru', 'es'];
$category = 'converters';
$tools = [
    'speed-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер скорости - Мили в час, Км в час, Узлы',
                'description' => 'Мгновенно конвертируйте единицы скорости. Мили в час в километры в час, метры в секунду и узлы.',
                'h1' => 'Конвертер скорости',
                'subtitle' => 'Конвертация миль/ч, км/ч, узлов, м/с и чисел Маха'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_kph' => 'Километры в час (км/ч)',
                'unit_mph' => 'Мили в час (mph)',
                'unit_mps' => 'Метры в секунду (м/с)',
                'unit_knot' => 'Узлы (kn)',
                'unit_mach' => 'Число Маха (станд. атмосфера)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Множество единиц',
                'feature1_desc' => 'Конвертация между mph, км/ч, узлами, м/с и даже числами Маха.',
                'feature2_title' => 'Транспорт и навигация',
                'feature2_desc' => 'Для путешествий, морской навигации и авиационных расчетов.',
                'feature3_title' => 'Мгновенные результаты',
                'feature3_desc' => 'Быстрая конвертация скорости для вождения, полетов и бега.',
                'main_title' => 'Понимание скорости',
                'description_p1' => 'Скорость измеряет быстроту движения объекта. В Британии/США для дорог используют мили в час (MPH), в большинстве других стран — километры в час (км/ч). В физике — м/с, в море — узлы.',
                'description_p2' => 'Один узел равен одной морской миле в час (≈ 1,852 км/ч). Понимание конвертации важно при поездках и в науке.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Вождение:</strong> Перевод ограничений скорости в путешествиях',
                'usage_2' => '<strong>Авиация:</strong> Скорость самолетов в узлах и Махах',
                'usage_3' => '<strong>Морское дело:</strong> Навигация судов в узлах',
                'usage_4' => '<strong>Спорт:</strong> Бег (темп мин/км в мин/милю)',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести км/ч в мили/ч?',
                'faq_a1' => 'Разделите значение км/ч на 1,609. Наш конвертер сделает это мгновенно!',
                'faq_q2' => 'Что такое узел в скорости?',
                'faq_a2' => 'Узел — это одна морская миля в час (1,852 км/ч). Стандарт для моря и авиации.',
                'faq_q3' => 'Какова скорость при Мах 1?',
                'faq_a3' => 'Мах 1 — это скорость звука, примерно 1235 км/ч на уровне моря.',
                'faq_q4' => 'Почему корабли используют узлы?',
                'faq_a4' => 'Узлы напрямую связаны с морскими милями, что удобно для навигации по широте/долготе.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de velocidad - MPH, KPH, Nudos',
                'description' => 'Convierte unidades de velocidad al instante. Millas por hora a Kilómetros por hora, metros por segundo y nudos.',
                'h1' => 'Convertidor de velocidad',
                'subtitle' => 'Convierte MPH, KPH, nudos, m/s y números Mach al instante'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_kph' => 'Kilómetros por hora (km/h)',
                'unit_mph' => 'Millas por hora (mph)',
                'unit_mps' => 'Metros por segundo (m/s)',
                'unit_knot' => 'Nudos (kn)',
                'unit_mach' => 'Mach (Atmósfera Estándar)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Múltiples unidades',
                'feature1_desc' => 'Convierte entre MPH, KPH, nudos, metros/segundo y números Mach.',
                'feature2_title' => 'Viajes y Navegación',
                'feature2_desc' => 'Perfecto para viajes internacionales, navegación marítima y aviación.',
                'feature3_title' => 'Resultados en tiempo real',
                'feature3_desc' => 'Conversiones instantáneas para conducir, volar o correr.',
                'main_title' => 'Comprensión de la velocidad',
                'description_p1' => 'La velocidad mide qué tan rápido se mueve un objeto. Se usa MPH en EE. UU., KPH en casi todo el mundo, m/s en física y nudos en náutica.',
                'description_p2' => 'Un nudo equivale a una milla náutica por hora (1.852 KPH). Entender estas conversiones es vital para viajar o navegar.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Conducir:</strong> Convertir límites de velocidad al cambiar de país',
                'usage_2' => '<strong>Aviación:</strong> Entender velocidades en nudos y Mach',
                'usage_3' => '<strong>Náutica:</strong> Navegación de barcos usando nudos',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto KPH a MPH?',
                'faq_a1' => 'Divide el valor KPH por 1.609.',
                'faq_q2' => '¿Qué es un nudo?',
                'faq_a2' => 'Es una milla náutica por hora (1.852 KPH). Es el estándar en el mar y el aire.',
                'faq_q3' => '¿Qué tan rápido es Mach 1?',
                'faq_a3' => 'Es la velocidad del sonido, unos 1,235 KPH al nivel del mar.'
            ]
        ]
    ],
    'temperature-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер температур - Цельсий, Фаренгейт, Кельвин',
                'description' => 'Мгновенно конвертируйте показания температуры между шкалами Цельсия, Фаренгейта и Кельвина.',
                'h1' => 'Конвертер температур',
                'subtitle' => 'Конвертация Цельсия, Фаренгейта и Кельвина'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_c' => 'Цельсий (°C)',
                'unit_f' => 'Фаренгейт (°F)',
                'unit_k' => 'Кельвин (K)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Три основные шкалы',
                'feature1_desc' => 'Точная конвертация между Цельсием, Фаренгейтом и Кельвином для любых нужд.',
                'feature2_title' => 'Точные формулы',
                'feature2_desc' => 'Использование стандартных формул для погоды, кулинарии, науки и инженерии.',
                'feature3_title' => 'В реальном времени',
                'feature3_desc' => 'Мгновенная конвертация при вводе данных в любое поле.',
                'main_title' => 'Понимание轉換 температур',
                'description_p1' => '<strong>Цельсий (°C)</strong> — метрический стандарт во всем мире. <strong>Фаренгейт (°F)</strong> используется в США. <strong>Кельвин (K)</strong> — абсолютная шкала в науке.',
                'description_p2' => 'Цельсий основан на замерзании (0°C) и кипении (100°C) воды. Кельвин начинается от абсолютного нуля (-273,15°C).',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Прогноз погоды:</strong> Перевод из °C в °F в путешествиях',
                'usage_2' => '<strong>Кулинария:</strong> Температуры духовки в рецептах',
                'usage_3' => '<strong>Медицина:</strong> Показания термометра в разных шкалах',
                'usage_4' => '<strong>Наука:</strong> Расчеты в Кельвинах',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как проще всего перевести Цельсий в Фаренгейт?',
                'faq_a1' => 'Умножьте Цельсий на 1,8 и прибавьте 32. Можно и на 9/5.',
                'faq_q2' => 'Почему США используют Фаренгейт?',
                'faq_a2' => 'Эта шкала была принята задолго до Цельсия и глубоко укоренилась в инфраструктуре и культуре США.',
                'faq_q3' => 'Что такое абсолютный ноль?',
                'faq_a3' => 'Это 0 Кельвин или -273,15°C. Теоретически минимальная возможная температура.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de temperatura - Celsius, Fahrenheit, Kelvin',
                'description' => 'Convierte lecturas de temperatura entre las escalas Celsius, Fahrenheit y Kelvin al instante.',
                'h1' => 'Convertidor de temperatura',
                'subtitle' => 'Convierte Celsius, Fahrenheit y Kelvin con fórmulas precisas'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_c' => 'Celsius (°C)',
                'unit_f' => 'Fahrenheit (°F)',
                'unit_k' => 'Kelvin (K)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Tres escalas principales',
                'feature1_desc' => 'Convierte entre Celsius, Fahrenheit y Kelvin con precisión.',
                'feature2_title' => 'Fórmulas exactas',
                'feature2_desc' => 'Usa fórmulas estándar para clima, cocina, ciencia e ingeniería.',
                'feature3_title' => 'Conversión en tiempo real',
                'feature3_desc' => 'Conversión bidimensional instantánea mientras escribes.',
                'main_title' => 'Comprensión de la temperatura',
                'description_p1' => '<strong>Celsius (°C)</strong> es el estándar métrico global. <strong>Fahrenheit (°F)</strong> se usa en EE. UU. y <strong>Kelvin (K)</strong> en investigación científica.',
                'description_p2' => 'Celsius se basa en los puntos de congelación (0°C) y ebullición (100°C) del agua. Kelvin comienza en el cero absoluto.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Clima:</strong> Convertir entre °C y °F al viajar',
                'usage_2' => '<strong>Cocina:</strong> Temperaturas de horno para recetas',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto Celsius a Fahrenheit?',
                'faq_a1' => 'Multiplica por 1.8 y suma 32. Ejemplo: 20°C × 1.8 + 32 = 68°F.',
                'faq_q2' => '¿Qué es el cero absoluto?',
                'faq_a2' => 'Es 0 Kelvin o -273.15°C. Es la temperatura teórica más baja posible.'
            ]
        ]
    ],
    'torque-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер крутящего момента - Ньютон-метры, Фунт-футы',
                'description' => 'Мгновенно конвертируйте единицы крутящего момента. Ньютон-метры в фунт-футы, дюйм-фунты и килограмм-сила-метры.',
                'h1' => 'Конвертер крутящего момента',
                'subtitle' => 'Конвертация Н·м, lb-ft и кгс·м для механики'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_Nm' => 'Ньютон-метр (N·m)',
                'unit_lbfft' => 'Фунт-сила-фут (lbf·ft)',
                'unit_lbfin' => 'Фунт-сила-дюйм (lbf·in)',
                'unit_kgfm' => 'Килограмм-сила-метр (kgf·m)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы момента',
                'feature1_desc' => 'Перевод между Н·м, lb-ft, кгс·м и другими мерами.',
                'feature2_title' => 'Авто и инженерия',
                'feature2_desc' => 'Для спецификаций двигателей, затяжки болтов и проектирования механизмов.',
                'feature3_title' => 'Сила вращения',
                'feature3_desc' => 'Точная конвертация для вращательных усилий.',
                'main_title' => 'Понимание крутящего момента',
                'description_p1' => 'Крутящий момент измеряет вращательную силу. СИ единица — ньютон-метр (Н·м), в США обычны фунт-футы (lb-ft) для двигателей.',
                'description_p2' => '1 lb-ft ≈ 1,356 Н·м. Важно соблюдать моменты затяжки в авто и технике.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Авто:</strong> Сравнение характеристик двигателей',
                'usage_2' => '<strong>Ремонт:</strong> Требования к затяжке болтов',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести lb-ft в Н·м?',
                'faq_a1' => 'Умножьте на 1,356. Поможет подогнать характеристики авто из США под стандарт.',
                'faq_q2' => 'В чем разница между моментом и мощностью?',
                'faq_a2' => 'Момент — это сила вращения, мощность — скорость совершения работы. Момент дает тягу \"на низах\".'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de torque - Newton-metros, Pie-libras',
                'description' => 'Convierte unidades de torque al instante. Newton-metros a Pie-libras, Pulgada-libras y Kilogramo-fuerza metros.',
                'h1' => 'Convertidor de torque',
                'subtitle' => 'Convierte Nm, lb-ft y kg-m para valores de torque mecánico'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_Nm' => 'Newton-metro (N·m)',
                'unit_lbfft' => 'Libra-fuerza pie (lbf·ft)',
                'unit_lbfin' => 'Libra-fuerza pulgada (lbf·in)',
                'unit_kgfm' => 'Kilogramo-fuerza metro (kgf·m)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de torque',
                'feature1_desc' => 'Convierte entre N·m, lb-ft, kgf·m y otras medidas de torque.',
                'feature2_title' => 'Automotriz e Ingeniería',
                'feature2_desc' => 'Perfecto para motores, apriete de pernos y diseño mecánico.',
                'main_title' => 'Comprensión del torque',
                'description_p1' => 'El torque mide la fuerza rotacional. La unidad SI es el newton-metro (N·m), mientras que lb-ft es común en EE. UU. para motores.',
                'description_p2' => 'Un pie-libra equivale a unos 1.356 N·m.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Mecánica:</strong> Requerimientos de apriete de pernos',
                'usage_2' => '<strong>Rendimiento:</strong> Comparación de curvas de potencia de vehículos',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto lb-ft a N·m?',
                'faq_a1' => 'Multiplica lb-ft por 1.356.',
                'faq_q2' => '¿Por qué es importante el torque?',
                'faq_a2' => 'Determina la capacidad de arrastre y aceleración de un motor.'
            ]
        ]
    ],
    'volume-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер объема - Литры, Галлоны, Стаканы',
                'description' => 'Мгновенно конвертируйте единицы объема. Поддержка литров, галлонов, стаканов, пинт, миллилитров и жидких унций.',
                'h1' => 'Конвертер объема',
                'subtitle' => 'Конвертация литров, галлонов, стаканов, мл и кубических метров'
            ],
            'form' => [
                'from_label' => 'Из',
                'optgroup_metric' => 'Метрическая система',
                'unit_ml' => 'Миллилитр (ml)',
                'unit_l' => 'Литр (l)',
                'optgroup_us' => 'Система США',
                'unit_gal' => 'Галлон (gal)',
                'unit_qt' => 'Кварта (qt)',
                'unit_pt' => 'Пинта (pt)',
                'unit_cup' => 'Стакан (cup)',
                'unit_fl_oz' => 'Жидкая унция (fl oz)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Жидкие и сухие объемы',
                'feature1_desc' => 'Перевод между литрами, галлонами, квартами, пинтами и стаканами.',
                'feature2_title' => 'Кулинария и наука',
                'feature2_desc' => 'Для рецептов, химлабораторий, расчета бака авто и напитков.',
                'feature3_title' => 'Мгновенные расчеты',
                'feature3_desc' => 'Расчет в реальном времени с высокой точностью для любых нужд.',
                'main_title' => 'Понимание объема',
                'description_p1' => 'Объем — это пространство, занимаемое веществом. Разные страны используют разные меры: литры (СИ), галлоны и унции (имперская система).',
                'description_p2' => 'Галлон США ≈ 3,785 л. Британский галлон ≈ 4,546 л. Один литр содержит 1000 мл.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Кулинария:</strong> Перевод мер в рецептах (стаканы в мл)',
                'usage_2' => '<strong>Напитки:</strong> Понимание размеров бутылок за рубежом',
                'usage_3' => '<strong>Авто:</strong> Расчет расхода в литрах против галлонов',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Сколько литров в галлоне?',
                'faq_a1' => 'Галлон США ≈ 3,785 л, британский — 4,546 л. Всегда уточняйте тип галлона!',
                'faq_q2' => 'Что такое жидкая унция?',
                'faq_a2' => 'Мmeasure объема для жидкостей. 1 литр ≈ 33,8 жидким унциям США.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de volumen - Litros, Galones, Tazas',
                'description' => 'Convierte unidades de volumen líquido al instante. Soporte para litros, galones, tazas, pintas, mililitros y onzas líquidas.',
                'h1' => 'Convertidor de volumen',
                'subtitle' => 'Convierte litros, galones, tazas, ml y metros cúbicos'
            ],
            'form' => [
                'from_label' => 'De',
                'optgroup_metric' => 'Métrico',
                'unit_ml' => 'Mililitro (ml)',
                'unit_l' => 'Litro (l)',
                'optgroup_us' => 'EE. UU. Costumbre',
                'unit_gal' => 'Galón (gal)',
                'unit_qt' => 'Cuarto (qt)',
                'unit_pt' => 'Pinta (pt)',
                'unit_cup' => 'Taza',
                'unit_fl_oz' => 'Onza líquida (fl oz)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Volumen líquido y seco',
                'feature1_desc' => 'Convierte entre litros métricos y galones imperiales, cuartos, pintas y tazas.',
                'feature2_title' => 'Cocina y Ciencia',
                'feature3_title' => 'Cálculos instantáneos',
                'main_title' => 'Comprensión del volumen',
                'description_p1' => 'El volumen mide el espacio tridimensional. El sistema métrico usa litros, el imperial usa galones y onzas líquidas.',
                'description_p2' => 'Un galón de EE. UU. tiene 3.785 litros. Un galón británico tiene 4.546 litros.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Cocina:</strong> Convertir medidas de recetas entre tazas y ml',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cuántos litros hay en un galón?',
                'faq_a1' => 'Un galón de EE. UU. tiene aprox. 3.785 litros. Un galón imperial tiene unos 4.546 litros.'
            ]
        ]
    ],
    'weight-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер веса - Килограммы, Фунты, Граммы',
                'description' => 'Мгновенно конвертируйте единицы веса и массы. Поддержка килограммов, граммов, фунтов, унций, метрических тонн и миллиграммов.',
                'h1' => 'Конвертер веса',
                'subtitle' => 'Точная конвертация кг, фунтов, унций, граммов и стоунов'
            ],
            'form' => [
                'from_label' => 'Из',
                'optgroup_metric' => 'Метрическая система',
                'unit_mg' => 'Миллиграмм (mg)',
                'unit_g' => 'Грамм (g)',
                'unit_kg' => 'Килограмм (kg)',
                'unit_t' => 'Метрическая тонна (t)',
                'optgroup_imperial' => 'Имперская система',
                'unit_oz' => 'Унция (oz)',
                'unit_lb' => 'Фунт (lb)',
                'unit_st' => 'Стоун (st)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы массы и веса',
                'feature1_desc' => 'Конвертация между кг, г и фунтами, унциями для любых целей.',
                'feature2_title' => 'Научная точность',
                'feature2_desc' => 'Для кулинарии, науки, расчета доставки и фитнеса.',
                'feature3_title' => 'Мгновенно',
                'feature3_desc' => 'Вводите в любое поле для мгновенного пересчета.',
                'main_title' => 'Понимание轉換 веса и массы',
                'description_p1' => 'Масса — количество вещества, вес — сила тяжести. Обычно мы используем эти понятия как синонимы: кг, граммы, фунты.',
                'description_p2' => '1 кг = 1000 г. 1 фунт = 16 унций. 1 кг ≈ 2,2046 фунта. Стоун (14 фунтов) популярен в Британии для веса тела.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Кулинария:</strong> Перевод граммов в унции в рецептах',
                'usage_2' => '<strong>Фитнес:</strong> Отслеживание веса тела в кг и фунтах',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести кг в фунты?',
                'faq_a1' => 'Умножьте на 2,20462. Например, 70 кг ≈ 154,32 фунта.',
                'faq_q2' => 'Что такое метрическая тонна?',
                'faq_a2' => 'Это 1000 кг. Она чуть больше американской \"короткой\" тонны (2000 фунтов).'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de peso - Kilogramos, Libras, Gramos',
                'description' => 'Convierte unidades de peso y masa al instante. Soporta kilogramos, gramos, libras, onzas, toneladas métricas y miligramos.',
                'h1' => 'Convertidor de peso',
                'subtitle' => 'Convierte kg, libras, onzas, gramos y stones con precisión'
            ],
            'form' => [
                'from_label' => 'De',
                'optgroup_metric' => 'Métrico',
                'unit_mg' => 'Miligramo (mg)',
                'unit_g' => 'Gramo (g)',
                'unit_kg' => 'Kilogramo (kg)',
                'unit_t' => 'Tonelada métrica (t)',
                'optgroup_imperial' => 'Imperial',
                'unit_oz' => 'Onza (oz)',
                'unit_lb' => 'Libra (lb)',
                'unit_st' => 'Stone (st)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de masa y peso',
                'feature1_desc' => 'Convierte entre masa (kg, g) y peso (lb, oz) sin problemas.',
                'feature2_title' => 'Precisión científica',
                'feature3_title' => 'Resultados instantáneos',
                'main_title' => 'Comprensión del peso y masa',
                'description_p1' => 'En el día a día usamos peso y masa como sinónimos. El sistema métrico usa kg y g (1 kg = 1000 g). El imperial usa libras y onzas (1 lb = 16 oz).',
                'description_p2' => 'Un kilogramo equivale aproximadamente a 2.20462 libras. El stone (14 lb) es común en el Reino Unido para el peso corporal.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Cocina:</strong> Convertir gramos a onzas',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto kilogramos a libras?',
                'faq_a1' => 'Multiplica los kilos por 2.20462.',
                'faq_q2' => '¿Qué es una tonelada métrica?',
                'faq_a2' => 'Equivale a 1,000 kilogramos.'
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

echo "Batch 2.3 update completed.\n";
