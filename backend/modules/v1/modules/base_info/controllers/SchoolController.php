<?php

namespace backend\modules\v1\modules\base_info\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\base_info\models\School;
use Yii;




/**
* SchoolController implements the CRUD actions for School model.
*/

/**
* @SWG\Tag(
*   name="schools",
*   description="اطلاعات مدرسه"
* )
*/
class SchoolController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\base_info\models\School';

/**
* @SWG\Get(
*     path="/schools",
*     tags={"schools"},
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
*    path="/schools/{id}",
*    tags = {"schools"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "schools ID",
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
*     path="/schools",
*     tags={"schools"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "base_school_id",
    *        description = "نام مجتمع ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "code",
    *        description = "کد مدرسه ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "nezarat_code",
    *        description = "کد نظارت ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "paziresh_code",
    *        description = "کد مدرسه در سیستم پذیرش ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "name",
    *        description = "نام ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "title",
    *        description = "عنوان ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "comment",
    *        description = "توضیحات ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "start_preseneted_lesson",
    *        description = "ساعت شروع کلاس ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "end_preseneted_lesson",
    *        description = "ساعت پایان کلاس ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "details",
    *        description = " ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "dormitory_capacity",
    *        description = "ظرفیت خوابگاهی ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "active",
    *        description = "فعال%ACTIVE_TYPE% ",
    *        required = true,
    *        type = "integer"
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
*     path="/schools/{id}",
*     tags={"schools"},
*     summary="Update Info schools",
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
    *        name = "base_school_id",
    *        description = "نام مجتمع",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "code",
    *        description = "کد مدرسه",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "nezarat_code",
    *        description = "کد نظارت",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "paziresh_code",
    *        description = "کد مدرسه در سیستم پذیرش",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "name",
    *        description = "نام",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "title",
    *        description = "عنوان",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "comment",
    *        description = "توضیحات",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "start_preseneted_lesson",
    *        description = "ساعت شروع کلاس",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "end_preseneted_lesson",
    *        description = "ساعت پایان کلاس",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "details",
    *        description = "",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "dormitory_capacity",
    *        description = "ظرفیت خوابگاهی",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "active",
    *        description = "فعال%ACTIVE_TYPE%",
    *        required = true,
    *        type = "integer"
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
*    path="/schools/get-by-params",
*    tags = {"schools"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "base_school_id",
        *        description = "نام مجتمع ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "code",
        *        description = "کد مدرسه ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "nezarat_code",
        *        description = "کد نظارت ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "paziresh_code",
        *        description = "کد مدرسه در سیستم پذیرش ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "name",
        *        description = "نام ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "title",
        *        description = "عنوان ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "comment",
        *        description = "توضیحات ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "start_preseneted_lesson",
        *        description = "ساعت شروع کلاس ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "end_preseneted_lesson",
        *        description = "ساعت پایان کلاس ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "details",
        *        description = " ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "dormitory_capacity",
        *        description = "ظرفیت خوابگاهی ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "active",
        *        description = "فعال%ACTIVE_TYPE% ",
        *        required = false,
        *        type = "integer"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new School();

$dataProvider = $searchModel->getResultByParams(['School'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/schools/{id}",
*    tags = {"schools"},
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