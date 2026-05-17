<header class="header" id="top">
            <div class="container header__inner">
                <a class="logo" href="index.php" aria-label="На главную">
                    <span class="logo__mark">❤</span>
                    <span class="logo__text">Коробков А. О.</span>
                </a>

                <nav class="header__nav nav" aria-label="Основная навигация">
                    <a class="nav__link" href="o-vrache.php">ОБО МНЕ</a>
                    <a class="nav__link" href="rezultaty-rabot.php">НАПРАВЛЕНИЯ РАБОТЫ</a>
                    <a class="nav__link" href="o-klinike.php">О КЛИНИКЕ</a>
                    <a class="nav__link" href="otzyvy.php">ОТЗЫВЫ</a>
                    <a class="nav__link" href="diplomy.php">ДИПЛОМЫ</a>
                    <a class="nav__link" href="smi.php">СМИ</a>
                    <a class="nav__link" href="kontakty.php">КОНТАКТЫ</a>
                </nav>

                <div class="header__actions">
                    <button class="header__menu-button" type="button" data-menu-toggle aria-expanded="false" aria-controls="mega-menu">
                        МЕНЮ
                    </button>

                    <div class="header__socials">
                        <a
                            class="header__icon-link"
                            href="https://max.ru/u/f9LHodD0cOLWF6kfyPzTNz7iR2jJ-pAWTKwQgZP74NvgrrP-LNTwd7H9_Kw"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="max"
                            title="max"
                        >
                            <img src="assets/img/icons/max.svg" alt="max" class="header__icon-image">
                        </a>

                        <a
                            class="header__icon-link"
                            href="https://t.me/korobkovdr"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="telegram"
                            title="telegram"
                        >
                            <img src="assets/img/icons/telegram.svg" alt="telegram" class="header__icon-image">
                        </a>
                    </div>

                    <a class="button button--accent button--small" href="kontakty.php">Связаться</a>

                    <button class="burger" type="button" data-mobile-nav-toggle aria-expanded="false" aria-controls="mobile-nav" aria-label="Открыть меню">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>

            <div class="mega-menu" id="mega-menu" data-lenis-prevent hidden>
                <div class="container mega-menu__inner">
                    <div class="mega-menu__column">
                        <a class="mega-menu__link" href="o-vrache.php">О ВРАЧЕ</a>
                        <a class="mega-menu__link" href="o-klinike.php">О клинике</a> 
                        <a class="mega-menu__link" href="otzyvy.php">Отзывы</a>
                        <a class="mega-menu__link" href="publikatsii.php">Публикации</a>
                        <a class="mega-menu__link" href="smi.php">СМИ</a>
                        <a class="mega-menu__link" href="diplomy.php">Дипломы</a>
                        <a class="mega-menu__link" href="dlya-vrachey.php">Для врачей</a>
                    </div>

                    <div class="mega-menu__column">
                        <a class="mega-menu__link" href="analizy.php">АНАЛИЗЫ</a>
                        <a class="mega-menu__link" href="anesteziya.php">Анестезия</a>
                        <a class="mega-menu__link" href="kak-prokhodit-operatsiya.php">Как проходит эндоваскулярная операция</a>
                        <a class="mega-menu__link" href="kak-prokhodit-konsultatsiya.php">Как проходит консультация</a>
                        <a class="mega-menu__link" href="patsientam-iz-drugogo-goroda.php">Пациентам из другого города</a>
                        <a class="mega-menu__link" href="podgotovka-k-operatsii.php">Подготовка к госпитализации</a>
                        <a class="mega-menu__link" href="posle-operatsii.php">После операции</a>
                    </div>

                    <div class="mega-menu__preview">
                        <div class="mega-menu__image-wrap">
                            <!-- TODO: Вставить изображение menu-preview.webp в /assets/img/content/ -->
                            <img src="assets/img/content/about-doctor0.jpg" alt="Превью врача" class="mega-menu__image">
                        </div>
                        <a class="button button--accent button--small" href="kontakty.php">Связаться</a>
                    </div>
                </div>
            </div>

            <div class="mobile-nav" id="mobile-nav" data-lenis-prevent hidden>
                <div class="container mobile-nav__inner">
                    <div class="mobile-nav__group">
                        <p class="mobile-nav__group-title">Разделы</p>
                        <a class="mobile-nav__link" href="o-vrache.php">Обо мне</a>
                        <a class="mobile-nav__link" href="rezultaty-rabot.php">Направления работы</a>
                        <a class="mobile-nav__link" href="dlya-vrachey.php">Для врачей</a>
                        <a class="mobile-nav__link" href="kontakty.php">Контакты</a>
                    </div>

                    <div class="mobile-nav__group">
                        <p class="mobile-nav__group-title">Информация</p>
                        <a class="mobile-nav__link" href="o-klinike.php">О клинике</a>
                        <a class="mobile-nav__link" href="otzyvy.php">Отзывы</a>
                        <a class="mobile-nav__link" href="publikatsii.php">Публикации</a>
                        <a class="mobile-nav__link" href="smi.php">СМИ</a>
                        <a class="mobile-nav__link" href="diplomy.php">Дипломы</a>
                    </div>

                    <div class="mobile-nav__group">
                        <p class="mobile-nav__group-title">Пациентам</p>
                        <a class="mobile-nav__link" href="analizy.php">Анализы</a>
                        <a class="mobile-nav__link" href="anesteziya.php">Анестезия</a>
                        <a class="mobile-nav__link" href="kak-prokhodit-operatsiya.php">Как проходит эндоваскулярная операция</a>
                        <a class="mobile-nav__link" href="kak-prokhodit-konsultatsiya.php">Как проходит консультация</a>
                        <a class="mobile-nav__link" href="patsientam-iz-drugogo-goroda.php">Пациентам из другого города</a>
                        <a class="mobile-nav__link" href="podgotovka-k-operatsii.php">Подготовка к госпитализации</a>
                        <a class="mobile-nav__link" href="posle-operatsii.php">После операции</a>
                    </div>
                </div>
            </div>
        </header>
