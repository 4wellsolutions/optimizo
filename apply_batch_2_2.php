<?php

$locales = ['ru', 'es'];
$category = 'converters';
$tools = [
    'energy-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер энергии - Джоули, Калории, кВт·ч',
                'description' => 'Мгновенно конвертируйте единицы энергии. Джоули в калории, киловатт-часы в БТЕ и другие.',
                'h1' => 'Конвертер энергии',
                'subtitle' => 'Конвертация джоулей, калорий, кВт·ч и БТЕ для расчетов'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_J' => 'Джоуль (J)',
                'unit_kJ' => 'Килоджоуль (kJ)',
                'unit_cal' => 'Калория (cal)',
                'unit_kcal' => 'Килокалория (kcal/Cal)',
                'unit_Wh' => 'Ватт-час (Wh)',
                'unit_kWh' => 'Киловатт-час (kWh)',
                'unit_BTU' => 'Британская тепловая единица (BTU)',
                'unit_ftlb' => 'Фут-фунт (ft⋅lb)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Множество единиц',
                'feature1_desc' => 'Конвертация между джоулями, калориями, БТЕ, киловатт-часами и другими.',
                'feature2_title' => 'Питание и физика',
                'feature2_desc' => 'Идеально для расчета калорий в еде, счетов за электричество и термодинамики.',
                'feature3_title' => 'Научная точность',
                'feature3_desc' => 'Точные преобразования для инженерии, диетологии и управления энергией.',
                'main_title' => 'Понимание轉換 энергии',
                'description_p1' => 'Энергия — это способность совершать работу. В системе СИ это Джоуль (J). В диетологии — Калория (cal). Для электричества — Киловатт-часы (kWh).',
                'description_p2' => 'Одна пищевая Калория (с большой буквы) — это килокалория (1000 кал), что равно 4184 Джоулям.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Диетология:</strong> Перевод энергии пищи из Джоулей в Калории',
                'usage_2' => '<strong>Электричество:</strong> Расчет потребления в кВт·ч для оплаты',
                'usage_3' => '<strong>HVAC:</strong> Подбор кондиционеров и обогревателей в БТЕ',
                'usage_4' => '<strong>Физика:</strong> Расчет работы и энергии в Джоулях',
                'usage_5' => '<strong>Спорт:</strong> Оценка сожженных калорий во время тренировок',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'В чем разница между Калорией и калорией?',
                'faq_a1' => 'Малая калория (cal) — энергия нагрева 1г воды на 1°C. Пищевая Калория (kcal) — это 1000 малых калорий.',
                'faq_q2' => 'Сколько Джоулей в кВт·ч?',
                'faq_a2' => 'Один киловатт-час (kWh) равен 3,6 миллионам Джоулей (3,6 МДж).',
                'faq_q3' => 'Для чего используется БТЕ (BTU)?',
                'faq_a3' => 'БТЕ показывает количество тепла для нагрева 1 фунта воды на 1°F. Используется для оценки мощности климатической техники.',
                'faq_q4' => 'Как перевести Джоули в Калории?',
                'faq_a4' => 'Разделите Джоули на 4,184 для малых калорий или на 4184 для пищевых калорий (ккал).'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de energía - Julios, Calorías, kWh',
                'description' => 'Convierte unidades de energía al instante. Julios a Calorías, Kilovatios-hora a BTU y más.',
                'h1' => 'Convertidor de energía',
                'subtitle' => 'Convierte julios, calorías, kWh y BTU para cálculos de energía'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_J' => 'Julio (J)',
                'unit_kJ' => 'Kilojulio (kJ)',
                'unit_cal' => 'Caloría (cal)',
                'unit_kcal' => 'Kilocaloría (kcal/Cal)',
                'unit_Wh' => 'Vatio-hora (Wh)',
                'unit_kWh' => 'Kilovatio-hora (kWh)',
                'unit_BTU' => 'Unidad Térmica Británica (BTU)',
                'unit_ftlb' => 'Pie-libra (ft⋅lb)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Múltiples unidades',
                'feature1_desc' => 'Convierte entre julios, calorías, BTU, kilovatios-hora y más.',
                'feature2_title' => 'Nutrición y Física',
                'feature2_desc' => 'Perfecto para calorías de alimentos, facturas de electricidad y termodinámica.',
                'feature3_title' => 'Precisión científica',
                'feature3_desc' => 'Conversiones precisas para ingeniería, nutrición y gestión de energía.',
                'main_title' => 'Comprensión de la energía',
                'description_p1' => 'La energía es la capacidad de realizar un trabajo. La unidad SI es el Julio (J). En nutrición, la unidad estándar es la Caloría (cal) o Kilocaloría (kcal).',
                'description_p2' => 'Una caloría nutricional es en realidad una kilocaloría (1,000 cal), equivalente a 4,184 Julios. Los BTU se usan en sistemas de calefacción.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Nutrición:</strong> Convertir energía de alimentos de Julios a Calorías',
                'usage_2' => '<strong>Electricidad:</strong> Calcular el uso de energía en kWh para facturación',
                'usage_3' => '<strong>HVAC:</strong> Dimensionado de aires acondicionados en BTU',
                'usage_4' => '<strong>Física:</strong> Cálculos de trabajo y energía en Julios',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Qué diferencia hay entre Caloría y caloría?',
                'faq_a1' => 'Una caloría (cal) calienta 1g de agua 1°C. Una Caloría (kcal) son 1,000 calorías. Las etiquetas usan kcal.',
                'faq_q2' => '¿Cuántos Julios hay en un kWh?',
                'faq_a2' => 'Un kilovatio-hora (kWh) equivale a 3.6 millones de Julios (3.6 MJ).',
                'faq_q3' => '¿Para qué se usa un BTU?',
                'faq_a3' => ' BTU representa el calor necesario para elevar 1 lb de agua 1°F. Se usa para clasificar aires acondicionados.',
                'faq_q4' => '¿Cómo convierto Julios a Calorías?',
                'faq_a4' => 'Divide los Julios por 4,184 para obtener Calorías (kcal).'
            ]
        ]
    ],
    'force-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер силы - Ньютоны, Фунт-сила, Килограмм-сила',
                'description' => 'Мгновенно конвертируйте единицы силы. Ньютоны в фунт-силу (lbf), килограмм-силу (kgf) и другие.',
                'h1' => 'Конвертер силы',
                'subtitle' => 'Мгновенная конвертация ньютонов, фунт-силы и килограмм-силы'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_N' => 'Ньютон (N)',
                'unit_kN' => 'Килоньютон (kN)',
                'unit_lbf' => 'Фунт-сила (lbf)',
                'unit_kgf' => 'Килограмм-сила (kgf)',
                'unit_dyn' => 'Дина (dyn)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы силы',
                'feature1_desc' => 'Конвертация между ньютонами, фунт-силой, килограмм-силой и динами.',
                'feature2_title' => 'Физика и инженерия',
                'feature2_desc' => 'Идеально для механики, структурной инженерии и физических расчетов.',
                'feature3_title' => 'Научная точность',
                'feature3_desc' => 'Точные конвертации с использованием стандартов соотношения единиц силы.',
                'main_title' => 'Понимание силы',
                'description_p1' => 'Сила — это мера воздействия на тело, которое может изменить его движение. В системе СИ измеряется в ньютонах (N). Один ньютон — это сила, необходимая для ускорения массы в один килограмм на 1 м/с².',
                'description_p2' => 'Один фунт-сила равен примерно 4,448 ньютонам. Один килограмм-сила равен 9,807 ньютонам.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Структурная инженерия:</strong> Расчеты нагрузки для зданий и мостов',
                'usage_2' => '<strong>Механика:</strong> Спецификации силы пружины и натяжения',
                'usage_3' => '<strong>Физика:</strong> Расчеты силы в задачах по механике',
                'usage_4' => '<strong>Аэрокосмическая отрасль:</strong> Измерение тяги и подъемной силы',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести ньютоны в фунт-силу?',
                'faq_a1' => 'Умножьте ньютоны на 0,2248. Например, 100 N × 0,2248 = 22,48 lbf.',
                'faq_q2' => 'В чем разница между массой и силой?',
                'faq_a2' => 'Масса (кг) — количество вещества, сила (N) — масса, умноженная на ускорение. Вес — это сила тяжести.',
                'faq_q3' => 'Что такое килограмм-сила (kgf)?',
                'faq_a3' => 'Это сила, с которой 1 кг массы давит на опору под действием стандартной гравитации. Равна 9,80665 ньютонам.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de fuerza - Newtons, Libra-fuerza, Kilogramo-fuerza',
                'description' => 'Convierte unidades de fuerza al instante. Newtons a Libra-fuerza (lbf), Kilogramo-fuerza (kgf) y más.',
                'h1' => 'Convertidor de fuerza',
                'subtitle' => 'Convierte newtons, libra-fuerza y kilogramo-fuerza al instante'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_N' => 'Newton (N)',
                'unit_kN' => 'Kilonewton (kN)',
                'unit_lbf' => 'Libra-fuerza (lbf)',
                'unit_kgf' => 'Kilogramo-fuerza (kgf)',
                'unit_dyn' => 'Dina (dyn)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de fuerza',
                'feature1_desc' => 'Convierte entre newtons, libra-fuerza, kilogramo-fuerza y dinas.',
                'feature2_title' => 'Física e Ingeniería',
                'feature2_desc' => 'Perfecto para mecánica, ingeniería estructural y cálculos físicos.',
                'feature3_title' => 'Precisión científica',
                'feature3_desc' => 'Conversiones precisas usando relaciones estándar de unidades de fuerza.',
                'main_title' => 'Comprensión de la fuerza',
                'description_p1' => 'La fuerza mide el empuje o tracción que puede cambiar el movimiento de un objeto, se mide en newtons (N). Un newton es la fuerza necesaria para acelerar un kilogramo de masa 1 m/s².',
                'description_p2' => 'Una libra-fuerza equivale aproximadamente a 4.448 newtons, mientras que un kilogramo-fuerza equivale a 9.807 newtons.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Ingeniería:</strong> Cálculos de carga para edificios y puentes',
                'usage_2' => '<strong>Diseño:</strong> Especificaciones de tensión y fuerza de resortes',
                'usage_3' => '<strong>Física:</strong> Cálculos de fuerza en problemas de mecánica',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto newtons a libra-fuerza?',
                'faq_a1' => 'Multiplica los newtons por 0.2248. Por ejemplo, 100 N × 0.2248 = 22.48 lbf.',
                'faq_q2' => '¿Cuál es la diferencia entre masa y fuerza?',
                'faq_a2' => 'La masa (kg) es la cantidad de materia, la fuerza (N) es masa por aceleración. El peso es una fuerza.',
                'faq_q3' => '¿Qué es el kilogramo-fuerza (kgf)?',
                'faq_a3' => 'Es la fuerza ejercida por 1 kg de masa bajo gravedad estándar (9.80665 m/s²).'
            ]
        ]
    ],
    'frequency-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер частоты - Герцы, кГц, МГц, ГГц',
                'description' => 'Мгновенно конвертируйте единицы частоты. Герцы в Мегагерцы, Гигагерцы в Килогерцы.',
                'h1' => 'Конвертер частоты',
                'subtitle' => 'Преобразование Гц, кГц, МГц и ГГц для электроники и сигналов'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_Hz' => 'Герц (Hz)',
                'unit_kHz' => 'Килогерц (kHz)',
                'unit_MHz' => 'Мегагерц (MHz)',
                'unit_GHz' => 'Гигагерц (GHz)',
                'unit_THz' => 'Терагерц (THz)',
                'unit_rpm' => 'Об/мин (RPM)',
                'to_label' => 'В'
            ],
            'content' => [
                'main_title' => 'Понимание частоты',
                'description_p1' => 'Частота измеряет количество повторяющихся событий в единицу времени, выражается в герцах (Гц). 1 Гц равен одному циклу в секунду.',
                'description_p2' => '1 кГц = 1000 Гц, 1 МГц = 1 000 000 Гц. Процессоры работают на частотах ГГц (миллиарды циклов в секунду).',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Вычисления:</strong> Частота процессора (CPU) и графики (GPU) в ГГц',
                'usage_2' => '<strong>Радио/ТВ:</strong> Частоты вещания в МГц и кГц',
                'usage_3' => '<strong>Аудио:</strong> Звуковые частоты и частоты дискретизации',
                'usage_4' => '<strong>Беспроводная связь:</strong> WiFi, Bluetooth и мобильные частоты',
                'usage_5' => '<strong>Механика:</strong> Обороты двигателя (RPM)',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести МГц в ГГц?',
                'faq_a1' => 'Разделите МГц на 1000. Например, 3000 МГц ÷ 1000 = 3 ГГц.',
                'faq_q2' => 'Как соотносятся Гц и RPM?',
                'faq_a2' => '1 Гц = 60 RPM. Двигатель на 1800 об/мин имеет частоту 30 Гц.',
                'faq_q3' => 'Почему скорость процессоров меряют в ГГц?',
                'faq_a3' => 'Это показывает, сколько миллиардов операций в секунду может выполнить чип.',
                'faq_q4' => 'На каких частотах работает WiFi?',
                'faq_a4' => 'WiFi использует диапазоны 2,4 ГГц и 5 ГГц.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de frecuencia - Hertz, kHz, MHz, GHz',
                'description' => 'Convierte unidades de frecuencia al instante. Hertz a MegaHertz, GigaHertz a KiloHertz.',
                'h1' => 'Convertidor de frecuencia',
                'subtitle' => 'Convierte Hz, kHz, MHz y GHz para electrónica y señales'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_Hz' => 'Hertz (Hz)',
                'unit_kHz' => 'Kilohertz (kHz)',
                'unit_MHz' => 'Megahertz (MHz)',
                'unit_GHz' => 'Gigahertz (GHz)',
                'unit_THz' => 'Terahertz (THz)',
                'unit_rpm' => 'Rev. por Minuto (RPM)',
                'to_label' => 'A'
            ],
            'content' => [
                'main_title' => 'Comprensión de la frecuencia',
                'description_p1' => 'La frecuencia mide la ocurrencia de un evento repetitivo por unidad de tiempo, expresada en hertz (Hz). 1 Hz es un ciclo por segundo.',
                'description_p2' => '1 kHz = 1,000 Hz, 1 MHz = 1,000,000 Hz. Los procesadores modernos operan en el rango de los GHz.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Computación:</strong> Velocidad de reloj de CPU y GPU en GHz',
                'usage_2' => '<strong>Radio/TV:</strong> Frecuencias de transmisión en MHz y kHz',
                'usage_3' => '<strong>Audio:</strong> Frecuencias de sonido y tasas de muestreo',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto MHz a GHz?',
                'faq_a1' => 'Divide los MHz por 1000. Por ejemplo, 3000 MHz ÷ 1000 = 3 GHz.',
                'faq_q2' => '¿Cuál es la relación entre Hz y RPM?',
                'faq_a2' => '1 Hz = 60 RPM. Un motor a 1800 RPM tiene una frecuencia de 30 Hz.',
                'faq_q3' => '¿Por qué las CPU se miden en GHz?',
                'faq_a3' => 'Indica cuántos miles de millones de ciclos por segundo puede realizar el procesador.',
                'faq_q4' => '¿Qué frecuencias usa el WiFi?',
                'faq_a4' => 'El WiFi utiliza principalmente las bandas de 2.4 GHz y 5 GHz.'
            ]
        ]
    ],
    'fuel-consumption-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер расхода топлива - MPG, км/л, л/100км',
                'description' => 'Мгновенно конвертируйте единицы расхода топлива. Мили на галлон (MPG) в л/100км и километры на литр.',
                'h1' => 'Конвертер расхода топлива',
                'subtitle' => 'Конвертация MPG, км/л и л/100км для оценки эффективности'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_mpg_us' => 'MPG (США)',
                'unit_mpg_uk' => 'MPG (Великобритания)',
                'unit_km_l' => 'Километры/Литр (km/L)',
                'unit_l_100km' => 'Литры/100км',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Экономия топлива',
                'feature1_desc' => 'Конвертируйте MPG, л/100км, км/л, американские и британские галлоны.',
                'feature2_title' => 'Авто и путешествия',
                'feature2_desc' => 'Идеально для сравнения эффективности авто и расчета затрат на топливо.',
                'feature3_title' => 'Обратная зависимость',
                'feature3_desc' => 'Точный расчет эффективности (MPG) и расхода (л/100км).',
                'main_title' => 'Понимание расхода топлива',
                'description_p1' => 'Расход топлива показывает эффективность автомобиля. В США/Британии это MPG (мили на галлон), в Европе — л/100км.',
                'description_p2' => 'Важно: Галлоны США и Британии разные. 1 галлон США = 3,785 л, 1 галлон Британии = 4,546 л.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Покупка авто:</strong> Сравнение экономики авто из США и Европы',
                'usage_2' => '<strong>Поездки:</strong> Расчет затрат на топливо в пути',
                'usage_3' => '<strong>Экология:</strong> Оценка углеродного следа от топлива',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Как перевести MPG в л/100км?',
                'faq_a1' => 'Разделите 235,21 на MPG (США). Например, 30 MPG → 7,84 л/100км.',
                'faq_q2' => 'В чем разница между MPG США и Британии?',
                'faq_a2' => 'Британский галлон на 20% больше. 30 MPG (US) ≈ 36 MPG (UK).',
                'faq_q3' => 'Что лучше: выше MPG или ниже л/100км?',
                'faq_a3' => 'И то, и другое означает экономию. Выше MPG — больше миль на галлоне, ниже л/100км — меньше топлива на путь.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de consumo de combustible - MPG, km/L, L/100km',
                'description' => 'Convierte unidades de consumo al instante. Millas por galón (MPG) a L/100km y Kilómetros por litro.',
                'h1' => 'Convertidor de consumo de combustible',
                'subtitle' => 'Convierte MPG, km/L y L/100km para eficiencia de combustible'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_mpg_us' => 'MPG (EE. UU.)',
                'unit_mpg_uk' => 'MPG (Reino Unido)',
                'unit_km_l' => 'Kilómetros/Litro (km/L)',
                'unit_l_100km' => 'Litros/100km',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Eficiencia de combustible',
                'feature1_desc' => 'Convierte entre MPG, L/100km, km/L y galones imperiales/estadounidenses.',
                'feature2_title' => 'Automotriz y Viajes',
                'feature2_desc' => 'Perfecto para comparar la eficiencia del vehículo y calcular costos de combustible.',
                'feature3_title' => 'Relación inversa',
                'feature3_desc' => 'Maneja con precisión las conversiones de eficiencia (MPG) vs consumo (L/100km).',
                'main_title' => 'Comprensión del consumo de combustible',
                'description_p1' => 'El consumo de combustible mide la eficiencia del vehículo. Diferentes regiones usan estándares: MPG o L/100km.',
                'description_p2' => 'El galón de EE. UU. (3.785 L) difiere del galón del Reino Unido (4.546 L). 30 MPG (EE. UU.) equivale a 36 MPG (UK).',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Búsqueda:</strong> Comparar economía entre coches americanos y europeos',
                'usage_2' => '<strong>Viajes:</strong> Calcular costos de gasolina para viajes largos',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cómo convierto MPG a L/100km?',
                'faq_a1' => 'Divide 235.21 por MPG (EE. UU.). Ejemplo: 30 MPG → 7.84 L/100km.',
                'faq_q2' => '¿Qué es mejor: MPG alto o L/100km bajo?',
                'faq_a2' => '¡Ambos! Un MPG alto significa más millas por galón, y un L/100km bajo significa menos combustible gastado.'
            ]
        ]
    ],
    'length-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер длины - Метры, Футы, Дюймы, Км, Мили',
                'description' => 'Мгновенно конвертируйте меры длины. Поддержка метрических и имперских единиц: метры, футы, дюймы, километры и мили.',
                'h1' => 'Конвертер длины',
                'subtitle' => 'Преобразование метров, футов, дюймов, км и миль с высокой точностью'
            ],
            'form' => [
                'from_label' => 'Из',
                'optgroup_metric' => 'Метрическая система',
                'unit_mm' => 'Миллиметр (mm)',
                'unit_cm' => 'Сантиметр (cm)',
                'unit_m' => 'Метр (m)',
                'unit_km' => 'Километр (km)',
                'optgroup_imperial' => 'Имперская система',
                'unit_in' => 'Дюйм (in)',
                'unit_ft' => 'Фут (ft)',
                'unit_yd' => 'Ярд (yd)',
                'unit_mi' => 'Миля (mi)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Мгновенная конвертация',
                'feature1_desc' => 'Получайте результаты сразу при вводе. Без ожиданий и перезагрузок.',
                'feature2_title' => 'Высокая точность',
                'feature2_desc' => 'Расчет до 10 знаков после запятой для научной точности.',
                'feature3_title' => 'Метрические и имперские',
                'feature3_desc' => 'Поддержка всех популярных единиц от миллиметров до миль.',
                'main_title' => 'Понимание длины',
                'description_p1' => 'Длина измеряет расстояние между двумя точками. Метрическая система (метры) принята во всем мире, имперская (дюймы, футы) — в США и Британии.',
                'description_p2' => 'Базовая единица СИ — метр. 1 дюйм — это ровно 25,4 миллиметра.',
                'usage_examples_title' => 'Примеры использования',
                'usage_1' => '<strong>Строительство:</strong> Перевод чертежей между системами',
                'usage_2' => '<strong>Путешествия:</strong> Понимание дистанции в километрах и милях',
                'usage_3' => '<strong>Наука:</strong> Лабораторные замеры в микронах и миллиметрах',
                'usage_4' => '<strong>Рост:</strong> Перевод сантиметров в футы и дюймы',
                'faq_title' => 'Часто задаваемые вопросы',
                'faq_q1' => 'Сколько футов в миле?',
                'faq_a1' => 'В одной миле 5 280 футов.',
                'faq_q2' => 'Как перевести дюймы в сантиметры?',
                'faq_a2' => 'Умножьте дюймы на 2,54.',
                'faq_q3' => 'В чем разница между ярдом и метром?',
                'faq_a3' => 'Метр немного длиннее ярда. 1 метр ≈ 1,094 ярда.'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de longitud - Metros, Pies, Pulgadas, Km, Millas',
                'description' => 'Convierte medidas de longitud al instante. Soporta unidades métricas e imperiales como metros, pies, pulgadas, kilómetros y millas.',
                'h1' => 'Convertidor de longitud',
                'subtitle' => 'Convierte metros, pies, pulgadas, km y millas con alta precisión'
            ],
            'form' => [
                'from_label' => 'De',
                'optgroup_metric' => 'Métrico',
                'unit_mm' => 'Milímetro (mm)',
                'unit_cm' => 'Centímetro (cm)',
                'unit_m' => 'Metro (m)',
                'unit_km' => 'Kilómetro (km)',
                'optgroup_imperial' => 'Imperial',
                'unit_in' => 'Pulgada (in)',
                'unit_ft' => 'Pie (ft)',
                'unit_yd' => 'Yarda (yd)',
                'unit_mi' => 'Milla (mi)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Conversión Instantánea',
                'feature1_desc' => 'Obtén resultados de inmediato mientras escribes. Sin esperas.',
                'feature2_title' => 'Alta Precisión',
                'feature2_desc' => 'Calcula hasta 10 decimales para precisión científica.',
                'feature3_title' => 'Métrico e Imperial',
                'feature3_desc' => 'Soporta todas las unidades comunes desde milímetros hasta millas.',
                'main_title' => 'Comprensión de la longitud',
                'description_p1' => 'La longitud mide la distancia entre dos puntos. El sistema métrico (metros) se usa globalmente, el imperial (pulgadas, pies) principalmente en EE. UU.',
                'description_p2' => 'El metro es la unidad base SI. Una pulgada son exactamente 25.4 milímetros.',
                'usage_examples_title' => 'Ejemplos de uso común',
                'usage_1' => '<strong>Construcción:</strong> Convertir planos de métrico a imperial',
                'usage_2' => '<strong>Viajes:</strong> Entender distancias en kilómetros vs millas',
                'usage_3' => '<strong>Ciencia:</strong> Mediciones de laboratorio en micras',
                'usage_4' => '<strong>Estatura:</strong> Convertir centímetros a pies y pulgadas',
                'faq_title' => 'Preguntas frecuentes',
                'faq_q1' => '¿Cuántos pies hay en una milla?',
                'faq_a1' => 'Hay 5,280 pies en una milla.',
                'faq_q2' => '¿Cómo convierto pulgadas a centímetros?',
                'faq_a2' => 'Multiplica el valor por 2.54.',
                'faq_q3' => '¿Cuál es la diferencia entre yarda y metro?',
                'faq_a3' => 'Un metro es algo más largo que una yarda. 1 metro ≈ 1.094 yardas.'
            ]
        ]
    ],
    'molar-mass-converter' => [
        'ru' => [
            'meta' => [
                'title' => 'Конвертер молярной массы - г/моль в кг/моль',
                'description' => 'Мгновенно конвертируйте молярную массу. Граммы на моль в килограммы на моль.',
                'h1' => 'Конвертер молярной массы',
                'subtitle' => 'Конвертация г/моль, кг/моль и фунт/моль для химии'
            ],
            'form' => [
                'from_label' => 'Из',
                'unit_g_mol' => 'Грамм на моль (g/mol)',
                'unit_kg_mol' => 'Килограмм на моль (kg/mol)',
                'unit_lb_mol' => 'Фунт на моль (lb/mol)',
                'to_label' => 'В'
            ],
            'content' => [
                'feature1_title' => 'Единицы массы',
                'feature1_desc' => 'Перевод между г/моль, кг/моль, фунт/моль для химических расчетов.',
                'feature2_title' => 'Химия и наука',
                'feature2_desc' => 'Идеально для стехиометрии, физической и промышленной химии.',
                'feature3_title' => 'Точность расчетов',
                'feature3_desc' => 'Точная конвертация молярных масс для всех научных нужд.',
                'main_title' => 'Понимание молярной массы'
            ]
        ],
        'es' => [
            'meta' => [
                'title' => 'Convertidor de masa molar - g/mol a kg/mol',
                'description' => 'Convierte unidades de masa molar al instante. Gramos por mol a kilogramos por mol.',
                'h1' => 'Convertidor de masa molar',
                'subtitle' => 'Convierte g/mol, kg/mol y lb/mol para química'
            ],
            'form' => [
                'from_label' => 'De',
                'unit_g_mol' => 'Gramo por mol (g/mol)',
                'unit_kg_mol' => 'Kilogramo por mol (kg/mol)',
                'unit_lb_mol' => 'Libra por mol (lb/mol)',
                'to_label' => 'A'
            ],
            'content' => [
                'feature1_title' => 'Unidades de masa molar',
                'feature1_desc' => 'Convierte entre g/mol, kg/mol y lb/mol para cálculos de química.',
                'feature2_title' => 'Química y Ciencia',
                'feature3_title' => 'Cálculos de precisión',
                'main_title' => 'Comprensión de la masa molar'
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

echo "Batch 2.2 update completed.\n";
