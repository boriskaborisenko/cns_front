<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_settings".
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 * @property string $value
 * @property string $text
 * @property integer $status
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property UserSettingsInfo[] $userSettingsInfos
 */
class UserSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'value', 'text', 'status', 'sort', 'creation_time', 'update_time'], 'required'],
            [['text'], 'string'],
            [['status', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['alias', 'name', 'value'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'name' => 'Name',
            'value' => 'Value',
            'text' => 'Text',
            'status' => 'Status',
            'sort' => 'Sort',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSettingsInfos()
    {
        return $this->hasMany(UserSettingsInfo::className(), ['record_id' => 'id']);
    }

    public function getInfo()
    {
        return $this->hasOne(
                UserSettingsInfo::className(), 
                ['record_id' => 'id']
        )->where([UserSettingsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    } 
    
    /**
     * @inheritdoc
     * @return \common\models\queries\UserSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\UserSettingsQuery(get_called_class());
    }
}
