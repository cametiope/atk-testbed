<?php

$_baseDir = __DIR__ . '/../';

return [
    /**
     * change identifier to unique string
     */
    'identifier' => 'atk-testbed',

    'language_basedir' => $_baseDir . 'src/languages/',

    'modules' => [
        App\Modules\Auth\Module::class,
        App\Modules\App\Module::class,
        App\Modules\Testbed\Module::class,
    ],

    'language' => 'it',

    'authentication' => 'db',
    'auth_usecryptedpassword' => true,

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

    'use_atkerrorhandler' => false,
];
