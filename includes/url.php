<?php

function project_base_path(): string
{
    static $basePath;

    if ($basePath !== null) {
        return $basePath;
    }

    $configured = trim((string) getenv('APP_BASE_PATH'));
    if ($configured !== '') {
        $parsed = parse_url($configured, PHP_URL_PATH);
        $configuredPath = is_string($parsed) && $parsed !== '' ? $parsed : $configured;
        $normalized = trim($configuredPath, '/');

        return $basePath = $normalized === '' ? '' : '/' . $normalized;
    }

    $documentRoot = realpath((string) ($_SERVER['DOCUMENT_ROOT'] ?? ''));
    $projectRoot = realpath(__DIR__ . '/..');

    if ($documentRoot && $projectRoot && str_starts_with($projectRoot, $documentRoot)) {
        $relative = trim(str_replace('\\', '/', substr($projectRoot, strlen($documentRoot))), '/');
        return $basePath = $relative !== '' ? '/' . $relative : '';
    }

    return $basePath = '';
}

function project_url(string $path = ''): string
{
    $basePath = project_base_path();
    $normalizedPath = trim($path);

    if ($normalizedPath === '' || $normalizedPath === '/') {
        return $basePath !== '' ? $basePath . '/' : '/';
    }

    return $basePath . '/' . ltrim($normalizedPath, '/');
}
