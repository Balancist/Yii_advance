<?php

namespace common\models;

use Yii;
use common\models\base\BaseThesis;
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

}

?>