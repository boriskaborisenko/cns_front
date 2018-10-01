<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $name
 * @property string $text
 *
 * @property Products $record
 */
class ProductsInfo extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'name', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 250],
            [
                ['record_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Products::className(),
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
            'record_id' => Yii::t('app', 'Record ID'),
            'lang' => Yii::t('app', 'Lang'),
            'name' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Текст'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Products::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ProductsInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ProductsInfoQuery(get_called_class());
    }
}
