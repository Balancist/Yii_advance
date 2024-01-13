<?php

namespace backend\modules\v1\modules\base_info\controllers;

use common\components\rest\Controller;
use backend\modules\v1\modules\base_info\models\Location;
use Yii;




/**
* LocationController implements the CRUD actions for Location model.
*/

/**
* @SWG\Tag(
*   name="locations",
*   description="مشخصات کشور - استان - شهرستان - شهر"
* )
*/
class LocationController extends Controller
{

public $modelClass = 'backend\modules\v1\modules\base_info\models\Location';

/**
* @SWG\Get(
*     path="/locations",
*     tags={"locations"},
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
*    path="/locations/{id}",
*    tags = {"locations"},
*    summary = "search By ID",
*    description = "search by ID",
*    produces = {"application/json"},
*    consumes = {"application/json"},
*    @SWG\Parameter(
*        in = "path",
*        name = "id",
*        description = "locations ID",
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
*     path="/locations",
*     tags={"locations"},
*     summary="Create",
*     description="create *query* *formData*  post",
*     produces={"application/json"},
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "name",
    *        description = "نام ",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "national_id",
    *        description = "شناسه ملی ",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "parent_id",
    *        description = "زیر مجموعه ",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "type",
    *        description = "نوع موقعی%LOCATION_TYPE% ",
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
*     path="/locations/{id}",
*     tags={"locations"},
*     summary="Update Info locations",
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
    *        name = "name",
    *        description = "نام",
    *        required = true,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "national_id",
    *        description = "شناسه ملی",
    *        required = false,
    *        type = "string"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "parent_id",
    *        description = "زیر مجموعه",
    *        required = false,
    *        type = "integer"
    *     ),
        *     @SWG\Parameter(
    *        in = "formData",
    *        name = "type",
    *        description = "نوع موقعی%LOCATION_TYPE%",
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
*    path="/locations/get-by-params",
*    tags = {"locations"},
*    summary = "search",
*    description = "search by code",
*    produces = {"application/json"},
*    consumes = {"application/json"},
        *     @SWG\Parameter(
        *        in = "query",
        *        name = "name",
        *        description = "نام ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "national_id",
        *        description = "شناسه ملی ",
        *        required = false,
        *        type = "string"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "parent_id",
        *        description = "زیر مجموعه ",
        *        required = false,
        *        type = "integer"
        *     ),
                *     @SWG\Parameter(
        *        in = "query",
        *        name = "type",
        *        description = "نوع موقعی%LOCATION_TYPE% ",
        *        required = false,
        *        type = "integer"
        *     ),
        *    @SWG\Response(response = 200, description = "success")
*)
*/
public function actionGetByParams()
{

$searchModel = new Location();

$dataProvider = $searchModel->getResultByParams(['Location'=>Yii::$app->request->queryParams]);
return $dataProvider ;
}


/**
* @SWG\Delete(
*    path="/locations/{id}",
*    tags = {"locations"},
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