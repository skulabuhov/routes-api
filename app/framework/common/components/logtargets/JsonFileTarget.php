<?php

declare(strict_types=1);

namespace common\components\logtargets;

use yii\base\InvalidConfigException;
use yii\log\FileTarget;
use yii\log\LogRuntimeException;

class JsonFileTarget extends FileTarget
{
    public bool $includeContext = false;

    /**
     * @param array $log
     *
     * @return string
     */
    public function formatMessage($log): string
    {
        [$message] = $log;

        return $message;
    }

    /**
     * @return array
     */
    protected function getContextMessage(): array
    {
        $context = [];

        foreach ($this->logVars as $name) {
            if (!empty($GLOBALS[$name])) {
                $context[$name] = $GLOBALS[$name];
            }
        }

        return $context;
    }

    /**
     * @param array $messages
     * @param bool  $final
     *
     * @throws InvalidConfigException
     * @throws LogRuntimeException
     */
    public function collect($messages, $final): void
    {
        $this->messages = array_merge(
            $this->messages,
            $this->filterMessages($messages, $this->getLevels(), $this->categories, $this->except)
        );

        $count = count($this->messages);

        if ($count > 0 && ($final || $this->exportInterval > 0 && $count >= $this->exportInterval)) {
            if ($this->includeContext && !empty(($context = $this->getContextMessage()))) {
                foreach ($this->messages as &$message) {
                    $message['context'] = $context;
                }

                unset($message);
            }

            // set exportInterval to 0 to avoid triggering export again while exporting
            $oldExportInterval = $this->exportInterval;
            $this->exportInterval = 0;
            $this->export();
            $this->exportInterval = $oldExportInterval;
            $this->messages = [];
        }
    }
}
