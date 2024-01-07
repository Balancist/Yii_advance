<?php

namespace common\components;

use common\components\UserGroupBehavior;

class Controller extends \yii\rest\ActiveController {
    
    public function behaviors() {
        return [
            'UserGroupBehavior' => [
                'class' => UserGroupBehavior::class,
            ]
        ];
    }

    // protected function index()
    // {exit('1');
    //     return Yii::createObject([
    //         'class' => 'yii\rest\IndexAction',
    //         'modelClass' => $this->modelClass,
    //         'checkAccess' => [$this, 'checkAccess'],
    //     ], ['delete', $this])->run();
    // }

    // protected function view($id)
    // {exit('2');
    //     return Yii::createObject([
    //         'class' => 'yii\rest\ViewAction',
    //         'modelClass' => $this->modelClass,
    //         'checkAccess' => [$this, 'checkAccess'],
    //     ], ['delete', $this])->run($id);
    // }

    // protected function create()
    // {exit('3');
    //     return Yii::createObject([
    //         'class' => 'whc\common\components\rest\CreateAction',
    //         'modelClass' => $this->modelClass,
    //         'checkAccess' => [$this, 'checkAccess'],
    //         'scenario' => $this->createScenario,
    //     ], ['delete', $this])->run();
    // }


    // protected function update($id)
    // {exit('4');
    //     return Yii::createObject([
    //         'class' => 'whc\common\components\rest\UpdateAction',
    //         'modelClass' => $this->modelClass,
    //         'checkAccess' => [$this, 'checkAccess'],
    //         'scenario' => $this->updateScenario,
    //     ], ['delete', $this])->run($id);
    // }


    // protected function delete($id, $softDelete = true)
    // {exit('5');
    //     if ($softDelete) {
    //         return Yii::createObject([
    //             'class' => 'whc\common\components\actions\SoftDeleteAction',
    //             'modelClass' => $this->modelClass,
    //             'checkAccess' => [$this, 'checkAccess'],
    //         ], ['delete', $this])->run($id);
    //     } else {
    //         return Yii::createObject([
    //             'class' => 'yii\rest\DeleteAction',
    //             'modelClass' => $this->modelClass,
    //             'checkAccess' => [$this, 'checkAccess'],
    //         ], ['delete', $this])->run($id);
    //     }
    // }

}