<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 * @property string $description
 * @property string $h1
 * @property string $text
 * @property string $text_under
 * @property string $text_above
 *
 * @property Seo $record
 */
class SeoInfo extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return [
            'shortcode' => \common\components\behaviors\ShortcodeBehavior::className()
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'description', 'h1', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['text'], 'string'],
            [['title', 'description', 'h1'], 'string', 'max' => 250],
            [
                ['record_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Seo::className(),
                'targetAttribute' => ['record_id' => 'id'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'record_id' => 'Record ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
            'h1' => 'H1',
            'text' => 'Text',
            'type_og' => 'Open graph type',
            'title_og' => 'Open graph title',
            'description_og' => 'Open graph description',
            'url_og' => 'Open graph url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Seo::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\SeoInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\SeoInfoQuery(get_called_class());
    }
}
