<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "docs_categories".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $parent_id
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property DocsCategoriesInfo[] $docsCategoriesInfos
 */
class DocsCategories extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docs_categories';
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
    public function getDocsCategoriesInfos()
    {
        return $this->hasMany(DocsCategoriesInfo::className(), ['record_id' => 'id']);
    }

    public function getInfo()
    {
        return $this->hasOne(
                DocsCategoriesInfo::className(), 
                ['record_id' => 'id']
        )->where([DocsCategoriesInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }
    
    public function getDocs()
    {
        return $this->hasMany(
                Docs::className(), 
                ['category_id' => 'id']
        )->joinWith('info');
    }
    
    public function getChildren()
    {
        return $this->hasMany(
                DocsCategories::className(), 
                ['parent_id' => 'id']
        )->joinWith('info');        
    }
    
    /**
     * Get doc by alias from current category.
     * Firstly function get all docs in current category.
     * Then its mapping docs array by aliases.
     * And after take needed doc by given alias.
     * Notice: given alias is the last slug of doc alias.
     * Doc alias must be generated using all parent category aliases.
     * Example:
     * contacts-kyiv-pechersk-content
     * So you must put to alias argument "content" string.
     * @param alias the last slug of needed doc alias
     * @return \common\models\Docs object
     */
    public function getDocByAlias($alias)
    {
        $docs = \yii\helpers\ArrayHelper::index($this->docs,'alias');
        return $docs[$this->alias."-$alias"];
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\DocsCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\DocsCategoriesQuery(get_called_class());
    }
}
