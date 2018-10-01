<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "docs".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $category_id
 * @property integer $hide
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property DocsInfo[] $docsInfos
 */
class Docs extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'category_id', 'hide', 'sort', 'creation_time', 'update_time'], 'required'],
            [['category_id', 'hide', 'sort', 'creation_time', 'update_time'], 'integer'],
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
            'category_id' => Yii::t('app', 'Принадлежит категории'),
            'hide' => Yii::t('app', 'Не відображати'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocsInfos()
    {
        return $this->hasMany(DocsInfo::className(), ['record_id' => 'id']);
    }
    
    public function getInfo()
    {
        return $this->hasOne(
                DocsInfo::className(), 
                ['record_id' => 'id']
        )->where([DocsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\DocsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\DocsQuery(get_called_class());
    }
}
