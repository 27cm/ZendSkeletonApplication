<?php

/**
 * @var string ���� � ��������� �������� �����.
 */
define('ROOT', dirname(__DIR__));

/**
 * @var string ���� � �������� "public" �����.
 */
define('DIR_PUBLIC', dirname(__FILE__));

/**
 * @var string ��������� ��� ���������� (development).
 */
define('ENV_DEV', 'dev');

/**
 * @var string ����������� ��������� (production).
 */
define('ENV_PROD', 'prod');

/**
 * @var string ����������� ����������. ��� Windows - "\", ��� Linux � ��������� � "/".
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * @var string ����������� ���� � �����. ��� Windows - ";", ��� Linux � ��������� � ":".
 */
define('PS', PATH_SEPARATOR);

// ��������� ����� ����� � �������� �������� ��������
chdir(ROOT);

// ��������������� �������� ����������� ������ ����������� ���-������� PHP
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
    throw new Exception('����������� �����');
}

// ��������� ������ Zend Developer Tools
if (ENV_DEV == $env && isset($_COOKIE['profiler']) && $_COOKIE['profiler']) {
    $config['modules'][] = 'BjyProfiler';
    $config['modules'][] = 'ZendDeveloperTools';
}

Zend\Mvc\Application::init($config)->run();
