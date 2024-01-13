<?php

namespace backend\modules\v1\modules\base_info\models;

use Yii;
use common\models\User;
use common\components\rest\ActiveRecord;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $name نام
 * @property string|null $national_id شناسه ملی
 * @property int|null $parent_id زیر مجموعه
 * @property int $type نوع موقعی%LOCATION_TYPE%
 * @property string|null $created_time
 * @property int|null $created_user_id
 * @property string|null $modified_time
 * @property int|null $modified_user_id
 * @property string|null $deleted_time
 *
 * @property BaseSchool[] $baseSchools
 * @property User $createdUser
 * @property Location[] $locations
 * @property User $modifiedUser
 * @property Location $parent
 * @property Person[] $people
 * @property Domain $type0
 * @property Zone[] $zones
 */
class Location extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['parent_id', 'type', 'created_user_id', 'modified_user_id'], 'integer'],
            [['created_time', 'modified_time', 'deleted_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['national_id'], 'string', 'max' => 20],
            [['created_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_user_id' => 'id']],
            [['modified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['modified_user_id' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::class, 'targetAttribute' => ['type' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'national_id' => 'National ID',
            'parent_id' => 'Parent ID',
            'type' => 'Type',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User ID',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User ID',
            'deleted_time' => 'Deleted Time',
        ];
    }

    /**
     * Gets query for [[BaseSchools]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaseSchools()
    {
        return $this->hasMany(BaseSchool::class, ['location_id' => 'id']);
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
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::class, ['parent_id' => 'id']);
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
        return $this->hasOne(Location::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::class, ['b_cIssue_city_id' => 'id']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(Domain::class, ['id' => 'type']);
    }

    /**
     * Gets query for [[Zones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZones()
    {
        return $this->hasMany(Zone::class, ['parent_id' => 'id']);
    }
}
