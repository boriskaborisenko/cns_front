<?php
namespace frontend\widgets;
use yii\bootstrap\Widget;
use Yii;
use common\models\Seo;
use yii\helpers\Html;

class WSeoText extends Widget
{	
    public function init(){
        parent::init();
    }

    public function run() {
        if (Yii::$app->response->statusCode == 200) {
            $seo = Seo::find()->joinWith('info')->byAlias('/'.trim(Yii::$app->request->pathInfo,'/').'/')->one();
            if ($seo && !empty($seo->info->text)) {
                return $seo->info->text;
            }
        }
        return false;
    }
}