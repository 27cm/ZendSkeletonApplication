<?php

/**
 * @var string Путь к корневому каталогу сайта.
 */
define('ROOT', dirname(__DIR__));

/**
 * @var string Путь к каталогу "public" сайта.
 */
define('DIR_PUBLIC', dirname(__FILE__));

/**
 * @var string Окружение для разработки (development).
 */
define('ENV_DEV', 'dev');

/**
 * @var string Продуктовое окружение (production).
 */
define('ENV_PROD', 'prod');

/**
 * @var string Разделитель директорий. Для Windows - "\", для Linux и остальных — "/".
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * @var string Разделитель пути к файлу. Для Windows - ";", для Linux и остальных — ":".
 */
define('PS', PATH_SEPARATOR);

// Установка корня сайта в качестве текущего каталога
chdir(ROOT);

// Перенаправление запросов статических файлов встроенному веб-серверу PHP
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

include 'vendor/autoload.php';

$config = include 'config/application.php';

$env = getenv('APP_ENV');
if (empty($env) || !in_array($env, [ENV_DEV, ENV_PROD])) {
    throw new Exception('Неизвестная среда');
}

// Включение панели Zend Developer Tools
if (ENV_DEV == $env && isset($_COOKIE['profiler']) && $_COOKIE['profiler']) {
    $config['modules'][] = 'BjyProfiler';
    $config['modules'][] = 'ZendDeveloperTools';
}

Zend\Mvc\Application::init($config)->run();
