<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Анестезия при эндоваскулярных вмешательствах — Коробков А. О.',
    'description' => 'Информация об анестезии при эндоваскулярных вмешательствах: местная анестезия, седация и наблюдение во время операции.',
];
$pageTitle = 'Анестезия';
$pageSubtitle = '';
$innerPageAttrs = ' data-page="anesthesia"';
$extraStylesheets = ['assets/css/anesteziya.css'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section doctor-page doctor-page--tone-deep anesthesia-page" aria-label="Страница об анестезии">
        <article class="anesthesia-page__layout" aria-label="Информация об анестезии во время эндоваскулярного вмешательства">
            <section class="anesthesia-page__section anesthesia-page__section--main" aria-label="Основной текст об анестезии">
                <div class="container anesthesia-page__content">
                    <p class="anesthesia-page__text">Эндоваскулярные операции выполняются через точечный прокол под местной анестезией; общий наркоз применяется крайне редко - преимущественно при операциях на полостях сердца, клапанах или аорте.</p>
                    <p class="anesthesia-page__text">В области пункции (чаще всего лучевой или бедренной артерии) вводится местный анестетик. Для уменьшения дискомфорта на этапе инфильтрационной анестезии дополнительно используется внутривенная седация (успокоительные препараты), что обеспечивает комфорт пациента на протяжении всего вмешательства.</p>
                    <p class="anesthesia-page__text">Все манипуляции внутри сосудистого русла безболезненны, поскольку внутренняя стенка сосудов не содержит болевых рецепторов.</p>
                    <p class="anesthesia-page__text">Оптимальный вариант анестезии определяется индивидуально после консультации.</p>
                </div>
            </section>

            <section class="anesthesia-page__section anesthesia-page__section--final" aria-label="Предупреждение">
                <div class="container anesthesia-page__content">
                    <p class="anesthesia-page__warning">Имеются противопоказания, необходима консультация специалиста</p>
                </div>
            </section>
        </article>
    </section>

<?php
$formTitle = 'Связаться';
$formSubtitle = 'Оставьте контакты, и администратор свяжется с вами.';
require __DIR__ . '/includes/form-block.php';
?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
