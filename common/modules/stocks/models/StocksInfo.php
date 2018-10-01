<?php

namespace common\modules\stocks\models;

use Yii;
use common\components\behaviors\ShortcodeBehavior;

/**
 * This is the model class for table "stocks_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $name
 * @property string $short_text
 * @property string $text
 *
 * @property Stocks $record
 */
class StocksInfo extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return [
            'shortcode' => ShortcodeBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stocks_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'name', 'short_text', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['text'], 'string'],
            [['name', 'short_text'], 'string', 'max' => 250],
            [
                ['record_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Stocks::className(),
                'targetAttribute' => ['record_id' => 'id'],
            ],
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
            'name' => 'Name',
            'short_text' => 'Short Text',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Stocks::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\modules\stocks\models\queries\StocksInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\stocks\models\queries\StocksInfoQuery(get_called_class());
    }
}
