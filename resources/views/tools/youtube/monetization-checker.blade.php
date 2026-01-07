@extends('layouts.app')

@section('title', $tool->meta_title)
@section('meta_description', $tool->meta_description)
@if($tool->meta_keywords)
@section('meta_keywords', $tool->meta_keywords)
@endif

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <!-- Header -->
        <x-tool-hero :tool="$tool" />

        <!-- Tool -->
        <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border-2 border-red-200 mb-8">
            <form id="monetizationForm">
                @csrf
                <div class="mb-6">
                    <label for="channelUrl" class="form-label text-base">URL канала YouTube или хэндл</label>
                    <input type="text" id="channelUrl" name="url" class="form-input"
                        placeholder="https://www.youtube.com/@channelname или @channelname" required>
                    <p class="text-sm text-gray-500 mt-2">Введите URL канала, хэндл (@username) или ID канала</p>
                </div>

                <button type="submit" class="btn-primary w-full justify-center text-lg py-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="btnText">Проверить монетизацию</span>
                </button>
            </form>

            <!-- Results -->
            <div id="results" class="hidden mt-8">
                <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-xl p-6 border-2 border-red-200">
                    <div class="flex items-center gap-4 mb-4">
                        <img id="channelThumbnail" src="" alt="Channel" class="w-20 h-20 rounded-full">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900" id="channelName"></h3>
                            <p class="text-gray-600" id="subscriberCount"></p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 mt-6">
                        <div class="bg-white rounded-lg p-4">
                            <div class="text-sm text-gray-600 mb-1">Статус монетизации</div>
                            <div class="text-2xl font-black" id="monetizationStatus"></div>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <div class="text-sm text-gray-600 mb-1">Расчетный статус</div>
                            <div class="text-lg font-bold text-gray-900" id="estimatedStatus"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-blue-50 border-2 border-blue-200 rounded-lg">
                        <p class="text-sm text-blue-800">
                            <strong>Примечание:</strong> Этот инструмент оценивает монетизацию на основе публичных данных
                            канала. Фактический статус монетизации может быть подтвержден только владельцем канала через
                            YouTube Studio.
                        </p>
                    </div>

                    @include('components.hero-actions')
                </div>
            </div>

            <!-- Error -->
            <div id="error" class="hidden mt-8">
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                    <p class="text-red-800 font-semibold" id="errorText"></p>
                </div>

                @include('components.hero-actions')
            </div>
        </div>

        <!-- SEO Content - Redesigned -->
        <div
            class="bg-gradient-to-br from-red-50 via-pink-50 to-rose-50 rounded-3xl p-8 md:p-12 mt-8 border-2 border-red-100 shadow-2xl">
            <div class="text-center mb-8">
                <div total views, upload frequency, and channel age to provide accurate monetization estimates. Perfect for
                    content creators tracking their progress, marketers researching influencers, or anyone curious about a
                    channel's revenue potential. </p>

                    <h3 class="text-3xl font-bold text-gray-900 mb-6 text-center">✅ Требования программы партнеров YouTube
                        (2024)</h3>
                    <div class="grid md:grid-cols-2 gap-6 mb-10">
                        <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                            <h4 class="font-bold text-2xl mb-3">👥 1000 подписчиков</h4>
                            <p class="text-white/90 mb-3">Минимальный порог подписчиков, необходимый для получения права на
                                монетизацию</p>
                            <p class="text-white/80 text-sm">Важная первая веха для программы партнеров YouTube</p>
                        </div>
                        <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 text-white shadow-xl">
                            <h4 class="font-bold text-2xl mb-3">⏱️ 4000 часов просмотра</h4>
                            <p class="text-white/90 mb-3">Должны быть накоплены за последние 12 месяцев для длинного
                                контента</p>
                            <p class="text-white/80 text-sm">Или 10 млн просмотров Shorts за 90 дней в качестве альтернативы
                            </p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 border-2 border-red-200 shadow-lg">
                            <h4 class="font-bold text-xl text-gray-900 mb-3">💳 Аккаунт Google AdSense</h4>
                            <p class="text-gray-700 mb-3">Действительный и одобренный аккаунт AdSense, привязанный к вашему
                                каналу</p>
                            <p class="text-gray-600 text-sm">Требуется для получения платежей от YouTube</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 border-2 border-pink-200 shadow-lg">
                            <h4 class="font-bold text-xl text-gray-900 mb-3">📋 Соблюдение политики</h4>
                            <p class="text-gray-700 mb-3">Отсутствие активных предупреждений, нарушений или предупреждений о
                                политике</p>
                            <p class="text-gray-600 text-sm">Полное соответствие правилам сообщества и контента</p>
                        </div>
                    </div>

                    <h3 class="text-3xl font-bold text-gray-900 mb-6">💰 Источники дохода от монетизации YouTube</h3>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                        <div
                            class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                            <div class="text-3xl mb-3">📺</div>
                            <h4 class="font-bold text-gray-900 mb-2">Доход от рекламы</h4>
                            <p class="text-gray-600 text-sm">Медийная, оверлейная, пропускаемая и непропускаемая
                                видеореклама</p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                            <div class="text-3xl mb-3">⭐</div>
                            <h4 class="font-bold text-gray-900 mb-2">Членство в канале</h4>
                            <p class="text-gray-600 text-sm">Ежемесячные повторяющиеся платежи за эксклюзивные привилегии
                            </p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                            <div class="text-3xl mb-3">💬</div>
                            <h4 class="font-bold text-gray-900 mb-2">Super Chat и Thanks</h4>
                            <p class="text-gray-600 text-sm">Финансирование от фанатов во время прямых трансляций и на видео
                            </p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-red-300 transition-all shadow-lg">
                            <div class="text-3xl mb-3">🎬</div>
                            <h4 class="font-bold text-gray-900 mb-2">YouTube Premium</h4>
                            <p class="text-gray-600 text-sm">Доля от абонентской платы участников Premium</p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-pink-300 transition-all shadow-lg">
                            <div class="text-3xl mb-3">🛍️</div>
                            <h4 class="font-bold text-gray-900 mb-2">Полка товаров</h4>
                            <p class="text-gray-600 text-sm">Продавайте фирменные товары прямо под видео</p>
                        </div>
                        <div
                            class="bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-rose-300 transition-all shadow-lg">
                            <div class="text-3xl mb-3">🤝</div>
                            <h4 class="font-bold text-gray-900 mb-2">Спонсируемый контент</h4>
                            <p class="text-gray-600 text-sm">Возможности для сделок с брендами и спонсорства</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-8 mb-10">
                        <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-3 text-xl">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            💡 Важное уведомление
                        </h4>
                        <p class="text-blue-800 leading-relaxed">
                            Этот инструмент предоставляет оценки на основе публично доступных данных канала и требований
                            программы партнеров YouTube. Фактический статус монетизации может быть подтвержден только
                            владельцем канала через YouTube Studio. Соответствие минимальным требованиям не гарантирует
                            одобрения - каналы должны поддерживать соответствие всем политикам YouTube, правилам сообщества
                            и рекомендациям по контенту, дружественному рекламодателям.
                        </p>
                    </div>

                    <h3 class="text-3xl font-bold text-gray-900 mb-6">❓ Часто задаваемые вопросы</h3>
                    <div class="space-y-4">
                        <div
                            class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Насколько точна проверка монетизации?</h4>
                            <p class="text-gray-700 leading-relaxed">Наш инструмент предоставляет высокоточные оценки
                                (точность 90%+) на основе публичных метрик и требований программы партнеров YouTube. Однако
                                только владельцы каналов могут подтвердить фактический статус монетизации через YouTube
                                Studio.</p>
                        </div>
                        <div
                            class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Могу ли я проверить любой канал YouTube?</h4>
                            <p class="text-gray-700 leading-relaxed">Да! Вы можете проверить любой публичный канал YouTube,
                                введя его URL, хэндл (@username) или ID канала. Частные или удаленные каналы не могут быть
                                проанализированы.</p>
                        </div>
                        <div
                            class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Сколько времени занимает одобрение монетизации?
                            </h4>
                            <p class="text-gray-700 leading-relaxed">YouTube обычно рассматривает заявки в течение 1 месяца
                                после того, как вы выполните все требования. Сложные случаи или периоды высокой нагрузки
                                могут привести к более длительному времени ожидания (до 2-3 месяцев).</p>
                        </div>
                        <div
                            class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Что делать, если мой канал отклонен?</h4>
                            <p class="text-gray-700 leading-relaxed">Если отклонен, просмотрите отзывы YouTube, устраните
                                любые нарушения политики и подайте заявку повторно через 30 дней. Распространенные причины
                                отклонения включают повторно используемый контент, спам, вводящие в заблуждение метаданные
                                или нарушения политики.</p>
                        </div>
                        <div
                            class="bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-lg hover:shadow-xl transition-all">
                            <h4 class="font-bold text-gray-900 mb-3 text-lg">Сколько денег могут зарабатывать
                                монетизированные каналы?</h4>
                            <p class="text-gray-700 leading-relaxed">Доходы сильно различаются в зависимости от ниши,
                                демографии аудитории, ставок CPM и вовлеченности. Средний CPM варьируется от $0.25 до $4.00
                                за 1000 просмотров, но может быть намного выше для премиальных ниш, таких как финансы,
                                технологии или бизнес-контент.</p>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $('#monetizationForm').on('submit', function (e) {
                    e.preventDefault();

                    const url = $('#channelUrl').val().trim();
                    const btn = $(this).find('button[type="submit"]');
                    const btnText = $('#btnText');

                    if (!url) return;

                    btn.prop('disabled', true).addClass('opacity-75');
                    btnText.text('Проверка...');
                    $('#results').addClass('hidden');
                    $('#error').addClass('hidden');

                    $.ajax({
                        url: '{{ route("youtube.monetization.check") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            url: url
                        },
                        success: function (response) {
                            if (response.success) {
                                displayResults(response.data);
                            }
                        },
                        error: function (xhr) {
                            const error = xhr.responseJSON?.error || 'Failed to check monetization status';
                            $('#errorText').text(error);
                            $('#error').removeClass('hidden');
                        },
                        complete: function () {
                            btn.prop('disabled', false).removeClass('opacity-75');
                            btnText.text('Проверить монетизацию');
                        }
                    });
                });

                function displayResults(data) {
                    $('#channelThumbnail').attr('src', data.thumbnail);
                    $('#channelName').text(data.channelName);
                    $('#subscriberCount').text(data.subscribers + ' подписчиков');

                    const isMonetized = data.isMonetized;
                    const statusColor = isMonetized ? 'text-green-600' : 'text-red-600';
                    const statusText = isMonetized ? '✅ Вероятно монетизирован' : '❌ Не монетизирован';

                    $('#monetizationStatus').html(`<span class="${statusColor}">${statusText}</span>`);
                    $('#estimatedStatus').text(data.estimatedStatus);

                    $('#results').removeClass('hidden');
                    setTimeout(() => {
                        $('#results')[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            </script>
@endsection