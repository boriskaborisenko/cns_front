<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use common\components\behaviors\ThumbBehavior;
use common\components\behaviors\PostBehavior;
/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $parent_id
 * @property integer $hide
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property PostInfo[] $postInfos
 */
class Post extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'parent_id', 'hide', 'sort', 'creation_time', 'update_time'], 'required'],
            [['parent_id', 'hide', 'sort', 'creation_time', 'update_time'], 'integer'],
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
            'parent_id' => Yii::t('app', 'Принадлежит категории'),
            'hide' => Yii::t('app', 'Не відображати'),
            'pub_date' => Yii::t('app', 'Date'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
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
    public function getPostInfos()
    {
        return $this->hasMany(PostInfo::className(), ['record_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(
                PostCategories::className(), 
                ['id' => 'parent_id']
        );
    } 
    
    public function getInfo()
    {
        return $this->hasOne(
                PostInfo::className(), 
                ['record_id' => 'id']
        )->where([PostInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    } 

    
    public function getUrl() {
        return Url::to(["/post/".$this->category->alias."/".$this->alias]);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PostQuery(get_called_class());
    }
}
