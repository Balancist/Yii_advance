<?php

namespace backend\modules\v1\modules\base_info\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\base_info\models\BaseSchool;
use Yii;




/**
* BaseSchoolController implements the CRUD actions for BaseSchool model.
*/

/**
* @SWG\Tag(
*   name="base-schools",
*   description="اطلاعات مجتمع"
* )
*/
class BaseSchoolController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\base_info\models\BaseSchool';

/**
* @SWG\Get(
*     path="/base-schools",
*     tags={"base-schools"},
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
*    path="/base-schools/{id}",
*    tags = {"base-schools"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "base-schools ID",
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
*     path="/base-schools",
*     tags={"base-schools"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "code",
    *        description = "کد مدرسه ",
    *        required = true,
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
    *        name = "location_id",
    *        description = "شهر ",
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
*     path="/base-schools/{id}",
*     tags={"base-schools"},
*     summary="Update Info base-schools",
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
    *        description = "کد مدرسه",
    *        required = true,
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
    *        name = "location_id",
    *        description = "شهر",
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
*    path="/base-schools/get-by-params",
*    tags = {"base-schools"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "code",
        *        description = "کد مدرسه ",
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
        *        name = "location_id",
        *        description = "شهر ",
        *        required = false,
        *        type = "integer"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new BaseSchool();

$dataProvider = $searchModel->getResultByParams(['BaseSchool'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/base-schools/{id}",
*    tags = {"base-schools"},
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