<?php

$_baseDir = __DIR__.'/../';

return [
    /**
     * change identifier to unique string
     */
    'identifier' => 'atk-testbed',

    'language_basedir' => $_baseDir.'src/languages/',

    'language' => 'it',

    'db' => [
        'default' => [
            'host' => 'localhost',
            'db' => 'atk-testbed',
            'user' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'driver' => 'MySqli',
        ],
    ],

    'modules' => [
        App\Modules\Auth\Module::class,
        App\Modules\App\Module::class,
        App\Modules\Testbed\Module::class,
    ],

    'debug' => 1,

    'authentication' => 'db',
    'auth_usecryptedpassword' => true,

    'administratorpassword' => '$2y$10$ZeVMGwpO8nrSKb3I4D7DiOSLoxpQ4vGbJqCsyqWSxAgbuQ945aaly', //admin

    'auth_enable_rememberme' => true,

    'restrictive' => true,

    /** Security database configuration **/
    'securityscheme' => 'group',
    'auth_userpk' => 'id',
    'auth_userfk' => 'user_id',
    'auth_usernode' => 'auth.users',
    'auth_usertable' => 'Users',
    'auth_userfield' => 'username',
    'auth_passwordfield' => 'passwd',
    'auth_emailfield' => 'email',
    'auth_accountdisablefield' => 'disabled',
    'auth_leveltable' => 'Users_Groups',
    'auth_levelfield' => 'group_id',
    'auth_accesstable' => 'AccessRights',

    'use_atkerrorhandler' => true,

    'meta_caching' => false,
    //'mailreport' => 'michele.rota@sintattica.it',
];
