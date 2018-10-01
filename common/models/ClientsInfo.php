<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $name
 *
 * @property Clients $record
 */
class ClientsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'name'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Clients::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ClientsInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ClientsInfoQuery(get_called_class());
    }
}
