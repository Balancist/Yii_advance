<?php

namespace backend\modules\v1\modules\thesis\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "thesis".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $created_time
 * @property int $created_user_id
 * @property string $modified_time
 * @property int $modified_user_id
 * @property string $deleted_time
 *
 * @property User $createdUser
 * @property User $modifiedUser
 */
class Thesis extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thesis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'text', 'created_time', 'created_user_id', 'modified_time', 'modified_user_id', 'deleted_time'], 'required'],
            [['text'], 'string'],
            [['created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['created_user_id', 'modified_user_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 1000],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'text' => 'Text',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User ID',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User ID',
            'deleted_time' => 'Deleted Time',
        ];
    }

    /**
     * Gets query for [[CreatedUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_user_id']);
    }

    /**
     * Gets query for [[ModifiedUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedUser()
    {
        return $this->hasOne(User::class, ['id' => 'modified_user_id']);
    }
}
