<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Консультация эндоваскулярного хирурга — Коробков А. О.',
    'description' => 'Что включает консультация эндоваскулярного хирурга, как подготовить документы и как оставить заявку через форму на сайте.',
    'noindex' => true,
];
$pageTitle = 'Консультация';
$pageSubtitle = 'Что включает консультация эндоваскулярного хирурга и как к ней подготовиться.';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section">
        <div class="container two-col">
            <div class="info-card">
                <h2>Ключевая информация</h2>
                <p>Осмысленный временный текст для демонстрации полноценной страницы. <!-- TODO: Вставить реальные тексты от клиента --></p>
                <ul class="info-list">
                    <li>Структурированный блок для удобного восприятия пациентом.</li>
                    <li>Практические пояснения и шаги для подготовки.</li>
                    <li>Понятные ориентиры по срокам и результатам.</li>
                </ul>
            </div>
            <div class="media-placeholder">TODO: Вставить реальное фото клиники<br>TODO: Заменить на реальное фото врача</div>
        </div>
    </section>

    <section class="inner-section">
        <div class="container">
            <h2 class="section__title section__title--left">Разделы страницы</h2>
            <div class="inner-grid">
                <article class="info-card"><h3>Блок 1</h3><p>Тематическое описание раздела без lorem ipsum.</p></article>
                <article class="info-card"><h3>Блок 2</h3><p>Тематическое описание раздела без lorem ipsum.</p></article>
                <article class="info-card"><h3>Блок 3</h3><p>Тематическое описание раздела без lorem ipsum.</p></article>
            </div>
        </div>
    </section>

    <section class="inner-section faq">
        <div class="container">
            <h2 class="section__title section__title--left">Частые вопросы</h2>
            <details><summary>Как подготовиться?</summary><p>Подготовьте документы, анализы и выписки. <!-- TODO: Вставить реальные данные по анализам --></p></details>
            <details><summary>Когда ожидать обратную связь?</summary><p>Обычно в рабочее время в день обращения.</p></details>
        </div>
    </section>

<?php if (true):
    $formTitle = 'Связаться';
    $formSubtitle = 'Оставьте контакты, и администратор свяжется с вами.';
    require __DIR__ . '/includes/form-block.php';
endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
