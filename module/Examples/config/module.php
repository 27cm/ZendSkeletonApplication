<?php

namespace Examples;

use Zend;

return [
    'di' => [
        'definition' => [
            # 'compiler' => [],
            # 'runtime' => [],
            'class' => [
                #'instantiator' => '',
                #'supertypes'   => [],
                Di\Foo::class => [
                    'setBar' => [
                        'bar' => ['required' => true],
                    ],
                ],
            ],
        ],
    ],
];
