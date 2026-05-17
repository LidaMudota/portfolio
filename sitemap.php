<?php
require_once __DIR__ . '/includes/env.php';

header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex, follow', true);

if (!should_index_site()) {
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
    exit;
}

$pages = [
    '/',
    '/o-vrache.php',
    '/rezultaty-rabot.php',
    '/o-klinike.php',
    '/otzyvy.php',
    '/diplomy.php',
    '/publikatsii.php',
    '/smi.php',
    '/dlya-vrachey.php',
    '/analizy.php',
    '/anesteziya.php',
    '/kak-prokhodit-operatsiya.php',
    '/kak-prokhodit-konsultatsiya.php',
    '/patsientam-iz-drugogo-goroda.php',
    '/podgotovka-k-operatsii.php',
    '/posle-operatsii.php',
    '/kontakty.php',
];

$origin = rtrim(APP_CANONICAL_ORIGIN, '/');

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach ($pages as $path) {
    $loc = $path === '/' ? $origin . '/' : $origin . $path;
    echo '<url><loc>' . htmlspecialchars($loc, ENT_XML1 | ENT_COMPAT, 'UTF-8') . '</loc></url>';
}
echo '</urlset>';
