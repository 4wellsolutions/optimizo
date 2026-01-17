<?php

$locales = ['ru', 'es'];
$category = 'converters';
$tools = [
    'angle-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер углов - Градусы, Радианы, Грады',
                'description' => 'Мгновенно конвертируйте единицы измерения углов. Градусы в радианы, грады в градусы, угловые минуты и секунды.',
                'h1' => 'Конвертер углов',
                'subtitle' => 'Мгновенная конвертация градусов, радианов, градов, угловых минут и секунд'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_degree' => 'Градус (°)',
                'unit_radian' => 'Радиан (rad)',
                'unit_gradian' => 'Град (gon)',
                'unit_arcminute' => 'Угловая минута (\')',
                'unit_arcsecond' => 'Угловая секунда (")',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы углов',
                'feature1_desc' => 'Конвертация между градусами, радианами, градами, угловыми минутами и секундами.',
                'feature2_title' => 'Наука и инженерия',
                'feature2_desc' => 'Идеально подходит для тригонометрии, навигации, геодезии и САПР.',
                'feature3_title' => 'Точные расчеты',
                'feature3_desc' => 'Точные вычисления для математики, физики и инженерных работ.',
                'main_title' => 'Понимание конвертации углов',
                'description_p1' => 'Углы измеряют поворот или пространство между двумя пересекающимися линиями. Градусы (°) наиболее распространены в повседневной жизни, где полный круг составляет 360°. Радианы — стандартная единица в математике и физике, где полный круг равен 2π радиан. Грады (gon) делят круг на 400 частей, используются в некоторых геодезических приложениях.',
                'description_p2' => 'Один радиан — это угол, соответствующий дуге, длина которой равна радиусу. Поскольку длина окружности равна 2πr, полный круг содержит 2π радиан. Это означает, что 180° = π радиан — фундаментальное соотношение в тригонометрии.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Математика:</strong> Тригонометрические расчеты в радианах',
                'usage_2' => '<strong>Навигация:</strong> Измерение пеленга и курса в градусах',
                'usage_3' => '<strong>САПР/Проектирование:</strong> Углы поворота для 3D-моделирования',
                'usage_4' => '<strong>Геодезия:</strong> Измерения земельных участков в градах',
                'usage_5' => '<strong>Программирование:</strong> Поворот графики и анимация',
                'usage_6' => '<strong>Астрономия:</strong> Небесные координаты и положения',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Сколько радианов в круге?',
                'faq_a1' => 'Полный круг содержит 2π радиан (примерно 6,28 радиан).',
                'faq_q2' => 'Как перевести градусы в радианы?',
                'faq_a2' => 'Умножьте градусы на π/180. Например, 90° × (π/180) = π/2 радиан ≈ 1,571 радиан.',
                'faq_q3' => 'Для чего используются грады?',
                'faq_a3' => 'Грады используются в основном в геодезии и гражданском строительстве. Прямой угол равен 100 градам.',
                'faq_q4' => 'Что такое угловые минуты и секунды?',
                'faq_a4' => 'Это подразделы градусов. 1 градус = 60 угловых минут = 3600 угловых секунд.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de ángulos - Grados, Radianes, Gradines',
                'description' => 'Convierte unidades de ángulo al instante. Grados a radianes, gradines a grados, minutos y segundos de arco.',
                'h1' => 'Convertidor de ángulos',
                'subtitle' => 'Convierte grados, radianes, gradines, minutos y segundos de arco al instante'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_degree' => 'Grado (°)',
                'unit_radian' => 'Radián (rad)',
                'unit_gradian' => 'Gradián (gon)',
                'unit_arcminute' => 'Minuto de arco (\')',
                'unit_arcsecond' => 'Segundo de arco (")',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de ángulo',
                'feature1_desc' => 'Convierte entre grados, radianes, gradines, minutos de arco y segundos de arco.',
                'feature2_title' => 'Ciencia e Ingeniería',
                'feature2_desc' => 'Perfecto para trigonometría, navegación, agrimensura y aplicaciones CAD.',
                'feature3_title' => 'Conversiones precisas',
                'feature3_desc' => 'Cálculos precisos para matemáticas, física y trabajos de ingeniería.',
                'main_title' => 'Comprensión de la conversión de ángulos',
                'description_p1' => 'Los ángulos miden la rotación o el espacio entre dos líneas que se cruzan. Los grados (°) son los más comunes en el uso diario, siendo un círculo completo de 360°. Los radianes son la unidad estándar en matemáticas y física, donde un círculo completo equivale a 2π radianes. Los gradines (gon) dividen un círculo en 400 partes, utilizados en algunas aplicaciones de agrimensura.',
                'description_p2' => 'Un radián es el ángulo subtendido por un arco de longitud igual al radio. Dado que la circunferencia de un círculo es 2πr, un círculo completo contiene 2π radianes. Esto hace que 180° = π radianes, una relación fundamental en trigonometría.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Matemáticas:</strong> Cálculos trigonométricos en radianes',
                'usage_2' => '<strong>Navegación:</strong> Mediciones de rumbo y dirección en grados',
                'usage_3' => '<strong>CAD/Diseño:</strong> Ángulos de rotación para modelado 3D',
                'usage_4' => '<strong>Agrimensura:</strong> Mediciones de terreno usando gradines',
                'usage_5' => '<strong>Programación:</strong> Rotación de gráficos y animación',
                'usage_6' => '<strong>Astronomía:</strong> Coordenadas y posiciones celestes',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cuántos radianes hay en un círculo?',
                'faq_a1' => 'Un círculo completo contiene 2π radianes (aproximadamente 6.28 radianes).',
                'faq_q2' => '¿Cómo convierto grados a radianes?',
                'faq_a2' => 'Multiplica los grados por π/180. Por ejemplo, 90° × (π/180) = π/2 radianes ≈ 1.571 radianes.',
                'faq_q3' => '¿Para qué se usan los gradines?',
                'faq_a3' => 'Los gradines (gon) se usan principalmente en agrimensura e ingeniería civil. Un ángulo recto son 100 gradines.',
                'faq_q4' => '¿Qué son los minutos y segundos de arco?',
                'faq_a4' => 'Son subdivisiones de los grados. 1 grado = 60 minutos de arco = 3,600 segundos de arco.'
            ]
        ]
    ],
    'area-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер площади - Квадратные метры, Акры, Гектары',
                'description' => 'Мгновенно конвертируйте единицы площади. Квадратные метры в акры, гектары в квадратные футы и квадратные мили.',
                'h1' => 'Конвертер площади',
                'subtitle' => 'Точное преобразование квадратных метров, акров, гектаров и квадратных футов'
            ],
            'form' => [
                'from_label' => 'Из',
                'optgroup_metric' => 'Метрическая система',
                'unit_sq_m' => 'Квадратный метр (м²)',
                'unit_sq_km' => 'Квадратный километр (км²)',
                'unit_ha' => 'Гектар (га)',
                'optgroup_imperial' => 'Имперская система',
                'unit_sq_ft' => 'Квадратный фут (фут²)',
                'unit_sq_yd' => 'Квадратный ярд (ярд²)',
                'unit_acre' => 'Акр (ак)',
                'unit_sq_mi' => 'Квадратная миля (ми²) ',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Земля и недвижимость',
                'feature1_desc' => 'Конвертация между акрами, гектарами, квадратными метрами и футами для оценки недвижимости.',
                'feature2_title' => 'Строительство и дизайн',
                'feature2_desc' => 'Идеально подходит для планов этажей, размеров комнат и расчетов строительных проектов.',
                'feature3_title' => 'Точные расчеты',
                'feature3_desc' => 'Точная конвертация для сельского хозяйства, геодезии и оценки имущества.',
                'main_title' => 'Понимание конвертации площадей',
                'description_p1' => 'Площадь измеряет двухмерное пространство внутри границы. Это фундаментальное понятие в недвижимости, строительстве и сельском хозяйстве. Метрическая система использует квадратные метры и гектары, имперская — футы, акры и мили.',
                'description_p2' => 'Гектар равен 10 000 квадратных метров (100м × 100м). Акр равен 43 560 квадратным футам или примерно 4 047 м².',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Недвижимость:</strong> Конвертация размеров объектов для международных покупателей',
                'usage_2' => '<strong>Сельское хозяйство:</strong> Расчет площади угодий в акрах и гектарах',
                'usage_3' => '<strong>Строительство:</strong> Расчет площади пола для разрешений на строительство',
                'usage_4' => '<strong>Интерьер:</strong> Планировка комнат и расстановка мебели',
                'usage_5' => '<strong>Ландшафт:</strong> Измерение площади садов и газонов',
                'usage_6' => '<strong>Планирование:</strong> Требования к зонированию и площади застройки',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Сколько квадратных футов в акре?',
                'faq_a1' => 'Один акр содержит ровно 43 560 квадратных футов.',
                'faq_q2' => 'Что больше: гектар или акр?',
                'faq_a2' => 'Гектар больше. Один гектар равен примерно 2,471 акра.',
                'faq_q3' => 'Как перевести квадратные метры в квадратные футы?',
                'faq_a3' => 'Умножьте значение на 10,764.',
                'faq_q4' => 'Почему единицы площади квадратные?',
                'faq_a4' => 'Потому что площадь двумерна (длина × ширина).'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de área - Metros cuadrados, Acres, Hectáreas',
                'description' => 'Convierte unidades de área al instante. Metros cuadrados a acres, hectáreas a pies cuadrados y millas cuadradas.',
                'h1' => 'Convertidor de área',
                'subtitle' => 'Convierte metros cuadrados, acres, hectáreas y pies cuadrados con precisión'
            ],
            'form' => [
                'from_label' => 'De',
                'optgroup_metric' => 'Métrico',
                'unit_sq_m' => 'Metro cuadrado (m²)',
                'unit_sq_km' => 'Kilómetro cuadrado (km²)',
                'unit_ha' => 'Hectárea (ha)',
                'optgroup_imperial' => 'Imperial',
                'unit_sq_ft' => 'Pie cuadrado (ft²)',
                'unit_sq_yd' => 'Yarda cuadrada (yd²)',
                'unit_acre' => 'Acre (ac)',
                'unit_sq_mi' => 'Milla cuadrada (mi²)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Tierra y Propiedad',
                'feature1_desc' => 'Convierte entre acres, hectáreas, metros cuadrados y pies cuadrados para bienes raíces.',
                'feature2_title' => 'Construcción y Diseño',
                'feature2_desc' => 'Perfecto para planos de planta, tamaños de habitaciones y cálculos de proyectos.',
                'feature3_title' => 'Cálculos precisos',
                'feature3_desc' => 'Conversiones precisas para agricultura, agrimensura y valoración de propiedades.',
                'main_title' => 'Comprensión de la conversión de áreas',
                'description_p1' => 'El área mide el espacio bidimensional dentro de un límite. Es fundamental en bienes raíces, construcción, agricultura y planificación urbana. El sistema métrico usa metros cuadrados y hectáreas, mientras que los sistemas imperiales usan pies cuadrados, acres y millas cuadradas.',
                'description_p2' => 'Una hectárea equivale a 10,000 metros cuadrados (100m × 100m). Un acre equivale a 43,560 pies cuadrados o aproximadamente 4,047 m².',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Bienes raíces:</strong> Conversión de tamaños de propiedad para compradores internacionales',
                'usage_2' => '<strong>Agricultura:</strong> Cálculo de tierras de cultivo en acres vs hectáreas',
                'usage_3' => '<strong>Construcción:</strong> Cálculos de área de piso para permisos',
                'usage_4' => '<strong>Diseño de interiores:</strong> Dimensionamiento de habitaciones y planificación de muebles',
                'usage_5' => '<strong>Paisajismo:</strong> Mediciones de área de jardines y césped',
                'usage_6' => '<strong>Planificación urbana:</strong> Requisitos de zonificación y área de desarrollo',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cuántos pies cuadrados hay en un acre?',
                'faq_a1' => 'Un acre contiene exactamente 43,560 pies cuadrados.',
                'faq_q2' => '¿Qué es más grande, una hectárea o un acre?',
                'faq_a1' => 'Una hectárea es más grande. Una hectárea equivale aproximadamente a 2.471 acres.',
                'faq_q3' => '¿Cómo convierto metros cuadrados a pies cuadrados?',
                'faq_a3' => 'Multiplica el valor en metros cuadrados por 10.764.',
                'faq_q4' => '¿Por qué las unidades de área son cuadradas?',
                'faq_a4' => 'Porque el área es bidimensional (largo × ancho).'
            ]
        ]
    ],
    'cooking-unit-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Кулинарный конвертер единиц - Стаканы, Ложки, Миллилитры',
                'description' => 'Мгновенно конвертируйте кулинарные единицы. Стаканы в столовые ложки, чайные ложки в миллилитры и жидкие унции.',
                'h1' => 'Кулинарный конвертер',
                'subtitle' => 'Конвертация стаканов, столовых и чайных ложек, мл и унций для рецептов'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_cup' => 'Стакан (US)',
                'unit_tbsp' => 'Столовая ложка (US)',
                'unit_tsp' => 'Чайная ложка (US)',
                'unit_ml' => 'Миллилитр (мл)',
                'unit_fl_oz' => 'Жидкая унция (fl oz)',
                'unit_pt' => 'Пинта (US)',
                'unit_qt' => 'Кварта (US)',
                'unit_gal' => 'Галлон (US)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Кулинарные единицы',
                'feature1_desc' => 'Конвертация между стаканами, ложками, миллилитрами и другими единицами.',
                'feature2_title' => 'Масштабирование рецептов',
                'feature2_desc' => 'Идеально для изменения объема ингредиентов при выпечке и приготовлении блюд.',
                'feature3_title' => 'Метрические и имперские',
                'feature3_desc' => 'Бесшовный перевод между американскими, британскими и метрическими мерами.',
                'main_title' => 'Понимание кулинарных мер',
                'description_p1' => 'Меры измерения в кулинарии различаются по регионам. В США используют стаканы и ложки, в других странах — миллилитры и граммы.',
                'description_p2' => 'Меры США: 1 стакан = 16 ст. ложек = 48 ч. ложек = 236,6 мл (примерно 240 мл для практики). 1 ст. ложка = 3 ч. ложки = 14,8 мл.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Выпечка:</strong> Конвертация стаканов в граммы для точности',
                'usage_2' => '<strong>Международные рецепты:</strong> Адаптация зарубежных рецептов',
                'usage_3' => '<strong>Масштабирование:</strong> Удвоение или уменьшение порций',
                'usage_4' => '<strong>Жидкие меры:</strong> Перевод между стаканами, мл и унциями',
                'usage_5' => '<strong>Специи:</strong> Перевод чайных ложек в миллилитры',
                'usage_6' => '<strong>Кулинарные шоу:</strong> Следование рецептам с разными системами мер',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Сколько столовых ложек в стакане?',
                'faq_a1' => 'В одном американском стакане 16 столовых ложек.',
                'faq_q2' => 'Сколько миллилитров в стакане?',
                'faq_a2' => 'Один стакан США равен 236,6 мл, часто округляют до 240 мл.',
                'faq_q3' => 'В чем разница между мерами США и Великобритании?',
                'faq_a3' => 'Стакан США — 236,6 мл, британский — 284 мл.',
                'faq_q4' => 'Как конвертировать сухие и жидкие ингредиенты?',
                'faq_a4' => 'Меры объема одинаковы, но для выпечки лучше использовать вес в граммах.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de unidades de cocina - Tazas, Cucharadas, Cucharaditas',
                'description' => 'Convierte unidades de cocina al instante. Tazas a cucharadas, cucharaditas a mililitros y onzas líquidas.',
                'h1' => 'Convertidor de unidades de cocina',
                'subtitle' => 'Convierte tazas, cucharadas, cucharaditas, ml y onzas líquidas para recetas'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_cup' => 'Taza (EE. UU.)',
                'unit_tbsp' => 'Cucharada (EE. UU.)',
                'unit_tsp' => 'Cucharadita (EE. UU.)',
                'unit_ml' => 'Mililitro (ml)',
                'unit_fl_oz' => 'Onza líquida (fl oz)',
                'unit_pt' => 'Pinta (EE. UU.)',
                'unit_qt' => 'Cuarto (EE. UU.)',
                'unit_gal' => 'Galón (EE. UU.)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de cocina',
                'feature1_desc' => 'Convierte entre tazas, cucharadas, cucharaditas, mililitros y otras unidades.',
                'feature2_title' => 'Escalado de recetas',
                'feature2_desc' => 'Perfecto para ajustar recetas, repostería y conversiones internacionales.',
                'feature3_title' => 'Métrico e Imperial',
                'feature3_desc' => 'Convierte sin problemas entre medidas de cocina estadounidenses, británicas y métricas.',
                'main_title' => 'Comprensión de la conversión de unidades de cocina',
                'description_p1' => 'Las medidas de cocina varían según la región: EE. UU. usa principalmente tazas y cucharadas, mientras que otros países usan mililitros y gramos.',
                'description_p2' => 'Medidas de EE. UU.: 1 taza = 16 cucharadas = 48 cucharaditas = 236.6 ml. 1 cucharada = 3 cucharaditas = 14.8 ml.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Repostería:</strong> Conversión de medidas de tazas a gramos',
                'usage_2' => '<strong>Recetas internacionales:</strong> Adaptación de recetas de diferentes países',
                'usage_3' => '<strong>Escalado de recetas:</strong> Duplicar o reducir a la mitad las cantidades',
                'usage_4' => '<strong>Medidas líquidas:</strong> Conversión entre tazas, ml y onzas líquidas',
                'usage_5' => '<strong>Medidas de especias:</strong> Conversión de cucharaditas a mililitros',
                'usage_6' => '<strong>Programas de cocina:</strong> Seguir recetas con diferentes sistemas',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cuántas cucharadas hay en una taza?',
                'faq_a1' => 'Hay 16 cucharadas en 1 taza de EE. UU.',
                'faq_q2' => '¿Cuántos mililitros hay en una taza?',
                'faq_a2' => '1 taza de EE. UU. equivale a 236.6 ml, a menudo se redondea a 240 ml.',
                'faq_q3' => '¿Cuál es la diferencia entre medidas de EE. UU. y el Reino Unido?',
                'faq_a3' => 'Una taza de EE. UU. es de 236.6 ml, mientras que una del Reino Unido es de 284 ml.',
                'faq_q4' => '¿Cómo convierto medidas secas y líquidas?',
                'faq_a4' => 'Las medidas de volumen sirven para ambos, pero para repostería es mejor pesar por gramos.'
            ]
        ]
    ],
    'data-transfer-rate-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер скорости передачи данных - Мбит/с, Гбит/с, КБ/с',
                'description' => 'Мгновенно конвертируйте скорость передачи данных. Мбит/с в МБ/с, Гбит/с в КБ/с, скорость интернета.',
                'h1' => 'Конвертер скорости передачи данных',
                'subtitle' => 'Конвертация Мбит/с, Гбит/с, МБ/с и КБ/с для оценки скорости интернета'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_bps' => 'Бит в секунду (bps)',
                'unit_kbps' => 'Килобит в секунду (Kbps)',
                'unit_Mbps' => 'Мегабит в секунду (Mbps)',
                'unit_Gbps' => 'Гигабит в секунду (Gbps)',
                'unit_kB_s' => 'Килобайт в секунду (KB/s)',
                'unit_MB_s' => 'Мегабайт в секунду (MB/s)',
                'unit_GB_s' => 'Гигабайт в секунду (GB/s)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы передачи',
                'feature1_desc' => 'Конвертация между Мбит/с, Гбит/с, МБ/с, КБ/с и другими скоростями.',
                'feature2_title' => 'Интернет и сети',
                'feature2_desc' => 'Для понимания скорости интернета, времени загрузки и производительности сети.',
                'feature3_title' => 'Биты против Байтов',
                'feature3_desc' => 'Точное преобразование между битами (Mbps) и байтами (MB/s).',
                'main_title' => 'Понимание скорости передачи данных',
                'description_p1' => 'Скорость передачи данных измеряет, насколько быстро данные перемещаются, обычно в битах (bps) или байтах в секунду (B/s). Провайдеры указывают скорость в мегабитах (Mbps).',
                'description_p2' => 'Главное отличие: 1 Байт = 8 Бит. Так, соединение 100 Mbps теоретически загружает данные на скорости 12,5 MB/s.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Интернет:</strong> Понимание рекламной скорости и реальной загрузки',
                'usage_2' => '<strong>Расчет времени:</strong> Оценка длительности загрузки файлов',
                'usage_3' => '<strong>Стриминг:</strong> Проверка поддержки потокового видео 4K/HD',
                'usage_4' => '<strong>Планирование сети:</strong> Проектирование инфраструктуры и пропускной способности',
                'faq_title' => 'Часто задаваемые вопросы'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de tasa de transferencia de datos - Mbps, Gbps, KB/s',
                'description' => 'Convierte tasas de transferencia de datos al instante. Mbps a MB/s, Gbps a KB/s y conversiones de velocidad de internet.',
                'h1' => 'Convertidor de tasa de transferencia de datos',
                'subtitle' => 'Convierte Mbps, Gbps, MB/s y KB/s para velocidades de internet'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_bps' => 'Bit por segundo (bps)',
                'unit_kbps' => 'Kilobit por segundo (Kbps)',
                'unit_Mbps' => 'Megabit por segundo (Mbps)',
                'unit_Gbps' => 'Gigabit por segundo (Gbps)',
                'unit_kB_s' => 'Kilobyte por segundo (KB/s)',
                'unit_MB_s' => 'Megabyte por segundo (MB/s)',
                'unit_GB_s' => 'Gigabyte por segundo (GB/s)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de transferencia',
                'feature1_desc' => 'Convierte entre Mbps, Gbps, MB/s, KB/s y otras velocidades de transferencia de datos.',
                'feature2_title' => 'Internet y Redes',
                'feature2_desc' => 'Perfecto para entender velocidades de internet, tiempos de descarga y rendimiento de red.',
                'feature3_title' => 'Bits vs Bytes',
                'feature3_desc' => 'Convierte con precisión entre bits (Mbps) y bytes (MB/s) para velocidades del mundo real.',
                'main_title' => 'Comprensión de la conversión de tasa de transferencia',
                'description_p1' => 'Las tasas de transferencia miden qué tan rápido se mueven los datos, expresadas en bits por segundo (bps) o bytes por segundo (B/s). Los proveedores (ISP) anuncian velocidades en Mbps.',
                'description_p2' => 'Diferencia clave: 1 Byte = 8 Bits. Una conexión de 100 Mbps descarga teóricamente a 12.5 MB/s.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Velocidades de Internet:</strong> Entender la velocidad anunciada vs la real',
                'usage_2' => '<strong>Tiempos de descarga:</strong> Estimar cuánto tardarán los archivos',
                'usage_3' => '<strong>Streaming:</strong> Verificar si la conexión soporta 4K/HD',
                'usage_4' => '<strong>Planificación de red:</strong> Diseño de infraestructura y ancho de banda',
                'faq_title' => 'Preguntas frecuentes'
            ]
        ]
    ],
    'density-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер плотности - кг/м³, г/см³, фунт/фут³',
                'description' => 'Мгновенно конвертируйте единицы плотности. Килограммы на кубический метр в граммы на кубический сантиметр и фунты на кубический фут.',
                'h1' => 'Конвертер плотности',
                'subtitle' => 'Конвертация кг/м³, г/см³ и фунт/фут³ для материаловедения'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_kg_m3' => 'кг/м³ (Килограмм/куб. метр)',
                'unit_g_cm3' => 'г/см³ (Грамм/куб. сантиметр)',
                'unit_lb_ft3' => 'фунт/фут³ (Фунт/куб. фут)',
                'unit_lb_in3' => 'фунт/дюйм³ (Фунт/куб. дюйм)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы плотности',
                'feature1_desc' => 'Конвертация между кг/м³, г/см³, фунт/фут³ и другими мерами.',
                'feature2_title' => 'Материаловедение',
                'feature2_desc' => 'Важно для физики, химии, инженерии и расчетов свойств материалов.',
                'feature3_title' => 'Точные конвертации',
                'feature3_desc' => 'Точные расчеты плотности для научных и промышленных целей.',
                'main_title' => 'Понимание плотности',
                'description_p1' => 'Плотность измеряет массу на единицу объема. В системе СИ это кг/м³, в химии часто используют г/см³.',
                'description_p2' => 'Плотность воды — около 1000 кг/м³ (1 г/см³). Формула: Плотность = Масса ÷ Объем.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Материаловедение:</strong> Определение и сравнение свойств материалов',
                'usage_2' => '<strong>Инженерия:</strong> Расчеты конструкций и нагрузки',
                'usage_3' => '<strong>Химия:</strong> Концентрация растворов и идентификация веществ',
                'usage_4' => '<strong>Производство:</strong> Контроль качества и спецификации',
                'usage_5' => '<strong>Геология:</strong> Измерение плотности пород и минералов',
                'usage_6' => '<strong>Физика:</strong> Расчеты плавучести и механика жидкостей',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Какова плотность воды в разных единицах?',
                'faq_a1' => 'Плотность воды — 1000 кг/м³, 1 г/см³ или 62,4 фунт/фут³ при 4°C.',
                'faq_q2' => 'Как перевести г/см³ в кг/м³?',
                'faq_a2' => 'Умножить на 1000. Например, 7,85 г/см³ (сталь) = 7850 кг/м³.',
                'faq_q3' => 'Почему плотность важна при выборе материала?',
                'faq_a3' => 'Она влияет на вес, прочность, плавучесть и стоимость.',
                'faq_q4' => 'Как температура влияет на плотность?',
                'faq_a4' => 'Большинство тел при нагреве расширяются, что снижает плотность. Вода ведет себя иначе — она плотнее всего при 4°C.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de densidad - kg/m³, g/cm³, lb/ft³',
                'description' => 'Convierte unidades de densidad al instante. Kilogramos por metro cúbico a gramos por centímetro cúbico y libras por pie cúbico.',
                'h1' => 'Convertidor de densidad',
                'subtitle' => 'Convierte kg/m³, g/cm³ y lb/ft³ para ciencia de materiales'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_kg_m3' => 'kg/m³ (Kilogramo/metro cúbico)',
                'unit_g_cm3' => 'g/cm³ (Gramo/centímetro cúbico)',
                'unit_lb_ft3' => 'lb/ft³ (Libra/pie cúbico)',
                'unit_lb_in3' => 'lb/in³ (Libra/pulgada cúbica)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de densidad',
                'feature1_desc' => 'Convierte entre kg/m³, g/cm³, lb/ft³ y otras medidas de densidad.',
                'feature2_title' => 'Ciencia de Materiales',
                'feature2_desc' => 'Esencial para física, química, ingeniería y cálculos científicos.',
                'feature3_title' => 'Conversiones precisas',
                'feature3_desc' => 'Cálculos de densidad precisos para aplicaciones científicas e industriales.',
                'main_title' => 'Comprensión de la densidad',
                'description_p1' => 'La densidad mide la masa por unidad de volumen. La unidad SI es kg/m³, mientras que g/cm³ se usa en química. El sistema imperial usa lb/ft³.',
                'description_p2' => 'El agua tiene una densidad de 1000 kg/m³ o 1 g/cm³. La fórmula es: Densidad = Masa ÷ Volumen.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Ciencia:</strong> Identificación de propiedades de materiales',
                'usage_2' => '<strong>Ingeniería:</strong> Cálculos estructurales y carga',
                'usage_3' => '<strong>Química:</strong> Concentraciones e identificación de sustancias',
                'usage_4' => '<strong>Fabricación:</strong> Control de calidad',
                'usage_5' => '<strong>Geología:</strong> Mediciones de rocas y minerales',
                'usage_6' => '<strong>Física:</strong> Flotabilidad y mecánica de fluidos',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cuál es la densidad del agua en diferentes unidades?',
                'faq_a1' => '1000 kg/m³, 1 g/cm³ o 62.4 lb/ft³ a 4°C.',
                'faq_q2' => '¿Cómo convierto g/cm³ a kg/m³?',
                'faq_a2' => 'Multiplica por 1000. Ejemplo: 7.85 g/cm³ (acero) = 7850 kg/m³.',
                'faq_q3' => '¿Por qué es importante la densidad?',
                'faq_a3' => 'Afecta el peso, la resistencia, la flotabilidad y el costo.',
                'faq_q4' => '¿Cómo afecta la temperatura a la densidad?',
                'faq_a4' => 'La mayoría de los materiales se expanden al calentarse, disminuyendo la densidad.'
            ]
        ]
    ],
    'digital-storage-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер цифровых данных - Байты, КБ, МБ, ГБ, ТБ',
                'description' => 'Мгновенно конвертируйте единицы хранения данных. Байты в Мегабайты, Гигабайты в Терабайты и Петабайты.',
                'h1' => 'Конвертер цифровых данных',
                'subtitle' => 'Конвертация байтов, КБ, МБ, ГБ и ТБ для файлов и накопителей'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_b' => 'Бит (b)',
                'unit_B' => 'Байт (B)',
                'unit_KB' => 'Килобайт (KB)',
                'unit_MB' => 'Мегабайт (MB)',
                'unit_GB' => 'Гигабайт (GB)',
                'unit_TB' => 'Терабайт (TB)',
                'unit_PB' => 'Петабайт (PB)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Бинарные единицы',
                'feature1_desc' => 'Конвертация между битами, байтами, КБ, МБ, ГБ, ТБ по стандарту 1024.',
                'feature2_title' => 'Файлы и устройства',
                'feature2_desc' => 'Для понимания емкости дисков, размеров файлов и характеристик памяти.',
                'feature3_title' => 'Точные расчеты',
                'feature3_desc' => 'Использование стандарта 1024, как в операционных системах.',
                'main_title' => 'Понимание цифровых данных',
                'description_p1' => 'Цифровые данные измеряются в двоичной системе. Базовая единица — бит, 8 бит составляют байт.',
                'description_p2' => 'В двоичной системе 1 КБ = 1024 байта. Производители дисков часто используют десятичную систему (1000), поэтому диск на 500 ГБ виден в Windows как ~465 ГБ.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Файлы:</strong> Понимание размеров документов и медиафайлов',
                'usage_2' => '<strong>Покупки:</strong> Сравнение емкости жестких дисков и SSD',
                'usage_3' => '<strong>Облако:</strong> Управление квотами хранилища',
                'usage_4' => '<strong>Скорость:</strong> Оценка времени передачи данных',
                'usage_5' => '<strong>Базы данных:</strong> Расчет требований к хранению',
                'usage_6' => '<strong>Оптимизация:</strong> Управление свободным местом',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Почему диск 1 ТБ показывает 931 ГБ?',
                'faq_a1' => 'Производители считают по 1000, ОС — по 1024. Это нормально для всех устройств.',
                'faq_q2' => 'В чем разница между ГБ и ГиБ?',
                'faq_a2' => 'ГБ — десятичная, ГиБ — двоичная. Windows использует двоичную, но пишет ГБ.',
                'faq_q3' => 'Сколько фото вместит 128 ГБ?',
                'faq_a3' => 'Примерно 25-40 тысяч фото по 3-5 МБ каждое.',
                'faq_q4' => 'Какой объем памяти нужен смартфону?',
                'faq_a4' => 'Для базы достаточно 64-128 ГБ. Для видео и игр лучше 256 ГБ и более.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de almacenamiento digital - Bytes, KB, MB, GB, TB',
                'description' => 'Convierte unidades de almacenamiento digital al instante. Bytes a Megabytes, Gigabytes a Terabytes y Petabytes.',
                'h1' => 'Convertidor de almacenamiento digital',
                'subtitle' => 'Convierte bytes, KB, MB, GB y TB para tamaños de archivos'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_b' => 'Bit (b)',
                'unit_B' => 'Byte (B)',
                'unit_KB' => 'Kilobyte (KB)',
                'unit_MB' => 'Megabyte (MB)',
                'unit_GB' => 'Gigabyte (GB)',
                'unit_TB' => 'Terabyte (TB)',
                'unit_PB' => 'Petabyte (PB)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades binarias',
                'feature1_desc' => 'Convierte entre bits, bytes, KB, MB, GB, TB y PB usando el estándar binario (1024).',
                'feature2_title' => 'Archivos y Dispositivos',
                'feature2_desc' => 'Perfecto para entender capacidades de discos, tamaños de archivos y memoria.',
                'feature3_title' => 'Cálculos precisos',
                'feature3_desc' => 'Usa el estándar binario (1024) que coincide con los sistemas operativos.',
                'main_title' => 'Comprensión del almacenamiento digital',
                'description_p1' => 'El almacenamiento digital se mide en unidades binarias. El bit es la unidad fundamental, con 8 bits formando un byte.',
                'description_p2' => 'En el sistema binario, 1 KB = 1,024 bytes. Los fabricantes usan decimal (1000), por eso un disco de 500 GB muestra unos 465 GB en Windows.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Archivos:</strong> Entender tamaños de documentos y multimedia',
                'usage_2' => '<strong>Compras:</strong> Comparar capacidades de discos duros y SSD',
                'usage_3' => '<strong>Nube:</strong> Gestionar límites de almacenamiento',
                'usage_4' => '<strong>Transferencia:</strong> Estimar tiempos de descarga',
                'usage_5' => '<strong>Bases de datos:</strong> Calcular requisitos de almacenamiento',
                'usage_6' => '<strong>Optimización:</strong> Gestionar espacio en disco',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Por qué mi disco de 1 TB muestra 931 GB?',
                'faq_a1' => 'Fabricantes usan decimal (1000), sistemas operativos usan binario (1024).',
                'faq_q2' => '¿Cuál es la diferencia entre GB y GiB?',
                'faq_a2' => 'GB es decimal, GiB es binario. Windows usa binario pero lo etiqueta como GB.',
                'faq_q3' => '¿Cuántas fotos caben en 128 GB?',
                'faq_a3' => 'Unas 25,000-40,000 fotos de 3-5 MB.',
                'faq_q4' => '¿Qué almacenamiento necesito en mi teléfono?',
                'faq_a4' => '64-128 GB para uso básico. 256 GB+ para videos y juegos.'
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

echo "Batch 2.1 update completed.\n";
