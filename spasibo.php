<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Спасибо за заявку',
    'description' => 'Заявка успешно отправлена.',
    'noindex' => true,
];
$pageTitle = 'Спасибо за заявку';
$pageSubtitle = 'Ваше обращение принято. Мы свяжемся с вами в ближайшее рабочее время.';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>
<section class="inner-section thanks-page-section"><div class="container info-card thanks-urgent-card">
<p class="thanks-urgent-card__text">Если вопрос срочный, свяжитесь напрямую по телефону.</p>
<p><!-- TODO: Вставить реальный номер телефона --></p>
<a class="button button--accent thanks-urgent-card__button thanks-urgent-card__button--primary" href="index.php">Вернуться на главную</a>
<a class="button button--ghost thanks-urgent-card__button thanks-urgent-card__button--secondary" href="kontakty.php">Открыть контакты</a>
</div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
