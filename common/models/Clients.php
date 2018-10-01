<?php

namespace common\models;

use Yii;
use common\components\behaviors\ThumbBehavior;
use common\components\behaviors\PostBehavior;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $sort
 * @property integer $creation_time
 * @property integer $update_time
 *
 * @property ClientsInfo[] $clientsInfos
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'link','sort', 'creation_time', 'update_time'], 'required'],
            [['sort', 'creation_time', 'update_time'], 'integer'],
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
            'link' => Yii::t('app', 'Link'),
            'sort' => Yii::t('app', 'Sort'),
            'creation_time' => Yii::t('app', 'Creation Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }

    public function behaviors() {
        return [
            'thumb' => [
                'class' => ThumbBehavior::className()
            ],
            'post' => [
                'class' => PostBehavior::className()
            ]
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsInfos()
    {
        return $this->hasMany(ClientsInfo::className(), ['record_id' => 'id'])
                    ->where([ClientsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }
    
    public function getInfo()
    {
        return $this->hasOne(
                ClientsInfo::className(), 
                ['record_id' => 'id']
        )->where([ClientsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    } 

    /**
     * @inheritdoc
     * @return \common\models\queries\ClientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ClientsQuery(get_called_class());
    }
    
}
