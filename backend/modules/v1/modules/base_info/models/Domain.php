<?php

namespace backend\modules\v1\modules\base_info\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "domain".
 *
 * @property int $id
 * @property string|null $name
 * @property string $denote
 * @property string|null $denote_id
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property Person[] $people
 * @property Person[] $people0
 * @property Person[] $people1
 * @property Person[] $people2
 * @property Person[] $people3
 * @property RequestProcess[] $requestProcesses
 * @property RequestProcess[] $requestProcesses0
 * @property School[] $schools
 * @property Section[] $sections
 * @property StudentSpec[] $studentSpecs
 * @property StudentSpec[] $studentSpecs0
 * @property StudentSpec[] $studentSpecs1
 * @property StudentSpec[] $studentSpecs2
 * @property StudentSpec[] $studentSpecs3
 * @property StudentSpec[] $studentSpecs4
 * @property StudentSpec[] $studentSpecs5
 */
class Domain extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domain';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['denote'], 'required'],
            [['created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['created_user_id', 'modified_user_id'], 'integer'],
            [['name', 'denote', 'denote_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'denote' => 'Denote',
            'denote_id' => 'Denote ID',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User ID',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User ID',
            'deleted_time' => 'Deleted Time',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::class, ['marital_status' => 'id']);
    }

    /**
     * Gets query for [[People0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople0()
    {
        return $this->hasMany(Person::class, ['inquiry' => 'id']);
    }

    /**
     * Gets query for [[People1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople1()
    {
        return $this->hasMany(Person::class, ['sex' => 'id']);
    }

    /**
     * Gets query for [[People2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople2()
    {
        return $this->hasMany(Person::class, ['physical_status' => 'id']);
    }

    /**
     * Gets query for [[People3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople3()
    {
        return $this->hasMany(Person::class, ['locality' => 'id']);
    }

    /**
     * Gets query for [[RequestProcesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestProcesses()
    {
        return $this->hasMany(RequestProcess::class, ['semester' => 'id']);
    }

    /**
     * Gets query for [[RequestProcesses0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestProcesses0()
    {
        return $this->hasMany(RequestProcess::class, ['status' => 'id']);
    }

    /**
     * Gets query for [[Schools]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::class, ['active' => 'id']);
    }

    /**
     * Gets query for [[Sections]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::class, ['valuation' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs()
    {
        return $this->hasMany(StudentSpec::class, ['adm_code' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs0()
    {
        return $this->hasMany(StudentSpec::class, ['quota_code' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs1()
    {
        return $this->hasMany(StudentSpec::class, ['educational_type' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs2()
    {
        return $this->hasMany(StudentSpec::class, ['shift' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs3()
    {
        return $this->hasMany(StudentSpec::class, ['dormitory_type' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs4]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs4()
    {
        return $this->hasMany(StudentSpec::class, ['dossier_status' => 'id']);
    }

    /**
     * Gets query for [[StudentSpecs5]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpecs5()
    {
        return $this->hasMany(StudentSpec::class, ['starting_semester' => 'id']);
    }
}
