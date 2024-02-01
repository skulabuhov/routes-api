<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => 'v1/geocoder',
        'pluralize' => false,
    ],
    [
        'class' => UrlRule::class,
        'controller' => 'v1/route',
        'pluralize' => false
    ],
];
