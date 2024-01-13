<?php

namespace backend\modules\v1\modules\request\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "request_process".
 *
 * @property int $id
 * @property int|null $external_table_id شناسه جدول  اصلی که اطلاعاتش در این جدول لاگ شده
 * @property int|null $request_number شماره درخواست
 * @property int|null $parent_id
 * @property int $st_id
 * @property int $year
 * @property int $semester ترم%SEMESTER%
 * @property int $step مرحله%DEFAULT_PROCESS_STEP%
 * @property string|null $comment نظر
 * @property int $status وضعیت%PROCESS_STATUS%
 * @property string|null $read_level_time زمان خوانده شدن درخواست
 * @property int $request_process_type_id نوع
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property User $createdUser
 * @property User $modifiedUser
 * @property RequestProcess $parent
 * @property RequestProcessType $requestProcessType
 * @property RequestProcess[] $requestProcesses
 * @property Domain $semester0
 * @property StudentSpec $st
 * @property Domain $status0
 */
class RequestProcess extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_process';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_table_id', 'request_number', 'parent_id', 'st_id', 'year', 'semester', 'step', 'status', 'request_process_type_id', 'created_user_id', 'modified_user_id'], 'integer'],
            [['st_id', 'year', 'semester', 'step', 'status', 'request_process_type_id'], 'required'],
            [['read_level_time', 'created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['st_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentSpec::class, 'targetAttribute' => ['st_id' => 'id']],
            [['request_process_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestProcessType::class, 'targetAttribute' => ['request_process_type_id' => 'id']],
            [['semester'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['semester' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['status' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestProcess::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'external_table_id' => 'External Table ID',
            'request_number' => 'Request Number',
            'parent_id' => 'Parent ID',
            'st_id' => 'St ID',
            'year' => 'Year',
            'semester' => 'Semester',
            'step' => 'Step',
            'comment' => 'Comment',
            'status' => 'Status',
            'read_level_time' => 'Read Level Time',
            'request_process_type_id' => 'Request Process Type ID',
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
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(RequestProcess::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[RequestProcessType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestProcessType()
    {
        return $this->hasOne(RequestProcessType::class, ['id' => 'request_process_type_id']);
    }

    /**
     * Gets query for [[RequestProcesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestProcesses()
    {
        return $this->hasMany(RequestProcess::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Semester0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemester0()
    {
        return $this->hasOne(Domain::class, ['id' => 'semester']);
    }

    /**
     * Gets query for [[St]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSt()
    {
        return $this->hasOne(StudentSpec::class, ['id' => 'st_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Domain::class, ['id' => 'status']);
    }
}
