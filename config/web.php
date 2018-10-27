<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'U4gw2GU269ZSEB3id-OoGuz5yf76PgCY',
        ],
        'db' => [
            'class' => '\yii\db\Connection',
            'driverName' => 'mysql',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=yii2basic',
            'username' => 'phpmyadmin',
            'password' => '12345678',
            'charset' => 'utf8',
        ],
    ],
];

return $config;
