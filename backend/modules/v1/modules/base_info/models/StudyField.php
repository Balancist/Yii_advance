<?php

namespace backend\modules\v1\modules\base_info\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "study_field".
 *
 * @property int $id
 * @property string|null $code کد
 * @property int|null $base_study_field_id
 * @property string|null $name نام
 * @property string|null $title عنوان گرایش
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property BaseStudyField $baseStudyField
 * @property User $createdUser
 * @property User $modifiedUser
 * @property StudentSpec[] $studentSpecs
 */
class StudyField extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'study_field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['base_study_field_id', 'created_user_id', 'modified_user_id'], 'integer'],
            [['created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
            [['code', 'deleted_time'], 'unique', 'targetAttribute' => ['code', 'deleted_time']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
            [['base_study_field_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseStudyField::class, 'targetAttribute' => ['base_study_field_id' => 'id']],
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
            'base_study_field_id' => 'Base Study Field ID',
            'name' => 'Name',
            'title' => 'Title',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User ID',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User ID',
            'deleted_time' => 'Deleted Time',
        ];
    }

    /**
     * Gets query for [[BaseStudyField]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaseStudyField()
    {
        return $this->hasOne(BaseStudyField::class, ['id' => 'base_study_field_id']);
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
     * Gets query for [[StudentSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs()
    {
        return $this->hasMany(StudentSpec::class, ['study_field_id' => 'id']);
    }
}
