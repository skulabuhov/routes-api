<?php

declare(strict_types=1);

namespace api\modules\v1\controllers;

use api\components\BaseController;

class GeocoderController extends BaseController
{
    public function actionIndex(string $query = ''): array
    {
        return ["status" => "ok"];
    }
}
