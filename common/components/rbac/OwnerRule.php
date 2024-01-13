<?php

namespace common\components\rbac;

use yii\rbac\Rule;

class OwnerRule extends Rule
{
    public $name = 'isOwner';

    public function execute($user, $item, $params)
    {
        return isset($params['object']) ? $params['object']->created_user_id == $user : false;
    }
}