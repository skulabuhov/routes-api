<?php

use common\components\logtargets\JsonFileTarget;
use common\helpers\Env;

return [
    'id' => 'routes-service',
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => JsonFileTarget::class,
                    'enabled' => (bool)Env::logEnabled(),
                    'levels' => ['error', 'warning'],
                    'logFile' => Env::logFile(),
                ],
                [
                    'class' => JsonFileTarget::class,
                    'enabled' => (bool)Env::logEnabled(),
                    'levels' => ['info'],
                    'logFile' => Env::logFile(),
                    'categories' => ['log'],
                ]
            ],
        ],
        'user' => [
            'identityClass' => 'yii\web\User',
            'enableAutoLogin' => true,
        ],
    ],
    'runtimePath' => dirname(__DIR__, 2) . '/runtime',
];
