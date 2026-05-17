<?php

function page_basename(): string
{
    return basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php'));
}

function page_slug(): string
{
    $page = page_basename();
    return $page === 'index.php' ? '' : $page;
}

function canonical_url_for_page(?string $page = null): string
{
    $slug = $page === null ? page_slug() : ($page === 'index.php' ? '' : ltrim($page, '/'));
    $origin = rtrim(canonical_origin(), '/');

    if ($slug === '' || $slug === '/') {
        return $origin . '/';
    }

    return $origin . '/' . ltrim($slug, '/');
}

function seo_defaults_map(): array
{
    return [
        'index.php' => [
            'title' => 'Коробков Александр Олегович — эндоваскулярный хирург в Москве',
            'description' => 'Официальный сайт врача эндоваскулярного хирурга Коробкова Александра Олеговича: направления работы, материалы для пациентов, публикации и контакты.',
        ],
        'o-vrache.php' => [
            'title' => 'О враче — эндоваскулярный хирург Коробков А. О.',
            'description' => 'Биография Коробкова Александра Олеговича: клиническая практика, экспертная деятельность, опыт, образование и профессиональная квалификация.',
        ],
        'rezultaty-rabot.php' => [
            'title' => 'Направления работы — эндоваскулярная хирургия',
            'description' => 'Направления работы врача: эндоваскулярная хирургия, подходы к лечению и клинические материалы из профессиональной практики.',
        ],
        'o-klinike.php' => [
            'title' => 'О клинике в Москве — Коробков Александр Олегович',
            'description' => 'Информация о клинике в Москве, где ведется прием: лицензия, реквизиты медицинской организации, адрес и организационные детали.',
        ],
        'otzyvy.php' => [
            'title' => 'Отзывы пациентов — Коробков Александр Олегович',
            'description' => 'Отзывы пациентов о консультации, лечении и послеоперационном сопровождении у Коробкова Александра Олеговича с указанием источников.',
        ],
        'diplomy.php' => [
            'title' => 'Дипломы и сертификаты — Коробков А. О.',
            'description' => 'Дипломы, сертификаты, аккредитации и документы о повышении квалификации Коробкова Александра Олеговича.',
        ],
        'publikatsii.php' => [
            'title' => 'Публикации — эндоваскулярная хирургия',
            'description' => 'Научные публикации Коробкова Александра Олеговича по вопросам эндоваскулярной хирургии и смежных направлений.',
        ],
        'smi.php' => [
            'title' => 'СМИ — эндоваскулярный хирург Коробков А. О.',
            'description' => 'СМИ, лекции, подкасты и публикации с участием эндоваскулярного хирурга Александра Олеговича Коробкова.',
        ],
        'dlya-vrachey.php' => [
            'title' => 'Для врачей — Коробков Александр Олегович',
            'description' => 'Информация для врачей о направлении пациентов, профессиональном взаимодействии и порядке передачи медицинских материалов.',
        ],
        'analizy.php' => [
            'title' => 'Анализы перед госпитализацией — Коробков А. О.',
            'description' => 'Анализы и обследования перед госпитализацией: утвержденный перечень перед плановой госпитализацией и операцией.',
        ],
        'anesteziya.php' => [
            'title' => 'Анестезия при эндоваскулярных вмешательствах — Коробков А. О.',
            'description' => 'Информация об анестезии при эндоваскулярных вмешательствах: местная анестезия, седация и наблюдение во время операции.',
        ],
        'kak-prokhodit-operatsiya.php' => [
            'title' => 'Как проходит эндоваскулярная операция — Коробков А. О.',
            'description' => 'Как проходит эндоваскулярная операция: этапы вмешательства, визуализация, анестезия и организационные особенности.',
        ],
        'kak-prokhodit-konsultatsiya.php' => [
            'title' => 'Как проходит консультация — Коробков А. О.',
            'description' => 'Варианты консультации у Коробкова Александра Олеговича, предварительная запись и перечень материалов для подготовки.',
        ],
        'patsientam-iz-drugogo-goroda.php' => [
            'title' => 'Пациентам из другого города — Коробков А. О.',
            'description' => 'Пациентам из другого города: порядок консультации, подготовки документов, предоперационного обследования и госпитализации.',
        ],
        'podgotovka-k-operatsii.php' => [
            'title' => 'Подготовка к госпитализации — Коробков А. О.',
            'description' => 'Подготовка к госпитализации и операции: прием препаратов, необходимые документы, личные вещи и организационные шаги.',
        ],
        'posle-operatsii.php' => [
            'title' => 'После операции — Коробков А. О.',
            'description' => 'Информация о периоде после эндоваскулярной операции: наблюдение в стационаре, сроки госпитализации и возможные сроки выписки.',
        ],
        'kontakty.php' => [
            'title' => 'Контакты — эндоваскулярный хирург в Москве',
            'description' => 'Контакты для записи к Коробкову Александру Олеговичу: телефон, электронная почта, Telegram, адрес клиники в Москве и карта проезда.',
        ],
        'konsultatsiya.php' => [
            'title' => 'Консультация эндоваскулярного хирурга — Коробков А. О.',
            'description' => 'Что включает консультация эндоваскулярного хирурга, как подготовить документы и как оставить заявку через форму на сайте.',
        ],
        'politika-konfidentsialnosti.php' => [
            'title' => 'Политика обработки персональных данных — Коробков А. О.',
            'description' => 'Политика в отношении обработки персональных данных Индивидуального предпринимателя Коробкова Александра Олеговича.',
        ],
        'soglasie-na-obrabotku-personalnykh-dannykh.php' => [
            'title' => 'Согласие на обработку персональных данных — Коробков А. О.',
            'description' => 'Согласие на обработку персональных данных для сайта Индивидуального предпринимателя Коробкова Александра Олеговича.',
        ],
        'politika-ispolzovaniya-cookie-faylov.php' => [
            'title' => 'Политика использования cookie-файлов — Коробков А. О.',
            'description' => 'Политика использования cookie-файлов на сайте Индивидуального предпринимателя Коробкова Александра Олеговича.',
        ],
    ];
}

