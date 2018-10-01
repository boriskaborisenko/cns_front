<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders_statuses".
 *
 * @property integer $id
 * @property string $name
 * @property string $sort
 * @property string $creation_date
 */
class OrdersStatuses extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sort', 'creation_date'], 'required'],
            [['sort'], 'integer'],
            [['name', 'creation_date'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_date' => Yii::t('app', 'Date of creation'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\OrdersStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\OrdersStatusesQuery(get_called_class());
    }
}
