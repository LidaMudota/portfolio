<?php
require __DIR__ . '/includes/init.php';
$isDentaHome = true;
$meta = [
    'title' => 'Denta Prime Clinic — премиальная стоматология и имплантация в Москве',
    'description' => 'Демо-сайт премиальной стоматологической клиники Denta Prime Clinic: имплантация, эстетическая стоматология, цифровая диагностика и индивидуальный план лечения.',
    'og_title' => 'Denta Prime Clinic — центр имплантации и эстетической стоматологии',
    'og_description' => 'Спокойная стоматология премиального уровня: консультация, диагностика, имплантация, виниры, реставрации и профессиональная гигиена.',
    'og_image' => canonical_origin() . '/assets/img/content/24%201.png',
    'site_name' => 'Denta Prime Clinic',
    'favicon' => 'assets/img/content/heart_kiojwzdgf0ot 1.png',
    'skip_default_schema' => true,
    'schema' => [[
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'Denta Prime Clinic',
        'url' => canonical_url_for_page('index.php'),
        'inLanguage' => 'ru-RU',
    ]],
];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

        <main id="home-page">
            <section class="hero" id="hero">
                <div class="container hero__grid">
                    <div class="hero__visual">
                        <div class="hero__image-card">
                            <img src="assets/img/content/a3d5ef2905d311f19b865ac8eb9d274d_1-no-bg-preview (carve.photos) 1.png" alt="Специалист Denta Prime Clinic" class="hero__image" width="423" height="506" loading="eager" fetchpriority="high" decoding="async">
                        </div>
                    </div>

                    <div class="hero__content">
                        <div class="hero__content-panel">
                            <h1 class="hero__title">Denta Prime<br>Clinic</h1>
                            <p class="hero__subtitle">Премиальная стоматологическая клиника</p>
                            <p class="hero__subtitle">Имплантация, эстетика и цифровой план лечения</p>

                            <div class="hero__actions">
                                <a class="button button--accent" href="kontakty.php">Записаться на консультацию</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section--tight" id="specialization">
                <div class="container">
                    <div class="section__head">
                        <h2 class="section__title">Направления клиники</h2>
                    </div>

                    <?php
                    $workDirectionsData = [
                        [
                            'id' => 'implantation',
                            'card_title' => 'Имплантация зубов',
                            'card_description' => 'Планирование восстановления зубов с учетом диагностики, анатомии и будущей эстетики улыбки.',
                            'full_title' => 'Имплантация зубов',
                            'icon' => 'assets/img/content/serdtse_w8z16fskl1pt 1.png',
                            'paragraphs' => [
                                'Перед лечением врач проводит консультацию, изучает снимки и объясняет возможные варианты восстановления.',
                                'План подбирается индивидуально: учитываются состояние костной ткани, прикус, эстетические задачи и комфорт пациента.',
                            ],
                            'images' => [
                                ['src' => 'assets/img/content/1(1).png', 'alt' => 'Консультация перед стоматологическим лечением'],
                            ],
                            'warning' => 'Имеются противопоказания, необходима консультация специалиста.',
                        ],
                        [
                            'id' => 'aesthetic-dentistry',
                            'card_title' => 'Эстетическая стоматология',
                            'card_description' => 'Виниры, реставрации и бережная работа с формой, оттенком и естественной гармонией улыбки.',
                            'full_title' => 'Эстетическая стоматология',
                            'icon' => 'assets/img/content/heart_kiojwzdgf0ot 1.png',
                            'paragraphs' => [
                                'Эстетический план строится без навязанных решений: врач обсуждает ожидания, ограничения и последовательность этапов.',
                                'Цель — аккуратная, естественная улыбка, которая соответствует чертам лица и не выглядит чрезмерной.',
                            ],
                            'images' => [
                                ['src' => 'assets/img/content/i (13) 1.png', 'alt' => 'Кабинет эстетической стоматологии'],
                            ],
                            'warning' => 'Имеются противопоказания, необходима консультация специалиста.',
                        ],
                        [
                            'id' => 'therapy',
                            'card_title' => 'Терапевтическое лечение',
                            'card_description' => 'Диагностика, лечение кариеса и восстановление зубов с вниманием к деталям и долгосрочному плану.',
                            'full_title' => 'Терапевтическое лечение',
                            'icon' => 'assets/img/content/heart_kiojwzdgf0ot 1.png',
                            'paragraphs' => [
                                'На консультации специалист объясняет состояние зубов понятным языком и предлагает последовательный маршрут лечения.',
                                'Мы избегаем лишних вмешательств и фиксируем приоритеты: срочные задачи, профилактику и эстетические пожелания.',
                            ],
                            'images' => [
                                ['src' => 'assets/img/content/i (12) 1.png', 'alt' => 'Обсуждение плана лечения'],
                            ],
                            'warning' => 'Имеются противопоказания, необходима консультация специалиста.',
                        ],
                        [
                            'id' => 'hygiene',
                            'card_title' => 'Профессиональная гигиена',
                            'card_description' => 'Деликатная профилактика, рекомендации по домашнему уходу и поддержание здоровья полости рта.',
                            'full_title' => 'Профессиональная гигиена',
                            'icon' => 'assets/img/content/serdtse_w8z16fskl1pt 1.png',
                            'paragraphs' => [
                                'Гигиена помогает поддерживать результат лечения и вовремя замечать изменения, требующие внимания специалиста.',
                                'После процедуры пациент получает персональные рекомендации по средствам ухода и графику профилактических визитов.',
                            ],
                            'images' => [
                                ['src' => 'assets/img/content/i (11) 1.png', 'alt' => 'Профилактический осмотр пациента'],
                            ],
                            'warning' => 'Имеются противопоказания, необходима консультация специалиста.',
                        ],
                    ];
                    require __DIR__ . '/includes/work-directions-content.php';
                    ?>
                </div>
            </section>

            <section class="section section--about" id="about">
                <div class="container about">
                    <div class="about__content">
                        <h2 class="section__title section__title--left">О Denta Prime<br>Clinic</h2>
                        <p class="about__lead">ЦЕНТР ИМПЛАНТАЦИИ И ЭСТЕТИЧЕСКОЙ СТОМАТОЛОГИИ</p>
                        <div class="about__text">
                            <p>Denta Prime Clinic — демонстрационный образ премиальной стоматологической клиники, где консультация начинается с внимательной диагностики и спокойного разговора о целях пациента.</p>
                            <p>Мы объединяем имплантацию, терапевтическое лечение, профессиональную гигиену, виниры и реставрации в понятный индивидуальный план без медицинских обещаний результата.</p>
                            <p>В центре внимания — цифровая диагностика, эстетика, аккуратная коммуникация и поэтапное объяснение каждого решения до начала лечения.</p>
                            <p>Контакты демо-проекта: +7 (495) 000-00-00, hello@dentaprime.demo, г. Москва, ул. Примерная, 12.</p>
                        </div>
                    </div>

                    <div class="about__visual">
                        <img src="assets/img/content/81ff483d05d611f1a8306e3932282319_1 1.png" alt="Специалист стоматологической клиники" class="about__image" loading="lazy" decoding="async">
                    </div>
                </div>
            </section>

            <section class="section section--results" id="results">
                <div class="container">
                    <div class="section__head section__head--results">
                        <h2 class="section__title">Пространство и подход</h2>
                    </div>
                    <div class="results-slider-area">
                        <div class="results-slider" aria-label="Галерея Denta Prime Clinic">
                            <article class="result-card">
                                <img class="result-card__image" src="assets/img/content/1(1).png" alt="Консультация пациента в клинике" loading="lazy" decoding="async">
                                <div class="result-card__meta"><p class="result-card__meta-title">Консультация и обсуждение ожиданий</p></div>
                            </article>
                            <article class="result-card">
                                <img class="result-card__image" src="assets/img/content/i (11) 1.png" alt="Командный осмотр пациента" loading="lazy" decoding="async">
                                <div class="result-card__meta"><p class="result-card__meta-title">Командный подход к плану лечения</p></div>
                            </article>
                            <article class="result-card">
                                <img class="result-card__image" src="assets/img/content/i (12) 1.png" alt="Врач обсуждает план лечения с пациентом" loading="lazy" decoding="async">
                                <div class="result-card__meta"><p class="result-card__meta-title">Понятное объяснение этапов лечения</p></div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

            <?php require __DIR__ . '/includes/form-block.php'; ?>

            <section class="legal-note-section" aria-label="Юридическое примечание">
                <div class="container">
                    <div class="legal-note" role="note">
                        <p class="legal-note__text">Информация на сайте носит справочный характер и не является медицинской консультацией. Имеются противопоказания, необходима консультация специалиста.</p>
                    </div>
                </div>
            </section>
        </main>

        <?php require __DIR__ . '/includes/footer.php'; ?>
