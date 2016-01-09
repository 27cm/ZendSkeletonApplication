<?php

namespace Application;

use Zend\EventManager\EventInterface;
use Zend\Loader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

/**
 * Основной модуль приложения.
 */
class Module implements AutoloaderProviderInterface, BootstrapListenerInterface, ConfigProviderInterface, InitProviderInterface
{
    /**
     * Каталог модуля.
     */
    const DIR = __DIR__;
    
    /**
     * Пространство имён модуля.
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
            $eventManager = $e->getApplication()->getEventManager();
            $moduleRouteListener = new ModuleRouteListener();
            $moduleRouteListener->attach($eventManager);
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
