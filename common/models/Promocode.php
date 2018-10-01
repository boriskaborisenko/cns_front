<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promocode".
 *
 * @property integer $id
 * @property string $alias
 * @property string $math_operation
 * @property string $value
 * @property integer $status
 * @property integer $nochange_status
 * @property integer $price_limit
 * @property string $expiration
 * @property integer $order_id
 * @property integer $product_id
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 */
class Promocode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promocode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['expiration'], 'safe'],
            [['alias', 'value'], 'string', 'max' => 250],
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
            'value' => Yii::t('app', 'Value'),
            'status' => Yii::t('app', 'Status'),
            'expiration' => Yii::t('app', 'Expiration'),
            'sort' => Yii::t('app', 'Sort'),
            'creation_time' => Yii::t('app', 'Creation Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }
    
    public function getOrder()
    {
        return $this->hasOne(
                Orders::className(), 
                ['id' => 'order_id']
        );
    }
    
    public function getProduct()
    {
        return $this->hasOne(
                Products::className(), 
                ['id' => 'product_id']
        );
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\PromocodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PromocodeQuery(get_called_class());
    }
    
    public static function deacivatePromocode($alias, $order_id)
    {
        $promocode = self::findOne(['alias' => $alias, 'nochange_status' => 0]); // Do not update promocode if nochange_status is TRUE 
    
        if ($promocode) {
            $promocode->status = 0;
            $promocode->order_id = $order_id;
            $promocode->update();
        }
    }
}
