<?php

namespace Console;

return [
    /**
     * Контроллеры.
     */
    'controllers' => [
        'invokables' => [
            'Console\Controller\InfoController' => Mvc\Controller\InfoController::class,
        ],
    ],

    /**
     * Консоль.
     */
    'console' => [
        'router' => [
            'routes' => [
                'console-version' => [
                    'options' => [
                        'route' => 'version',
                        'defaults' => [
                            'controller' => 'Console\Controller\InfoController',
                            'action' => 'version',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
