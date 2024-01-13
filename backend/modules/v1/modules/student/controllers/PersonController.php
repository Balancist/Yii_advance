<?php

namespace backend\modules\v1\modules\student\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\student\models\Person;
use Yii;




/**
* PersonController implements the CRUD actions for Person model.
*/

/**
* @SWG\Tag(
*   name="people",
*   description="مشخصات فردی طلبه"
* )
*/
class PersonController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\student\models\Person';

/**
* @SWG\Get(
*     path="/people",
*     tags={"people"},
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
*    path="/people/{id}",
*    tags = {"people"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "people ID",
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
*     path="/people",
*     tags={"people"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "first_name",
    *        description = "نام ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "last_name",
    *        description = "نام خانوادگی ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "sex",
    *        description = "جنسیت%SEX% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "father_name",
    *        description = "نام پدر ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "bcn",
    *        description = "شماره شناسنامه ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "b_cIssue_city_id",
    *        description = "شهر صدور شناسنامه ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "birth_date",
    *        description = "تاریخ تولد ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "birth_loc",
    *        description = "محل تولد ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "religion_id",
    *        description = "دین ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "sub_religion_id",
    *        description = "مذهب ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "nationality_id",
    *        description = "ملیت ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "old_system_code",
    *        description = "کد طلبگی نظام قدیم ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "nid",
    *        description = "کد ملی ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "inquiry",
    *        description = "استعلام ثبت احوال%YES_NO% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "physical_status",
    *        description = "وضعیت جسمانی%PHYSICAL_STATUS% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "postal_code",
    *        description = "کد پستی ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "locality",
    *        description = "وضعيت سکونت خانواده%LOCALITY% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "address",
    *        description = "نشانی محل سکونت ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "email",
    *        description = "ایمیل ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "phone",
    *        description = "تلفن تماس ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "marital_status",
    *        description = "وضعیت تاهل%MARITAL_STATUS% ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "num_children",
    *        description = "تعداد فرزند ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "mobile",
    *        description = "موبایل ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_title",
    *        description = "عنوان شغل ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_address",
    *        description = "آدرس محل کار ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_phone",
    *        description = "تلفن محل کار ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_status_id",
    *        description = "وضعيت شغلي ",
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
*     path="/people/{id}",
*     tags={"people"},
*     summary="Update Info people",
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
    *        name = "first_name",
    *        description = "نام",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "last_name",
    *        description = "نام خانوادگی",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "sex",
    *        description = "جنسیت%SEX%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "father_name",
    *        description = "نام پدر",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "bcn",
    *        description = "شماره شناسنامه",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "b_cIssue_city_id",
    *        description = "شهر صدور شناسنامه",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "birth_date",
    *        description = "تاریخ تولد",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "birth_loc",
    *        description = "محل تولد",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "religion_id",
    *        description = "دین",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "sub_religion_id",
    *        description = "مذهب",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "nationality_id",
    *        description = "ملیت",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "old_system_code",
    *        description = "کد طلبگی نظام قدیم",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "nid",
    *        description = "کد ملی",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "inquiry",
    *        description = "استعلام ثبت احوال%YES_NO%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "physical_status",
    *        description = "وضعیت جسمانی%PHYSICAL_STATUS%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "postal_code",
    *        description = "کد پستی",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "locality",
    *        description = "وضعيت سکونت خانواده%LOCALITY%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "address",
    *        description = "نشانی محل سکونت",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "email",
    *        description = "ایمیل",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "phone",
    *        description = "تلفن تماس",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "marital_status",
    *        description = "وضعیت تاهل%MARITAL_STATUS%",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "num_children",
    *        description = "تعداد فرزند",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "mobile",
    *        description = "موبایل",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_title",
    *        description = "عنوان شغل",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_address",
    *        description = "آدرس محل کار",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_phone",
    *        description = "تلفن محل کار",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "job_status_id",
    *        description = "وضعيت شغلي",
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
*    path="/people/get-by-params",
*    tags = {"people"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "first_name",
        *        description = "نام ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "last_name",
        *        description = "نام خانوادگی ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "sex",
        *        description = "جنسیت%SEX% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "father_name",
        *        description = "نام پدر ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "bcn",
        *        description = "شماره شناسنامه ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "b_cIssue_city_id",
        *        description = "شهر صدور شناسنامه ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "birth_date",
        *        description = "تاریخ تولد ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "birth_loc",
        *        description = "محل تولد ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "religion_id",
        *        description = "دین ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "sub_religion_id",
        *        description = "مذهب ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "nationality_id",
        *        description = "ملیت ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "old_system_code",
        *        description = "کد طلبگی نظام قدیم ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "nid",
        *        description = "کد ملی ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "inquiry",
        *        description = "استعلام ثبت احوال%YES_NO% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "physical_status",
        *        description = "وضعیت جسمانی%PHYSICAL_STATUS% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "postal_code",
        *        description = "کد پستی ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "locality",
        *        description = "وضعيت سکونت خانواده%LOCALITY% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "address",
        *        description = "نشانی محل سکونت ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "email",
        *        description = "ایمیل ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "phone",
        *        description = "تلفن تماس ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "marital_status",
        *        description = "وضعیت تاهل%MARITAL_STATUS% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "num_children",
        *        description = "تعداد فرزند ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "mobile",
        *        description = "موبایل ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "job_title",
        *        description = "عنوان شغل ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "job_address",
        *        description = "آدرس محل کار ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "job_phone",
        *        description = "تلفن محل کار ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "job_status_id",
        *        description = "وضعيت شغلي ",
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

$searchModel = new Person();

$dataProvider = $searchModel->getResultByParams(['Person'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/people/{id}",
*    tags = {"people"},
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