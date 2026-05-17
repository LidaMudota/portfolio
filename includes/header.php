<?php
$isDentaHome = !empty($isDentaHome);
$brandText = $isDentaHome ? 'Denta Prime Clinic' : 'Коробков А. О.';
$primaryCta = $isDentaHome ? 'Записаться на консультацию' : 'Связаться';
$previewImage = $isDentaHome ? 'assets/img/content/24 1.png' : 'assets/img/content/about-doctor0.jpg';
$previewAlt = $isDentaHome ? 'Интерьер Denta Prime Clinic' : 'Превью врача';

$desktopNav = $isDentaHome ? [
    ['href' => '#specialization', 'label' => 'УСЛУГИ'],
    ['href' => '#about', 'label' => 'О КЛИНИКЕ'],
    ['href' => '#results', 'label' => 'ПОДХОД'],
    ['href' => '#contacts', 'label' => 'КОНТАКТЫ'],
] : [
    ['href' => 'o-vrache.php', 'label' => 'ОБО МНЕ'],
    ['href' => 'rezultaty-rabot.php', 'label' => 'НАПРАВЛЕНИЯ РАБОТЫ'],
    ['href' => 'o-klinike.php', 'label' => 'О КЛИНИКЕ'],
    ['href' => 'otzyvy.php', 'label' => 'ОТЗЫВЫ'],
    ['href' => 'diplomy.php', 'label' => 'ДИПЛОМЫ'],
    ['href' => 'smi.php', 'label' => 'СМИ'],
    ['href' => 'kontakty.php', 'label' => 'КОНТАКТЫ'],
];

$megaColumns = $isDentaHome ? [
    [
        ['href' => '#specialization', 'label' => 'Имплантация зубов'],
        ['href' => '#specialization', 'label' => 'Эстетическая стоматология'],
        ['href' => '#specialization', 'label' => 'Терапевтическое лечение'],
        ['href' => '#specialization', 'label' => 'Профессиональная гигиена'],
    ],
    [
        ['href' => '#about', 'label' => 'О клинике'],
        ['href' => '#results', 'label' => 'Пространство и подход'],
        ['href' => '#contacts', 'label' => 'Контакты'],
    ],
] : [
    [
        ['href' => 'o-vrache.php', 'label' => 'О ВРАЧЕ'],
        ['href' => 'o-klinike.php', 'label' => 'О клинике'],
        ['href' => 'otzyvy.php', 'label' => 'Отзывы'],
        ['href' => 'publikatsii.php', 'label' => 'Публикации'],
        ['href' => 'smi.php', 'label' => 'СМИ'],
        ['href' => 'diplomy.php', 'label' => 'Дипломы'],
        ['href' => 'dlya-vrachey.php', 'label' => 'Для врачей'],
    ],
    [
        ['href' => 'analizy.php', 'label' => 'АНАЛИЗЫ'],
        ['href' => 'anesteziya.php', 'label' => 'Анестезия'],
        ['href' => 'kak-prokhodit-operatsiya.php', 'label' => 'Как проходит эндоваскулярная операция'],
        ['href' => 'kak-prokhodit-konsultatsiya.php', 'label' => 'Как проходит консультация'],
        ['href' => 'patsientam-iz-drugogo-goroda.php', 'label' => 'Пациентам из другого города'],
        ['href' => 'podgotovka-k-operatsii.php', 'label' => 'Подготовка к госпитализации'],
        ['href' => 'posle-operatsii.php', 'label' => 'После операции'],
    ],
];

