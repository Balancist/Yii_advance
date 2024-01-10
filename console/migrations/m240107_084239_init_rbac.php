<?php

use common\models\User;
use common\components\rbac\UserGroupRule;
use common\components\rbac\OwnerRule;
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

        $updateOwnThesis = $auth->createPermission('updateOwnThesis');
        $updateOwnThesis->description = 'ویراین پایان نامه';
        $updateOwnThesis->ruleName = $ownerRule->name;
        $auth->add($updateOwnThesis);

        $deleteOwnThesis = $auth->createPermission('deleteOwnThesis');
        $deleteOwnThesis->description = 'حذف پایان نامه';
        $deleteOwnThesis->ruleName = $ownerRule->name;
        $auth->add($deleteOwnThesis);


        $allowedStudent = $auth->createRole('allowedStudent');
        $allowedStudent->ruleName = $userGroupRule->name;
        $auth->add($allowedStudent);
        $auth->addChild($allowedStudent, $viewOwnThesis);
        $auth->addChild($allowedStudent, $insertThesis);
        $auth->addChild($allowedStudent, $updateOwnThesis);
        $auth->addChild($allowedStudent, $deleteOwnThesis);

        $admin = $auth->createRole('admin');
        $admin->ruleName = $userGroupRule->name;
        $auth->add($admin);
        $auth->addChild($admin, $viewThesis);
        $auth->addChild($admin, $insertThesis);
        $auth->addChild($admin, $updateOwnThesis);
        $auth->addChild($admin, $deleteOwnThesis);


        $mohammad = new User;
        $mohammad->username = 'mohammad';
        $mohammad->password = '12345678';
        $mohammad->email = 'a@b.c';
        $mohammad->save();
        $auth->assign($admin, $mohammad->id);

        $hasan = new User;
        $hasan->username = 'hasan';
        $hasan->password = '12345678';
        $hasan->email = 'd@e.f';
        $hasan->save();
        $auth->assign($allowedStudent, $hasan->id);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
