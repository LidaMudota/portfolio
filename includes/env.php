<?php

const APP_FALLBACK_CANONICAL_ORIGIN = 'https://aokorobkov.ru';
const APP_DEFAULT_ENV = 'production';

function configured_canonical_origin(): string
{
    // Canonical URLs must always point to the approved production domain.
    // Do not derive canonical URLs from staging/test hosts or environment aliases.
    return APP_FALLBACK_CANONICAL_ORIGIN;
}

define('APP_CANONICAL_ORIGIN', configured_canonical_origin());

function canonical_host(): string
{
    $host = parse_url(APP_CANONICAL_ORIGIN, PHP_URL_HOST);
    return is_string($host) ? strtolower($host) : '';
}

function request_host(): string
{
    $host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
    $serverName = strtolower((string) ($_SERVER['SERVER_NAME'] ?? ''));
    $effectiveHost = $host !== '' ? $host : $serverName;

    return preg_replace('/:\\d+$/', '', $effectiveHost);
}

function request_scheme(): string
{
    $forwardedProto = strtolower(trim((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')));
    if (in_array($forwardedProto, ['http', 'https'], true)) {
        return $forwardedProto;
    }

    $https = !empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off';
    return $https ? 'https' : 'http';
}

function request_origin(): string
{
    $host = request_host();
    if ($host === '') {
        $host = 'localhost';
    }

    return request_scheme() . '://' . $host;
}

function app_env(): string
{
    static $env;

    if ($env !== null) {
        return $env;
    }

    $configured = strtolower(trim((string) getenv('APP_ENV')));
    if (in_array($configured, ['production', 'prod'], true)) {
        return $env = 'production';
    }

    if (in_array($configured, ['local', 'dev', 'development', 'staging', 'test'], true)) {
        return $env = 'local';
    }

    $effectiveHost = request_host();

    $isLocalHost = $effectiveHost === 'localhost'
        || $effectiveHost === '127.0.0.1'
        || $effectiveHost === '::1'
        || str_ends_with($effectiveHost, '.local')
        || str_ends_with($effectiveHost, '.test');

    return $env = $isLocalHost ? 'local' : APP_DEFAULT_ENV;
}

function normalized_host_list(string $value): array
{
    if ($value === '') {
        return [];
    }

    $items = preg_split('/[\\s,;]+/', $value) ?: [];
    $hosts = [];

    foreach ($items as $item) {
        $host = strtolower(trim($item));
        $host = preg_replace('/:\\d+$/', '', $host);

        if ($host !== '') {
            $hosts[] = $host;
        }
    }

    return array_values(array_unique($hosts));
}

function production_hosts(): array
{
    $canonicalHost = canonical_host();
    $configuredAliases = normalized_host_list(trim((string) getenv('APP_PRODUCTION_HOST_ALIASES')));

    $hosts = $canonicalHost !== '' ? [$canonicalHost] : [];
    foreach ($configuredAliases as $alias) {
        $hosts[] = $alias;
    }

    return array_values(array_unique($hosts));
}

function is_production_host(): bool
{
    $requestHost = request_host();
    if ($requestHost === '') {
        return false;
    }

    return in_array($requestHost, production_hosts(), true);
}

function is_production_env(): bool
{
    return app_env() === 'production' && is_production_host();
}

function is_non_production_env(): bool
{
    return !is_production_env();
}

function should_index_site(): bool
{
    // SEO switch for launch control:
    // - production host https://aokorobkov.ru is open to indexing by default;
    // - local/staging/test hosts stay closed because is_production_env() is false;
    // - APP_SEO_INDEXING_ENABLED=false or APP_INDEXING_MODE=noindex can still close indexing.
    $indexingEnabled = strtolower(trim((string) getenv('APP_SEO_INDEXING_ENABLED')));
    if ($indexingEnabled !== '') {
        return in_array($indexingEnabled, ['1', 'true', 'yes', 'on'], true) && is_production_env();
    }

    $mode = strtolower(trim((string) getenv('APP_INDEXING_MODE')));

    if (in_array($mode, ['off', 'noindex', 'deny'], true)) {
        return false;
    }

    if (in_array($mode, ['on', 'index', 'allow'], true)) {
        return is_production_env();
    }

    return is_production_env();
}

function canonical_origin(): string
{
    // Canonical is always built from final production origin to avoid indexing test domains.
    return APP_CANONICAL_ORIGIN;
}

function request_path(): string
{
    $uri = (string) ($_SERVER['REQUEST_URI'] ?? '/');
    $path = parse_url($uri, PHP_URL_PATH);

    return is_string($path) && $path !== '' ? $path : '/';
}

function should_redirect_to_canonical_host(): bool
{
    $flag = strtolower(trim((string) getenv('APP_ENFORCE_CANONICAL_REDIRECT')));
    if (!in_array($flag, ['1', 'true', 'yes'], true)) {
        return false;
    }

    return is_production_env();
}

function enforce_canonical_host_if_needed(): void
{
    if (!should_redirect_to_canonical_host()) {
        return;
    }

    $currentHost = request_host();
    $canonicalHost = canonical_host();

    if ($canonicalHost === '' || $canonicalHost === $currentHost) {
        return;
    }

    $target = APP_CANONICAL_ORIGIN . request_path();
    $query = (string) ($_SERVER['QUERY_STRING'] ?? '');
    if ($query !== '') {
        $target .= '?' . $query;
    }

    header('Location: ' . $target, true, 301);
    exit;
}
