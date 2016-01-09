<?php

return [
    /**
     * ������������ ������.
     */
    'modules' => [
        Application\Module::NS,
    ],

    /**
     * ��������� {@see \Zend\ModuleManager\Listener\ListenerOptions}.
     */
    'module_listener_options' => [
        /**
         * ���� ������������ �������.
         * If a string key is provided, the listener will consider that a module
         * namespace, the value of that key the specific path to that module's
         * Module class.
         */
        'module_paths' => [
            './module',
            './vendor',
        ],

        /**
         * ������ ����� � ������ ������������ ����������.
         * ���� ����� ���� ������� � ������� GLOB_BRACE ({a,b,c} ������������� 'a', 'b' ��� 'c').
         */
        'config_glob_paths' => [
            'config/autoload/{,*.}{global,local}.php',
        ],

        /**
         * ��������� ����������� ������������.
         *
         * ���� ��������, �� ����������� ������������ ����� ������������ �
         * ������������ � ����������� ��������.
         */
        // 'config_cache_enabled' => false,

        /**
         * ����, ������������ ��� �������� ����� ����� ����.
         */
        // 'config_cache_key' => $stringKey,

        /**
         * Whether or not to enable a module class map cache.
         * If enabled, creates a module class map cache which will be used
         * by in future requests, to reduce the autoloading process.
         */
        // 'module_map_cache_enabled' => $booleanValue,

        /**
         * The key used to create the class map cache file name.
         */
        // 'module_map_cache_key' => $stringKey,

        /**
         * The path in which to cache merged configuration.
         */
        // 'cache_dir' => $stringPath,

        /**
         * Whether or not to enable modules dependency checking.
         * Enabled by default, prevents usage of modules that depend on other modules
         * that weren't loaded.
         */
        // 'check_dependencies' => true,
    ],

    /**
     * ��������� {@see \Zend\Mvc\Service\ServiceListenerFactory}.
     * ������������ ��� �������� ����������� ���������� ��������.
     */
    //'service_listener_options' => [
    //     [
    //         'service_manager' => $stringServiceManagerName,
    //         'config_key'      => $stringConfigKey,
    //         'interface'       => $stringOptionalInterface,
    //         'method'          => $stringRequiredMethodName,
    //     ],
    // ],

   /**
    * ��������� {@see \Zend\Mvc\Service\ServiceManagerConfig}.
    * ��������� ������������ ��������� ��������.
    */
   // 'service_manager' => [],
];
