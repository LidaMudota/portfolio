<?php
$innerPageAttrs = $innerPageAttrs ?? '';
$innerHeroAttrs = $innerHeroAttrs ?? '';
?>
<main class="inner-page"<?= $innerPageAttrs; ?>>
    <section class="inner-hero"<?= $innerHeroAttrs; ?>>
        <div class="container">
            <nav class="breadcrumbs" aria-label="Хлебные крошки">
                <a href="index.php">Главная</a>
                <span>•</span>
                <span><?= e($pageTitle); ?></span>
            </nav>
            <h1 class="inner-hero__title"><?= e($pageTitle); ?></h1>
            <?php if (!empty($pageSubtitle)): ?>
            <p class="inner-hero__subtitle"><?= e($pageSubtitle); ?></p>
            <?php endif; ?>
        </div>
    </section>
