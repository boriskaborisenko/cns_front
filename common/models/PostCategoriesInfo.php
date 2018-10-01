<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_categories_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 * @property string $text
 *
 * @property PostCategories $record
 */
class PostCategoriesInfo extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_categories_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategories::className(), 'targetAttribute' => ['record_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'record_id' => Yii::t('app', 'Record ID'),
            'lang' => Yii::t('app', 'Lang'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Текст'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(PostCategories::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\PostCategoriesInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PostCategoriesInfoQuery(get_called_class());
    }
}
