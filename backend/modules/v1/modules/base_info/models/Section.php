<?php

namespace backend\modules\v1\modules\base_info\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property int|null $code کد
 * @property string|null $name نام
 * @property string|null $comment توضیحات
 * @property int|null $valuation ارزیابی دارد%YES_NO%
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property User $createdUser
 * @property User $modifiedUser
 * @property StudentSpec[] $studentSpecs
 * @property Domain $valuation0
 */
class Section extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'valuation', 'created_user_id', 'modified_user_id'], 'integer'],
            [['created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['comment'], 'string', 'max' => 255],
            [['code', 'deleted_time'], 'unique', 'targetAttribute' => ['code', 'deleted_time']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
            [['valuation'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['valuation' => 'id']],
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
            'comment' => 'Comment',
            'valuation' => 'Valuation',
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
     * Gets query for [[StudentSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs()
    {
        return $this->hasMany(StudentSpec::class, ['section_id' => 'id']);
    }

    /**
     * Gets query for [[Valuation0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getValuation0()
    {
        return $this->hasOne(Domain::class, ['id' => 'valuation']);
    }
}
