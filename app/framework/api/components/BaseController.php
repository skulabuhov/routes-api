<?php

declare(strict_types=1);

namespace api\components;

use yii\filters\RateLimiter;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class BaseController extends Controller
{
    public function behaviors(): array
    {
        return [
            'verbFilter' => [
                'class' => VerbFilter::class,
                'actions' => $this->verbs(),
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
            ],
        ];
    }
}
