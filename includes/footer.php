<?php
$isDentaHome = !empty($isDentaHome);
$footerBrand = $isDentaHome ? 'Denta Prime Clinic' : 'Коробков А. О.';
$footerCta = $isDentaHome ? 'Записаться на консультацию' : 'Связаться';
$footerCtaHref = $isDentaHome ? '#contacts' : 'kontakty.php';
$footerContacts = $isDentaHome ? [
    'phoneHref' => 'tel:+74950000000',
    'phone' => '+7 (495) 000-00-00',
    'mailHref' => 'mailto:hello@dentaprime.demo',
    'mail' => 'hello@dentaprime.demo',
    'address' => 'г. Москва, ул. Примерная, 12',
] : [
    'phoneHref' => 'tel:+79166930333',
    'phone' => '+7 (916) 693-03-33',
    'mailHref' => 'mailto:aokorobkov@yandex.ru',
    'mail' => 'aokorobkov@yandex.ru',
    'address' => '125047, г. Москва, 2-й Тверской-Ямской пер., 10',
];
$footerColumns = $isDentaHome ? [
    [
        ['href' => 'index.php', 'label' => 'Главная'],
        ['href' => '#specialization', 'label' => 'Услуги'],
        ['href' => '#about', 'label' => 'О клинике'],
    ],
    [
        ['href' => '#specialization', 'label' => 'Имплантация'],
        ['href' => '#specialization', 'label' => 'Эстетическая стоматология'],
        ['href' => '#specialization', 'label' => 'Профилактика'],
    ],
    [
        ['href' => '#results', 'label' => 'Пространство и подход'],
        ['href' => '#contacts', 'label' => 'Контакты'],
    ],
] : [
    [
        ['href' => 'index.php', 'label' => 'Главная'],
        ['href' => 'o-vrache.php', 'label' => 'Обо мне'],
        ['href' => 'rezultaty-rabot.php', 'label' => 'Направления работы'],
    ],
    [
        ['href' => 'analizy.php', 'label' => 'Анализы'],
        ['href' => 'anesteziya.php', 'label' => 'Анастезия'],
        ['href' => 'kak-prokhodit-konsultatsiya.php', 'label' => 'Как проходит консультация'],
    ],
    [
        ['href' => 'otzyvy.php', 'label' => 'Отзывы'],
        ['href' => 'smi.php', 'label' => 'СМИ'],
        ['href' => 'kontakty.php', 'label' => 'Контакты'],
    ],
];
$tabletLinks = $isDentaHome ? [
    ['href' => 'index.php', 'label' => 'Главная'],
    ['href' => '#specialization', 'label' => 'Услуги'],
    ['href' => '#about', 'label' => 'О клинике'],
    ['href' => '#results', 'label' => 'Пространство и подход'],
    ['href' => '#contacts', 'label' => 'Контакты'],
] : [
    ['href' => 'index.php', 'label' => 'Главная'],
    ['href' => 'o-vrache.php', 'label' => 'Обо мне'],
    ['href' => 'rezultaty-rabot.php', 'label' => 'Направления работы'],
    ['href' => 'analizy.php', 'label' => 'Анализы'],
    ['href' => 'anesteziya.php', 'label' => 'Анастезия'],
    ['href' => 'kak-prokhodit-konsultatsiya.php', 'label' => 'Как проходит консультация'],
    ['href' => 'podgotovka-k-operatsii.php', 'label' => 'Подготовка к госпитализации'],
    ['href' => 'otzyvy.php', 'label' => 'Отзывы'],
    ['href' => 'smi.php', 'label' => 'СМИ'],
    ['href' => 'kontakty.php', 'label' => 'Контакты'],
];
?>
<footer class="footer footer--index" id="contacts">
    <div class="container footer__inner">
        <?php foreach ($footerColumns as $column): ?>
            <div class="footer__column<?= count($column) < 3 ? ' footer__column--contacts' : ''; ?>">
                <?php foreach ($column as $item): ?>
                    <a class="footer__link" href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <div class="footer__cta">
            <div class="header__socials">
                <a
                    class="header__icon-link"
                    href="<?= $isDentaHome ? $footerContacts['mailHref'] : 'https://t.me/korobkovdr'; ?>"
                    <?php if (!$isDentaHome): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
                    aria-label="<?= $isDentaHome ? 'Email' : 'telegram'; ?>"
                    title="<?= $isDentaHome ? 'Email' : 'telegram'; ?>"
                >
                    <img src="<?= $isDentaHome ? 'assets/img/content/heart_kiojwzdgf0ot 1.png' : 'assets/img/icons/telega.svg'; ?>" alt="<?= $isDentaHome ? '' : 'telegram'; ?>" class="header__icon-image">
                </a>
                <a
                    class="header__icon-link"
                    href="<?= $isDentaHome ? $footerContacts['phoneHref'] : 'https://max.ru/u/f9LHodD0cOLWF6kfyPzTNz7iR2jJ-pAWTKwQgZP74NvgrrP-LNTwd7H9_Kw'; ?>"
                    <?php if (!$isDentaHome): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
                    aria-label="<?= $isDentaHome ? 'Телефон' : 'max'; ?>"
                    title="<?= $isDentaHome ? 'Телефон' : 'max'; ?>"
                >
                    <img src="<?= $isDentaHome ? 'assets/img/content/serdtse_w8z16fskl1pt 1.png' : 'assets/img/icons/maxim.svg'; ?>" alt="<?= $isDentaHome ? '' : 'max'; ?>" class="header__icon-image">
                </a>
            </div>
            <div class="footer__contacts" aria-label="Контактные данные">
                <a class="footer__contact footer__contact--phone" href="<?= e($footerContacts['phoneHref']); ?>"><?= e($footerContacts['phone']); ?></a>
                <a class="footer__contact footer__contact--mail" href="<?= e($footerContacts['mailHref']); ?>"><?= e($footerContacts['mail']); ?></a>
                <p class="footer__contact footer__contact--address"><?= e($footerContacts['address']); ?></p>
            </div>
            <a class="button button--accent button--small" href="<?= e($footerCtaHref); ?>"><?= e($footerCta); ?></a>
        </div>
    </div>

    <div class="container footer__tablet" data-no-scroll-motion>
        <div class="footer__tablet-top">
            <a class="logo footer__tablet-logo" href="index.php" aria-label="На главную">
                <span class="logo__mark">❤</span>
                <span class="logo__text"><?= e($footerBrand); ?></span>
            </a>
            <div class="header__socials footer__tablet-socials" aria-label="Социальные сети">
                <a
                    class="header__icon-link"
                    href="<?= $isDentaHome ? $footerContacts['mailHref'] : 'https://wa.me/79990000000'; ?>"
                    <?php if (!$isDentaHome): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
                    aria-label="<?= $isDentaHome ? 'Email' : 'WhatsApp'; ?>"
                    title="<?= $isDentaHome ? 'Email' : 'WhatsApp'; ?>"
                >
                    <img src="<?= $isDentaHome ? 'assets/img/content/heart_kiojwzdgf0ot 1.png' : 'assets/img/icons/telega.svg'; ?>" alt="<?= $isDentaHome ? '' : 'telegram'; ?>" class="header__icon-image">
                </a>
                <a
                    class="header__icon-link"
                    href="<?= $isDentaHome ? $footerContacts['phoneHref'] : 'https://t.me/your_username'; ?>"
                    <?php if (!$isDentaHome): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
                    aria-label="<?= $isDentaHome ? 'Телефон' : 'Telegram'; ?>"
                    title="<?= $isDentaHome ? 'Телефон' : 'Telegram'; ?>"
                >
                    <img src="<?= $isDentaHome ? 'assets/img/content/serdtse_w8z16fskl1pt 1.png' : 'assets/img/icons/maxim.svg'; ?>" alt="<?= $isDentaHome ? '' : 'max'; ?>" class="header__icon-image">
                </a>
            </div>
        </div>

        <div class="footer__tablet-grid">
            <section class="footer__tablet-block footer__tablet-links" aria-labelledby="footer-tablet-links">
                <h2 class="footer__tablet-title" id="footer-tablet-links">Быстрые ссылки</h2>
                <?php foreach ($tabletLinks as $item): ?>
                    <a class="footer__link" href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a>
                <?php endforeach; ?>
            </section>

            <section class="footer__tablet-block footer__tablet-contacts" aria-labelledby="footer-tablet-contacts">
                <h2 class="footer__tablet-title" id="footer-tablet-contacts">Контакты</h2>
                <div class="footer__contacts footer__contacts--tablet" aria-label="Контактные данные">
                    <a class="footer__contact footer__contact--phone" href="<?= e($footerContacts['phoneHref']); ?>"><?= e($footerContacts['phone']); ?></a>
                    <a class="footer__contact footer__contact--mail" href="<?= e($footerContacts['mailHref']); ?>"><?= e($footerContacts['mail']); ?></a>
                    <p class="footer__contact footer__contact--address"><?= e($footerContacts['address']); ?></p>
                </div>
                <a class="button button--accent button--small footer__tablet-cta" href="<?= e($footerCtaHref); ?>"><?= e($footerCta); ?></a>
            </section>
        </div>
    </div>

    <div class="footer__bottom" data-no-scroll-motion>
        <div class="container footer__bottom-inner">
            <p class="footer__caption">2026 Все права защищены</p>
            <a class="footer__link footer__legal-link" href="politika-konfidentsialnosti.php">Политика в отношении обработки персональных данных</a>
            <a class="footer__link footer__legal-link" href="soglasie-na-obrabotku-personalnykh-dannykh.php">Согласие на обработку персональных данных</a>
            <a class="footer__link footer__legal-link" href="politika-ispolzovaniya-cookie-faylov.php">Политика использования Сookie-файлов</a>
        </div>
    </div>

    <div class="footer__bottom footer__bottom--tablet" data-no-scroll-motion>
        <div class="container footer__bottom-inner footer__bottom-inner--tablet">
            <p class="footer__caption">2026 Все права защищены</p>
            <a class="footer__link footer__legal-link" href="politika-konfidentsialnosti.php">Политика в отношении обработки персональных данных</a>
            <a class="footer__link footer__legal-link" href="soglasie-na-obrabotku-personalnykh-dannykh.php">Согласие на обработку персональных данных</a>
            <a class="footer__link footer__legal-link" href="politika-ispolzovaniya-cookie-faylov.php">Политика использования Сookie-файлов</a>
        </div>
    </div>
</footer>
</div>

<?php require __DIR__ . '/cookie-consent.php'; ?>

<script src="assets/vendor/lenis/lenis.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
