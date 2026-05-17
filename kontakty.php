<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Контакты — эндоваскулярный хирург в Москве',
    'description' => 'Контакты для записи к Коробкову Александру Олеговичу: телефон, электронная почта, Telegram, адрес клиники в Москве и карта проезда.',
];
$pageTitle = 'Контакты';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section contacts-page-contacts">
        <div class="container">
            <article class="info-card contacts-page-panel" aria-label="Контактные данные">
                <ul class="contacts-page-list">
                    <li class="contacts-page-list__item">
                        <p class="contacts-page-list__label">Телефон</p>
                        <a class="contacts-page-list__value" href="tel:+79166930333">+7916 693 03 33</a>
                    </li>
                    <li class="contacts-page-list__item">
                        <p class="contacts-page-list__label">Электронная почта</p>
                        <a class="contacts-page-list__value" href="mailto:aokorobkov@yandex.ru">aokorobkov@yandex.ru</a>
                    </li>
                    <li class="contacts-page-list__item">
                        <p class="contacts-page-list__label">Telegram</p>
                        <a class="contacts-page-list__value" href="https://t.me/korobkovdr" target="_blank" rel="noopener noreferrer">T.me/korobkovdr</a>
                    </li>
                    <li class="contacts-page-list__item contacts-page-list__item--wide">
                        <p class="contacts-page-list__label">Max</p>
                        <a class="contacts-page-list__value contacts-page-list__value--long" href="https://max.ru/u/f9LHodD0cOLWF6kfyPzTNz7iR2jJ-pAWTKwQgZP74NvgrrP-LNTwd7H9_Kw" target="_blank" rel="noopener noreferrer">https://max.ru/u/f9LHodD0cOLWF6kfyPzTNz7iR2jJ-pAWTKwQgZP74NvgrrP-LNTwd7H9_Kw</a>
                    </li>
                </ul>
            </article>
        </div>
    </section>

    <section class="inner-section contacts-page-location">
        <div class="container">
            <div class="contacts-page-location__layout">
                <article class="info-card contacts-page-location__details">
                    <h2 class="contacts-page-location__title">Адрес и карта проезда</h2>
                    <p class="contacts-page-location__address"><?= e(clinic_location_data()['address']) ?></p>
                    <p class="contacts-page-location__text">Для удобства построения маршрута используйте карту.</p>
                </article>

                <div class="location-map contacts-page-location__map" aria-label="Карта расположения клиники">
                    <div class="location-map__top">
                        <div class="location-map__copy">
                            <h3 class="location-map__title">Как добраться</h3>
                            <p class="location-map__text">Откройте карту, чтобы построить путь из любой точки города.</p>
                        </div>
                        <a class="location-map__action" href="<?= e(clinic_location_route_url()) ?>" target="_blank" rel="noopener noreferrer">Построить маршрут</a>
                    </div>
                    <div class="location-map__frame" aria-label="Карта расположения клиники" data-lenis-prevent>
                        <script type="text/plain" data-cookie-category="optional" data-cookie-src="<?= e(clinic_location_constructor_script_url()) ?>"></script>
                            <noscript>Для отображения карты включите JavaScript.</noscript>
                    </div>
                </div>
            </div>

            <article class="info-card contacts-page-route">
                <h2 class="contacts-page-route__title">Как добраться до клиники:</h2>
                <h3 class="contacts-page-route__subtitle">На метро:</h3>
                <p class="contacts-page-route__text">От станции метро «Маяковская» время ходьбы 10 мин. Выход из метро №1, из стеклянных дверей направо, прямо по 1-й Тверской-Ямской ул. до дома №12, далее поворот направо на 2-й Тверской-Ямской переулок. Далее прямо, после второго перекрестка вы увидите здание клиники, вход со стороны 2-го Тверского-Ямского переулка.</p>
                <h3 class="contacts-page-route__subtitle">На автомобиле:</h3>
                <p class="contacts-page-route__text">В навигатор ввести – «АО Медицина».</p>
                <p class="contacts-page-route__text">Из центра по 1-й Тверской-Ямской ул., после Садового кольца поворот направо на 2-й Тверской-Ямской переулок. Далее прямо, через 200 м Вы увидите здание клиники.</p>
                <p class="contacts-page-route__text">Перед входом в клинику - платная городская парковка — 380 ₽/ч., есть несколько парковочных мест для людей с инвалидностью.</p>
            </article>
        </div>
    </section>

<?php
$formTitle = 'Связаться';
$formSubtitle = 'Оставьте контакты, и администратор свяжется с вами.';
require __DIR__ . '/includes/form-block.php';
?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
