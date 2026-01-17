<?php

$locales = ['ru', 'es'];
$category = 'converters';
$tools = [
    'power-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер мощности - Ватты, Киловатты, Лошадиные силы',
                'description' => 'Мгновенно конвертируйте единицы мощности. Ватты в лошадиные силы, киловатты в БТЕ/ч и другие.',
                'h1' => 'Конвертер мощности',
                'subtitle' => 'Конвертация ватт, киловатт, лошадиных сил и БТЕ/ч'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_W' => 'Ватт (W)',
                'unit_kW' => 'Киловатт (kW)',
                'unit_hp' => 'Лошадиная сила (hp)',
                'unit_ps' => 'Метрическая л.с. (PS)',
                'unit_kcal_h' => 'ккал/ч',
                'unit_btu_h' => 'БТЕ/ч (BTU/h)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы мощности',
                'feature1_desc' => 'Конвертация между ваттами, киловаттами, л.с. и БТЕ/ч.',
                'feature2_title' => 'Двигатели и моторы',
                'feature2_desc' => 'Идеально для автомобильных, электрических и механических расчетов.',
                'feature3_title' => 'Научная точность',
                'feature3_desc' => 'Точные конвертации для инженерии и энергетики.',
                'main_title' => 'Понимание мощности',
                'description_p1' => 'Мощность — это скорость передачи энергии или выполнения работы. Единица СИ — ватт (Вт), равный одному джоулю в секунду.',
                'description_p2' => 'Одна механическая лошадиная сила ≈ 745,7 Вт. Киловатты (кВт) — стандарт для электроприборов и двигателей.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Авто:</strong> Сравнение мощности двигателей на разных рынках',
                'usage_2' => '<strong>Техника:</strong> Потребление энергии бытовыми приборами',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести л.с. в кВт?',
                'faq_a1' => 'Умножьте л.с. на 0,7457. Например, 100 hp × 0,7457 = 74,57 kW.',
                'faq_q2' => 'В чем разница между HP и PS?',
                'faq_a2' => 'HP — имперская л.с., PS — метрическая. PS чуть меньше (100 PS ≈ 98,6 HP).',
                'faq_q3' => 'Почему мощность до сих пор меряют в лошадиных силах?',
                'faq_a3' => 'Это историческая традиция в автопроме, к которой люди привыкли лучше, чем к киловаттам.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de potencia - Vatios, Kilovatios, Caballos de fuerza',
                'description' => 'Convierte unidades de potencia al instante. Vatios a Caballos de fuerza (HP), Kilovatios a BTU/h y más.',
                'h1' => 'Convertidor de potencia',
                'subtitle' => 'Convierte vatios, kilovatios, caballos de fuerza y BTU/h al instante'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_W' => 'Vatio (W)',
                'unit_kW' => 'Kilovatio (kW)',
                'unit_hp' => 'Caballo de fuerza (hp)',
                'unit_ps' => 'Caballo métrico (PS)',
                'unit_kcal_h' => 'kcal/h',
                'unit_btu_h' => 'BTU/h',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de potencia',
                'feature1_desc' => 'Convierte entre vatios, kilovatios, caballos de fuerza y BTU/h.',
                'feature2_title' => 'Motores y Maquinaria',
                'feature2_desc' => 'Perfecto para cálculos automotrices, eléctricos y mecánicos.',
                'main_title' => 'Comprensión de la potencia',
                'description_p1' => 'La potencia es la tasa a la que se transfiere energía. La unidad SI es el vatio (W). Los motores usan caballos de fuerza (HP).',
                'description_p2' => 'Un HP mecánico equivale a unos 745.7 vatios.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Automotriz:</strong> Comparar potencia de motores entre diferentes mercados',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto HP a kW?',
                'faq_a1' => 'Multiplica los HP por 0.7457.'
            ]
        ]
    ],
    'pressure-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер давления - Паскаль, Бар, PSI, Атм',
                'description' => 'Мгновенно конвертируйте единицы давления. Паскаль в Бар, PSI в Атмосферы и мм рт. ст.',
                'h1' => 'Конвертер давления',
                'subtitle' => 'Конвертация PSI, бар, паскалей, атм и мм рт. ст.'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_Pa' => 'Паскаль (Pa)',
                'unit_kPa' => 'Килопаскаль (kPa)',
                'unit_bar' => 'Бар (bar)',
                'unit_psi' => 'PSI (фунт/кв. дюйм)',
                'unit_atm' => 'Атмосфера (atm)',
                'unit_mmHg' => 'Мм рт. ст. (mmHg)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы давления',
                'feature1_desc' => 'Конвертация между PSI, бар, паскалями, атмосферами и другими мерами.',
                'feature2_title' => 'Авто и погода',
                'feature2_desc' => 'Идеально для давления в шинах, прогнозов погоды и промышленности.',
                'feature3_title' => 'Точность расчетов',
                'feature3_desc' => 'Точные конвертации для инженеров, дайверов и ученых.',
                'main_title' => 'Понимание давления',
                'description_p1' => 'Давление — это сила, действующая на единицу площади. СИ единица — паскаль (Па). Один бар = 100 000 Па.',
                'description_p2' => 'Давление в шинах обычно измеряется в PSI (США) или барах (Европа): 30 PSI ≈ 2,07 бар.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Авто:</strong> Давление в шинах (PSI против бар)',
                'usage_2' => '<strong>Метеорология:</strong> Атмосферное давление (гПа, мбар)',
                'usage_3' => '<strong>Дайвинг:</strong> Расчет давления под водой в атмосферах',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести PSI в бар?',
                'faq_a1' => 'Разделите PSI на 14,504. Например, 30 PSI ÷ 14,504 ≈ 2,07 bar.',
                'faq_q2' => 'Что такое стандартная атмосфера?',
                'faq_a2' => 'Это давление на уровне моря, равное 101 325 Па или 1 атм.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de presión - Pascal, Bar, PSI, Atm',
                'description' => 'Convierte unidades de presión al instante. Pascal a Bar, PSI a Atmósferas y mmHg.',
                'h1' => 'Convertidor de presión',
                'subtitle' => 'Convierte PSI, bar, pascal, atm y mmHg al instante'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_Pa' => 'Pascal (Pa)',
                'unit_kPa' => 'Kilopascal (kPa)',
                'unit_bar' => 'Bar',
                'unit_psi' => 'PSI (lb/in²)',
                'unit_atm' => 'Atmósfera (atm)',
                'unit_mmHg' => 'Milímetro de mercurio (mmHg)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de presión',
                'feature1_desc' => 'Convierte entre PSI, bar, pascal, atmósfera y otras unidades.',
                'feature2_title' => 'Automotriz y Clima',
                'feature3_title' => 'Precisión científica',
                'main_title' => 'Comprensión de la presión',
                'description_p1' => 'La presión mide la fuerza por unidad de área. La unidad SI es el pascal (Pa). Un bar equivale a 100,000 pascales.',
                'description_p2' => 'La presión de neumáticos se suele medir en PSI o bar. 30 PSI son aprox. 2.07 bar.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Automotriz:</strong> Presión de neumáticos (PSI vs bar)',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto PSI a bar?',
                'faq_a1' => 'Divide el valor PSI por 14.504.'
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

echo "Batch 2.5 update completed.\n";
