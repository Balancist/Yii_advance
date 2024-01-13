<?php

namespace backend\modules\v1\modules\base_info\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "base_study_field".
 *
 * @property int $id
 * @property string|null $code کد
 * @property string|null $name نام
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property User $createdUser
 * @property User $modifiedUser
 * @property StudyField[] $studyFields
 */
class BaseStudyField extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base_study_field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['created_user_id', 'modified_user_id'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 100],
            [['code', 'deleted_time'], 'unique', 'targetAttribute' => ['code', 'deleted_time']],
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
            'code' => 'Code',
            'name' => 'Name',
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

    /**
     * Gets query for [[StudyFields]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudyFields()
    {
        return $this->hasMany(StudyField::class, ['base_study_field_id' => 'id']);
    }
}
