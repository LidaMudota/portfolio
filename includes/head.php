<?php
$meta = resolve_seo_meta($meta ?? []);
$title = $meta['title'];
$description = $meta['description'];
$ogTitle = $meta['og_title'];
$ogDescription = $meta['og_description'];
$canonical = $meta['canonical'];
$noindex = !empty($meta['noindex']);
$ogImage = $meta['og_image'];
$ogType = $meta['og_type'];
$twitterCard = $meta['twitter_card'];
$schemas = $meta['schema'] ?? [];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (!empty($useProjectBaseTag)): ?>
        <base href="<?= e(project_url()); ?>">
    <?php endif; ?>
    <title><?= e($title); ?></title>
    <meta name="description" content="<?= e($description); ?>">
    <?php if ($noindex): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
    <link rel="canonical" href="<?= e($canonical); ?>">
    <meta property="og:type" content="<?= e($ogType); ?>">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:title" content="<?= e($ogTitle); ?>">
    <meta property="og:description" content="<?= e($ogDescription); ?>">
    <meta property="og:site_name" content="Коробков Александр Олегович">
    <meta property="og:url" content="<?= e($canonical); ?>">
    <?php if (!empty($ogImage)): ?>
        <meta property="og:image" content="<?= e($ogImage); ?>">
    <?php endif; ?>
    <meta name="twitter:card" content="<?= e($twitterCard); ?>">
    <meta name="twitter:title" content="<?= e($ogTitle); ?>">
    <meta name="twitter:description" content="<?= e($ogDescription); ?>">
    <?php if (!empty($ogImage)): ?>
        <meta name="twitter:image" content="<?= e($ogImage); ?>">
    <?php endif; ?>
    <link rel="icon" type="image/svg+xml" href="assets/img/icons/spec-heart-transplant.svg">
    <link rel="manifest" href="site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/internal.css">
    <?php if (!empty($extraStylesheets) && is_array($extraStylesheets)): ?>
        <?php foreach ($extraStylesheets as $stylesheet): ?>
            <link rel="stylesheet" href="<?= e($stylesheet); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <?php foreach ($schemas as $schema): ?>
        <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
    <?php endforeach; ?>
</head>
<body>
<div class="site-shell">
