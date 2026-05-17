<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Коробков Александр Олегович — эндоваскулярный хирург в Москве',
    'description' => 'Официальный сайт врача эндоваскулярного хирурга Коробкова Александра Олеговича: направления работы, материалы для пациентов, публикации и контакты.',
];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

        <main id="home-page">
            <section class="hero" id="hero">
                <div class="container hero__grid">
                    <div class="hero__visual">
                        <div class="hero__image-card">
                            <img src="assets/img/content/hero-doctor0.png" alt="Фото врача эндоваскулярного хирурга" class="hero__image" width="853" height="1280" loading="eager" fetchpriority="high" decoding="async">
                        </div>
                    </div>

                    <div class="hero__content">
                        <div class="hero__content-panel">
                            <h1 class="hero__title"><!-- TODO: Заменить на реальные данные врача -->Коробков<br>Александр Олегович </h1>
                            <p class="hero__subtitle"><!-- TODO: Заменить на реальные данные врача -->Врач эндоваскулярный хирург</p>
                            <p class="hero__subtitle"><!-- TODO: Заменить на реальные данные врача -->Стаж работы 16 лет</p>

                            <div class="hero__actions">
                                <a class="button button--accent" href="kontakty.php">Связаться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section--tight" id="specialization">
                <div class="container">
                    <div class="section__head">
                        <h2 class="section__title">Направления работы</h2>
                    </div>

                    <?php require __DIR__ . '/includes/work-directions-data.php'; ?>
                    <?php require __DIR__ . '/includes/work-directions-content.php'; ?>
                </div>
            </section>

            <section class="section section--about" id="about">
                <div class="container about">
                    <div class="about__content">
                        <h2 class="section__title section__title--left"><!-- TODO: Заменить на реальные данные врача -->Коробков<br>Александр Олегович</h2>
                        <p class="about__lead"><!-- TODO: Заменить на реальные данные врача -->ВРАЧ ЭНДОВАСКУЛЯРНЫЙ ХИРУРГ</p>
                        <div class="about__text"><!-- TODO: Заменить на реальные данные врача -->
                            <p>Коробков Александр Олегович — эндоваскулярный хирург, ангиохирург, 16 лет клинической практики, врач высшей квалифицированной категории, соискатель ученой степени кандидата медицинских наук в ФГБНУ «РНЦХ им. акад. Б.В. Петровского».</p>
                            <p>В 2010 году с отличием закончил бюджетную форму обучения в ММА им. И.М. Сеченова.</p>
                            <p>В 2012 году был первым выпускником ординатуры в стране по специальности «рентгенэндоваскулярные диагностика и лечение» на базе ФГБНУ «РНЦХ им. акад. Б.В. Петровского».</p>
                            <p>На базе ФГАУ "НМИЦ ЛРЦ" Минздрава России при участии Коробкова Александра Олеговича были разработаны и утверждены Министерством здравоохранения РФ к практическому применению 7 протоколов клинических апробаций. </p>
                            <p>В 2017 г награжден Благодарностью Министра здравоохранения Российской Федерации.</p>
                            <p>Сегодня выступает спикером на профильных конгрессах по эндоваскулярной хирургии в России и проводит обучение врачей.</p>
                            <p>Александр Олегович находится у истоков венозного стентирования и стентирования сонных артерий в России. </p>
                        </div>
                    </div>

                    <div class="about__visual">
                        <!-- TODO: Вставить изображение about-doctor.webp в /assets/img/content/ -->
                        <img src="assets/img/content/fotoVracha.png" alt="Портрет врача" class="about__image">
                    </div>
                </div>
            </section>

            <?php require __DIR__ . '/includes/form-block.php'; ?>

            <section class="legal-note-section" aria-label="Юридическое примечание">
                <div class="container">
                    <div class="legal-note" role="note">
                        <p class="legal-note__text">Индивидуальный предприниматель Коробков А.О. не оказывает медицинских услуг. Размещённая на сайте информация носит справочно-информационный характер и не является публичной офертой. Окончательная стоимость медицинских услуг рассчитывается медицинской организацией АО «Медицина» после очной консультации с врачом, исходя из клинической картины и объёма необходимых вмешательств. Для получения точной информации о стоимости необходимой Вам медицинской услуги, пожалуйста, свяжитесь с медицинской организацией напрямую по телефону. Вы также можете обратиться ко мне для организации записи на консультацию к профильному специалисту.</p>
                    </div>
                </div>
            </section>
        </main>

        <?php require __DIR__ . '/includes/footer.php'; ?>
