<?php

namespace common\components\rest;

use Yii;
use common\components\rbac\UserGroupBehavior;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\filters\AccessControl;

class Controller extends ActiveController
{

    public $serializer = 'common\components\rest\Serializer';

    public function behaviors() {

        $behaviors = parent::behaviors();

        /*
                $behaviors ['access']=[
                    'class' => AccessControl::classname(),
                    'only'  => ['*'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                            'ips' => ['192.168.19.60'],
                        ],
                    ],
                    'denyCallback' => function ($rule, $action) {
                        throw new \Exception('سیستم در حال بروز رسانی میباشد.لطفا چند لحظه صبر کنید');
                    }
                ];
        */

        // $behaviors['UserGroupBehavior'] = [
        //     'class' => UserGroupBehavior::class,
        //     'except' => [],
        // ];

        return $behaviors;
    }

    public function beforeAction($action)
    {
        if (\Yii::$app->request->isOptions) {
            \Yii::$app->response->getHeaders()->set('Allow', 'POST GET PUT DELETE');
            \Yii::$app->end();
        }

        /*
        $headers = \Yii::$app->getResponse()->getHeaders();

        $headers->set('Access-Control-Allow-Headers', 'Content-Type, api_key, Authorization');
        $headers->set('Access-Control-Allow-Methods', 'GET, POST, DELETE, PUT, OPTIONS');
        */

        return parent::beforeAction($action);
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
            'class' => CreateAction::class,
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->createScenario,
        ], ['delete', $this])->run();
    }


    protected function update($id)
    {
        return Yii::createObject([
            'class' => 'common\components\rest\UpdateAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->updateScenario,
        ], ['delete', $this])->run($id);
    }


    protected function delete($id, $softDelete = true)
    {
        if ($softDelete) {
            return Yii::createObject([
                'class' => 'common\components\rest\SoftDeleteAction',
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

    public function option()
    {
        return Yii::createObject([
            'class' => 'yii\rest\OptionsAction',
            // optional:
            'collectionOptions' => ['GET', 'POST', 'HEAD', 'OPTIONS'],
            'resourceOptions' => ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS']
        ]);
    }

    public function actions()
    {
        return [/*
            'baseIndex' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'baseCreate' => [
                'class' => 'yii\rest\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'yii\rest\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],*/
        ];
    }
}