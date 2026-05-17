<?php

function clinic_location_data(): array
{
    static $location = null;

    if ($location !== null) {
        return $location;
    }

    $location = [
        'address' => '125047, г. Москва, 2-й Тверской-Ямской пер., 10',
        'latitude' => '55.773469',
        'longitude' => '37.594378',
        'yandex_constructor_id' => '47f7c01e0e45c8af8c3b6758b11905f24df3bf364d201d50108de2cc9d03153e',
    ];

    return $location;
}

function clinic_location_route_url(): string
{
    $location = clinic_location_data();

    return sprintf(
        'https://yandex.ru/maps/?rtext=~%s,%s&rtt=auto',
        $location['latitude'],
        $location['longitude']
    );
}

function clinic_location_constructor_script_url(int $width = 500, int $height = 400): string
{
    $location = clinic_location_data();
    $params = [
        'um' => 'constructor:' . $location['yandex_constructor_id'],
        'width' => (string) $width,
        'height' => (string) $height,
        'lang' => 'ru_RU',
        'scroll' => 'true',
    ];

    return 'https://api-maps.yandex.ru/services/constructor/1.0/js/?' . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
}
