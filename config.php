<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'news-app');
define('LOG_MODE', 'file');
define('LOG_PATH', 'log.txt');
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', current_domain());

function current_domain()
{
    return protocol() . $_SERVER['HTTP_HOST'] . '/news-app';
}

function currentUrl()
{
    return current_domain() . $_SERVER['REQUEST_URI'];
}

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}

function asset($src)
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $src = $domain . '/' . trim($src, '/ ');
    return $src;
}

function url($url)
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $url = $domain . '/' . trim($url, '/ ');
    return $url;
}
