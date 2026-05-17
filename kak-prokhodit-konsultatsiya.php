<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Как проходит консультация — Коробков А. О.',
    'description' => 'Варианты консультации у Коробкова Александра Олеговича, предварительная запись и перечень материалов для подготовки.',
];
$pageTitle = 'Как проходит консультация';
$pageSubtitle = '';
$extraStylesheets = ['assets/css/consultation-page.css'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section doctor-page doctor-page--tone-deep consultation-page__section consultation-page__section--overview">
        <div class="container consultation-page__overview-grid">
            <article class="info-card consultation-page__overview-content" aria-labelledby="consultation-main-title">
                <h2 class="consultation-page__block-title">Возможны несколько вариантов консультации:</h3>
                <ol class="consultation-page__options-list" aria-label="Варианты консультации">
                    <li class="consultation-page__options-item">Очная</li>
                    <li class="consultation-page__options-item">Телемедицинская</li>
                </ol>

                <div class="consultation-page__details-block" aria-label="Адрес и запись на консультацию">
                    <p class="consultation-page__details-text">Консультации проводятся в клинике АО «Медицина» по адресу: 125047, г. Москва, 2-й Тверской-Ямской пер., 10.</p>
                    <p class="consultation-page__details-text">Необходима предварительная запись по телефону.</p>
                </div>
            </article>

            <aside class="consultation-page__photo-panel" aria-label="Фото врача">
                <div class="consultation-page__photo-shell">
                    <div class="consultation-page__photo-placeholder">
                        <img src="assets/img/content/about-doctor0.jpg" alt="Сердечно-сосудистый хирург Александр Олегович Коробков">
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="inner-section doctor-page doctor-page--tone-soft consultation-page__section consultation-page__section--prep">
        <div class="container">
            <h2 class="section__title section__title--left consultation-page__title">Перед консультацией просьба подготовить:</h2>

            <ol class="consultation-page__prep-list" aria-label="Материалы перед консультацией">
                <li class="info-card consultation-page__prep-item">
                    <span class="consultation-page__prep-number" aria-hidden="true">1.</span>
                    <p class="consultation-page__prep-main">Все имеющиеся на руках выписки, обследования и заключения вне зависимости от срока давности и профиля.</p>
                    <p class="consultation-page__prep-note">Необходимо для всесторонней оценки Вашего здоровья.</p>
                </li>

                <li class="info-card consultation-page__prep-item">
                    <span class="consultation-page__prep-number" aria-hidden="true">2.</span>
                    <p class="consultation-page__prep-main">Список принимаемых препаратов, их дозы и кратность приёма.</p>
                    <p class="consultation-page__prep-note">Позволит оценить необходимость коррекции уже назначенной терапии.</p>
                </li>

                <li class="info-card consultation-page__prep-item">
                    <span class="consultation-page__prep-number" aria-hidden="true">3.</span>
                    <p class="consultation-page__prep-main">Записи выполненных ранее исследований и операций (КТ, МРТ, ангиография, коронарография, стентирование и т. д.) на электронном носителе или в облачном сервисе.</p>
                    <p class="consultation-page__prep-note">Позволит детально оценить проведённое обследование, лечение и определиться с дальнейшей тактикой по улучшению Вашего здоровья.</p>
                </li>
            </ol>
        </div>
    </section>

    <section class="inner-section doctor-page doctor-page--tone-deep consultation-page__section consultation-page__section--steps">
        <div class="container">
            <h2 class="section__title section__title--left consultation-page__title">Порядок действий при очной консультации в клинике:</h2>

            <div class="consultation-page__steps-grid" role="list" aria-label="Шаги очной консультации">
                <article class="info-card consultation-page__step-card" role="listitem">
                    <h3 class="consultation-page__step-title">ШАГ 1: Регистратура (1 этаж)</h3>
                    <ul class="consultation-page__step-list">
                        <li>Сообщите администратору, что записаны на консультацию к Коробкову А.О.</li>
                        <li>Получите синий пропуск для прохода через турникет.</li>
                    </ul>
                </article>

                <article class="info-card consultation-page__step-card" role="listitem">
                    <h3 class="consultation-page__step-title">ШАГ 2: Путь до кабинета</h3>
                    <ul class="consultation-page__step-list">
                        <li>Пройдите через турникет на 1 этаже с помощью синего пропуска.</li>
                        <li>Найдите лифты № 12 или 13 (большие дальние лифты напротив турникета).</li>
                        <li>В лифте нажмите кнопку «6В» на синей панели (6 этаж, 2 корпус, стационар).</li>
                    </ul>
                </article>

                <article class="info-card consultation-page__step-card" role="listitem">
                    <h3 class="consultation-page__step-title">ШАГ 3: Стационар (6 этаж)</h3>
                    <ul class="consultation-page__step-list">
                        <li>После выхода из лифта пройдите через дверь справа и следуйте вглубь отделения. Напротив поста медсестры расположена зона ожидания. Пожалуйста, ожидайте там. Врач выйдет за Вами.</li>
                        <li>ВАЖНО: Дверь в отделение может быть закрыта. Если она закрыта, позвоните по контактному номеру, чтобы Вас встретили.</li>
                    </ul>
                </article>
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
