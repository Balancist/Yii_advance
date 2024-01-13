<?php

namespace backend\modules\v1\modules\student\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $first_name نام
 * @property string $last_name نام خانوادگی
 * @property int|null $sex جنسیت%SEX%
 * @property string $father_name نام پدر
 * @property string $bcn شماره شناسنامه
 * @property int|null $b_cIssue_city_id شهر صدور شناسنامه
 * @property string|null $birth_date تاریخ تولد
 * @property string|null $birth_loc محل تولد
 * @property int $religion_id دین
 * @property int $sub_religion_id مذهب
 * @property int $nationality_id ملیت
 * @property string|null $old_system_code کد طلبگی نظام قدیم
 * @property string|null $nid کد ملی
 * @property int|null $inquiry استعلام ثبت احوال%YES_NO%
 * @property int|null $physical_status وضعیت جسمانی%PHYSICAL_STATUS%
 * @property string|null $postal_code کد پستی
 * @property int|null $locality وضعيت سکونت خانواده%LOCALITY%
 * @property string|null $address نشانی محل سکونت
 * @property string|null $email ایمیل
 * @property string $phone تلفن تماس
 * @property int|null $marital_status وضعیت تاهل%MARITAL_STATUS%
 * @property int|null $num_children تعداد فرزند
 * @property string|null $mobile موبایل
 * @property string|null $job_title عنوان شغل
 * @property string|null $job_address آدرس محل کار
 * @property string|null $job_phone تلفن محل کار
 * @property int|null $job_status_id وضعيت شغلي
 * @property string|null $description توضیحات
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property User $createdUser
 * @property Domain $inquiry0
 * @property Domain $locality0
 * @property Domain $maritalStatus
 * @property User $modifiedUser
 * @property Domain $physicalStatus
 * @property Domain $sex0
 * @property StudentSpec[] $studentSpecs
 */
class Person extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'father_name', 'bcn', 'religion_id', 'sub_religion_id', 'nationality_id', 'phone'], 'required'],
            [['sex', 'b_cIssue_city_id', 'religion_id', 'sub_religion_id', 'nationality_id', 'inquiry', 'physical_status', 'locality', 'marital_status', 'num_children', 'job_status_id', 'created_user_id', 'modified_user_id'], 'integer'],
            [['birth_date', 'created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['address', 'description'], 'string'],
            [['first_name', 'last_name', 'father_name'], 'string', 'max' => 35],
            [['bcn'], 'string', 'max' => 20],
            [['birth_loc'], 'string', 'max' => 100],
            [['old_system_code', 'nid', 'postal_code'], 'string', 'max' => 10],
            [['email', 'job_title'], 'string', 'max' => 50],
            [['phone', 'mobile', 'job_phone'], 'string', 'max' => 30],
            [['job_address'], 'string', 'max' => 255],
            [['marital_status'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['marital_status' => 'id']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
            [['inquiry'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['inquiry' => 'id']],
            [['sex'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['sex' => 'id']],
            [['physical_status'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['physical_status' => 'id']],
            [['locality'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['locality' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'sex' => 'Sex',
            'father_name' => 'Father Name',
            'bcn' => 'Bcn',
            'b_cIssue_city_id' => 'B C Issue City ID',
            'birth_date' => 'Birth Date',
            'birth_loc' => 'Birth Loc',
            'religion_id' => 'Religion ID',
            'sub_religion_id' => 'Sub Religion ID',
            'nationality_id' => 'Nationality ID',
            'old_system_code' => 'Old System Code',
            'nid' => 'Nid',
            'inquiry' => 'Inquiry',
            'physical_status' => 'Physical Status',
            'postal_code' => 'Postal Code',
            'locality' => 'Locality',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'marital_status' => 'Marital Status',
            'num_children' => 'Num Children',
            'mobile' => 'Mobile',
            'job_title' => 'Job Title',
            'job_address' => 'Job Address',
            'job_phone' => 'Job Phone',
            'job_status_id' => 'Job Status ID',
            'description' => 'Description',
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
     * Gets query for [[Inquiry0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInquiry0()
    {
        return $this->hasOne(Domain::class, ['id' => 'inquiry']);
    }

    /**
     * Gets query for [[Locality0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocality0()
    {
        return $this->hasOne(Domain::class, ['id' => 'locality']);
    }

    /**
     * Gets query for [[MaritalStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaritalStatus()
    {
        return $this->hasOne(Domain::class, ['id' => 'marital_status']);
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
     * Gets query for [[PhysicalStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhysicalStatus()
    {
        return $this->hasOne(Domain::class, ['id' => 'physical_status']);
    }

    /**
     * Gets query for [[Sex0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSex0()
    {
        return $this->hasOne(Domain::class, ['id' => 'sex']);
    }

    /**
     * Gets query for [[StudentSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs()
    {
        return $this->hasMany(StudentSpec::class, ['person_id' => 'id']);
    }
}
