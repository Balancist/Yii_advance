<?php

namespace common\components\rbac;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use yii\web\ServerErrorHttpException;
use common\components\rest\Controller;

class UserGroupBehavior extends Behavior {

	public $except = [];

	public function init() {
		parent::init();
	}


	public function events() {
		return [
			Controller::EVENT_BEFORE_ACTION => 'beforeAction',
			ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
			ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
			ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
		];
	}

	public function beforeAction($e = null) {

		$sender = $e->sender;
		$controllerName = Yii::$app->controller->id;
		$controllerClassArray = explode('\\', $sender::className());
		$controllerClass = end($controllerClassArray);
		$class = explode('Controller', $controllerClass)[0];
		$route = explode('/', $e->sender->route);
		$method = end($route);
		$modelName = $e->action->controller->modelClass;
		$obj = new $modelName();
		$url = explode('/', \Yii::$app->request->url);
		$id = end($url);

		$access = true;

		if ($method == 'index') {
			$access = Yii::$app->user->can("view{$class}");
		}

		if ($method == 'create') {
			$access = Yii::$app->user->can("insert{$class}");
		}

		if ($method == 'view') {
			$access = Yii::$app->user->can("view{$class}") || Yii::$app->user->can("viewOwn{$class}", ['object' => $obj->findOne(['id' => $id])]);
		}

		if ($method == 'update') {
			$access = Yii::$app->user->can("updateOwn{$class}", ['object' => $obj->findOne(['id' => $id])]);
		}

		if ($method == 'delete') {
			$access = Yii::$app->user->can("deleteOwn{$class}", ['object' => $obj->findOne(['id' => $id])]);
		}

		if ($access) {
			return true;
		} else {
			throw new ServerErrorHttpException('شما مجوز لازم برای انجام عملیات مورد نظر خود را ندارید.');
		}
	}

	public function beforeInsert($e = null) {

		$sender = $e->sender;
		$modelName = explode('\\', $sender::className());
		$class = end($modelName);

		if (Yii::$app->user->can("insert{$class}")) {
			return true;
		} else {
			throw new ServerErrorHttpException("شما مجوز افزودن در {$class} را ندارید");
		}
	}


	public function beforeUpdate($e = null) {

		$sender = $e->sender;
		$modelName = explode('\\', $sender::className());
		$class = end($modelName);
		$object = $sender::findOne($sender->id);
		if (Yii::$app->user->can("update{$class}", ['object' => $object])) {
			return true;
		} else {
			throw new ServerErrorHttpException("شما مجوز ویرایش در {$class} را ندارید",);
		}
	}


	public function beforeDelete($e = null) {

		$sender = $e->sender;
		$modelName = explode('\\', $sender::className());
		$class = end($modelName);
		$object = $sender::findOne($sender->id);
		if (Yii::$app->user->can("update{$class}", ['object' => $object])) {
			return true;
		} else {
			throw new ServerErrorHttpException("شما مجوز ویرایش در {$class} را ندارید",);
		}
	}
}