<?php

$localConfigFile = __DIR__ . '/mail.local.php';

if (!is_file($localConfigFile)) {
    return [];
}

$localConfig = require $localConfigFile;

if (!is_array($localConfig)) {
    return [];
}

return $localConfig;