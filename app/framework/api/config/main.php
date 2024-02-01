<?php

$config = require __DIR__ . '/../../common/config/main.php';
$config['controllerNamespace'] = 'api\controllers';
$config['modules'] = [
    'v1' => [
        'class' => 'api\modules\v1\Module',
    ]
];
$config['components']['request'] = [
    'parsers' => [
        'application/json' => 'yii\web\JsonParser',
    ],
];
$config['components']['response'] = [
    'class' => 'api\components\BaseResponse',
    'format' => yii\web\Response::FORMAT_JSON,
    'charset' => 'UTF-8',
];
$config['components']['urlManager'] = [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'health-check' => 'site/health-check'
    ]
];
$config['components']['errorHandler'] = [
    'errorAction' => 'site/error'
];

return $config;
