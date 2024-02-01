<?php

declare(strict_types=1);

namespace api\components;

use yii\web\Response;

class BaseResponse extends Response
{
    protected function prepare(): void
    {
        $this->data = [
            'success' => $this->isSuccessful,
            'data' => $this->isSuccessful ? $this->data : ["message" => $this->data['message'] ?? "Unknown error"],
        ];
        parent::prepare();
    }
}
