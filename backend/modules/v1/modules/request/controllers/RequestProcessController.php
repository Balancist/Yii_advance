<?php

namespace backend\modules\v1\modules\request\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\request\models\RequestProcess;
use Yii;




/**
* RequestProcessController implements the CRUD actions for RequestProcess model.
*/

/**
* @SWG\Tag(
*   name="request-processes",
*   description="درخواست های طلبه"
* )
*/
class RequestProcessController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\request\models\RequestProcess';

/**
* @SWG\Get(
*     path="/request-processes",
*     tags={"request-processes"},
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
*    path="/request-processes/{id}",
*    tags = {"request-processes"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "request-processes ID",
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
*     path="/request-processes",
*     tags={"request-processes"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "external_table_id",
    *        description = "شناسه جدول  اصلی که اطلاعاتش در این جدول لاگ شده ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "request_number",
    *        description = "شماره درخواست ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "parent_id",
    *        description = " ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "st_id",
    *        description = " ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "year",
    *        description = " ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "semester",
    *        description = "ترم%SEMESTER% ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "step",
    *        description = "مرحله%DEFAULT_PROCESS_STEP% ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "comment",
    *        description = "نظر ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "status",
    *        description = "وضعیت%PROCESS_STATUS% ",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "read_level_time",
    *        description = "زمان خوانده شدن درخواست ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "request_process_type_id",
    *        description = "نوع ",
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
*     path="/request-processes/{id}",
*     tags={"request-processes"},
*     summary="Update Info request-processes",
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
    *        name = "external_table_id",
    *        description = "شناسه جدول  اصلی که اطلاعاتش در این جدول لاگ شده",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "request_number",
    *        description = "شماره درخواست",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "parent_id",
    *        description = "",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "st_id",
    *        description = "",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "year",
    *        description = "",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "semester",
    *        description = "ترم%SEMESTER%",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "step",
    *        description = "مرحله%DEFAULT_PROCESS_STEP%",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "comment",
    *        description = "نظر",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "status",
    *        description = "وضعیت%PROCESS_STATUS%",
    *        required = true,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "read_level_time",
    *        description = "زمان خوانده شدن درخواست",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "request_process_type_id",
    *        description = "نوع",
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
*    path="/request-processes/get-by-params",
*    tags = {"request-processes"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "external_table_id",
        *        description = "شناسه جدول  اصلی که اطلاعاتش در این جدول لاگ شده ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "request_number",
        *        description = "شماره درخواست ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "parent_id",
        *        description = " ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "st_id",
        *        description = " ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "year",
        *        description = " ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "semester",
        *        description = "ترم%SEMESTER% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "step",
        *        description = "مرحله%DEFAULT_PROCESS_STEP% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "comment",
        *        description = "نظر ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "status",
        *        description = "وضعیت%PROCESS_STATUS% ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "read_level_time",
        *        description = "زمان خوانده شدن درخواست ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "request_process_type_id",
        *        description = "نوع ",
        *        required = false,
        *        type = "integer"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new RequestProcess();

$dataProvider = $searchModel->getResultByParams(['RequestProcess'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/request-processes/{id}",
*    tags = {"request-processes"},
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