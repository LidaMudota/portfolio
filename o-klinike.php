<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'О клинике в Москве — Коробков Александр Олегович',
    'description' => 'Информация о клинике в Москве, где ведется прием: лицензия, реквизиты медицинской организации, адрес и организационные детали.',
];
$pageTitle = 'О клинике';
$clinicHeading = 'АО «Медицина» (клиника академика Ройтберга):';
$pageSubtitle = 'Ваше здоровье в руках лидеров здравоохранения';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<main class="inner-page clinic-page">
    <section class="clinic-page__hero" aria-labelledby="clinic-page-title">
        <div class="clinic-page__hero-layout">
            <div class="clinic-page__hero-main">
                <div class="container clinic-page__hero-main-inner">
                    <nav class="breadcrumbs clinic-page__breadcrumbs" aria-label="Хлебные крошки">
                        <a href="index.php">Главная</a>
                        <span>•</span>
                        <span><?= e($pageTitle); ?></span>
                    </nav>
                    <h1 class="clinic-page__title" id="clinic-page-title"><?= e($pageTitle); ?></h1>
                    <p class="clinic-page__heading"><?= e($clinicHeading); ?></p>
                    <p class="clinic-page__lead"><?= e($pageSubtitle); ?><span class="clinic-page__lead-asterisk">*</span>.</p>
                </div>
            </div>

            <aside class="clinic-page__hero-aside" aria-label="Ключевые преимущества клиники">
                <div class="clinic-page__hero-aside-inner">
                    <ul class="clinic-page__features">
                        <li class="clinic-page__feature">Аккредитация JCI: Первая клиника в РФ, чья безопасность и качество услуг признаны на уровне мировых лидеров здравоохранения.</li>
                        <li class="clinic-page__feature">Сертификация Росздравнадзора: лидер по качеству и безопасности медицинской деятельности в России.</li>
                        <li class="clinic-page__feature">Высшие награды: Лауреат Премии Правительства РФ в области качества, призер европейского конкурса EFQM Awards 2012, победитель фестиваля «Формула жизни-2012» в номинации «Лучшая частная клиника Москвы».</li>
                        <li class="clinic-page__feature">Стандартизация процессов: Сертифицированы по международному стандарту ISO 9001:2015, что гарантирует эффективность системы менеджмента качества.</li>
                    </ul>
                    <p class="clinic-page__disclaimer"><span class="clinic-page__lead-asterisk">*</span> АО «Медицина» признано Росздравнадзором лидером по качеству и безопасности медицинской помощи среди медучреждений РФ.</p>
                </div>
            </aside>
        </div>
    </section>

    <section class="inner-section clinic-page__section clinic-page__section--secondary" aria-label="Информационный блок о клинике">
        <div class="container clinic-page__section-shell" role="presentation">
            <div class="clinic-page__details">
                <a class="clinic-page__section-note" href="https://www.medicina.ru/" target="_blank" rel="noopener noreferrer">https://www.medicina.ru/</a>
                <p class="clinic-page__detail">Лицензия Л041-00110-77/00363409 Срок действия: бессрочная</p>
                <p class="clinic-page__detail">Дата создания документа: 16.03.2018</p>
                <p class="clinic-page__detail">Документ изменён: 09.02.2026</p>
            </div>
        </div>
    </section>

<?php
$formTitle = 'Связаться';
$formSubtitle = 'Оставьте контакты, и администратор свяжется с вами.';
require __DIR__ . '/includes/form-block.php';
?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
