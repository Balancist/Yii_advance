<?php

namespace backend\controllers;

use common\components\Controller;
use common\models\Thesis;
use Yii;
use common\models\ThesisSearch;
date_default_timezone_set("Iran");


/**
* ThesisController implements the CRUD actions for Thesis model.
*/

/**
* @SWG\Info(
*   title="thesis",
*   version="1.0.0",
* )
*/

/**
* @SWG\Tag(
*   name="thesis",
*   description="",
*   @SWG\ExternalDocumentation(
*     description="Find out more about our store",
*     url="http://swagger.io"
*   )
* )
*/
class ThesisController extends Controller
{

    public $modelClass = 'common\models\Thesis';

    /**
    * @SWG\Get(
    *     path="/thesis",
    *     tags={"thesis"},
    *     summary="Export",
    *     description="export all rows",
    *     produces = {"application/json"},
    *     consumes = {"application/json"},
    *     @SWG\Response(
    *         response = 200,
    *         description = " success"
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
    *    path="/thesis/{id}",
    *    tags = {"thesis"},
    *    summary = "search By ID",
    *    description = "search by ID",
    *    produces = {"application/json"},
    *    consumes = {"application/json"},
    *    @SWG\Parameter(
    *        in = "path",
    *        name = "id",
    *        description = "thesis ID",
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
    *     path="/thesis",
    *     tags={"thesis"},
    *     summary="Create",
    *     description="create *query* *formData*  post",
    *     produces={"application/json", "text/html"},
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
        *        type = "string",
        *        format = "textarea"
        *     ),
        *
    *     @SWG\Response(
    *         response = 200,
    *         description = " success"
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
        $model = new Thesis();
        if ($this->request->isPost) {
            $model->date = date('Y/m/d | H:i:s')
            $model->author = \Yii::$app->user->id;
            if ($model->load($this->request->post()) && $model->save()) {
                return true;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
    * @SWG\Put(
    *     path="/thesis/{id}",
    *     tags={"thesis"},
    *     summary="Update Info thesis",
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
        *        type = "string",
        *        format = "textarea"
        *     ),
    *     @SWG\Response(
    *         response = 200,
    *         description = " success"
    *     ),
    *     @SWG\Response(
    *         response = 401,
    *         description = "Error",
    *         @SWG\Schema(ref="backend\views\site\error")
    *     )
    * )
    * @param integer $id
    *
    * @return array
    */
    public function actionUpdate($id)
    {
        return parent::update($id);
    }


    /**
    * @SWG\Get(
    *    path="/thesis/get-by-params",
    *    tags = {"thesis"},
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
            *        type = "string",
            *        format = "textarea"
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
    *    path="/thesis/{id}",
    *    tags = {"thesis"},
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