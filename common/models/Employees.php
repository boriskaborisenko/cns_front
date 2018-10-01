<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $sort
 * @property integer $creation_time
 * @property integer $update_time
 *
 * @property EmployeesInfo[] $employeesInfos
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name','email', 'show_contacts_page','sort', 'creation_time', 'update_time'], 'required'],
            [['alias','email'], 'string'],
            [['sort', 'creation_time', 'update_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'show_contacts_page' => Yii::t('app', 'Show Contacts Page'),
            'email' => Yii::t('app', 'Email'),
            'sort' => Yii::t('app', 'Sort'),
            'creation_time' => Yii::t('app', 'Creation Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeesInfos()
    {
        return $this->hasMany(EmployeesInfo::className(), ['record_id' => 'id']);
    }
    
    public function getInfo()
    {
        return $this->hasOne(EmployeesInfo::className(), ['record_id' => 'id'])
                ->where([EmployeesInfo::tableName() . '.lang' => Lang::getCurrentId()]);;
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\EmployeesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\EmployeesQuery(get_called_class());
    }
    
    public function getSImg(){
        return Url::to(['/images/'.self::tableName().'/'.$this->id.'.1.s.jpg']);
    }
    
    public function getBImg(){
        return Url::to(['/images/'.self::tableName().'/'.$this->id.'.1.b.jpg']);
    }
}
