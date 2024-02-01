<?php

declare(strict_types=1);

namespace api\modules\v1\controllers;

use api\components\BaseController;

class RouteController extends BaseController
{
    public function actionCreate(): array
    {
        return ['status' => "ok"];
    }
}
