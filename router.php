<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



$routes = [
    '/' => 'appController.php',
    '/app' => 'appController.php',
];


if (key_exists($uri, $routes)) {
    require "Controllers/{$routes[$uri]}";
} else {

    $link = lookupLink($conn, substr($uri, 1));
    if ($link) {
        header("Location: " . $link['long_url'], true, 302);
        exit();
    } else {
        http_response_code(404);
        require '404.php';
        exit();
    }

}