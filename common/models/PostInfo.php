<?php

namespace common\models;

use Yii;
use common\components\behaviors\ShortcodeBehavior;
use common\components\behaviors\ThumbBehavior;

/**
 * This is the model class for table "post_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 * @property string $description
 * @property string $text
 *
 * @property Post $record
 */
class PostInfo extends \common\components\BaseActiveRecordModel
{
    public function behaviors() {
        return [
            'shortcode' => ShortcodeBehavior::className(),
            'thumb' => ThumbBehavior::className()
        ];
    }

        /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'description', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['description', 'text'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'description' => Yii::t('app', 'Описание'),
            'text' => Yii::t('app', 'Текст'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Post::className(), ['id' => 'record_id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\PostInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PostInfoQuery(get_called_class());
    }
}
