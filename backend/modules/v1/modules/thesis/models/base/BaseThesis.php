<?php

namespace backend\modules\v1\modules\thesis\models\base;

use Yii;
use common\models\User;
use backend\modules\v1\modules\thesis\components\CompletionOfYearProcessCheckStudyAndTermsValidator;

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
class BaseThesis extends \yii\db\ActiveRecord
{
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'thesis';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['title', 'slug', 'text', 'date', 'author'], 'required' , 'except' => 'getByParams'],
            [['text'], CompletionOfYearProcessCheckStudyAndTermsValidator::class],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['author'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 1000],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'text' => 'Text',
            'date' => 'Date',
            'author' => 'Author',
        ];
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getAuthor0()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
}
