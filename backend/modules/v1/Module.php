<?php

namespace backend\modules\v1;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        $this->modules = [
            'thesis' => [
                'class' => 'backend\modules\v1\modules\thesis\Module',
            ],
            'base-info' => [
                'class' => 'backend\modules\v1\modules\base_info\Module',
            ],
            'request' => [
                'class' => 'backend\modules\v1\modules\request\Module',
            ],
            'student' => [
                'class' => 'backend\modules\v1\modules\student\Module',
            ],
        ];
    }
}