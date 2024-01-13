<?php

namespace backend\modules\v1\modules\base_info\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "school".
 *
 * @property int $id
 * @property int $base_school_id نام مجتمع
 * @property string $code کد مدرسه
 * @property string|null $nezarat_code کد نظارت
 * @property string|null $paziresh_code کد مدرسه در سیستم پذیرش
 * @property string $name نام
 * @property string|null $title عنوان
 * @property string|null $comment توضیحات
 * @property string $start_preseneted_lesson ساعت شروع کلاس
 * @property string $end_preseneted_lesson ساعت پایان کلاس
 * @property string|null $details
 * @property int|null $dormitory_capacity ظرفیت خوابگاهی
 * @property int $active فعال%ACTIVE_TYPE%
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property Domain $active0
 * @property BaseSchool $baseSchool
 * @property User $createdUser
 * @property User $modifiedUser
 * @property StudentSpec[] $studentSpecs
 */
class School extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['base_school_id', 'code', 'name', 'start_preseneted_lesson', 'end_preseneted_lesson'], 'required'],
            [['base_school_id', 'dormitory_capacity', 'active', 'created_user_id', 'modified_user_id'], 'integer'],
            [['start_preseneted_lesson', 'end_preseneted_lesson', 'created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['details'], 'string'],
            [['code', 'paziresh_code'], 'string', 'max' => 20],
            [['nezarat_code'], 'string', 'max' => 255],
            [['name', 'title', 'comment'], 'string', 'max' => 100],
            [['code'], 'unique'],
            [['base_school_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseSchool::class, 'targetAttribute' => ['base_school_id' => 'id']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
            [['active'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['active' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'base_school_id' => 'Base School ID',
            'code' => 'Code',
            'nezarat_code' => 'Nezarat Code',
            'paziresh_code' => 'Paziresh Code',
            'name' => 'Name',
            'title' => 'Title',
            'comment' => 'Comment',
            'start_preseneted_lesson' => 'Start Preseneted Lesson',
            'end_preseneted_lesson' => 'End Preseneted Lesson',
            'details' => 'Details',
            'dormitory_capacity' => 'Dormitory Capacity',
            'active' => 'Active',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User ID',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User ID',
            'deleted_time' => 'Deleted Time',
        ];
    }

    /**
     * Gets query for [[Active0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActive0()
    {
        return $this->hasOne(Domain::class, ['id' => 'active']);
    }

    /**
     * Gets query for [[BaseSchool]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaseSchool()
    {
        return $this->hasOne(BaseSchool::class, ['id' => 'base_school_id']);
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
        return $this->hasMany(StudentSpec::class, ['school_id' => 'id']);
    }
}
