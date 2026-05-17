<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Подготовка к госпитализации — Коробков А. О.',
    'description' => 'Подготовка к госпитализации и операции: прием препаратов, необходимые документы, личные вещи и организационные шаги.',
];
$pageTitle = 'Подготовка к госпитализации';
$extraStylesheets = ['assets/css/prep-page.css'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section doctor-page doctor-page--tone-deep prep-page">
        <div class="container prep-main-grid">
            <article class="info-card prep-topic">
                <h2>Перед госпитализацией:</h2>
                <div class="prep-subpoints">
                    <div class="prep-subpoint">
                        <p>А. До ЭГДС (за 7 дней до ЭГДС, профилактика эрозивно-язвенных изменений ЖКТ): гастропротекторная терапия.</p>
                    </div>
                    <div class="prep-subpoint">
                        <p>Б. После ЭГДС (за 7 дней до госпитализации): дополнительная антиагрегантная (кроверазжижающая) терапия.</p>
                    </div>
                    <div class="prep-subpoint">
                        <p>В. Продолжить приём ранее назначенных препаратов по имеющимся заболеваниям.</p>
                    </div>
                </div>
            </article>

            <article class="info-card prep-topic">
                <h2>Необходимые документы для госпитализации (оригиналы):</h2>
                <ul class="prep-bullets">
                    <li>Паспорт РФ, полис, СНИЛС;</li>
                    <li>Вся имеющаяся медицинская документация: выписки из стационаров, консультативные заключения, результаты обследований.</li>
                </ul>
            </article>

            <article class="info-card prep-topic">
                <h2>Личные вещи:</h2>
                <p>В палате Вам будет предоставлен халат, тапочки, туалетные принадлежности – мыло, шампунь, зубная щетка, зубная паста, шапочка для душа;</p>
                <p>Возьмите с собой необходимую Вам одежду и запас принимаемых Вами лекарств в расчете на срок госпитализации.</p>
            </article>

            <article class="info-card prep-page__focus-block" aria-label="Дополнительные рекомендации перед госпитализацией">
                <p>Обязательно: утром перед операцией принять душ и выбрить области запястий на обеих руках, а также паховую область с обеих сторон: выше (10 см) и ниже (10 см) паховой складки.</p>
                <p>В день госпитализации прибыть в клинику натощак (можно ужинать накануне вечером, но НЕ завтракать).</p>
                <p>Утреннюю терапию обязательно принять, запив небольшим количеством воды.</p>
            </article>

            <aside class="prep-page__disclaimer" aria-label="Медицинское предупреждение" role="note">
                <span class="prep-page__disclaimer-icon" aria-hidden="true">i</span>
                <div class="prep-page__disclaimer-content">
                    <p>Конкретные наименования, дозировки и наименование препаратов могут быть назначены после консультации специалиста.</p>
                    <p>Имеются противопоказания, необходима консультация специалиста</p>
                </div>
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
