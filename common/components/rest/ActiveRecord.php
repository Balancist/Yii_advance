<?php

namespace common\components\rest;

use yii2tech\ar\softdelete\SoftDeleteBehavior;

date_default_timezone_set("Iran");

class ActiveRecord extends \yii\db\ActiveRecord
{
	public function behaviors() {

        $behaviors = parent::behaviors();

        $behaviors['softDeleteBehavior'] = [
            'class' => SoftDeleteBehavior::className(),
            'softDeleteAttributeValues' => [
                'deleted_time' => date('Y-m-d | H:i:s')
            ],
        ];

        return $behaviors;
    }
}