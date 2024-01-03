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
        ];
    }
}