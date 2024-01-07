<?php

use common\models\User;
use common\components\UserGroupRule;
use common\components\OwnerRule;
use yii\db\Migration;

class m240107_084239_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;
        $userGroupRule = new UserGroupRule;
        $ownerRule = new OwnerRule;
        $auth->add($userGroupRule);
        $auth->add($ownerRule);


        $viewThesis = $auth->createPermission('viewThesis');
        $viewThesis->description = 'مشاهده پایان نامه';
        $auth->add($viewThesis);

        $viewOwnThesis = $auth->createPermission('viewOwnThesis');
        $viewOwnThesis->description = 'مشاهده پایان نامه خود';
        $viewOwnThesis->ruleName = $ownerRule->name;
        $auth->add($viewOwnThesis);
        $auth->addChild($viewOwnThesis, $viewThesis);

        $insertThesis = $auth->createPermission('insertThesis');
        $insertThesis->description = 'اضافه کردن پایان نامه';
        $auth->add($insertThesis);

        $updateThesis = $auth->createPermission('updateThesis');
        $updateThesis->description = 'ویراین پایان نامه';
        $updateThesis->ruleName = $ownerRule->name;
        $auth->add($updateThesis);

        $deleteThesis = $auth->createPermission('deleteThesis');
        $deleteThesis->description = 'حذف پایان نامه';
        $auth->add($deleteThesis);


        $admin = $auth->createRole('admin');
        $admin->ruleName = $userGroupRule->name;
        $auth->add($admin);
        $auth->addChild($admin, $viewThesis);
        $auth->addChild($admin, $deleteThesis);


        $mohammad = new User;
        $mohammad->username = 'mohammad';
        $mohammad->password = 'mohammad';
        $mohammad->phone = '09383710200';
        $mohammad->save();
        $auth->assign($admin, $mohammad->id);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
