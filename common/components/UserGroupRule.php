<?php

namespace common\components;

use Yii;
use yii\rbac\Rule;
use common\models\User;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        $identity = User::findIdentity($user);
        return !(Yii::$app->user->isGuest) ? Yii::$app->user->identity->group == $identity->group : false;
    }
}