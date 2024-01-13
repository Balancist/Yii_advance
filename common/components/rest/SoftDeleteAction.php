<?php

namespace yii\rest;

use Yii;
use yii\web\ServerErrorHttpException;

class SoftDeleteAction extends Action
{
    public function run($id)
    {
        $model = $this->findModel($id);

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        if ($model->softDelete() === false) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }

        Yii::$app->getResponse()->setStatusCode(204);
    }
}