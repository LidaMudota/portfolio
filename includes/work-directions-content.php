<?php
if (!isset($workDirectionsData) || !is_array($workDirectionsData)) {
    require __DIR__ . '/work-directions-data.php';
}

$directionMap = [];
$projectRoot = dirname(__DIR__);
$assetExists = static function (string $path) use ($projectRoot): bool {
    $normalized = trim($path);
    if ($normalized === '') {
        return false;
    }

    $normalized = ltrim($normalized, '/');
    return is_file($projectRoot . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $normalized));
};
?>
<div class="spec-grid" aria-label="Карточки направлений работы">
    <?php foreach ($workDirectionsData as $direction): ?>
        <?php
        $directionId = (string) ($direction['id'] ?? '');
        if ($directionId === '') {
            continue;
        }

        $cardTitle = (string) ($direction['card_title'] ?? '');
        $cardDescription = (string) ($direction['card_description'] ?? '');
        $icon = (string) ($direction['icon'] ?? '');
        $cardClass = $directionId === 'coronary-stenting' ? ' spec-card--heart' : '';

        $directionMap[$directionId] = [
            'title' => (string) ($direction['full_title'] ?? $cardTitle),
            'paragraphs' => array_values(array_filter($direction['paragraphs'] ?? [], static fn ($item) => is_string($item) && $item !== '')),
            'images' => array_values(array_filter($direction['images'] ?? [], fn ($item) => is_array($item) && !empty($item['src']) && $assetExists((string) $item['src']))),
            'imagePairs' => array_values(array_filter($direction['imagePairs'] ?? [], static function ($pair) use ($assetExists): bool {
                return is_array($pair)
                    && is_array($pair['before'] ?? null)
                    && is_array($pair['after'] ?? null)
                    && !empty($pair['before']['src'])
                    && !empty($pair['after']['src'])
                    && $assetExists((string) $pair['before']['src'])
                    && $assetExists((string) $pair['after']['src']);
            })),
            'warning' => (string) ($direction['warning'] ?? ''),
            'icon' => $icon,
        ];
        ?>
        <article class="spec-card<?= $cardClass ?>" data-direction-id="<?= htmlspecialchars($directionId, ENT_QUOTES, 'UTF-8') ?>">
            <div class="spec-card__icon" aria-hidden="true">
                <img src="<?= htmlspecialchars($icon, ENT_QUOTES, 'UTF-8') ?>" alt="" width="82" height="82" loading="lazy" decoding="async">
            </div>
            <div class="spec-card__content">
                <h3 class="spec-card__title"><?= htmlspecialchars($cardTitle, ENT_QUOTES, 'UTF-8') ?></h3>
                <p class="spec-card__text"><?= htmlspecialchars($cardDescription, ENT_QUOTES, 'UTF-8') ?></p>
                <button class="spec-card__details" type="button" data-direction-open>Подробнее</button>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<div class="direction-modal" data-direction-modal data-lenis-prevent hidden>
    <div class="direction-modal__overlay" data-direction-close></div>
    <div
        class="direction-modal__dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="direction-modal-title"
        aria-describedby="direction-modal-text"
    >
        <button class="direction-modal__close" type="button" data-direction-close aria-label="Закрыть окно">
            <span aria-hidden="true">×</span>
        </button>

        <div class="direction-modal__media">
            <img src="" alt="" data-direction-modal-image loading="lazy" decoding="async">
        </div>

        <div class="direction-modal__body">
            <p class="direction-modal__label">Направление работы</p>
            <h3 class="direction-modal__title" id="direction-modal-title" data-direction-modal-title></h3>
            <div class="direction-modal__text" id="direction-modal-text" data-direction-modal-text></div>
            <div class="direction-modal__divider" data-direction-modal-divider-text></div>
            <div class="direction-modal__divider" data-direction-modal-divider-gallery hidden></div>
            <div class="direction-modal__gallery" data-direction-modal-gallery hidden></div>
            <p class="direction-modal__warning" data-direction-modal-warning hidden></p>
        </div>
    </div>
</div>

<script type="application/json" data-work-directions-json><?= json_encode($directionMap, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
