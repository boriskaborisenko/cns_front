<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "view_lid".
 *
 * @property integer $id
 * @property string $hash
 * @property string $params
 * @property integer $product
 * @property integer $created_at
 */
class ViewLid extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_lid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['params'], 'required'],
            [['product', 'created_at'], 'integer'],
            [['hash'], 'string', 'max' => 45],
            [['params'], 'string', 'max' => 1023],
            [['hash'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hash' => Yii::t('app', 'Hash'),
            'params' => Yii::t('app', 'Params'),
            'product' => Yii::t('app', 'Product'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ViewLidQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ViewLidQuery(get_called_class());
    }

    /**
     * Create class instance.
     *
     * @return \common\models\ViewLid instance.
     */
    public static function getInstance()
    {
        return new self;
    }
    
    /**
     * Save lid with hash of request params.
     *
     * @params array
     * @return \common\models\ViewLid instance.
     */
    public function saveLid($params)
    {
        $this->hash = md5($params['params']);
        $this->params = $params['params'];
        $this->product = $params['product'];
        $this->created_at = time();
        if ($this->save()) {
            return $this;
        } else {
            return self::find()->where(['hash'=>$this->hash])->one();
        }
    }
}
