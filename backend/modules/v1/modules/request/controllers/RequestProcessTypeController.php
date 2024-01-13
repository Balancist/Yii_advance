<?php

namespace backend\modules\v1\modules\request\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\request\models\RequestProcessType;
use Yii;




/**
* RequestProcessTypeController implements the CRUD actions for RequestProcessType model.
*/

/**
* @SWG\Tag(
*   name="request-process-types",
*   description="نوع درخواست های طلبه"
* )
*/
class RequestProcessTypeController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\request\models\RequestProcessType';

/**
* @SWG\Get(
*     path="/request-process-types",
*     tags={"request-process-types"},
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
*    path="/request-process-types/{id}",
*    tags = {"request-process-types"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "request-process-types ID",
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
*     path="/request-process-types",
*     tags={"request-process-types"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "title",
    *        description = "عنوان ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "step_count",
    *        description = " ",
    *        required = false,
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
*     path="/request-process-types/{id}",
*     tags={"request-process-types"},
*     summary="Update Info request-process-types",
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
    *        name = "title",
    *        description = "عنوان",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "step_count",
    *        description = "",
    *        required = false,
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
*    path="/request-process-types/get-by-params",
*    tags = {"request-process-types"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "title",
        *        description = "عنوان ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "step_count",
        *        description = " ",
        *        required = false,
        *        type = "integer"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new RequestProcessType();

$dataProvider = $searchModel->getResultByParams(['RequestProcessType'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/request-process-types/{id}",
*    tags = {"request-process-types"},
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