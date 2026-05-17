<?php
$documentPath = $documentPath ?? null;

if (!is_string($documentPath) || $documentPath === '' || !is_file($documentPath)) {
    throw new RuntimeException('Legal document file is missing.');
}

$documentText = file_get_contents($documentPath);
if ($documentText === false) {
    throw new RuntimeException('Unable to read legal document file.');
}
?>
<section class="inner-section legal-document-section">
    <div class="container">
        <article class="info-card legal-document" aria-label="Юридический документ">
            <pre class="legal-document__text"><?= e($documentText); ?></pre>
        </article>
    </div>
</section>