function seo_structured_data(string $page, string $canonical): array
{
    if ($page === 'index.php') {
        return [[
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Коробков Александр Олегович — эндоваскулярный хирург',
            'url' => $canonical,
            'inLanguage' => 'ru-RU',
        ]];
    }

    if ($page === 'o-vrache.php') {
        return [[
            '@context' => 'https://schema.org',
            '@type' => 'ProfilePage',
            'mainEntity' => [
                '@type' => 'Person',
                'name' => 'Коробков Александр Олегович',
                'jobTitle' => 'Врач эндоваскулярный хирург',
                'url' => $canonical,
                'sameAs' => [
                    'https://www.medicina.ru/nashi-vrachi/korobkov-aleksandr-olegovich/',
                ],
            ],
        ]];
    }

    return [];
}

function resolve_seo_meta(array $meta = []): array
{
    $page = page_basename();
    $defaults = seo_defaults_map()[$page] ?? [];
    $resolved = array_merge($defaults, $meta);

    $resolved['title'] = $resolved['title'] ?? 'Сайт врача';
    $resolved['description'] = $resolved['description'] ?? 'Официальный сайт врача.';
    $resolved['canonical'] = $resolved['canonical'] ?? canonical_url_for_page($page);
    $resolved['og_title'] = $resolved['og_title'] ?? $resolved['title'];
    $resolved['og_description'] = $resolved['og_description'] ?? $resolved['description'];
    $resolved['og_type'] = $resolved['og_type'] ?? 'website';
    $resolved['og_image'] = $resolved['og_image'] ?? canonical_origin() . '/assets/img/content/fotoVracha.png';
    $resolved['twitter_card'] = $resolved['twitter_card'] ?? 'summary_large_image';

    $forcedNoindex = !should_index_site();
    $resolved['noindex'] = $forcedNoindex || !empty($resolved['noindex']);

    $schemas = $resolved['schema'] ?? [];
    if (!is_array($schemas)) {
        $schemas = [];
    }
    $resolved['schema'] = array_merge($schemas, seo_structured_data($page, $resolved['canonical']));

    return $resolved;
}
