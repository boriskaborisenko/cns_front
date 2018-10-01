<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employees_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property integer $position
 * @property integer $text
 *
 * @property Employees $record
 */
class EmployeesInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'position', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['position','text', 'name'], 'string'],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['record_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'record_id' => Yii::t('app', 'Record ID'),
            'lang' => Yii::t('app', 'Lang'),
            'position' => Yii::t('app', 'Position'),
            'text' => Yii::t('app', 'Text'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Employees::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\EmployeesInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\EmployeesInfoQuery(get_called_class());
    }
}
