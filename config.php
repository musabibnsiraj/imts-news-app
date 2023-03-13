<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'news-app');
define('LOG_MODE', 'file');
define('LOG_PATH', 'log.txt');
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', current_domain());
define('DISPLAY_ERROR', true);
error_reporting(E_ERROR | E_PARSE);

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


function displayError($displayError)
{

    if ($displayError) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}

displayError(DISPLAY_ERROR);

global $flashMessage;

if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}


function flash($name, $value = null)
{

    if ($value === null) {

        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
        return $message;
    } else {
        $_SESSION['flash_message'][$name] = $value;
    }
}

function redirectBack()
{
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
