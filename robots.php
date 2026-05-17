<?php
require_once __DIR__ . '/includes/env.php';

header('Content-Type: text/plain; charset=UTF-8');
header('X-Robots-Tag: noindex, follow', true);

if (should_index_site()) {
    echo "User-agent: *\n";
    echo "Disallow: /includes/\n";
    echo "Disallow: /config/\n";
    echo "Disallow: /content/\n";
    echo "Disallow: /lib/\n";
    echo "Disallow: /vendor/\n";
    echo "Disallow: /forms/\n";
    echo "Disallow: /spasibo.php\n";
    echo "Disallow: /404.php\n";
    echo "Disallow: /sitemap.php\n";
    echo "Disallow: /robots.php\n";
    echo "Disallow: /konsultatsiya.php\n";
    echo "Disallow: /specializatsiya.php\n";
    echo "Disallow: /politika-konfidentsialnosti.php\n";
    echo "Disallow: /soglasie-na-obrabotku-personalnykh-dannykh.php\n";
    echo "Disallow: /politika-ispolzovaniya-cookie-faylov.php\n\n";
    echo 'Sitemap: ' . APP_CANONICAL_ORIGIN . "/sitemap.xml\n";
    exit;
}

echo "# Staging-safe mode: indexing is disabled outside https://aokorobkov.ru.\n";
echo "User-agent: *\n";
echo "Disallow: /\n";
