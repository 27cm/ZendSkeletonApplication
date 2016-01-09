<?php

namespace Application;

use Zend;

return [
    /**
     * Роутер.
     */
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/application',
                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    /**
     * Менеджер сервисов.
     */
    'service_manager' => [
        'abstract_factories' => [
            Zend\Cache\Service\StorageCacheAbstractServiceFactory::class,
            Zend\Log\LoggerAbstractServiceFactory::class,
        ],
        'factories' => [
            'translator' => Zend\Mvc\Service\TranslatorServiceFactory::class,
        ],
    ],

    /**
     * Локализация.
     */
    'translator' => [
        'locale' => 'ru_RU',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../lang',
                'pattern'  => '%s.mo',
            ],
        ],
    ],

    /**
     * Контроллеры.
     */
    'controllers' => [
        'invokables' => [
            'Application\Controller\Index' => Mvc\Controller\IndexController::class
        ],
    ],

    /**
     * Менеджер шаблонов.
     */
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => Module::DIR . '/view/layout/layout.phtml',
            'application/index/index' => Module::DIR . '/view/application/index/index.phtml',
            'error/404'               => Module::DIR . '/view/error/404.phtml',
            'error/index'             => Module::DIR . '/view/error/index.phtml',
        ],
        'template_path_stack' => [
            Module::DIR . '/view',
        ],
    ],

    /**
     * Консоль.
     */
    'console' => [
        'router' => [
            'routes' => [
            ],
        ],
    ],
];
