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

        $viewOwnSchoolThesis = $auth->createPermission('viewOwnSchoolThesis');
        $viewOwnSchoolThesis->description = 'مشاهده پایان نامه مدرسه خود';
        $viewOwnSchoolThesis->ruleName = $ownerRule->name;
        $auth->add($viewOwnSchoolThesis);
        $auth->addChild($viewOwnSchoolThesis, $viewThesis);

        $viewOwnCityThesis = $auth->createPermission('viewOwnCityThesis');
        $viewOwnCityThesis->description = 'مشاهده پایان نامه شهر خود';
        $viewOwnCityThesis->ruleName = $ownerRule->name;
        $auth->add($viewOwnCityThesis);
        $auth->addChild($viewOwnCityThesis, $viewThesis);

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
        $auth->addChild($allowedStudent, $insertThesis);
        $auth->addChild($allowedStudent, $viewOwnThesis);
        $auth->addChild($allowedStudent, $updateOwnThesis);
        $auth->addChild($allowedStudent, $deleteOwnThesis);

        $city = $auth->createRole('city');
        $city->ruleName = $userGroupRule->name;
        $auth->add($city);
        $auth->addChild($city, $viewOwnCityThesis);

        $school = $auth->createRole('school');
        $school->ruleName = $userGroupRule->name;
        $auth->add($school);
        $auth->addChild($school, $viewOwnSchoolThesis);

        $management = $auth->createRole('management');
        $management->ruleName = $userGroupRule->name;
        $auth->add($management);
        $auth->addChild($management, $viewThesis);

        $office = $auth->createRole('office');
        $office->ruleName = $userGroupRule->name;
        $auth->add($office);
        $auth->addChild($office, $viewThesis);


        $mohammad = new User;
        $mohammad->username = 'mohammad';
        $mohammad->password = '12345678';
        $mohammad->email = 'a@b.c';
        $mohammad->save();
        $auth->assign($management, $mohammad->id);

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
