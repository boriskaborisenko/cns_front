<?php

namespace common\models;

use common\models\queries\SeoQuery;
use common\components\behaviors\ThumbBehavior;
use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $alias
 * @property string $creation_date
 *
 * @property SeoInfo[] $seoInfos
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'creation_date'], 'required'],
            [['alias', 'creation_date'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'creation_date' => 'Creation Date',
        ];
    }

    public function behaviors()
    {
        return [
            'Thumb' => ThumbBehavior::className(),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoInfos()
    {
        return $this->hasMany(SeoInfo::className(), ['record_id' => 'id']);
    }

    public function getSeoInfosByLang()
    {
        return $this->hasOne(
            SeoInfo::className(),
            ['record_id' => 'id']
        )
            ->where(['lang' => Lang::getCurrentId()])
            ->one();
    }
    
    public function getInfo()
    {
        return $this->hasOne(
            SeoInfo::className(),
            ['record_id' => 'id']
        )->where(['lang' => Lang::getCurrentId()]);
    }

    /**
     * @inheritdoc
     * @return SeoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeoQuery(get_called_class());
    }

    public function rewriteMeta()
    {
        $this->rewriteMetaTitle();
        $this->rewriteMetaDescription();
        return $this;
    }
    
    public function rewriteMetaTitle()
    {
        if (!empty($this->info->title)) {
            Yii::$app->view->title = $this->info->title;
            return true;
        } else {
            return false;
        }
    }
    
    public function rewriteMetaDescription()
    {
        if (!empty($this->info->description)) {
            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $this->info->description
            ]);
            return true;    
        } else {
            return false;
        } 
    }

    public function rewriteOg()
    {
        $this->rewriteOgTitle();
        $this->rewriteOgType();
        $this->rewriteOgUrl();
        $this->rewriteOgDescription();
        $this->rewriteOgImage();
        return $this;
    }
    
    public function rewriteOgTitle()
    {
        if (!empty($this->info->title_og)) {
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => $this->info->title_og
            ], 'og_title');
            return true;    
        } else {
            return false;
        } 
    }
    
    public function rewriteOgType()
    {
        if (!empty($this->info->type_og)) {
            Yii::$app->view->registerMetaTag([
                'property' => 'og:type',
                'content' => $this->info->type_og
            ], 'og_type');
            return true;    
        } else {
            return false;
        } 
    }
    
    public function rewriteOgDescription()
    {
        if (!empty($this->info->description_og)) {
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => $this->info->description_og
            ], 'og_description');
            return true;    
        } else {
            return false;
        } 
    }
    
    public function rewriteOgUrl()
    {
        if (!empty($this->info->url_og)) {
            Yii::$app->view->registerMetaTag([
                'property' => 'og:url',
                'content' => $this->info->url_og
            ], 'og_url');
            return true;    
        } else {
            return false;
        } 
    }
    
    public function rewriteOgImage()
    {
        if (!empty($this->getImgPath())) {
            $img = $this->getImgPath();
        } else {
            $img = "/img/slider/slider1.jpg";
        }

        Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => trim(\yii\helpers\Url::to(['/'],true),'/').$img
        ], 'og_image');
        
        return true;
    }    
}
