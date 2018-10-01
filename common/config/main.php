<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'defaultTimeZone' => 'Europe/Minsk'
        ],
    ],
    'timeZone' => 'Europe/Minsk',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Templates',
            'defaultRoute' => 'templates/index'
        ],
    ],
];
