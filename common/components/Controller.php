<?php

namespace common\components;

use common\components\UserGroupBehavior;
use yii\rest\ActiveController;

class Controller extends ActiveController {
    
    public function behaviors() {
        return [
            'UserGroupBehavior' => [
                'class' => UserGroupBehavior::class,
            ]
        ];
    }

    protected function index()
    {
        return Yii::createObject([
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ], ['delete', $this])->run();
    }

    protected function view($id)
    {
        return Yii::createObject([
            'class' => 'yii\rest\ViewAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ], ['delete', $this])->run($id);
    }

    protected function create()
    {
        return Yii::createObject([
            'class' => 'whc\common\components\rest\CreateAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->createScenario,
        ], ['delete', $this])->run();
    }


    protected function update($id)
    {
        return Yii::createObject([
            'class' => 'whc\common\components\rest\UpdateAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->updateScenario,
        ], ['delete', $this])->run($id);
    }


    protected function delete($id, $softDelete = true)
    {
        if ($softDelete) {
            return Yii::createObject([
                'class' => 'whc\common\components\actions\SoftDeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ], ['delete', $this])->run($id);
        } else {
            return Yii::createObject([
                'class' => 'yii\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ], ['delete', $this])->run($id);
        }
    }

}