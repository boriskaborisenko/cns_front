<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $parent_id
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property ServicesInfo[] $servicesInfos
 */
class Services extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'parent_id', 'sort', 'creation_time', 'update_time'], 'required'],
            [['parent_id', 'sort', 'creation_time', 'update_time'], 'integer'],
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
            'alias' => Yii::t('app', 'Alias (заповнювати не обов`язково)'),
            'parent_id' => Yii::t('app', 'Принадлежит категории'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne(
                ServicesInfo::className(), 
                ['record_id' => 'id']
        )->where([ServicesInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['parent_id' => 'id']);
    }
    
    public function getUrl()
    {
        return Url::to(['/services/'.$this->alias]);
    }
        
    public function getServiceIcon()
    {
        switch ($this->alias) {
            case 'auto':
                return 'car';
                break;
            case 'health':
                return 'swimming';
                break;
            case 'property':
                return 'house';
                break;
            case 'responsibility':
                return 'hands';
                break;
            default:
                return 'house';
        }
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ServicesQuery(get_called_class());
    }
}
