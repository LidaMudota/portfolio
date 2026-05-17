<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Дипломы и сертификаты — Коробков А. О.',
    'description' => 'Дипломы, сертификаты, аккредитации и документы о повышении квалификации Коробкова Александра Олеговича.',
];
$pageTitle = 'Документы об образовании и квалификации';
$extraStylesheets = ['assets/css/diplomas-page.css'];

$featuredDocuments = [
    [
        'title' => 'Диплом с отличием об образовании',
        'type' => 'Диплом',
        'period' => null,
        'group' => 'Основные документы',
        'image' => 'assets/img/content/honorsDiplomaInEducation.jpg',
    ],
    [
        'title' => 'Периодическая аккредитация',
        'type' => 'Аккредитация по РЭДиЛ',
        'period' => '2022–2027',
        'group' => 'Основные документы',
        'image' => 'assets/img/content/accreditationREDiL2022to2027.jpg',
    ],
    [
        'title' => 'Выписка из распоряжения',
        'type' => 'Высшая квалификационная категория',
        'period' => '2025',
        'group' => 'Основные документы',
        'image' => 'assets/img/content/normalVypiska.png',
    ],
];

$archiveDocuments = [
    [
        'title' => 'Эндоваскулярные вмешательства на коронарных артериях',
        'type' => 'Сертификат',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/certRadialAccess0001.jpg',
    ],
    [
        'title' => 'Диагностика и лечение внутренних сонных артерий',
        'type' => 'Сертификат',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/march29Doc4byIScanner.jpg',
    ],
    [
        'title' => 'Образовательный семинар Medtronic',
        'type' => 'Сертификат участия',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/scannedDocument13.jpg',
    ],
    [
        'title' => 'Актуальные вопросы флебологии',
        'type' => 'Сертификат',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/scannedDocument18.jpg',
    ],
    [
        'title' => 'Имплантация порт-систем',
        'type' => 'Повышение квалификации',
        'period' => '2024',
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/advanced_training_ports_301024_GKB_Yudina.jpg',
    ],
    [
        'title' => 'Сертификат по локорегионарным методикам лечения',
        'type' => 'Сертификат',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/march29Doc2byIScanner.jpg',
    ],
    [
        'title' => 'Антеградные рентгенэндобилиарные вмешательства',
        'type' => 'Сертификат',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/scannedDocument16.jpg',
    ],
    [
        'title' => 'Сертификат по КАП и другим видам эмболизатов',
        'type' => 'Сертификат',
        'period' => null,
        'group' => 'Повышение квалификации',
        'image' => 'assets/img/content/scannedDocument19.jpg',
    ],
];

$documents = array_merge($featuredDocuments, $archiveDocuments);

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

<section class="inner-section diplomas-page">
    <div class="container">
        <section class="diplomas-page__gallery" aria-labelledby="diplomas-gallery-title">
            <div class="diplomas-page__section-head">
                <p class="diplomas-page__section-note">Все документы собраны в единую карусель для удобного просмотра. Клик по карточке открывает оригинал документа в полном размере.</p>
            </div>

            <div class="diplomas-page__carousel" data-diplomas-carousel>
                <div class="diplomas-page__viewport" data-carousel-viewport>
                    <div class="diplomas-page__track" data-carousel-track>
                        <?php foreach ($documents as $index => $document): ?>
                            <?php $docNumber = $index + 1; ?>
                            <article class="diplomas-page__slide diplomas-page__doc diplomas-page__doc--<?= $docNumber; ?>">
                                <a
                                    class="diplomas-page__card-link"
                                    href="<?= e($document['image']); ?>"
                                    target="_blank"
                                    rel="noopener"
                                    aria-label="Открыть документ: <?= e($document['title']); ?>"
                                >
                                    <figure class="diplomas-page__preview">
                                        <div class="diplomas-page__preview-media">
                                            <img
                                                src="<?= e($document['image']); ?>"
                                                alt="<?= e($document['title']); ?>"
                                                loading="lazy"
                                                decoding="async"
                                                width="900"
                                                height="680"
                                            >
                                        </div>
                                    </figure>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="diplomas-page__controls">
                    <button
                        class="diplomas-page__nav diplomas-page__nav--prev"
                        type="button"
                        aria-label="Показать предыдущий документ"
                        data-carousel-prev
                    >
                        <span class="diplomas-page__nav-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                                <path d="M14.5 5.5L8 12l6.5 6.5" />
                            </svg>
                        </span>
                    </button>

                    <p class="diplomas-page__status" data-carousel-status aria-live="polite" aria-atomic="true">
                        <span data-carousel-current>1</span>
                        <span class="diplomas-page__status-separator" aria-hidden="true">/</span>
                        <span data-carousel-total><?= count($documents); ?></span>
                    </p>

                    <button
                        class="diplomas-page__nav diplomas-page__nav--next"
                        type="button"
                        aria-label="Показать следующий документ"
                        data-carousel-next
                    >
                        <span class="diplomas-page__nav-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                                <path d="M9.5 5.5L16 12l-6.5 6.5" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </section>
    </div>
</section>

<?php require __DIR__ . '/includes/form-block.php'; ?>

</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