$mobileGroups = $isDentaHome ? [
    'Клиника' => [
        ['href' => '#about', 'label' => 'О Denta Prime Clinic'],
        ['href' => '#results', 'label' => 'Пространство и подход'],
        ['href' => '#contacts', 'label' => 'Контакты'],
    ],
    'Услуги' => [
        ['href' => '#specialization', 'label' => 'Имплантация зубов'],
        ['href' => '#specialization', 'label' => 'Эстетическая стоматология'],
        ['href' => '#specialization', 'label' => 'Терапевтическое лечение'],
        ['href' => '#specialization', 'label' => 'Профессиональная гигиена'],
    ],
] : [
    'Информация' => [
        ['href' => 'o-klinike.php', 'label' => 'О клинике'],
        ['href' => 'otzyvy.php', 'label' => 'Отзывы'],
        ['href' => 'publikatsii.php', 'label' => 'Публикации'],
        ['href' => 'smi.php', 'label' => 'СМИ'],
        ['href' => 'diplomy.php', 'label' => 'Дипломы'],
    ],
    'Пациентам' => [
        ['href' => 'analizy.php', 'label' => 'Анализы'],
        ['href' => 'anesteziya.php', 'label' => 'Анестезия'],
        ['href' => 'kak-prokhodit-operatsiya.php', 'label' => 'Как проходит эндоваскулярная операция'],
        ['href' => 'kak-prokhodit-konsultatsiya.php', 'label' => 'Как проходит консультация'],
        ['href' => 'patsientam-iz-drugogo-goroda.php', 'label' => 'Пациентам из другого города'],
        ['href' => 'podgotovka-k-operatsii.php', 'label' => 'Подготовка к госпитализации'],
        ['href' => 'posle-operatsii.php', 'label' => 'После операции'],
    ],
];
?>
<header class="header" id="top">
            <div class="container header__inner">
                <a class="logo" href="index.php" aria-label="На главную">
                    <span class="logo__mark">❤</span>
                    <span class="logo__text"><?= e($brandText); ?></span>
                </a>

                <nav class="header__nav nav" aria-label="Основная навигация">
                    <?php foreach ($desktopNav as $item): ?>
                        <a class="nav__link" href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a>
                    <?php endforeach; ?>
                </nav>

                <div class="header__actions">
                    <button class="header__menu-button" type="button" data-menu-toggle aria-expanded="false" aria-controls="mega-menu">
                        МЕНЮ
                    </button>

                    <div class="header__socials">
                        <a
                            class="header__icon-link"
                            href="<?= $isDentaHome ? 'mailto:hello@dentaprime.demo' : 'https://max.ru/u/f9LHodD0cOLWF6kfyPzTNz7iR2jJ-pAWTKwQgZP74NvgrrP-LNTwd7H9_Kw'; ?>"
                            <?php if (!$isDentaHome): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
                            aria-label="<?= $isDentaHome ? 'Email' : 'max'; ?>"
                            title="<?= $isDentaHome ? 'Email' : 'max'; ?>"
                        >
                            <img src="<?= $isDentaHome ? 'assets/img/content/heart_kiojwzdgf0ot 1.png' : 'assets/img/icons/max.svg'; ?>" alt="<?= $isDentaHome ? '' : 'max'; ?>" class="header__icon-image">
                        </a>

                        <a
                            class="header__icon-link"
                            href="<?= $isDentaHome ? 'tel:+74950000000' : 'https://t.me/korobkovdr'; ?>"
                            <?php if (!$isDentaHome): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>
                            aria-label="<?= $isDentaHome ? 'Телефон' : 'telegram'; ?>"
                            title="<?= $isDentaHome ? 'Телефон' : 'telegram'; ?>"
                        >
                            <img src="<?= $isDentaHome ? 'assets/img/content/serdtse_w8z16fskl1pt 1.png' : 'assets/img/icons/telegram.svg'; ?>" alt="<?= $isDentaHome ? '' : 'telegram'; ?>" class="header__icon-image">
                        </a>
                    </div>

                    <a class="button button--accent button--small" href="<?= $isDentaHome ? '#contacts' : 'kontakty.php'; ?>"><?= e($primaryCta); ?></a>

                    <button class="burger" type="button" data-mobile-nav-toggle aria-expanded="false" aria-controls="mobile-nav" aria-label="Открыть меню">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>

            <div class="mega-menu" id="mega-menu" data-lenis-prevent hidden>
                <div class="container mega-menu__inner">
                    <?php foreach ($megaColumns as $column): ?>
                        <div class="mega-menu__column">
                            <?php foreach ($column as $item): ?>
                                <a class="mega-menu__link" href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="mega-menu__preview">
                        <div class="mega-menu__image-wrap">
                            <img src="<?= e($previewImage); ?>" alt="<?= e($previewAlt); ?>" class="mega-menu__image">
                        </div>
                        <a class="button button--accent button--small" href="<?= $isDentaHome ? '#contacts' : 'kontakty.php'; ?>"><?= e($primaryCta); ?></a>
                    </div>
                </div>
            </div>

            <div class="mobile-nav" id="mobile-nav" data-lenis-prevent hidden>
                <div class="mobile-nav__panel">
                    <div class="mobile-nav__top">
                        <a class="logo" href="index.php" aria-label="На главную">
                            <span class="logo__mark">❤</span>
                            <span class="logo__text"><?= e($brandText); ?></span>
                        </a>
                        <button class="mobile-nav__close" type="button" data-mobile-nav-close aria-label="Закрыть меню">×</button>
                    </div>

                    <?php foreach ($mobileGroups as $groupTitle => $items): ?>
                        <div class="mobile-nav__group">
                            <p class="mobile-nav__group-title"><?= e($groupTitle); ?></p>
                            <?php foreach ($items as $item): ?>
                                <a class="mobile-nav__link" href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </header>
