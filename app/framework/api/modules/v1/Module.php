<?php

declare(strict_types=1);

namespace api\modules\v1;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'api\modules\v1\controllers';

    public function init(): void
    {
        parent::init();
        Yii::$app->urlManager->addRules(require __DIR__ . '/config/urlRules.php');
    }
}
