<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $product_id
 * @property integer $hide
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property FaqInfo[] $faqInfos
 */
class Faq extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'product_id', 'hide', 'sort', 'creation_time', 'update_time'], 'required'],
            [['product_id', 'hide', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['alias'], 'string', 'max' => 250],
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
            'product_id' => Yii::t('app', 'Продукт'),
            'hide' => Yii::t('app', 'Не відображати'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaqInfos()
    {
        return $this->hasMany(FaqInfo::className(), ['record_id' => 'id']);
    }

    public function getInfo()
    {
        return $this->hasOne(
                FaqInfo::className(), 
                ['record_id' => 'id']
        )->where([FaqInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }    
    
    /**
     * @inheritdoc
     * @return \common\models\queries\FaqQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\FaqQuery(get_called_class());
    }
}
