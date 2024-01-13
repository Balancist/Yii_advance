<?php

namespace backend\modules\v1\modules\thesis\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\thesis\models\Thesis;
use Yii;




/**
* ThesisController implements the CRUD actions for Thesis model.
*/

/**
* @SWG\Info(
*   title="API",
*   version="1.0.0",
* )
*/

/**
* @SWG\Tag(
*   name="theses",
*   description=""
* )
*/
class ThesisController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\thesis\models\Thesis';

/**
* @SWG\Get(
*     path="/theses",
*     tags={"theses"},
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
*    path="/theses/{id}",
*    tags = {"theses"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "theses ID",
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
*     path="/theses",
*     tags={"theses"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "title",
    *        description = " ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "slug",
    *        description = " ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "text",
    *        description = " ",
    *        required = true,
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
*     path="/theses/{id}",
*     tags={"theses"},
*     summary="Update Info theses",
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
    *        description = "",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "slug",
    *        description = "",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "text",
    *        description = "",
    *        required = true,
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
*    path="/theses/get-by-params",
*    tags = {"theses"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "title",
        *        description = " ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "slug",
        *        description = " ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "text",
        *        description = " ",
        *        required = false,
        *        type = "string"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new Thesis();

$dataProvider = $searchModel->getResultByParams(['Thesis'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/theses/{id}",
*    tags = {"theses"},
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