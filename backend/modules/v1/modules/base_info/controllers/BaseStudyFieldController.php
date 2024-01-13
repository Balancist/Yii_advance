<?php

namespace backend\modules\v1\modules\base_info\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\base_info\models\BaseStudyField;
use Yii;




/**
* BaseStudyFieldController implements the CRUD actions for BaseStudyField model.
*/

/**
* @SWG\Tag(
*   name="base-study-fields",
*   description="رشته ها"
* )
*/
class BaseStudyFieldController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\base_info\models\BaseStudyField';

/**
* @SWG\Get(
*     path="/base-study-fields",
*     tags={"base-study-fields"},
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
*    path="/base-study-fields/{id}",
*    tags = {"base-study-fields"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "base-study-fields ID",
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
*     path="/base-study-fields",
*     tags={"base-study-fields"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "code",
    *        description = "کد ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "name",
    *        description = "نام ",
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
*     path="/base-study-fields/{id}",
*     tags={"base-study-fields"},
*     summary="Update Info base-study-fields",
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
    *        name = "code",
    *        description = "کد",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "name",
    *        description = "نام",
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
*    path="/base-study-fields/get-by-params",
*    tags = {"base-study-fields"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "code",
        *        description = "کد ",
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
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new BaseStudyField();

$dataProvider = $searchModel->getResultByParams(['BaseStudyField'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/base-study-fields/{id}",
*    tags = {"base-study-fields"},
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