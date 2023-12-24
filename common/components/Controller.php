<?php

namespace common\components;

use common\components\UserGroupBehavior;

class Controller extends \yii\web\Controller {
	
	public function behaviors() {
		return [
			'UserGroupBehavior' => [
				'class' => UserGroupBehavior::class,
			]
		];
	}
}