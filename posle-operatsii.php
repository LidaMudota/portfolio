<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'После операции — Коробков А. О.',
    'description' => 'Информация о периоде после эндоваскулярной операции: наблюдение в стационаре, сроки госпитализации и возможные сроки выписки.',
];
$pageTitle = 'После операции';
$pageSubtitle = '';
$innerPageAttrs = ' id="post-op-page"';
$extraStylesheets = ['assets/css/post-op-page.css'];
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="inner-section post-op-page__section post-op-page__section--article">
        <div class="container">
            <article class="post-op-article" aria-label="После операции">
                <p>Эндоваскулярные операции чаще всего не требуют длительного пребывания в клинике после проведенного вмешательства.</p>
                <p>Обычно срок госпитализации составляет от 1 до 3 суток (в зависимости от выполняемой операции) и включает полный медицинский уход и питание.</p>
                <p>В ряде случаев выписка возможна даже в день операции.</p>
            </article>
        </div>
    </section>

    <section class="inner-section post-op-page__section post-op-page__section--notice">
        <div class="container">
            <aside class="post-op-page__disclaimer">
                <p>Имеются противопоказания, необходима консультация специалиста</p>
            </aside>
        </div>
    </section>

<?php
$formTitle = 'Связаться';
$formSubtitle = 'Оставьте контакты, и администратор свяжется с вами.';
require __DIR__ . '/includes/form-block.php';
?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
