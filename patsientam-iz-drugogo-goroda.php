<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Пациентам из другого города — Коробков А. О.',
    'description' => 'Пациентам из другого города: порядок консультации, подготовки документов, предоперационного обследования и госпитализации.',
];
$pageTitle = 'Пациентам из другого города';
$pageSubtitle = '';
$innerPageAttrs = ' id="outtown-page"';
$extraStylesheets = ['assets/css/outtown-page.css'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

<section class="inner-section outtown-page__section">
    <div class="container outtown-page__container">
        <article class="outtown-page__article" aria-label="Информация для пациентов из другого города">
            <ol class="outtown-page__steps">
                <li class="outtown-page__step">Для начала необходима предварительная консультация - <a href="kak-prokhodit-konsultatsiya.php">Как проходит консультация</a>. Возможна дистанционная телемедицинская консультация. На ней будет определена дата операции.</li>
                <li class="outtown-page__step">После согласования даты операции необходимо пройти предоперационное обследование (<a href="analizy.php">Анализы и обследования перед госпитализацией</a> и <a href="podgotovka-k-operatsii.php">Подготовка к госпитализации</a>) любым удобным Вам способом.</li>
                <li class="outtown-page__step">Необходимо иметь в виду, что в случае прохождения предоперационного обследования в клинике «АО Медицина» срок госпитализации может быть увеличен на время проведения обследования (до нескольких дней).</li>
            </ol>
        </article>

        <aside class="outtown-page__warning" aria-label="Медицинское предупреждение">
            <p>Имеются противопоказания, необходима консультация специалиста</p>
        </aside>
    </div>
</section>

<?php
$formTitle = 'Связаться';
$formSubtitle = 'Оставьте контакты, и администратор свяжется с вами.';
require __DIR__ . '/includes/form-block.php';
?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
