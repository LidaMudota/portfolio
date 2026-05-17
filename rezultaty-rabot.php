<?php
require __DIR__ . '/includes/init.php';
$meta = [
    'title' => 'Направления работы — эндоваскулярная хирургия',
    'description' => 'Направления работы врача: эндоваскулярная хирургия, подходы к лечению и клинические материалы из профессиональной практики.',
];
$pageTitle = 'Направления работы';
$innerPageAttrs = ' id="work-directions-page"';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/page-start.php';
?>

    <section class="section section--tight" id="specialization" aria-labelledby="directions-gallery-title">
        <div class="container">
            <div class="section__head section__head--results">
            </div>

            <?php require __DIR__ . '/includes/work-directions-data.php'; ?>
            <?php require __DIR__ . '/includes/work-directions-content.php'; ?>
        </div>
    </section>

    <?php require __DIR__ . '/includes/form-block.php'; ?>

</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
