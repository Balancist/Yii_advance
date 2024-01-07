<?php

namespace backend\modules\v1\modules\thesis\models;

use Yii;
use backend\modules\v1\modules\thesis\models\base\BaseThesis;
/**
 * This is the model class for table "thesis".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $date
 * @property integer $author
 *
 * @property User $author0
 */
class Thesis extends BaseThesis
{

	public function beforeInsert($insert) {
		if (parent::beforeInsert($insert)) {
            $model->author = Yii::$app->user->id;
            $model->date = date('Y/m/d | H:i:s');
            return true;
		}

		return false;
	}

}

?>