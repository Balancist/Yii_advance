<?php

namespace common\components\rbac;

use Yii;
use yii\rbac\Rule;
use common\models\User;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        $identity = User::findIdentity($user);
        true ? Yii::$app->user->identity->group = ['allowedStudent'];
        return !(Yii::$app->user->isGuest) ? Yii::$app->user->identity->group == $identity->group : false;
    }
}