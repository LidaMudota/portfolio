<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Для врачей — Коробков Александр Олегович',
    'description' => 'Информация для врачей о направлении пациентов, профессиональном взаимодействии и порядке передачи медицинских материалов.',
];
$pageTitle = 'Для врачей';
$extraStylesheets = ['assets/css/dlya-vrachey.css'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section physicians-page" aria-label="Для врачей">
        <div class="container">
            <article class="physicians-article" aria-label="Порядок направления пациента">
                <p class="physicians-article__intro">Как направить пациента:</p>
                <ol class="physicians-article__list">
                    <li>Ознакомиться с <a href="rezultaty-rabot.php">направлениями работы</a> и <a href="podgotovka-k-operatsii.php">памяткой для подготовки</a></li>
                    <li>Записать пациента на <a href="kak-prokhodit-konsultatsiya.php">консультацию</a></li>
                    <li>Сообщить о направлении пациента <a href="kontakty.php">любым удобным способом</a></li>
                </ol>
                <p>Возможно направление <a href="patsientam-iz-drugogo-goroda.php">иногородних пациентов</a>, для прохождения лечения в клинике «АО Медицина»</p>
                <p>По условиям взаимодействия свяжитесь <a href="kontakty.php">любым удобным способом</a></p>
            </article>
        </div>
    </section>

</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
