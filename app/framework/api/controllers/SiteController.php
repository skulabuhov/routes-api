<?php

declare(strict_types=1);

namespace api\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionHealthCheck(): array
    {
        return ["status" => "ok"];
    }

    public function actionError(): array
    {
        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            Yii::error($exception->getMessage());
        }

        return ['message' => 'App error'];
    }
}
