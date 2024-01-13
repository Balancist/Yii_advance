<?php

namespace backend\modules\v1\modules\student\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\student\models\StudentSpec;
use Yii;




/**
* StudentSpecController implements the CRUD actions for StudentSpec model.
*/

/**
* @SWG\Tag(
*   name="student-specs",
*   description="مشخصات تحصیلی"
* )
*/
class StudentSpecController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\student\models\StudentSpec';

/**
* @SWG\Get(
*     path="/student-specs",
*     tags={"student-specs"},
*     summary="Export",
*     description="export all rows",
*     produces = {"application/json"},
*     consumes = {"application/json"},
*     @SWG\Response(
*         response = 200,
*         description = "success"
*     )
* )
*
*/
public function actionIndex()
{
    return parent::index();
}

/**
* @SWG\Get(
*    path="/student-specs/{id}",
*    tags = {"student-specs"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "student-specs ID",
*        required = true,
*        type = "string"
*     ),
*    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionView($id)
{
return parent::view($id);
}


/**
* @SWG\Post(
*     path="/student-specs",
*     tags={"student-specs"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "user_id",
    *        description = " ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "code",
    *        description = "کد طلبگی ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "school_id",
    *        description = "مدرسه ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "study_field_id",
    *        description = "رشته ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "educational_type",
    *        description = "نوع تحصیلی طلبه%EDUCATIONAL_TYPE% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "shift",
    *        description = "شیوه تحصیل%SHIFT% ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "section_id",
    *        description = "مقطع ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "starting_year",
    *        description = "سال ورود ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "starting_semester",
    *        description = "نيمسال ورود ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "duration_study",
    *        description = "سنوات ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "quota_code",
    *        description = "سهميه پذيرش%QUOTA_CODE% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "adm_code",
    *        description = "نحوه ورود%STUDENTSPEC_ADM% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "register_date",
    *        description = "تاریخ ثبت نام ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "person_id",
    *        description = "مشخصات فردی ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "educational_rule_id",
    *        description = "قانون آموزشي ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "curriculum_id",
    *        description = "دوره آموزشی ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "input_exam_grade",
    *        description = "نمره پذيرش ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "acceptance_id",
    *        description = "شناسه دانشجو در سیستم پذیرش ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "dormitory_type",
    *        description = "نوع وضعیت اسکان%DORMITORY_TYPE% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "dossier_status",
    *        description = "تاييد نهايي پرونده%ACTIVE_TYPE% ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "support_school_id",
    *        description = "مدرسه میزبان ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "educational_status_id",
    *        description = "وضعیت تحصیلی ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "description",
    *        description = "توضیحات ",
    *        required = false,
    *        type = "string"
    *     ),
    *
*     @SWG\Response(
*         response = 200,
*         description = "success"
*     ),
*     @SWG\Response(
*         response = 401,
*         description = "Error in Create",
*         @SWG\Schema(ref="backend\views\site\error")
*     )
* )
*
*/
public function actionCreate()
{
return parent::create();
}


/**
* @SWG\Patch(
*     path="/student-specs/{id}",
*     tags={"student-specs"},
*     summary="Update Info student-specs",
*     description="*path update",
*     produces={"application/json"},
*     @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "ID",
*        required = true,
*        type = "integer"
*     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "user_id",
    *        description = "",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "code",
    *        description = "کد طلبگی",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "school_id",
    *        description = "مدرسه",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "study_field_id",
    *        description = "رشته",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "educational_type",
    *        description = "نوع تحصیلی طلبه%EDUCATIONAL_TYPE%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "shift",
    *        description = "شیوه تحصیل%SHIFT%",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "section_id",
    *        description = "مقطع",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "starting_year",
    *        description = "سال ورود",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "starting_semester",
    *        description = "نيمسال ورود",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "duration_study",
    *        description = "سنوات",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "quota_code",
    *        description = "سهميه پذيرش%QUOTA_CODE%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "adm_code",
    *        description = "نحوه ورود%STUDENTSPEC_ADM%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "register_date",
    *        description = "تاریخ ثبت نام",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "person_id",
    *        description = "مشخصات فردی",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "educational_rule_id",
    *        description = "قانون آموزشي",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "curriculum_id",
    *        description = "دوره آموزشی",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "input_exam_grade",
    *        description = "نمره پذيرش",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "acceptance_id",
    *        description = "شناسه دانشجو در سیستم پذیرش",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "dormitory_type",
    *        description = "نوع وضعیت اسکان%DORMITORY_TYPE%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "dossier_status",
    *        description = "تاييد نهايي پرونده%ACTIVE_TYPE%",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "support_school_id",
    *        description = "مدرسه میزبان",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "educational_status_id",
    *        description = "وضعیت تحصیلی",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "description",
    *        description = "توضیحات",
    *        required = false,
    *        type = "string"
    *     ),
    *
*     @SWG\Response(
*         response = 200,
*         description = "success"
*     ),
*     @SWG\Response(
*         response = 401,
*         description = "Error",
*         @SWG\Schema(ref="backend\views\site\error")
*     )
* )
*
*/
public function actionUpdate($id)
{
return parent::update($id);
}


/**
* @SWG\Get(
*    path="/student-specs/get-by-params",
*    tags = {"student-specs"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "user_id",
        *        description = " ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "code",
        *        description = "کد طلبگی ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "school_id",
        *        description = "مدرسه ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "study_field_id",
        *        description = "رشته ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "educational_type",
        *        description = "نوع تحصیلی طلبه%EDUCATIONAL_TYPE% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "shift",
        *        description = "شیوه تحصیل%SHIFT% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "section_id",
        *        description = "مقطع ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "starting_year",
        *        description = "سال ورود ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "starting_semester",
        *        description = "نيمسال ورود ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "duration_study",
        *        description = "سنوات ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "quota_code",
        *        description = "سهميه پذيرش%QUOTA_CODE% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "adm_code",
        *        description = "نحوه ورود%STUDENTSPEC_ADM% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "register_date",
        *        description = "تاریخ ثبت نام ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "person_id",
        *        description = "مشخصات فردی ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "educational_rule_id",
        *        description = "قانون آموزشي ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "curriculum_id",
        *        description = "دوره آموزشی ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "input_exam_grade",
        *        description = "نمره پذيرش ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "acceptance_id",
        *        description = "شناسه دانشجو در سیستم پذیرش ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "dormitory_type",
        *        description = "نوع وضعیت اسکان%DORMITORY_TYPE% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "dossier_status",
        *        description = "تاييد نهايي پرونده%ACTIVE_TYPE% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "support_school_id",
        *        description = "مدرسه میزبان ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "educational_status_id",
        *        description = "وضعیت تحصیلی ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "description",
        *        description = "توضیحات ",
        *        required = false,
        *        type = "string"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new StudentSpec();

$dataProvider = $searchModel->getResultByParams(['StudentSpec'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/student-specs/{id}",
*    tags = {"student-specs"},
*    summary = "delete by id",
*    description = "delete by id",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        format = "int32",
*        description = "id",
*        required = true,
*        type = "integer"
*     ),
*    @SWG\Response(response = 204, description = "success")
*)
*/
public function actionDelete($id)
{
return parent::delete($id);
}
}