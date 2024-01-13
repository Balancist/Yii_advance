<?php

namespace backend\modules\v1\modules\student\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "student_spec".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $code کد طلبگی
 * @property int $school_id مدرسه
 * @property int $study_field_id رشته
 * @property int|null $educational_type نوع تحصیلی طلبه%EDUCATIONAL_TYPE%
 * @property int $shift شیوه تحصیل%SHIFT%
 * @property int $section_id مقطع
 * @property int|null $starting_year سال ورود
 * @property int|null $starting_semester نيمسال ورود
 * @property int|null $duration_study سنوات
 * @property int|null $quota_code سهميه پذيرش%QUOTA_CODE%
 * @property int|null $adm_code نحوه ورود%STUDENTSPEC_ADM%
 * @property string|null $register_date تاریخ ثبت نام
 * @property int $person_id مشخصات فردی
 * @property int $educational_rule_id قانون آموزشي
 * @property int $curriculum_id دوره آموزشی
 * @property int|null $input_exam_grade نمره پذيرش
 * @property int|null $acceptance_id شناسه دانشجو در سیستم پذیرش
 * @property int|null $dormitory_type نوع وضعیت اسکان%DORMITORY_TYPE%
 * @property int $dossier_status تاييد نهايي پرونده%ACTIVE_TYPE%
 * @property int|null $support_school_id مدرسه میزبان
 * @property int|null $educational_status_id وضعیت تحصیلی
 * @property string|null $description توضیحات
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property Domain $admCode
 * @property User $createdUser
 * @property Domain $dormitoryType
 * @property Domain $dossierStatus
 * @property Domain $educationalType
 * @property User $modifiedUser
 * @property Person $person
 * @property Domain $quotaCode
 * @property RequestProcess[] $requestProcesses
 * @property School $school
 * @property Section $section
 * @property Domain $shift0
 * @property Domain $startingSemester
 * @property StudyField $studyField
 * @property User $user
 */
class StudentSpec extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_spec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'school_id', 'study_field_id', 'educational_type', 'shift', 'section_id', 'starting_year', 'starting_semester', 'duration_study', 'quota_code', 'adm_code', 'person_id', 'educational_rule_id', 'curriculum_id', 'input_exam_grade', 'acceptance_id', 'dormitory_type', 'dossier_status', 'support_school_id', 'educational_status_id', 'created_user_id', 'modified_user_id'], 'integer'],
            [['school_id', 'study_field_id', 'shift', 'section_id', 'person_id', 'educational_rule_id', 'curriculum_id'], 'required'],
            [['register_date', 'created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['description'], 'string'],
            [['code'], 'string', 'max' => 20],
            [['code'], 'unique'],
            [['school_id', 'study_field_id', 'section_id', 'person_id', 'deleted_time', 'educational_status_id'], 'unique', 'targetAttribute' => ['school_id', 'study_field_id', 'section_id', 'person_id', 'deleted_time', 'educational_status_id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
            [['study_field_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudyField::class, 'targetAttribute' => ['study_field_id' => 'id']],
            [['adm_code'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['adm_code' => 'id']],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::class, 'targetAttribute' => ['school_id' => 'id']],
            [['quota_code'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['quota_code' => 'id']],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['educational_type'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['educational_type' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::class, 'targetAttribute' => ['person_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
            [['shift'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['shift' => 'id']],
            [['dormitory_type'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['dormitory_type' => 'id']],
            [['dossier_status'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['dossier_status' => 'id']],
            [['starting_semester'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['starting_semester' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'code' => 'Code',
            'school_id' => 'School ID',
            'study_field_id' => 'Study Field ID',
            'educational_type' => 'Educational Type',
            'shift' => 'Shift',
            'section_id' => 'Section ID',
            'starting_year' => 'Starting Year',
            'starting_semester' => 'Starting Semester',
            'duration_study' => 'Duration Study',
            'quota_code' => 'Quota Code',
            'adm_code' => 'Adm Code',
            'register_date' => 'Register Date',
            'person_id' => 'Person ID',
            'educational_rule_id' => 'Educational Rule ID',
            'curriculum_id' => 'Curriculum ID',
            'input_exam_grade' => 'Input Exam Grade',
            'acceptance_id' => 'Acceptance ID',
            'dormitory_type' => 'Dormitory Type',
            'dossier_status' => 'Dossier Status',
            'support_school_id' => 'Support School ID',
            'educational_status_id' => 'Educational Status ID',
            'description' => 'Description',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User ID',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User ID',
            'deleted_time' => 'Deleted Time',
        ];
    }

    /**
     * Gets query for [[AdmCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmCode()
    {
        return $this->hasOne(Domain::class, ['id' => 'adm_code']);
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
     * Gets query for [[DormitoryType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDormitoryType()
    {
        return $this->hasOne(Domain::class, ['id' => 'dormitory_type']);
    }

    /**
     * Gets query for [[DossierStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDossierStatus()
    {
        return $this->hasOne(Domain::class, ['id' => 'dossier_status']);
    }

    /**
     * Gets query for [[EducationalType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducationalType()
    {
        return $this->hasOne(Domain::class, ['id' => 'educational_type']);
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
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::class, ['id' => 'person_id']);
    }

    /**
     * Gets query for [[QuotaCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuotaCode()
    {
        return $this->hasOne(Domain::class, ['id' => 'quota_code']);
    }

    /**
     * Gets query for [[RequestProcesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestProcesses()
    {
        return $this->hasMany(RequestProcess::class, ['st_id' => 'id']);
    }

    /**
     * Gets query for [[School]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::class, ['id' => 'school_id']);
    }

    /**
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }

    /**
     * Gets query for [[Shift0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShift0()
    {
        return $this->hasOne(Domain::class, ['id' => 'shift']);
    }

    /**
     * Gets query for [[StartingSemester]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStartingSemester()
    {
        return $this->hasOne(Domain::class, ['id' => 'starting_semester']);
    }

    /**
     * Gets query for [[StudyField]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudyField()
    {
        return $this->hasOne(StudyField::class, ['id' => 'study_field_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
