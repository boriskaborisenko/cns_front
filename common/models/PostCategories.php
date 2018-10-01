<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "post_categories".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $parent_id
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property PostCategoriesInfo[] $postCategoriesInfos
 */
class PostCategories extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_categories';
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
            'alias' => Yii::t('app', 'Alias'),
            'parent_id' => Yii::t('app', 'Принадлежит категории'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategoriesInfos()
    {
        return $this->hasMany(PostCategoriesInfo::className(), ['record_id' => 'id']);
    }

    public function getInfo()
    {
        return $this->hasOne(
                PostCategoriesInfo::className(), 
                ['record_id' => 'id']
        )->where([PostCategoriesInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }    

    public function getPosts()
    {
        return $this->hasMany(
                Post::className(), 
                ['parent_id' => 'id']
        )->joinWith('info')->orderBy('sort DESC');
    }    

    public function getUrl() {
        return Url::to(["/post/".$this->alias]);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\PostCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PostCategoriesQuery(get_called_class());
    }
}
