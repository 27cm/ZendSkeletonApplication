<?php

namespace Examples\Button\View;

use Zend\ServiceManager\ConfigInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * Конфигурация менеджера сервисов для помощника представления кнопок.
 */
class HelperConfig implements ConfigInterface
{
    /**
     * @var array Помощники представления.
     */
     protected $invokables = [
         'button' => Helper\Button::class,
         'submit' => Helper\Submit::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function configureServiceManager(ServiceManager $serviceManager)
    {
        foreach ($this->invokables as $name => $service) {
            $serviceManager->setInvokableClass($name, $service);
        }
    }
}
