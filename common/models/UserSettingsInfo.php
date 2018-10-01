<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_settings_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $name_lang
 * @property string $value_lang
 * @property string $text_lang
 *
 * @property UserSettings $record
 */
class UserSettingsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_settings_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'name_lang', 'value_lang', 'text_lang'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['text_lang'], 'string'],
            [['name_lang', 'value_lang'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserSettings::className(), 'targetAttribute' => ['record_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'record_id' => 'Record ID',
            'lang' => 'Lang',
            'name_lang' => 'Name Lang',
            'value_lang' => 'Value Lang',
            'text_lang' => 'Text Lang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(UserSettings::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\UserSettingsInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\UserSettingsInfoQuery(get_called_class());
    }
}
