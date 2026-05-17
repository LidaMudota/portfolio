<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Анализы перед госпитализацией — Коробков А. О.',
    'description' => 'Анализы и обследования перед госпитализацией: утвержденный перечень перед плановой госпитализацией и операцией.',
];
$pageTitle = 'Анализы и обследования';
$pageSubtitle = '';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>
<section class="inner-section doctor-page doctor-page--tone-soft analizy-page">
    <div class="container analizy-page__container">
        <article class="analizy-checklist info-card" aria-label="Перечень анализов и обследований перед госпитализацией">
            <ol class="analizy-list">
                <li class="analizy-list__item">Общий клинический анализ крови с СОЭ и лейкоцитарной формулой (14 дней с момента выполнения).</li>
                <li class="analizy-list__item">Биохимический анализ крови: общий белок, общий билирубин, АЛТ, АСТ, калий, натрий, глюкоза, холестерин, ЛПНП, триглицериды, креатинин, мочевина (14 дней с момента выполнения).</li>
                <li class="analizy-list__item">Коагулограмма: АЧТВ, МНО, протромбин, тромбиновое время, фибриноген (14 дней с момента выполнения).</li>
                <li class="analizy-list__item">Группа крови, резус-фактор (без срока годности).</li>
                <li class="analizy-list__item">Анализ крови на ВИЧ, гепатиты (В и С) и сифилис (при выявлении положительного результата необходима консультация инфекциониста об отсутствии противопоказаний к плановой госпитализации) (3 месяца с момента выполнения).</li>
                <li class="analizy-list__item">Общий анализ мочи (14 дней с момента выполнения).</li>
                <li class="analizy-list__item">ЭКГ с расшифровкой (14 дней с момента выполнения).</li>
                <li class="analizy-list__item">Флюорография или рентгенография органов грудной клетки, либо КТ ОГК (12 месяцев с момента выполнения).</li>
                <li class="analizy-list__item">ЭХО-КГ (12 месяцев с момента выполнения).</li>
                <li class="analizy-list__item">Заключение терапевта о допуске к госпитализации (14 дней).</li>
                <li class="analizy-list__item">ЭГДС (45 дней с момента выполнения).</li>
                <li class="analizy-list__item">Холтеровское мониторирование ЭКГ или нагрузочный тест (без срока годности).</li>
                <li class="analizy-list__item">Заключение аллерголога (при наличии аллергических реакций на йод, новокаин или лидокаин) (14 дней).</li>
            </ol>
        </article>

        <p class="analizy-note info-card">Перечень обследований может быть изменен в соответствии с клинической необходимостью по результатам консультации специалиста.</p>

        <aside class="analizy-warning" aria-label="Медицинское предупреждение">
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
