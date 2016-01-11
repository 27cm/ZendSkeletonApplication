<?php

namespace Examples;

use Zend\EventManager\EventInterface;
use Zend\Loader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\View\HelperPluginManager;

/**
 * Модуль с примерами расширений приложения.
 */
class Module implements AutoloaderProviderInterface, BootstrapListenerInterface, ConfigProviderInterface, InitProviderInterface
{
    /**
     * @const string Каталог модуля.
     */
    const DIR = __DIR__;

    /**
     * @const string Пространство имён модуля.
     */
    const NS = __NAMESPACE__;

    /**
     * {@inheritdoc}
     */
    public function init(ModuleManagerInterface $moduleManager)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        if ($e instanceof MvcEvent) {
            $app = $e->getApplication();
            $eventManager = $app->getEventManager();
            $serviceManager = $app->getServiceManager();

            $moduleRouteListener = new ModuleRouteListener();
            $moduleRouteListener->attach($eventManager);

            /** @var HelperPluginManager $helperPluginManager */
            $helperPluginManager = $serviceManager->get('ViewHelperManager');
          # $helperPluginManager = $helperPluginManager->get('navigation')->getPluginManager();
            $helperConfig = new Button\View\HelperConfig();
            $helperConfig->configureServiceManager($helperPluginManager);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return include self::DIR . '/config/module.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            Loader\ClassMapAutoloader::class => [
                static::DIR . '/autoload_classmap.php',
            ],
            Loader\AutoloaderFactory::STANDARD_AUTOLOADER => [
                Loader\StandardAutoloader::LOAD_NS => [
                    static::NS => static::DIR . '/src/' . static::NS,
                ],
            ],
        ];
    }
}
